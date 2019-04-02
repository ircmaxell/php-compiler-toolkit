<?php declare(strict_types=1);
namespace PHPCompilerToolkit\Builder;

use SplObjectStorage;

use PHPCompilerToolkit\Builder;
use PHPCompilerToolkit\Context;
use PHPCompilerToolkit\Type;
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

    public function minus(Value $value): Value {
        $result = $this->computeUnaryNumericResult($value);
        $this->block->addOp(new Op\UnaryOp\Minus($this->hoistToArg($value), $result));
        return $result;
    }

    public function bitwiseNot(Value $value): Value {
        $result = $this->computeUnaryNumericResult($value);
        $this->block->addOp(new Op\UnaryOp\BitwiseNot($this->hoistToArg($value), $result));
        return $result;
    }

    public function LogicalNot(Value $value): Value {
        $result = $this->computeUnaryLogicalResult($value);
        $this->block->addOp(new Op\UnaryOp\LogicalNot($this->hoistToArg($value), $result));
        return $result;
    }

    public function cast(Value $value, Type $type): Value {
        // todo: type check the cast to ensure it's from/to correct pointers
        $result = new Value\Value($this->block, $type);
        $this->block->addOp(new Op\UnaryOp\Cast($this->hoistToArg($value), $result));
        return $result;
    }  

    public function call(FunctionBuilder $function, Value ... $args): Value {
        $result = new Value\Value($this->block, $function->function->returnType);
        $this->block->addOp(new Op\Call($function->function, $result, ...$args));
        return $result;
    } 

    public function callNoReturn(FunctionBuilder $function, Value ... $args): void {
        $this->block->addOp(new Op\CallNoReturn($function->function, ...$args));
    }

    public function malloc(Type $type): Value {
        $result = new Value\Value($this->block, $type);
        $this->block->addOp(new Op\Malloc($result));
        return $result;
    }

    public function realloc(Value $value, Type $type): Value {
        // Todo: typecheck value->type and new->type are compatible pointers
        $result = new Value\Value($this->block, $newType);
        $this->block->addOp(new Op\Realloc($this->hoistToArg($value), $result));
        return $result;
    }

    public function free(Value $value): void {
        $this->block->addOp(new Op\Free($this->hoistToArg($value)));
    }

    public function readField(Value $struct, string $name): Value {
        if (!$struct->type instanceof Type\Struct) {
            throw new \LogicException("Attempting to read a field from a non-struct");
        }
        $field = $struct->type->field($name);
        $result = new Value\Value($this->block, $field->type);
        $this->block->addOp(new Op\FieldRead($this->hoistToArg($struct), $field, $result));
        return $result;
    }

    public function writeField(Value $struct, string $name, Value $value): void {
        if (!$struct->type instanceof Type\Struct) {
            throw new \LogicException("Attempting to write a field from a non-struct");
        }
        $field = $struct->type->field($name);
        if ($field->type !== $value->type) {
            throw new \LogicException("Attempting to write a field of different types");
        }
        $this->block->addOp(new Op\FieldWrite($this->hoistToArg($struct), $field, $value));
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

    private function computeUnaryNumericResult(Value $value): Value {
        // all types are numeric types, so :D
        return new Value\Value($this->block, $value->type);
    }

    private function computeUnaryLogicalResult(Value $value): Value {
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