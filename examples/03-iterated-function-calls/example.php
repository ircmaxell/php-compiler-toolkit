<?php declare(strict_types=1);
namespace Example_03;
error_reporting(~0);
require_once __DIR__ . '/../../vendor/autoload.php';


use PHPCompilerToolkit\Context;
use PHPCompilerToolkit\Printer;
use PHPCompilerToolkit\Builder\GlobalBuilder;
use PHPCompilerToolkit\IR\Parameter;
use PHPCompilerToolkit\Type\Primitive;

$context = new Context;
$builder = new GlobalBuilder($context);


$type = $builder->type()->long_long();

// First, let's create an add(a, b) { return a + b; } function to call later:

$add = $builder->createFunction('add', $type, false, new Parameter($type, 'a'), new Parameter($type, 'b'));
$main = $add->createBlock('main');
$result = $main->add($add->arg(0), $add->arg(1));
$main->returnValue($result);


// Now, let's create a second function which calls add() 10 times on itself
// long long add100(long long a, long long b)
//     a = add(a, b)
//     a = add(a, b)
//     // 100 of these
//     return a;
// }

$add100 = $builder->createFunction('add100', $type, false, new Parameter($type, 'a'), new Parameter($type, 'b'));
$main = $add100->createBlock('main');
$r1 = $add100->arg(0);
for ($i = 0; $i < 100; $i++) {
    $r1 = $main->call($add, $r1, $add100->arg(1));
}
$main->returnValue($r1);

$builder->finish();

file_put_contents(__DIR__ . '/example.ir', (new Printer)->print($context));


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


echo "Add2 Function:
    long long add(long long a, long long b) {
        return a + b;
    }
    long long add100(long long a, long long b) {
        a = add(a, b)
        a = add(a, b)
        // 100 of these
        return a;
    }
";

$result = [
    'libjit' => $libjitResult->getCallable('add100'),
    'libgccjit' => $libgccjitResult->getCallable('add100'),
    'llvm' => $llvmResult->getCallable('add100'),
];

foreach ($result as $compiler => $callable) {
    echo "    Compiler $compiler: \n";
    echo "      add100(1, 2) = " . $callable(1, 2) . "\n";
    echo "      add100(2, 4) = " . $callable(2, 4) . "\n";
    echo "      add100(10, 10) = " . $callable(10, 10) . "\n";
    echo "      add100(1, add100(0, 99)) = " . $callable(1, $callable(0, 99)) . "\n";
}

$timers = [];
$start = microtime(true);
foreach ($result as $compiler => $callable) {
    for ($i = 0; $i < 1000000; $i++) {
        $callable($i, $i);
    }
    $timers[$compiler] = microtime(true);
}
for ($i = 0; $i < 1000000; $i++) {
    add100($i, $i);
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
function add100(int $a, int $b): int {
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    $a = add($a, $b);
    return $a;
}