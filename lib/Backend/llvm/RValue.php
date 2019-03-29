<?php
declare(strict_types=1);

namespace PHPCompilerToolkit\Backend\llvm;

use PHPCompilerToolkit\RValue as CoreRValue;
use PHPCompilerToolkit\Type as CoreType;
use llvm\LLVMValueRef;

class RValue implements CoreRValue {

    private Compiler $compiler;
    private Type $type;
    private LLVMValueRef $value;

    public function __construct(Compiler $compiler, LLVMValueRef $value, Type $type) {
        $this->compiler = $compiler;
        $this->type = $type;
        $this->value = $value;
    }

    public function getType(): CoreType {
        return $this->type;
    }

    public function getValue(): LLVMValueRef {
        return $this->value;
    }

    public function asRValue(): CoreRValue {
        return $this;
    }

}