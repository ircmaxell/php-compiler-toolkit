<?php
declare(strict_types=1);

namespace PHPCompilerToolkit\IR\Op;

use PHPCompilerToolkit\IR\Block;
use PHPCompilerToolkit\IR\Value;
use PHPCompilerToolkit\IR\OpAbstract;
use PHPCompilerToolkit\IR\TerminalOp;

class BlockCall extends OpAbstract implements TerminalOp {

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

    public function getTargetBlocks(): array {
        return [$this->block];
    }

    public function getBlockCallForBlock(Block $block): BlockCall {
        if ($block === $this->block) {
            return $this;
        }
        throw new \LogicException("Attempt to get BlockCall for non-existing block");
    }

}