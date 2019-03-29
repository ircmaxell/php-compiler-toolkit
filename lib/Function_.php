<?php
declare(strict_types=1);

namespace PHPCompilerToolkit;

interface Function_ {

    public function getReturnType(): Type;

    public function getParameters(): array;

    public function getParameterIndex(int $index): Parameter;

    public function getParameterByName(string $name): Parameter;

    public function getName(): string;

    public function isVariadic(): bool;

    public function createBlock(string $name): Block;

}