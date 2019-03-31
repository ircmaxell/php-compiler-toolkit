# Basic Usage

This example compiles a basic function `add`:

```c
long long add(long long a, long long b) {
    return a + b;
}
```

It does this, through the builder:

```php
// First, let's get a reference to the type we want to use:
$type = $builder->type()->long_long()    ;
// Next, we need to create the function: name, returnType, isVariadic, Parameter ...
$func = $builder->createFunction('add', $type, false, new Parameter($type, 'a'), new Parameter($type, 'b'));
// We need a block in the function (blocks contain code)
$main = $func->createBlock('main');

$result = $main->add($func->arg(0), $func->arg(1));
// We want the block to return the result of addition of the two args:
$main->returnValue($result);
```

It then code generates through all 3 currently supported backends (libjit, libgccjit, and llvm):

```php
$libjit = new Backend\LIBJIT;
$libgccjit = new Backend\LIBGCCJIT;
$llvm = new Backend\LLVM;

$libjitResult = $libjit->compile($context, Backend::O0);
$libgccjitResult = $libgccjit->compile($context, Backend::O0);
$llvmResult =  $llvm->compile($context, Backend::O0);
```

Note the `Backend::O0` constant, that tells the backend to perform no optimizations (with `O3` being all available optimizations).

# Generated Results

## Output:

The output of executing the command is seen at [`example.output`](example.output).

So as you can see, FFI still has quite a bit of overhead for such a simple function...

## libgccjit

libgccjit generates 2 result files:

 * [`libgccjit.c`](libgccjit.c): The libgccjit bytecode (almost identical to C)
 * [`libgccjit.s`](libgccjit.s): The compiled and optimized assembly

## libjit

libjit generates 2 result files as well:

 * [`libjit.bc`](libjit.bc): The libjit internal bytecode
 * [`libjit.s`](libjit.s): The compiled and optimized assembly

## llvm

LVM also generates 2 result files

 * [`llvm.bc`](llvm.bc): The LLVM bytecode
 * [`llvm.s`](llvm.s): The compiled and optimized assembly


The other files in this folder are the output of each compiler:

