<?php
declare(strict_types=1);

namespace PHPCompilerToolkit\Backend\llvm;

use PHPCompilerToolkit\AbstractCompiler;
use PHPCompilerToolkit\Type as CoreType;

use llvm\llvm;
use llvm\LLVMModuleRef;
use llvm\LLVMContextRef;

class Compiler extends AbstractCompiler {

    private static $module_idx = 0;
    public llvm $lib;
    public LLVMModuleRef $module;
    public LLVMContextRef $context;

    public function __construct() {
        $this->lib = new llvm;
        $this->module = $this->lib->LLVMModuleCreateWithName("test_" . (self::$module_idx++));
        $this->context = $this->lib->LLVMGetModuleContext($this->module);
    }

    protected function _createPrimitiveType(int $type): CoreType {
        switch ($type) {
            case CoreType::T_VOID:
                return new Type($this, $this->lib->LLVMVoidTypeInContext($this->context));
            case CoreType::T_VOID_PTR:
                return $this->createPrimitiveType(CoreType::T_VOID)->getPointer();
            case CoreType::T_BOOL:
                return new Type($this, $this->lib->LLVMInt1TypeInContext($this->context));
            case CoreType::T_CHAR:
                return new Type($this, $this->lib->LLVMInt8TypeInContext($this->context), Type::IS_SIGNED);
            case CoreType::T_SIGNED_CHAR:
                return new Type($this, $this->lib->LLVMInt8TypeInContext($this->context), Type::IS_SIGNED);
            case CoreType::T_UNSIGNED_CHAR:
                return new Type($this, $this->lib->LLVMInt8TypeInContext($this->context));
            case CoreType::T_SHORT:
                return new Type($this, $this->lib->LLVMInt16TypeInContext($this->context), Type::IS_SIGNED);
            case CoreType::T_UNSIGNED_SHORT:
                return new Type($this, $this->lib->LLVMInt16TypeInContext($this->context));
            case CoreType::T_INT:
                return new Type($this, $this->lib->LLVMInt16TypeInContext($this->context), Type::IS_SIGNED);
            case CoreType::T_UNSIGNED_INT:
                return new Type($this, $this->lib->LLVMInt16TypeInContext($this->context));
            case CoreType::T_LONG:
                return new Type($this, $this->lib->LLVMInt32TypeInContext($this->context), Type::IS_SIGNED);
            case CoreType::T_UNSIGNED_LONG:
                return new Type($this, $this->lib->LLVMInt32TypeInContext($this->context));
            case CoreType::T_LONG_LONG:
                return new Type($this, $this->lib->LLVMInt64TypeInContext($this->context), Type::IS_SIGNED);
            case CoreType::T_UNSIGNED_LONG_LONG:
                return new Type($this, $this->lib->LLVMInt64TypeInContext($this->context));
            case CoreType::T_FLOAT:
                return new Type($this, $this->lib->LLVMFloatTypeInContext($this->context));
            case CoreType::T_DOUBLE:
                return new Type($this, $this->lib->LLVMDoubleTypeInContext($this->context));
            case CoreType::T_LONG_DOUBLE:
                return new Type($this, $this->lib->LLVMFP128TypeInContext($this->context));
            case CoreType::T_SIZE_T:
                return new Type($this, $this->lib->LLVMInt64TypeInContext($this->context));
        }
        throw new \LogicException('Unknown primitive type found: ' . $type);
    }

}