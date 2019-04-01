function add(long, long) : long

/tmp/libjit-dump.o:     file format elf64-x86-64


Disassembly of section .text:

00007f5b22adf258 <.text>:
    7f5b22adf258:	55                   	push   %rbp
    7f5b22adf259:	48 8b ec             	mov    %rsp,%rbp
    7f5b22adf25c:	48 83 ec 10          	sub    $0x10,%rsp
    7f5b22adf260:	48 89 7d f8          	mov    %rdi,-0x8(%rbp)
    7f5b22adf264:	48 89 75 f0          	mov    %rsi,-0x10(%rbp)
    7f5b22adf268:	48 8b 45 f8          	mov    -0x8(%rbp),%rax
    7f5b22adf26c:	48 03 45 f0          	add    -0x10(%rbp),%rax
    7f5b22adf270:	48 8b e5             	mov    %rbp,%rsp
    7f5b22adf273:	5d                   	pop    %rbp
    7f5b22adf274:	c3                   	retq   

end

function add100(long, long) : long

/tmp/libjit-dump.o:     file format elf64-x86-64


Disassembly of section .text:

00007f5b22adf2a6 <.text>:
    7f5b22adf2a6:	55                   	push   %rbp
    7f5b22adf2a7:	48 8b ec             	mov    %rsp,%rbp
    7f5b22adf2aa:	48 81 ec 30 03 00 00 	sub    $0x330,%rsp
    7f5b22adf2b1:	4c 89 3c 24          	mov    %r15,(%rsp)
    7f5b22adf2b5:	48 89 7d f8          	mov    %rdi,-0x8(%rbp)
    7f5b22adf2b9:	4c 8b fe             	mov    %rsi,%r15
    7f5b22adf2bc:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf2bf:	48 8b 7d f8          	mov    -0x8(%rbp),%rdi
    7f5b22adf2c3:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf2c8:	e8 8b ff ff ff       	callq  0x7f5b22adf258
    7f5b22adf2cd:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf2d0:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf2d3:	48 89 45 f0          	mov    %rax,-0x10(%rbp)
    7f5b22adf2d7:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf2dc:	e8 77 ff ff ff       	callq  0x7f5b22adf258
    7f5b22adf2e1:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf2e4:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf2e7:	48 89 45 e8          	mov    %rax,-0x18(%rbp)
    7f5b22adf2eb:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf2f0:	e8 63 ff ff ff       	callq  0x7f5b22adf258
    7f5b22adf2f5:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf2f8:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf2fb:	48 89 45 e0          	mov    %rax,-0x20(%rbp)
    7f5b22adf2ff:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf304:	e8 4f ff ff ff       	callq  0x7f5b22adf258
    7f5b22adf309:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf30c:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf30f:	48 89 45 d8          	mov    %rax,-0x28(%rbp)
    7f5b22adf313:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf318:	e8 3b ff ff ff       	callq  0x7f5b22adf258
    7f5b22adf31d:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf320:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf323:	48 89 45 d0          	mov    %rax,-0x30(%rbp)
    7f5b22adf327:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf32c:	e8 27 ff ff ff       	callq  0x7f5b22adf258
    7f5b22adf331:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf334:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf337:	48 89 45 c8          	mov    %rax,-0x38(%rbp)
    7f5b22adf33b:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf340:	e8 13 ff ff ff       	callq  0x7f5b22adf258
    7f5b22adf345:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf348:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf34b:	48 89 45 c0          	mov    %rax,-0x40(%rbp)
    7f5b22adf34f:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf354:	e8 ff fe ff ff       	callq  0x7f5b22adf258
    7f5b22adf359:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf35c:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf35f:	48 89 45 b8          	mov    %rax,-0x48(%rbp)
    7f5b22adf363:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf368:	e8 eb fe ff ff       	callq  0x7f5b22adf258
    7f5b22adf36d:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf370:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf373:	48 89 45 b0          	mov    %rax,-0x50(%rbp)
    7f5b22adf377:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf37c:	e8 d7 fe ff ff       	callq  0x7f5b22adf258
    7f5b22adf381:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf384:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf387:	48 89 45 a8          	mov    %rax,-0x58(%rbp)
    7f5b22adf38b:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf390:	e8 c3 fe ff ff       	callq  0x7f5b22adf258
    7f5b22adf395:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf398:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf39b:	48 89 45 a0          	mov    %rax,-0x60(%rbp)
    7f5b22adf39f:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf3a4:	e8 af fe ff ff       	callq  0x7f5b22adf258
    7f5b22adf3a9:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf3ac:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf3af:	48 89 45 98          	mov    %rax,-0x68(%rbp)
    7f5b22adf3b3:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf3b8:	e8 9b fe ff ff       	callq  0x7f5b22adf258
    7f5b22adf3bd:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf3c0:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf3c3:	48 89 45 90          	mov    %rax,-0x70(%rbp)
    7f5b22adf3c7:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf3cc:	e8 87 fe ff ff       	callq  0x7f5b22adf258
    7f5b22adf3d1:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf3d4:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf3d7:	48 89 45 88          	mov    %rax,-0x78(%rbp)
    7f5b22adf3db:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf3e0:	e8 73 fe ff ff       	callq  0x7f5b22adf258
    7f5b22adf3e5:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf3e8:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf3eb:	48 89 45 80          	mov    %rax,-0x80(%rbp)
    7f5b22adf3ef:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf3f4:	e8 5f fe ff ff       	callq  0x7f5b22adf258
    7f5b22adf3f9:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf3fc:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf3ff:	48 89 85 78 ff ff ff 	mov    %rax,-0x88(%rbp)
    7f5b22adf406:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf40b:	e8 48 fe ff ff       	callq  0x7f5b22adf258
    7f5b22adf410:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf413:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf416:	48 89 85 70 ff ff ff 	mov    %rax,-0x90(%rbp)
    7f5b22adf41d:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf422:	e8 31 fe ff ff       	callq  0x7f5b22adf258
    7f5b22adf427:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf42a:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf42d:	48 89 85 68 ff ff ff 	mov    %rax,-0x98(%rbp)
    7f5b22adf434:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf439:	e8 1a fe ff ff       	callq  0x7f5b22adf258
    7f5b22adf43e:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf441:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf444:	48 89 85 60 ff ff ff 	mov    %rax,-0xa0(%rbp)
    7f5b22adf44b:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf450:	e8 03 fe ff ff       	callq  0x7f5b22adf258
    7f5b22adf455:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf458:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf45b:	48 89 85 58 ff ff ff 	mov    %rax,-0xa8(%rbp)
    7f5b22adf462:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf467:	e8 ec fd ff ff       	callq  0x7f5b22adf258
    7f5b22adf46c:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf46f:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf472:	48 89 85 50 ff ff ff 	mov    %rax,-0xb0(%rbp)
    7f5b22adf479:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf47e:	e8 d5 fd ff ff       	callq  0x7f5b22adf258
    7f5b22adf483:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf486:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf489:	48 89 85 48 ff ff ff 	mov    %rax,-0xb8(%rbp)
    7f5b22adf490:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf495:	e8 be fd ff ff       	callq  0x7f5b22adf258
    7f5b22adf49a:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf49d:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf4a0:	48 89 85 40 ff ff ff 	mov    %rax,-0xc0(%rbp)
    7f5b22adf4a7:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf4ac:	e8 a7 fd ff ff       	callq  0x7f5b22adf258
    7f5b22adf4b1:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf4b4:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf4b7:	48 89 85 38 ff ff ff 	mov    %rax,-0xc8(%rbp)
    7f5b22adf4be:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf4c3:	e8 90 fd ff ff       	callq  0x7f5b22adf258
    7f5b22adf4c8:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf4cb:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf4ce:	48 89 85 30 ff ff ff 	mov    %rax,-0xd0(%rbp)
    7f5b22adf4d5:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf4da:	e8 79 fd ff ff       	callq  0x7f5b22adf258
    7f5b22adf4df:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf4e2:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf4e5:	48 89 85 28 ff ff ff 	mov    %rax,-0xd8(%rbp)
    7f5b22adf4ec:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf4f1:	e8 62 fd ff ff       	callq  0x7f5b22adf258
    7f5b22adf4f6:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf4f9:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf4fc:	48 89 85 20 ff ff ff 	mov    %rax,-0xe0(%rbp)
    7f5b22adf503:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf508:	e8 4b fd ff ff       	callq  0x7f5b22adf258
    7f5b22adf50d:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf510:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf513:	48 89 85 18 ff ff ff 	mov    %rax,-0xe8(%rbp)
    7f5b22adf51a:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf51f:	e8 34 fd ff ff       	callq  0x7f5b22adf258
    7f5b22adf524:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf527:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf52a:	48 89 85 10 ff ff ff 	mov    %rax,-0xf0(%rbp)
    7f5b22adf531:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf536:	e8 1d fd ff ff       	callq  0x7f5b22adf258
    7f5b22adf53b:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf53e:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf541:	48 89 85 08 ff ff ff 	mov    %rax,-0xf8(%rbp)
    7f5b22adf548:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf54d:	e8 06 fd ff ff       	callq  0x7f5b22adf258
    7f5b22adf552:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf555:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf558:	48 89 85 00 ff ff ff 	mov    %rax,-0x100(%rbp)
    7f5b22adf55f:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf564:	e8 ef fc ff ff       	callq  0x7f5b22adf258
    7f5b22adf569:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf56c:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf56f:	48 89 85 f8 fe ff ff 	mov    %rax,-0x108(%rbp)
    7f5b22adf576:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf57b:	e8 d8 fc ff ff       	callq  0x7f5b22adf258
    7f5b22adf580:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf583:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf586:	48 89 85 f0 fe ff ff 	mov    %rax,-0x110(%rbp)
    7f5b22adf58d:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf592:	e8 c1 fc ff ff       	callq  0x7f5b22adf258
    7f5b22adf597:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf59a:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf59d:	48 89 85 e8 fe ff ff 	mov    %rax,-0x118(%rbp)
    7f5b22adf5a4:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf5a9:	e8 aa fc ff ff       	callq  0x7f5b22adf258
    7f5b22adf5ae:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf5b1:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf5b4:	48 89 85 e0 fe ff ff 	mov    %rax,-0x120(%rbp)
    7f5b22adf5bb:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf5c0:	e8 93 fc ff ff       	callq  0x7f5b22adf258
    7f5b22adf5c5:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf5c8:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf5cb:	48 89 85 d8 fe ff ff 	mov    %rax,-0x128(%rbp)
    7f5b22adf5d2:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf5d7:	e8 7c fc ff ff       	callq  0x7f5b22adf258
    7f5b22adf5dc:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf5df:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf5e2:	48 89 85 d0 fe ff ff 	mov    %rax,-0x130(%rbp)
    7f5b22adf5e9:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf5ee:	e8 65 fc ff ff       	callq  0x7f5b22adf258
    7f5b22adf5f3:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf5f6:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf5f9:	48 89 85 c8 fe ff ff 	mov    %rax,-0x138(%rbp)
    7f5b22adf600:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf605:	e8 4e fc ff ff       	callq  0x7f5b22adf258
    7f5b22adf60a:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf60d:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf610:	48 89 85 c0 fe ff ff 	mov    %rax,-0x140(%rbp)
    7f5b22adf617:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf61c:	e8 37 fc ff ff       	callq  0x7f5b22adf258
    7f5b22adf621:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf624:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf627:	48 89 85 b8 fe ff ff 	mov    %rax,-0x148(%rbp)
    7f5b22adf62e:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf633:	e8 20 fc ff ff       	callq  0x7f5b22adf258
    7f5b22adf638:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf63b:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf63e:	48 89 85 b0 fe ff ff 	mov    %rax,-0x150(%rbp)
    7f5b22adf645:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf64a:	e8 09 fc ff ff       	callq  0x7f5b22adf258
    7f5b22adf64f:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf652:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf655:	48 89 85 a8 fe ff ff 	mov    %rax,-0x158(%rbp)
    7f5b22adf65c:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf661:	e8 f2 fb ff ff       	callq  0x7f5b22adf258
    7f5b22adf666:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf669:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf66c:	48 89 85 a0 fe ff ff 	mov    %rax,-0x160(%rbp)
    7f5b22adf673:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf678:	e8 db fb ff ff       	callq  0x7f5b22adf258
    7f5b22adf67d:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf680:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf683:	48 89 85 98 fe ff ff 	mov    %rax,-0x168(%rbp)
    7f5b22adf68a:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf68f:	e8 c4 fb ff ff       	callq  0x7f5b22adf258
    7f5b22adf694:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf697:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf69a:	48 89 85 90 fe ff ff 	mov    %rax,-0x170(%rbp)
    7f5b22adf6a1:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf6a6:	e8 ad fb ff ff       	callq  0x7f5b22adf258
    7f5b22adf6ab:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf6ae:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf6b1:	48 89 85 88 fe ff ff 	mov    %rax,-0x178(%rbp)
    7f5b22adf6b8:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf6bd:	e8 96 fb ff ff       	callq  0x7f5b22adf258
    7f5b22adf6c2:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf6c5:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf6c8:	48 89 85 80 fe ff ff 	mov    %rax,-0x180(%rbp)
    7f5b22adf6cf:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf6d4:	e8 7f fb ff ff       	callq  0x7f5b22adf258
    7f5b22adf6d9:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf6dc:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf6df:	48 89 85 78 fe ff ff 	mov    %rax,-0x188(%rbp)
    7f5b22adf6e6:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf6eb:	e8 68 fb ff ff       	callq  0x7f5b22adf258
    7f5b22adf6f0:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf6f3:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf6f6:	48 89 85 70 fe ff ff 	mov    %rax,-0x190(%rbp)
    7f5b22adf6fd:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf702:	e8 51 fb ff ff       	callq  0x7f5b22adf258
    7f5b22adf707:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf70a:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf70d:	48 89 85 68 fe ff ff 	mov    %rax,-0x198(%rbp)
    7f5b22adf714:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf719:	e8 3a fb ff ff       	callq  0x7f5b22adf258
    7f5b22adf71e:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf721:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf724:	48 89 85 60 fe ff ff 	mov    %rax,-0x1a0(%rbp)
    7f5b22adf72b:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf730:	e8 23 fb ff ff       	callq  0x7f5b22adf258
    7f5b22adf735:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf738:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf73b:	48 89 85 58 fe ff ff 	mov    %rax,-0x1a8(%rbp)
    7f5b22adf742:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf747:	e8 0c fb ff ff       	callq  0x7f5b22adf258
    7f5b22adf74c:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf74f:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf752:	48 89 85 50 fe ff ff 	mov    %rax,-0x1b0(%rbp)
    7f5b22adf759:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf75e:	e8 f5 fa ff ff       	callq  0x7f5b22adf258
    7f5b22adf763:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf766:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf769:	48 89 85 48 fe ff ff 	mov    %rax,-0x1b8(%rbp)
    7f5b22adf770:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf775:	e8 de fa ff ff       	callq  0x7f5b22adf258
    7f5b22adf77a:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf77d:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf780:	48 89 85 40 fe ff ff 	mov    %rax,-0x1c0(%rbp)
    7f5b22adf787:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf78c:	e8 c7 fa ff ff       	callq  0x7f5b22adf258
    7f5b22adf791:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf794:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf797:	48 89 85 38 fe ff ff 	mov    %rax,-0x1c8(%rbp)
    7f5b22adf79e:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf7a3:	e8 b0 fa ff ff       	callq  0x7f5b22adf258
    7f5b22adf7a8:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf7ab:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf7ae:	48 89 85 30 fe ff ff 	mov    %rax,-0x1d0(%rbp)
    7f5b22adf7b5:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf7ba:	e8 99 fa ff ff       	callq  0x7f5b22adf258
    7f5b22adf7bf:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf7c2:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf7c5:	48 89 85 28 fe ff ff 	mov    %rax,-0x1d8(%rbp)
    7f5b22adf7cc:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf7d1:	e8 82 fa ff ff       	callq  0x7f5b22adf258
    7f5b22adf7d6:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf7d9:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf7dc:	48 89 85 20 fe ff ff 	mov    %rax,-0x1e0(%rbp)
    7f5b22adf7e3:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf7e8:	e8 6b fa ff ff       	callq  0x7f5b22adf258
    7f5b22adf7ed:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf7f0:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf7f3:	48 89 85 18 fe ff ff 	mov    %rax,-0x1e8(%rbp)
    7f5b22adf7fa:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf7ff:	e8 54 fa ff ff       	callq  0x7f5b22adf258
    7f5b22adf804:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf807:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf80a:	48 89 85 10 fe ff ff 	mov    %rax,-0x1f0(%rbp)
    7f5b22adf811:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf816:	e8 3d fa ff ff       	callq  0x7f5b22adf258
    7f5b22adf81b:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf81e:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf821:	48 89 85 08 fe ff ff 	mov    %rax,-0x1f8(%rbp)
    7f5b22adf828:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf82d:	e8 26 fa ff ff       	callq  0x7f5b22adf258
    7f5b22adf832:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf835:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf838:	48 89 85 00 fe ff ff 	mov    %rax,-0x200(%rbp)
    7f5b22adf83f:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf844:	e8 0f fa ff ff       	callq  0x7f5b22adf258
    7f5b22adf849:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf84c:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf84f:	48 89 85 f8 fd ff ff 	mov    %rax,-0x208(%rbp)
    7f5b22adf856:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf85b:	e8 f8 f9 ff ff       	callq  0x7f5b22adf258
    7f5b22adf860:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf863:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf866:	48 89 85 f0 fd ff ff 	mov    %rax,-0x210(%rbp)
    7f5b22adf86d:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf872:	e8 e1 f9 ff ff       	callq  0x7f5b22adf258
    7f5b22adf877:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf87a:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf87d:	48 89 85 e8 fd ff ff 	mov    %rax,-0x218(%rbp)
    7f5b22adf884:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf889:	e8 ca f9 ff ff       	callq  0x7f5b22adf258
    7f5b22adf88e:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf891:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf894:	48 89 85 e0 fd ff ff 	mov    %rax,-0x220(%rbp)
    7f5b22adf89b:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf8a0:	e8 b3 f9 ff ff       	callq  0x7f5b22adf258
    7f5b22adf8a5:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf8a8:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf8ab:	48 89 85 d8 fd ff ff 	mov    %rax,-0x228(%rbp)
    7f5b22adf8b2:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf8b7:	e8 9c f9 ff ff       	callq  0x7f5b22adf258
    7f5b22adf8bc:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf8bf:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf8c2:	48 89 85 d0 fd ff ff 	mov    %rax,-0x230(%rbp)
    7f5b22adf8c9:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf8ce:	e8 85 f9 ff ff       	callq  0x7f5b22adf258
    7f5b22adf8d3:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf8d6:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf8d9:	48 89 85 c8 fd ff ff 	mov    %rax,-0x238(%rbp)
    7f5b22adf8e0:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf8e5:	e8 6e f9 ff ff       	callq  0x7f5b22adf258
    7f5b22adf8ea:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf8ed:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf8f0:	48 89 85 c0 fd ff ff 	mov    %rax,-0x240(%rbp)
    7f5b22adf8f7:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf8fc:	e8 57 f9 ff ff       	callq  0x7f5b22adf258
    7f5b22adf901:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf904:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf907:	48 89 85 b8 fd ff ff 	mov    %rax,-0x248(%rbp)
    7f5b22adf90e:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf913:	e8 40 f9 ff ff       	callq  0x7f5b22adf258
    7f5b22adf918:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf91b:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf91e:	48 89 85 b0 fd ff ff 	mov    %rax,-0x250(%rbp)
    7f5b22adf925:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf92a:	e8 29 f9 ff ff       	callq  0x7f5b22adf258
    7f5b22adf92f:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf932:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf935:	48 89 85 a8 fd ff ff 	mov    %rax,-0x258(%rbp)
    7f5b22adf93c:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf941:	e8 12 f9 ff ff       	callq  0x7f5b22adf258
    7f5b22adf946:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf949:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf94c:	48 89 85 a0 fd ff ff 	mov    %rax,-0x260(%rbp)
    7f5b22adf953:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf958:	e8 fb f8 ff ff       	callq  0x7f5b22adf258
    7f5b22adf95d:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf960:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf963:	48 89 85 98 fd ff ff 	mov    %rax,-0x268(%rbp)
    7f5b22adf96a:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf96f:	e8 e4 f8 ff ff       	callq  0x7f5b22adf258
    7f5b22adf974:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf977:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf97a:	48 89 85 90 fd ff ff 	mov    %rax,-0x270(%rbp)
    7f5b22adf981:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf986:	e8 cd f8 ff ff       	callq  0x7f5b22adf258
    7f5b22adf98b:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf98e:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf991:	48 89 85 88 fd ff ff 	mov    %rax,-0x278(%rbp)
    7f5b22adf998:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf99d:	e8 b6 f8 ff ff       	callq  0x7f5b22adf258
    7f5b22adf9a2:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf9a5:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf9a8:	48 89 85 80 fd ff ff 	mov    %rax,-0x280(%rbp)
    7f5b22adf9af:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf9b4:	e8 9f f8 ff ff       	callq  0x7f5b22adf258
    7f5b22adf9b9:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf9bc:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf9bf:	48 89 85 78 fd ff ff 	mov    %rax,-0x288(%rbp)
    7f5b22adf9c6:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf9cb:	e8 88 f8 ff ff       	callq  0x7f5b22adf258
    7f5b22adf9d0:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf9d3:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf9d6:	48 89 85 70 fd ff ff 	mov    %rax,-0x290(%rbp)
    7f5b22adf9dd:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf9e2:	e8 71 f8 ff ff       	callq  0x7f5b22adf258
    7f5b22adf9e7:	49 8b f7             	mov    %r15,%rsi
    7f5b22adf9ea:	48 8b f8             	mov    %rax,%rdi
    7f5b22adf9ed:	48 89 85 68 fd ff ff 	mov    %rax,-0x298(%rbp)
    7f5b22adf9f4:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adf9f9:	e8 5a f8 ff ff       	callq  0x7f5b22adf258
    7f5b22adf9fe:	49 8b f7             	mov    %r15,%rsi
    7f5b22adfa01:	48 8b f8             	mov    %rax,%rdi
    7f5b22adfa04:	48 89 85 60 fd ff ff 	mov    %rax,-0x2a0(%rbp)
    7f5b22adfa0b:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adfa10:	e8 43 f8 ff ff       	callq  0x7f5b22adf258
    7f5b22adfa15:	49 8b f7             	mov    %r15,%rsi
    7f5b22adfa18:	48 8b f8             	mov    %rax,%rdi
    7f5b22adfa1b:	48 89 85 58 fd ff ff 	mov    %rax,-0x2a8(%rbp)
    7f5b22adfa22:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adfa27:	e8 2c f8 ff ff       	callq  0x7f5b22adf258
    7f5b22adfa2c:	49 8b f7             	mov    %r15,%rsi
    7f5b22adfa2f:	48 8b f8             	mov    %rax,%rdi
    7f5b22adfa32:	48 89 85 50 fd ff ff 	mov    %rax,-0x2b0(%rbp)
    7f5b22adfa39:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adfa3e:	e8 15 f8 ff ff       	callq  0x7f5b22adf258
    7f5b22adfa43:	49 8b f7             	mov    %r15,%rsi
    7f5b22adfa46:	48 8b f8             	mov    %rax,%rdi
    7f5b22adfa49:	48 89 85 48 fd ff ff 	mov    %rax,-0x2b8(%rbp)
    7f5b22adfa50:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adfa55:	e8 fe f7 ff ff       	callq  0x7f5b22adf258
    7f5b22adfa5a:	49 8b f7             	mov    %r15,%rsi
    7f5b22adfa5d:	48 8b f8             	mov    %rax,%rdi
    7f5b22adfa60:	48 89 85 40 fd ff ff 	mov    %rax,-0x2c0(%rbp)
    7f5b22adfa67:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adfa6c:	e8 e7 f7 ff ff       	callq  0x7f5b22adf258
    7f5b22adfa71:	49 8b f7             	mov    %r15,%rsi
    7f5b22adfa74:	48 8b f8             	mov    %rax,%rdi
    7f5b22adfa77:	48 89 85 38 fd ff ff 	mov    %rax,-0x2c8(%rbp)
    7f5b22adfa7e:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adfa83:	e8 d0 f7 ff ff       	callq  0x7f5b22adf258
    7f5b22adfa88:	49 8b f7             	mov    %r15,%rsi
    7f5b22adfa8b:	48 8b f8             	mov    %rax,%rdi
    7f5b22adfa8e:	48 89 85 30 fd ff ff 	mov    %rax,-0x2d0(%rbp)
    7f5b22adfa95:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adfa9a:	e8 b9 f7 ff ff       	callq  0x7f5b22adf258
    7f5b22adfa9f:	49 8b f7             	mov    %r15,%rsi
    7f5b22adfaa2:	48 8b f8             	mov    %rax,%rdi
    7f5b22adfaa5:	48 89 85 28 fd ff ff 	mov    %rax,-0x2d8(%rbp)
    7f5b22adfaac:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adfab1:	e8 a2 f7 ff ff       	callq  0x7f5b22adf258
    7f5b22adfab6:	49 8b f7             	mov    %r15,%rsi
    7f5b22adfab9:	48 8b f8             	mov    %rax,%rdi
    7f5b22adfabc:	48 89 85 20 fd ff ff 	mov    %rax,-0x2e0(%rbp)
    7f5b22adfac3:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adfac8:	e8 8b f7 ff ff       	callq  0x7f5b22adf258
    7f5b22adfacd:	49 8b f7             	mov    %r15,%rsi
    7f5b22adfad0:	48 8b f8             	mov    %rax,%rdi
    7f5b22adfad3:	48 89 85 18 fd ff ff 	mov    %rax,-0x2e8(%rbp)
    7f5b22adfada:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adfadf:	e8 74 f7 ff ff       	callq  0x7f5b22adf258
    7f5b22adfae4:	49 8b f7             	mov    %r15,%rsi
    7f5b22adfae7:	48 8b f8             	mov    %rax,%rdi
    7f5b22adfaea:	48 89 85 10 fd ff ff 	mov    %rax,-0x2f0(%rbp)
    7f5b22adfaf1:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adfaf6:	e8 5d f7 ff ff       	callq  0x7f5b22adf258
    7f5b22adfafb:	49 8b f7             	mov    %r15,%rsi
    7f5b22adfafe:	48 8b f8             	mov    %rax,%rdi
    7f5b22adfb01:	48 89 85 08 fd ff ff 	mov    %rax,-0x2f8(%rbp)
    7f5b22adfb08:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adfb0d:	e8 46 f7 ff ff       	callq  0x7f5b22adf258
    7f5b22adfb12:	49 8b f7             	mov    %r15,%rsi
    7f5b22adfb15:	48 8b f8             	mov    %rax,%rdi
    7f5b22adfb18:	48 89 85 00 fd ff ff 	mov    %rax,-0x300(%rbp)
    7f5b22adfb1f:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adfb24:	e8 2f f7 ff ff       	callq  0x7f5b22adf258
    7f5b22adfb29:	49 8b f7             	mov    %r15,%rsi
    7f5b22adfb2c:	48 8b f8             	mov    %rax,%rdi
    7f5b22adfb2f:	48 89 85 f8 fc ff ff 	mov    %rax,-0x308(%rbp)
    7f5b22adfb36:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adfb3b:	e8 18 f7 ff ff       	callq  0x7f5b22adf258
    7f5b22adfb40:	49 8b f7             	mov    %r15,%rsi
    7f5b22adfb43:	48 8b f8             	mov    %rax,%rdi
    7f5b22adfb46:	48 89 85 f0 fc ff ff 	mov    %rax,-0x310(%rbp)
    7f5b22adfb4d:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adfb52:	e8 01 f7 ff ff       	callq  0x7f5b22adf258
    7f5b22adfb57:	49 8b f7             	mov    %r15,%rsi
    7f5b22adfb5a:	48 8b f8             	mov    %rax,%rdi
    7f5b22adfb5d:	48 89 85 e8 fc ff ff 	mov    %rax,-0x318(%rbp)
    7f5b22adfb64:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adfb69:	e8 ea f6 ff ff       	callq  0x7f5b22adf258
    7f5b22adfb6e:	49 8b f7             	mov    %r15,%rsi
    7f5b22adfb71:	48 8b f8             	mov    %rax,%rdi
    7f5b22adfb74:	48 89 85 e0 fc ff ff 	mov    %rax,-0x320(%rbp)
    7f5b22adfb7b:	b8 08 00 00 00       	mov    $0x8,%eax
    7f5b22adfb80:	e8 d3 f6 ff ff       	callq  0x7f5b22adf258
    7f5b22adfb85:	4c 8b 3c 24          	mov    (%rsp),%r15
    7f5b22adfb89:	48 8b e5             	mov    %rbp,%rsp
    7f5b22adfb8c:	5d                   	pop    %rbp
    7f5b22adfb8d:	c3                   	retq   

end

