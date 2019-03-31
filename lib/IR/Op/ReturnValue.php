<?php
declare(strict_types=1);

namespace PHPCompilerToolkit\IR\Op;

use PHPCompilerToolkit\IR\Value;
use PHPCompilerToolkit\IR\OpAbstract;
use PHPCompilerToolkit\IR\TerminalOp;

class ReturnValue extends OpAbstract implements TerminalOp {

    public Value $value;

    public function __construct(Value $value) {
        $this->value = $value;
    }

    public function getArguments(): array {
        return [$this->value];
    }

    public function getResult(): ?Value {
        return null;
    }

    public function getTargetBlocks(): array {
        return [];
    }

    public function getBlockCallForBlock(Block $block): BlockCall {
        throw new \LogicException("Returns do not have target blocks");
    }
}