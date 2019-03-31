<?php
declare(strict_types=1);

namespace PHPCompilerToolkit\Type;
use PHPCompilerToolkit\Context;
use PHPCompilerToolkit\TypeAbstract;
use PHPCompilerToolkit\Type;

class Const_ extends TypeAbstract {
    
    public Type $parent;

    public function __construct(Context $context, Type $parent) {
        parent::__construct($context);
        $this->parent = $parent;
    }

    public function asCString(): string {
        return 'const ' . $this->parent->asCString();
    }

}