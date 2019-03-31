<?php declare(strict_types=1);
namespace Example_00;

error_reporting(~0);
require_once __DIR__ . '/../../vendor/autoload.php';

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

$builder->finish();


use PHPCompilerToolkit\Backend;
$libjit = new Backend\LIBJIT;
$libgccjit = new Backend\LIBGCCJIT;
$llvm = new Backend\LLVM;

$timers = [];
$start = microtime(true);
$libjitResult = $libjit->compile($context, Backend::O3);
$timers["libjit"] = microtime(true);
$libgccjitResult = $libgccjit->compile($context, Backend::O3);
$timers['libgccjit'] = microtime(true);
$llvmResult =  $llvm->compile($context, Backend::O3);
$timers['llvm'] = microtime(true);

echo "Compiled Timers: \n";
foreach ($timers as $name => $time) {
    echo "  $name compiled in: " . ($time - $start) . " seconds\n";
    $start = $time;
}

$libjitResult->dumpToFile(__DIR__ . '/libjit.bc');
$libgccjitResult->dumpToFile(__DIR__ . '/libgccjit.c');
$llvmResult->dumpToFile(__DIR__ . '/llvm.bc');

$libjitResult->dumpCompiledToFile(__DIR__ . '/libjit.s');
$libgccjitResult->dumpCompiledToFile(__DIR__ . '/libgccjit.s');
$llvmResult->dumpCompiledToFile(__DIR__ . '/llvm.s');


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
    echo "      add(1, 1) = " . $callable(1, 1) . "\n";
    echo "      add(1, 2) = " . $callable(1, 2) . "\n";
    echo "      add(99, 1) = " . $callable(99, 1) . "\n";
    echo "      add(add(1, 2), 3) = " . $callable($callable(1, 2), 3) . "\n";
}

$timers = [];
$start = microtime(true);
foreach ($add as $compiler => $callable) {
    for ($i = 0; $i < 1000000; $i++) {
        $callable($i, $i);
    }
    $timers[$compiler] = microtime(true);
}
for ($i = 0; $i < 1000000; $i++) {
    add($i, $i);
}
$timers["native php"] = microtime(true);

echo "\n\nBenchmarked as:\n";
foreach ($timers as $compiler => $time) {
    echo "  $compiler executed in " . ($time - $start) . " seconds\n";
    $start = $time;
}
echo "\n";

function add(int $a, int $b): int {
    return $a + $b;
}