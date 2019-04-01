	.text
	.file	"/tmp/llvmDAK9UZ.bc"
	.globl	add
	.p2align	4, 0x90
	.type	add,@function
add:                                    # @add
# BB#0:                                 # %main
	leaq	(%rdi,%rsi), %rax
	retq
.Lfunc_end0:
	.size	add, .Lfunc_end0-add


	.section	".note.GNU-stack","",@progbits
