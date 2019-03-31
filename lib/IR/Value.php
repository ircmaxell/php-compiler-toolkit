<?php
declare(strict_types=1);

namespace PHPCompilerToolkit\IR;
use PHPCompilerToolkit\Type;

abstract class Value {

    public Type $type;

    public function __construct(Type $type) {
        $this->type = $type;
    }
    
    public function isOwnedBy(Block $block): bool {
        return true;
    }

    public function isConstant(): bool {
        return false;
    }

}