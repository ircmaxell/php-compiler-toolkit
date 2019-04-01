	.file	"fake.c"
	.text
	.p2align 4,,15
	.globl	add
	.type	add, @function
add:
.LFB2:
	.cfi_startproc
.L7:
	leaq	(%rdi,%rsi), %rax
	ret
	.cfi_endproc
.LFE2:
	.size	add, .-add
	.p2align 4,,15
	.globl	add2
	.type	add2, @function
add2:
.LFB3:
	.cfi_startproc
.L9:
	pushq	%rbx
	.cfi_def_cfa_offset 16
	.cfi_offset 3, -16
	movq	%rsi, %rbx
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	popq	%rbx
	.cfi_def_cfa_offset 8
	jmp	add@PLT
	.cfi_endproc
.LFE3:
	.size	add2, .-add2
	.ident	"GCC: (Ubuntu 6.3.0-12ubuntu2) 6.3.0 20170406"
	.section	.note.GNU-stack,"",@progbits
