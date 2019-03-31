<?php declare(strict_types=1);
namespace PHPCompilerToolkit\Builder;

use SplObjectStorage;

use PHPCompilerToolkit\Builder;
use PHPCompilerToolkit\Context;
use PHPCompilerToolkit\IR\Function_;
use PHPCompilerToolkit\IR\Block;
use PHPCompilerToolkit\IR\Value;
use PHPCompilerToolkit\IR\Op;
use PHPCompilerToolkit\IR\TerminalOp;

class BlockBuilder extends Builder {
    public Block $block;
    public SplObjectStorage $arguments;

    public function __construct(Context $context, FunctionBuilder $parent, Block $block) {
        parent::__construct($context, $parent);
        $this->block = $block;
        $this->arguments = new SplObjectStorage;
    }

    public function add(Value $left, Value $right): Value {
        // ToDo: Compute types
        $result = $this->computeBinaryNumericResult($left, $right);
        $this->block->addOp(new Op\BinaryOp\Add($this->hoistToArg($left), $this->hoistToArg($right), $result));
        return $result;
    }

    public function jump(BlockBuilder $block): void {
        $this->block->addOp(new Op\BlockCall($block->block));
    }

    public function returnVoid(): void {
        $this->block->addOp(new Op\ReturnVoid());
    }

    public function returnValue(Value $value): void {
        $this->block->addOp(new Op\ReturnValue($this->hoistToArg($value)));
    }

    private function hoistToArg(Value $value): Value {
        if ($value->block !== $this->block) {
            if ($this->arguments->contains($value)) {
                return $this->arguments[$value];
            }
            $newValue = new Value($this->block, $value->type);
            $this->arguments[$value] = $newValue;
            return $newValue;
        }
        return $value;
    }

    private function computeBinaryNumericResult(Value $left, Value $right): Value {
        if ($left->type === $right->type) {
            $type = $left->type;
        } else {
            throw new \LogicException("BinaryOps between different types are not supported yet");
        }
        return new Value($this->block, $type);
    }

    public function finish(): void {
        if (!$this->block->isClosed) {
            if ($this->parent->function->returnType->isVoid()) {
                $this->returnVoid();
            } else {
                throw new \LogicException("Attempting to finish a non-void function with an unclosed block, you must terminate");
            }
        }
    }

    public function getTargetBlocks(): array {
        foreach ($this->block->ops as $op) {
            if ($op instanceof TerminalOp) {
                return $op->getTargetBlocks();
            }
        }
        throw new \LogicException("Block does not contain any TerminalOp, was finish() called?");
    }
}