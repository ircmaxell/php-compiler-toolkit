<?php
declare(strict_types=1);

namespace PHPCompilerToolkit;

use PHPCompilerToolkit\IR\Function_;

interface Backend {

    public function compile(Context $context): CompiledUnit;
    
}