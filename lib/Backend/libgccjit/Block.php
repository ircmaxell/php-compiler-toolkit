<?php
declare(strict_types=1);

namespace PHPCompilerToolkit\Backend\libgccjit;

use PHPCompilerToolkit\Block as CoreBlock;
use PHPCompilerToolkit\RValue as CoreRValue;
use PHPCompilerToolkit\LValue as CoreLValue;
use PHPCompilerToolkit\Type as CoreType;
use libgccjit\gcc_jit_block_ptr;
use libgccjit\libgccjit;

class Block implements CoreBlock {

    private Compiler $compiler;
    private Function_ $function;
    private gcc_jit_block_ptr $block;
    private string $name;

    const BINARYOP_MAP = [
        self::BINARYOP_ADD => libgccjit::GCC_JIT_BINARY_OP_PLUS,
        self::BINARYOP_SUB => libgccjit::GCC_JIT_BINARY_OP_MINUS,
    ];

    public function __construct(Compiler $compiler, Function_ $function, gcc_jit_block_ptr $block, string $name) {
        $this->compiler = $compiler;
        $this->function = $function;
        $this->block = $block;
        $this->name = $name;
    }

    public function binaryOp(int $kind, CoreRValue $left, CoreRValue $right, CoreType $resultType): CoreRValue {
        $left = $left->asRValue();
        $right = $right->asRValue();
        if (isset(self::BINARYOP_MAP[$kind])) {
            return new RValue(
                $this->compiler,
                $this->compiler->lib->gcc_jit_context_new_binary_op(
                    $this->compiler->context,
                    null,
                    self::BINARYOP_MAP[$kind],
                    $resultType->getType(),
                    $left->getRValue(),
                    $right->getRValue()
                ),
                $resultType
            );
        }
        throw new \LogicException("Not implemented yet");
    }

    public function unaryOp(int $kind, CoreRValue $expr, CoreType $resultType): CoreRValue {

    }

    public function endWithReturn(?CoreRValue $value): void {
        if ($value === null) {
            $this->compiler->lib->gcc_jit_block_end_with_void_return($this->block, null);
            return;
        }
        $this->compiler->lib->gcc_jit_block_end_with_return($this->block, null, $value->asRValue()->getRValue());
    }

    public function getName(): string {
        return $this->name;
    }

}