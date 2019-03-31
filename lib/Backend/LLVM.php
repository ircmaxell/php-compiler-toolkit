<?php
declare(strict_types=1);

namespace PHPCompilerToolkit\Backend;

use FFI;
use SplObjectStorage;

use PHPCompilerToolkit\BackendAbstract;
use PHPCompilerToolkit\CompiledUnit;
use PHPCompilerToolkit\Context;
use PHPCompilerToolkit\IR\Block;
use PHPCompilerToolkit\IR\Function_;
use PHPCompilerToolkit\IR\Op;
use PHPCompilerToolkit\IR\Parameter;
use PHPCompilerToolkit\IR\Value\Constant;
use PHPCompilerToolkit\Type;

use llvm\llvm as lib;
use llvm\LLVMModuleRef;
use llvm\LLVMContextRef;
use llvm\LLVMBool;
use llvm\LLVMBuilderRef;
use llvm\LLVMExecutionEngineRef;
use llvm\LLVMIntPredicate;
use llvm\LLVMRealPredicate;
use llvm\LLVMTypeRef_ptr;
use LLVM\LLVMValueRef;
use llvm\LLVMVerifierFailureAction;
use llvm\string_ptr;

class LLVM extends BackendAbstract {
    private static int $MODULE_IDX = 0;
    private static int $VAR_IDX = 0;

    public lib $lib;
    public LLVMModuleRef $module;
    public LLVMContextRef $context;

    public function __construct() {
      $this->lib = new lib;
    }

    protected function beforeCompile(Context $context): void {
        $this->module = $this->lib->LLVMModuleCreateWithName('test_' . (self::$MODULE_IDX++));
        $this->context = $this->lib->LLVMGetModuleContext($this->module);
    }

    protected function afterCompile(Context $context): void {
        unset($this->context);
        unset($this->module);
    }

    protected function compileType(Type $type) {
        if ($type instanceof Type\Primitive) {
            switch ($type->kind) {
                case Type\Primitive::T_VOID:
                    return $this->lib->LLVMVoidTypeInContext($this->context);
                case Type\Primitive::T_VOID_PTR:
                    return $this->lib->LLVMPointerType($this->lib->LLVMVoidTypeInContext($this->context), 0);
                case Type\Primitive::T_BOOL:
                    return $this->lib->LLVMInt1TypeInContext($this->context);
                case Type\Primitive::T_CHAR:
                    return $this->lib->LLVMInt8TypeInContext($this->context);
                case Type\Primitive::T_SIGNED_CHAR:
                    return $this->lib->LLVMInt8TypeInContext($this->context);
                case Type\Primitive::T_UNSIGNED_CHAR:
                    return $this->lib->LLVMInt8TypeInContext($this->context);
                case Type\Primitive::T_SHORT:
                    return $this->lib->LLVMInt16TypeInContext($this->context);
                case Type\Primitive::T_UNSIGNED_SHORT:
                    return $this->lib->LLVMInt16TypeInContext($this->context);
                case Type\Primitive::T_INT:
                    return $this->lib->LLVMInt16TypeInContext($this->context);
                case Type\Primitive::T_UNSIGNED_INT:
                    return $this->lib->LLVMInt16TypeInContext($this->context);
                case Type\Primitive::T_LONG:
                    return $this->lib->LLVMInt32TypeInContext($this->context);
                case Type\Primitive::T_UNSIGNED_LONG:
                    return $this->lib->LLVMInt32TypeInContext($this->context);
                case Type\Primitive::T_LONG_LONG:
                    return $this->lib->LLVMInt64TypeInContext($this->context);
                case Type\Primitive::T_UNSIGNED_LONG_LONG:
                    return $this->lib->LLVMInt64TypeInContext($this->context);
                case Type\Primitive::T_FLOAT:
                    return $this->lib->LLVMFloatTypeInContext($this->context);
                case Type\Primitive::T_DOUBLE:
                    return $this->lib->LLVMDoubleTypeInContext($this->context);
                case Type\Primitive::T_LONG_DOUBLE:
                    return $this->lib->LLVMFP128TypeInContext($this->context);
                case Type\Primitive::T_SIZE_T:
                    return $this->lib->LLVMInt64TypeInContext($this->context);
            }
        }
        throw new \LogicException("Type " . get_class($type) . " not implemented yet");
    }

