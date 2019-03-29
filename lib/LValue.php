<?php
declare(strict_types=1);

namespace PHPCompilerToolkit;

interface LValue extends RValue {

    public function asLValue(): LValue;
    
}