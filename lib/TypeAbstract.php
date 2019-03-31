<?php
declare(strict_types=1);

namespace PHPCompilerToolkit;

abstract class TypeAbstract implements Type {

    public Context $context;

    public function __construct(Context $context) {
        $this->context = $context;
        $this->context->types[] = $this;
    }

    public function getContext(): Context {
        return $this->context;
    }
    
    public function getPointer(): Type {
        return new Type\Pointer($this->context, $this);
    }

    public function getConst(): Type {
        return new Type\Const_($this->context, $this);
    }

    public function getVolatile(): Type {
        return new Type\Volatile($this->context, $this);
    }

    public function newArrayType(int $numElements): Type {
        return new Type\ArrayType($this->context, $this, $numElements);
    }

    public function isSigned(): bool {
        return false;
    }

    public function isFloatingPoint(): bool {
        return false;
    }

}