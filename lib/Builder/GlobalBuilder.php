<?php declare(strict_types=1);
namespace PHPCompilerToolkit\Builder;
use PHPCompilerToolkit\Builder;
use PHPCompilerToolkit\Context;
use PHPCompilerToolkit\IR\Function_;
use PHPCompilerToolkit\Type;
use PHPCompilerToolkit\IR\Parameter;

class GlobalBuilder extends Builder {

    public array $functions = [];
    private TypeBuilder $type;
    private ConstBuilder $const;

    public function __construct(Context $context) {
        parent::__construct($context, null);
        $this->type = new TypeBuilder($this->context, $this);
        $this->const = new ConstBuilder($this->context, $this);
    }

    public function exportFunction(string $name, Type $returnType, bool $isVariadic, Parameter ...$parameters): FunctionBuilder {
        $function = new FunctionBuilder(
            $this->context,
            $this,
            new Function_\Exported(
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

    public function staticFunction(string $name, Type $returnType, bool $isVariadic, Parameter ...$parameters): FunctionBuilder {
        $function = new FunctionBuilder(
            $this->context,
            $this,
            new Function_\Static_(
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

    public function alwaysInlineFunction(string $name, Type $returnType, bool $isVariadic, Parameter ...$parameters): FunctionBuilder {
        $function = new FunctionBuilder(
            $this->context,
            $this,
            new Function_\AlwaysInline(
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

    public function importFunction(string $name, Type $returnType, bool $isVariadic, Parameter ...$parameters): FunctionBuilder {
        $function = new FunctionBuilder(
            $this->context,
            $this,
            new Function_\Imported(
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
        return $this->type;
    }

    public function const(): ConstBuilder {
        return $this->const;
    }

    public function finish(): void {
        foreach ($this->functions as $function) {
            $function->finish();
        }
    }

}