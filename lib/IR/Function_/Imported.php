<?php
declare(strict_types=1);

namespace PHPCompilerToolkit\IR\Function_;

use PHPCompilerToolkit\IR\Function_;
use PHPCompilerToolkit\Context;
use PHPCompilerToolkit\Type;


class Imported implements Function_ {

    public Context $context;
    public Type $returnType;
    public array $parameters;
    public array $parametersByName = [];
    public string $name;
    public bool $isVariadic;

    public function __construct(Context $context, string $name, Type $returnType, bool $isVariadic, Parameter ... $parameters) {
        $this->context = $context;
        $this->name = $name;
        $this->returnType = $returnType;
        $this->parameters = $parameters;
        foreach ($parameters as $parameter) {
            $this->parametersByName[$parameter->name] = $parameter;
        }
        $this->isVariadic = $isVariadic;
        $context->imports[] = $this;
    }

}