<?php
declare(strict_types=1);

namespace PHPCompilerToolkit\Backend\libgccjit;

use PHPCompilerToolkit\AbstractCompiler;
use PHPCompilerToolkit\Type as CoreType;
use PHPCompilerToolkit\Function_ as CoreFunction;
use PHPCompilerToolkit\Parameter as CoreParameter;
use PHPCompilerToolkit\Result as CoreResult;

use libgccjit\libgccjit;
use libgccjit\gcc_jit_context_ptr;
use libgccjit\gcc_jit_param_ptr_ptr;
use libgccjit\gcc_jit_result_ptr;


class Compiler extends AbstractCompiler {

    public gcc_jit_context_ptr $context;
    public libgccjit $lib;
    private ?Result $result = null;
    private array $functions = [];

    const PRIMITIVE_TYPE_MAP = [
        CoreType::T_VOID => libgccjit::GCC_JIT_TYPE_VOID,
        CoreType::T_VOID_PTR => libgccjit::GCC_JIT_TYPE_VOID_PTR,
        CoreType::T_BOOL => libgccjit::GCC_JIT_TYPE_BOOL,
        CoreType::T_CHAR => libgccjit::GCC_JIT_TYPE_CHAR,
        CoreType::T_SIGNED_CHAR => libgccjit::GCC_JIT_TYPE_SIGNED_CHAR,
        CoreType::T_UNSIGNED_CHAR => libgccjit::GCC_JIT_TYPE_UNSIGNED_CHAR,
        CoreType::T_SHORT => libgccjit::GCC_JIT_TYPE_SHORT,
        CoreType::T_UNSIGNED_SHORT => libgccjit::GCC_JIT_TYPE_UNSIGNED_SHORT,
        CoreType::T_INT => libgccjit::GCC_JIT_TYPE_INT,
        CoreType::T_UNSIGNED_INT  => libgccjit::GCC_JIT_TYPE_UNSIGNED_INT,
        CoreType::T_LONG  => libgccjit::GCC_JIT_TYPE_LONG,
        CoreType::T_UNSIGNED_LONG  => libgccjit::GCC_JIT_TYPE_UNSIGNED_LONG,
        CoreType::T_LONG_LONG  => libgccjit::GCC_JIT_TYPE_LONG_LONG,
        CoreType::T_UNSIGNED_LONG_LONG  => libgccjit::GCC_JIT_TYPE_UNSIGNED_LONG_LONG,
        CoreType::T_FLOAT  => libgccjit::GCC_JIT_TYPE_FLOAT,
        CoreType::T_DOUBLE  => libgccjit::GCC_JIT_TYPE_DOUBLE,
        CoreType::T_LONG_DOUBLE  => libgccjit::GCC_JIT_TYPE_LONG_DOUBLE,
        CoreType::T_SIZE_T  => libgccjit::GCC_JIT_TYPE_SIZE_T,
    ];

    public function __construct() {
        $this->lib = new libgccjit;
        $this->context = $this->lib->gcc_jit_context_acquire();
    }

    protected function _createPrimitiveType(int $type): CoreType {
        return new Type(
            $this,
            $this->lib->gcc_jit_context_get_type($this->context, self::PRIMITIVE_TYPE_MAP[$type]),
            CoreType::PRIMITIVE_TYPE_MAP_TO_C[$type]
        );
    }

    public function createParameter(string $name, CoreType $type): CoreParameter {
        return new Parameter(
            $this,
            $name,
            $this->lib->gcc_jit_context_new_param($this->context, null, $type->getType(), $name),
            $type
        );
    }

    public function createFunction(string $name, CoreType $returnType, bool $isVarArgs, CoreParameter ...$params): CoreFunction {
        $paramValues = array_map(
            function(CoreParameter $param) {
                return $param->getParam();
            },
            $params
        );
        $paramWrapper = $this->lib->makeArray(
            gcc_jit_param_ptr_ptr::class, 
            $paramValues
        );
        $func = $this->lib->gcc_jit_context_new_function(
            $this->context,
            null,
            libgccjit::GCC_JIT_FUNCTION_EXPORTED,
            $returnType->getType(),
            $name, 
            count($params),
            $paramWrapper,
            $isVarArgs ? 1 : 0
        );
        $function = new Function_($this, $func, $name, $returnType, $isVarArgs, ...$params);
        $this->functions[$name] = $function;
        return $function;
    }
    
    public function compileInPlace(): CoreResult {
        if ($this->result !== null) {
            return $this->result;
        }
        $this->result = new Result(
            $this,
            $this->functions,
            $this->lib->gcc_jit_context_compile($this->context)
        );
        return $this->result;
    }

}