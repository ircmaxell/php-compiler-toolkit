<?php declare(strict_types=1);
namespace Example_04;
error_reporting(~0);
require_once __DIR__ . '/../common.php';


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

$add = $builder->exportFunction('add', $long, false, new Parameter($long, 'a'), new Parameter($long, 'b'));
$local = $add->createLocal('c', $struct);

$main = $add->createBlock('main');

$main->writeField($local, 'a', $add->arg(0));
$main->writeField($local, 'b', $add->arg(1));

$result = $main->add($main->readField($local, 'a'), $main->readField($local, 'b'));

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
        $struct = new \StdClass;
        $struct->a = $a;
        $struct->b = $b;
        return $struct->a + $struct->b;
    }
);


