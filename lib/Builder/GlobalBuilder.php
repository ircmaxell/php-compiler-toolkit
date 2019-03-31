<?php declare(strict_types=1);
namespace PHPCompilerToolkit\Builder;
use PHPCompilerToolkit\Builder;
use PHPCompilerToolkit\IR\Function_;
use PHPCompilerToolkit\Type;
use PHPCompilerToolkit\IR\Parameter;

class GlobalBuilder extends Builder {

    public array $functions = [];

    public function createFunction(string $name, Type $returnType, bool $isVariadic, Parameter ...$parameters): FunctionBuilder {
        $function = new FunctionBuilder(
            $this->context,
            $this,
            new Function_(
                $this->context,
                $name,
                $returnType,
                $isVariadic,
                ...$parameters
            )
        );
        $this->functions[$name] = $function;
        return $function;
    }

    public function type(): TypeBuilder {
        return new TypeBuilder($this->context, $this);
    }

    public function finish(): void {
        foreach ($this->functions as $function) {
            $function->finish();
        }
    }

}