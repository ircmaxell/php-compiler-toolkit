<?php
declare(strict_types=1);

namespace PHPCompilerToolkit;

interface Type {
    
    public const T_VOID = 1;
    public const T_VOID_PTR = 2;
    public const T_BOOL = 3;
    public const T_CHAR = 4;
    public const T_SIGNED_CHAR = 5;
    public const T_UNSIGNED_CHAR = 6;
    public const T_SHORT = 7;
    public const T_UNSIGNED_SHORT = 8;
    public const T_INT = 9;
    public const T_UNSIGNED_INT = 10;
    public const T_LONG = 11;
    public const T_UNSIGNED_LONG = 12;
    public const T_LONG_LONG = 13;
    public const T_UNSIGNED_LONG_LONG = 14;
    public const T_FLOAT = 15;
    public const T_DOUBLE = 16;
    public const T_LONG_DOUBLE = 17;
    public const T_SIZE_T = 18;
    
    public function getPointer(): Type;

    public function getConst(): Type;

    public function getVolatile(): Type;

    public function newArrayType(int $numElements): Type;

}