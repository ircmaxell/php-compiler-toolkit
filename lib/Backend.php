<?php
declare(strict_types=1);

namespace PHPCompilerToolkit;

use PHPCompilerToolkit\IR\Function_;

interface Backend {
    public const O0 = 0;
    public const O1 = 1;
    public const O2 = 2;
    public const O3 = 3;

    public function compile(Context $context, int $optimizationLevel = Backend::O0): CompiledUnit;
    
}