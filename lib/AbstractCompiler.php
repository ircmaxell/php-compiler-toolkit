<?php
declare(strict_types=1);

namespace PHPCompilerToolkit;


abstract class AbstractCompiler implements Compiler {
    
    private array $primitiveTypes = [];
    
    public function createPrimitiveType(int $type): Type {
        if (!isset($this->primitiveTypes[$type])) {
            $this->primitiveTypes[$type] = $this->_createPrimitiveType($type);
        }
        return $this->primitiveTypes[$type];
    }

    abstract protected function _createPrimitiveType(int $type): Type;

}