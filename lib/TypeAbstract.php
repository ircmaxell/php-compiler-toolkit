<?php
declare(strict_types=1);

namespace PHPCompilerToolkit;

abstract class TypeAbstract implements Type {

    public Context $context;
    protected ?Type $pointer = null;
    protected ?Type $const = null;
    protected ?Type $volatile = null;
    protected $array = array();

    public function __construct(Context $context) {
        $this->context = $context;
        $this->context->types[] = $this;
    }

    public function getContext(): Context {
        return $this->context;
    }
    
    public function getPointer(): Type {
        if ($this->pointer === null) {
            $this->pointer = new Type\Pointer($this->context, $this);
        }
        return $this->pointer;
    }

    public function getConst(): Type {
        if ($this->const === null) {
            $this->const = new Type\Const_($this->context, $this);
        }
        return $this->const; 
    }

    public function getVolatile(): Type {
        if ($this->volatile === null) {
            $this->volatile = new Type\Volatile($this->context, $this);
        }
        return $this->volatile;
    }

    public function newArrayType(int $numElements): Type {
        if (!isset($this->array[$numElements])) {
            $this->array[$numElements] = new Type\ArrayType($this->context, $this, $numElements);
        }
        return $this->array[$numElements];
    }

    public function isSigned(): bool {
        return false;
    }

    public function isFloatingPoint(): bool {
        return false;
    }

}