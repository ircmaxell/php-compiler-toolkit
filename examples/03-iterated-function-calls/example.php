<?php declare(strict_types=1);
namespace Example_03;
error_reporting(~0);
require_once __DIR__ . '/../common.php';


use PHPCompilerToolkit\Context;
use PHPCompilerToolkit\Builder\GlobalBuilder;
use PHPCompilerToolkit\IR\Parameter;

$context = new Context;
$builder = new GlobalBuilder($context);

$type = $builder->type()->long_long();

// First, let's create an add(a, b) { return a + b; } function to call later:

$add = $builder->alwaysInlineFunction('add', $type, false, new Parameter($type, 'a'), new Parameter($type, 'b'));
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

$add100 = $builder->exportFunction('add100', $type, false, new Parameter($type, 'a'), new Parameter($type, 'b'));
$main = $add100->createBlock('main');
$r1 = $add100->arg(0);
for ($i = 0; $i < 100; $i++) {
    $r1 = $main->call($add, $r1, $add100->arg(1));
}
$main->returnValue($r1);

$builder->finish();


echo "Add100 Function:
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

function add(int $a, int $b): int {
    return $a + $b;
}
$cb = function(int $a, int $b): int {
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
};


generateResults(
    $context,
    // current directory
    __DIR__,
    // fn name
    'add100',
    // tests
    [[1, 1], [1, 2], [99, 1], [[1, 2], 3]],
    // benchmark iterations
    1000000,
    // baseline implementation
    $cb
);