	.file	"fake.c"
	.text
	.p2align 4,,15
	.globl	add
	.type	add, @function
add:
.LFB1:
	.cfi_startproc
.L4:
	leaq	(%rdi,%rsi), %rax
	ret
	.cfi_endproc
.LFE1:
	.size	add, .-add
	.ident	"GCC: (Ubuntu 6.3.0-12ubuntu2) 6.3.0 20170406"
	.section	.note.GNU-stack,"",@progbits
