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
use PHPCompilerToolkit\IR\Value;
use PHPCompilerToolkit\IR\Value\Constant;
use PHPCompilerToolkit\Type;

use libjit\libjit as lib;
use libjit\jit_context_t;
use libjit\jit_type_t_ptr;
use libjit\jit_abi_t;
use libjit\jit_function_t;
use libjit\jit_value_t;
use libjit\jit_value_t_ptr;
use libjit\jit_long;
use libjit\jit_float64;
use libjit\jit_nint;

class LIBJIT extends BackendAbstract {

    public lib $lib;
    public jit_context_t $context;
    public SplObjectStorage $constantMap;
    public jit_abi_t $abi;

    public function __construct() {
        $this->lib = new lib;
        $abi = $this->lib->getFFI()->new('jit_abi_t');
        $abi = lib::jit_abi_cdecl;
        $this->abi = new jit_abi_t($abi);
    }

    protected int $optimizationLevel;

    protected function beforeCompile(Context $context, int $optimizationLevel): void {
        $this->context = $this->lib->jit_context_create();
        $this->optimizationLevel = $optimizationLevel;
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
        } elseif ($type instanceof Type\Struct) {
            $fieldWrapper = $this->lib->makeArray(
                jit_type_t_ptr::class,
                array_map(
                    function(Type\Struct\Field $field) {
                        return $this->typeMap[$field->type];
                    }, 
                    $type->fields
                )
            );
            return $this->lib->jit_type_create_struct($fieldWrapper, count($type->fields), 1);
        }
        throw new \LogicException("Type " . get_class($type) . " not implemented yet");
    }

    protected array $constants = [];
    protected function compileConstant(Constant $constant) {
        // libjit allocates constants per function, do nothing
        $this->constants[] = $constant;
    }

    protected function importFunction(Function_ $function) {
        throw new \LogicException("Function importing is not implemented yet for libjit");
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
        $type = $this->lib->jit_type_create_signature(
            $this->abi,
            $this->typeMap[$function->returnType], 
            $paramWrapper, 
            count($function->parameters),
            1
        );
        $func = $this->lib->jit_function_create($this->context, $type);
        $this->lib->jit_function_set_optimization_level($func, $this->optimizationLevel);
        return $func;
    }

    private SplObjectStorage $valueMap;
    private SplObjectStorage $blockMap;
    private SplObjectStorage $localMap;

    protected function compileFunction(Function_ $function, $func): void {
        $this->valueMap = new SplObjectStorage;
        $this->blockMap = new SplObjectStorage;
        $this->localMap = new SplObjectStorage;
        foreach ($this->constants as $constant) {
            if ($constant->type->isFloatingPoint()) {
                $this->valueMap[$constant] = $this->lib->jit_value_create_float64_constant($func, $this->typeMap[$constant->type], new jit_float64($this->$constant->value));
            } else {
                $this->valueMap[$constant] = $this->lib->jit_value_create_long_constant($func, $this->typeMap[$constant->type], new jit_long($constant->value));
            }
        }
        foreach ($function->parameters as $index => $parameter) {
            $this->valueMap[$parameter->value] = $this->lib->jit_value_get_param($func, $index);
        }
        foreach ($function->locals as $local) {
            $this->valueMap[$local] = $this->lib->jit_value_create($func, $this->typeMap[$local->type]);
        }
        foreach ($function->blocks as $block) {
            $this->blockMap[$block] = $this->lib->jit_function_reserve_label($func);
            foreach ($block->arguments as $argument) {
                $this->localMap[$argument] = $this->lib->jit_value_create($func, $this->typeMap[$argument->type]);
            }
        }
        foreach ($function->blocks as $block) {
            $this->compileBlock($func, $block);
        }
        unset($this->localMap);
        unset($this->valueMap);
        unset($this->blockMap);
    }

    protected function compileBlock(jit_function_t $func, Block $block): void {
        $this->lib->jit_insn_label($func, $this->blockMap[$block]->addr());
        foreach ($block->arguments as $argument) {
            $this->valueMap[$argument] = $this->lib->jit_insn_load($func, $this->localMap[$argument]);
        }
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
        } elseif ($op instanceof Op\Call) {
            $this->valueMap[$op->return] = $this->doCall($func, $op);
        } elseif ($op instanceof Op\CallNoReturn) {
            $this->doCall($func, $op);
        } elseif ($op instanceof Op\FieldRead) {
            $tmp = $this->lib->jit_type_get_offset($this->typeMap[$op->struct->type], $op->struct->type->fieldOffset($op->field));
            $offset = new jit_nint($tmp->getData());
            $this->valueMap[$op->return] = $this->lib->jit_insn_load_relative(
                $func,
                $this->lib->jit_insn_address_of($func, $this->valueMap[$op->struct]),
                $offset,
                $this->typeMap[$op->field->type]
            );
        } elseif ($op instanceof Op\FieldWrite) {
            $tmp = $this->lib->jit_type_get_offset($this->typeMap[$op->struct->type], $op->struct->type->fieldOffset($op->field));
            $offset = new jit_nint($tmp->getData());
            $this->lib->jit_insn_store_relative(
                $func,
                $this->lib->jit_insn_address_of($func, $this->valueMap[$op->struct]),
                $offset,
                $this->valueMap[$op->value]
            );
        } elseif ($op instanceof Op\BlockCall) {
            $this->compileBlockCall($func, $op);
        } elseif ($op instanceof Op\ConditionalBlockCall) {
            $if = $this->lib->jit_function_reserve_label($func);
            $this->lib->jit_insn_branch_if($func, $this->valueMap[$op->cond], $if->addr());
            $this->compileBlockCall($func, $op->ifFalse);
            $this->lib->jit_insn_label($func, $if->addr());
            $this->compileBlockCall($func, $op->ifTrue);
        } else {
            throw new \LogicException("Unknown Op encountered: " . get_class($op));
        }
    }

    protected function doCall(jit_function_t $func, Op $op): jit_value_t {
        $paramTypeWrapper = $this->lib->makeArray(
            jit_type_t_ptr::class,
            array_map(
                function(Parameter $param) {
                    return $this->typeMap[$param->type];
                }, 
                $op->function->parameters
            )
        );
        $type = $this->lib->jit_type_create_signature(
            $this->abi,
            $this->typeMap[$op->function->returnType], 
            $paramTypeWrapper, 
            count($op->function->parameters),
            1
        );
        $paramWrapper = $this->lib->makeArray(
            jit_value_t_ptr::class,
            array_map(
                function(Value $value) {
                    return $this->valueMap[$value];
                }, 
                $op->parameters
            )
        );
        return $this->lib->jit_insn_call(
            $func,
            $op->function->name,
            $this->functionMap[$op->function->name],
            $type,
            $paramWrapper,
            count($op->parameters),
            0
        );
    }

    protected function compileBlockCall(jit_function_t $func, Op\BlockCall $op): void {
        foreach ($op->block->arguments as $index => $argument) {
            $this->lib->jit_insn_store($func, $this->localMap[$argument], $this->valueMap[$op->arguments[$index]]);
        }
        $this->lib->jit_insn_branch($func, $this->blockMap[$op->block]->addr());

    }

    protected function compileBinaryOp(jit_function_t $func, Op\BinaryOp $op): void {
        if ($op instanceof Op\BinaryOp\Add) {
            $this->valueMap[$op->result] = $this->lib->jit_insn_add($func, $this->valueMap[$op->left], $this->valueMap[$op->right]);
        } elseif ($op instanceof Op\BinaryOp\BitwiseAnd) {
            $this->valueMap[$op->result] = $this->lib->jit_insn_and($func, $this->valueMap[$op->left], $this->valueMap[$op->right]);
        } elseif ($op instanceof Op\BinaryOp\BitwiseOr) {
            $this->valueMap[$op->result] = $this->lib->jit_insn_or($func, $this->valueMap[$op->left], $this->valueMap[$op->right]);
        } elseif ($op instanceof Op\BinaryOp\BitwiseXor) {
            $this->valueMap[$op->result] = $this->lib->jit_insn_xor($func, $this->valueMap[$op->left], $this->valueMap[$op->right]);
        } elseif ($op instanceof Op\BinaryOp\Div) {
            $this->valueMap[$op->result] = $this->lib->jit_insn_div($func, $this->valueMap[$op->left], $this->valueMap[$op->right]);
        } elseif ($op instanceof Op\BinaryOp\EQ) {
            $this->valueMap[$op->result] = $this->lib->jit_insn_eq($func, $this->valueMap[$op->left], $this->valueMap[$op->right]);
        } elseif ($op instanceof Op\BinaryOp\GE) {
            $this->valueMap[$op->result] = $this->lib->jit_insn_ge($func, $this->valueMap[$op->left], $this->valueMap[$op->right]);
        } elseif ($op instanceof Op\BinaryOp\GT) {
            $this->valueMap[$op->result] = $this->lib->jit_insn_gt($func, $this->valueMap[$op->left], $this->valueMap[$op->right]);
        } elseif ($op instanceof Op\BinaryOp\LE) {
            $this->valueMap[$op->result] = $this->lib->jit_insn_le($func, $this->valueMap[$op->left], $this->valueMap[$op->right]);
        } elseif ($op instanceof Op\BinaryOp\LogicalAnd) {
            $this->valueMap[$op->result] = $this->lib->jit_insn_and(
                $func, 
                $this->toLogicalValue($func, $this->valueMap[$op->left]), 
                $this->toLogicalValue($func, $this->valueMap[$op->right])
            );
        } elseif ($op instanceof Op\BinaryOp\LogicalOr) {
            $this->valueMap[$op->result] = $this->lib->jit_insn_and(
                $func, 
                $this->toLogicalValue($func, $this->valueMap[$op->left]), 
                $this->toLogicalValue($func, $this->valueMap[$op->right])
            );
        } elseif ($op instanceof Op\BinaryOp\LT) {
            $this->valueMap[$op->result] = $this->lib->jit_insn_lt($func, $this->valueMap[$op->left], $this->valueMap[$op->right]);
        } elseif ($op instanceof Op\BinaryOp\Mod) {
            $this->valueMap[$op->result] = $this->lib->jit_insn_rem($func, $this->valueMap[$op->left], $this->valueMap[$op->right]);
        } elseif ($op instanceof Op\BinaryOp\Mul) {
            $this->valueMap[$op->result] = $this->lib->jit_insn_mul($func, $this->valueMap[$op->left], $this->valueMap[$op->right]);
        } elseif ($op instanceof Op\BinaryOp\NE) {
            $this->valueMap[$op->result] = $this->lib->jit_insn_ne($func, $this->valueMap[$op->left], $this->valueMap[$op->right]);
        } elseif ($op instanceof Op\BinaryOp\SL) {
            $this->valueMap[$op->result] = $this->lib->jit_insn_shl($func, $this->valueMap[$op->left], $this->valueMap[$op->right]);
        } elseif ($op instanceof Op\BinaryOp\SR) {
            $this->valueMap[$op->result] = $this->lib->jit_insn_shr($func, $this->valueMap[$op->left], $this->valueMap[$op->right]);
        } elseif ($op instanceof Op\BinaryOp\Sub) {
            $this->valueMap[$op->result] = $this->lib->jit_insn_sub($func, $this->valueMap[$op->left], $this->valueMap[$op->right]);
        } else {
            throw new \LogicException("Unknown BinaryOp encountered: " . get_class($op));
        }
    }

    protected function toLogicalValue(jit_function_t $func, jit_value_t $value): jit_value_t {
        throw new \LogicalException("Unknown how to do yet, but todo in the future");
    }

    protected function buildResult(): CompiledUnit {
        return new LIBJIT\CompiledUnit($this, $this->functionMap, $this->signatureMap);
    }

}