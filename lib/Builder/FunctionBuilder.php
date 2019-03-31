<?php declare(strict_types=1);
namespace PHPCompilerToolkit\Builder;

use SplObjectStorage;
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
        // Handle block args
        // Build block graph
        do {
            $rerun = false;
            $parentMap = new SplObjectStorage;
            $argumentMap = new SplObjectStorage;
            foreach ($this->blocks as $block) {
                $argumentMap[$block->block] = $block->arguments;
                $block->arguments = new SplObjectStorage;
                foreach ($block->getTargetBlocks() as $subBlock) {
                    if (!$parentMap->contains($subBlock)) {
                        $parentMap[$subBlock] = [];
                    }
                    $a = $parentMap[$subBlock];
                    $a[] = $block->block;
                    $parentMap[$subBlock] = $a;
                }
            }
            foreach ($parentMap as $block) {
                if ($argumentMap[$block]->count() === 0) {
                    continue;
                }
                $parents = $parentMap[$block];
                // for each parent, wire in arguments
                foreach ($parents as $parent) {
                    $call = $parent->getBlockCallForBlock($block);
                    if (count($call->arguments) !== count($block->arguments)) {
                        throw new \RuntimeException("Mismatch between argument counts for block and call");
                    }
                    foreach ($argumentMap[$block] as $argument) {
                        if ($argument->isOwnedBy($parent)) {
                            // add directly
                            $call->arguments[] = $argument;
                        } else {
                            // hoist to arg
                            $call->arguments[] = $this->findBuilderForBlock($parent)->hoistToArg($argument);
                            $rerun = true;
                        }
                    }
                }
                // finally, add the positional arguments
                foreach ($argumentMap[$block] as $argument) {
                    $block->arguments[] = $argumentMap[$block][$argument];
                }
            }
        } while ($rerun);
    }

    private function findBuilderForBlock(Block $block): BlockBuilder {
        foreach ($this->blocks as $tmp) {
            if ($tmp->block === $block) {
                return $tmp;
            }
        }
        throw new \LogicException("Could not find block");
    }
}