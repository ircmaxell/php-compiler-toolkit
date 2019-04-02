<?php
declare(strict_types=1);

namespace PHPCompilerToolkit\IR\Op;

use PHPCompilerToolkit\IR\Value;
use PHPCompilerToolkit\IR\OpAbstract;

abstract class UnaryOp extends OpAbstract {

    public Value $value;
    public Value $result;

    public function __construct(Value $value, Value $result) {
        $this->value = $value;
        $this->result = $result;
    }

    public function getArguments(): array {
        return [$this->value];
    }

    public function getResult(): ?Value {
        return $this->result;
    }
}