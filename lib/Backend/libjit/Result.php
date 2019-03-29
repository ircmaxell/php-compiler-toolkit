<?php
declare(strict_types=1);

namespace PHPCompilerToolkit\Backend\libjit;

use PHPCompilerToolkit\Result as CoreResult;
use FFI;

class Result implements CoreResult {

    public Compiler $compiler;
    public array $functions;

    public function __construct(Compiler $compiler, array $functions) {
        $this->compiler = $compiler;
        $this->functions = $functions;
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
        $code = $this->compiler->lib->jit_function_to_closure($func->getFunc());
        FFI::memcpy(
            FFI::addr($cb),
            FFI::addr($code->getData()),
            FFI::sizeof($cb)
        );
        return $cb;
    }
}