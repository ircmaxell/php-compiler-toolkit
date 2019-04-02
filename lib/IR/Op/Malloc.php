<?php
declare(strict_types=1);

namespace PHPCompilerToolkit\IR\Op;

use PHPCompilerToolkit\Type;
use PHPCompilerToolkit\IR\Value;
use PHPCompilerToolkit\IR\OpAbstract;


class Malloc extends OpAbstract {

    public Value $return;

    public function __construct(Value $return) {
        $this->return = $return;
    }

    public function getArguments(): array {
        return [];
    }

    public function getResult(): ?Value {
        return $this->return;
    }

}