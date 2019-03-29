<?php
declare(strict_types=1);

namespace PHPCompilerToolkit;

interface Compiler {
    
    public function createPrimitiveType(int $type): Type;

    public function createParameter(string $name, Type $type): Parameter;

    public function createFunction(string $name, Type $returnType, bool $isVarArgs, Parameter ...$params): Function_;

    public function compileInPlace(): Result;
}