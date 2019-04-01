<?php
declare(strict_types=1);

namespace PHPCompilerToolkit\IR\Op;

use PHPCompilerToolkit\Type;
use PHPCompilerToolkit\IR\Value;
use PHPCompilerToolkit\IR\OpAbstract;


class FieldWrite extends OpAbstract {

    public Value $struct;
    public Type\Struct\Field $field;
    public Value $value;

    public function __construct(Value $struct, Type\Struct\Field $field, Value $value) {
        $this->struct = $struct;
        $this->field = $field;
        $this->value = $value;
    }

    public function getArguments(): array {
        return [$this->struct, $this->value];
    }

    public function getResult(): ?Value {
        return null;
    }

}