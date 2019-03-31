<?php
declare(strict_types=1);

namespace PHPCompilerToolkit\IR\Value;
use PHPCompilerToolkit\Type;
use PHPCompilerToolkit\IR\Value as CoreValue;

class Constant extends CoreValue {

    public $value;

    public function __construct($value, Type $type) {
        parent::__construct($type);
        $this->value = $value;
    }

    public function isConstant(): bool {
        return true;
    }

}