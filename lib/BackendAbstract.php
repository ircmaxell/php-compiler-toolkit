<?php
declare(strict_types=1);

namespace PHPCompilerToolkit;

use SplObjectStorage;
use PHPCompilerToolkit\IR\Function_;

abstract class BackendAbstract implements Backend {

    protected SplObjectStorage $typeMap;
    protected array $functionMap;
    protected array $signatureMap;

    public function compile(Context $context): CompiledUnit {
        $this->beforeCompile($context);
        $this->typeMap = new SplObjectStorage;
        $this->functionMap = [];
        foreach ($context->types as $type) {
            $this->typeMap[$type] = $this->compileType($type);
        }
        foreach ($context->functions as $function) {
            $this->functionMap[$function->name] = $this->declareFunction($function);
            $this->signatureMap[$function->name] = $this->generateSignature($function);
        }
        foreach ($context->functions as $function) {
            $this->compileFunction($function, $this->functionMap[$function->name]);
        }
        $result = $this->buildResult();
        unset($this->typeMap);
        unset($this->functionMap);
        $this->afterCompile($context);
        return $result;
    }

    abstract protected function compileType(Type $type);
    abstract protected function declareFunction(Function_ $function);
    abstract protected function compileFunction(Function_ $function, $func): void;
    abstract protected function buildResult(): CompiledUnit;

    protected function beforeCompile(Context $context): void {
    }

    protected function afterCompile(Context $context): void {
    }

    protected function generateSignature(Function_ $function): string {
        $params = [];
        foreach ($function->parameters as $parameter) {
            $params[] = $parameter->type->asCString();
        }
        if ($function->isVariadic) {
            $params[] = "...";
        }
        return $function->returnType->asCString() . '(*)(' . implode(', ', $params) . ')';
    }
    
}