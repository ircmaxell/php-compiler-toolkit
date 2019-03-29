<?php
declare(strict_types=1);

namespace PHPCompilerToolkit\Backend\libgccjit;

use PHPCompilerToolkit\Function_ as CoreFunction;
use PHPCompilerToolkit\Parameter as CoreParameter;
use PHPCompilerToolkit\Type as CoreType;
use PHPCompilerToolkit\Block as CoreBlock;
use libgccjit\gcc_jit_function_ptr;
use libgccjit\gcc_jit_context_ptr;

class Function_ implements CoreFunction {

    private Compiler $compiler;
    private gcc_jit_function_ptr $func;
    private string $name;
    private Type $returnType;
    private bool $isVariadic; 
    private array $params;

    public function __construct(Compiler $compiler, gcc_jit_function_ptr $func, string $name, Type $returnType, bool $isVariadic, Parameter ...$params) {
        $this->compiler = $compiler;
        $this->func = $func;
        $this->name = $name;
        $this->returnType = $returnType;
        $this->isVariadic = $isVariadic;
        $this->params = $params;
    }

    public function getFunc(): LLVMValueRef {
        return $this->func;
    }

    public function getReturnType(): CoreType {
        return $this->returnType;
    }

    public function getParameters(): array {
        return $this->params;
    }

    public function getName(): string {
        return $this->name;
    }

    public function isVariadic(): bool {
        return $this->isVariadic;
    }

    public function getParameterIndex(int $index): CoreParameter {
        if (isset($this->params[$index])) {
            return $this->params[$index];
        }
        throw new \LogicException("Unknown parameter index: $index");
    }

    public function getParameterByName(string $name): CoreParameter {
        foreach ($this->params as $param) {
            if ($name === $param->getName()) {
                return $param;
            }
        }
        throw new \LogicException("Unknown parameter name: $name");
    }

    public function createBlock(string $name): CoreBlock {
        return new Block(
            $this->compiler,
            $this,
            $this->compiler->lib->gcc_jit_function_new_block($this->func, $name),
            $name
        );
    }

}