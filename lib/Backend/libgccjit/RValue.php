<?php
declare(strict_types=1);

namespace PHPCompilerToolkit\Backend\libgccjit;

use PHPCompilerToolkit\RValue as CoreRValue;
use PHPCompilerToolkit\Type as CoreType;
use libgccjit\gcc_jit_rvalue_ptr;

class RValue implements CoreRValue {

    private Compiler $compiler;
    private gcc_jit_rvalue_ptr $rvalue;
    private Type $type;

    public function __construct(Compiler $compiler, gcc_jit_rvalue_ptr $rvalue, Type $type) {
        $this->compiler = $compiler;
        $this->rvalue = $rvalue;
        $this->type = $type;
    }

    public function getType(): CoreType {
        return $this->type;
    }

    public function getRValue(): gcc_jit_rvalue_ptr {
        return $this->rvalue;
    }
    
    public function asRValue(): CoreRValue {
        return $this;
    }
}