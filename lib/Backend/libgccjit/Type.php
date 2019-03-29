<?php
declare(strict_types=1);

namespace PHPCompilerToolkit\Backend\libgccjit;
use libgccjit\gcc_jit_type_ptr;
use PHPCompilerToolkit\Type as CoreType;

class Type implements CoreType {

    private Compiler $compiler;
    private gcc_jit_type_ptr $type;
    private string $ctype;

    public function __construct(Compiler $compiler, gcc_jit_type_ptr $type, string $ctype) {
        $this->compiler = $compiler;
        $this->type = $type;
        $this->ctype = $ctype;
    }

    public function getType(): gcc_jit_type_ptr {
        return $this->type;
    }

    public function getPointer(): CoreType {
        return new Type(
            $this->compiler,
            $this->compiler->lib->gcc_jit_type_get_pointer($this->type),
            $this->ctype . '*'
        );
    }

    public function getConst(): CoreType {
        return new Type(
            $this->compiler,
            $this->compiler->lib->gcc_jit_type_get_const($this->type),
            'const ' . $this->ctype
        );
    }

    public function getVolatile(): CoreType {
        return new Type(
            $this->compiler,
            $this->compiler->lib->gcc_jit_type_get_volatile($this->type),
            'volatile ' . $this->ctype
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
            ),
            '(' . $this->ctype . ')[' . $this->numElements . ']'
        );
    }

    public function asCString(): string {
        return $this->ctype;
    }
}