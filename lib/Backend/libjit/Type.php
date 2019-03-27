<?php
declare(strict_types=1);

namespace PHPCompilerToolkit\Backend\libjit;

use libjit\jit_type_t;
use libjit\libjit;

use PHPCompilerToolkit\Type as CoreType;

class Type implements CoreType {

    private Compiler $compiler;
    private jit_type_t $type;

    public function __construct(Compiler $compiler, jit_type_t $type) {
        $this->compiler = $compiler;
        $this->type = $type;
    }

    public function __destruct() {
        $this->compiler->lib->jit_type_free($this->type);
    }

    public function getPointer(): CoreType {
        return new Type(
            $this->compiler,
            $this->compiler->lib->jit_type_create_pointer($this->type, 1)
        );
    }

    public function getConst(): CoreType {
        return new Type(
            $this->compiler,
            $this->compiler->lib->jit_type_create_tagged($this->type, libjit::JIT_TYPETAG_CONST, null, null, 1)
        );
    }

    public function getVolatile(): CoreType {
        return new Type(
            $this->compiler,
            $this->compiler->lib->jit_type_create_tagged($this->type, libjit::JIT_TYPETAG_VOLATILE, null, null, 1)
        );
    }

    public function newArrayType(int $numElements): CoreType {
        // libjit doesn't have array types
        return $this->getPointer();
    }
}