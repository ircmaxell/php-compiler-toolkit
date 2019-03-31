<?php
declare(strict_types=1);

namespace PHPCompilerToolkit\IR\Op;

use PHPCompilerToolkit\IR\Value;
use PHPCompilerToolkit\IR\OpAbstract;

class ReturnVoid extends OpAbstract {

    public function getArguments(): array {
        return [];
    }

    public function getResult(): ?Value {
        return null;
    }

    public function isTerminal(): bool {
        return true;
    }
}