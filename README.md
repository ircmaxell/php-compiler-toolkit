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
use PHPCompilerToolkit\Context;
use PHPCompilerToolkit\Builder\GlobalBuilder;
use PHPCompilerToolkit\IR\Parameter;

$context = new Context;
$builder = new GlobalBuilder($context);

// long long add(long long a, long long b) {
//     return a + b;
// }

// First, let's get a reference to the type we want to use:
$type = $builder->type()->longLong()    ;
// Next, we need to create the function: name, returnType, isVariadic, Parameter ...
$func = $builder->createFunction('add', $type, false, new Parameter($type, 'a'), new Parameter($type, 'b'));
// We need a block in the function (blocks contain code)
$main = $func->createBlock('main');
// We want the block to return the result of addition of the two args:
$main->returnValue($main->add($func->arg(0), $func->arg(1)));
// We are done building everything
$builder->finish();
```

Notice how we haven't picked a backend yet. Now we can:

```php

$libjit = new PHPCompilerToolkit\Backend\LIBJIT;

$add = $libjit->compile($context)->getCallable('add');
```

Or if we wanted to use libgccjit:

```php
$libgccjit = new PHPCompilerToolkit\Backend\LIBGCCJIT;

$add = $libgccjit->compile($context)->getCallable('add');
```

Or if we wanted to use LLVM:

```php
$llvm = new PHPCompilerToolkit\Backend\LLVM;

$add3 = $llvm->compile($context)->getCallable('add');
```

And since they are just normal PHP closures at this point:

```php
var_dump($add(1, 1), $add2(2, 2), $add3(4, 4);
// int(2), int(4), int(8)
```