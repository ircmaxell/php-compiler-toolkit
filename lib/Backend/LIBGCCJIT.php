<?php
declare(strict_types=1);

namespace PHPCompilerToolkit\Backend;

use SplObjectStorage;

use PHPCompilerToolkit\BackendAbstract;
use PHPCompilerToolkit\Context;
use PHPCompilerToolkit\CompiledUnit;
use PHPCompilerToolkit\IR\Block;
use PHPCompilerToolkit\IR\Function_;
use PHPCompilerToolkit\IR\Op;
use PHPCompilerToolkit\IR\Parameter;
use PHPCompilerToolkit\IR\Value\Constant;

use PHPCompilerToolkit\Type;

use libgccjit\libgccjit as lib;
use libgccjit\gcc_jit_block_ptr;
use libgccjit\gcc_jit_context_ptr;
use libgccjit\gcc_jit_function_ptr;
use libgccjit\gcc_jit_param_ptr_ptr;

class LIBGCCJIT extends BackendAbstract {

    public lib $lib;
    public gcc_jit_context_ptr $context;

    const PRIMITIVE_TYPE_MAP = [
        Type\Primitive::T_VOID => lib::GCC_JIT_TYPE_VOID,
        Type\Primitive::T_VOID_PTR => lib::GCC_JIT_TYPE_VOID_PTR,
        Type\Primitive::T_BOOL => lib::GCC_JIT_TYPE_BOOL,
        Type\Primitive::T_CHAR => lib::GCC_JIT_TYPE_CHAR,
        Type\Primitive::T_SIGNED_CHAR => lib::GCC_JIT_TYPE_SIGNED_CHAR,
        Type\Primitive::T_UNSIGNED_CHAR => lib::GCC_JIT_TYPE_UNSIGNED_CHAR,
        Type\Primitive::T_SHORT => lib::GCC_JIT_TYPE_SHORT,
        Type\Primitive::T_UNSIGNED_SHORT => lib::GCC_JIT_TYPE_UNSIGNED_SHORT,
        Type\Primitive::T_INT => lib::GCC_JIT_TYPE_INT,
        Type\Primitive::T_UNSIGNED_INT  => lib::GCC_JIT_TYPE_UNSIGNED_INT,
        Type\Primitive::T_LONG  => lib::GCC_JIT_TYPE_LONG,
        Type\Primitive::T_UNSIGNED_LONG  => lib::GCC_JIT_TYPE_UNSIGNED_LONG,
        Type\Primitive::T_LONG_LONG  => lib::GCC_JIT_TYPE_LONG_LONG,
        Type\Primitive::T_UNSIGNED_LONG_LONG  => lib::GCC_JIT_TYPE_UNSIGNED_LONG_LONG,
        Type\Primitive::T_FLOAT  => lib::GCC_JIT_TYPE_FLOAT,
        Type\Primitive::T_DOUBLE  => lib::GCC_JIT_TYPE_DOUBLE,
        Type\Primitive::T_LONG_DOUBLE  => lib::GCC_JIT_TYPE_LONG_DOUBLE,
        Type\Primitive::T_SIZE_T  => lib::GCC_JIT_TYPE_SIZE_T,
    ];

    public function __construct() {
        $this->lib = new lib;
    }

    protected function beforeCompile(Context $context): void {
        $this->parameterMap = [];
        $this->context = $this->lib->gcc_jit_context_acquire();
    }

    protected function afterCompile(Context $context): void {
        unset($this->parameterMap);
        unset($this->context);
    }

    protected function compileType(Type $type) {
        if ($type instanceof Type\Primitive) {
            return $this->lib->gcc_jit_context_get_type($this->context, self::PRIMITIVE_TYPE_MAP[$type->kind]);
        }
        throw new \LogicException("Not implemented type for gcc_jit: " . get_class($type));
    }

    protected function compileConstant(Constant $constant) {
        // libjit allocates constants per function, do nothing
        if ($constant->type->isFloatingPoint()) {
            return $this->lib->gcc_jit_context_new_rvalue_from_double($this->context, $this->typeMap[$constant->type], $constant->value);
        }
        return $this->lib->gcc_jit_context_new_rvalue_from_long($this->context, $this->typeMap[$constant->type], $constant->value);
    }

    protected array $parameterMap;

    protected function declareFunction(Function_ $function) {
        $this->parameterMap[$function->name] = array_map(
            function(Parameter $param) {
                return $this->lib->gcc_jit_context_new_param($this->context, null, $this->typeMap[$param->type], $param->name);
            }, 
            $function->parameters
        );
        $params = $this->lib->makeArray(
            gcc_jit_param_ptr_ptr::class,
            $this->parameterMap[$function->name]
        );

        $func = $this->lib->gcc_jit_context_new_function(
            $this->context,
            null,
            lib::GCC_JIT_FUNCTION_EXPORTED,
            $this->typeMap[$function->returnType],
            $function->name,
            count($function->parameters),
            $params,
            $function->isVariadic ? 1 : 0
        );
        if ($func === null) {
            throw new \LogicException("Func shouldn't be null");
        }
        return $func;
    }

    private SplObjectStorage $localMap;
    private SplObjectStorage $valueMap;
    private SplObjectStorage $blockMap;

