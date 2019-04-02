	.file	"fake.c"
	.text
	.p2align 4,,15
	.globl	test
	.type	test, @function
test:
.LFB1:
	.cfi_startproc
.L4:
	jmp	abs@PLT
	.cfi_endproc
.LFE1:
	.size	test, .-test
	.ident	"GCC: (Ubuntu 6.3.0-12ubuntu2) 6.3.0 20170406"
	.section	.note.GNU-stack,"",@progbits
