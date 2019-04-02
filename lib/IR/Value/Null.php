<?php
declare(strict_types=1);

namespace PHPCompilerToolkit\IR\Value;
use PHPCompilerToolkit\Type;
use PHPCompilerToolkit\IR\Value as CoreValue;

class Null extends CoreValue {

    public function __construct(Type $type) {
        parent::__construct($type);
    }

    public function isConstant(): bool {
        return true;
    }

}