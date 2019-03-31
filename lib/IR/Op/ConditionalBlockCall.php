<?php
declare(strict_types=1);

namespace PHPCompilerToolkit\IR\Op;

use PHPCompilerToolkit\IR\Block;
use PHPCompilerToolkit\IR\Value;
use PHPCompilerToolkit\IR\OpAbstract;
use PHPCompilerToolkit\IR\TerminalOp;

class ConditionalBlockCall extends OpAbstract implements TerminalOp {

    public Value $cond;
    public BlockCall $ifTrue;
    public BlockCall $ifFalse;


    public function __construct(Value $cond, Block $ifTrue, Block $ifFalse) {
        $this->cond = $cond;
        $this->ifTrue = new BlockCall($ifTrue);
        $this->ifFalse = new BlockCall($ifFalse);
    }

    public function getArguments(): array {
        return [$this->cond];
    }

    public function getResult(): ?Value {
        return null;
    }

    public function getTargetBlocks(): array {
        return [$this->ifTrue->block, $this->ifFalse->block];
    }

    public function getBlockCallForBlock(Block $block): BlockCall {
        if ($block === $this->ifTrue->block) {
            return $this->ifTrue;
        }
        if ($block === $this->ifFalse->block) {
            return $this->ifFalse;
        }
        
        throw new \LogicException("Attempt to get BlockCall for non-existing block");
    }

}