    protected function compileConstant(Constant $constant) {
        // libjit allocates constants per function, do nothing
        if ($constant->type->isFloatingPoint()) {
            return $this->lib->LLVMConstReal($this->typeMap[$constant->type], $constant->value);
        }
        return $this->lib->LLVMConstInt($this->typeMap[$constant->type], $constant->value, $this->bool(false));
    }

    protected function declareFunction(Function_ $function) {
        $paramWrapper = $this->lib->makeArray(
            LLVMTypeRef_ptr::class,
            array_map(
                function(Parameter $parameter) {
                    return $this->typeMap[$parameter->type];
                }, 
                $function->parameters
            )
        );
        $type = $this->lib->LLVMFunctionType($this->typeMap[$function->returnType], $paramWrapper, count($function->parameters), $this->bool($function->isVariadic));
        return $this->lib->LLVMAddFunction($this->module, $function->name, $type);
    }

    private SplObjectStorage $localMap;
    private SplObjectStorage $valueMap;
    private SplObjectStorage $blockMap;

    protected function compileFunction(Function_ $function, $func): void {
        $this->valueMap = new SplObjectStorage;
        $this->blockMap = new SplObjectStorage;
        $this->localMap = new SplObjectStorage;
        foreach ($this->constantMap as $constant) {
            $this->valueMap[$constant] = $this->constantMap[$constant];
        }
        $builder = $this->lib->LLVMCreateBuilder();
        foreach ($function->parameters as $index => $parameter) {
            $this->valueMap[$parameter->value] = $this->lib->LLVMGetParam($func, $index);
        }
        foreach ($function->blocks as $index => $block) {
            $this->blockMap[$block] = $this->lib->LLVMAppendBasicBlock($func, $block->name);
            if ($index === 0) {
                $this->lib->LLVMPositionBuilderAtEnd($builder, $this->blockMap[$block]);
            }
            foreach ($block->arguments as $idx => $argument) {
                $this->localMap[$argument] = $this->lib->LLVMBuildAlloca($builder, $this->typeMap[$argument->type], $block->name . '_arg_' . $idx);
            }
        }
        foreach ($function->blocks as $block) {
            $this->compileBlock($func, $block, $builder);
        }
        unset($this->localMap);
        unset($this->valueMap);
        unset($this->blockMap);
    }

    protected function compileBlock(LLVMValueRef $func, Block $block, LLVMBuilderRef $builder): void {
        $this->lib->LLVMPositionBuilderAtEnd($builder, $this->blockMap[$block]);
        foreach ($block->arguments as $idx => $argument) {
            $this->valueMap[$argument] = $this->lib->LLVMBuildLoad($builder, $this->localMap[$argument], $block->name . '_arg_' . $idx . '_load');
        }
        foreach ($block->ops as $op) {
            $this->compileOp($func, $op, $builder, $block);
        }
    }

