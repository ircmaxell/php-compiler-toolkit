	.text
	.file	"/tmp/llvmCSv1Pt.bc"
	.globl	add
	.p2align	4, 0x90
	.type	add,@function
add:                                    # @add
# BB#0:                                 # %main
	leaq	(%rdi,%rsi), %rax
	retq
.Lfunc_end0:
	.size	add, .Lfunc_end0-add

	.globl	add2
	.p2align	4, 0x90
	.type	add2,@function
add2:                                   # @add2
# BB#0:                                 # %main
	leaq	(%rdi,%rsi,2), %rax
	retq
.Lfunc_end1:
	.size	add2, .Lfunc_end1-add2


	.section	".note.GNU-stack","",@progbits
