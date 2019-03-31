<?php
declare(strict_types=1);

namespace PHPCompilerToolkit;

interface Type {
    
    public function getPointer(): Type;

    public function getConst(): Type;

    public function getVolatile(): Type;

    public function newArrayType(int $numElements): Type;

    public function asCString(): string;

}