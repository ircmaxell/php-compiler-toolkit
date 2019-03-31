<?php
declare(strict_types=1);

namespace PHPCompilerToolkit\Backend\LLVM;

use FFI;
use PHPCompilerToolkit\Backend\LLVM;
use PHPCompilerToolkit\CompiledUnit as CoreCompiledUnit;
use llvm\LLVMExecutionEngineRef;

class CompiledUnit implements CoreCompiledUnit {

    private LLVM $backend;
    private LLVMExecutionEngineRef $engine;
    private array $signatures;

    public function __construct(LLVM $backend, LLVMExecutionEngineRef $engine, array $signatures) {
        $this->backend = $backend;
        $this->engine = $engine;
        $this->signatures = $signatures;
    }

    public function getCallable(string $functionName): callable {
        if (!isset($this->signatures[$functionName])) {
            throw new \LogicException("Unable to get callable for unknown function $functionName");
        }
        $code = $this->backend->lib->LLVMGetFunctionAddress($this->engine, $functionName);
        $cb = $this->backend->lib->getFFI()->new($this->signatures[$functionName]);
        FFI::memcpy(
            FFI::addr($cb),
            FFI::addr($code->getData()),
            FFI::sizeof($cb)
        );
        return $cb;
    }

}