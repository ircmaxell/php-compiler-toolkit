<?php
declare(strict_types=1);

namespace PHPCompilerToolkit\Backend\PHP;

use PHPCompilerToolkit\Backend\PHP;
use PHPCompilerToolkit\CompiledUnit as CoreCompiledUnit;

class CompiledUnit implements CoreCompiledUnit {

    private PHP $backend;
    private string $code;
    private array $declaredFunctions;

    public function __construct(PHP $backend, string $code, array $declaredFunctions) {
        $this->backend = $backend;
        $this->code = $code;
        $this->declaredFunctions = $declaredFunctions;
    }

    public function getCallable(string $functionName): callable {
        if (!isset($this->declaredFunctions[$functionName])) {
            throw new \LogicException("Unable to get callable for unknown function $functionName");
        }
        return $this->declaredFunctions[$functionName];
    }


    public function dumpToFile(string $filename): void {
        file_put_contents($filename . '.php', '<?php '. $this->code);
    }

    public function dumpCompiledToFile(string $filename): void {
        file_put_contents($filename . '.php', '<?php '. $this->code);
    }
}