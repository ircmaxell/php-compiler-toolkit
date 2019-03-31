<?php
declare(strict_types=1);

namespace PHPCompilerToolkit\IR;
use PHPCompilerToolkit\Type;

class Parameter {

    public string $name;
    public Type $type;
    public Value $value;

    public function __construct(Type $type, string $name) {
        $this->type = $type;
        $this->name = $name;
    }

    public function setValue(Value $value): void {
        if (isset($this->value)) {
            throw new \LogicException("Attempt to re-use parameter");
        }
        $this->value = $value;
    }

}