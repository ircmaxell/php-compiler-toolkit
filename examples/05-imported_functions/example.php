<?php declare(strict_types=1);
namespace Example_05;

error_reporting(~0);
require_once __DIR__ . '/../common.php';

use PHPCompilerToolkit\Context;
use PHPCompilerToolkit\Builder\GlobalBuilder;
use PHPCompilerToolkit\IR\Parameter;

$context = new Context;
$builder = new GlobalBuilder($context);

$type = $builder->type()->long_long();

$abs = $builder->importFunction('abs', $builder->type()->int(), false, new Parameter($builder->type()->int(), 'n'));


// Next, we need to create the function: name, returnType, isVariadic, Parameter ...
$func = $builder->exportFunction('test', $builder->type()->int(), false, new Parameter($builder->type()->int(), 'a'));

// We need a block in the function (blocks contain code)
$main = $func->createBlock('main');

$result = $main->call($abs, $func->arg(0));
// We want the block to return the result of addition of the two args:
$main->returnValue($result);

$builder->finish();


echo "Test Function:
    int test(int a) {
        return abs(a);
    }
";

$compilerSet = getCompilerSet();
// libjit doesn't support imported functions for now
$compilerSet->libjit = false; 

generateResults(
    $context,
    // current directory
    __DIR__,
    // fn name
    'test',
    // tests
    [[1], [-1], [10], [-10]],
    // benchmark iterations
    1000000,
    // baseline implementation
    function(int $a): int {
        return abs($a);
    },
    $compilerSet
);