    protected function compileOp(LLVMValueRef $func, Op $op, LLVMBuilderRef $builder, Block $block): void {
        if ($op instanceof Op\BinaryOp) {
            $this->compileBinaryOp($op, $builder);
        } elseif ($op instanceof Op\ReturnVoid) {
            $this->lib->LLVMBuildRetVoid($builder);
        } elseif ($op instanceof Op\ReturnValue) {
            $this->lib->LLVMBuildRet($builder, $this->valueMap[$op->value]);
        } elseif ($op instanceof Op\BlockCall) {
            $this->compileBlockCall($builder, $op);
        } elseif ($op instanceof Op\ConditionalBlockCall) {
            $if = $this->lib->LLVMAppendBasicBlock($func, $block->name . '_if');
            $else = $this->lib->LLVMAppendBasicBlock($func, $block->name . '_else');
            $this->lib->LLVMBuildCondBr($builder, $this->valueMap[$op->cond], $if, $else);
            $this->lib->LLVMPositionBuilderAtEnd($builder, $if);
            $this->compileBlockCall($builder, $op->ifTrue);
            $this->lib->LLVMPositionBuilderAtEnd($builder, $else);
            $this->compileBlockCall($builder, $op->ifFalse);
        } else {
            throw new \LogicException("Unknown Op encountered: " . get_class($op));
        }
    }

    protected function compileBinaryOp(Op $op, LLVMBuilderRef $builder): void {
        if ($op instanceof Op\BinaryOp\Add) {
            if ($op->result->type->isFloatingPoint()) {
                $this->valueMap[$op->result] = $this->lib->LLVMBuildFAdd($builder, $this->valueMap[$op->left], $this->valueMap[$op->right], $this->varName());
            } else {
                $this->valueMap[$op->result] = $this->lib->LLVMBuildAdd($builder, $this->valueMap[$op->left], $this->valueMap[$op->right], $this->varName());
            }
        } elseif ($op instanceof Op\BinaryOp\BitwiseAnd) {
            $this->valueMap[$op->result] = $this->lib->LLVMBuildAnd($builder, $this->valueMap[$op->left], $this->valueMap[$op->right], $this->varName()); 
        } elseif ($op instanceof Op\BinaryOp\BitwiseOr) {
            $this->valueMap[$op->result] = $this->lib->LLVMBuildOr($builder, $this->valueMap[$op->left], $this->valueMap[$op->right], $this->varName()); 
        } elseif ($op instanceof Op\BinaryOp\BitwiseXor) {
            $this->valueMap[$op->result] = $this->lib->LLVMBuildXor($builder, $this->valueMap[$op->left], $this->valueMap[$op->right], $this->varName());
        } elseif ($op instanceof Op\BinaryOp\Div) {
            if ($op->result->type->isSigned()) {
                $this->valueMap[$op->result] = $this->lib->LLVMBuildUDiv($builder, $this->valueMap[$op->left], $this->valueMap[$op->right], $this->varName());
            } elseif ($op->result->type->isFloatingPoint()) {
                $this->valueMap[$op->result] = $this->lib->LLVMBuildFDiv($builder, $this->valueMap[$op->left], $this->valueMap[$op->right], $this->varName());
            } else {
                $this->valueMap[$op->result] = $this->lib->LLVMBuildSDiv($builder, $this->valueMap[$op->left], $this->valueMap[$op->right], $this->varName());
            }
        } elseif ($op instanceof Op\BinaryOp\LogicalAnd) {
            $this->valueMap[$op->result] = $this->lib->LLVMBuildAnd(
                $builder, 
                $this->toLogicalValue($builder, $this->valueMap[$op->left]), 
                $this->toLogicalValue($builder, $this->valueMap[$op->right]), 
                $this->varName()
            ); 
        } elseif ($op instanceof Op\BinaryOp\LogicalOr) {
            $this->valueMap[$op->result] = $this->lib->LLVMBuildOr(
                $builder, 
                $this->toLogicalValue($builder, $this->valueMap[$op->left]), 
                $this->toLogicalValue($builder, $this->valueMap[$op->right]),
                $this->varName()
            );
        } elseif ($op instanceof Op\BinaryOp\Mod) {
            if ($op->result->type->isSigned()) {
                $this->valueMap[$op->result] = $this->lib->LLVMBuildURem($builder, $this->valueMap[$op->left], $this->valueMap[$op->right], $this->varName());
            } elseif ($op->result->type->isFloatingPoint()) {
                $this->valueMap[$op->result] = $this->lib->LLVMBuildFRem($builder, $this->valueMap[$op->left], $this->valueMap[$op->right], $this->varName());
            } else {
                $this->valueMap[$op->result] = $this->lib->LLVMBuildSRem($builder, $this->valueMap[$op->left], $this->valueMap[$op->right], $this->varName());
            }
        } elseif ($op instanceof Op\BinaryOp\SL) {
            $this->valueMap[$op->result] = $this->lib->LLVMBuildShl($builder, $this->valueMap[$op->left], $this->valueMap[$op->right], $this->varName());
        } elseif ($op instanceof Op\BinaryOp\SR) {
            if ($op->result->type->isSigned()) {
                $this->valueMap[$op->result] = $this->lib->LLVMBuildAShr($builder, $this->valueMap[$op->left], $this->valueMap[$op->right], $this->varName());
            } else {
                $this->valueMap[$op->result] = $this->lib->LLVMBuildLShr($builder, $this->valueMap[$op->left], $this->valueMap[$op->right], $this->varName());
            }
        } elseif ($op instanceof Op\BinaryOp\Sub) {
            if ($op->result->type->isFloatingPoint()) {
                $this->valueMap[$op->result] = $this->lib->LLVMBuildFSub($builder, $this->valueMap[$op->left], $this->valueMap[$op->right], $this->varName());
            } else {
                $this->valueMap[$op->result] = $this->lib->LLVMBuildSub($builder, $this->valueMap[$op->left], $this->valueMap[$op->right], $this->varName());
            }
        } elseif ($op->left->type->isFloatingPoint() || $op->right->type->isFloatingPoint()) {
            $predicate = $this->getRealPredicate($op);
            $this->valueMap[$op->result] = $this->lib->LLVMBuildFCmp($builder, $predicate, $this->valueMap[$op->left], $this->valueMap[$op->right], $this->varName());
        } else {
            $predicate = $this->getIntPredicate($op);
            $this->valueMap[$op->result] = $this->lib->LLVMBuildICmp($builder, $predicate, $this->valueMap[$op->left], $this->valueMap[$op->right], $this->varName());
        }
    }

