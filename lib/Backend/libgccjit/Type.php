<?php
declare(strict_types=1);

namespace PHPCompilerToolkit\Backend\libgccjit;
use libgccjit\gcc_jit_type_ptr;
use PHPCompilerToolkit\Type as CoreType;

class Type implements CoreType {

    private Compiler $compiler;
    private gcc_jit_type_ptr $type;

    public function __construct(Compiler $compiler, gcc_jit_type_ptr $type) {
        $this->compiler = $compiler;
        $this->type = $type;
    }

    public function getPointer(): CoreType {
        return new Type(
            $this->compiler,
            $this->compiler->lib->gcc_jit_type_get_pointer($this->type)
        );
    }

    public function getConst(): CoreType {
        return new Type(
            $this->compiler,
            $this->compiler->lib->gcc_jit_type_get_const($this->type)
        );
    }

    public function getVolatile(): CoreType {
        return new Type(
            $this->compiler,
            $this->compiler->lib->gcc_jit_type_get_volatile($this->type)
        );
    }

    public function newArrayType(int $numElements): CoreType {
        return new Type(
            $this->compiler,
            $this->compiler->lib->gcc_jit_context_new_array_type(
                $this->compiler->context, 
                $this->compiler->location(), 
                $this->type,
                $numElements
            )
        );
    }
}