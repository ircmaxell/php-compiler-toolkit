function add(long, long) : long

/tmp/libjit-dump.o:     file format elf64-x86-64


Disassembly of section .text:

00007f17dd705148 <.text>:
    7f17dd705148:	55                   	push   %rbp
    7f17dd705149:	48 8b ec             	mov    %rsp,%rbp
    7f17dd70514c:	48 83 ec 10          	sub    $0x10,%rsp
    7f17dd705150:	48 89 7d f8          	mov    %rdi,-0x8(%rbp)
    7f17dd705154:	48 89 75 f0          	mov    %rsi,-0x10(%rbp)
    7f17dd705158:	48 8b 45 f8          	mov    -0x8(%rbp),%rax
    7f17dd70515c:	48 03 45 f0          	add    -0x10(%rbp),%rax
    7f17dd705160:	48 8b e5             	mov    %rbp,%rsp
    7f17dd705163:	5d                   	pop    %rbp
    7f17dd705164:	c3                   	retq   

end

