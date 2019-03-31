<?php
declare(strict_types=1);

namespace PHPCompilerToolkit;

interface CompiledUnit {

    public function getCallable(string $functionName): callable;

    public function dumpToFile(string $filename): void;

    public function dumpCompiledToFile(string $filename): void;


}