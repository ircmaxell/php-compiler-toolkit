	.file	"fake.c"
	.text
	.p2align 4,,15
	.globl	add
	.type	add, @function
add:
.LFB4:
	.cfi_startproc
.L11:
	leaq	(%rdi,%rsi), %rax
	ret
	.cfi_endproc
.LFE4:
	.size	add, .-add
	.p2align 4,,15
	.globl	add100
	.type	add100, @function
add100:
.LFB5:
	.cfi_startproc
.L13:
	pushq	%rbx
	.cfi_def_cfa_offset 16
	.cfi_offset 3, -16
	movq	%rsi, %rbx
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	call	add@PLT
	movq	%rbx, %rsi
	movq	%rax, %rdi
	popq	%rbx
	.cfi_def_cfa_offset 8
	jmp	add@PLT
	.cfi_endproc
.LFE5:
	.size	add100, .-add100
	.ident	"GCC: (Ubuntu 6.3.0-12ubuntu2) 6.3.0 20170406"
	.section	.note.GNU-stack,"",@progbits
