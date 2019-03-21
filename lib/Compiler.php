<?php
declare(strict_types=1);

namespace PHPCompilerToolkit;

interface Compiler {
    
    public function createPrimitiveType(int $type): Type;



}