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
$type = $builder->type()->long_long()    ;
// Next, we need to create the function: name, returnType, isVariadic, Parameter ...
$func = $builder->createFunction('add', $type, false, new Parameter($type, 'a'), new Parameter($type, 'b'));
// We need a block in the function (blocks contain code)
$main = $func->createBlock('main');

$result = $main->add($func->arg(0), $func->arg(1));
// We want the block to return the result of addition of the two args:
$main->returnValue($result);
// We are done building everything


// long long add1(long long a) {
//     return a + 1;
// }
// Next, we need to create the function: name, returnType, isVariadic, Parameter ...
$func = $builder->createFunction('add1', $type, false, new Parameter($type, 'a'));
// We need a block in the function (blocks contain code)
$main = $func->createBlock('main');
$main->returnValue($main->add($func->arg(0), $builder->const()->long_long(1)));
$builder->finish();

use PHPCompilerToolkit\Backend;
$libjit = new Backend\LIBJIT;
$libgccjit = new Backend\LIBGCCJIT;
$llvm = new Backend\LLVM;

$libjitResult = $libjit->compile($context);
$libgccjitResult = $libgccjit->compile($context);
$llvmResult =  $llvm->compile($context);


echo "Add Function:
    long long add(long long a, long long b) {
        return a + b;
    }
";

$add = [
    'libjit' => $libjitResult->getCallable('add'),
    'libgccjit' => $libgccjitResult->getCallable('add'),
    'llvm' => $llvmResult->getCallable('add'),
];

foreach ($add as $compiler => $callable) {
    echo "    Compiler $compiler: \n";
    echo "      1 + 1 = " . $callable(1, 1) . "\n";
    echo "      1 + 2 = " . $callable(1, 2) . "\n";
    echo "      99 + 1 = " . $callable(99, 1) . "\n";
    echo "      (1 + 2) + 3) = " . $callable($callable(1, 2), 3) . "\n";
}

echo "

Add1 Function:
    long long add1(long long a) {
        return a + 1;
    }
";


$add1 = [
    'libjit' => $libjitResult->getCallable('add1'),
    'libgccjit' => $libgccjitResult->getCallable('add1'),
    'llvm' => $llvmResult->getCallable('add1'),
];

foreach ($add1 as $compiler => $callable) {
    echo "    Compiler $compiler: \n";
    echo "      1 + 1 = " . $callable(1) . "\n";
    echo "      2 + 1 = " . $callable(2) . "\n";
    echo "      99 + 1 = " . $callable(99) . "\n";
    echo "      (99 + 1) + 1 = " . $callable($callable(99)) . "\n";
}