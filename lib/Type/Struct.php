<?php
declare(strict_types=1);

namespace PHPCompilerToolkit\Type;

use PHPCompilerToolkit\Context;
use PHPCompilerToolkit\TypeAbstract;
use PHPCompilerToolkit\Type;

class Struct extends TypeAbstract {
    
    public string $name;
    public array $fields;

    public function __construct(Context $context, string $name, Struct\Field ... $fields) {
        parent::__construct($context);
        $this->name = $name;
        $this->fields = $fields;
    }

    public function createField(string $name, Type $type): self {
        $this->addField(new Struct\Field($this, $name, $type));
        return $this;
    }

    public function addField(Struct\Field ... $fields): self {
        foreach ($fields as $field) {
            if ($field->owner !== $this) {
                throw new \LogicException("Attempting to add a field from a different struct");
            }
        }
        $this->fields = array_merge($this->fields, $fields);
        return $this;
    }

    public function fieldOffset(Struct\Field $field): int {
        foreach ($this->fields as $index => $tmp) {
            if ($tmp === $field) {
                return $index;
            }
        }
        throw new \LogicException("Attempt to fetch offset for unknown field: {$field->name}");
    }

    public function field(string $name): Struct\Field {
        foreach ($this->fields as $field) {
            if ($field->name === $name) {
                return $field;
            }
        }
        throw new \LogicException("Attempt to fetch unknown field $name");
    }

    public function asCString(): string {
        return 'struct ' . $this->name;
    }

}