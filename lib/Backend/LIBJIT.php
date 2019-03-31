<?php
declare(strict_types=1);

namespace PHPCompilerToolkit\Backend;

use SplObjectStorage;

use PHPCompilerToolkit\BackendAbstract;
use PHPCompilerToolkit\CompiledUnit;
use PHPCompilerToolkit\Context;
use PHPCompilerToolkit\IR\Block;
use PHPCompilerToolkit\IR\Function_;
use PHPCompilerToolkit\IR\Op;
use PHPCompilerToolkit\IR\Parameter;
use PHPCompilerToolkit\Type;

use libjit\libjit as lib;
use libjit\jit_context_t;
use libjit\jit_type_t_ptr;
use libjit\jit_abi_t;
use libjit\jit_function_t;

class LIBJIT extends BackendAbstract {

    public lib $lib;
    public jit_context_t $context;

    public function __construct() {
        $this->lib = new lib;
    }

    protected function beforeCompile(Context $context): void {
        $this->context = $this->lib->jit_context_create();
    }

    protected function afterCompile(Context $context): void {
        unset($this->context);
    }

    protected function compileType(Type $type) {
        if ($type instanceof Type\Primitive) {
            switch ($type->kind) {
                case Type\Primitive::T_VOID:
                    return $this->lib->jit_type_void;
                case Type\Primitive::T_VOID_PTR:
                    return $this->lib->jit_type_void_ptr;
                case Type\Primitive::T_BOOL:
                    return $this->lib->jit_type_sys_bool;
                case Type\Primitive::T_CHAR:
                    return $this->lib->jit_type_sys_char;
                case Type\Primitive::T_SIGNED_CHAR:
                    return $this->lib->jit_type_sys_schar;
                case Type\Primitive::T_UNSIGNED_CHAR:
                    return $this->lib->jit_type_sys_uchar;
                case Type\Primitive::T_SHORT:
                    return $this->lib->jit_type_short;
                case Type\Primitive::T_UNSIGNED_SHORT:
                    return $this->lib->jit_type_ushort;
                case Type\Primitive::T_INT:
                    return $this->lib->jit_type_int;
                case Type\Primitive::T_UNSIGNED_INT:
                    return $this->lib->jit_type_uint;
                case Type\Primitive::T_LONG:
                    return $this->lib->jit_type_long;
                case Type\Primitive::T_UNSIGNED_LONG:
                    return $this->lib->jit_type_ulong;
                case Type\Primitive::T_LONG_LONG:
                    return $this->lib->jit_type_sys_longlong;
                case Type\Primitive::T_UNSIGNED_LONG_LONG:
                    return $this->lib->jit_type_sys_ulonglong;
                case Type\Primitive::T_FLOAT:
                    return $this->lib->jit_type_float32;
                case Type\Primitive::T_DOUBLE:
                    return $this->lib->jit_type_float64;
                case Type\Primitive::T_LONG_DOUBLE:
                    return $this->lib->jit_type_sys_long_double;
                case Type\Primitive::T_SIZE_T:
                    return $this->lib->jit_type_nuint;
            }
        }
        throw new \LogicException("Type " . get_class($type) . " not implemented yet");
    }

    protected function declareFunction(Function_ $function) {
        $paramWrapper = $this->lib->makeArray(
            jit_type_t_ptr::class,
            array_map(
                function(Parameter $param) {
                    return $this->typeMap[$param->type];
                }, 
                $function->parameters
            )
        );
        $abi = $this->lib->getFFI()->new('jit_abi_t');
        $abi = lib::jit_abi_cdecl;

        $type = $this->lib->jit_type_create_signature(
            new jit_abi_t($abi),
            $this->typeMap[$function->returnType], 
            $paramWrapper, 
            count($function->parameters),
            1
        );
        $func = $this->lib->jit_function_create($this->context, $type);
        return $func;
    }

    private SplObjectStorage $valueMap;
    private SplObjectStorage $blockMap;

    protected function compileFunction(Function_ $function, $func): void {
        $this->valueMap = new SplObjectStorage;
        $this->blockMap = new SplObjectStorage;
        foreach ($function->parameters as $index => $parameter) {
            $this->valueMap[$parameter->value] = $this->lib->jit_value_get_param($func, $index);
        }
        foreach ($function->blocks as $block) {
            $this->blockMap[$block] = $this->lib->jit_function_reserve_label($func);
        }
        foreach ($function->blocks as $block) {
            $this->compileBlock($func, $block);
        }
        $this->lib->jit_function_compile($func);
        unset($this->valueMap);
        unset($this->blockMap);
    }

    protected function compileBlock(jit_function_t $func, Block $block): void {
        $this->lib->jit_insn_label($func, $this->blockMap[$block]->addr());
        foreach ($block->ops as $op) {
            $this->compileOp($func, $op);
        }
    }

    protected function compileOp(jit_function_t $func, Op $op): void {
        if ($op instanceof Op\BinaryOp) {
            $this->compileBinaryOp($func, $op);
        } elseif ($op instanceof Op\ReturnVoid) {
            $this->lib->jit_insn_return($func, null);
        } elseif ($op instanceof Op\ReturnValue) {
            $this->lib->jit_insn_return($func, $this->valueMap[$op->value]);
        } else {
            throw new \LogicException("Unknown Op encountered: " . get_class($op));
        }
    }

    protected function compileBinaryOp(jit_function_t $func, Op\BinaryOp $op): void {
        if ($op instanceof Op\BinaryOp\Add) {
            $this->valueMap[$op->result] = $this->lib->jit_insn_add($func, $this->valueMap[$op->left], $this->valueMap[$op->right]);
        } else {
            throw new \LogicException("Unknown BinaryOp encountered: " . get_class($op));
        }
    }

    protected function buildResult(): CompiledUnit {
        return new LIBJIT\CompiledUnit($this, $this->functionMap, $this->signatureMap);
    }

}