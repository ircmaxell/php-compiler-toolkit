<?php declare(strict_types=1);
namespace PHPCompilerToolkit\Builder;

use PHPCompilerToolkit\Builder;
use PHPCompilerToolkit\Context;
use PHPCompilerToolkit\Type;
use PHPCompilerToolkit\IR\Value;
use PHPCompilerToolkit\Type\Primitive;


class ConstBuilder extends Builder {

    private array $primitives = [];

    public function __construct(Context $context, GlobalBuilder $parent) {
        parent::__construct($context, $parent);
    }

    public function bool(bool $value): Value {
        return $this->primitiveInt($value ? 0 : 1, Primitive::T_BOOL);
    }

    public function char(int $value): Value {
        return $this->primitiveInt($value, Primitive::T_CHAR);
    }

    public function signed_char(int $value): Value {
        return $this->primitiveInt($value, Primitive::T_SIGNED_CHAR);
    }

    public function unsigned_char(int $value): Value {
        return $this->primitiveInt($value, Primitive::T_UNSIGNED_CHAR);
    }

    public function short(int $value): Value {
        return $this->primitiveInt($value, Primitive::T_SHORT);
    }

    public function unsigned_short(int $value): Value {
        return $this->primitiveInt($value, Primitive::T_UNSIGNED_SHORT);
    }

    public function int(int $value): Value {
        return $this->primitiveInt($value, Primitive::T_INT);
    }

    public function unsigned_int(int $value): Value {
        return $this->primitiveInt($value, Primitive::T_UNSIGNED_INT);
    }

    public function long(int $value): Value {
        return $this->primitiveInt($value, Primitive::T_LONG);
    }

    public function unsigned_long(int $value): Value {
        return $this->primitiveInt($value, Primitive::T_UNSIGNED_LONG);
    }

    public function long_long(int $value): Value {
        return $this->primitiveInt($value, Primitive::T_LONG_LONG);
    }

    public function unsigned_long_long(int $value): Value {
        return $this->primitiveInt($value, Primitive::T_UNSIGNED_LONG_LONG);
    }

    public function float(float $value): Value {
        return $this->primitiveFloat($value, Primitive::T_FLOAT);
    }

    public function double(float $value): Value {
        return $this->primitiveFloat($value, Primitive::T_DOUBLE);
    }

    public function long_double(float $value): Value {
        return $this->primitiveFloat($value, Primitive::T_LONG_DOUBLE);
    }

    public function size_t(int $value): Value {
        return $this->primitiveInt($value, Primitive::T_SIZE_T);
    }

    public function primitiveInt(int $value, int $kind): Value {
        $type = $this->type()->primitive($kind);
        $const = new Value\Constant($value, $type);
        $this->context->constants[] = $const;
        return $const;
    }

    public function primitiveFloat(float $value, int $kind): Value {
        $type = $this->type()->primitive($kind);
        $const = new Value\Constant($value, $type);
        $this->context->constants[] = $const;
        return $const;
    }
}