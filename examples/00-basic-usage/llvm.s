	.text
	.file	"test_0"
	.globl	add
	.p2align	4, 0x90
	.type	add,@function
add:
	.cfi_startproc
	leaq	(%rdi,%rsi), %rax
	retq
.Lfunc_end0:
	.size	add, .Lfunc_end0-add
	.cfi_endproc


	.section	".note.GNU-stack","",@progbits
