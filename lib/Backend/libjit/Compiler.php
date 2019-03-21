<?php
declare(strict_types=1);

namespace PHPCompilerToolkit\Backend\libjit;

use PHPCompilerToolkit\AbstractCompiler;
use PHPCompilerToolkit\Type as CoreType;

class Compiler extends AbstractCompiler {

    public function __construct() {
    }

    protected function _createPrimitiveType(int $type): CoreType {
        
    }

}