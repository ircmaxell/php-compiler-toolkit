<?php
declare(strict_types=1);

namespace PHPCompilerToolkit\IR;

interface TerminalOp {
 
    public function getTargetBlocks(): array;

}