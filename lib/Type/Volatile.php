<?php
declare(strict_types=1);

namespace PHPCompilerToolkit\Type;
use PHPCompilerToolkit\TypeAbstract;
use PHPCompilerToolkit\Type;

class Volatile extends TypeAbstract {
    
    public Type $parent;

    public function __construct(Type $parent) {
        $this->parent = $parent;
    }

    public function asCString(): string {
        return 'volatile ' . $this->parent->asCString();
    }

}