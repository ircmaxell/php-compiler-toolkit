<?php
declare(strict_types=1);

namespace PHPCompilerToolkit;

interface Parameter extends LValue {

    public function getName(): string;
    
}