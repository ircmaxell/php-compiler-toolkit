	.file	"fake.c"
	.text
	.p2align 4,,15
	.globl	add
	.type	add, @function
add:
.LFB10:
	.cfi_startproc
.L31:
	leaq	(%rdi,%rsi), %rax
	ret
	.cfi_endproc
.LFE10:
	.size	add, .-add
	.p2align 4,,15
	.globl	add2
	.type	add2, @function
add2:
.LFB11:
	.cfi_startproc
.L33:
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
.LFE11:
	.size	add2, .-add2
	.ident	"GCC: (Ubuntu 6.3.0-12ubuntu2) 6.3.0 20170406"
	.section	.note.GNU-stack,"",@progbits
