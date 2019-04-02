function add(long, long) : long

/tmp/libjit-dump.o:     file format elf64-x86-64


Disassembly of section .text:

00007fa93b11e258 <.text>:
    7fa93b11e258:	55                   	push   %rbp
    7fa93b11e259:	48 8b ec             	mov    %rsp,%rbp
    7fa93b11e25c:	48 83 ec 10          	sub    $0x10,%rsp
    7fa93b11e260:	48 89 7d f8          	mov    %rdi,-0x8(%rbp)
    7fa93b11e264:	48 89 75 f0          	mov    %rsi,-0x10(%rbp)
    7fa93b11e268:	48 8b 45 f8          	mov    -0x8(%rbp),%rax
    7fa93b11e26c:	48 03 45 f0          	add    -0x10(%rbp),%rax
    7fa93b11e270:	48 8b e5             	mov    %rbp,%rsp
    7fa93b11e273:	5d                   	pop    %rbp
    7fa93b11e274:	c3                   	retq   

end

function add100(long, long) : long

/tmp/libjit-dump.o:     file format elf64-x86-64


Disassembly of section .text:

00007fa93b11e2a6 <.text>:
    7fa93b11e2a6:	55                   	push   %rbp
    7fa93b11e2a7:	48 8b ec             	mov    %rsp,%rbp
    7fa93b11e2aa:	48 81 ec 30 03 00 00 	sub    $0x330,%rsp
    7fa93b11e2b1:	4c 89 3c 24          	mov    %r15,(%rsp)
    7fa93b11e2b5:	48 89 7d f8          	mov    %rdi,-0x8(%rbp)
    7fa93b11e2b9:	4c 8b fe             	mov    %rsi,%r15
    7fa93b11e2bc:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e2bf:	48 8b 7d f8          	mov    -0x8(%rbp),%rdi
    7fa93b11e2c3:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e2c8:	e8 8b ff ff ff       	callq  0x7fa93b11e258
    7fa93b11e2cd:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e2d0:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e2d3:	48 89 45 f0          	mov    %rax,-0x10(%rbp)
    7fa93b11e2d7:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e2dc:	e8 77 ff ff ff       	callq  0x7fa93b11e258
    7fa93b11e2e1:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e2e4:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e2e7:	48 89 45 e8          	mov    %rax,-0x18(%rbp)
    7fa93b11e2eb:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e2f0:	e8 63 ff ff ff       	callq  0x7fa93b11e258
    7fa93b11e2f5:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e2f8:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e2fb:	48 89 45 e0          	mov    %rax,-0x20(%rbp)
    7fa93b11e2ff:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e304:	e8 4f ff ff ff       	callq  0x7fa93b11e258
    7fa93b11e309:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e30c:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e30f:	48 89 45 d8          	mov    %rax,-0x28(%rbp)
    7fa93b11e313:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e318:	e8 3b ff ff ff       	callq  0x7fa93b11e258
    7fa93b11e31d:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e320:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e323:	48 89 45 d0          	mov    %rax,-0x30(%rbp)
    7fa93b11e327:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e32c:	e8 27 ff ff ff       	callq  0x7fa93b11e258
    7fa93b11e331:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e334:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e337:	48 89 45 c8          	mov    %rax,-0x38(%rbp)
    7fa93b11e33b:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e340:	e8 13 ff ff ff       	callq  0x7fa93b11e258
    7fa93b11e345:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e348:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e34b:	48 89 45 c0          	mov    %rax,-0x40(%rbp)
    7fa93b11e34f:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e354:	e8 ff fe ff ff       	callq  0x7fa93b11e258
    7fa93b11e359:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e35c:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e35f:	48 89 45 b8          	mov    %rax,-0x48(%rbp)
    7fa93b11e363:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e368:	e8 eb fe ff ff       	callq  0x7fa93b11e258
    7fa93b11e36d:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e370:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e373:	48 89 45 b0          	mov    %rax,-0x50(%rbp)
    7fa93b11e377:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e37c:	e8 d7 fe ff ff       	callq  0x7fa93b11e258
    7fa93b11e381:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e384:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e387:	48 89 45 a8          	mov    %rax,-0x58(%rbp)
    7fa93b11e38b:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e390:	e8 c3 fe ff ff       	callq  0x7fa93b11e258
    7fa93b11e395:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e398:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e39b:	48 89 45 a0          	mov    %rax,-0x60(%rbp)
    7fa93b11e39f:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e3a4:	e8 af fe ff ff       	callq  0x7fa93b11e258
    7fa93b11e3a9:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e3ac:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e3af:	48 89 45 98          	mov    %rax,-0x68(%rbp)
    7fa93b11e3b3:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e3b8:	e8 9b fe ff ff       	callq  0x7fa93b11e258
    7fa93b11e3bd:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e3c0:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e3c3:	48 89 45 90          	mov    %rax,-0x70(%rbp)
    7fa93b11e3c7:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e3cc:	e8 87 fe ff ff       	callq  0x7fa93b11e258
    7fa93b11e3d1:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e3d4:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e3d7:	48 89 45 88          	mov    %rax,-0x78(%rbp)
    7fa93b11e3db:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e3e0:	e8 73 fe ff ff       	callq  0x7fa93b11e258
    7fa93b11e3e5:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e3e8:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e3eb:	48 89 45 80          	mov    %rax,-0x80(%rbp)
    7fa93b11e3ef:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e3f4:	e8 5f fe ff ff       	callq  0x7fa93b11e258
    7fa93b11e3f9:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e3fc:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e3ff:	48 89 85 78 ff ff ff 	mov    %rax,-0x88(%rbp)
    7fa93b11e406:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e40b:	e8 48 fe ff ff       	callq  0x7fa93b11e258
    7fa93b11e410:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e413:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e416:	48 89 85 70 ff ff ff 	mov    %rax,-0x90(%rbp)
    7fa93b11e41d:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e422:	e8 31 fe ff ff       	callq  0x7fa93b11e258
    7fa93b11e427:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e42a:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e42d:	48 89 85 68 ff ff ff 	mov    %rax,-0x98(%rbp)
    7fa93b11e434:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e439:	e8 1a fe ff ff       	callq  0x7fa93b11e258
    7fa93b11e43e:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e441:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e444:	48 89 85 60 ff ff ff 	mov    %rax,-0xa0(%rbp)
    7fa93b11e44b:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e450:	e8 03 fe ff ff       	callq  0x7fa93b11e258
    7fa93b11e455:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e458:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e45b:	48 89 85 58 ff ff ff 	mov    %rax,-0xa8(%rbp)
    7fa93b11e462:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e467:	e8 ec fd ff ff       	callq  0x7fa93b11e258
    7fa93b11e46c:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e46f:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e472:	48 89 85 50 ff ff ff 	mov    %rax,-0xb0(%rbp)
    7fa93b11e479:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e47e:	e8 d5 fd ff ff       	callq  0x7fa93b11e258
    7fa93b11e483:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e486:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e489:	48 89 85 48 ff ff ff 	mov    %rax,-0xb8(%rbp)
    7fa93b11e490:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e495:	e8 be fd ff ff       	callq  0x7fa93b11e258
    7fa93b11e49a:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e49d:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e4a0:	48 89 85 40 ff ff ff 	mov    %rax,-0xc0(%rbp)
    7fa93b11e4a7:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e4ac:	e8 a7 fd ff ff       	callq  0x7fa93b11e258
    7fa93b11e4b1:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e4b4:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e4b7:	48 89 85 38 ff ff ff 	mov    %rax,-0xc8(%rbp)
    7fa93b11e4be:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e4c3:	e8 90 fd ff ff       	callq  0x7fa93b11e258
    7fa93b11e4c8:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e4cb:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e4ce:	48 89 85 30 ff ff ff 	mov    %rax,-0xd0(%rbp)
    7fa93b11e4d5:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e4da:	e8 79 fd ff ff       	callq  0x7fa93b11e258
    7fa93b11e4df:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e4e2:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e4e5:	48 89 85 28 ff ff ff 	mov    %rax,-0xd8(%rbp)
    7fa93b11e4ec:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e4f1:	e8 62 fd ff ff       	callq  0x7fa93b11e258
    7fa93b11e4f6:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e4f9:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e4fc:	48 89 85 20 ff ff ff 	mov    %rax,-0xe0(%rbp)
    7fa93b11e503:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e508:	e8 4b fd ff ff       	callq  0x7fa93b11e258
    7fa93b11e50d:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e510:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e513:	48 89 85 18 ff ff ff 	mov    %rax,-0xe8(%rbp)
    7fa93b11e51a:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e51f:	e8 34 fd ff ff       	callq  0x7fa93b11e258
    7fa93b11e524:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e527:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e52a:	48 89 85 10 ff ff ff 	mov    %rax,-0xf0(%rbp)
    7fa93b11e531:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e536:	e8 1d fd ff ff       	callq  0x7fa93b11e258
    7fa93b11e53b:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e53e:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e541:	48 89 85 08 ff ff ff 	mov    %rax,-0xf8(%rbp)
    7fa93b11e548:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e54d:	e8 06 fd ff ff       	callq  0x7fa93b11e258
    7fa93b11e552:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e555:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e558:	48 89 85 00 ff ff ff 	mov    %rax,-0x100(%rbp)
    7fa93b11e55f:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e564:	e8 ef fc ff ff       	callq  0x7fa93b11e258
    7fa93b11e569:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e56c:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e56f:	48 89 85 f8 fe ff ff 	mov    %rax,-0x108(%rbp)
    7fa93b11e576:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e57b:	e8 d8 fc ff ff       	callq  0x7fa93b11e258
    7fa93b11e580:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e583:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e586:	48 89 85 f0 fe ff ff 	mov    %rax,-0x110(%rbp)
    7fa93b11e58d:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e592:	e8 c1 fc ff ff       	callq  0x7fa93b11e258
    7fa93b11e597:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e59a:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e59d:	48 89 85 e8 fe ff ff 	mov    %rax,-0x118(%rbp)
    7fa93b11e5a4:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e5a9:	e8 aa fc ff ff       	callq  0x7fa93b11e258
    7fa93b11e5ae:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e5b1:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e5b4:	48 89 85 e0 fe ff ff 	mov    %rax,-0x120(%rbp)
    7fa93b11e5bb:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e5c0:	e8 93 fc ff ff       	callq  0x7fa93b11e258
    7fa93b11e5c5:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e5c8:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e5cb:	48 89 85 d8 fe ff ff 	mov    %rax,-0x128(%rbp)
    7fa93b11e5d2:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e5d7:	e8 7c fc ff ff       	callq  0x7fa93b11e258
    7fa93b11e5dc:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e5df:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e5e2:	48 89 85 d0 fe ff ff 	mov    %rax,-0x130(%rbp)
    7fa93b11e5e9:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e5ee:	e8 65 fc ff ff       	callq  0x7fa93b11e258
    7fa93b11e5f3:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e5f6:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e5f9:	48 89 85 c8 fe ff ff 	mov    %rax,-0x138(%rbp)
    7fa93b11e600:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e605:	e8 4e fc ff ff       	callq  0x7fa93b11e258
    7fa93b11e60a:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e60d:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e610:	48 89 85 c0 fe ff ff 	mov    %rax,-0x140(%rbp)
    7fa93b11e617:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e61c:	e8 37 fc ff ff       	callq  0x7fa93b11e258
    7fa93b11e621:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e624:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e627:	48 89 85 b8 fe ff ff 	mov    %rax,-0x148(%rbp)
    7fa93b11e62e:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e633:	e8 20 fc ff ff       	callq  0x7fa93b11e258
    7fa93b11e638:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e63b:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e63e:	48 89 85 b0 fe ff ff 	mov    %rax,-0x150(%rbp)
    7fa93b11e645:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e64a:	e8 09 fc ff ff       	callq  0x7fa93b11e258
    7fa93b11e64f:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e652:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e655:	48 89 85 a8 fe ff ff 	mov    %rax,-0x158(%rbp)
    7fa93b11e65c:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e661:	e8 f2 fb ff ff       	callq  0x7fa93b11e258
    7fa93b11e666:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e669:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e66c:	48 89 85 a0 fe ff ff 	mov    %rax,-0x160(%rbp)
    7fa93b11e673:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e678:	e8 db fb ff ff       	callq  0x7fa93b11e258
    7fa93b11e67d:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e680:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e683:	48 89 85 98 fe ff ff 	mov    %rax,-0x168(%rbp)
    7fa93b11e68a:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e68f:	e8 c4 fb ff ff       	callq  0x7fa93b11e258
    7fa93b11e694:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e697:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e69a:	48 89 85 90 fe ff ff 	mov    %rax,-0x170(%rbp)
    7fa93b11e6a1:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e6a6:	e8 ad fb ff ff       	callq  0x7fa93b11e258
    7fa93b11e6ab:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e6ae:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e6b1:	48 89 85 88 fe ff ff 	mov    %rax,-0x178(%rbp)
    7fa93b11e6b8:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e6bd:	e8 96 fb ff ff       	callq  0x7fa93b11e258
    7fa93b11e6c2:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e6c5:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e6c8:	48 89 85 80 fe ff ff 	mov    %rax,-0x180(%rbp)
    7fa93b11e6cf:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e6d4:	e8 7f fb ff ff       	callq  0x7fa93b11e258
    7fa93b11e6d9:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e6dc:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e6df:	48 89 85 78 fe ff ff 	mov    %rax,-0x188(%rbp)
    7fa93b11e6e6:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e6eb:	e8 68 fb ff ff       	callq  0x7fa93b11e258
    7fa93b11e6f0:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e6f3:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e6f6:	48 89 85 70 fe ff ff 	mov    %rax,-0x190(%rbp)
    7fa93b11e6fd:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e702:	e8 51 fb ff ff       	callq  0x7fa93b11e258
    7fa93b11e707:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e70a:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e70d:	48 89 85 68 fe ff ff 	mov    %rax,-0x198(%rbp)
    7fa93b11e714:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e719:	e8 3a fb ff ff       	callq  0x7fa93b11e258
    7fa93b11e71e:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e721:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e724:	48 89 85 60 fe ff ff 	mov    %rax,-0x1a0(%rbp)
    7fa93b11e72b:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e730:	e8 23 fb ff ff       	callq  0x7fa93b11e258
    7fa93b11e735:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e738:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e73b:	48 89 85 58 fe ff ff 	mov    %rax,-0x1a8(%rbp)
    7fa93b11e742:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e747:	e8 0c fb ff ff       	callq  0x7fa93b11e258
    7fa93b11e74c:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e74f:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e752:	48 89 85 50 fe ff ff 	mov    %rax,-0x1b0(%rbp)
    7fa93b11e759:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e75e:	e8 f5 fa ff ff       	callq  0x7fa93b11e258
    7fa93b11e763:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e766:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e769:	48 89 85 48 fe ff ff 	mov    %rax,-0x1b8(%rbp)
    7fa93b11e770:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e775:	e8 de fa ff ff       	callq  0x7fa93b11e258
    7fa93b11e77a:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e77d:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e780:	48 89 85 40 fe ff ff 	mov    %rax,-0x1c0(%rbp)
    7fa93b11e787:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e78c:	e8 c7 fa ff ff       	callq  0x7fa93b11e258
    7fa93b11e791:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e794:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e797:	48 89 85 38 fe ff ff 	mov    %rax,-0x1c8(%rbp)
    7fa93b11e79e:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e7a3:	e8 b0 fa ff ff       	callq  0x7fa93b11e258
    7fa93b11e7a8:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e7ab:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e7ae:	48 89 85 30 fe ff ff 	mov    %rax,-0x1d0(%rbp)
    7fa93b11e7b5:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e7ba:	e8 99 fa ff ff       	callq  0x7fa93b11e258
    7fa93b11e7bf:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e7c2:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e7c5:	48 89 85 28 fe ff ff 	mov    %rax,-0x1d8(%rbp)
    7fa93b11e7cc:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e7d1:	e8 82 fa ff ff       	callq  0x7fa93b11e258
    7fa93b11e7d6:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e7d9:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e7dc:	48 89 85 20 fe ff ff 	mov    %rax,-0x1e0(%rbp)
    7fa93b11e7e3:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e7e8:	e8 6b fa ff ff       	callq  0x7fa93b11e258
    7fa93b11e7ed:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e7f0:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e7f3:	48 89 85 18 fe ff ff 	mov    %rax,-0x1e8(%rbp)
    7fa93b11e7fa:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e7ff:	e8 54 fa ff ff       	callq  0x7fa93b11e258
    7fa93b11e804:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e807:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e80a:	48 89 85 10 fe ff ff 	mov    %rax,-0x1f0(%rbp)
    7fa93b11e811:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e816:	e8 3d fa ff ff       	callq  0x7fa93b11e258
    7fa93b11e81b:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e81e:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e821:	48 89 85 08 fe ff ff 	mov    %rax,-0x1f8(%rbp)
    7fa93b11e828:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e82d:	e8 26 fa ff ff       	callq  0x7fa93b11e258
    7fa93b11e832:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e835:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e838:	48 89 85 00 fe ff ff 	mov    %rax,-0x200(%rbp)
    7fa93b11e83f:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e844:	e8 0f fa ff ff       	callq  0x7fa93b11e258
    7fa93b11e849:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e84c:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e84f:	48 89 85 f8 fd ff ff 	mov    %rax,-0x208(%rbp)
    7fa93b11e856:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e85b:	e8 f8 f9 ff ff       	callq  0x7fa93b11e258
    7fa93b11e860:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e863:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e866:	48 89 85 f0 fd ff ff 	mov    %rax,-0x210(%rbp)
    7fa93b11e86d:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e872:	e8 e1 f9 ff ff       	callq  0x7fa93b11e258
    7fa93b11e877:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e87a:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e87d:	48 89 85 e8 fd ff ff 	mov    %rax,-0x218(%rbp)
    7fa93b11e884:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e889:	e8 ca f9 ff ff       	callq  0x7fa93b11e258
    7fa93b11e88e:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e891:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e894:	48 89 85 e0 fd ff ff 	mov    %rax,-0x220(%rbp)
    7fa93b11e89b:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e8a0:	e8 b3 f9 ff ff       	callq  0x7fa93b11e258
    7fa93b11e8a5:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e8a8:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e8ab:	48 89 85 d8 fd ff ff 	mov    %rax,-0x228(%rbp)
    7fa93b11e8b2:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e8b7:	e8 9c f9 ff ff       	callq  0x7fa93b11e258
    7fa93b11e8bc:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e8bf:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e8c2:	48 89 85 d0 fd ff ff 	mov    %rax,-0x230(%rbp)
    7fa93b11e8c9:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e8ce:	e8 85 f9 ff ff       	callq  0x7fa93b11e258
    7fa93b11e8d3:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e8d6:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e8d9:	48 89 85 c8 fd ff ff 	mov    %rax,-0x238(%rbp)
    7fa93b11e8e0:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e8e5:	e8 6e f9 ff ff       	callq  0x7fa93b11e258
    7fa93b11e8ea:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e8ed:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e8f0:	48 89 85 c0 fd ff ff 	mov    %rax,-0x240(%rbp)
    7fa93b11e8f7:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e8fc:	e8 57 f9 ff ff       	callq  0x7fa93b11e258
    7fa93b11e901:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e904:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e907:	48 89 85 b8 fd ff ff 	mov    %rax,-0x248(%rbp)
    7fa93b11e90e:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e913:	e8 40 f9 ff ff       	callq  0x7fa93b11e258
    7fa93b11e918:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e91b:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e91e:	48 89 85 b0 fd ff ff 	mov    %rax,-0x250(%rbp)
    7fa93b11e925:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e92a:	e8 29 f9 ff ff       	callq  0x7fa93b11e258
    7fa93b11e92f:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e932:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e935:	48 89 85 a8 fd ff ff 	mov    %rax,-0x258(%rbp)
    7fa93b11e93c:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e941:	e8 12 f9 ff ff       	callq  0x7fa93b11e258
    7fa93b11e946:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e949:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e94c:	48 89 85 a0 fd ff ff 	mov    %rax,-0x260(%rbp)
    7fa93b11e953:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e958:	e8 fb f8 ff ff       	callq  0x7fa93b11e258
    7fa93b11e95d:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e960:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e963:	48 89 85 98 fd ff ff 	mov    %rax,-0x268(%rbp)
    7fa93b11e96a:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e96f:	e8 e4 f8 ff ff       	callq  0x7fa93b11e258
    7fa93b11e974:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e977:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e97a:	48 89 85 90 fd ff ff 	mov    %rax,-0x270(%rbp)
    7fa93b11e981:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e986:	e8 cd f8 ff ff       	callq  0x7fa93b11e258
    7fa93b11e98b:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e98e:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e991:	48 89 85 88 fd ff ff 	mov    %rax,-0x278(%rbp)
    7fa93b11e998:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e99d:	e8 b6 f8 ff ff       	callq  0x7fa93b11e258
    7fa93b11e9a2:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e9a5:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e9a8:	48 89 85 80 fd ff ff 	mov    %rax,-0x280(%rbp)
    7fa93b11e9af:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e9b4:	e8 9f f8 ff ff       	callq  0x7fa93b11e258
    7fa93b11e9b9:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e9bc:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e9bf:	48 89 85 78 fd ff ff 	mov    %rax,-0x288(%rbp)
    7fa93b11e9c6:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e9cb:	e8 88 f8 ff ff       	callq  0x7fa93b11e258
    7fa93b11e9d0:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e9d3:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e9d6:	48 89 85 70 fd ff ff 	mov    %rax,-0x290(%rbp)
    7fa93b11e9dd:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e9e2:	e8 71 f8 ff ff       	callq  0x7fa93b11e258
    7fa93b11e9e7:	49 8b f7             	mov    %r15,%rsi
    7fa93b11e9ea:	48 8b f8             	mov    %rax,%rdi
    7fa93b11e9ed:	48 89 85 68 fd ff ff 	mov    %rax,-0x298(%rbp)
    7fa93b11e9f4:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11e9f9:	e8 5a f8 ff ff       	callq  0x7fa93b11e258
    7fa93b11e9fe:	49 8b f7             	mov    %r15,%rsi
    7fa93b11ea01:	48 8b f8             	mov    %rax,%rdi
    7fa93b11ea04:	48 89 85 60 fd ff ff 	mov    %rax,-0x2a0(%rbp)
    7fa93b11ea0b:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11ea10:	e8 43 f8 ff ff       	callq  0x7fa93b11e258
    7fa93b11ea15:	49 8b f7             	mov    %r15,%rsi
    7fa93b11ea18:	48 8b f8             	mov    %rax,%rdi
    7fa93b11ea1b:	48 89 85 58 fd ff ff 	mov    %rax,-0x2a8(%rbp)
    7fa93b11ea22:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11ea27:	e8 2c f8 ff ff       	callq  0x7fa93b11e258
    7fa93b11ea2c:	49 8b f7             	mov    %r15,%rsi
    7fa93b11ea2f:	48 8b f8             	mov    %rax,%rdi
    7fa93b11ea32:	48 89 85 50 fd ff ff 	mov    %rax,-0x2b0(%rbp)
    7fa93b11ea39:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11ea3e:	e8 15 f8 ff ff       	callq  0x7fa93b11e258
    7fa93b11ea43:	49 8b f7             	mov    %r15,%rsi
    7fa93b11ea46:	48 8b f8             	mov    %rax,%rdi
    7fa93b11ea49:	48 89 85 48 fd ff ff 	mov    %rax,-0x2b8(%rbp)
    7fa93b11ea50:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11ea55:	e8 fe f7 ff ff       	callq  0x7fa93b11e258
    7fa93b11ea5a:	49 8b f7             	mov    %r15,%rsi
    7fa93b11ea5d:	48 8b f8             	mov    %rax,%rdi
    7fa93b11ea60:	48 89 85 40 fd ff ff 	mov    %rax,-0x2c0(%rbp)
    7fa93b11ea67:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11ea6c:	e8 e7 f7 ff ff       	callq  0x7fa93b11e258
    7fa93b11ea71:	49 8b f7             	mov    %r15,%rsi
    7fa93b11ea74:	48 8b f8             	mov    %rax,%rdi
    7fa93b11ea77:	48 89 85 38 fd ff ff 	mov    %rax,-0x2c8(%rbp)
    7fa93b11ea7e:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11ea83:	e8 d0 f7 ff ff       	callq  0x7fa93b11e258
    7fa93b11ea88:	49 8b f7             	mov    %r15,%rsi
    7fa93b11ea8b:	48 8b f8             	mov    %rax,%rdi
    7fa93b11ea8e:	48 89 85 30 fd ff ff 	mov    %rax,-0x2d0(%rbp)
    7fa93b11ea95:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11ea9a:	e8 b9 f7 ff ff       	callq  0x7fa93b11e258
    7fa93b11ea9f:	49 8b f7             	mov    %r15,%rsi
    7fa93b11eaa2:	48 8b f8             	mov    %rax,%rdi
    7fa93b11eaa5:	48 89 85 28 fd ff ff 	mov    %rax,-0x2d8(%rbp)
    7fa93b11eaac:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11eab1:	e8 a2 f7 ff ff       	callq  0x7fa93b11e258
    7fa93b11eab6:	49 8b f7             	mov    %r15,%rsi
    7fa93b11eab9:	48 8b f8             	mov    %rax,%rdi
    7fa93b11eabc:	48 89 85 20 fd ff ff 	mov    %rax,-0x2e0(%rbp)
    7fa93b11eac3:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11eac8:	e8 8b f7 ff ff       	callq  0x7fa93b11e258
    7fa93b11eacd:	49 8b f7             	mov    %r15,%rsi
    7fa93b11ead0:	48 8b f8             	mov    %rax,%rdi
    7fa93b11ead3:	48 89 85 18 fd ff ff 	mov    %rax,-0x2e8(%rbp)
    7fa93b11eada:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11eadf:	e8 74 f7 ff ff       	callq  0x7fa93b11e258
    7fa93b11eae4:	49 8b f7             	mov    %r15,%rsi
    7fa93b11eae7:	48 8b f8             	mov    %rax,%rdi
    7fa93b11eaea:	48 89 85 10 fd ff ff 	mov    %rax,-0x2f0(%rbp)
    7fa93b11eaf1:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11eaf6:	e8 5d f7 ff ff       	callq  0x7fa93b11e258
    7fa93b11eafb:	49 8b f7             	mov    %r15,%rsi
    7fa93b11eafe:	48 8b f8             	mov    %rax,%rdi
    7fa93b11eb01:	48 89 85 08 fd ff ff 	mov    %rax,-0x2f8(%rbp)
    7fa93b11eb08:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11eb0d:	e8 46 f7 ff ff       	callq  0x7fa93b11e258
    7fa93b11eb12:	49 8b f7             	mov    %r15,%rsi
    7fa93b11eb15:	48 8b f8             	mov    %rax,%rdi
    7fa93b11eb18:	48 89 85 00 fd ff ff 	mov    %rax,-0x300(%rbp)
    7fa93b11eb1f:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11eb24:	e8 2f f7 ff ff       	callq  0x7fa93b11e258
    7fa93b11eb29:	49 8b f7             	mov    %r15,%rsi
    7fa93b11eb2c:	48 8b f8             	mov    %rax,%rdi
    7fa93b11eb2f:	48 89 85 f8 fc ff ff 	mov    %rax,-0x308(%rbp)
    7fa93b11eb36:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11eb3b:	e8 18 f7 ff ff       	callq  0x7fa93b11e258
    7fa93b11eb40:	49 8b f7             	mov    %r15,%rsi
    7fa93b11eb43:	48 8b f8             	mov    %rax,%rdi
    7fa93b11eb46:	48 89 85 f0 fc ff ff 	mov    %rax,-0x310(%rbp)
    7fa93b11eb4d:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11eb52:	e8 01 f7 ff ff       	callq  0x7fa93b11e258
    7fa93b11eb57:	49 8b f7             	mov    %r15,%rsi
    7fa93b11eb5a:	48 8b f8             	mov    %rax,%rdi
    7fa93b11eb5d:	48 89 85 e8 fc ff ff 	mov    %rax,-0x318(%rbp)
    7fa93b11eb64:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11eb69:	e8 ea f6 ff ff       	callq  0x7fa93b11e258
    7fa93b11eb6e:	49 8b f7             	mov    %r15,%rsi
    7fa93b11eb71:	48 8b f8             	mov    %rax,%rdi
    7fa93b11eb74:	48 89 85 e0 fc ff ff 	mov    %rax,-0x320(%rbp)
    7fa93b11eb7b:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa93b11eb80:	e8 d3 f6 ff ff       	callq  0x7fa93b11e258
    7fa93b11eb85:	4c 8b 3c 24          	mov    (%rsp),%r15
    7fa93b11eb89:	48 8b e5             	mov    %rbp,%rsp
    7fa93b11eb8c:	5d                   	pop    %rbp
    7fa93b11eb8d:	c3                   	retq   

end

