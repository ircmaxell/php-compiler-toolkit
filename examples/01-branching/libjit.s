function add1or2(long, long) : long

/tmp/libjit-dump.o:     file format elf64-x86-64


Disassembly of section .text:

00007fd47696d13f <.text>:
    7fd47696d13f:	55                   	push   %rbp
    7fd47696d140:	48 8b ec             	mov    %rsp,%rbp
    7fd47696d143:	48 83 ec 20          	sub    $0x20,%rsp
    7fd47696d147:	4c 89 34 24          	mov    %r14,(%rsp)
    7fd47696d14b:	4c 89 7c 24 08       	mov    %r15,0x8(%rsp)
    7fd47696d150:	4c 8b ff             	mov    %rdi,%r15
    7fd47696d153:	4c 8b f6             	mov    %rsi,%r14
    7fd47696d156:	49 83 ff 00          	cmp    $0x0,%r15
    7fd47696d15a:	0f 8f 05 00 00 00    	jg     0x7fd47696d165
    7fd47696d160:	e9 0f 00 00 00       	jmpq   0x7fd47696d174
    7fd47696d165:	49 8b c6             	mov    %r14,%rax
    7fd47696d168:	48 89 45 f8          	mov    %rax,-0x8(%rbp)
    7fd47696d16c:	48 ff c0             	inc    %rax
    7fd47696d16f:	e9 0b 00 00 00       	jmpq   0x7fd47696d17f
    7fd47696d174:	49 8b c6             	mov    %r14,%rax
    7fd47696d177:	48 89 45 f0          	mov    %rax,-0x10(%rbp)
    7fd47696d17b:	48 83 c0 02          	add    $0x2,%rax
    7fd47696d17f:	4c 8b 34 24          	mov    (%rsp),%r14
    7fd47696d183:	4c 8b 7c 24 08       	mov    0x8(%rsp),%r15
    7fd47696d188:	48 8b e5             	mov    %rbp,%rsp
    7fd47696d18b:	5d                   	pop    %rbp
    7fd47696d18c:	c3                   	retq   

end