    protected function getIntPredicate(Op\BinaryOp $op): LLVMIntPredicate {
        if ($op->left->type->isSigned() || $op->right->type->isSigned()) { 
            if ($op instanceof Op\BinaryOp\EQ) {
                $predicate = lib::LLVMIntEQ;
            } elseif ($op instanceof Op\BinaryOp\GE) {
                $predicate = lib::LLVMIntSGE;
            } elseif ($op instanceof Op\BinaryOp\GT) {
                $predicate = lib::LLVMIntSGT;
            } elseif ($op instanceof Op\BinaryOp\LE) {
                $predicate = lib::LLVMIntSLE;
            } elseif ($op instanceof Op\BinaryOp\LT) {
                $predicate = lib::LLVMIntSLT;
            } elseif ($op instanceof Op\BinaryOp\NE) {
                $predicate = lib::LLVMIntNE;
            } else {
                throw new \LogicException("Unknown BinaryOp encountered: " . get_class($op));
            }
        } else {
            if ($op instanceof Op\BinaryOp\EQ) {
                $predicate = lib::LLVMIntEQ;
            } elseif ($op instanceof Op\BinaryOp\GE) {
                $predicate = lib::LLVMIntUGE;
            } elseif ($op instanceof Op\BinaryOp\GT) {
                $predicate = lib::LLVMIntUGT;
            } elseif ($op instanceof Op\BinaryOp\LE) {
                $predicate = lib::LLVMIntULE;
            } elseif ($op instanceof Op\BinaryOp\LT) {
                $predicate = lib::LLVMIntULT;
            } elseif ($op instanceof Op\BinaryOp\NE) {
                $predicate = lib::LLVMIntNE;
            } else {
                throw new \LogicException("Unknown BinaryOp encountered: " . get_class($op));
            }
        }
        $t = $this->lib->getFFI()->new('LLVMIntPredicate');
        $t = $predicate;
        return new LLVMIntPredicate($t);
    }

