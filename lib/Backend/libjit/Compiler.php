<?php
declare(strict_types=1);

namespace PHPCompilerToolkit\Backend\libjit;

use PHPCompilerToolkit\AbstractCompiler;
use PHPCompilerToolkit\Type as CoreType;
use PHPCompilerToolkit\Function_ as CoreFunction;
use PHPCompilerToolkit\Parameter as CoreParameter;
use PHPCompilerToolkit\Result as CoreResult;

use libjit\libjit;
use libjit\jit_context_t;
use libjit\jit_type_t_ptr;
use libjit\jit_abi_t;

class Compiler extends AbstractCompiler {

    public libjit $lib;
    public jit_context_t $context;
    private ?Result $result = null;
    private array $functions;

    public function __construct() {
        $this->lib = new libjit;
        $this->context = $this->lib->jit_context_create();
    }

    protected function _createPrimitiveType(int $type): CoreType {
        switch ($type) {
            case CoreType::T_VOID:
                return new Type($this, $this->lib->jit_type_void, CoreType::PRIMITIVE_TYPE_MAP_TO_C[$type]);
            case CoreType::T_VOID_PTR:
                return new Type($this, $this->lib->jit_type_void_ptr, CoreType::PRIMITIVE_TYPE_MAP_TO_C[$type]);
            case CoreType::T_BOOL:
                return new Type($this, $this->lib->jit_type_sys_bool, CoreType::PRIMITIVE_TYPE_MAP_TO_C[$type]);
            case CoreType::T_CHAR:
                return new Type($this, $this->lib->jit_type_sys_char, CoreType::PRIMITIVE_TYPE_MAP_TO_C[$type]);
            case CoreType::T_SIGNED_CHAR:
                return new Type($this, $this->lib->jit_type_sys_schar, CoreType::PRIMITIVE_TYPE_MAP_TO_C[$type]);
            case CoreType::T_UNSIGNED_CHAR:
                return new Type($this, $this->lib->jit_type_sys_uchar, CoreType::PRIMITIVE_TYPE_MAP_TO_C[$type]);
            case CoreType::T_SHORT:
                return new Type($this, $this->lib->jit_type_short, CoreType::PRIMITIVE_TYPE_MAP_TO_C[$type]);
            case CoreType::T_UNSIGNED_SHORT:
                return new Type($this, $this->lib->jit_type_ushort, CoreType::PRIMITIVE_TYPE_MAP_TO_C[$type]);
            case CoreType::T_INT:
                return new Type($this, $this->lib->jit_type_int, CoreType::PRIMITIVE_TYPE_MAP_TO_C[$type]);
            case CoreType::T_UNSIGNED_INT:
                return new Type($this, $this->lib->jit_type_uint, CoreType::PRIMITIVE_TYPE_MAP_TO_C[$type]);
            case CoreType::T_LONG:
                return new Type($this, $this->lib->jit_type_long, CoreType::PRIMITIVE_TYPE_MAP_TO_C[$type]);
            case CoreType::T_UNSIGNED_LONG:
                return new Type($this, $this->lib->jit_type_ulong, CoreType::PRIMITIVE_TYPE_MAP_TO_C[$type]);
            case CoreType::T_LONG_LONG:
                return new Type($this, $this->lib->jit_type_sys_longlong, CoreType::PRIMITIVE_TYPE_MAP_TO_C[$type]);
            case CoreType::T_UNSIGNED_LONG_LONG:
                return new Type($this, $this->lib->jit_type_sys_ulonglong, CoreType::PRIMITIVE_TYPE_MAP_TO_C[$type]);
            case CoreType::T_FLOAT:
                return new Type($this, $this->lib->jit_type_float32, CoreType::PRIMITIVE_TYPE_MAP_TO_C[$type]);
            case CoreType::T_DOUBLE:
                return new Type($this, $this->lib->jit_type_float64, CoreType::PRIMITIVE_TYPE_MAP_TO_C[$type]);
            case CoreType::T_LONG_DOUBLE:
                return new Type($this, $this->lib->jit_type_sys_long_double, CoreType::PRIMITIVE_TYPE_MAP_TO_C[$type]);
            case CoreType::T_SIZE_T:
                return new Type($this, $this->lib->jit_type_nuint, CoreType::PRIMITIVE_TYPE_MAP_TO_C[$type]);
        }
        throw new \LogicException('Unknown primitive type found: ' . $type);
    }

    public function createParameter(string $name, CoreType $type): CoreParameter {
        return new Parameter(
            $this,
            $name,
            $type
        );
    }

    public function createFunction(string $name, CoreType $returnType, bool $isVarArgs, CoreParameter ...$params): CoreFunction {
        if ($isVarArgs) {
            throw new \LogicException('libjit doesn\'t support varargs');
        }
        $paramWrapper = $this->lib->makeArray(
            jit_type_t_ptr::class, 
            array_map(
                function(CoreParameter $param) {
                    return $param->getType()->getType();
                },
                $params
            )
        );
        $abi = $this->lib->getFFI()->new('jit_abi_t');
        $abi = libjit::jit_abi_cdecl;
        $type = $this->lib->jit_type_create_signature(
            new jit_abi_t($abi),
            $returnType->getType(), 
            $paramWrapper, 
            count($params),
            1
        );
        $func = $this->lib->jit_function_create($this->context, $type);
        foreach ($params as $idx => $param) {
            $param->setParam($this->lib->jit_value_get_param($func, $idx));
        }
        $function = new Function_($this, $func, $name, $returnType, $isVarArgs, ...$params);
        $this->functions[$name] = $function;

        return $function;
    }

    public function compileInPlace(): CoreResult {
        if ($this->result !== null) {
            return $this->result;
        }
        foreach ($this->functions as $function) {
            $function->compile();
        }
        $this->result = new Result(
            $this,
            $this->functions,
        );
        return $this->result;
    }

}