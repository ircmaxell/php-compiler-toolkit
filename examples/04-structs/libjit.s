function add(long, long) : long

/tmp/libjit-dump.o:     file format elf64-x86-64


Disassembly of section .text:

00007f458107a148 <.text>:
    7f458107a148:	55                   	push   %rbp
    7f458107a149:	48 8b ec             	mov    %rsp,%rbp
    7f458107a14c:	48 83 ec 20          	sub    $0x20,%rsp
    7f458107a150:	48 89 7d f8          	mov    %rdi,-0x8(%rbp)
    7f458107a154:	48 89 75 f0          	mov    %rsi,-0x10(%rbp)
    7f458107a158:	48 8d 45 e0          	lea    -0x20(%rbp),%rax
    7f458107a15c:	48 8b 4d f8          	mov    -0x8(%rbp),%rcx
    7f458107a160:	48 89 08             	mov    %rcx,(%rax)
    7f458107a163:	48 8d 45 e0          	lea    -0x20(%rbp),%rax
    7f458107a167:	48 8b 4d f0          	mov    -0x10(%rbp),%rcx
    7f458107a16b:	48 89 48 08          	mov    %rcx,0x8(%rax)
    7f458107a16f:	48 8d 45 e0          	lea    -0x20(%rbp),%rax
    7f458107a173:	48 8b 00             	mov    (%rax),%rax
    7f458107a176:	48 8d 4d e0          	lea    -0x20(%rbp),%rcx
    7f458107a17a:	48 8b 49 08          	mov    0x8(%rcx),%rcx
    7f458107a17e:	48 03 c1             	add    %rcx,%rax
    7f458107a181:	48 8b e5             	mov    %rbp,%rsp
    7f458107a184:	5d                   	pop    %rbp
    7f458107a185:	c3                   	retq   

end

