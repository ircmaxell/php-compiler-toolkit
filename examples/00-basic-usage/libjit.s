function add(long, long) : long

/tmp/libjit-dump.o:     file format elf64-x86-64


Disassembly of section .text:

00007fc4a0501148 <.text>:
    7fc4a0501148:	55                   	push   %rbp
    7fc4a0501149:	48 8b ec             	mov    %rsp,%rbp
    7fc4a050114c:	48 83 ec 10          	sub    $0x10,%rsp
    7fc4a0501150:	48 89 7d f8          	mov    %rdi,-0x8(%rbp)
    7fc4a0501154:	48 89 75 f0          	mov    %rsi,-0x10(%rbp)
    7fc4a0501158:	48 8b 45 f8          	mov    -0x8(%rbp),%rax
    7fc4a050115c:	48 03 45 f0          	add    -0x10(%rbp),%rax
    7fc4a0501160:	48 8b e5             	mov    %rbp,%rsp
    7fc4a0501163:	5d                   	pop    %rbp
    7fc4a0501164:	c3                   	retq   

end

