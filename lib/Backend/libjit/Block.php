<?php
declare(strict_types=1);

namespace PHPCompilerToolkit\Backend\libjit;

use PHPCompilerToolkit\Block as CoreBlock;
use PHPCompilerToolkit\RValue as CoreRValue;
use PHPCompilerToolkit\LValue as CoreLValue;
use PHPCompilerToolkit\Type as CoreType;
use libjit\jit_label_t;

class Block implements CoreBlock {

    private Compiler $compiler;
    private Function_ $function;
    private string $name;
    private array $ops = [];
    private jit_label_t $label;

    public function __construct(Compiler $compiler, Function_ $function, string $name) {
        $this->compiler = $compiler;
        $this->function = $function;
        $this->block = $block;
        $this->name = $name;
        $this->label = $this->compiler->lib->jit_function_reserve_label($function->getFunc());
    }

    public function binaryOp(int $kind, CoreRValue $left, CoreRValue $right, CoreType $resultType): CoreRValue {
        $left = $left->asRValue();
        $right = $right->asRValue();
        $result = new RValue($this->compiler, $resultType);
        $this->ops[] = ['binaryop', $kind, $result, $left, $right];
        return $result;
    }

    public function unaryOp(int $kind, CoreRValue $expr, CoreType $resultType): CoreRValue {
        $result = new RValue($this->compiler, $resultType);
        $this->ops[] = ['unaryop', $kind, $result, $expr];
        return $result;
    }

    public function endWithReturn(?CoreRValue $value): void {
        $this->ops[] = ['return', $value];
    }

    public function getName(): string {
        return $this->name;
    }

    public function compile(): void {
        $this->compiler->lib->jit_insn_label($this->function->getFunc(), $this->label->addr());
        foreach ($this->ops as $op) {
            switch ($op[0]) {
                case 'binaryop':
                    $this->compileBinaryOp(...$op);
                    break;
                case 'unaryop':
                    $this->compileUnaryOp(...$op);
                    break;
                case 'return':
                    if ($op[1] === null) {
                        $this->compiler->lib->jit_insn_return($this->function->getFunc(), null);
                    } else {
                        $this->compiler->lib->jit_insn_return($this->function->getFunc(), $op[1]->asRValue()->getValue());
                    }
                    break;
                default:
                    throw new \LogicException("Compilation of instruction {$op[0]} not yet supported");
            }
        }
    }

    private function compileBinaryOp(string $category, int $kind, RValue $result, RValue $left, RValue $right): void {
        switch ($kind) {
            case self::BINARYOP_ADD:
                $result->setValue($this->compiler->lib->jit_insn_add($this->function->getFunc(), $left->asRValue()->getValue(), $right->asRValue()->getValue()));
                break;
            default:
                throw new \LogicException("Compilation of binaryop $kind not implemented yet");
        }
    }

}