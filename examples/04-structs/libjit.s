function add(long, long) : long

/tmp/libjit-dump.o:     file format elf64-x86-64


Disassembly of section .text:

00007f209bfb4148 <.text>:
    7f209bfb4148:	55                   	push   %rbp
    7f209bfb4149:	48 8b ec             	mov    %rsp,%rbp
    7f209bfb414c:	48 83 ec 20          	sub    $0x20,%rsp
    7f209bfb4150:	48 89 7d f8          	mov    %rdi,-0x8(%rbp)
    7f209bfb4154:	48 89 75 f0          	mov    %rsi,-0x10(%rbp)
    7f209bfb4158:	48 8d 45 e0          	lea    -0x20(%rbp),%rax
    7f209bfb415c:	48 8b 4d f8          	mov    -0x8(%rbp),%rcx
    7f209bfb4160:	48 89 08             	mov    %rcx,(%rax)
    7f209bfb4163:	48 8d 45 e0          	lea    -0x20(%rbp),%rax
    7f209bfb4167:	48 8b 4d f0          	mov    -0x10(%rbp),%rcx
    7f209bfb416b:	48 89 48 08          	mov    %rcx,0x8(%rax)
    7f209bfb416f:	48 8d 45 e0          	lea    -0x20(%rbp),%rax
    7f209bfb4173:	48 8b 00             	mov    (%rax),%rax
    7f209bfb4176:	48 8d 4d e0          	lea    -0x20(%rbp),%rcx
    7f209bfb417a:	48 8b 49 08          	mov    0x8(%rcx),%rcx
    7f209bfb417e:	48 03 c1             	add    %rcx,%rax
    7f209bfb4181:	48 8b e5             	mov    %rbp,%rsp
    7f209bfb4184:	5d                   	pop    %rbp
    7f209bfb4185:	c3                   	retq   

end

