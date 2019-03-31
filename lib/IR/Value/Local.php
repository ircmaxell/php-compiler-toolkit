<?php
declare(strict_types=1);

namespace PHPCompilerToolkit\IR\Value;
use PHPCompilerToolkit\Type;
use PHPCompilerToolkit\IR\Block;
use PHPCompilerToolkit\IR\Value as CoreValue;

class Value extends CoreValue {

    public Block $block;

    public function __construct(Block $block, Type $type) {
        parent::__construct($type);
        $this->block = $block;
    }
    
    public function isOwnedBy(Block $block): bool {
        return $this->block === $block;
    }

    public function isConstant(): bool {
        return false;
    }

}