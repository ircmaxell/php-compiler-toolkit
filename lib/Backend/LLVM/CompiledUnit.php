<?php
declare(strict_types=1);

namespace PHPCompilerToolkit\Backend\LLVM;

use FFI;
use PHPCompilerToolkit\Backend\LLVM;
use PHPCompilerToolkit\CompiledUnit as CoreCompiledUnit;
use llvm\LLVMExecutionEngineRef;
use llvm\LLVMModuleRef;
use llvm\string_ptr;
use llvm\llvm as lib;
use llvm\LLVMCodeGenFileType;

class CompiledUnit implements CoreCompiledUnit {

    private LLVM $backend;
    private LLVMModuleRef $module;
    private LLVMExecutionEngineRef $engine;
    private array $signatures;
    private int $optimizationlevel;

    public function __construct(LLVM $backend, LLVMModuleRef $module, LLVMExecutionEngineRef $engine, array $signatures, int $optimizationlevel) {
        $this->backend = $backend;
        $this->module = $module;
        $this->engine = $engine;
        $this->signatures = $signatures;
        $this->optimizationlevel = $optimizationlevel;
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


    public function dumpToFile(string $filename): void {
        $error = new string_ptr(FFI::addr(FFI::new('char*')));
        $this->backend->lib->LLVMPrintModuleToFile($this->module, $filename, $error);
    }

    public function dumpCompiledToFile(string $filename): void {
        $error = new string_ptr(FFI::addr(FFI::new('char*')));
        $cgft = $this->backend->lib->getFFI()->new('LLVMCodeGenFileType');
        $cgft = lib::LLVMAssemblyFile;
        $codegen = new LLVMCodeGenFileType($cgft);
        $machine = $this->backend->lib->LLVMGetExecutionEngineTargetMachine($this->engine);
        $this->backend->lib->LLVMTargetMachineEmitToFile($machine, $this->module, $filename, $codegen, $error);
    }
}