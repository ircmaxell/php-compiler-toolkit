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

	.globl	add100
	.p2align	4, 0x90
	.type	add100,@function
add100:
	.cfi_startproc
	pushq	%r14
.Lcfi0:
	.cfi_def_cfa_offset 16
	pushq	%rbx
.Lcfi1:
	.cfi_def_cfa_offset 24
	pushq	%rax
.Lcfi2:
	.cfi_def_cfa_offset 32
.Lcfi3:
	.cfi_offset %rbx, -24
.Lcfi4:
	.cfi_offset %r14, -16
	movq	%rsi, %rbx
	movabsq	$add, %r14
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	movq	%rax, %rdi
	movq	%rbx, %rsi
	callq	*%r14
	addq	$8, %rsp
	popq	%rbx
	popq	%r14
	retq
.Lfunc_end1:
	.size	add100, .Lfunc_end1-add100
	.cfi_endproc


	.section	".note.GNU-stack","",@progbits
