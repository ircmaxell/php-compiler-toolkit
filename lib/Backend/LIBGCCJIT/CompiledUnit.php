<?php
declare(strict_types=1);

namespace PHPCompilerToolkit\Backend\LIBGCCJIT;

use FFI;
use PHPCompilerToolkit\Backend\LIBGCCJIT;
use PHPCompilerToolkit\CompiledUnit as CoreCompiledUnit;
use libgccjit\gcc_jit_result_ptr;

class CompiledUnit implements CoreCompiledUnit {

    private LIBGCCJIT $backend;
    private gcc_jit_result_ptr $result;
    private array $signatures;

    public function __construct(LIBGCCJIT $backend, gcc_jit_result_ptr $result, array $signatures) {
        $this->backend = $backend;
        $this->result = $result;
        $this->signatures = $signatures;
    }

    public function getCallable(string $functionName): callable {
        if (!isset($this->signatures[$functionName])) {
            throw new \LogicException("Unable to get callable for unknown function $functionName");
        }
        $code = $this->backend->lib->gcc_jit_result_get_code($this->result, $functionName);
        $cb = $this->backend->lib->getFFI()->new($this->signatures[$functionName]);
        FFI::memcpy(
            FFI::addr($cb),
            FFI::addr($code->getData()),
            FFI::sizeof($cb)
        );
        return $cb;
    }

}