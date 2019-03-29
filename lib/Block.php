<?php
declare(strict_types=1);

namespace PHPCompilerToolkit;

interface Block {

    const BINARYOP_ADD = 1;
    const BINARYOP_SUB = 2;
    const BINARYOP_MUL = 3;
    const BINARYOP_DIV = 4;
    const BINARYOP_MOD = 5;
    const BINARYOP_BITWISE_AND = 6;
    const BINARYOP_BITWISE_XOR = 7;
    const BINARYOP_BITWISE_OR = 8;
    const BINARYOP_LOGICAL_AND = 9;
    const BINARYOP_LOGICAL_OR = 10;
    const BINARYOP_LEFT_SHIFT = 11;
    const BINARYOP_RIGHT_SHIFT = 12;
    const BINARYOP_EQUALS = 13;
    const BINARYOP_NOT_EQUALS = 14;
    const BINARYOP_LESS_THAN = 15;
    const BINARYOP_LESS_EQUALS = 16;
    const BINARYOP_GREATER_THAN = 17;
    const BINARYOP_GREATER_EQUALS = 18;

    const UNARYOP_MINUS = 1;
    const UNARYOP_BITWISE_NOT = 2;
    const UNARYOP_LOGICAL_NOT = 3;
    const UNARYOP_ABS = 4;

    public function binaryOp(int $kind, RValue $left, RValue $right, Type $resultType): RValue;

    public function unaryOp(int $kind, RValue $expr, Type $resultType): RValue;

    public function endWithReturn(?RValue $value): void;

    public function getName(): string;

}