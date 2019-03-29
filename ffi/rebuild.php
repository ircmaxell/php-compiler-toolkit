<?php

require __DIR__ . '/../vendor/autoload.php';
set_time_limit(2);

$libjit = new FFIMe\FFIMe('/opt/lib/libjit.so.0');
$libjit->include('/opt/include/jit/jit.h');
$libjit->codegen('libjit\\libjit', __DIR__ . '/libjit.php');

$libgccjit = new FFIMe\FFIMe('/usr/lib/x86_64-linux-gnu/libgccjit.so.0');
$libgccjit->include('libgccjit.h');
$libgccjit->codegen('libgccjit\\libgccjit', __DIR__ . '/libgccjit.php');


$llvm = new FFIMe\FFIMe('/usr/lib/llvm-4.0/lib/libLLVM-4.0.so.1', ['/usr/include/llvm-c-4.0/', '/usr/include/llvm-4.0/']);
$llvm->include(__DIR__ . '/llvm.h');
$llvm->codegen('llvm\\llvm', __DIR__ . '/llvm.php');