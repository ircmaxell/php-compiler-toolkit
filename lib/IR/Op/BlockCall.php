<?php
declare(strict_types=1);

namespace PHPCompilerToolkit\IR\Op;

use PHPCompilerToolkit\IR\Block;
use PHPCompilerToolkit\IR\OpAbstract;

class BlockCall extends OpAbstract {

    public Block $block;
    public array $arguments = [];

    public function __construct(Block $block) {
        $this->block = $block;
    }

    public function getArguments(): array {
        return $this->arguments;
    }

    public function getResult(): ?Value {
        return null;
    }

    public function isTerminal(): bool {
        return true;
    }
}