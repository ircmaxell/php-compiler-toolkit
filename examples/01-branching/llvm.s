	.text
	.file	"/tmp/llvm0PCFGV.bc"
	.globl	add1or2
	.p2align	4, 0x90
	.type	add1or2,@function
add1or2:                                # @add1or2
# BB#0:                                 # %main
	testq	%rdi, %rdi
	jle	.LBB0_2
# BB#1:                                 # %main_if
	incq	%rsi
	movq	%rsi, %rax
	retq
.LBB0_2:                                # %main_else
	addq	$2, %rsi
	movq	%rsi, %rax
	retq
.Lfunc_end0:
	.size	add1or2, .Lfunc_end0-add1or2


	.section	".note.GNU-stack","",@progbits
