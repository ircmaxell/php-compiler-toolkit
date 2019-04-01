	.file	"fake.c"
	.text
	.p2align 4,,15
	.globl	add1or2
	.type	add1or2, @function
add1or2:
.LFB7:
	.cfi_startproc
.L21:
	xorl	%eax, %eax
	testq	%rdi, %rdi
	setle	%al
	leaq	1(%rax,%rsi), %rax
	ret
.L23:
.L22:
	.cfi_endproc
.LFE7:
	.size	add1or2, .-add1or2
	.ident	"GCC: (Ubuntu 6.3.0-12ubuntu2) 6.3.0 20170406"
	.section	.note.GNU-stack,"",@progbits
