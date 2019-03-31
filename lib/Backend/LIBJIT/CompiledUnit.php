<?php
declare(strict_types=1);

namespace PHPCompilerToolkit\Backend\LIBJIT;

use FFI;
use PHPCompilerToolkit\Backend\LIBJIT;
use PHPCompilerToolkit\CompiledUnit as CoreCompiledUnit;

class CompiledUnit implements CoreCompiledUnit {

    private LIBJIT $backend;
    private array $functions;
    private array $signatures;

    public function __construct(LIBJIT $backend, array $functions, array $signatures) {
        $this->backend = $backend;
        $this->functions = $functions;
        $this->signatures = $signatures;
    }

    public function getCallable(string $functionName): callable {
        if (!isset($this->functions[$functionName])) {
            throw new \LogicException("Unable to get callable for unknown function $functionName");
        }
        $code = $this->backend->lib->jit_function_to_closure($this->functions[$functionName]);
        $cb = $this->backend->lib->getFFI()->new($this->signatures[$functionName]);
        FFI::memcpy(
            FFI::addr($cb),
            FFI::addr($code->getData()),
            FFI::sizeof($cb)
        );
        return $cb;
    }

}