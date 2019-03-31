<?php
declare(strict_types=1);

namespace PHPCompilerToolkit\IR\Op;

use PHPCompilerToolkit\IR\Block;
use PHPCompilerToolkit\IR\OpAbstract;
use PHPCompilerToolkit\IR\TerminalOp;
use PHPCompilerToolkit\IR\Value;

class ReturnVoid extends OpAbstract implements TerminalOp {

    public function getArguments(): array {
        return [];
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