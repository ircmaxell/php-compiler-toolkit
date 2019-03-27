<?php
declare(strict_types=1);

namespace PHPCompilerToolkit\Backend\libgccjit;
use PHPCompilerToolkit\AbstractCompiler;
use PHPCompilerToolkit\Type as CoreType;
use libgccjit\libgccjit;
use libgccjit\gcc_jit_context_ptr;

class Compiler extends AbstractCompiler {

    public gcc_jit_context_ptr $context;
    public libgccjit $lib;

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
            $this->lib->gcc_jit_context_get_type($this->context, self::PRIMITIVE_TYPE_MAP[$type])
        );
    }

}