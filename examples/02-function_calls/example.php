<?php declare(strict_types=1);
namespace Example_02;
error_reporting(~0);
require_once __DIR__ . '/../common.php';


use PHPCompilerToolkit\Context;
use PHPCompilerToolkit\Builder\GlobalBuilder;
use PHPCompilerToolkit\IR\Parameter;

$context = new Context;
$builder = new GlobalBuilder($context);


$type = $builder->type()->long_long();

// First, let's create an add(a, b) { return a + b; } function to call later:

$add = $builder->staticFunction('add', $type, false, new Parameter($type, 'a'), new Parameter($type, 'b'));
$main = $add->createBlock('main');
$result = $main->add($add->arg(0), $add->arg(1));
$main->returnValue($result);


// Now, let's create a second function which calls add() 10 times on itself
// long long add2(long long a, long long b)
//     a = add(a, b)
//     b = add(a, b)
//     return b;
// }

$add2 = $builder->exportFunction('add2', $type, false, new Parameter($type, 'a'), new Parameter($type, 'b'));
$main = $add2->createBlock('main');
$r1 = $main->call($add, $add2->arg(0), $add2->arg(1));
$r2 = $main->call($add, $r1, $add2->arg(1));
$main->returnValue($r2);

$builder->finish();

echo "Add2 Function:
    long long add(long long a, long long b) {
        return a + b;
    }
    long long add2(long long a, long long b) {
        return add(add(a, b), b);
    }
";

function add(int $a, int $b): int {
    return $a + $b;
}

generateResults(
    $context,
    // current directory
    __DIR__,
    // fn name
    'add2',
    // tests
    [[1, 1], [1, 2], [99, 1], [[1, 2], 3]],
    // benchmark iterations
    1000000,
    // baseline implementation
    function(int $a, int $b): int {
        return add(add($a, $b), $b);
    }
);