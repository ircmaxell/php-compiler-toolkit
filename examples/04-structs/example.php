<?php declare(strict_types=1);
namespace Example_04;
error_reporting(~0);
require_once __DIR__ . '/../../vendor/autoload.php';


use PHPCompilerToolkit\Context;
use PHPCompilerToolkit\Printer;
use PHPCompilerToolkit\Builder\GlobalBuilder;
use PHPCompilerToolkit\IR\Parameter;
use PHPCompilerToolkit\Type\Primitive;

$context = new Context;
$builder = new GlobalBuilder($context);


$long = $builder->type()->long_long();

$struct = $builder->type()->struct("testA");
$struct->createField('a', $long)->createField('b', $long);

// long long add(long long a, long long b) {
//     struct {long long a; long long b} c;
//     c.a = a;
//     c.b = b;
//     return c.a + c.b;
// }

$add = $builder->createFunction('add', $long, false, new Parameter($long, 'a'), new Parameter($long, 'b'));
$local = $add->createLocal('c', $struct);

$main = $add->createBlock('main');

$main->writeField($local, 'a', $add->arg(0));
$main->writeField($local, 'b', $add->arg(1));

$result = $main->add($main->readField($local, 'a'), $main->readField($local, 'b'));

$main->returnValue($result);

$builder->finish();

file_put_contents(__DIR__ . '/example.ir', (new Printer)->print($context));


use PHPCompilerToolkit\Backend;

$libjit = new Backend\LIBJIT;
$libgccjit = new Backend\LIBGCCJIT;
$llvm = new Backend\LLVM;

$timers = [];

$results = [];
$start = microtime(true);

$results['libjit'] = $libjit->compile($context, Backend::O3);
$timers["libjit"] = microtime(true);
 
$results['libgccjit'] = $libgccjit->compile($context, Backend::O3);
$timers['libgccjit'] = microtime(true);

$results['llvm'] =  $llvm->compile($context, Backend::O3);
$timers['llvm'] = microtime(true);


echo "Compiled Timers: \n";
foreach ($timers as $name => $time) {
    echo "  $name compiled in: " . ($time - $start) . " seconds\n";
    $start = $time;
}

foreach ($results as $name => $result) {
    $result->dumpToFile(__DIR__ . '/' . $name . '.bc');
    $result->dumpCompiledToFile(__DIR__ . '/' . $name . '.s');
}

echo "Add Function:
    long long add(long long a, long long b) {
        return a + b;
    }
";

$callbacks = [];
foreach ($results as $name => $result) {
    $callbacks[$name] = $result->getCallable('add');
}

foreach ($callbacks as $compiler => $callable) {
    echo "    Compiler $compiler: \n";
    echo "      add(1, 1) = " . $callable(1, 1) . "\n";
    echo "      add(1, 2) = " . $callable(1, 2) . "\n";
    echo "      add(99, 1) = " . $callable(99, 1) . "\n";
    echo "      add(add(1, 2), 3) = " . $callable($callable(1, 2), 3) . "\n";
}

$timers = [];
$start = microtime(true);
foreach ($callbacks as $compiler => $callable) {
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
    $struct = new \StdClass;
    $struct->a = $a;
    $struct->b = $b;
    return $struct->a + $struct->b;
}