<?php

require __DIR__ . '/../vendor/autoload.php';

echo "Rebuilding LIBJIT libraries\n";

$libjit = new FFIMe\FFIMe('/opt/lib/libjit.so.0');
$libjit->include('/opt/include/jit/jit.h');
$libjit->include('/opt/include/jit/jit-dump.h');
$libjit->codegen('libjit\\libjit', __DIR__ . '/libjit.php');

echo "Rebuilding LIBGCCJIT libraries\n";

$libgccjit = new FFIMe\FFIMe('/usr/lib/x86_64-linux-gnu/libgccjit.so.0');
$libgccjit->include('libgccjit.h');
$libgccjit->codegen('libgccjit\\libgccjit', __DIR__ . '/libgccjit.php');

echo "Rebuilding LLVM libraries\n";

$llvm = new FFIMe\FFIMe('/usr/lib/llvm-4.0/lib/libLLVM-4.0.so.1', ['/usr/include/llvm-c-4.0/', '/usr/include/llvm-4.0/']);
$llvm->include("llvm-c/Core.h");
$llvm->include("llvm-c/TargetMachine.h");
$llvm->include("llvm-c/ExecutionEngine.h");
$llvm->include("llvm-c/Analysis.h");
$llvm->codegen('llvm\\llvm', __DIR__ . '/llvm.php');

$code = '
class string_ptr implements illvm {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(string_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): string_ptr_ptr { return new string_ptr_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return \'char**\'; }
}
class uint64_t implements illvm {
    private FFI\CData $data;
    public function __construct($data) { $tmp = FFI::new(\'unsigned long long\'); $tmp = $data; $this->data = $tmp; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(uint64_t $other): bool { return $this->data == $other->data; }
    public function addr(): uint64_t_ptr { return new uint64_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return \'uint64_t\'; }
}
';

$orig = file_get_contents(__DIR__ . '/llvm.php');
file_put_contents(__DIR__ . '/llvm.php', $orig . $code);