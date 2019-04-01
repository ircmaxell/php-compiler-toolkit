<?php declare(strict_types=1);
namespace PHPCompilerToolkit\Builder;

use PHPCompilerToolkit\Builder;
use PHPCompilerToolkit\Context;
use PHPCompilerToolkit\Type;
use PHPCompilerToolkit\Type\Primitive;

class TypeBuilder extends Builder {

    private array $primitives = [];

    private array $structs = [];

    public function __construct(Context $context, GlobalBuilder $parent) {
        parent::__construct($context, $parent);
    }

    public function void_(): Type {
        return $this->primitive(Primitive::T_VOID);
    }

    public function void_ptr(): Type {
        return $this->primitive(Primitive::T_VOID_PTR);
    }

    public function bool(): Type {
        return $this->primitive(Primitive::T_BOOL);
    }

    public function char(): Type {
        return $this->primitive(Primitive::T_CHAR);
    }

    public function signed_char(): Type {
        return $this->primitive(Primitive::T_SIGNED_CHAR);
    }

    public function unsigned_char(): Type {
        return $this->primitive(Primitive::T_UNSIGNED_CHAR);
    }

    public function short(): Type {
        return $this->primitive(Primitive::T_SHORT);
    }

    public function unsigned_short(): Type {
        return $this->primitive(Primitive::T_UNSIGNED_SHORT);
    }

    public function int(): Type {
        return $this->primitive(Primitive::T_INT);
    }

    public function unsigned_int(): Type {
        return $this->primitive(Primitive::T_UNSIGNED_INT);
    }

    public function long(): Type {
        return $this->primitive(Primitive::T_LONG);
    }

    public function unsigned_long(): Type {
        return $this->primitive(Primitive::T_UNSIGNED_LONG);
    }

    public function long_long(): Type {
        return $this->primitive(Primitive::T_LONG_LONG);
    }

    public function unsigned_long_long(): Type {
        return $this->primitive(Primitive::T_UNSIGNED_LONG_LONG);
    }

    public function float(): Type {
        return $this->primitive(Primitive::T_FLOAT);
    }

    public function double(): Type {
        return $this->primitive(Primitive::T_DOUBLE);
    }

    public function long_double(): Type {
        return $this->primitive(Primitive::T_LONG_DOUBLE);
    }

    public function size_t(): Type {
        return $this->primitive(Primitive::T_SIZE_T);
    }

    public function primitive(int $kind) {
        if (!isset($this->primitives[$kind])) {
            $this->primitives[$kind] = new Type\Primitive($this->context, $kind);
        }
        return $this->primitives[$kind];
    }

    public function struct(string $name): Type {
        if (!isset($this->structs[$name])) {
            $this->structs[$name] = new Type\Struct($this->context, $name);
        }
        return $this->structs[$name];
    }

    
}