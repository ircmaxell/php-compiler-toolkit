	.text
	.file	"test_0"
	.globl	add
	.p2align	4, 0x90
	.type	add,@function
add:
	.cfi_startproc
	movq	%rdi, -16(%rsp)
	movq	%rsi, -8(%rsp)
	addq	-16(%rsp), %rsi
	movq	%rsi, %rax
	retq
.Lfunc_end0:
	.size	add, .Lfunc_end0-add
	.cfi_endproc


	.section	".note.GNU-stack","",@progbits
