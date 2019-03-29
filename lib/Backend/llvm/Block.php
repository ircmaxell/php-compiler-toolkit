<?php
declare(strict_types=1);

namespace PHPCompilerToolkit\Backend\llvm;

use PHPCompilerToolkit\Block as CoreBlock;
use PHPCompilerToolkit\RValue as CoreRValue;
use PHPCompilerToolkit\LValue as CoreLValue;
use PHPCompilerToolkit\Type as CoreType;
use llvm\LLVMBasicBlockRef;
use llvm\LLVMBuilderRef;

class Block implements CoreBlock {
    private static int $varidx = 0;
    private Compiler $compiler;
    private Function_ $function;
    private string $name;
    private LLVMBasicBlockRef $block;
    private LLVMBuilderRef $builder;

    public function __construct(Compiler $compiler, Function_ $function, LLVMBasicBlockRef $block, LLVMBuilderRef $builder, string $name) {
        $this->compiler = $compiler;
        $this->function = $function;
        $this->block = $block;
        $this->builder = $builder;
        $this->name = $name;
    }

    public function binaryOp(int $kind, CoreRValue $left, CoreRValue $right, CoreType $resultType): CoreRValue {
        $this->compiler->lib->LLVMPositionBuilderAtEnd($this->builder, $this->block);
        $id = "var_" . (self::$varidx++);
        switch ($kind) {
            case self::BINARYOP_ADD:
                $result = $this->compiler->lib->LLVMBuildAdd($this->builder, $left->asRValue()->getValue(), $right->asRValue()->getValue(), $id);
                break;
            default:
                throw new \LogicException('Not implemented yet: ' . $kind);
        }
        return new RValue($this->compiler, $result, $resultType);
    }

    public function unaryOp(int $kind, CoreRValue $expr, CoreType $resultType): CoreRValue {

    }

    public function endWithReturn(?CoreRValue $value): void {
        $this->compiler->lib->LLVMPositionBuilderAtEnd($this->builder, $this->block);
        if ($value === null) {
            $this->compiler->lib->LLVMBuildRetVoid($this->builder);
        } else {
            $this->compiler->lib->LLVMBuildRet($this->builder, $value->asRValue()->getValue());
        }
    }

    public function getName(): string {
        return $this->name;
    }
}