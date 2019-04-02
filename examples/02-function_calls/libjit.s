function add(long, long) : long

/tmp/libjit-dump.o:     file format elf64-x86-64


Disassembly of section .text:

00007f2b087ce258 <.text>:
    7f2b087ce258:	55                   	push   %rbp
    7f2b087ce259:	48 8b ec             	mov    %rsp,%rbp
    7f2b087ce25c:	48 83 ec 10          	sub    $0x10,%rsp
    7f2b087ce260:	48 89 7d f8          	mov    %rdi,-0x8(%rbp)
    7f2b087ce264:	48 89 75 f0          	mov    %rsi,-0x10(%rbp)
    7f2b087ce268:	48 8b 45 f8          	mov    -0x8(%rbp),%rax
    7f2b087ce26c:	48 03 45 f0          	add    -0x10(%rbp),%rax
    7f2b087ce270:	48 8b e5             	mov    %rbp,%rsp
    7f2b087ce273:	5d                   	pop    %rbp
    7f2b087ce274:	c3                   	retq   

end

function add2(long, long) : long

/tmp/libjit-dump.o:     file format elf64-x86-64


Disassembly of section .text:

00007f2b087ce2a9 <.text>:
    7f2b087ce2a9:	55                   	push   %rbp
    7f2b087ce2aa:	48 8b ec             	mov    %rsp,%rbp
    7f2b087ce2ad:	48 83 ec 20          	sub    $0x20,%rsp
    7f2b087ce2b1:	4c 89 3c 24          	mov    %r15,(%rsp)
    7f2b087ce2b5:	48 89 7d f8          	mov    %rdi,-0x8(%rbp)
    7f2b087ce2b9:	4c 8b fe             	mov    %rsi,%r15
    7f2b087ce2bc:	49 8b f7             	mov    %r15,%rsi
    7f2b087ce2bf:	48 8b 7d f8          	mov    -0x8(%rbp),%rdi
    7f2b087ce2c3:	b8 08 00 00 00       	mov    $0x8,%eax
    7f2b087ce2c8:	e8 8b ff ff ff       	callq  0x7f2b087ce258
    7f2b087ce2cd:	49 8b f7             	mov    %r15,%rsi
    7f2b087ce2d0:	48 8b f8             	mov    %rax,%rdi
    7f2b087ce2d3:	48 89 45 f0          	mov    %rax,-0x10(%rbp)
    7f2b087ce2d7:	b8 08 00 00 00       	mov    $0x8,%eax
    7f2b087ce2dc:	e8 77 ff ff ff       	callq  0x7f2b087ce258
    7f2b087ce2e1:	4c 8b 3c 24          	mov    (%rsp),%r15
    7f2b087ce2e5:	48 8b e5             	mov    %rbp,%rsp
    7f2b087ce2e8:	5d                   	pop    %rbp
    7f2b087ce2e9:	c3                   	retq   

end

