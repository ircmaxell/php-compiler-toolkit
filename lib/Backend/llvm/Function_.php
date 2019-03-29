<?php
declare(strict_types=1);

namespace PHPCompilerToolkit\Backend\llvm;

use PHPCompilerToolkit\Function_ as CoreFunction;
use PHPCompilerToolkit\Type as CoreType;
use llvm\LLVMValueRef;

class Function_ implements CoreFunction {

    private Compiler $compiler;
    private LLVMValueRef $func;
    private string $name;
    private Type $returnType;
    private bool $isVariadic; 
    private array $paramTypes;

    public function __construct(Compiler $compiler, LLVMValueRef $func, string $name, Type $returnType, bool $isVariadic, Type ...$paramTypes) {
        $this->compiler = $compiler;
        $this->func = $func;
        $this->name = $name;
        $this->returnType = $returnType;
        $this->isVariadic = $isVariadic;
        $this->paramTypes = $paramTypes;
    }

    public function getFunc(): LLVMValueRef {
        return $this->func;
    }

    public function getReturnType(): CoreType {
        return $this->returnType;
    }

    public function getParamTypes(): array {
        return $this->paramTypes;
    }

    public function getName(): string {
        return $this->name;
    }

    public function isVariadic(): bool {
        return $this->isVariadic;
    }

}