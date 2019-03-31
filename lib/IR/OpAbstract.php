<?php
declare(strict_types=1);

namespace PHPCompilerToolkit\IR;

abstract class OpAbstract implements Op {

    public function getName(): string {
        return str_replace([__NAMESPACE__ . '\\Op\\', '\\'], ['', '_'], get_class($this));
    }

}