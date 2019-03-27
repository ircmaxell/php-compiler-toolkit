<?php
declare(strict_types=1);

namespace PHPCompilerToolkit\Backend\libjit;

use PHPCompilerToolkit\AbstractCompiler;
use PHPCompilerToolkit\Type as CoreType;

use libjit\libjit;
use libjit\jit_context_t;

class Compiler extends AbstractCompiler {

    public libjit $lib;
    public jit_context_t $context;

    public function __construct() {
        $this->lib = new libjit;
        $this->context = $this->lib->jit_context_create();
    }

    protected function _createPrimitiveType(int $type): CoreType {
        switch ($type) {
            case CoreType::T_VOID:
                return new Type($this, $this->lib->jit_type_void);
            case CoreType::T_VOID_PTR:
                return new Type($this, $this->lib->jit_type_void_ptr);
            case CoreType::T_BOOL:
                return new Type($this, $this->lib->jit_type_sys_bool);
            case CoreType::T_CHAR:
                return new Type($this, $this->lib->jit_type_sys_char);
            case CoreType::T_SIGNED_CHAR:
                return new Type($this, $this->lib->jit_type_sys_schar);
            case CoreType::T_UNSIGNED_CHAR:
                return new Type($this, $this->lib->jit_type_sys_uchar);
            case CoreType::T_SHORT:
                return new Type($this, $this->lib->jit_type_short);
            case CoreType::T_UNSIGNED_SHORT:
                return new Type($this, $this->lib->jit_type_ushort);
            case CoreType::T_INT:
                return new Type($this, $this->lib->jit_type_int);
            case CoreType::T_UNSIGNED_INT:
                return new Type($this, $this->lib->jit_type_uint);
            case CoreType::T_LONG:
                return new Type($this, $this->lib->jit_type_long);
            case CoreType::T_UNSIGNED_LONG:
                return new Type($this, $this->lib->jit_type_ulong);
            case CoreType::T_LONG_LONG:
                return new Type($this, $this->lib->jit_type_sys_longlong);
            case CoreType::T_UNSIGNED_LONG_LONG:
                return new Type($this, $this->lib->jit_type_sys_ulonglong);
            case CoreType::T_FLOAT:
                return new Type($this, $this->lib->jit_type_float32);
            case CoreType::T_DOUBLE:
                return new Type($this, $this->lib->jit_type_float64);
            case CoreType::T_LONG_DOUBLE:
                return new Type($this, $this->lib->jit_type_sys_long_double);
            case CoreType::T_SIZE_T:
                return new Type($this, $this->lib->jit_type_nuint);
        }
        throw new \LogicException('Unknown primitive type found: ' . $type);
    }

}