<?php declare(strict_types=1);
namespace PHPCompilerToolkit;
use PHPCompilerToolkit\Builder\FunctionBuilder;

abstract class Builder {

    public Context $context;
    public ?Builder $parent;

    public function __construct(Context $context, ?Builder $parent = null) {
        $this->context = $context;
        $this->parent = $parent;
    }

    public function __call($name, array $args) {
        if ($this->parent !== null) {
            return $this->parent->$name($args);
        }
        throw new \LogicException('Call to unknown method ' . $name);
    }

}