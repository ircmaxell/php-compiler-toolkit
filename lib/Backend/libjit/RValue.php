<?php
declare(strict_types=1);

namespace PHPCompilerToolkit\Backend\libjit;

use PHPCompilerToolkit\RValue as CoreRValue;
use PHPCompilerToolkit\Type as CoreType;
use libjit\jit_value_t;

class RValue implements CoreRValue {

    private Compiler $compiler;
    private Type $type;
    private ?jit_value_t $rvalue;

    public function __construct(Compiler $compiler, Type $type, ?jit_value_t $rvalue = null) {
        $this->compiler = $compiler;
        $this->type = $type;
        $this->rvalue = $rvalue;
    }

    public function getType(): CoreType {
        return $this->type;
    }

    public function setValue(jit_value_t $value): void {
        $this->rvalue = $value;
    }

    public function getValue(): jit_value_t {
        if ($this->rvalue === null) {
            throw new \LogicException("Use before define on RValue");
        }
        return $this->rvalue;
    }

    public function asRValue(): CoreRValue {
        return $this;
    }

}