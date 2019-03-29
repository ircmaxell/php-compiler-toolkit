<?php
require __DIR__ . '/vendor/autoload.php';

use PHPCompilerToolkit\Compiler;
use PHPCompilerToolkit\Type;
use PHPCompilerToolkit\Block;


function compileAdd(Compiler $compiler): callable {
    $long = $compiler->createPrimitiveType(Type::T_LONG_LONG);
    $func = $compiler->createFunction(
        'add', 
        $long, 
        false, 
        $compiler->createParameter('a', $long),
        $compiler->createParameter('b', $long)
    );

    $block = $func->createBlock("main");
    $b = $block->binaryOp(Block::BINARYOP_ADD, $func->getParameterByName('a'), $func->getParameterByName('b'), $long);
    $block->endWithReturn($b);

    $result = $compiler->compileInPlace();

    return $result->getCallable('add');
}


$libjit = new PHPCompilerToolkit\Backend\libjit\Compiler;
$libgccjit = new PHPCompilerToolkit\Backend\libgccjit\Compiler;
$llvm = new PHPCompilerToolkit\Backend\llvm\Compiler;

$a = compileAdd($libjit);
$b = compileAdd($libgccjit);
$c = compileAdd($llvm);

var_dump($a(1, 1), $b(2, 2));