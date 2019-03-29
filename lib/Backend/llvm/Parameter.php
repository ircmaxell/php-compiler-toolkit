<?php
declare(strict_types=1);

namespace PHPCompilerToolkit\Backend\llvm;

use PHPCompilerToolkit\Parameter as CoreParameter;
use PHPCompilerToolkit\RValue as CoreRValue;
use PHPCompilerToolkit\LValue as CoreLValue;
use PHPCompilerToolkit\Type as CoreType;
use llvm\LLVMValueRef;

class Parameter implements CoreParameter {

    private Compiler $compiler;
    private string $name;
    private Type $type;
    private LLVMValueRef $param;

    public function __construct(Compiler $compiler, string $name, Type $type) {
        $this->compiler = $compiler;
        $this->name = $name;
        $this->type = $type;
    }

    public function setParam(LLVMValueRef $param): void {
        $this->param = $param;
    }

    public function getType(): CoreType {
        return $this->type;
    }

    public function getName(): string {
        return $this->name;
    }

    public function asRValue(): CoreRValue {
        return new RValue(
            $this->compiler,
            $this->param,
            $this->type
        );
    }

    public function asLValue(): CoreLValue {
        throw new \LogicException("Not implemented yet");
    }
    
}