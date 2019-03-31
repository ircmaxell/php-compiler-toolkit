function add(long, long) : long

/tmp/libjit-dump.o:     file format elf64-x86-64


Disassembly of section .text:

00007f707d2eb148 <.text>:
    7f707d2eb148:	55                   	push   %rbp
    7f707d2eb149:	48 8b ec             	mov    %rsp,%rbp
    7f707d2eb14c:	48 83 ec 10          	sub    $0x10,%rsp
    7f707d2eb150:	48 89 7d f8          	mov    %rdi,-0x8(%rbp)
    7f707d2eb154:	48 89 75 f0          	mov    %rsi,-0x10(%rbp)
    7f707d2eb158:	48 8b 45 f8          	mov    -0x8(%rbp),%rax
    7f707d2eb15c:	48 03 45 f0          	add    -0x10(%rbp),%rax
    7f707d2eb160:	48 8b e5             	mov    %rbp,%rsp
    7f707d2eb163:	5d                   	pop    %rbp
    7f707d2eb164:	c3                   	retq   

end

