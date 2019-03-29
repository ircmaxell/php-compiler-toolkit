<?php
declare(strict_types=1);

namespace PHPCompilerToolkit;

interface RValue {

    public function getType(): Type;

    public function asRValue(): RValue;
    
}