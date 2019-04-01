	.text
	.file	"/tmp/llvmpCXn5f.bc"
	.globl	add
	.p2align	4, 0x90
	.type	add,@function
add:                                    # @add
# BB#0:                                 # %main
	leaq	(%rdi,%rsi), %rax
	retq
.Lfunc_end0:
	.size	add, .Lfunc_end0-add

	.globl	add100
	.p2align	4, 0x90
	.type	add100,@function
add100:                                 # @add100
# BB#0:                                 # %main
	imulq	$100, %rsi, %rax
	addq	%rdi, %rax
	retq
.Lfunc_end1:
	.size	add100, .Lfunc_end1-add100


	.section	".note.GNU-stack","",@progbits
