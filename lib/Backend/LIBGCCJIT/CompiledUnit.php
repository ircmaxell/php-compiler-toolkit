<?php
declare(strict_types=1);

namespace PHPCompilerToolkit\Backend\LIBGCCJIT;

use FFI;
use PHPCompilerToolkit\Backend\LIBGCCJIT;
use PHPCompilerToolkit\CompiledUnit as CoreCompiledUnit;
use libgccjit\gcc_jit_context_ptr;
use libgccjit\gcc_jit_result_ptr;
use libgccjit\libgccjit as lib;

class CompiledUnit implements CoreCompiledUnit {

    private LIBGCCJIT $backend;
    private gcc_jit_result_ptr $result;
    private gcc_jit_context_ptr $context;
    private array $signatures;

    public function __construct(LIBGCCJIT $backend, gcc_jit_context_ptr $context, gcc_jit_result_ptr $result, array $signatures) {
        $this->backend = $backend;
        $this->context = $context;
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

    public function dumpToFile(string $filename): void {
        $this->backend->lib->gcc_jit_context_dump_to_file($this->context, $filename . '.c', 1);
    }

    public function dumpCompiledToFile(string $filename): void {
        $this->backend->lib->gcc_jit_context_compile_to_file($this->context, lib::GCC_JIT_OUTPUT_KIND_ASSEMBLER, $filename . '.s');
    }

}