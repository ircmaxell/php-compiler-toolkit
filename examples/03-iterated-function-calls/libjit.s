function add(long, long) : long

/tmp/libjit-dump.o:     file format elf64-x86-64


Disassembly of section .text:

00007fa4811a8258 <.text>:
    7fa4811a8258:	55                   	push   %rbp
    7fa4811a8259:	48 8b ec             	mov    %rsp,%rbp
    7fa4811a825c:	48 83 ec 10          	sub    $0x10,%rsp
    7fa4811a8260:	48 89 7d f8          	mov    %rdi,-0x8(%rbp)
    7fa4811a8264:	48 89 75 f0          	mov    %rsi,-0x10(%rbp)
    7fa4811a8268:	48 8b 45 f8          	mov    -0x8(%rbp),%rax
    7fa4811a826c:	48 03 45 f0          	add    -0x10(%rbp),%rax
    7fa4811a8270:	48 8b e5             	mov    %rbp,%rsp
    7fa4811a8273:	5d                   	pop    %rbp
    7fa4811a8274:	c3                   	retq   

end

function add100(long, long) : long

/tmp/libjit-dump.o:     file format elf64-x86-64


Disassembly of section .text:

00007fa4811a82a6 <.text>:
    7fa4811a82a6:	55                   	push   %rbp
    7fa4811a82a7:	48 8b ec             	mov    %rsp,%rbp
    7fa4811a82aa:	48 81 ec 30 03 00 00 	sub    $0x330,%rsp
    7fa4811a82b1:	4c 89 3c 24          	mov    %r15,(%rsp)
    7fa4811a82b5:	48 89 7d f8          	mov    %rdi,-0x8(%rbp)
    7fa4811a82b9:	4c 8b fe             	mov    %rsi,%r15
    7fa4811a82bc:	49 8b f7             	mov    %r15,%rsi
    7fa4811a82bf:	48 8b 7d f8          	mov    -0x8(%rbp),%rdi
    7fa4811a82c3:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a82c8:	e8 8b ff ff ff       	callq  0x7fa4811a8258
    7fa4811a82cd:	49 8b f7             	mov    %r15,%rsi
    7fa4811a82d0:	48 8b f8             	mov    %rax,%rdi
    7fa4811a82d3:	48 89 45 f0          	mov    %rax,-0x10(%rbp)
    7fa4811a82d7:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a82dc:	e8 77 ff ff ff       	callq  0x7fa4811a8258
    7fa4811a82e1:	49 8b f7             	mov    %r15,%rsi
    7fa4811a82e4:	48 8b f8             	mov    %rax,%rdi
    7fa4811a82e7:	48 89 45 e8          	mov    %rax,-0x18(%rbp)
    7fa4811a82eb:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a82f0:	e8 63 ff ff ff       	callq  0x7fa4811a8258
    7fa4811a82f5:	49 8b f7             	mov    %r15,%rsi
    7fa4811a82f8:	48 8b f8             	mov    %rax,%rdi
    7fa4811a82fb:	48 89 45 e0          	mov    %rax,-0x20(%rbp)
    7fa4811a82ff:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a8304:	e8 4f ff ff ff       	callq  0x7fa4811a8258
    7fa4811a8309:	49 8b f7             	mov    %r15,%rsi
    7fa4811a830c:	48 8b f8             	mov    %rax,%rdi
    7fa4811a830f:	48 89 45 d8          	mov    %rax,-0x28(%rbp)
    7fa4811a8313:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a8318:	e8 3b ff ff ff       	callq  0x7fa4811a8258
    7fa4811a831d:	49 8b f7             	mov    %r15,%rsi
    7fa4811a8320:	48 8b f8             	mov    %rax,%rdi
    7fa4811a8323:	48 89 45 d0          	mov    %rax,-0x30(%rbp)
    7fa4811a8327:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a832c:	e8 27 ff ff ff       	callq  0x7fa4811a8258
    7fa4811a8331:	49 8b f7             	mov    %r15,%rsi
    7fa4811a8334:	48 8b f8             	mov    %rax,%rdi
    7fa4811a8337:	48 89 45 c8          	mov    %rax,-0x38(%rbp)
    7fa4811a833b:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a8340:	e8 13 ff ff ff       	callq  0x7fa4811a8258
    7fa4811a8345:	49 8b f7             	mov    %r15,%rsi
    7fa4811a8348:	48 8b f8             	mov    %rax,%rdi
    7fa4811a834b:	48 89 45 c0          	mov    %rax,-0x40(%rbp)
    7fa4811a834f:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a8354:	e8 ff fe ff ff       	callq  0x7fa4811a8258
    7fa4811a8359:	49 8b f7             	mov    %r15,%rsi
    7fa4811a835c:	48 8b f8             	mov    %rax,%rdi
    7fa4811a835f:	48 89 45 b8          	mov    %rax,-0x48(%rbp)
    7fa4811a8363:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a8368:	e8 eb fe ff ff       	callq  0x7fa4811a8258
    7fa4811a836d:	49 8b f7             	mov    %r15,%rsi
    7fa4811a8370:	48 8b f8             	mov    %rax,%rdi
    7fa4811a8373:	48 89 45 b0          	mov    %rax,-0x50(%rbp)
    7fa4811a8377:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a837c:	e8 d7 fe ff ff       	callq  0x7fa4811a8258
    7fa4811a8381:	49 8b f7             	mov    %r15,%rsi
    7fa4811a8384:	48 8b f8             	mov    %rax,%rdi
    7fa4811a8387:	48 89 45 a8          	mov    %rax,-0x58(%rbp)
    7fa4811a838b:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a8390:	e8 c3 fe ff ff       	callq  0x7fa4811a8258
    7fa4811a8395:	49 8b f7             	mov    %r15,%rsi
    7fa4811a8398:	48 8b f8             	mov    %rax,%rdi
    7fa4811a839b:	48 89 45 a0          	mov    %rax,-0x60(%rbp)
    7fa4811a839f:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a83a4:	e8 af fe ff ff       	callq  0x7fa4811a8258
    7fa4811a83a9:	49 8b f7             	mov    %r15,%rsi
    7fa4811a83ac:	48 8b f8             	mov    %rax,%rdi
    7fa4811a83af:	48 89 45 98          	mov    %rax,-0x68(%rbp)
    7fa4811a83b3:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a83b8:	e8 9b fe ff ff       	callq  0x7fa4811a8258
    7fa4811a83bd:	49 8b f7             	mov    %r15,%rsi
    7fa4811a83c0:	48 8b f8             	mov    %rax,%rdi
    7fa4811a83c3:	48 89 45 90          	mov    %rax,-0x70(%rbp)
    7fa4811a83c7:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a83cc:	e8 87 fe ff ff       	callq  0x7fa4811a8258
    7fa4811a83d1:	49 8b f7             	mov    %r15,%rsi
    7fa4811a83d4:	48 8b f8             	mov    %rax,%rdi
    7fa4811a83d7:	48 89 45 88          	mov    %rax,-0x78(%rbp)
    7fa4811a83db:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a83e0:	e8 73 fe ff ff       	callq  0x7fa4811a8258
    7fa4811a83e5:	49 8b f7             	mov    %r15,%rsi
    7fa4811a83e8:	48 8b f8             	mov    %rax,%rdi
    7fa4811a83eb:	48 89 45 80          	mov    %rax,-0x80(%rbp)
    7fa4811a83ef:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a83f4:	e8 5f fe ff ff       	callq  0x7fa4811a8258
    7fa4811a83f9:	49 8b f7             	mov    %r15,%rsi
    7fa4811a83fc:	48 8b f8             	mov    %rax,%rdi
    7fa4811a83ff:	48 89 85 78 ff ff ff 	mov    %rax,-0x88(%rbp)
    7fa4811a8406:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a840b:	e8 48 fe ff ff       	callq  0x7fa4811a8258
    7fa4811a8410:	49 8b f7             	mov    %r15,%rsi
    7fa4811a8413:	48 8b f8             	mov    %rax,%rdi
    7fa4811a8416:	48 89 85 70 ff ff ff 	mov    %rax,-0x90(%rbp)
    7fa4811a841d:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a8422:	e8 31 fe ff ff       	callq  0x7fa4811a8258
    7fa4811a8427:	49 8b f7             	mov    %r15,%rsi
    7fa4811a842a:	48 8b f8             	mov    %rax,%rdi
    7fa4811a842d:	48 89 85 68 ff ff ff 	mov    %rax,-0x98(%rbp)
    7fa4811a8434:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a8439:	e8 1a fe ff ff       	callq  0x7fa4811a8258
    7fa4811a843e:	49 8b f7             	mov    %r15,%rsi
    7fa4811a8441:	48 8b f8             	mov    %rax,%rdi
    7fa4811a8444:	48 89 85 60 ff ff ff 	mov    %rax,-0xa0(%rbp)
    7fa4811a844b:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a8450:	e8 03 fe ff ff       	callq  0x7fa4811a8258
    7fa4811a8455:	49 8b f7             	mov    %r15,%rsi
    7fa4811a8458:	48 8b f8             	mov    %rax,%rdi
    7fa4811a845b:	48 89 85 58 ff ff ff 	mov    %rax,-0xa8(%rbp)
    7fa4811a8462:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a8467:	e8 ec fd ff ff       	callq  0x7fa4811a8258
    7fa4811a846c:	49 8b f7             	mov    %r15,%rsi
    7fa4811a846f:	48 8b f8             	mov    %rax,%rdi
    7fa4811a8472:	48 89 85 50 ff ff ff 	mov    %rax,-0xb0(%rbp)
    7fa4811a8479:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a847e:	e8 d5 fd ff ff       	callq  0x7fa4811a8258
    7fa4811a8483:	49 8b f7             	mov    %r15,%rsi
    7fa4811a8486:	48 8b f8             	mov    %rax,%rdi
    7fa4811a8489:	48 89 85 48 ff ff ff 	mov    %rax,-0xb8(%rbp)
    7fa4811a8490:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a8495:	e8 be fd ff ff       	callq  0x7fa4811a8258
    7fa4811a849a:	49 8b f7             	mov    %r15,%rsi
    7fa4811a849d:	48 8b f8             	mov    %rax,%rdi
    7fa4811a84a0:	48 89 85 40 ff ff ff 	mov    %rax,-0xc0(%rbp)
    7fa4811a84a7:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a84ac:	e8 a7 fd ff ff       	callq  0x7fa4811a8258
    7fa4811a84b1:	49 8b f7             	mov    %r15,%rsi
    7fa4811a84b4:	48 8b f8             	mov    %rax,%rdi
    7fa4811a84b7:	48 89 85 38 ff ff ff 	mov    %rax,-0xc8(%rbp)
    7fa4811a84be:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a84c3:	e8 90 fd ff ff       	callq  0x7fa4811a8258
    7fa4811a84c8:	49 8b f7             	mov    %r15,%rsi
    7fa4811a84cb:	48 8b f8             	mov    %rax,%rdi
    7fa4811a84ce:	48 89 85 30 ff ff ff 	mov    %rax,-0xd0(%rbp)
    7fa4811a84d5:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a84da:	e8 79 fd ff ff       	callq  0x7fa4811a8258
    7fa4811a84df:	49 8b f7             	mov    %r15,%rsi
    7fa4811a84e2:	48 8b f8             	mov    %rax,%rdi
    7fa4811a84e5:	48 89 85 28 ff ff ff 	mov    %rax,-0xd8(%rbp)
    7fa4811a84ec:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a84f1:	e8 62 fd ff ff       	callq  0x7fa4811a8258
    7fa4811a84f6:	49 8b f7             	mov    %r15,%rsi
    7fa4811a84f9:	48 8b f8             	mov    %rax,%rdi
    7fa4811a84fc:	48 89 85 20 ff ff ff 	mov    %rax,-0xe0(%rbp)
    7fa4811a8503:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a8508:	e8 4b fd ff ff       	callq  0x7fa4811a8258
    7fa4811a850d:	49 8b f7             	mov    %r15,%rsi
    7fa4811a8510:	48 8b f8             	mov    %rax,%rdi
    7fa4811a8513:	48 89 85 18 ff ff ff 	mov    %rax,-0xe8(%rbp)
    7fa4811a851a:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a851f:	e8 34 fd ff ff       	callq  0x7fa4811a8258
    7fa4811a8524:	49 8b f7             	mov    %r15,%rsi
    7fa4811a8527:	48 8b f8             	mov    %rax,%rdi
    7fa4811a852a:	48 89 85 10 ff ff ff 	mov    %rax,-0xf0(%rbp)
    7fa4811a8531:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a8536:	e8 1d fd ff ff       	callq  0x7fa4811a8258
    7fa4811a853b:	49 8b f7             	mov    %r15,%rsi
    7fa4811a853e:	48 8b f8             	mov    %rax,%rdi
    7fa4811a8541:	48 89 85 08 ff ff ff 	mov    %rax,-0xf8(%rbp)
    7fa4811a8548:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a854d:	e8 06 fd ff ff       	callq  0x7fa4811a8258
    7fa4811a8552:	49 8b f7             	mov    %r15,%rsi
    7fa4811a8555:	48 8b f8             	mov    %rax,%rdi
    7fa4811a8558:	48 89 85 00 ff ff ff 	mov    %rax,-0x100(%rbp)
    7fa4811a855f:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a8564:	e8 ef fc ff ff       	callq  0x7fa4811a8258
    7fa4811a8569:	49 8b f7             	mov    %r15,%rsi
    7fa4811a856c:	48 8b f8             	mov    %rax,%rdi
    7fa4811a856f:	48 89 85 f8 fe ff ff 	mov    %rax,-0x108(%rbp)
    7fa4811a8576:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a857b:	e8 d8 fc ff ff       	callq  0x7fa4811a8258
    7fa4811a8580:	49 8b f7             	mov    %r15,%rsi
    7fa4811a8583:	48 8b f8             	mov    %rax,%rdi
    7fa4811a8586:	48 89 85 f0 fe ff ff 	mov    %rax,-0x110(%rbp)
    7fa4811a858d:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a8592:	e8 c1 fc ff ff       	callq  0x7fa4811a8258
    7fa4811a8597:	49 8b f7             	mov    %r15,%rsi
    7fa4811a859a:	48 8b f8             	mov    %rax,%rdi
    7fa4811a859d:	48 89 85 e8 fe ff ff 	mov    %rax,-0x118(%rbp)
    7fa4811a85a4:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a85a9:	e8 aa fc ff ff       	callq  0x7fa4811a8258
    7fa4811a85ae:	49 8b f7             	mov    %r15,%rsi
    7fa4811a85b1:	48 8b f8             	mov    %rax,%rdi
    7fa4811a85b4:	48 89 85 e0 fe ff ff 	mov    %rax,-0x120(%rbp)
    7fa4811a85bb:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a85c0:	e8 93 fc ff ff       	callq  0x7fa4811a8258
    7fa4811a85c5:	49 8b f7             	mov    %r15,%rsi
    7fa4811a85c8:	48 8b f8             	mov    %rax,%rdi
    7fa4811a85cb:	48 89 85 d8 fe ff ff 	mov    %rax,-0x128(%rbp)
    7fa4811a85d2:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a85d7:	e8 7c fc ff ff       	callq  0x7fa4811a8258
    7fa4811a85dc:	49 8b f7             	mov    %r15,%rsi
    7fa4811a85df:	48 8b f8             	mov    %rax,%rdi
    7fa4811a85e2:	48 89 85 d0 fe ff ff 	mov    %rax,-0x130(%rbp)
    7fa4811a85e9:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a85ee:	e8 65 fc ff ff       	callq  0x7fa4811a8258
    7fa4811a85f3:	49 8b f7             	mov    %r15,%rsi
    7fa4811a85f6:	48 8b f8             	mov    %rax,%rdi
    7fa4811a85f9:	48 89 85 c8 fe ff ff 	mov    %rax,-0x138(%rbp)
    7fa4811a8600:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a8605:	e8 4e fc ff ff       	callq  0x7fa4811a8258
    7fa4811a860a:	49 8b f7             	mov    %r15,%rsi
    7fa4811a860d:	48 8b f8             	mov    %rax,%rdi
    7fa4811a8610:	48 89 85 c0 fe ff ff 	mov    %rax,-0x140(%rbp)
    7fa4811a8617:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a861c:	e8 37 fc ff ff       	callq  0x7fa4811a8258
    7fa4811a8621:	49 8b f7             	mov    %r15,%rsi
    7fa4811a8624:	48 8b f8             	mov    %rax,%rdi
    7fa4811a8627:	48 89 85 b8 fe ff ff 	mov    %rax,-0x148(%rbp)
    7fa4811a862e:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a8633:	e8 20 fc ff ff       	callq  0x7fa4811a8258
    7fa4811a8638:	49 8b f7             	mov    %r15,%rsi
    7fa4811a863b:	48 8b f8             	mov    %rax,%rdi
    7fa4811a863e:	48 89 85 b0 fe ff ff 	mov    %rax,-0x150(%rbp)
    7fa4811a8645:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a864a:	e8 09 fc ff ff       	callq  0x7fa4811a8258
    7fa4811a864f:	49 8b f7             	mov    %r15,%rsi
    7fa4811a8652:	48 8b f8             	mov    %rax,%rdi
    7fa4811a8655:	48 89 85 a8 fe ff ff 	mov    %rax,-0x158(%rbp)
    7fa4811a865c:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a8661:	e8 f2 fb ff ff       	callq  0x7fa4811a8258
    7fa4811a8666:	49 8b f7             	mov    %r15,%rsi
    7fa4811a8669:	48 8b f8             	mov    %rax,%rdi
    7fa4811a866c:	48 89 85 a0 fe ff ff 	mov    %rax,-0x160(%rbp)
    7fa4811a8673:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a8678:	e8 db fb ff ff       	callq  0x7fa4811a8258
    7fa4811a867d:	49 8b f7             	mov    %r15,%rsi
    7fa4811a8680:	48 8b f8             	mov    %rax,%rdi
    7fa4811a8683:	48 89 85 98 fe ff ff 	mov    %rax,-0x168(%rbp)
    7fa4811a868a:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a868f:	e8 c4 fb ff ff       	callq  0x7fa4811a8258
    7fa4811a8694:	49 8b f7             	mov    %r15,%rsi
    7fa4811a8697:	48 8b f8             	mov    %rax,%rdi
    7fa4811a869a:	48 89 85 90 fe ff ff 	mov    %rax,-0x170(%rbp)
    7fa4811a86a1:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a86a6:	e8 ad fb ff ff       	callq  0x7fa4811a8258
    7fa4811a86ab:	49 8b f7             	mov    %r15,%rsi
    7fa4811a86ae:	48 8b f8             	mov    %rax,%rdi
    7fa4811a86b1:	48 89 85 88 fe ff ff 	mov    %rax,-0x178(%rbp)
    7fa4811a86b8:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a86bd:	e8 96 fb ff ff       	callq  0x7fa4811a8258
    7fa4811a86c2:	49 8b f7             	mov    %r15,%rsi
    7fa4811a86c5:	48 8b f8             	mov    %rax,%rdi
    7fa4811a86c8:	48 89 85 80 fe ff ff 	mov    %rax,-0x180(%rbp)
    7fa4811a86cf:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a86d4:	e8 7f fb ff ff       	callq  0x7fa4811a8258
    7fa4811a86d9:	49 8b f7             	mov    %r15,%rsi
    7fa4811a86dc:	48 8b f8             	mov    %rax,%rdi
    7fa4811a86df:	48 89 85 78 fe ff ff 	mov    %rax,-0x188(%rbp)
    7fa4811a86e6:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a86eb:	e8 68 fb ff ff       	callq  0x7fa4811a8258
    7fa4811a86f0:	49 8b f7             	mov    %r15,%rsi
    7fa4811a86f3:	48 8b f8             	mov    %rax,%rdi
    7fa4811a86f6:	48 89 85 70 fe ff ff 	mov    %rax,-0x190(%rbp)
    7fa4811a86fd:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a8702:	e8 51 fb ff ff       	callq  0x7fa4811a8258
    7fa4811a8707:	49 8b f7             	mov    %r15,%rsi
    7fa4811a870a:	48 8b f8             	mov    %rax,%rdi
    7fa4811a870d:	48 89 85 68 fe ff ff 	mov    %rax,-0x198(%rbp)
    7fa4811a8714:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a8719:	e8 3a fb ff ff       	callq  0x7fa4811a8258
    7fa4811a871e:	49 8b f7             	mov    %r15,%rsi
    7fa4811a8721:	48 8b f8             	mov    %rax,%rdi
    7fa4811a8724:	48 89 85 60 fe ff ff 	mov    %rax,-0x1a0(%rbp)
    7fa4811a872b:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a8730:	e8 23 fb ff ff       	callq  0x7fa4811a8258
    7fa4811a8735:	49 8b f7             	mov    %r15,%rsi
    7fa4811a8738:	48 8b f8             	mov    %rax,%rdi
    7fa4811a873b:	48 89 85 58 fe ff ff 	mov    %rax,-0x1a8(%rbp)
    7fa4811a8742:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a8747:	e8 0c fb ff ff       	callq  0x7fa4811a8258
    7fa4811a874c:	49 8b f7             	mov    %r15,%rsi
    7fa4811a874f:	48 8b f8             	mov    %rax,%rdi
    7fa4811a8752:	48 89 85 50 fe ff ff 	mov    %rax,-0x1b0(%rbp)
    7fa4811a8759:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a875e:	e8 f5 fa ff ff       	callq  0x7fa4811a8258
    7fa4811a8763:	49 8b f7             	mov    %r15,%rsi
    7fa4811a8766:	48 8b f8             	mov    %rax,%rdi
    7fa4811a8769:	48 89 85 48 fe ff ff 	mov    %rax,-0x1b8(%rbp)
    7fa4811a8770:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a8775:	e8 de fa ff ff       	callq  0x7fa4811a8258
    7fa4811a877a:	49 8b f7             	mov    %r15,%rsi
    7fa4811a877d:	48 8b f8             	mov    %rax,%rdi
    7fa4811a8780:	48 89 85 40 fe ff ff 	mov    %rax,-0x1c0(%rbp)
    7fa4811a8787:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a878c:	e8 c7 fa ff ff       	callq  0x7fa4811a8258
    7fa4811a8791:	49 8b f7             	mov    %r15,%rsi
    7fa4811a8794:	48 8b f8             	mov    %rax,%rdi
    7fa4811a8797:	48 89 85 38 fe ff ff 	mov    %rax,-0x1c8(%rbp)
    7fa4811a879e:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a87a3:	e8 b0 fa ff ff       	callq  0x7fa4811a8258
    7fa4811a87a8:	49 8b f7             	mov    %r15,%rsi
    7fa4811a87ab:	48 8b f8             	mov    %rax,%rdi
    7fa4811a87ae:	48 89 85 30 fe ff ff 	mov    %rax,-0x1d0(%rbp)
    7fa4811a87b5:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a87ba:	e8 99 fa ff ff       	callq  0x7fa4811a8258
    7fa4811a87bf:	49 8b f7             	mov    %r15,%rsi
    7fa4811a87c2:	48 8b f8             	mov    %rax,%rdi
    7fa4811a87c5:	48 89 85 28 fe ff ff 	mov    %rax,-0x1d8(%rbp)
    7fa4811a87cc:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a87d1:	e8 82 fa ff ff       	callq  0x7fa4811a8258
    7fa4811a87d6:	49 8b f7             	mov    %r15,%rsi
    7fa4811a87d9:	48 8b f8             	mov    %rax,%rdi
    7fa4811a87dc:	48 89 85 20 fe ff ff 	mov    %rax,-0x1e0(%rbp)
    7fa4811a87e3:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a87e8:	e8 6b fa ff ff       	callq  0x7fa4811a8258
    7fa4811a87ed:	49 8b f7             	mov    %r15,%rsi
    7fa4811a87f0:	48 8b f8             	mov    %rax,%rdi
    7fa4811a87f3:	48 89 85 18 fe ff ff 	mov    %rax,-0x1e8(%rbp)
    7fa4811a87fa:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a87ff:	e8 54 fa ff ff       	callq  0x7fa4811a8258
    7fa4811a8804:	49 8b f7             	mov    %r15,%rsi
    7fa4811a8807:	48 8b f8             	mov    %rax,%rdi
    7fa4811a880a:	48 89 85 10 fe ff ff 	mov    %rax,-0x1f0(%rbp)
    7fa4811a8811:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a8816:	e8 3d fa ff ff       	callq  0x7fa4811a8258
    7fa4811a881b:	49 8b f7             	mov    %r15,%rsi
    7fa4811a881e:	48 8b f8             	mov    %rax,%rdi
    7fa4811a8821:	48 89 85 08 fe ff ff 	mov    %rax,-0x1f8(%rbp)
    7fa4811a8828:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a882d:	e8 26 fa ff ff       	callq  0x7fa4811a8258
    7fa4811a8832:	49 8b f7             	mov    %r15,%rsi
    7fa4811a8835:	48 8b f8             	mov    %rax,%rdi
    7fa4811a8838:	48 89 85 00 fe ff ff 	mov    %rax,-0x200(%rbp)
    7fa4811a883f:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a8844:	e8 0f fa ff ff       	callq  0x7fa4811a8258
    7fa4811a8849:	49 8b f7             	mov    %r15,%rsi
    7fa4811a884c:	48 8b f8             	mov    %rax,%rdi
    7fa4811a884f:	48 89 85 f8 fd ff ff 	mov    %rax,-0x208(%rbp)
    7fa4811a8856:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a885b:	e8 f8 f9 ff ff       	callq  0x7fa4811a8258
    7fa4811a8860:	49 8b f7             	mov    %r15,%rsi
    7fa4811a8863:	48 8b f8             	mov    %rax,%rdi
    7fa4811a8866:	48 89 85 f0 fd ff ff 	mov    %rax,-0x210(%rbp)
    7fa4811a886d:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a8872:	e8 e1 f9 ff ff       	callq  0x7fa4811a8258
    7fa4811a8877:	49 8b f7             	mov    %r15,%rsi
    7fa4811a887a:	48 8b f8             	mov    %rax,%rdi
    7fa4811a887d:	48 89 85 e8 fd ff ff 	mov    %rax,-0x218(%rbp)
    7fa4811a8884:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a8889:	e8 ca f9 ff ff       	callq  0x7fa4811a8258
    7fa4811a888e:	49 8b f7             	mov    %r15,%rsi
    7fa4811a8891:	48 8b f8             	mov    %rax,%rdi
    7fa4811a8894:	48 89 85 e0 fd ff ff 	mov    %rax,-0x220(%rbp)
    7fa4811a889b:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a88a0:	e8 b3 f9 ff ff       	callq  0x7fa4811a8258
    7fa4811a88a5:	49 8b f7             	mov    %r15,%rsi
    7fa4811a88a8:	48 8b f8             	mov    %rax,%rdi
    7fa4811a88ab:	48 89 85 d8 fd ff ff 	mov    %rax,-0x228(%rbp)
    7fa4811a88b2:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a88b7:	e8 9c f9 ff ff       	callq  0x7fa4811a8258
    7fa4811a88bc:	49 8b f7             	mov    %r15,%rsi
    7fa4811a88bf:	48 8b f8             	mov    %rax,%rdi
    7fa4811a88c2:	48 89 85 d0 fd ff ff 	mov    %rax,-0x230(%rbp)
    7fa4811a88c9:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a88ce:	e8 85 f9 ff ff       	callq  0x7fa4811a8258
    7fa4811a88d3:	49 8b f7             	mov    %r15,%rsi
    7fa4811a88d6:	48 8b f8             	mov    %rax,%rdi
    7fa4811a88d9:	48 89 85 c8 fd ff ff 	mov    %rax,-0x238(%rbp)
    7fa4811a88e0:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a88e5:	e8 6e f9 ff ff       	callq  0x7fa4811a8258
    7fa4811a88ea:	49 8b f7             	mov    %r15,%rsi
    7fa4811a88ed:	48 8b f8             	mov    %rax,%rdi
    7fa4811a88f0:	48 89 85 c0 fd ff ff 	mov    %rax,-0x240(%rbp)
    7fa4811a88f7:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a88fc:	e8 57 f9 ff ff       	callq  0x7fa4811a8258
    7fa4811a8901:	49 8b f7             	mov    %r15,%rsi
    7fa4811a8904:	48 8b f8             	mov    %rax,%rdi
    7fa4811a8907:	48 89 85 b8 fd ff ff 	mov    %rax,-0x248(%rbp)
    7fa4811a890e:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a8913:	e8 40 f9 ff ff       	callq  0x7fa4811a8258
    7fa4811a8918:	49 8b f7             	mov    %r15,%rsi
    7fa4811a891b:	48 8b f8             	mov    %rax,%rdi
    7fa4811a891e:	48 89 85 b0 fd ff ff 	mov    %rax,-0x250(%rbp)
    7fa4811a8925:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a892a:	e8 29 f9 ff ff       	callq  0x7fa4811a8258
    7fa4811a892f:	49 8b f7             	mov    %r15,%rsi
    7fa4811a8932:	48 8b f8             	mov    %rax,%rdi
    7fa4811a8935:	48 89 85 a8 fd ff ff 	mov    %rax,-0x258(%rbp)
    7fa4811a893c:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a8941:	e8 12 f9 ff ff       	callq  0x7fa4811a8258
    7fa4811a8946:	49 8b f7             	mov    %r15,%rsi
    7fa4811a8949:	48 8b f8             	mov    %rax,%rdi
    7fa4811a894c:	48 89 85 a0 fd ff ff 	mov    %rax,-0x260(%rbp)
    7fa4811a8953:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a8958:	e8 fb f8 ff ff       	callq  0x7fa4811a8258
    7fa4811a895d:	49 8b f7             	mov    %r15,%rsi
    7fa4811a8960:	48 8b f8             	mov    %rax,%rdi
    7fa4811a8963:	48 89 85 98 fd ff ff 	mov    %rax,-0x268(%rbp)
    7fa4811a896a:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a896f:	e8 e4 f8 ff ff       	callq  0x7fa4811a8258
    7fa4811a8974:	49 8b f7             	mov    %r15,%rsi
    7fa4811a8977:	48 8b f8             	mov    %rax,%rdi
    7fa4811a897a:	48 89 85 90 fd ff ff 	mov    %rax,-0x270(%rbp)
    7fa4811a8981:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a8986:	e8 cd f8 ff ff       	callq  0x7fa4811a8258
    7fa4811a898b:	49 8b f7             	mov    %r15,%rsi
    7fa4811a898e:	48 8b f8             	mov    %rax,%rdi
    7fa4811a8991:	48 89 85 88 fd ff ff 	mov    %rax,-0x278(%rbp)
    7fa4811a8998:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a899d:	e8 b6 f8 ff ff       	callq  0x7fa4811a8258
    7fa4811a89a2:	49 8b f7             	mov    %r15,%rsi
    7fa4811a89a5:	48 8b f8             	mov    %rax,%rdi
    7fa4811a89a8:	48 89 85 80 fd ff ff 	mov    %rax,-0x280(%rbp)
    7fa4811a89af:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a89b4:	e8 9f f8 ff ff       	callq  0x7fa4811a8258
    7fa4811a89b9:	49 8b f7             	mov    %r15,%rsi
    7fa4811a89bc:	48 8b f8             	mov    %rax,%rdi
    7fa4811a89bf:	48 89 85 78 fd ff ff 	mov    %rax,-0x288(%rbp)
    7fa4811a89c6:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a89cb:	e8 88 f8 ff ff       	callq  0x7fa4811a8258
    7fa4811a89d0:	49 8b f7             	mov    %r15,%rsi
    7fa4811a89d3:	48 8b f8             	mov    %rax,%rdi
    7fa4811a89d6:	48 89 85 70 fd ff ff 	mov    %rax,-0x290(%rbp)
    7fa4811a89dd:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a89e2:	e8 71 f8 ff ff       	callq  0x7fa4811a8258
    7fa4811a89e7:	49 8b f7             	mov    %r15,%rsi
    7fa4811a89ea:	48 8b f8             	mov    %rax,%rdi
    7fa4811a89ed:	48 89 85 68 fd ff ff 	mov    %rax,-0x298(%rbp)
    7fa4811a89f4:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a89f9:	e8 5a f8 ff ff       	callq  0x7fa4811a8258
    7fa4811a89fe:	49 8b f7             	mov    %r15,%rsi
    7fa4811a8a01:	48 8b f8             	mov    %rax,%rdi
    7fa4811a8a04:	48 89 85 60 fd ff ff 	mov    %rax,-0x2a0(%rbp)
    7fa4811a8a0b:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a8a10:	e8 43 f8 ff ff       	callq  0x7fa4811a8258
    7fa4811a8a15:	49 8b f7             	mov    %r15,%rsi
    7fa4811a8a18:	48 8b f8             	mov    %rax,%rdi
    7fa4811a8a1b:	48 89 85 58 fd ff ff 	mov    %rax,-0x2a8(%rbp)
    7fa4811a8a22:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a8a27:	e8 2c f8 ff ff       	callq  0x7fa4811a8258
    7fa4811a8a2c:	49 8b f7             	mov    %r15,%rsi
    7fa4811a8a2f:	48 8b f8             	mov    %rax,%rdi
    7fa4811a8a32:	48 89 85 50 fd ff ff 	mov    %rax,-0x2b0(%rbp)
    7fa4811a8a39:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a8a3e:	e8 15 f8 ff ff       	callq  0x7fa4811a8258
    7fa4811a8a43:	49 8b f7             	mov    %r15,%rsi
    7fa4811a8a46:	48 8b f8             	mov    %rax,%rdi
    7fa4811a8a49:	48 89 85 48 fd ff ff 	mov    %rax,-0x2b8(%rbp)
    7fa4811a8a50:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a8a55:	e8 fe f7 ff ff       	callq  0x7fa4811a8258
    7fa4811a8a5a:	49 8b f7             	mov    %r15,%rsi
    7fa4811a8a5d:	48 8b f8             	mov    %rax,%rdi
    7fa4811a8a60:	48 89 85 40 fd ff ff 	mov    %rax,-0x2c0(%rbp)
    7fa4811a8a67:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a8a6c:	e8 e7 f7 ff ff       	callq  0x7fa4811a8258
    7fa4811a8a71:	49 8b f7             	mov    %r15,%rsi
    7fa4811a8a74:	48 8b f8             	mov    %rax,%rdi
    7fa4811a8a77:	48 89 85 38 fd ff ff 	mov    %rax,-0x2c8(%rbp)
    7fa4811a8a7e:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a8a83:	e8 d0 f7 ff ff       	callq  0x7fa4811a8258
    7fa4811a8a88:	49 8b f7             	mov    %r15,%rsi
    7fa4811a8a8b:	48 8b f8             	mov    %rax,%rdi
    7fa4811a8a8e:	48 89 85 30 fd ff ff 	mov    %rax,-0x2d0(%rbp)
    7fa4811a8a95:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a8a9a:	e8 b9 f7 ff ff       	callq  0x7fa4811a8258
    7fa4811a8a9f:	49 8b f7             	mov    %r15,%rsi
    7fa4811a8aa2:	48 8b f8             	mov    %rax,%rdi
    7fa4811a8aa5:	48 89 85 28 fd ff ff 	mov    %rax,-0x2d8(%rbp)
    7fa4811a8aac:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a8ab1:	e8 a2 f7 ff ff       	callq  0x7fa4811a8258
    7fa4811a8ab6:	49 8b f7             	mov    %r15,%rsi
    7fa4811a8ab9:	48 8b f8             	mov    %rax,%rdi
    7fa4811a8abc:	48 89 85 20 fd ff ff 	mov    %rax,-0x2e0(%rbp)
    7fa4811a8ac3:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a8ac8:	e8 8b f7 ff ff       	callq  0x7fa4811a8258
    7fa4811a8acd:	49 8b f7             	mov    %r15,%rsi
    7fa4811a8ad0:	48 8b f8             	mov    %rax,%rdi
    7fa4811a8ad3:	48 89 85 18 fd ff ff 	mov    %rax,-0x2e8(%rbp)
    7fa4811a8ada:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a8adf:	e8 74 f7 ff ff       	callq  0x7fa4811a8258
    7fa4811a8ae4:	49 8b f7             	mov    %r15,%rsi
    7fa4811a8ae7:	48 8b f8             	mov    %rax,%rdi
    7fa4811a8aea:	48 89 85 10 fd ff ff 	mov    %rax,-0x2f0(%rbp)
    7fa4811a8af1:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a8af6:	e8 5d f7 ff ff       	callq  0x7fa4811a8258
    7fa4811a8afb:	49 8b f7             	mov    %r15,%rsi
    7fa4811a8afe:	48 8b f8             	mov    %rax,%rdi
    7fa4811a8b01:	48 89 85 08 fd ff ff 	mov    %rax,-0x2f8(%rbp)
    7fa4811a8b08:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a8b0d:	e8 46 f7 ff ff       	callq  0x7fa4811a8258
    7fa4811a8b12:	49 8b f7             	mov    %r15,%rsi
    7fa4811a8b15:	48 8b f8             	mov    %rax,%rdi
    7fa4811a8b18:	48 89 85 00 fd ff ff 	mov    %rax,-0x300(%rbp)
    7fa4811a8b1f:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a8b24:	e8 2f f7 ff ff       	callq  0x7fa4811a8258
    7fa4811a8b29:	49 8b f7             	mov    %r15,%rsi
    7fa4811a8b2c:	48 8b f8             	mov    %rax,%rdi
    7fa4811a8b2f:	48 89 85 f8 fc ff ff 	mov    %rax,-0x308(%rbp)
    7fa4811a8b36:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a8b3b:	e8 18 f7 ff ff       	callq  0x7fa4811a8258
    7fa4811a8b40:	49 8b f7             	mov    %r15,%rsi
    7fa4811a8b43:	48 8b f8             	mov    %rax,%rdi
    7fa4811a8b46:	48 89 85 f0 fc ff ff 	mov    %rax,-0x310(%rbp)
    7fa4811a8b4d:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a8b52:	e8 01 f7 ff ff       	callq  0x7fa4811a8258
    7fa4811a8b57:	49 8b f7             	mov    %r15,%rsi
    7fa4811a8b5a:	48 8b f8             	mov    %rax,%rdi
    7fa4811a8b5d:	48 89 85 e8 fc ff ff 	mov    %rax,-0x318(%rbp)
    7fa4811a8b64:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a8b69:	e8 ea f6 ff ff       	callq  0x7fa4811a8258
    7fa4811a8b6e:	49 8b f7             	mov    %r15,%rsi
    7fa4811a8b71:	48 8b f8             	mov    %rax,%rdi
    7fa4811a8b74:	48 89 85 e0 fc ff ff 	mov    %rax,-0x320(%rbp)
    7fa4811a8b7b:	b8 08 00 00 00       	mov    $0x8,%eax
    7fa4811a8b80:	e8 d3 f6 ff ff       	callq  0x7fa4811a8258
    7fa4811a8b85:	4c 8b 3c 24          	mov    (%rsp),%r15
    7fa4811a8b89:	48 8b e5             	mov    %rbp,%rsp
    7fa4811a8b8c:	5d                   	pop    %rbp
    7fa4811a8b8d:	c3                   	retq   

end

