<?php
declare(strict_types=1);

namespace PHPCompilerToolkit\Backend\libgccjit;

use PHPCompilerToolkit\RValue as CoreRValue;
use PHPCompilerToolkit\LValue as CoreLValue;
use PHPCompilerToolkit\Type as CoreType;
use libgccjit\gcc_jit_param_ptr;

class LValue implements CoreLValue {

    private Compiler $compiler;
    private gcc_jit_lvalue_ptr $lvalue;
    private Type $type;

    public function __construct(Compiler $compiler, gcc_jit_lvalue_ptr $lvalue, Type $type) {
        $this->compiler = $compiler;
        $this->lvalue = $lvalue;
        $this->type = $type;
    }

    public function getType(): CoreType {
        return $this->type;
    }

    public function getLValue(): gcc_jit_lvalue_ptr {
        return $this->lvalue;
    }

    public function asLValue(): CoreLValue {
        return $this;
    }

    public function asRValue(): CoreRValue {
        return new RValue(
            $this->compiler,
            $this->compiler->lib->gcc_jit_lvalue_as_rvalue($this->lvalue),
            $this->type
        );
    }
    
}