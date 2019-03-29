<?php
declare(strict_types=1);

namespace PHPCompilerToolkit;

interface Result {

    public function getCallable(string $functionName): callable;

}