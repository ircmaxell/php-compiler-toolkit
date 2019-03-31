<?php
declare(strict_types=1);

namespace PHPCompilerToolkit\IR\Op;

use PHPCompilerToolkit\IR\Function_;
use PHPCompilerToolkit\IR\Value;
use PHPCompilerToolkit\IR\OpAbstract;

class CallNoReturn extends OpAbstract {

    public Function_ $function;
    public array $parameters;

    public function __construct(Function_ $function, Value ... $parameters) {
        $this->function = $function;
        $this->parameters = $parameters;
    }

    public function getArguments(): array {
        return $this->parameters;
    }

    public function getResult(): ?Value {
        return null;
    }

}