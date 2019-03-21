<?php
declare(strict_types=1);

namespace PHPCompilerToolkit;

interface Type {
    
    public const VOID = 1;
    public const VOID_PTR = 2;
    public const BOOL = 3;
    public const CHAR = 4;
    public const SIGNED_CHAR = 5;
    public const UNSIGNED_CHAR = 6;
    public const SHORT = 7;
    public const UNSIGNED_SHORT = 8;
    public const INT = 9;
    public const UNSIGNED_INT = 10;
    public const LONG = 11;
    public const UNSIGNED_LONG = 12;
    public const LONG_LONG = 13;
    public const UNSIGNED_LONG_LONG = 14;
    public const FLOAT = 15;
    public const DOUBLE = 16;
    public const LONG_DOUBLE = 17;
    public const SIZE_T = 18;
    public const FILE_PTR = 19;
    
    public function getPointer(): Type;

    public function getConst(): Type;

    public function getVolatile(): Type;

    public function newArrayType(int $numElements): Type;

}