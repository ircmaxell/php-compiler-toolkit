<?php declare(strict_types=1);
namespace Example_01;

error_reporting(~0);

require_once __DIR__ . '/../common.php';

use PHPCompilerToolkit\Context;
use PHPCompilerToolkit\Builder\GlobalBuilder;
use PHPCompilerToolkit\IR\Parameter;

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
$func = $builder->exportFunction('add1or2', $type, false, new Parameter($type, 'shouldAdd1'), new Parameter($type, 'a'));
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

echo "Add1or2 Function:
    long long add1or2(long long shouldAdd1, long long a) {
       if (shouldAdd > 0) {
            return a + 1;
       }
       return a + 2;
   }
";

generateResults(
    $context,
    // current directory
    __DIR__,
    // fn name
    'add1or2',
    // tests
    [[1, 1], [1, 2], [99, 1], [[1, 2], 3]],
    // benchmark iterations
    1000000,
    // baseline implementation
    function(int $shouldAdd, int $a): int {
        if ($shouldAdd > 0) {
            return $a + 1;
        }
        return $a + 2;
    }
);
