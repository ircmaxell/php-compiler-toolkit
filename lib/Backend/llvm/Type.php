<?php
declare(strict_types=1);

namespace PHPCompilerToolkit\Backend\llvm;
use PHPCompilerToolkit\Type as CoreType;
use llvm\LLVMTypeRef;

class Type implements CoreType {
    const IS_CONST = 1;
    const IS_VOLATILE = 2;
    const IS_SIGNED = 4;

    private Compiler $compiler;
    private LLVMTypeRef $type;
    private int $is;

    public function __construct(Compiler $compiler, LLVMTypeRef $type, int $is = 0) {
        $this->compiler = $compiler;
        $this->type = $type;
        $this->is = $is;
    }

    public function getPointer(): CoreType {
        return new Type(
            $this->compiler,
            $this->compiler->lib->LLVMPointerType($this->type, 0)
        );
    }

    public function getConst(): CoreType {
        return new Type(
            $this->compiler,
            $this->type,
            $this->is | Type::IS_CONST
        );
    }

    public function getVolatile(): CoreType {
        return new Type(
            $this->compiler,
            $this->type,
            $this->is | Type::IS_VOLATILE
        );
    }

    public function newArrayType(int $numElements): CoreType {
        return new Type(
            $this->compiler,
            $this->compiler->lib->LLVMArrayType(
                $this->type,
                $numElements
            )
        );
    }
}