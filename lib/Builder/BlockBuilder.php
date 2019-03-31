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
        $result = $this->computeBinaryNumericResult($left, $right);
        $this->block->addOp(new Op\BinaryOp\Add($this->hoistToArg($left), $this->hoistToArg($right), $result));
        return $result;
    }

    public function bitwiseAnd(Value $left, Value $right): Value {
        $result = $this->computeBinaryNumericResult($left, $right);
        $this->block->addOp(new Op\BinaryOp\BitwiseAnd($this->hoistToArg($left), $this->hoistToArg($right), $result));
        return $result;
    }

    public function bitwiseOr(Value $left, Value $right): Value {
        $result = $this->computeBinaryNumericResult($left, $right);
        $this->block->addOp(new Op\BinaryOp\BitwiseOr($this->hoistToArg($left), $this->hoistToArg($right), $result));
        return $result;
    }

    public function BitwiseXor(Value $left, Value $right): Value {
        $result = $this->computeBinaryNumericResult($left, $right);
        $this->block->addOp(new Op\BinaryOp\BitwiseXor($this->hoistToArg($left), $this->hoistToArg($right), $result));
        return $result;
    }

    public function div(Value $left, Value $right): Value {
        $result = $this->computeBinaryNumericResult($left, $right);
        $this->block->addOp(new Op\BinaryOp\Div($this->hoistToArg($left), $this->hoistToArg($right), $result));
        return $result;
    }

    public function eq(Value $left, Value $right): Value {
        $result = $this->computeBinaryLogicalResult($left, $right);
        $this->block->addOp(new Op\BinaryOp\EQ($this->hoistToArg($left), $this->hoistToArg($right), $result));
        return $result;
    }

    public function ge(Value $left, Value $right): Value {
        $result = $this->computeBinaryLogicalResult($left, $right);
        $this->block->addOp(new Op\BinaryOp\GE($this->hoistToArg($left), $this->hoistToArg($right), $result));
        return $result;
    }

    public function gt(Value $left, Value $right): Value {
        $result = $this->computeBinaryLogicalResult($left, $right);
        $this->block->addOp(new Op\BinaryOp\GT($this->hoistToArg($left), $this->hoistToArg($right), $result));
        return $result;
    }

    public function le(Value $left, Value $right): Value {
        $result = $this->computeBinaryLogicalResult($left, $right);
        $this->block->addOp(new Op\BinaryOp\LE($this->hoistToArg($left), $this->hoistToArg($right), $result));
        return $result;
    }

    public function logicalAnd(Value $left, Value $right): Value {
        $result = $this->computeBinaryLogicalResult($left, $right);
        $this->block->addOp(new Op\BinaryOp\LogicalAnd($this->hoistToArg($left), $this->hoistToArg($right), $result));
        return $result;
    }

    public function logicalOr(Value $left, Value $right): Value {
        $result = $this->computeBinaryLogicalResult($left, $right);
        $this->block->addOp(new Op\BinaryOp\LogicalOr($this->hoistToArg($left), $this->hoistToArg($right), $result));
        return $result;
    }

    public function lt(Value $left, Value $right): Value {
        $result = $this->computeBinaryLogicalResult($left, $right);
        $this->block->addOp(new Op\BinaryOp\LT($this->hoistToArg($left), $this->hoistToArg($right), $result));
        return $result;
    }

    public function mod(Value $left, Value $right): Value {
        $result = $this->computeBinaryNumericResult($left, $right);
        $this->block->addOp(new Op\BinaryOp\Mod($this->hoistToArg($left), $this->hoistToArg($right), $result));
        return $result;
    }

    public function mul(Value $left, Value $right): Value {
        $result = $this->computeBinaryNumericResult($left, $right);
        $this->block->addOp(new Op\BinaryOp\Mul($this->hoistToArg($left), $this->hoistToArg($right), $result));
        return $result;
    }

    public function ne(Value $left, Value $right): Value {
        $result = $this->computeBinaryLogicalResult($left, $right);
        $this->block->addOp(new Op\BinaryOp\NE($this->hoistToArg($left), $this->hoistToArg($right), $result));
        return $result;
    }

    public function sl(Value $left, Value $right): Value {
        $result = $this->computeBinaryNumericResult($left, $right);
        $this->block->addOp(new Op\BinaryOp\SL($this->hoistToArg($left), $this->hoistToArg($right), $result));
        return $result;
    }

    public function sr(Value $left, Value $right): Value {
        $result = $this->computeBinaryNumericResult($left, $right);
        $this->block->addOp(new Op\BinaryOp\SR($this->hoistToArg($left), $this->hoistToArg($right), $result));
        return $result;
    }

    public function sub(Value $left, Value $right): Value {
        $result = $this->computeBinaryNumericResult($left, $right);
        $this->block->addOp(new Op\BinaryOp\Sub($this->hoistToArg($left), $this->hoistToArg($right), $result));
        return $result;
    }

    public function jump(BlockBuilder $block): void {
        $this->block->addOp(new Op\BlockCall($block->block));
    }

    public function jumpIf(Value $cond, BlockBuilder $ifTrue, BlockBuilder $ifFalse): void {
        $this->block->addOp(new Op\ConditionalBlockCall($cond, $ifTrue->block, $ifFalse->block));
    }

    public function returnVoid(): void {
        $this->block->addOp(new Op\ReturnVoid());
    }

    public function returnValue(Value $value): void {
        $this->block->addOp(new Op\ReturnValue($this->hoistToArg($value)));
    }

    public function hoistToArg(Value $value): Value {
        if (!$value->isOwnedBy($this->block)) {
            if ($this->arguments->contains($value)) {
                return $this->arguments[$value];
            }
            $newValue = new Value\Value($this->block, $value->type);
            $this->arguments[$value] = $newValue;
            return $newValue;
        }
        return $value;
    }

    private function computeBinaryNumericResult(Value $left, Value $right): Value {
        if ($left->type === $right->type) {
            $type = $left->type;
        } else {
            var_dump($left->type, $right->type);
            throw new \LogicException("BinaryOps between different types are not supported yet");
        }
        return new Value\Value($this->block, $type);
    }

    private function computeBinaryLogicalResult(Value $left, Value $right): Value {
        return new Value\Value($this->block, $this->type()->bool());
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