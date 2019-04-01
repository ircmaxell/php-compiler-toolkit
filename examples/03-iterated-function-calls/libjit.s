function add(long, long) : long

/tmp/libjit-dump.o:     file format elf64-x86-64


Disassembly of section .text:

00007f74325fa258 <.text>:
    7f74325fa258:	55                   	push   %rbp
    7f74325fa259:	48 8b ec             	mov    %rsp,%rbp
    7f74325fa25c:	48 83 ec 10          	sub    $0x10,%rsp
    7f74325fa260:	48 89 7d f8          	mov    %rdi,-0x8(%rbp)
    7f74325fa264:	48 89 75 f0          	mov    %rsi,-0x10(%rbp)
    7f74325fa268:	48 8b 45 f8          	mov    -0x8(%rbp),%rax
    7f74325fa26c:	48 03 45 f0          	add    -0x10(%rbp),%rax
    7f74325fa270:	48 8b e5             	mov    %rbp,%rsp
    7f74325fa273:	5d                   	pop    %rbp
    7f74325fa274:	c3                   	retq   

end

function add100(long, long) : long

/tmp/libjit-dump.o:     file format elf64-x86-64


Disassembly of section .text:

00007f74325fa2a6 <.text>:
    7f74325fa2a6:	55                   	push   %rbp
    7f74325fa2a7:	48 8b ec             	mov    %rsp,%rbp
    7f74325fa2aa:	48 81 ec 30 03 00 00 	sub    $0x330,%rsp
    7f74325fa2b1:	4c 89 3c 24          	mov    %r15,(%rsp)
    7f74325fa2b5:	48 89 7d f8          	mov    %rdi,-0x8(%rbp)
    7f74325fa2b9:	4c 8b fe             	mov    %rsi,%r15
    7f74325fa2bc:	49 8b f7             	mov    %r15,%rsi
    7f74325fa2bf:	48 8b 7d f8          	mov    -0x8(%rbp),%rdi
    7f74325fa2c3:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa2c8:	e8 8b ff ff ff       	callq  0x7f74325fa258
    7f74325fa2cd:	49 8b f7             	mov    %r15,%rsi
    7f74325fa2d0:	48 8b f8             	mov    %rax,%rdi
    7f74325fa2d3:	48 89 45 f0          	mov    %rax,-0x10(%rbp)
    7f74325fa2d7:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa2dc:	e8 77 ff ff ff       	callq  0x7f74325fa258
    7f74325fa2e1:	49 8b f7             	mov    %r15,%rsi
    7f74325fa2e4:	48 8b f8             	mov    %rax,%rdi
    7f74325fa2e7:	48 89 45 e8          	mov    %rax,-0x18(%rbp)
    7f74325fa2eb:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa2f0:	e8 63 ff ff ff       	callq  0x7f74325fa258
    7f74325fa2f5:	49 8b f7             	mov    %r15,%rsi
    7f74325fa2f8:	48 8b f8             	mov    %rax,%rdi
    7f74325fa2fb:	48 89 45 e0          	mov    %rax,-0x20(%rbp)
    7f74325fa2ff:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa304:	e8 4f ff ff ff       	callq  0x7f74325fa258
    7f74325fa309:	49 8b f7             	mov    %r15,%rsi
    7f74325fa30c:	48 8b f8             	mov    %rax,%rdi
    7f74325fa30f:	48 89 45 d8          	mov    %rax,-0x28(%rbp)
    7f74325fa313:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa318:	e8 3b ff ff ff       	callq  0x7f74325fa258
    7f74325fa31d:	49 8b f7             	mov    %r15,%rsi
    7f74325fa320:	48 8b f8             	mov    %rax,%rdi
    7f74325fa323:	48 89 45 d0          	mov    %rax,-0x30(%rbp)
    7f74325fa327:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa32c:	e8 27 ff ff ff       	callq  0x7f74325fa258
    7f74325fa331:	49 8b f7             	mov    %r15,%rsi
    7f74325fa334:	48 8b f8             	mov    %rax,%rdi
    7f74325fa337:	48 89 45 c8          	mov    %rax,-0x38(%rbp)
    7f74325fa33b:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa340:	e8 13 ff ff ff       	callq  0x7f74325fa258
    7f74325fa345:	49 8b f7             	mov    %r15,%rsi
    7f74325fa348:	48 8b f8             	mov    %rax,%rdi
    7f74325fa34b:	48 89 45 c0          	mov    %rax,-0x40(%rbp)
    7f74325fa34f:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa354:	e8 ff fe ff ff       	callq  0x7f74325fa258
    7f74325fa359:	49 8b f7             	mov    %r15,%rsi
    7f74325fa35c:	48 8b f8             	mov    %rax,%rdi
    7f74325fa35f:	48 89 45 b8          	mov    %rax,-0x48(%rbp)
    7f74325fa363:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa368:	e8 eb fe ff ff       	callq  0x7f74325fa258
    7f74325fa36d:	49 8b f7             	mov    %r15,%rsi
    7f74325fa370:	48 8b f8             	mov    %rax,%rdi
    7f74325fa373:	48 89 45 b0          	mov    %rax,-0x50(%rbp)
    7f74325fa377:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa37c:	e8 d7 fe ff ff       	callq  0x7f74325fa258
    7f74325fa381:	49 8b f7             	mov    %r15,%rsi
    7f74325fa384:	48 8b f8             	mov    %rax,%rdi
    7f74325fa387:	48 89 45 a8          	mov    %rax,-0x58(%rbp)
    7f74325fa38b:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa390:	e8 c3 fe ff ff       	callq  0x7f74325fa258
    7f74325fa395:	49 8b f7             	mov    %r15,%rsi
    7f74325fa398:	48 8b f8             	mov    %rax,%rdi
    7f74325fa39b:	48 89 45 a0          	mov    %rax,-0x60(%rbp)
    7f74325fa39f:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa3a4:	e8 af fe ff ff       	callq  0x7f74325fa258
    7f74325fa3a9:	49 8b f7             	mov    %r15,%rsi
    7f74325fa3ac:	48 8b f8             	mov    %rax,%rdi
    7f74325fa3af:	48 89 45 98          	mov    %rax,-0x68(%rbp)
    7f74325fa3b3:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa3b8:	e8 9b fe ff ff       	callq  0x7f74325fa258
    7f74325fa3bd:	49 8b f7             	mov    %r15,%rsi
    7f74325fa3c0:	48 8b f8             	mov    %rax,%rdi
    7f74325fa3c3:	48 89 45 90          	mov    %rax,-0x70(%rbp)
    7f74325fa3c7:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa3cc:	e8 87 fe ff ff       	callq  0x7f74325fa258
    7f74325fa3d1:	49 8b f7             	mov    %r15,%rsi
    7f74325fa3d4:	48 8b f8             	mov    %rax,%rdi
    7f74325fa3d7:	48 89 45 88          	mov    %rax,-0x78(%rbp)
    7f74325fa3db:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa3e0:	e8 73 fe ff ff       	callq  0x7f74325fa258
    7f74325fa3e5:	49 8b f7             	mov    %r15,%rsi
    7f74325fa3e8:	48 8b f8             	mov    %rax,%rdi
    7f74325fa3eb:	48 89 45 80          	mov    %rax,-0x80(%rbp)
    7f74325fa3ef:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa3f4:	e8 5f fe ff ff       	callq  0x7f74325fa258
    7f74325fa3f9:	49 8b f7             	mov    %r15,%rsi
    7f74325fa3fc:	48 8b f8             	mov    %rax,%rdi
    7f74325fa3ff:	48 89 85 78 ff ff ff 	mov    %rax,-0x88(%rbp)
    7f74325fa406:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa40b:	e8 48 fe ff ff       	callq  0x7f74325fa258
    7f74325fa410:	49 8b f7             	mov    %r15,%rsi
    7f74325fa413:	48 8b f8             	mov    %rax,%rdi
    7f74325fa416:	48 89 85 70 ff ff ff 	mov    %rax,-0x90(%rbp)
    7f74325fa41d:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa422:	e8 31 fe ff ff       	callq  0x7f74325fa258
    7f74325fa427:	49 8b f7             	mov    %r15,%rsi
    7f74325fa42a:	48 8b f8             	mov    %rax,%rdi
    7f74325fa42d:	48 89 85 68 ff ff ff 	mov    %rax,-0x98(%rbp)
    7f74325fa434:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa439:	e8 1a fe ff ff       	callq  0x7f74325fa258
    7f74325fa43e:	49 8b f7             	mov    %r15,%rsi
    7f74325fa441:	48 8b f8             	mov    %rax,%rdi
    7f74325fa444:	48 89 85 60 ff ff ff 	mov    %rax,-0xa0(%rbp)
    7f74325fa44b:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa450:	e8 03 fe ff ff       	callq  0x7f74325fa258
    7f74325fa455:	49 8b f7             	mov    %r15,%rsi
    7f74325fa458:	48 8b f8             	mov    %rax,%rdi
    7f74325fa45b:	48 89 85 58 ff ff ff 	mov    %rax,-0xa8(%rbp)
    7f74325fa462:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa467:	e8 ec fd ff ff       	callq  0x7f74325fa258
    7f74325fa46c:	49 8b f7             	mov    %r15,%rsi
    7f74325fa46f:	48 8b f8             	mov    %rax,%rdi
    7f74325fa472:	48 89 85 50 ff ff ff 	mov    %rax,-0xb0(%rbp)
    7f74325fa479:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa47e:	e8 d5 fd ff ff       	callq  0x7f74325fa258
    7f74325fa483:	49 8b f7             	mov    %r15,%rsi
    7f74325fa486:	48 8b f8             	mov    %rax,%rdi
    7f74325fa489:	48 89 85 48 ff ff ff 	mov    %rax,-0xb8(%rbp)
    7f74325fa490:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa495:	e8 be fd ff ff       	callq  0x7f74325fa258
    7f74325fa49a:	49 8b f7             	mov    %r15,%rsi
    7f74325fa49d:	48 8b f8             	mov    %rax,%rdi
    7f74325fa4a0:	48 89 85 40 ff ff ff 	mov    %rax,-0xc0(%rbp)
    7f74325fa4a7:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa4ac:	e8 a7 fd ff ff       	callq  0x7f74325fa258
    7f74325fa4b1:	49 8b f7             	mov    %r15,%rsi
    7f74325fa4b4:	48 8b f8             	mov    %rax,%rdi
    7f74325fa4b7:	48 89 85 38 ff ff ff 	mov    %rax,-0xc8(%rbp)
    7f74325fa4be:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa4c3:	e8 90 fd ff ff       	callq  0x7f74325fa258
    7f74325fa4c8:	49 8b f7             	mov    %r15,%rsi
    7f74325fa4cb:	48 8b f8             	mov    %rax,%rdi
    7f74325fa4ce:	48 89 85 30 ff ff ff 	mov    %rax,-0xd0(%rbp)
    7f74325fa4d5:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa4da:	e8 79 fd ff ff       	callq  0x7f74325fa258
    7f74325fa4df:	49 8b f7             	mov    %r15,%rsi
    7f74325fa4e2:	48 8b f8             	mov    %rax,%rdi
    7f74325fa4e5:	48 89 85 28 ff ff ff 	mov    %rax,-0xd8(%rbp)
    7f74325fa4ec:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa4f1:	e8 62 fd ff ff       	callq  0x7f74325fa258
    7f74325fa4f6:	49 8b f7             	mov    %r15,%rsi
    7f74325fa4f9:	48 8b f8             	mov    %rax,%rdi
    7f74325fa4fc:	48 89 85 20 ff ff ff 	mov    %rax,-0xe0(%rbp)
    7f74325fa503:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa508:	e8 4b fd ff ff       	callq  0x7f74325fa258
    7f74325fa50d:	49 8b f7             	mov    %r15,%rsi
    7f74325fa510:	48 8b f8             	mov    %rax,%rdi
    7f74325fa513:	48 89 85 18 ff ff ff 	mov    %rax,-0xe8(%rbp)
    7f74325fa51a:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa51f:	e8 34 fd ff ff       	callq  0x7f74325fa258
    7f74325fa524:	49 8b f7             	mov    %r15,%rsi
    7f74325fa527:	48 8b f8             	mov    %rax,%rdi
    7f74325fa52a:	48 89 85 10 ff ff ff 	mov    %rax,-0xf0(%rbp)
    7f74325fa531:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa536:	e8 1d fd ff ff       	callq  0x7f74325fa258
    7f74325fa53b:	49 8b f7             	mov    %r15,%rsi
    7f74325fa53e:	48 8b f8             	mov    %rax,%rdi
    7f74325fa541:	48 89 85 08 ff ff ff 	mov    %rax,-0xf8(%rbp)
    7f74325fa548:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa54d:	e8 06 fd ff ff       	callq  0x7f74325fa258
    7f74325fa552:	49 8b f7             	mov    %r15,%rsi
    7f74325fa555:	48 8b f8             	mov    %rax,%rdi
    7f74325fa558:	48 89 85 00 ff ff ff 	mov    %rax,-0x100(%rbp)
    7f74325fa55f:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa564:	e8 ef fc ff ff       	callq  0x7f74325fa258
    7f74325fa569:	49 8b f7             	mov    %r15,%rsi
    7f74325fa56c:	48 8b f8             	mov    %rax,%rdi
    7f74325fa56f:	48 89 85 f8 fe ff ff 	mov    %rax,-0x108(%rbp)
    7f74325fa576:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa57b:	e8 d8 fc ff ff       	callq  0x7f74325fa258
    7f74325fa580:	49 8b f7             	mov    %r15,%rsi
    7f74325fa583:	48 8b f8             	mov    %rax,%rdi
    7f74325fa586:	48 89 85 f0 fe ff ff 	mov    %rax,-0x110(%rbp)
    7f74325fa58d:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa592:	e8 c1 fc ff ff       	callq  0x7f74325fa258
    7f74325fa597:	49 8b f7             	mov    %r15,%rsi
    7f74325fa59a:	48 8b f8             	mov    %rax,%rdi
    7f74325fa59d:	48 89 85 e8 fe ff ff 	mov    %rax,-0x118(%rbp)
    7f74325fa5a4:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa5a9:	e8 aa fc ff ff       	callq  0x7f74325fa258
    7f74325fa5ae:	49 8b f7             	mov    %r15,%rsi
    7f74325fa5b1:	48 8b f8             	mov    %rax,%rdi
    7f74325fa5b4:	48 89 85 e0 fe ff ff 	mov    %rax,-0x120(%rbp)
    7f74325fa5bb:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa5c0:	e8 93 fc ff ff       	callq  0x7f74325fa258
    7f74325fa5c5:	49 8b f7             	mov    %r15,%rsi
    7f74325fa5c8:	48 8b f8             	mov    %rax,%rdi
    7f74325fa5cb:	48 89 85 d8 fe ff ff 	mov    %rax,-0x128(%rbp)
    7f74325fa5d2:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa5d7:	e8 7c fc ff ff       	callq  0x7f74325fa258
    7f74325fa5dc:	49 8b f7             	mov    %r15,%rsi
    7f74325fa5df:	48 8b f8             	mov    %rax,%rdi
    7f74325fa5e2:	48 89 85 d0 fe ff ff 	mov    %rax,-0x130(%rbp)
    7f74325fa5e9:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa5ee:	e8 65 fc ff ff       	callq  0x7f74325fa258
    7f74325fa5f3:	49 8b f7             	mov    %r15,%rsi
    7f74325fa5f6:	48 8b f8             	mov    %rax,%rdi
    7f74325fa5f9:	48 89 85 c8 fe ff ff 	mov    %rax,-0x138(%rbp)
    7f74325fa600:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa605:	e8 4e fc ff ff       	callq  0x7f74325fa258
    7f74325fa60a:	49 8b f7             	mov    %r15,%rsi
    7f74325fa60d:	48 8b f8             	mov    %rax,%rdi
    7f74325fa610:	48 89 85 c0 fe ff ff 	mov    %rax,-0x140(%rbp)
    7f74325fa617:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa61c:	e8 37 fc ff ff       	callq  0x7f74325fa258
    7f74325fa621:	49 8b f7             	mov    %r15,%rsi
    7f74325fa624:	48 8b f8             	mov    %rax,%rdi
    7f74325fa627:	48 89 85 b8 fe ff ff 	mov    %rax,-0x148(%rbp)
    7f74325fa62e:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa633:	e8 20 fc ff ff       	callq  0x7f74325fa258
    7f74325fa638:	49 8b f7             	mov    %r15,%rsi
    7f74325fa63b:	48 8b f8             	mov    %rax,%rdi
    7f74325fa63e:	48 89 85 b0 fe ff ff 	mov    %rax,-0x150(%rbp)
    7f74325fa645:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa64a:	e8 09 fc ff ff       	callq  0x7f74325fa258
    7f74325fa64f:	49 8b f7             	mov    %r15,%rsi
    7f74325fa652:	48 8b f8             	mov    %rax,%rdi
    7f74325fa655:	48 89 85 a8 fe ff ff 	mov    %rax,-0x158(%rbp)
    7f74325fa65c:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa661:	e8 f2 fb ff ff       	callq  0x7f74325fa258
    7f74325fa666:	49 8b f7             	mov    %r15,%rsi
    7f74325fa669:	48 8b f8             	mov    %rax,%rdi
    7f74325fa66c:	48 89 85 a0 fe ff ff 	mov    %rax,-0x160(%rbp)
    7f74325fa673:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa678:	e8 db fb ff ff       	callq  0x7f74325fa258
    7f74325fa67d:	49 8b f7             	mov    %r15,%rsi
    7f74325fa680:	48 8b f8             	mov    %rax,%rdi
    7f74325fa683:	48 89 85 98 fe ff ff 	mov    %rax,-0x168(%rbp)
    7f74325fa68a:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa68f:	e8 c4 fb ff ff       	callq  0x7f74325fa258
    7f74325fa694:	49 8b f7             	mov    %r15,%rsi
    7f74325fa697:	48 8b f8             	mov    %rax,%rdi
    7f74325fa69a:	48 89 85 90 fe ff ff 	mov    %rax,-0x170(%rbp)
    7f74325fa6a1:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa6a6:	e8 ad fb ff ff       	callq  0x7f74325fa258
    7f74325fa6ab:	49 8b f7             	mov    %r15,%rsi
    7f74325fa6ae:	48 8b f8             	mov    %rax,%rdi
    7f74325fa6b1:	48 89 85 88 fe ff ff 	mov    %rax,-0x178(%rbp)
    7f74325fa6b8:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa6bd:	e8 96 fb ff ff       	callq  0x7f74325fa258
    7f74325fa6c2:	49 8b f7             	mov    %r15,%rsi
    7f74325fa6c5:	48 8b f8             	mov    %rax,%rdi
    7f74325fa6c8:	48 89 85 80 fe ff ff 	mov    %rax,-0x180(%rbp)
    7f74325fa6cf:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa6d4:	e8 7f fb ff ff       	callq  0x7f74325fa258
    7f74325fa6d9:	49 8b f7             	mov    %r15,%rsi
    7f74325fa6dc:	48 8b f8             	mov    %rax,%rdi
    7f74325fa6df:	48 89 85 78 fe ff ff 	mov    %rax,-0x188(%rbp)
    7f74325fa6e6:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa6eb:	e8 68 fb ff ff       	callq  0x7f74325fa258
    7f74325fa6f0:	49 8b f7             	mov    %r15,%rsi
    7f74325fa6f3:	48 8b f8             	mov    %rax,%rdi
    7f74325fa6f6:	48 89 85 70 fe ff ff 	mov    %rax,-0x190(%rbp)
    7f74325fa6fd:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa702:	e8 51 fb ff ff       	callq  0x7f74325fa258
    7f74325fa707:	49 8b f7             	mov    %r15,%rsi
    7f74325fa70a:	48 8b f8             	mov    %rax,%rdi
    7f74325fa70d:	48 89 85 68 fe ff ff 	mov    %rax,-0x198(%rbp)
    7f74325fa714:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa719:	e8 3a fb ff ff       	callq  0x7f74325fa258
    7f74325fa71e:	49 8b f7             	mov    %r15,%rsi
    7f74325fa721:	48 8b f8             	mov    %rax,%rdi
    7f74325fa724:	48 89 85 60 fe ff ff 	mov    %rax,-0x1a0(%rbp)
    7f74325fa72b:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa730:	e8 23 fb ff ff       	callq  0x7f74325fa258
    7f74325fa735:	49 8b f7             	mov    %r15,%rsi
    7f74325fa738:	48 8b f8             	mov    %rax,%rdi
    7f74325fa73b:	48 89 85 58 fe ff ff 	mov    %rax,-0x1a8(%rbp)
    7f74325fa742:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa747:	e8 0c fb ff ff       	callq  0x7f74325fa258
    7f74325fa74c:	49 8b f7             	mov    %r15,%rsi
    7f74325fa74f:	48 8b f8             	mov    %rax,%rdi
    7f74325fa752:	48 89 85 50 fe ff ff 	mov    %rax,-0x1b0(%rbp)
    7f74325fa759:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa75e:	e8 f5 fa ff ff       	callq  0x7f74325fa258
    7f74325fa763:	49 8b f7             	mov    %r15,%rsi
    7f74325fa766:	48 8b f8             	mov    %rax,%rdi
    7f74325fa769:	48 89 85 48 fe ff ff 	mov    %rax,-0x1b8(%rbp)
    7f74325fa770:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa775:	e8 de fa ff ff       	callq  0x7f74325fa258
    7f74325fa77a:	49 8b f7             	mov    %r15,%rsi
    7f74325fa77d:	48 8b f8             	mov    %rax,%rdi
    7f74325fa780:	48 89 85 40 fe ff ff 	mov    %rax,-0x1c0(%rbp)
    7f74325fa787:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa78c:	e8 c7 fa ff ff       	callq  0x7f74325fa258
    7f74325fa791:	49 8b f7             	mov    %r15,%rsi
    7f74325fa794:	48 8b f8             	mov    %rax,%rdi
    7f74325fa797:	48 89 85 38 fe ff ff 	mov    %rax,-0x1c8(%rbp)
    7f74325fa79e:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa7a3:	e8 b0 fa ff ff       	callq  0x7f74325fa258
    7f74325fa7a8:	49 8b f7             	mov    %r15,%rsi
    7f74325fa7ab:	48 8b f8             	mov    %rax,%rdi
    7f74325fa7ae:	48 89 85 30 fe ff ff 	mov    %rax,-0x1d0(%rbp)
    7f74325fa7b5:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa7ba:	e8 99 fa ff ff       	callq  0x7f74325fa258
    7f74325fa7bf:	49 8b f7             	mov    %r15,%rsi
    7f74325fa7c2:	48 8b f8             	mov    %rax,%rdi
    7f74325fa7c5:	48 89 85 28 fe ff ff 	mov    %rax,-0x1d8(%rbp)
    7f74325fa7cc:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa7d1:	e8 82 fa ff ff       	callq  0x7f74325fa258
    7f74325fa7d6:	49 8b f7             	mov    %r15,%rsi
    7f74325fa7d9:	48 8b f8             	mov    %rax,%rdi
    7f74325fa7dc:	48 89 85 20 fe ff ff 	mov    %rax,-0x1e0(%rbp)
    7f74325fa7e3:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa7e8:	e8 6b fa ff ff       	callq  0x7f74325fa258
    7f74325fa7ed:	49 8b f7             	mov    %r15,%rsi
    7f74325fa7f0:	48 8b f8             	mov    %rax,%rdi
    7f74325fa7f3:	48 89 85 18 fe ff ff 	mov    %rax,-0x1e8(%rbp)
    7f74325fa7fa:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa7ff:	e8 54 fa ff ff       	callq  0x7f74325fa258
    7f74325fa804:	49 8b f7             	mov    %r15,%rsi
    7f74325fa807:	48 8b f8             	mov    %rax,%rdi
    7f74325fa80a:	48 89 85 10 fe ff ff 	mov    %rax,-0x1f0(%rbp)
    7f74325fa811:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa816:	e8 3d fa ff ff       	callq  0x7f74325fa258
    7f74325fa81b:	49 8b f7             	mov    %r15,%rsi
    7f74325fa81e:	48 8b f8             	mov    %rax,%rdi
    7f74325fa821:	48 89 85 08 fe ff ff 	mov    %rax,-0x1f8(%rbp)
    7f74325fa828:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa82d:	e8 26 fa ff ff       	callq  0x7f74325fa258
    7f74325fa832:	49 8b f7             	mov    %r15,%rsi
    7f74325fa835:	48 8b f8             	mov    %rax,%rdi
    7f74325fa838:	48 89 85 00 fe ff ff 	mov    %rax,-0x200(%rbp)
    7f74325fa83f:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa844:	e8 0f fa ff ff       	callq  0x7f74325fa258
    7f74325fa849:	49 8b f7             	mov    %r15,%rsi
    7f74325fa84c:	48 8b f8             	mov    %rax,%rdi
    7f74325fa84f:	48 89 85 f8 fd ff ff 	mov    %rax,-0x208(%rbp)
    7f74325fa856:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa85b:	e8 f8 f9 ff ff       	callq  0x7f74325fa258
    7f74325fa860:	49 8b f7             	mov    %r15,%rsi
    7f74325fa863:	48 8b f8             	mov    %rax,%rdi
    7f74325fa866:	48 89 85 f0 fd ff ff 	mov    %rax,-0x210(%rbp)
    7f74325fa86d:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa872:	e8 e1 f9 ff ff       	callq  0x7f74325fa258
    7f74325fa877:	49 8b f7             	mov    %r15,%rsi
    7f74325fa87a:	48 8b f8             	mov    %rax,%rdi
    7f74325fa87d:	48 89 85 e8 fd ff ff 	mov    %rax,-0x218(%rbp)
    7f74325fa884:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa889:	e8 ca f9 ff ff       	callq  0x7f74325fa258
    7f74325fa88e:	49 8b f7             	mov    %r15,%rsi
    7f74325fa891:	48 8b f8             	mov    %rax,%rdi
    7f74325fa894:	48 89 85 e0 fd ff ff 	mov    %rax,-0x220(%rbp)
    7f74325fa89b:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa8a0:	e8 b3 f9 ff ff       	callq  0x7f74325fa258
    7f74325fa8a5:	49 8b f7             	mov    %r15,%rsi
    7f74325fa8a8:	48 8b f8             	mov    %rax,%rdi
    7f74325fa8ab:	48 89 85 d8 fd ff ff 	mov    %rax,-0x228(%rbp)
    7f74325fa8b2:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa8b7:	e8 9c f9 ff ff       	callq  0x7f74325fa258
    7f74325fa8bc:	49 8b f7             	mov    %r15,%rsi
    7f74325fa8bf:	48 8b f8             	mov    %rax,%rdi
    7f74325fa8c2:	48 89 85 d0 fd ff ff 	mov    %rax,-0x230(%rbp)
    7f74325fa8c9:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa8ce:	e8 85 f9 ff ff       	callq  0x7f74325fa258
    7f74325fa8d3:	49 8b f7             	mov    %r15,%rsi
    7f74325fa8d6:	48 8b f8             	mov    %rax,%rdi
    7f74325fa8d9:	48 89 85 c8 fd ff ff 	mov    %rax,-0x238(%rbp)
    7f74325fa8e0:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa8e5:	e8 6e f9 ff ff       	callq  0x7f74325fa258
    7f74325fa8ea:	49 8b f7             	mov    %r15,%rsi
    7f74325fa8ed:	48 8b f8             	mov    %rax,%rdi
    7f74325fa8f0:	48 89 85 c0 fd ff ff 	mov    %rax,-0x240(%rbp)
    7f74325fa8f7:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa8fc:	e8 57 f9 ff ff       	callq  0x7f74325fa258
    7f74325fa901:	49 8b f7             	mov    %r15,%rsi
    7f74325fa904:	48 8b f8             	mov    %rax,%rdi
    7f74325fa907:	48 89 85 b8 fd ff ff 	mov    %rax,-0x248(%rbp)
    7f74325fa90e:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa913:	e8 40 f9 ff ff       	callq  0x7f74325fa258
    7f74325fa918:	49 8b f7             	mov    %r15,%rsi
    7f74325fa91b:	48 8b f8             	mov    %rax,%rdi
    7f74325fa91e:	48 89 85 b0 fd ff ff 	mov    %rax,-0x250(%rbp)
    7f74325fa925:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa92a:	e8 29 f9 ff ff       	callq  0x7f74325fa258
    7f74325fa92f:	49 8b f7             	mov    %r15,%rsi
    7f74325fa932:	48 8b f8             	mov    %rax,%rdi
    7f74325fa935:	48 89 85 a8 fd ff ff 	mov    %rax,-0x258(%rbp)
    7f74325fa93c:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa941:	e8 12 f9 ff ff       	callq  0x7f74325fa258
    7f74325fa946:	49 8b f7             	mov    %r15,%rsi
    7f74325fa949:	48 8b f8             	mov    %rax,%rdi
    7f74325fa94c:	48 89 85 a0 fd ff ff 	mov    %rax,-0x260(%rbp)
    7f74325fa953:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa958:	e8 fb f8 ff ff       	callq  0x7f74325fa258
    7f74325fa95d:	49 8b f7             	mov    %r15,%rsi
    7f74325fa960:	48 8b f8             	mov    %rax,%rdi
    7f74325fa963:	48 89 85 98 fd ff ff 	mov    %rax,-0x268(%rbp)
    7f74325fa96a:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa96f:	e8 e4 f8 ff ff       	callq  0x7f74325fa258
    7f74325fa974:	49 8b f7             	mov    %r15,%rsi
    7f74325fa977:	48 8b f8             	mov    %rax,%rdi
    7f74325fa97a:	48 89 85 90 fd ff ff 	mov    %rax,-0x270(%rbp)
    7f74325fa981:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa986:	e8 cd f8 ff ff       	callq  0x7f74325fa258
    7f74325fa98b:	49 8b f7             	mov    %r15,%rsi
    7f74325fa98e:	48 8b f8             	mov    %rax,%rdi
    7f74325fa991:	48 89 85 88 fd ff ff 	mov    %rax,-0x278(%rbp)
    7f74325fa998:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa99d:	e8 b6 f8 ff ff       	callq  0x7f74325fa258
    7f74325fa9a2:	49 8b f7             	mov    %r15,%rsi
    7f74325fa9a5:	48 8b f8             	mov    %rax,%rdi
    7f74325fa9a8:	48 89 85 80 fd ff ff 	mov    %rax,-0x280(%rbp)
    7f74325fa9af:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa9b4:	e8 9f f8 ff ff       	callq  0x7f74325fa258
    7f74325fa9b9:	49 8b f7             	mov    %r15,%rsi
    7f74325fa9bc:	48 8b f8             	mov    %rax,%rdi
    7f74325fa9bf:	48 89 85 78 fd ff ff 	mov    %rax,-0x288(%rbp)
    7f74325fa9c6:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa9cb:	e8 88 f8 ff ff       	callq  0x7f74325fa258
    7f74325fa9d0:	49 8b f7             	mov    %r15,%rsi
    7f74325fa9d3:	48 8b f8             	mov    %rax,%rdi
    7f74325fa9d6:	48 89 85 70 fd ff ff 	mov    %rax,-0x290(%rbp)
    7f74325fa9dd:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa9e2:	e8 71 f8 ff ff       	callq  0x7f74325fa258
    7f74325fa9e7:	49 8b f7             	mov    %r15,%rsi
    7f74325fa9ea:	48 8b f8             	mov    %rax,%rdi
    7f74325fa9ed:	48 89 85 68 fd ff ff 	mov    %rax,-0x298(%rbp)
    7f74325fa9f4:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fa9f9:	e8 5a f8 ff ff       	callq  0x7f74325fa258
    7f74325fa9fe:	49 8b f7             	mov    %r15,%rsi
    7f74325faa01:	48 8b f8             	mov    %rax,%rdi
    7f74325faa04:	48 89 85 60 fd ff ff 	mov    %rax,-0x2a0(%rbp)
    7f74325faa0b:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325faa10:	e8 43 f8 ff ff       	callq  0x7f74325fa258
    7f74325faa15:	49 8b f7             	mov    %r15,%rsi
    7f74325faa18:	48 8b f8             	mov    %rax,%rdi
    7f74325faa1b:	48 89 85 58 fd ff ff 	mov    %rax,-0x2a8(%rbp)
    7f74325faa22:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325faa27:	e8 2c f8 ff ff       	callq  0x7f74325fa258
    7f74325faa2c:	49 8b f7             	mov    %r15,%rsi
    7f74325faa2f:	48 8b f8             	mov    %rax,%rdi
    7f74325faa32:	48 89 85 50 fd ff ff 	mov    %rax,-0x2b0(%rbp)
    7f74325faa39:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325faa3e:	e8 15 f8 ff ff       	callq  0x7f74325fa258
    7f74325faa43:	49 8b f7             	mov    %r15,%rsi
    7f74325faa46:	48 8b f8             	mov    %rax,%rdi
    7f74325faa49:	48 89 85 48 fd ff ff 	mov    %rax,-0x2b8(%rbp)
    7f74325faa50:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325faa55:	e8 fe f7 ff ff       	callq  0x7f74325fa258
    7f74325faa5a:	49 8b f7             	mov    %r15,%rsi
    7f74325faa5d:	48 8b f8             	mov    %rax,%rdi
    7f74325faa60:	48 89 85 40 fd ff ff 	mov    %rax,-0x2c0(%rbp)
    7f74325faa67:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325faa6c:	e8 e7 f7 ff ff       	callq  0x7f74325fa258
    7f74325faa71:	49 8b f7             	mov    %r15,%rsi
    7f74325faa74:	48 8b f8             	mov    %rax,%rdi
    7f74325faa77:	48 89 85 38 fd ff ff 	mov    %rax,-0x2c8(%rbp)
    7f74325faa7e:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325faa83:	e8 d0 f7 ff ff       	callq  0x7f74325fa258
    7f74325faa88:	49 8b f7             	mov    %r15,%rsi
    7f74325faa8b:	48 8b f8             	mov    %rax,%rdi
    7f74325faa8e:	48 89 85 30 fd ff ff 	mov    %rax,-0x2d0(%rbp)
    7f74325faa95:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325faa9a:	e8 b9 f7 ff ff       	callq  0x7f74325fa258
    7f74325faa9f:	49 8b f7             	mov    %r15,%rsi
    7f74325faaa2:	48 8b f8             	mov    %rax,%rdi
    7f74325faaa5:	48 89 85 28 fd ff ff 	mov    %rax,-0x2d8(%rbp)
    7f74325faaac:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325faab1:	e8 a2 f7 ff ff       	callq  0x7f74325fa258
    7f74325faab6:	49 8b f7             	mov    %r15,%rsi
    7f74325faab9:	48 8b f8             	mov    %rax,%rdi
    7f74325faabc:	48 89 85 20 fd ff ff 	mov    %rax,-0x2e0(%rbp)
    7f74325faac3:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325faac8:	e8 8b f7 ff ff       	callq  0x7f74325fa258
    7f74325faacd:	49 8b f7             	mov    %r15,%rsi
    7f74325faad0:	48 8b f8             	mov    %rax,%rdi
    7f74325faad3:	48 89 85 18 fd ff ff 	mov    %rax,-0x2e8(%rbp)
    7f74325faada:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325faadf:	e8 74 f7 ff ff       	callq  0x7f74325fa258
    7f74325faae4:	49 8b f7             	mov    %r15,%rsi
    7f74325faae7:	48 8b f8             	mov    %rax,%rdi
    7f74325faaea:	48 89 85 10 fd ff ff 	mov    %rax,-0x2f0(%rbp)
    7f74325faaf1:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325faaf6:	e8 5d f7 ff ff       	callq  0x7f74325fa258
    7f74325faafb:	49 8b f7             	mov    %r15,%rsi
    7f74325faafe:	48 8b f8             	mov    %rax,%rdi
    7f74325fab01:	48 89 85 08 fd ff ff 	mov    %rax,-0x2f8(%rbp)
    7f74325fab08:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fab0d:	e8 46 f7 ff ff       	callq  0x7f74325fa258
    7f74325fab12:	49 8b f7             	mov    %r15,%rsi
    7f74325fab15:	48 8b f8             	mov    %rax,%rdi
    7f74325fab18:	48 89 85 00 fd ff ff 	mov    %rax,-0x300(%rbp)
    7f74325fab1f:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fab24:	e8 2f f7 ff ff       	callq  0x7f74325fa258
    7f74325fab29:	49 8b f7             	mov    %r15,%rsi
    7f74325fab2c:	48 8b f8             	mov    %rax,%rdi
    7f74325fab2f:	48 89 85 f8 fc ff ff 	mov    %rax,-0x308(%rbp)
    7f74325fab36:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fab3b:	e8 18 f7 ff ff       	callq  0x7f74325fa258
    7f74325fab40:	49 8b f7             	mov    %r15,%rsi
    7f74325fab43:	48 8b f8             	mov    %rax,%rdi
    7f74325fab46:	48 89 85 f0 fc ff ff 	mov    %rax,-0x310(%rbp)
    7f74325fab4d:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fab52:	e8 01 f7 ff ff       	callq  0x7f74325fa258
    7f74325fab57:	49 8b f7             	mov    %r15,%rsi
    7f74325fab5a:	48 8b f8             	mov    %rax,%rdi
    7f74325fab5d:	48 89 85 e8 fc ff ff 	mov    %rax,-0x318(%rbp)
    7f74325fab64:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fab69:	e8 ea f6 ff ff       	callq  0x7f74325fa258
    7f74325fab6e:	49 8b f7             	mov    %r15,%rsi
    7f74325fab71:	48 8b f8             	mov    %rax,%rdi
    7f74325fab74:	48 89 85 e0 fc ff ff 	mov    %rax,-0x320(%rbp)
    7f74325fab7b:	b8 08 00 00 00       	mov    $0x8,%eax
    7f74325fab80:	e8 d3 f6 ff ff       	callq  0x7f74325fa258
    7f74325fab85:	4c 8b 3c 24          	mov    (%rsp),%r15
    7f74325fab89:	48 8b e5             	mov    %rbp,%rsp
    7f74325fab8c:	5d                   	pop    %rbp
    7f74325fab8d:	c3                   	retq   

end

