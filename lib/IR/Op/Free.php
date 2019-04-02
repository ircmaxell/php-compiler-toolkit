<?php
declare(strict_types=1);

namespace PHPCompilerToolkit\IR\Op;

use PHPCompilerToolkit\Type;
use PHPCompilerToolkit\IR\Value;
use PHPCompilerToolkit\IR\OpAbstract;


class Free extends OpAbstract {

    public Value $value;

    public function __construct(Value $value) {
        $this->value = $value;
    }

    public function getArguments(): array {
        return [$this->value];
    }

    public function getResult(): ?Value {
        return null;
    }

}