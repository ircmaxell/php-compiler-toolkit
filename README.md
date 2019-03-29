# A compiler toolkit for PHP

This attempts to be a pretty heavy abstraction on top of (initially) three libraries: 
 
 * [libgccjit](https://gcc.gnu.org/onlinedocs/gcc-7.2.0/jit/index.html)
 * [ligjit](https://www.gnu.org/software/libjit/)
 * [llvm](https://llvm.org/docs/)

As each project differs quite a bit once you get beyond the initial level, I'm not sure how useful a high level abstraction will be.

However, this project aims to be a pluggable backend for [PHP-Compiler](https://github.com/ircmaxell/php-compiler). The primary goal is to assess performance of each compiler and resulting code.

As such, the performance of this library isn't incredibly important today. Over time, it may become critical.

# How to use?

So, here's a "basic" example for a function which adds two numbers:

```php
use PHPCompilerToolkit\Compiler;
use PHPCompilerToolkit\Type;
use PHPCompilerToolkit\Block;


function compileAdd(Compiler $compiler): callable {
    $long = $compiler->createPrimitiveType(Type::T_LONG_LONG);
    $func = $compiler->createFunction(
        'add', 
        $long, 
        false, 
        $compiler->createParameter('a', $long),
        $compiler->createParameter('b', $long)
    );

    $block = $func->createBlock("main");
    $b = $block->binaryOp(Block::BINARYOP_ADD, $func->getParamterByName('a'), $func->getParamterByName('b'), $long);
    $block->endWithReturn($b);

    $result = $compiler->compileInPlace();

    return $result->getCallable('add');
}
```

Notice how we inject the compiler. This allows us to replace backends easily. To get a php callable back out, all we need to do is call `compileAdd` with an appropriate backend:

```php

$libjit = new PHPCompilerToolkit\Backend\libjit\Compiler;

$add = compileAdd($libjit);
```

Or if we wanted to use libgccjit:

```php
$libgccjit = new PHPCompilerToolkit\Backend\libgccjit\Compiler;

$add2 = compileAdd($libgccjit);
```

And since they are just normal PHP closures at this point:

```php
var_dump($add(1, 1), $add2(2, 2));
// int(2), int(4)
```