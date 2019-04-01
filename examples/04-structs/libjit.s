function add(long, long) : long

/tmp/libjit-dump.o:     file format elf64-x86-64


Disassembly of section .text:

00007fe4e7491148 <.text>:
    7fe4e7491148:	55                   	push   %rbp
    7fe4e7491149:	48 8b ec             	mov    %rsp,%rbp
    7fe4e749114c:	48 83 ec 20          	sub    $0x20,%rsp
    7fe4e7491150:	48 89 7d f8          	mov    %rdi,-0x8(%rbp)
    7fe4e7491154:	48 89 75 f0          	mov    %rsi,-0x10(%rbp)
    7fe4e7491158:	48 8d 45 e0          	lea    -0x20(%rbp),%rax
    7fe4e749115c:	48 8b 4d f8          	mov    -0x8(%rbp),%rcx
    7fe4e7491160:	48 89 08             	mov    %rcx,(%rax)
    7fe4e7491163:	48 8d 45 e0          	lea    -0x20(%rbp),%rax
    7fe4e7491167:	48 8b 4d f0          	mov    -0x10(%rbp),%rcx
    7fe4e749116b:	48 89 48 08          	mov    %rcx,0x8(%rax)
    7fe4e749116f:	48 8d 45 e0          	lea    -0x20(%rbp),%rax
    7fe4e7491173:	48 8b 00             	mov    (%rax),%rax
    7fe4e7491176:	48 8d 4d e0          	lea    -0x20(%rbp),%rcx
    7fe4e749117a:	48 8b 49 08          	mov    0x8(%rcx),%rcx
    7fe4e749117e:	48 03 c1             	add    %rcx,%rax
    7fe4e7491181:	48 8b e5             	mov    %rbp,%rsp
    7fe4e7491184:	5d                   	pop    %rbp
    7fe4e7491185:	c3                   	retq   

end

