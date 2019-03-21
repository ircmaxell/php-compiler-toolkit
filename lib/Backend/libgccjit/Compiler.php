<?php
declare(strict_types=1);

namespace PHPCompilerToolkit\Backend\libgccjit;
use PHPCompilerToolkit\AbstractCompiler;
use PHPCompilerToolkit\Type as CoreType;

class Compiler extends AbstractCompiler {

    public \gcc_jit_context_ptr $context;

    const PRIMITIVE_TYPE_MAP = [
        CoreType::VOID => \GCC_JIT_TYPE_VOID,
        CoreType::VOID_PTR => \GCC_JIT_TYPE_VOID_PTR,
        CoreType::BOOL => \GCC_JIT_TYPE_BOOL,
        CoreType::CHAR => \GCC_JIT_TYPE_CHAR,
        CoreType::SIGNED_CHAR => \GCC_JIT_TYPE_SIGNED_CHAR,
        CoreType::UNSIGNED_CHAR => \GCC_JIT_TYPE_UNSIGNED_CHAR,
        CoreType::SHORT => \GCC_JIT_TYPE_SHORT,
        CoreType::UNSIGNED_SHORT => \GCC_JIT_TYPE_UNSIGNED_SHORT,
        CoreType::INT => \GCC_JIT_TYPE_INT,
        CoreType::UNSIGNED_INT  => \GCC_JIT_TYPE_UNSIGNED_INT,
        CoreType::LONG  => \GCC_JIT_TYPE_LONG,
        CoreType::UNSIGNED_LONG  => \GCC_JIT_TYPE_UNSIGNED_LONG,
        CoreType::LONG_LONG  => \GCC_JIT_TYPE_LONG_LONG,
        CoreType::UNSIGNED_LONG_LONG  => \GCC_JIT_TYPE_UNSIGNED_LONG_LONG,
        CoreType::FLOAT  => \GCC_JIT_TYPE_FLOAT,
        CoreType::DOUBLE  => \GCC_JIT_TYPE_DOUBLE,
        CoreType::LONG_DOUBLE  => \GCC_JIT_TYPE_LONG_DOUBLE,
        CoreType::SIZE_T  => \GCC_JIT_TYPE_SIZE_T,
        CoreType::FILE_PTR  => \GCC_JIT_TYPE_FILE_PTR,
    ];

    public function __construct() {
        $this->context = \gcc_jit_context_acquire();
    }

    protected function _createPrimitiveType(int $type): CoreType {
        return new Type(
            $this,
            \gcc_jit_context_get_type($this->context, self::PRIMITIVE_TYPE_MAP[$type])
        );
    }

}