    protected function getRealPredicate(Op\BinaryOp $op): LLVMRealPredicate {
        if ($op instanceof Op\BinaryOp\EQ) {
            $predicate = lib::LLVMRealOEQ;
        } elseif ($op instanceof Op\BinaryOp\GE) {
            $predicate = lib::LLVMRealOGE;
        } elseif ($op instanceof Op\BinaryOp\GT) {
            $predicate = lib::LLVMRealOGT;
        } elseif ($op instanceof Op\BinaryOp\LE) {
            $predicate = lib::LLVMRealOLE;
        } elseif ($op instanceof Op\BinaryOp\LT) {
            $predicate = lib::LLVMRealOLT;
        } elseif ($op instanceof Op\BinaryOp\NE) {
            $predicate = lib::LLVMRealONE;
        } else {
            throw new \LogicException("Unknown BinaryOp encountered: " . get_class($op));
        }
        $t = $this->lib->getFFI()->new('LLVMRealPredicate');
        $t = $predicate;
        return new LLVMRealPredicate($t);
    }

    protected function toLogicalValue(LLVMBuilderRef $Builder, LLVMValueRef $value): LLVMValueRef {
        throw new \LogicalException("Unknown how to do yet, but todo in the future");
    }

    protected function compileBlockCall(LLVMBuilderRef $builder, Op\BlockCall $op): void {
        foreach ($op->block->arguments as $index => $argument) {
            $this->lib->LLVMBuildStore($builder, $this->valueMap[$op->arguments[$index]], $this->localMap[$argument]);
        }
        $this->lib->LLVMBuildBr($builder, $this->blockMap[$op->block]);
    }

    protected function varName(): string {
        return 'var_' . (self::$VAR_IDX++);
    }

    protected function buildResult(): CompiledUnit {
        $error = new string_ptr(FFI::addr(FFI::new('char*')));
        $action = $this->lib->getFFI()->new('LLVMVerifierFailureAction');
        $action = lib::LLVMAbortProcessAction;
        $result = $this->lib->LLVMVerifyModule($this->module, new LLVMVerifierFailureAction($action), $error);
        if (!$this->fromBool($result)) {
            $message = FFI::string($error->getData()[0], $this->strlen($error->getData()[0]));
            throw new \RuntimeException("LLVM Verification failed: $message");
        }
        $this->initializeNativeTarget();
        $this->lib->LLVMLinkInMCJIT();
        $engine = new LLVMExecutionEngineRef($this->lib->getFFI()->new('LLVMExecutionEngineRef'));
        $result = $this->lib->LLVMCreateJITCompilerForModule($engine->addr(), $this->module, 2, $error);
        if (!$this->fromBool($result)) {
            $message = FFI::string($error->getData()[0], $this->strlen($error->getData()[0]));
            throw new \RuntimeException("LLVM JIT Compiler Initialization Failed: $message");
        }
        return new LLVM\CompiledUnit($this, $engine, $this->signatureMap);
    }

    public function bool(bool $value): LLVMBool {
        $bool = $this->lib->getFFI()->new('LLVMBool');
        $bool = $value ? 1 : 0;
        return new LLVMBool($bool);
    }

    public function fromBool(LLVMBool $bool): bool {
        $result = $bool->getData() + 0;
        return $result === 0;
    }

    private function strlen(FFI\CData $data): int {
        $null = chr(0);
        $i = 0;
        while ($data[$i] !== $null) {$i++;}
        return $i;
    }

    private function initializeNativeTarget(): void {
        $this->lib->LLVMInitializeX86TargetInfo();
        $this->lib->LLVMInitializeX86Target();
        $this->lib->LLVMInitializeX86TargetMC();
        $this->lib->LLVMInitializeX86AsmParser();
        $this->lib->LLVMInitializeX86AsmPrinter();
    }

}