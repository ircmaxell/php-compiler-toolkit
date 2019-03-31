<?php
declare(strict_types=1);

namespace PHPCompilerToolkit\IR;
use PHPCompilerToolkit\Type;

class Value {

    public Type $type;
    public Block $block;

    public function __construct(Block $block, Type $type) {
        $this->block = $block;
        $this->type = $type;
    }
    
    public function isOwnedBy(Block $block): bool {
        return $this->block === $block;
    }

}