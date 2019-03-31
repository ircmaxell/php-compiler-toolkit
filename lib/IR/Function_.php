<?php
declare(strict_types=1);

namespace PHPCompilerToolkit\IR;
use PHPCompilerToolkit\Context;
use PHPCompilerToolkit\Type;


class Function_ {

    public Context $context;
    public Type $returnType;
    public array $parameters;
    public array $parametersByName = [];
    public string $name;
    public bool $isVariadic;
    public array $blocks;

    public function __construct(Context $context, string $name, Type $returnType, bool $isVariadic, Parameter ... $parameters) {
        $this->context = $context;
        $this->name = $name;
        $this->returnType = $returnType;
        $this->parameters = $parameters;
        foreach ($parameters as $parameter) {
            $this->parametersByName[$parameter->name] = $parameter;
        }
        $this->isVariadic = $isVariadic;
        $context->functions[] = $this;
    }

    public function createBlock(string $name): Block {
        $block = new Block($this, $name);
        if (empty($this->blocks)) {
            foreach ($this->parameters as $parameter) {
                $parameter->setValue(new Value\Value($block, $parameter->type));
            }
        }
        $this->blocks[] = $block;
        return $block;
    }


}