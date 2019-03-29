<?php
declare(strict_types=1);

namespace PHPCompilerToolkit\Backend\libgccjit;

use PHPCompilerToolkit\Parameter as CoreParameter;
use PHPCompilerToolkit\RValue as CoreRValue;
use PHPCompilerToolkit\LValue as CoreLValue;
use PHPCompilerToolkit\Type as CoreType;
use libgccjit\gcc_jit_param_ptr;

class Parameter implements CoreParameter {

    private Compiler $compiler;
    private string $name;
    private gcc_jit_param_ptr $param;
    private Type $type;

    public function __construct(Compiler $compiler, string $name, gcc_jit_param_ptr $param, Type $type) {
        $this->compiler = $compiler;
        $this->name = $name;
        $this->param = $param;
        $this->type = $type;
    }

    public function getType(): CoreType {
        return $this->type;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getParam(): gcc_jit_param_ptr {
        return $this->param;
    }

    public function asRValue(): CoreRValue {
        return new RValue(
            $this->compiler,
            $this->compiler->lib->gcc_jit_param_as_rvalue($this->param),
            $this->type
        );
    }

    public function asLValue(): CoreLValue {
        return new LValue(
            $this->compiler,
            $this->compiler->lib->gcc_jit_param_as_lvalue($this->param),
            $this->type
        );
    }
    
}