function add(long, long) : long

/tmp/libjit-dump.o:     file format elf64-x86-64


Disassembly of section .text:

00007f08be98b148 <.text>:
    7f08be98b148:	55                   	push   %rbp
    7f08be98b149:	48 8b ec             	mov    %rsp,%rbp
    7f08be98b14c:	48 83 ec 20          	sub    $0x20,%rsp
    7f08be98b150:	48 89 7d f8          	mov    %rdi,-0x8(%rbp)
    7f08be98b154:	48 89 75 f0          	mov    %rsi,-0x10(%rbp)
    7f08be98b158:	48 8d 45 e0          	lea    -0x20(%rbp),%rax
    7f08be98b15c:	48 8b 4d f8          	mov    -0x8(%rbp),%rcx
    7f08be98b160:	48 89 08             	mov    %rcx,(%rax)
    7f08be98b163:	48 8d 45 e0          	lea    -0x20(%rbp),%rax
    7f08be98b167:	48 8b 4d f0          	mov    -0x10(%rbp),%rcx
    7f08be98b16b:	48 89 48 08          	mov    %rcx,0x8(%rax)
    7f08be98b16f:	48 8d 45 e0          	lea    -0x20(%rbp),%rax
    7f08be98b173:	48 8b 00             	mov    (%rax),%rax
    7f08be98b176:	48 8d 4d e0          	lea    -0x20(%rbp),%rcx
    7f08be98b17a:	48 8b 49 08          	mov    0x8(%rcx),%rcx
    7f08be98b17e:	48 03 c1             	add    %rcx,%rax
    7f08be98b181:	48 8b e5             	mov    %rbp,%rsp
    7f08be98b184:	5d                   	pop    %rbp
    7f08be98b185:	c3                   	retq   

end

