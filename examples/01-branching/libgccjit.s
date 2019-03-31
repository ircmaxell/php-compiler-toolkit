	.file	"fake.c"
	.text
	.p2align 4,,15
	.globl	add1or2
	.type	add1or2, @function
add1or2:
.LFB3:
	.cfi_startproc
.L11:
	xorl	%eax, %eax
	testq	%rdi, %rdi
	setle	%al
	leaq	1(%rax,%rsi), %rax
	ret
.L13:
.L12:
	.cfi_endproc
.LFE3:
	.size	add1or2, .-add1or2
	.ident	"GCC: (Ubuntu 6.3.0-12ubuntu2) 6.3.0 20170406"
	.section	.note.GNU-stack,"",@progbits
