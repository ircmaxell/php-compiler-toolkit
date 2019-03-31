<?php
declare(strict_types=1);

namespace PHPCompilerToolkit\Type;
use PHPCompilerToolkit\Context;
use PHPCompilerToolkit\TypeAbstract;
use PHPCompilerToolkit\Type;

class ArrayType extends TypeAbstract {
    
    public Type $parent;
    public int $numElements;

    public function __construct(Context $context, Type $parent, int $numElements) {
        parent::__construct($context);
        $this->parent = $parent;
        $this->numElements = $numElements;
    }

    public function asCString(): string {
        return $this->parent->asCString() . '[' . $this->numElements . ']';
    }

}