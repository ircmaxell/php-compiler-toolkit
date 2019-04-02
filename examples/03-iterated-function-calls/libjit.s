function add(long, long) : long

/tmp/libjit-dump.o:     file format elf64-x86-64


Disassembly of section .text:

00007f6bcb61c258 <.text>:
    7f6bcb61c258:	55                   	push   %rbp
    7f6bcb61c259:	48 8b ec             	mov    %rsp,%rbp
    7f6bcb61c25c:	48 83 ec 10          	sub    $0x10,%rsp
    7f6bcb61c260:	48 89 7d f8          	mov    %rdi,-0x8(%rbp)
    7f6bcb61c264:	48 89 75 f0          	mov    %rsi,-0x10(%rbp)
    7f6bcb61c268:	48 8b 45 f8          	mov    -0x8(%rbp),%rax
    7f6bcb61c26c:	48 03 45 f0          	add    -0x10(%rbp),%rax
    7f6bcb61c270:	48 8b e5             	mov    %rbp,%rsp
    7f6bcb61c273:	5d                   	pop    %rbp
    7f6bcb61c274:	c3                   	retq   

end

function add100(long, long) : long

/tmp/libjit-dump.o:     file format elf64-x86-64


Disassembly of section .text:

00007f6bcb61c2a6 <.text>:
    7f6bcb61c2a6:	55                   	push   %rbp
    7f6bcb61c2a7:	48 8b ec             	mov    %rsp,%rbp
    7f6bcb61c2aa:	48 81 ec 30 03 00 00 	sub    $0x330,%rsp
    7f6bcb61c2b1:	4c 89 3c 24          	mov    %r15,(%rsp)
    7f6bcb61c2b5:	48 89 7d f8          	mov    %rdi,-0x8(%rbp)
    7f6bcb61c2b9:	4c 8b fe             	mov    %rsi,%r15
    7f6bcb61c2bc:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c2bf:	48 8b 7d f8          	mov    -0x8(%rbp),%rdi
    7f6bcb61c2c3:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c2c8:	e8 8b ff ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c2cd:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c2d0:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c2d3:	48 89 45 f0          	mov    %rax,-0x10(%rbp)
    7f6bcb61c2d7:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c2dc:	e8 77 ff ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c2e1:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c2e4:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c2e7:	48 89 45 e8          	mov    %rax,-0x18(%rbp)
    7f6bcb61c2eb:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c2f0:	e8 63 ff ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c2f5:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c2f8:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c2fb:	48 89 45 e0          	mov    %rax,-0x20(%rbp)
    7f6bcb61c2ff:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c304:	e8 4f ff ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c309:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c30c:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c30f:	48 89 45 d8          	mov    %rax,-0x28(%rbp)
    7f6bcb61c313:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c318:	e8 3b ff ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c31d:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c320:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c323:	48 89 45 d0          	mov    %rax,-0x30(%rbp)
    7f6bcb61c327:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c32c:	e8 27 ff ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c331:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c334:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c337:	48 89 45 c8          	mov    %rax,-0x38(%rbp)
    7f6bcb61c33b:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c340:	e8 13 ff ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c345:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c348:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c34b:	48 89 45 c0          	mov    %rax,-0x40(%rbp)
    7f6bcb61c34f:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c354:	e8 ff fe ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c359:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c35c:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c35f:	48 89 45 b8          	mov    %rax,-0x48(%rbp)
    7f6bcb61c363:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c368:	e8 eb fe ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c36d:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c370:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c373:	48 89 45 b0          	mov    %rax,-0x50(%rbp)
    7f6bcb61c377:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c37c:	e8 d7 fe ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c381:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c384:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c387:	48 89 45 a8          	mov    %rax,-0x58(%rbp)
    7f6bcb61c38b:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c390:	e8 c3 fe ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c395:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c398:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c39b:	48 89 45 a0          	mov    %rax,-0x60(%rbp)
    7f6bcb61c39f:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c3a4:	e8 af fe ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c3a9:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c3ac:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c3af:	48 89 45 98          	mov    %rax,-0x68(%rbp)
    7f6bcb61c3b3:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c3b8:	e8 9b fe ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c3bd:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c3c0:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c3c3:	48 89 45 90          	mov    %rax,-0x70(%rbp)
    7f6bcb61c3c7:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c3cc:	e8 87 fe ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c3d1:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c3d4:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c3d7:	48 89 45 88          	mov    %rax,-0x78(%rbp)
    7f6bcb61c3db:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c3e0:	e8 73 fe ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c3e5:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c3e8:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c3eb:	48 89 45 80          	mov    %rax,-0x80(%rbp)
    7f6bcb61c3ef:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c3f4:	e8 5f fe ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c3f9:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c3fc:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c3ff:	48 89 85 78 ff ff ff 	mov    %rax,-0x88(%rbp)
    7f6bcb61c406:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c40b:	e8 48 fe ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c410:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c413:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c416:	48 89 85 70 ff ff ff 	mov    %rax,-0x90(%rbp)
    7f6bcb61c41d:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c422:	e8 31 fe ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c427:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c42a:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c42d:	48 89 85 68 ff ff ff 	mov    %rax,-0x98(%rbp)
    7f6bcb61c434:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c439:	e8 1a fe ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c43e:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c441:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c444:	48 89 85 60 ff ff ff 	mov    %rax,-0xa0(%rbp)
    7f6bcb61c44b:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c450:	e8 03 fe ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c455:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c458:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c45b:	48 89 85 58 ff ff ff 	mov    %rax,-0xa8(%rbp)
    7f6bcb61c462:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c467:	e8 ec fd ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c46c:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c46f:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c472:	48 89 85 50 ff ff ff 	mov    %rax,-0xb0(%rbp)
    7f6bcb61c479:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c47e:	e8 d5 fd ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c483:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c486:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c489:	48 89 85 48 ff ff ff 	mov    %rax,-0xb8(%rbp)
    7f6bcb61c490:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c495:	e8 be fd ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c49a:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c49d:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c4a0:	48 89 85 40 ff ff ff 	mov    %rax,-0xc0(%rbp)
    7f6bcb61c4a7:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c4ac:	e8 a7 fd ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c4b1:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c4b4:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c4b7:	48 89 85 38 ff ff ff 	mov    %rax,-0xc8(%rbp)
    7f6bcb61c4be:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c4c3:	e8 90 fd ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c4c8:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c4cb:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c4ce:	48 89 85 30 ff ff ff 	mov    %rax,-0xd0(%rbp)
    7f6bcb61c4d5:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c4da:	e8 79 fd ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c4df:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c4e2:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c4e5:	48 89 85 28 ff ff ff 	mov    %rax,-0xd8(%rbp)
    7f6bcb61c4ec:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c4f1:	e8 62 fd ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c4f6:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c4f9:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c4fc:	48 89 85 20 ff ff ff 	mov    %rax,-0xe0(%rbp)
    7f6bcb61c503:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c508:	e8 4b fd ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c50d:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c510:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c513:	48 89 85 18 ff ff ff 	mov    %rax,-0xe8(%rbp)
    7f6bcb61c51a:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c51f:	e8 34 fd ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c524:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c527:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c52a:	48 89 85 10 ff ff ff 	mov    %rax,-0xf0(%rbp)
    7f6bcb61c531:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c536:	e8 1d fd ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c53b:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c53e:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c541:	48 89 85 08 ff ff ff 	mov    %rax,-0xf8(%rbp)
    7f6bcb61c548:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c54d:	e8 06 fd ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c552:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c555:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c558:	48 89 85 00 ff ff ff 	mov    %rax,-0x100(%rbp)
    7f6bcb61c55f:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c564:	e8 ef fc ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c569:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c56c:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c56f:	48 89 85 f8 fe ff ff 	mov    %rax,-0x108(%rbp)
    7f6bcb61c576:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c57b:	e8 d8 fc ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c580:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c583:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c586:	48 89 85 f0 fe ff ff 	mov    %rax,-0x110(%rbp)
    7f6bcb61c58d:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c592:	e8 c1 fc ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c597:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c59a:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c59d:	48 89 85 e8 fe ff ff 	mov    %rax,-0x118(%rbp)
    7f6bcb61c5a4:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c5a9:	e8 aa fc ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c5ae:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c5b1:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c5b4:	48 89 85 e0 fe ff ff 	mov    %rax,-0x120(%rbp)
    7f6bcb61c5bb:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c5c0:	e8 93 fc ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c5c5:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c5c8:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c5cb:	48 89 85 d8 fe ff ff 	mov    %rax,-0x128(%rbp)
    7f6bcb61c5d2:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c5d7:	e8 7c fc ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c5dc:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c5df:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c5e2:	48 89 85 d0 fe ff ff 	mov    %rax,-0x130(%rbp)
    7f6bcb61c5e9:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c5ee:	e8 65 fc ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c5f3:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c5f6:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c5f9:	48 89 85 c8 fe ff ff 	mov    %rax,-0x138(%rbp)
    7f6bcb61c600:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c605:	e8 4e fc ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c60a:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c60d:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c610:	48 89 85 c0 fe ff ff 	mov    %rax,-0x140(%rbp)
    7f6bcb61c617:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c61c:	e8 37 fc ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c621:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c624:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c627:	48 89 85 b8 fe ff ff 	mov    %rax,-0x148(%rbp)
    7f6bcb61c62e:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c633:	e8 20 fc ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c638:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c63b:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c63e:	48 89 85 b0 fe ff ff 	mov    %rax,-0x150(%rbp)
    7f6bcb61c645:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c64a:	e8 09 fc ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c64f:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c652:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c655:	48 89 85 a8 fe ff ff 	mov    %rax,-0x158(%rbp)
    7f6bcb61c65c:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c661:	e8 f2 fb ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c666:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c669:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c66c:	48 89 85 a0 fe ff ff 	mov    %rax,-0x160(%rbp)
    7f6bcb61c673:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c678:	e8 db fb ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c67d:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c680:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c683:	48 89 85 98 fe ff ff 	mov    %rax,-0x168(%rbp)
    7f6bcb61c68a:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c68f:	e8 c4 fb ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c694:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c697:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c69a:	48 89 85 90 fe ff ff 	mov    %rax,-0x170(%rbp)
    7f6bcb61c6a1:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c6a6:	e8 ad fb ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c6ab:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c6ae:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c6b1:	48 89 85 88 fe ff ff 	mov    %rax,-0x178(%rbp)
    7f6bcb61c6b8:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c6bd:	e8 96 fb ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c6c2:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c6c5:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c6c8:	48 89 85 80 fe ff ff 	mov    %rax,-0x180(%rbp)
    7f6bcb61c6cf:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c6d4:	e8 7f fb ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c6d9:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c6dc:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c6df:	48 89 85 78 fe ff ff 	mov    %rax,-0x188(%rbp)
    7f6bcb61c6e6:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c6eb:	e8 68 fb ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c6f0:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c6f3:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c6f6:	48 89 85 70 fe ff ff 	mov    %rax,-0x190(%rbp)
    7f6bcb61c6fd:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c702:	e8 51 fb ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c707:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c70a:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c70d:	48 89 85 68 fe ff ff 	mov    %rax,-0x198(%rbp)
    7f6bcb61c714:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c719:	e8 3a fb ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c71e:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c721:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c724:	48 89 85 60 fe ff ff 	mov    %rax,-0x1a0(%rbp)
    7f6bcb61c72b:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c730:	e8 23 fb ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c735:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c738:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c73b:	48 89 85 58 fe ff ff 	mov    %rax,-0x1a8(%rbp)
    7f6bcb61c742:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c747:	e8 0c fb ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c74c:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c74f:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c752:	48 89 85 50 fe ff ff 	mov    %rax,-0x1b0(%rbp)
    7f6bcb61c759:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c75e:	e8 f5 fa ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c763:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c766:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c769:	48 89 85 48 fe ff ff 	mov    %rax,-0x1b8(%rbp)
    7f6bcb61c770:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c775:	e8 de fa ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c77a:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c77d:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c780:	48 89 85 40 fe ff ff 	mov    %rax,-0x1c0(%rbp)
    7f6bcb61c787:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c78c:	e8 c7 fa ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c791:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c794:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c797:	48 89 85 38 fe ff ff 	mov    %rax,-0x1c8(%rbp)
    7f6bcb61c79e:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c7a3:	e8 b0 fa ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c7a8:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c7ab:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c7ae:	48 89 85 30 fe ff ff 	mov    %rax,-0x1d0(%rbp)
    7f6bcb61c7b5:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c7ba:	e8 99 fa ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c7bf:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c7c2:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c7c5:	48 89 85 28 fe ff ff 	mov    %rax,-0x1d8(%rbp)
    7f6bcb61c7cc:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c7d1:	e8 82 fa ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c7d6:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c7d9:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c7dc:	48 89 85 20 fe ff ff 	mov    %rax,-0x1e0(%rbp)
    7f6bcb61c7e3:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c7e8:	e8 6b fa ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c7ed:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c7f0:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c7f3:	48 89 85 18 fe ff ff 	mov    %rax,-0x1e8(%rbp)
    7f6bcb61c7fa:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c7ff:	e8 54 fa ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c804:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c807:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c80a:	48 89 85 10 fe ff ff 	mov    %rax,-0x1f0(%rbp)
    7f6bcb61c811:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c816:	e8 3d fa ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c81b:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c81e:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c821:	48 89 85 08 fe ff ff 	mov    %rax,-0x1f8(%rbp)
    7f6bcb61c828:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c82d:	e8 26 fa ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c832:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c835:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c838:	48 89 85 00 fe ff ff 	mov    %rax,-0x200(%rbp)
    7f6bcb61c83f:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c844:	e8 0f fa ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c849:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c84c:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c84f:	48 89 85 f8 fd ff ff 	mov    %rax,-0x208(%rbp)
    7f6bcb61c856:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c85b:	e8 f8 f9 ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c860:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c863:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c866:	48 89 85 f0 fd ff ff 	mov    %rax,-0x210(%rbp)
    7f6bcb61c86d:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c872:	e8 e1 f9 ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c877:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c87a:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c87d:	48 89 85 e8 fd ff ff 	mov    %rax,-0x218(%rbp)
    7f6bcb61c884:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c889:	e8 ca f9 ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c88e:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c891:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c894:	48 89 85 e0 fd ff ff 	mov    %rax,-0x220(%rbp)
    7f6bcb61c89b:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c8a0:	e8 b3 f9 ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c8a5:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c8a8:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c8ab:	48 89 85 d8 fd ff ff 	mov    %rax,-0x228(%rbp)
    7f6bcb61c8b2:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c8b7:	e8 9c f9 ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c8bc:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c8bf:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c8c2:	48 89 85 d0 fd ff ff 	mov    %rax,-0x230(%rbp)
    7f6bcb61c8c9:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c8ce:	e8 85 f9 ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c8d3:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c8d6:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c8d9:	48 89 85 c8 fd ff ff 	mov    %rax,-0x238(%rbp)
    7f6bcb61c8e0:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c8e5:	e8 6e f9 ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c8ea:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c8ed:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c8f0:	48 89 85 c0 fd ff ff 	mov    %rax,-0x240(%rbp)
    7f6bcb61c8f7:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c8fc:	e8 57 f9 ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c901:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c904:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c907:	48 89 85 b8 fd ff ff 	mov    %rax,-0x248(%rbp)
    7f6bcb61c90e:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c913:	e8 40 f9 ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c918:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c91b:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c91e:	48 89 85 b0 fd ff ff 	mov    %rax,-0x250(%rbp)
    7f6bcb61c925:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c92a:	e8 29 f9 ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c92f:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c932:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c935:	48 89 85 a8 fd ff ff 	mov    %rax,-0x258(%rbp)
    7f6bcb61c93c:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c941:	e8 12 f9 ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c946:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c949:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c94c:	48 89 85 a0 fd ff ff 	mov    %rax,-0x260(%rbp)
    7f6bcb61c953:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c958:	e8 fb f8 ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c95d:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c960:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c963:	48 89 85 98 fd ff ff 	mov    %rax,-0x268(%rbp)
    7f6bcb61c96a:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c96f:	e8 e4 f8 ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c974:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c977:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c97a:	48 89 85 90 fd ff ff 	mov    %rax,-0x270(%rbp)
    7f6bcb61c981:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c986:	e8 cd f8 ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c98b:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c98e:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c991:	48 89 85 88 fd ff ff 	mov    %rax,-0x278(%rbp)
    7f6bcb61c998:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c99d:	e8 b6 f8 ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c9a2:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c9a5:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c9a8:	48 89 85 80 fd ff ff 	mov    %rax,-0x280(%rbp)
    7f6bcb61c9af:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c9b4:	e8 9f f8 ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c9b9:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c9bc:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c9bf:	48 89 85 78 fd ff ff 	mov    %rax,-0x288(%rbp)
    7f6bcb61c9c6:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c9cb:	e8 88 f8 ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c9d0:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c9d3:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c9d6:	48 89 85 70 fd ff ff 	mov    %rax,-0x290(%rbp)
    7f6bcb61c9dd:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c9e2:	e8 71 f8 ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c9e7:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61c9ea:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61c9ed:	48 89 85 68 fd ff ff 	mov    %rax,-0x298(%rbp)
    7f6bcb61c9f4:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61c9f9:	e8 5a f8 ff ff       	callq  0x7f6bcb61c258
    7f6bcb61c9fe:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61ca01:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61ca04:	48 89 85 60 fd ff ff 	mov    %rax,-0x2a0(%rbp)
    7f6bcb61ca0b:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61ca10:	e8 43 f8 ff ff       	callq  0x7f6bcb61c258
    7f6bcb61ca15:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61ca18:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61ca1b:	48 89 85 58 fd ff ff 	mov    %rax,-0x2a8(%rbp)
    7f6bcb61ca22:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61ca27:	e8 2c f8 ff ff       	callq  0x7f6bcb61c258
    7f6bcb61ca2c:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61ca2f:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61ca32:	48 89 85 50 fd ff ff 	mov    %rax,-0x2b0(%rbp)
    7f6bcb61ca39:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61ca3e:	e8 15 f8 ff ff       	callq  0x7f6bcb61c258
    7f6bcb61ca43:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61ca46:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61ca49:	48 89 85 48 fd ff ff 	mov    %rax,-0x2b8(%rbp)
    7f6bcb61ca50:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61ca55:	e8 fe f7 ff ff       	callq  0x7f6bcb61c258
    7f6bcb61ca5a:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61ca5d:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61ca60:	48 89 85 40 fd ff ff 	mov    %rax,-0x2c0(%rbp)
    7f6bcb61ca67:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61ca6c:	e8 e7 f7 ff ff       	callq  0x7f6bcb61c258
    7f6bcb61ca71:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61ca74:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61ca77:	48 89 85 38 fd ff ff 	mov    %rax,-0x2c8(%rbp)
    7f6bcb61ca7e:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61ca83:	e8 d0 f7 ff ff       	callq  0x7f6bcb61c258
    7f6bcb61ca88:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61ca8b:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61ca8e:	48 89 85 30 fd ff ff 	mov    %rax,-0x2d0(%rbp)
    7f6bcb61ca95:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61ca9a:	e8 b9 f7 ff ff       	callq  0x7f6bcb61c258
    7f6bcb61ca9f:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61caa2:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61caa5:	48 89 85 28 fd ff ff 	mov    %rax,-0x2d8(%rbp)
    7f6bcb61caac:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61cab1:	e8 a2 f7 ff ff       	callq  0x7f6bcb61c258
    7f6bcb61cab6:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61cab9:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61cabc:	48 89 85 20 fd ff ff 	mov    %rax,-0x2e0(%rbp)
    7f6bcb61cac3:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61cac8:	e8 8b f7 ff ff       	callq  0x7f6bcb61c258
    7f6bcb61cacd:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61cad0:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61cad3:	48 89 85 18 fd ff ff 	mov    %rax,-0x2e8(%rbp)
    7f6bcb61cada:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61cadf:	e8 74 f7 ff ff       	callq  0x7f6bcb61c258
    7f6bcb61cae4:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61cae7:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61caea:	48 89 85 10 fd ff ff 	mov    %rax,-0x2f0(%rbp)
    7f6bcb61caf1:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61caf6:	e8 5d f7 ff ff       	callq  0x7f6bcb61c258
    7f6bcb61cafb:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61cafe:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61cb01:	48 89 85 08 fd ff ff 	mov    %rax,-0x2f8(%rbp)
    7f6bcb61cb08:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61cb0d:	e8 46 f7 ff ff       	callq  0x7f6bcb61c258
    7f6bcb61cb12:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61cb15:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61cb18:	48 89 85 00 fd ff ff 	mov    %rax,-0x300(%rbp)
    7f6bcb61cb1f:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61cb24:	e8 2f f7 ff ff       	callq  0x7f6bcb61c258
    7f6bcb61cb29:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61cb2c:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61cb2f:	48 89 85 f8 fc ff ff 	mov    %rax,-0x308(%rbp)
    7f6bcb61cb36:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61cb3b:	e8 18 f7 ff ff       	callq  0x7f6bcb61c258
    7f6bcb61cb40:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61cb43:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61cb46:	48 89 85 f0 fc ff ff 	mov    %rax,-0x310(%rbp)
    7f6bcb61cb4d:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61cb52:	e8 01 f7 ff ff       	callq  0x7f6bcb61c258
    7f6bcb61cb57:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61cb5a:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61cb5d:	48 89 85 e8 fc ff ff 	mov    %rax,-0x318(%rbp)
    7f6bcb61cb64:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61cb69:	e8 ea f6 ff ff       	callq  0x7f6bcb61c258
    7f6bcb61cb6e:	49 8b f7             	mov    %r15,%rsi
    7f6bcb61cb71:	48 8b f8             	mov    %rax,%rdi
    7f6bcb61cb74:	48 89 85 e0 fc ff ff 	mov    %rax,-0x320(%rbp)
    7f6bcb61cb7b:	b8 08 00 00 00       	mov    $0x8,%eax
    7f6bcb61cb80:	e8 d3 f6 ff ff       	callq  0x7f6bcb61c258
    7f6bcb61cb85:	4c 8b 3c 24          	mov    (%rsp),%r15
    7f6bcb61cb89:	48 8b e5             	mov    %rbp,%rsp
    7f6bcb61cb8c:	5d                   	pop    %rbp
    7f6bcb61cb8d:	c3                   	retq   

end

