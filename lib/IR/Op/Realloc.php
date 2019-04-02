<?php
declare(strict_types=1);

namespace PHPCompilerToolkit\IR\Op;

use PHPCompilerToolkit\Type;
use PHPCompilerToolkit\IR\Value;
use PHPCompilerToolkit\IR\OpAbstract;


class Realloc extends OpAbstract {

    public Value $value;
    public Value $return;

    public function __construct(Value $value, Value $return) {
        $this->value = $value;
        $this->return = $return;
    }

    public function getArguments(): array {
        return [$this->value];
    }

    public function getResult(): ?Value {
        return $this->return;
    }

}