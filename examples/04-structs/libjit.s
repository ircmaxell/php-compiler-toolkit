function add(long, long) : long

/tmp/libjit-dump.o:     file format elf64-x86-64


Disassembly of section .text:

00007f21b5d31148 <.text>:
    7f21b5d31148:	55                   	push   %rbp
    7f21b5d31149:	48 8b ec             	mov    %rsp,%rbp
    7f21b5d3114c:	48 83 ec 20          	sub    $0x20,%rsp
    7f21b5d31150:	48 89 7d f8          	mov    %rdi,-0x8(%rbp)
    7f21b5d31154:	48 89 75 f0          	mov    %rsi,-0x10(%rbp)
    7f21b5d31158:	48 8d 45 e0          	lea    -0x20(%rbp),%rax
    7f21b5d3115c:	48 8b 4d f8          	mov    -0x8(%rbp),%rcx
    7f21b5d31160:	48 89 08             	mov    %rcx,(%rax)
    7f21b5d31163:	48 8d 45 e0          	lea    -0x20(%rbp),%rax
    7f21b5d31167:	48 8b 4d f0          	mov    -0x10(%rbp),%rcx
    7f21b5d3116b:	48 89 48 08          	mov    %rcx,0x8(%rax)
    7f21b5d3116f:	48 8d 45 e0          	lea    -0x20(%rbp),%rax
    7f21b5d31173:	48 8b 00             	mov    (%rax),%rax
    7f21b5d31176:	48 8d 4d e0          	lea    -0x20(%rbp),%rcx
    7f21b5d3117a:	48 8b 49 08          	mov    0x8(%rcx),%rcx
    7f21b5d3117e:	48 03 c1             	add    %rcx,%rax
    7f21b5d31181:	48 8b e5             	mov    %rbp,%rsp
    7f21b5d31184:	5d                   	pop    %rbp
    7f21b5d31185:	c3                   	retq   

end