    protected function compileFunction(Function_ $function, $func): void {
        $this->valueMap = new SplObjectStorage;
        $this->blockMap = new SplObjectStorage;
        $this->localMap = new SplObjectStorage;
        foreach ($this->constantMap as $constant) {
            $this->valueMap[$constant] = $this->constantMap[$constant];
        }
        foreach ($function->parameters as $index => $parameter) {
            $this->valueMap[$parameter->value] = $this->lib->gcc_jit_param_as_rvalue($this->parameterMap[$function->name][$index]);
        }
        foreach ($function->blocks as $block) {
            $this->blockMap[$block] = $this->lib->gcc_jit_function_new_block($func, $block->name);
            foreach ($block->arguments as $idx => $argument) {
                $this->localMap[$argument] = $this->lib->gcc_jit_function_new_local($func, null, $this->typeMap[$argument->type], $block->name . '_arg_' . $idx);
            }
        }
        foreach ($function->blocks as $block) {
            $this->compileBlock($func, $block);
        }
        unset($this->localMap);
        unset($this->valueMap);
        unset($this->blockMap);
    }

    protected function compileBlock(gcc_jit_function_ptr $func, Block $block): void {
        foreach ($block->arguments as $argument) {
            $this->valueMap[$argument] = $this->lib->gcc_jit_lvalue_as_rvalue($this->localMap[$argument], null);
        }
        foreach ($block->ops as $op) {
            $this->compileOp($func, $this->blockMap[$block], $op);
        }
    }

    protected function compileOp(gcc_jit_function_ptr $func, gcc_jit_block_ptr $block, Op $op): void {
        if ($op instanceof Op\BinaryOp) {
            $this->compileBinaryOp($op);
        } elseif ($op instanceof Op\ReturnVoid) {
            $this->lib->gcc_jit_block_end_with_void_return($block, null);
        } elseif ($op instanceof Op\ReturnValue) {
            $this->lib->gcc_jit_block_end_with_return($block, null, $this->valueMap[$op->value]);
        } elseif ($op instanceof Op\BlockCall) {
            $this->compileBlockCall($block, $op);
        } else {
            throw new \LogicException("Unknown Op encountered: " . get_class($op));
        }
    }

    protected function compileBlockCall(gcc_jit_block_ptr $block, Op\BlockCall $op): void {
        foreach ($op->block->arguments as $index => $argument) {
            $this->lib->gcc_jit_block_add_assignment($block, null, $this->localMap[$argument], $this->valueMap[$op->arguments[$index]]);
        }
        $this->lib->gcc_jit_block_end_with_jump($block, null, $this->blockMap[$op->block]);
    }

    const BINARYOP_MAP = [
        Op\BinaryOp\Add::class => lib::GCC_JIT_BINARY_OP_PLUS,
        Op\BinaryOp\BitwiseAnd::class => lib::GCC_JIT_BINARY_OP_BITWISE_AND,
        Op\BinaryOp\BitwiseOr::class => lib::GCC_JIT_BINARY_OP_BITWISE_OR,
        Op\BinaryOp\BitwiseXor::class => lib::GCC_JIT_BINARY_OP_BITWISE_XOR,
        Op\BinaryOp\Div::class => lib::GCC_JIT_BINARY_OP_DIVIDE,
        Op\BinaryOp\LogicalAnd::class => lib::GCC_JIT_BINARY_OP_LOGICAL_AND,
        Op\BinaryOp\LogicalOr::class => lib::GCC_JIT_BINARY_OP_LOGICAL_OR,
        Op\BinaryOp\Mod::class => lib::GCC_JIT_BINARY_OP_MODULO,
        Op\BinaryOp\Mul::class => lib::GCC_JIT_BINARY_OP_MULT,
        Op\BinaryOp\SL::class => lib::GCC_JIT_BINARY_OP_LSHIFT,
        Op\BinaryOp\SR::class => lib::GCC_JIT_BINARY_OP_RSHIFT,
        Op\BinaryOp\Sub::class => lib::GCC_JIT_BINARY_OP_MINUS,
    ];

    const COMPAREOP_MAP = [
        OP\BinaryOp\EQ::class => lib::GCC_JIT_COMPARISON_EQ,
        OP\BinaryOp\GE::class => lib::GCC_JIT_COMPARISON_GE,
        OP\BinaryOp\GT::class => lib::GCC_JIT_COMPARISON_GT,
        OP\BinaryOp\LE::class => lib::GCC_JIT_COMPARISON_LE,
        OP\BinaryOp\LT::class => lib::GCC_JIT_COMPARISON_LT,
        OP\BinaryOp\NE::class => lib::GCC_JIT_COMPARISON_NE,
    ];

    protected function compileBinaryOp(Op\BinaryOp $op): void {
        $class = get_class($op);
        if (isset(self::BINARYOP_MAP[$class])) {
            $this->valueMap[$op->result] = $this->lib->gcc_jit_context_new_binary_op($this->context, null, self::BINARYOP_MAP[$class], $this->typeMap[$op->result->type], $this->valueMap[$op->left], $this->valueMap[$op->right]);
        } elseif (isset(self::COMPAREOP_MAP[$class])) {
            $this->valueMap[$op->result] = $this->lib->gcc_jit_context_new_comparison($this->context, null, self::COMPAREOP_MAP[$class], $this->valueMap[$op->left], $this->valueMap[$op->right]);
        } else {
            throw new \LogicException("Unknown BinaryOp encountered: $class");
        }
    }

    protected function buildResult(): CompiledUnit {
        $result = $this->lib->gcc_jit_context_compile($this->context);
        return new LIBGCCJIT\CompiledUnit($this, $result, $this->signatureMap);
    }

}