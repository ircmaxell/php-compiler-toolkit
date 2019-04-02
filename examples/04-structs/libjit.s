function add(long, long) : long

/tmp/libjit-dump.o:     file format elf64-x86-64


Disassembly of section .text:

00007fc094358148 <.text>:
    7fc094358148:	55                   	push   %rbp
    7fc094358149:	48 8b ec             	mov    %rsp,%rbp
    7fc09435814c:	48 83 ec 20          	sub    $0x20,%rsp
    7fc094358150:	48 89 7d f8          	mov    %rdi,-0x8(%rbp)
    7fc094358154:	48 89 75 f0          	mov    %rsi,-0x10(%rbp)
    7fc094358158:	48 8d 45 e0          	lea    -0x20(%rbp),%rax
    7fc09435815c:	48 8b 4d f8          	mov    -0x8(%rbp),%rcx
    7fc094358160:	48 89 08             	mov    %rcx,(%rax)
    7fc094358163:	48 8d 45 e0          	lea    -0x20(%rbp),%rax
    7fc094358167:	48 8b 4d f0          	mov    -0x10(%rbp),%rcx
    7fc09435816b:	48 89 48 08          	mov    %rcx,0x8(%rax)
    7fc09435816f:	48 8d 45 e0          	lea    -0x20(%rbp),%rax
    7fc094358173:	48 8b 00             	mov    (%rax),%rax
    7fc094358176:	48 8d 4d e0          	lea    -0x20(%rbp),%rcx
    7fc09435817a:	48 8b 49 08          	mov    0x8(%rcx),%rcx
    7fc09435817e:	48 03 c1             	add    %rcx,%rax
    7fc094358181:	48 8b e5             	mov    %rbp,%rsp
    7fc094358184:	5d                   	pop    %rbp
    7fc094358185:	c3                   	retq   

end

