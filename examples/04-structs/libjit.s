function add(long, long) : long

/tmp/libjit-dump.o:     file format elf64-x86-64


Disassembly of section .text:

00007fdf32619148 <.text>:
    7fdf32619148:	55                   	push   %rbp
    7fdf32619149:	48 8b ec             	mov    %rsp,%rbp
    7fdf3261914c:	48 83 ec 20          	sub    $0x20,%rsp
    7fdf32619150:	48 89 7d f8          	mov    %rdi,-0x8(%rbp)
    7fdf32619154:	48 89 75 f0          	mov    %rsi,-0x10(%rbp)
    7fdf32619158:	48 8d 45 e0          	lea    -0x20(%rbp),%rax
    7fdf3261915c:	48 8b 4d f8          	mov    -0x8(%rbp),%rcx
    7fdf32619160:	48 89 08             	mov    %rcx,(%rax)
    7fdf32619163:	48 8d 45 e0          	lea    -0x20(%rbp),%rax
    7fdf32619167:	48 8b 4d f0          	mov    -0x10(%rbp),%rcx
    7fdf3261916b:	48 89 48 08          	mov    %rcx,0x8(%rax)
    7fdf3261916f:	48 8d 45 e0          	lea    -0x20(%rbp),%rax
    7fdf32619173:	48 8b 00             	mov    (%rax),%rax
    7fdf32619176:	48 8d 4d e0          	lea    -0x20(%rbp),%rcx
    7fdf3261917a:	48 8b 49 08          	mov    0x8(%rcx),%rcx
    7fdf3261917e:	48 03 c1             	add    %rcx,%rax
    7fdf32619181:	48 8b e5             	mov    %rbp,%rsp
    7fdf32619184:	5d                   	pop    %rbp
    7fdf32619185:	c3                   	retq   

end

