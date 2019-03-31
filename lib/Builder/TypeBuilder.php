<?php declare(strict_types=1);
namespace PHPCompilerToolkit\Builder;

use PHPCompilerToolkit\Builder;
use PHPCompilerToolkit\Context;
use PHPCompilerToolkit\Type;

class TypeBuilder extends Builder {

    private Type $longLong;

    public function __construct(Context $context, GlobalBuilder $parent) {
        parent::__construct($context, $parent);
    }

    public function longLong(): Type {
        if (!isset($this->longLong)) {
            $this->longLong = new Type\Primitive($this->context, Type\Primitive::T_LONG_LONG);
        }
        return $this->longLong;
    }
}