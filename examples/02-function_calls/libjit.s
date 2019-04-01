function add(long, long) : long

/tmp/libjit-dump.o:     file format elf64-x86-64


Disassembly of section .text:

00007fd476945258 <.text>:
    7fd476945258:	55                   	push   %rbp
    7fd476945259:	48 8b ec             	mov    %rsp,%rbp
    7fd47694525c:	48 83 ec 10          	sub    $0x10,%rsp
    7fd476945260:	48 89 7d f8          	mov    %rdi,-0x8(%rbp)
    7fd476945264:	48 89 75 f0          	mov    %rsi,-0x10(%rbp)
    7fd476945268:	48 8b 45 f8          	mov    -0x8(%rbp),%rax
    7fd47694526c:	48 03 45 f0          	add    -0x10(%rbp),%rax
    7fd476945270:	48 8b e5             	mov    %rbp,%rsp
    7fd476945273:	5d                   	pop    %rbp
    7fd476945274:	c3                   	retq   

end

function add2(long, long) : long

/tmp/libjit-dump.o:     file format elf64-x86-64


Disassembly of section .text:

00007fd4769452a9 <.text>:
    7fd4769452a9:	55                   	push   %rbp
    7fd4769452aa:	48 8b ec             	mov    %rsp,%rbp
    7fd4769452ad:	48 83 ec 20          	sub    $0x20,%rsp
    7fd4769452b1:	4c 89 3c 24          	mov    %r15,(%rsp)
    7fd4769452b5:	48 89 7d f8          	mov    %rdi,-0x8(%rbp)
    7fd4769452b9:	4c 8b fe             	mov    %rsi,%r15
    7fd4769452bc:	49 8b f7             	mov    %r15,%rsi
    7fd4769452bf:	48 8b 7d f8          	mov    -0x8(%rbp),%rdi
    7fd4769452c3:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769452c8:	e8 8b ff ff ff       	callq  0x7fd476945258
    7fd4769452cd:	49 8b f7             	mov    %r15,%rsi
    7fd4769452d0:	48 8b f8             	mov    %rax,%rdi
    7fd4769452d3:	48 89 45 f0          	mov    %rax,-0x10(%rbp)
    7fd4769452d7:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769452dc:	e8 77 ff ff ff       	callq  0x7fd476945258
    7fd4769452e1:	4c 8b 3c 24          	mov    (%rsp),%r15
    7fd4769452e5:	48 8b e5             	mov    %rbp,%rsp
    7fd4769452e8:	5d                   	pop    %rbp
    7fd4769452e9:	c3                   	retq   

end

