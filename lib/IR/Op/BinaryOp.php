<?php
declare(strict_types=1);

namespace PHPCompilerToolkit\IR\Op;

use PHPCompilerToolkit\IR\Value;
use PHPCompilerToolkit\IR\OpAbstract;

abstract class BinaryOp extends OpAbstract {

    public Value $left;
    public Value $right;
    public Value $result;

    public function __construct(Value $left, Value $right, Value $result) {
        $this->left = $left;
        $this->right = $right;
        $this->result = $result;
    }

    public function getArguments(): array {
        return [$this->left, $this->right];
    }

    public function getResult(): ?Value {
        return $this->result;
    }
}