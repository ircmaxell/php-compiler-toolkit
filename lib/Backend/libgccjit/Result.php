<?php
declare(strict_types=1);

namespace PHPCompilerToolkit\Backend\libgccjit;

use PHPCompilerToolkit\Result as CoreResult;
use libgccjit\gcc_jit_result_ptr;
use FFI;

class Result implements CoreResult {

    public Compiler $compiler;
    public array $functions;
    public gcc_jit_result_ptr $result;

    public function __construct(Compiler $compiler, array $functions, gcc_jit_result_ptr $result) {
        $this->compiler = $compiler;
        $this->functions = $functions;
        $this->result = $result;
    }

    public function getCallable(string $functionName): callable {
        if (!isset($this->functions[$functionName])) {
            throw new \LogicException("Could not find compiled function: $functionName");
        }
        $func = $this->functions[$functionName];
        
        $params = [];
        foreach($func->getParameters() as $param) {
            $params[] = $param->getType()->asCString();
        }
        if ($func->isVariadic()) {
            $params[] = '...';
        }
        $signature = $func->getReturnType()->asCString() . '(*)(' . implode(', ', $params) . ')';
        $cb = $this->compiler->lib->getFFI()->new($signature);
        $code = $this->compiler->lib->gcc_jit_result_get_code($this->result, $functionName);
        FFI::memcpy(
            FFI::addr($cb),
            FFI::addr($code->getData()),
            FFI::sizeof($cb)
        );
        return $cb;
    }
}