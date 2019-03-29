<?php
declare(strict_types=1);

namespace PHPCompilerToolkit\Backend\libjit;

use PHPCompilerToolkit\Function_ as CoreFunction;
use PHPCompilerToolkit\Parameter as CoreParameter;
use PHPCompilerToolkit\Type as CoreType;
use PHPCompilerToolkit\Block as CoreBlock;
use libjit\jit_function_t;

class Function_ implements CoreFunction {

    private Compiler $compiler;
    private jit_function_t $func;
    private string $name;
    private Type $returnType;
    private bool $isVariadic; 
    private array $params;
    private array $blocks = [];

    public function __construct(Compiler $compiler, jit_function_t $func, string $name, Type $returnType, bool $isVariadic, Parameter ...$params) {
        $this->compiler = $compiler;
        $this->func = $func;
        $this->name = $name;
        $this->returnType = $returnType;
        $this->isVariadic = $isVariadic;
        $this->params = $params;
    }

    public function getFunc(): jit_function_t {
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
        $block = new Block(
            $this->compiler,
            $this,
            $name
        );
        $this->blocks[] = $block;
        return $block;
    }

    public function compile(): void {
        foreach ($this->blocks as $block) {
            $block->compile();
        }
        $this->compiler->lib->jit_function_compile($this->func);
    }
}