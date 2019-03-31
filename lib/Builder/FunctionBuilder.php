<?php declare(strict_types=1);
namespace PHPCompilerToolkit\Builder;
use PHPCompilerToolkit\Builder;
use PHPCompilerToolkit\Context;
use PHPCompilerToolkit\IR\Function_;
use PHPCompilerToolkit\IR\Value;

class FunctionBuilder extends Builder {
    public Function_ $function;
    public array $blocks = [];

    public function __construct(Context $context, Builder $parent, Function_ $function) {
        parent::__construct($context, $parent);
        $this->function = $function;
    }

    public function createBlock(string $name): BlockBuilder {
        $block = $this->function->createBlock($name);
        $blockBuilder = new BlockBuilder($this->context, $this, $block);
        $this->blocks[] = $blockBuilder;
        return $blockBuilder;
    }

    public function arg(int $index): Value {
        return $this->function->parameters[$index]->value;
    }

    public function finish(): void {
        foreach ($this->blocks as $block) {
            $block->finish();
        }
    }
}