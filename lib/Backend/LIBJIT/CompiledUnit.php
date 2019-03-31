<?php
declare(strict_types=1);

namespace PHPCompilerToolkit\Backend\LIBJIT;

use FFI;
use PHPCompilerToolkit\Backend\LIBJIT;
use PHPCompilerToolkit\CompiledUnit as CoreCompiledUnit;
use libjit\FILE_ptr;

class CompiledUnit implements CoreCompiledUnit {

    private LIBJIT $backend;
    private array $functions;
    private array $signatures;
    private array $compiledFunctions = [];

    public function __construct(LIBJIT $backend, array $functions, array $signatures) {
        $this->backend = $backend;
        $this->functions = $functions;
        $this->signatures = $signatures;
    }

    public function getCallable(string $functionName): callable {
        if (!isset($this->functions[$functionName])) {
            throw new \LogicException("Unable to get callable for unknown function $functionName");
        }
        $this->compile($functionName);
        $code = $this->backend->lib->jit_function_to_closure($this->functions[$functionName]);
        $cb = $this->backend->lib->getFFI()->new($this->signatures[$functionName]);
        FFI::memcpy(
            FFI::addr($cb),
            FFI::addr($code->getData()),
            FFI::sizeof($cb)
        );
        return $cb;
    }

    public function dumpCompiledToFile(string $filename): void {
        $file = $this->backend->lib->fopen($filename, 'w');
        foreach ($this->functions as $name => $func) {
            $this->compile($name);
            $this->backend->lib->jit_dump_function($file, $func, $name);
        }
        $this->backend->lib->fclose($file);
    }

    public function dumpToFile(string $filename): void {
        $file = $this->backend->lib->fopen($filename, 'w');
        foreach ($this->functions as $name => $func) {
            if (isset($this->compiledFunctions[$name])) {
                throw new \LogicException("Function is already compiled, cannot dump");
            }
            $this->backend->lib->jit_dump_function($file, $func, $name);
        }
        $this->backend->lib->fclose($file);
    }

    protected function compile(string $functionName) {
        if (!isset($this->compiledFunctions[$functionName])) {
            $this->compiledFunctions[$functionName] = true;
            $this->backend->lib->jit_function_compile($this->functions[$functionName]);
        }
    }

}