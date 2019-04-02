<?php declare(strict_types=1);
namespace Example_00;

error_reporting(~0);
require_once __DIR__ . '/../common.php';

use PHPCompilerToolkit\Context;
use PHPCompilerToolkit\Builder\GlobalBuilder;
use PHPCompilerToolkit\IR\Parameter;

$context = new Context;
$builder = new GlobalBuilder($context);

// long long add(long long a, long long b) {
//     return a + b;
// }
// First, let's get a reference to the type we want to use:
$type = $builder->type()->long_long()    ;
// Next, we need to create the function: name, returnType, isVariadic, Parameter ...
$func = $builder->exportFunction('add', $type, false, new Parameter($type, 'a'), new Parameter($type, 'b'));
// We need a block in the function (blocks contain code)
$main = $func->createBlock('main');

$result = $main->add($func->arg(0), $func->arg(1));
// We want the block to return the result of addition of the two args:
$main->returnValue($result);

$builder->finish();


echo "Add Function:
    long long add(long long a, long long b) {
        return a + b;
    }
";

generateResults(
    $context,
    // current directory
    __DIR__,
    // fn name
    'add',
    // tests
    [[1, 1], [1, 2], [99, 1], [[1, 2], 3]],
    // benchmark iterations
    1000000,
    // baseline implementation
    function(int $a, int $b): int {
        return $a + $b;
    }
);
