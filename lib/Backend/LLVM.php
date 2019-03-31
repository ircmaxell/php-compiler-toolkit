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
use PHPCompilerToolkit\Type;

use llvm\llvm as lib;
use llvm\LLVMModuleRef;
use llvm\LLVMContextRef;
use llvm\LLVMBool;
use llvm\LLVMBuilderRef;
use llvm\LLVMExecutionEngineRef;
use llvm\LLVMTypeRef_ptr;
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
            $this->compileBlock($block, $builder);
        }
        unset($this->localMap);
        unset($this->valueMap);
        unset($this->blockMap);
    }

    protected function compileBlock(Block $block, LLVMBuilderRef $builder): void {
        $this->lib->LLVMPositionBuilderAtEnd($builder, $this->blockMap[$block]);
        foreach ($block->arguments as $idx => $argument) {
            $this->valueMap[$argument] = $this->lib->LLVMBuildLoad($builder, $this->localMap[$argument], $block->name . '_arg_' . $idx . '_load');
        }
        foreach ($block->ops as $op) {
            $this->compileOp($op, $builder);
        }
    }

    protected function compileOp(Op $op, LLVMBuilderRef $builder): void {
        if ($op instanceof Op\BinaryOp) {
            $this->compileBinaryOp($op, $builder);
        } elseif ($op instanceof Op\ReturnVoid) {
            $this->lib->LLVMBuildRetVoid($builder);
        } elseif ($op instanceof Op\ReturnValue) {
            $this->lib->LLVMBuildRet($builder, $this->valueMap[$op->value]);
        } elseif ($op instanceof Op\BlockCall) {
            $this->compileBlockCall($builder, $op);
        } else {
            throw new \LogicException("Unknown Op encountered: " . get_class($op));
        }
    }

    protected function compileBinaryOp(Op $op, LLVMBuilderRef $builder): void {
        if ($op instanceof Op\BinaryOp\Add) {
            $this->valueMap[$op->result] = $this->lib->LLVMBuildAdd($builder, $this->valueMap[$op->left], $this->valueMap[$op->right], $this->varName());
        } else {
            throw new \LogicException("Unknown BinaryOp encountered: " . get_class($op));
        }
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