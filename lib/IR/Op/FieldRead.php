<?php
declare(strict_types=1);

namespace PHPCompilerToolkit\IR\Op;

use PHPCompilerToolkit\Type;
use PHPCompilerToolkit\IR\Value;
use PHPCompilerToolkit\IR\OpAbstract;


class FieldRead extends OpAbstract {

    public Value $struct;
    public Type\Struct\Field $field;
    public Value $return;

    public function __construct(Value $struct, Type\Struct\Field $field, Value $return) {
        $this->struct = $struct;
        $this->field = $field;
        $this->return = $return;
    }

    public function getArguments(): array {
        return [$this->struct];
    }

    public function getResult(): ?Value {
        return $this->return;
    }

}