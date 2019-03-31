<?php
declare(strict_types=1);

namespace PHPCompilerToolkit\IR;

class Block {

    public Function_ $function;
    public string $name;
    public array $arguments;
    public array $ops = [];
    public bool $isClosed = false;

    public function __construct(Function_ $function, string $name) {
        $this->function = $function;
        $this->name = $name;
    }

    public function addOp(Op $op) {
        if ($this->isClosed) {
            throw new \LogicException("Attempting to add op to closed block");
        }
        foreach ($op->getArguments() as $arg) {
            if ($arg->block !== $this) {
                throw new \LogicException("Arg doesn't belong to block, this is not correct");
            }
        }
        $result = $op->getResult();
        if ($result !== null && $result->block !== $this) {
            throw new \LogicException("Result doesn't belong to block, this is not correct");
        }
        if ($op->isTerminal()) {
            $this->isClosed = true;
        }
        $this->ops[] = $op;
    }

}