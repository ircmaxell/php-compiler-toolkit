<?php
declare(strict_types=1);

namespace PHPCompilerToolkit\IR\Value;
use PHPCompilerToolkit\Type;
use PHPCompilerToolkit\IR\Block;
use PHPCompilerToolkit\IR\Function_;
use PHPCompilerToolkit\IR\Value as CoreValue;

class Local extends CoreValue {

    public string $name;
    public Function_ $function;

    public function __construct(Function_ $function, string $name, Type $type) {
        parent::__construct($type);
        $this->name = $name;
        $this->function = $function;
    }
    
    public function isOwnedBy(Block $block): bool {
        return true;
    }

    public function isConstant(): bool {
        return false;
    }

}