function add(long, long) : long

/tmp/libjit-dump.o:     file format elf64-x86-64


Disassembly of section .text:

00007ff94c172258 <.text>:
    7ff94c172258:	55                   	push   %rbp
    7ff94c172259:	48 8b ec             	mov    %rsp,%rbp
    7ff94c17225c:	48 83 ec 10          	sub    $0x10,%rsp
    7ff94c172260:	48 89 7d f8          	mov    %rdi,-0x8(%rbp)
    7ff94c172264:	48 89 75 f0          	mov    %rsi,-0x10(%rbp)
    7ff94c172268:	48 8b 45 f8          	mov    -0x8(%rbp),%rax
    7ff94c17226c:	48 03 45 f0          	add    -0x10(%rbp),%rax
    7ff94c172270:	48 8b e5             	mov    %rbp,%rsp
    7ff94c172273:	5d                   	pop    %rbp
    7ff94c172274:	c3                   	retq   

end

function add2(long, long) : long

/tmp/libjit-dump.o:     file format elf64-x86-64


Disassembly of section .text:

00007ff94c1722a9 <.text>:
    7ff94c1722a9:	55                   	push   %rbp
    7ff94c1722aa:	48 8b ec             	mov    %rsp,%rbp
    7ff94c1722ad:	48 83 ec 20          	sub    $0x20,%rsp
    7ff94c1722b1:	4c 89 3c 24          	mov    %r15,(%rsp)
    7ff94c1722b5:	48 89 7d f8          	mov    %rdi,-0x8(%rbp)
    7ff94c1722b9:	4c 8b fe             	mov    %rsi,%r15
    7ff94c1722bc:	49 8b f7             	mov    %r15,%rsi
    7ff94c1722bf:	48 8b 7d f8          	mov    -0x8(%rbp),%rdi
    7ff94c1722c3:	b8 08 00 00 00       	mov    $0x8,%eax
    7ff94c1722c8:	e8 8b ff ff ff       	callq  0x7ff94c172258
    7ff94c1722cd:	49 8b f7             	mov    %r15,%rsi
    7ff94c1722d0:	48 8b f8             	mov    %rax,%rdi
    7ff94c1722d3:	48 89 45 f0          	mov    %rax,-0x10(%rbp)
    7ff94c1722d7:	b8 08 00 00 00       	mov    $0x8,%eax
    7ff94c1722dc:	e8 77 ff ff ff       	callq  0x7ff94c172258
    7ff94c1722e1:	4c 8b 3c 24          	mov    (%rsp),%r15
    7ff94c1722e5:	48 8b e5             	mov    %rbp,%rsp
    7ff94c1722e8:	5d                   	pop    %rbp
    7ff94c1722e9:	c3                   	retq   

end

