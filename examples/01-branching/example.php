<?php declare(strict_types=1);
namespace Example_01;

error_reporting(~0);

require_once __DIR__ . '/../../vendor/autoload.php';

use PHPCompilerToolkit\Context;
use PHPCompilerToolkit\Builder\GlobalBuilder;
use PHPCompilerToolkit\IR\Parameter;
use PHPCompilerToolkit\Type\Primitive;

$context = new Context;
$builder = new GlobalBuilder($context);

// First, let's get a reference to the type we want to use:
$type = $builder->type()->long_long();


// long long add1or2(long long shouldAdd1, long long a) {
//     if (shouldAdd > 0) {
//          return a + 1;
//     }
//     return a + 2;
// }

// We need to create the function: name, returnType, isVariadic, Parameter ...
$func = $builder->createFunction('add1or2', $type, false, new Parameter($type, 'shouldAdd1'), new Parameter($type, 'a'));
// We need a block in the function (blocks contain code)
$main = $func->createBlock('main');
// Now create our two blocks for after the conditional
$ifTrue = $func->createBlock('ifTrue');
$ifFalse = $func->createBlock('ifFalse');
// shouldAdd > 0
$cond = $main->gt($func->arg(0), $builder->const()->long_long(0));
// if ($cond) $ifTrue else $ifFalse;
$main->jumpIf($cond, $ifTrue, $ifFalse);
// return a + 1
$ifTrue->returnValue($ifTrue->add($func->arg(1), $builder->const()->long_long(1)));
// return a + 2
$ifFalse->returnValue($ifFalse->add($func->arg(1), $builder->const()->long_long(2)));

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


echo "Add1or2 Function:
    long long add1or2(long long shouldAdd1, long long a) {
       if (shouldAdd > 0) {
            return a + 1;
       }
       return a + 2;
   }
";

$add1or2 = [
    'libjit' => $libjitResult->getCallable('add1or2'),
    'libgccjit' => $libgccjitResult->getCallable('add1or2'),
    'llvm' => $llvmResult->getCallable('add1or2'),
];

foreach ($add1or2 as $compiler => $callable) {
    echo "    Compiler $compiler: \n";
    echo "      add1or2(0, 1) = " . $callable(0, 1) . "\n";
    echo "      add1or2(0, 2) = " . $callable(0, 2) . "\n";
    echo "      add1or2(1, 99) = " . $callable(1, 99) . "\n";
    echo "      add1or2(1, add1or2(0, 99)) = " . $callable(1, $callable(0, 99)) . "\n";
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
    add1or2($i, $i);
}
$timers["native php"] = microtime(true);

echo "\n\nBenchmarked as:\n";
foreach ($timers as $compiler => $time) {
    echo "  $compiler executed in " . ($time - $start) . " seconds\n";
    $start = $time;
}
echo "\n";

function add1or2(int $shouldAdd, int $a): int {
    if ($shouldAdd > 0) {
        return $a + 1;
    }
    return $a + 2;
}