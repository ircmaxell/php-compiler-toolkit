<?php
error_reporting(~0);
require __DIR__ . '/vendor/autoload.php';

use PHPCompilerToolkit\Context;
use PHPCompilerToolkit\Builder\GlobalBuilder;
use PHPCompilerToolkit\IR\Parameter;
use PHPCompilerToolkit\Type\Primitive;

$context = new Context;
$builder = new GlobalBuilder($context);

// long long add(long long a, long long b) {
//     return a + b;
// }
// First, let's get a reference to the type we want to use:
$type = $builder->type()->longLong()    ;
// Next, we need to create the function: name, returnType, isVariadic, Parameter ...
$func = $builder->createFunction('add', $type, false, new Parameter($type, 'a'), new Parameter($type, 'b'));
// We need a block in the function (blocks contain code)
$main = $func->createBlock('main');
// We want the block to return the result of addition of the two args:
$main->returnValue($main->add($func->arg(0), $func->arg(1)));
// We are done building everything
$builder->finish();

use PHPCompilerToolkit\Backend;
$libjit = new Backend\LIBJIT;
$libgccjit = new Backend\LIBGCCJIT;
$llvm = new Backend\LLVM;

$a = $libjit->compile($context)->getCallable('add');
$b = $libgccjit->compile($context)->getCallable('add');
$c = $llvm->compile($context)->getCallable('add');

var_dump($a(1, 1), $b(2, 2), $c(4, 4));