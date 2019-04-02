<?php declare(strict_types=1);
namespace PHPCompilerToolkit;

class Context {
    
    /**
     * @var IR\Function_[] $imports;
     */
    public array $imports = [];

    /**
     * @var IR\Function_[] $functions;
     */
    public array $functions = [];

    /**
     * @var IR\Value\Constant[] $constants;
     */
    public array $constants = [];

    /**
     * @var Type[] $types;
     */
    public array $types = [];

}