<?php
declare(strict_types=1);

namespace PHPCompilerToolkit\IR;

interface Op {
 
    public function getArguments(): array;

    public function getResult(): ?Value;

    public function getName(): string;

}