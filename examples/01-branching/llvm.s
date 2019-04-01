	.text
	.file	"test_0"
	.globl	add1or2
	.p2align	4, 0x90
	.type	add1or2,@function
add1or2:
	.cfi_startproc
	testq	%rdi, %rdi
	jle	.LBB0_2
	movq	%rsi, -8(%rsp)
	movq	-8(%rsp), %rax
	incq	%rax
	retq
.LBB0_2:
	movq	%rsi, -16(%rsp)
	movq	-16(%rsp), %rax
	addq	$2, %rax
	retq
.Lfunc_end0:
	.size	add1or2, .Lfunc_end0-add1or2
	.cfi_endproc


	.section	".note.GNU-stack","",@progbits
