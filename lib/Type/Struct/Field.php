<?php
declare(strict_types=1);

namespace PHPCompilerToolkit\Type\Struct;
use PHPCompilerToolkit\Context;
use PHPCompilerToolkit\TypeAbstract;
use PHPCompilerToolkit\Type;

class Field {

    public string $name;
    public Type $type;
    public Type\Struct $owner;

    public function __construct(Type\Struct $owner, string $name, Type $type) {
        $this->owner = $owner;
        $this->name = $name;
        $this->type = $type;
    }

}