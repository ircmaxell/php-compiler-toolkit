<?php
declare(strict_types=1);

namespace PHPCompilerToolkit;

interface CompiledUnit {

    public function getCallable(string $functionName): callable;

}