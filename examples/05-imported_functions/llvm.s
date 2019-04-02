	.text
	.file	"test_0"
	.globl	test
	.p2align	4, 0x90
	.type	test,@function
test:
	.cfi_startproc
	pushq	%rax
.Lcfi0:
	.cfi_def_cfa_offset 16
	movabsq	$abs, %rax
	callq	*%rax
	popq	%rcx
	retq
.Lfunc_end0:
	.size	test, .Lfunc_end0-test
	.cfi_endproc


	.section	".note.GNU-stack","",@progbits
