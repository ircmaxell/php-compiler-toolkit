function add(long, long) : long

/tmp/libjit-dump.o:     file format elf64-x86-64


Disassembly of section .text:

00007fae14b75258 <.text>:
    7fae14b75258:	55                   	push   %rbp
    7fae14b75259:	48 8b ec             	mov    %rsp,%rbp
    7fae14b7525c:	48 83 ec 10          	sub    $0x10,%rsp
    7fae14b75260:	48 89 7d f8          	mov    %rdi,-0x8(%rbp)
    7fae14b75264:	48 89 75 f0          	mov    %rsi,-0x10(%rbp)
    7fae14b75268:	48 8b 45 f8          	mov    -0x8(%rbp),%rax
    7fae14b7526c:	48 03 45 f0          	add    -0x10(%rbp),%rax
    7fae14b75270:	48 8b e5             	mov    %rbp,%rsp
    7fae14b75273:	5d                   	pop    %rbp
    7fae14b75274:	c3                   	retq   

end

function add100(long, long) : long

/tmp/libjit-dump.o:     file format elf64-x86-64


Disassembly of section .text:

00007fae14b752a6 <.text>:
    7fae14b752a6:	55                   	push   %rbp
    7fae14b752a7:	48 8b ec             	mov    %rsp,%rbp
    7fae14b752aa:	48 81 ec 30 03 00 00 	sub    $0x330,%rsp
    7fae14b752b1:	4c 89 3c 24          	mov    %r15,(%rsp)
    7fae14b752b5:	48 89 7d f8          	mov    %rdi,-0x8(%rbp)
    7fae14b752b9:	4c 8b fe             	mov    %rsi,%r15
    7fae14b752bc:	49 8b f7             	mov    %r15,%rsi
    7fae14b752bf:	48 8b 7d f8          	mov    -0x8(%rbp),%rdi
    7fae14b752c3:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b752c8:	e8 8b ff ff ff       	callq  0x7fae14b75258
    7fae14b752cd:	49 8b f7             	mov    %r15,%rsi
    7fae14b752d0:	48 8b f8             	mov    %rax,%rdi
    7fae14b752d3:	48 89 45 f0          	mov    %rax,-0x10(%rbp)
    7fae14b752d7:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b752dc:	e8 77 ff ff ff       	callq  0x7fae14b75258
    7fae14b752e1:	49 8b f7             	mov    %r15,%rsi
    7fae14b752e4:	48 8b f8             	mov    %rax,%rdi
    7fae14b752e7:	48 89 45 e8          	mov    %rax,-0x18(%rbp)
    7fae14b752eb:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b752f0:	e8 63 ff ff ff       	callq  0x7fae14b75258
    7fae14b752f5:	49 8b f7             	mov    %r15,%rsi
    7fae14b752f8:	48 8b f8             	mov    %rax,%rdi
    7fae14b752fb:	48 89 45 e0          	mov    %rax,-0x20(%rbp)
    7fae14b752ff:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b75304:	e8 4f ff ff ff       	callq  0x7fae14b75258
    7fae14b75309:	49 8b f7             	mov    %r15,%rsi
    7fae14b7530c:	48 8b f8             	mov    %rax,%rdi
    7fae14b7530f:	48 89 45 d8          	mov    %rax,-0x28(%rbp)
    7fae14b75313:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b75318:	e8 3b ff ff ff       	callq  0x7fae14b75258
    7fae14b7531d:	49 8b f7             	mov    %r15,%rsi
    7fae14b75320:	48 8b f8             	mov    %rax,%rdi
    7fae14b75323:	48 89 45 d0          	mov    %rax,-0x30(%rbp)
    7fae14b75327:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b7532c:	e8 27 ff ff ff       	callq  0x7fae14b75258
    7fae14b75331:	49 8b f7             	mov    %r15,%rsi
    7fae14b75334:	48 8b f8             	mov    %rax,%rdi
    7fae14b75337:	48 89 45 c8          	mov    %rax,-0x38(%rbp)
    7fae14b7533b:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b75340:	e8 13 ff ff ff       	callq  0x7fae14b75258
    7fae14b75345:	49 8b f7             	mov    %r15,%rsi
    7fae14b75348:	48 8b f8             	mov    %rax,%rdi
    7fae14b7534b:	48 89 45 c0          	mov    %rax,-0x40(%rbp)
    7fae14b7534f:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b75354:	e8 ff fe ff ff       	callq  0x7fae14b75258
    7fae14b75359:	49 8b f7             	mov    %r15,%rsi
    7fae14b7535c:	48 8b f8             	mov    %rax,%rdi
    7fae14b7535f:	48 89 45 b8          	mov    %rax,-0x48(%rbp)
    7fae14b75363:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b75368:	e8 eb fe ff ff       	callq  0x7fae14b75258
    7fae14b7536d:	49 8b f7             	mov    %r15,%rsi
    7fae14b75370:	48 8b f8             	mov    %rax,%rdi
    7fae14b75373:	48 89 45 b0          	mov    %rax,-0x50(%rbp)
    7fae14b75377:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b7537c:	e8 d7 fe ff ff       	callq  0x7fae14b75258
    7fae14b75381:	49 8b f7             	mov    %r15,%rsi
    7fae14b75384:	48 8b f8             	mov    %rax,%rdi
    7fae14b75387:	48 89 45 a8          	mov    %rax,-0x58(%rbp)
    7fae14b7538b:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b75390:	e8 c3 fe ff ff       	callq  0x7fae14b75258
    7fae14b75395:	49 8b f7             	mov    %r15,%rsi
    7fae14b75398:	48 8b f8             	mov    %rax,%rdi
    7fae14b7539b:	48 89 45 a0          	mov    %rax,-0x60(%rbp)
    7fae14b7539f:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b753a4:	e8 af fe ff ff       	callq  0x7fae14b75258
    7fae14b753a9:	49 8b f7             	mov    %r15,%rsi
    7fae14b753ac:	48 8b f8             	mov    %rax,%rdi
    7fae14b753af:	48 89 45 98          	mov    %rax,-0x68(%rbp)
    7fae14b753b3:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b753b8:	e8 9b fe ff ff       	callq  0x7fae14b75258
    7fae14b753bd:	49 8b f7             	mov    %r15,%rsi
    7fae14b753c0:	48 8b f8             	mov    %rax,%rdi
    7fae14b753c3:	48 89 45 90          	mov    %rax,-0x70(%rbp)
    7fae14b753c7:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b753cc:	e8 87 fe ff ff       	callq  0x7fae14b75258
    7fae14b753d1:	49 8b f7             	mov    %r15,%rsi
    7fae14b753d4:	48 8b f8             	mov    %rax,%rdi
    7fae14b753d7:	48 89 45 88          	mov    %rax,-0x78(%rbp)
    7fae14b753db:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b753e0:	e8 73 fe ff ff       	callq  0x7fae14b75258
    7fae14b753e5:	49 8b f7             	mov    %r15,%rsi
    7fae14b753e8:	48 8b f8             	mov    %rax,%rdi
    7fae14b753eb:	48 89 45 80          	mov    %rax,-0x80(%rbp)
    7fae14b753ef:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b753f4:	e8 5f fe ff ff       	callq  0x7fae14b75258
    7fae14b753f9:	49 8b f7             	mov    %r15,%rsi
    7fae14b753fc:	48 8b f8             	mov    %rax,%rdi
    7fae14b753ff:	48 89 85 78 ff ff ff 	mov    %rax,-0x88(%rbp)
    7fae14b75406:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b7540b:	e8 48 fe ff ff       	callq  0x7fae14b75258
    7fae14b75410:	49 8b f7             	mov    %r15,%rsi
    7fae14b75413:	48 8b f8             	mov    %rax,%rdi
    7fae14b75416:	48 89 85 70 ff ff ff 	mov    %rax,-0x90(%rbp)
    7fae14b7541d:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b75422:	e8 31 fe ff ff       	callq  0x7fae14b75258
    7fae14b75427:	49 8b f7             	mov    %r15,%rsi
    7fae14b7542a:	48 8b f8             	mov    %rax,%rdi
    7fae14b7542d:	48 89 85 68 ff ff ff 	mov    %rax,-0x98(%rbp)
    7fae14b75434:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b75439:	e8 1a fe ff ff       	callq  0x7fae14b75258
    7fae14b7543e:	49 8b f7             	mov    %r15,%rsi
    7fae14b75441:	48 8b f8             	mov    %rax,%rdi
    7fae14b75444:	48 89 85 60 ff ff ff 	mov    %rax,-0xa0(%rbp)
    7fae14b7544b:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b75450:	e8 03 fe ff ff       	callq  0x7fae14b75258
    7fae14b75455:	49 8b f7             	mov    %r15,%rsi
    7fae14b75458:	48 8b f8             	mov    %rax,%rdi
    7fae14b7545b:	48 89 85 58 ff ff ff 	mov    %rax,-0xa8(%rbp)
    7fae14b75462:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b75467:	e8 ec fd ff ff       	callq  0x7fae14b75258
    7fae14b7546c:	49 8b f7             	mov    %r15,%rsi
    7fae14b7546f:	48 8b f8             	mov    %rax,%rdi
    7fae14b75472:	48 89 85 50 ff ff ff 	mov    %rax,-0xb0(%rbp)
    7fae14b75479:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b7547e:	e8 d5 fd ff ff       	callq  0x7fae14b75258
    7fae14b75483:	49 8b f7             	mov    %r15,%rsi
    7fae14b75486:	48 8b f8             	mov    %rax,%rdi
    7fae14b75489:	48 89 85 48 ff ff ff 	mov    %rax,-0xb8(%rbp)
    7fae14b75490:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b75495:	e8 be fd ff ff       	callq  0x7fae14b75258
    7fae14b7549a:	49 8b f7             	mov    %r15,%rsi
    7fae14b7549d:	48 8b f8             	mov    %rax,%rdi
    7fae14b754a0:	48 89 85 40 ff ff ff 	mov    %rax,-0xc0(%rbp)
    7fae14b754a7:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b754ac:	e8 a7 fd ff ff       	callq  0x7fae14b75258
    7fae14b754b1:	49 8b f7             	mov    %r15,%rsi
    7fae14b754b4:	48 8b f8             	mov    %rax,%rdi
    7fae14b754b7:	48 89 85 38 ff ff ff 	mov    %rax,-0xc8(%rbp)
    7fae14b754be:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b754c3:	e8 90 fd ff ff       	callq  0x7fae14b75258
    7fae14b754c8:	49 8b f7             	mov    %r15,%rsi
    7fae14b754cb:	48 8b f8             	mov    %rax,%rdi
    7fae14b754ce:	48 89 85 30 ff ff ff 	mov    %rax,-0xd0(%rbp)
    7fae14b754d5:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b754da:	e8 79 fd ff ff       	callq  0x7fae14b75258
    7fae14b754df:	49 8b f7             	mov    %r15,%rsi
    7fae14b754e2:	48 8b f8             	mov    %rax,%rdi
    7fae14b754e5:	48 89 85 28 ff ff ff 	mov    %rax,-0xd8(%rbp)
    7fae14b754ec:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b754f1:	e8 62 fd ff ff       	callq  0x7fae14b75258
    7fae14b754f6:	49 8b f7             	mov    %r15,%rsi
    7fae14b754f9:	48 8b f8             	mov    %rax,%rdi
    7fae14b754fc:	48 89 85 20 ff ff ff 	mov    %rax,-0xe0(%rbp)
    7fae14b75503:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b75508:	e8 4b fd ff ff       	callq  0x7fae14b75258
    7fae14b7550d:	49 8b f7             	mov    %r15,%rsi
    7fae14b75510:	48 8b f8             	mov    %rax,%rdi
    7fae14b75513:	48 89 85 18 ff ff ff 	mov    %rax,-0xe8(%rbp)
    7fae14b7551a:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b7551f:	e8 34 fd ff ff       	callq  0x7fae14b75258
    7fae14b75524:	49 8b f7             	mov    %r15,%rsi
    7fae14b75527:	48 8b f8             	mov    %rax,%rdi
    7fae14b7552a:	48 89 85 10 ff ff ff 	mov    %rax,-0xf0(%rbp)
    7fae14b75531:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b75536:	e8 1d fd ff ff       	callq  0x7fae14b75258
    7fae14b7553b:	49 8b f7             	mov    %r15,%rsi
    7fae14b7553e:	48 8b f8             	mov    %rax,%rdi
    7fae14b75541:	48 89 85 08 ff ff ff 	mov    %rax,-0xf8(%rbp)
    7fae14b75548:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b7554d:	e8 06 fd ff ff       	callq  0x7fae14b75258
    7fae14b75552:	49 8b f7             	mov    %r15,%rsi
    7fae14b75555:	48 8b f8             	mov    %rax,%rdi
    7fae14b75558:	48 89 85 00 ff ff ff 	mov    %rax,-0x100(%rbp)
    7fae14b7555f:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b75564:	e8 ef fc ff ff       	callq  0x7fae14b75258
    7fae14b75569:	49 8b f7             	mov    %r15,%rsi
    7fae14b7556c:	48 8b f8             	mov    %rax,%rdi
    7fae14b7556f:	48 89 85 f8 fe ff ff 	mov    %rax,-0x108(%rbp)
    7fae14b75576:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b7557b:	e8 d8 fc ff ff       	callq  0x7fae14b75258
    7fae14b75580:	49 8b f7             	mov    %r15,%rsi
    7fae14b75583:	48 8b f8             	mov    %rax,%rdi
    7fae14b75586:	48 89 85 f0 fe ff ff 	mov    %rax,-0x110(%rbp)
    7fae14b7558d:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b75592:	e8 c1 fc ff ff       	callq  0x7fae14b75258
    7fae14b75597:	49 8b f7             	mov    %r15,%rsi
    7fae14b7559a:	48 8b f8             	mov    %rax,%rdi
    7fae14b7559d:	48 89 85 e8 fe ff ff 	mov    %rax,-0x118(%rbp)
    7fae14b755a4:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b755a9:	e8 aa fc ff ff       	callq  0x7fae14b75258
    7fae14b755ae:	49 8b f7             	mov    %r15,%rsi
    7fae14b755b1:	48 8b f8             	mov    %rax,%rdi
    7fae14b755b4:	48 89 85 e0 fe ff ff 	mov    %rax,-0x120(%rbp)
    7fae14b755bb:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b755c0:	e8 93 fc ff ff       	callq  0x7fae14b75258
    7fae14b755c5:	49 8b f7             	mov    %r15,%rsi
    7fae14b755c8:	48 8b f8             	mov    %rax,%rdi
    7fae14b755cb:	48 89 85 d8 fe ff ff 	mov    %rax,-0x128(%rbp)
    7fae14b755d2:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b755d7:	e8 7c fc ff ff       	callq  0x7fae14b75258
    7fae14b755dc:	49 8b f7             	mov    %r15,%rsi
    7fae14b755df:	48 8b f8             	mov    %rax,%rdi
    7fae14b755e2:	48 89 85 d0 fe ff ff 	mov    %rax,-0x130(%rbp)
    7fae14b755e9:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b755ee:	e8 65 fc ff ff       	callq  0x7fae14b75258
    7fae14b755f3:	49 8b f7             	mov    %r15,%rsi
    7fae14b755f6:	48 8b f8             	mov    %rax,%rdi
    7fae14b755f9:	48 89 85 c8 fe ff ff 	mov    %rax,-0x138(%rbp)
    7fae14b75600:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b75605:	e8 4e fc ff ff       	callq  0x7fae14b75258
    7fae14b7560a:	49 8b f7             	mov    %r15,%rsi
    7fae14b7560d:	48 8b f8             	mov    %rax,%rdi
    7fae14b75610:	48 89 85 c0 fe ff ff 	mov    %rax,-0x140(%rbp)
    7fae14b75617:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b7561c:	e8 37 fc ff ff       	callq  0x7fae14b75258
    7fae14b75621:	49 8b f7             	mov    %r15,%rsi
    7fae14b75624:	48 8b f8             	mov    %rax,%rdi
    7fae14b75627:	48 89 85 b8 fe ff ff 	mov    %rax,-0x148(%rbp)
    7fae14b7562e:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b75633:	e8 20 fc ff ff       	callq  0x7fae14b75258
    7fae14b75638:	49 8b f7             	mov    %r15,%rsi
    7fae14b7563b:	48 8b f8             	mov    %rax,%rdi
    7fae14b7563e:	48 89 85 b0 fe ff ff 	mov    %rax,-0x150(%rbp)
    7fae14b75645:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b7564a:	e8 09 fc ff ff       	callq  0x7fae14b75258
    7fae14b7564f:	49 8b f7             	mov    %r15,%rsi
    7fae14b75652:	48 8b f8             	mov    %rax,%rdi
    7fae14b75655:	48 89 85 a8 fe ff ff 	mov    %rax,-0x158(%rbp)
    7fae14b7565c:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b75661:	e8 f2 fb ff ff       	callq  0x7fae14b75258
    7fae14b75666:	49 8b f7             	mov    %r15,%rsi
    7fae14b75669:	48 8b f8             	mov    %rax,%rdi
    7fae14b7566c:	48 89 85 a0 fe ff ff 	mov    %rax,-0x160(%rbp)
    7fae14b75673:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b75678:	e8 db fb ff ff       	callq  0x7fae14b75258
    7fae14b7567d:	49 8b f7             	mov    %r15,%rsi
    7fae14b75680:	48 8b f8             	mov    %rax,%rdi
    7fae14b75683:	48 89 85 98 fe ff ff 	mov    %rax,-0x168(%rbp)
    7fae14b7568a:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b7568f:	e8 c4 fb ff ff       	callq  0x7fae14b75258
    7fae14b75694:	49 8b f7             	mov    %r15,%rsi
    7fae14b75697:	48 8b f8             	mov    %rax,%rdi
    7fae14b7569a:	48 89 85 90 fe ff ff 	mov    %rax,-0x170(%rbp)
    7fae14b756a1:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b756a6:	e8 ad fb ff ff       	callq  0x7fae14b75258
    7fae14b756ab:	49 8b f7             	mov    %r15,%rsi
    7fae14b756ae:	48 8b f8             	mov    %rax,%rdi
    7fae14b756b1:	48 89 85 88 fe ff ff 	mov    %rax,-0x178(%rbp)
    7fae14b756b8:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b756bd:	e8 96 fb ff ff       	callq  0x7fae14b75258
    7fae14b756c2:	49 8b f7             	mov    %r15,%rsi
    7fae14b756c5:	48 8b f8             	mov    %rax,%rdi
    7fae14b756c8:	48 89 85 80 fe ff ff 	mov    %rax,-0x180(%rbp)
    7fae14b756cf:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b756d4:	e8 7f fb ff ff       	callq  0x7fae14b75258
    7fae14b756d9:	49 8b f7             	mov    %r15,%rsi
    7fae14b756dc:	48 8b f8             	mov    %rax,%rdi
    7fae14b756df:	48 89 85 78 fe ff ff 	mov    %rax,-0x188(%rbp)
    7fae14b756e6:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b756eb:	e8 68 fb ff ff       	callq  0x7fae14b75258
    7fae14b756f0:	49 8b f7             	mov    %r15,%rsi
    7fae14b756f3:	48 8b f8             	mov    %rax,%rdi
    7fae14b756f6:	48 89 85 70 fe ff ff 	mov    %rax,-0x190(%rbp)
    7fae14b756fd:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b75702:	e8 51 fb ff ff       	callq  0x7fae14b75258
    7fae14b75707:	49 8b f7             	mov    %r15,%rsi
    7fae14b7570a:	48 8b f8             	mov    %rax,%rdi
    7fae14b7570d:	48 89 85 68 fe ff ff 	mov    %rax,-0x198(%rbp)
    7fae14b75714:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b75719:	e8 3a fb ff ff       	callq  0x7fae14b75258
    7fae14b7571e:	49 8b f7             	mov    %r15,%rsi
    7fae14b75721:	48 8b f8             	mov    %rax,%rdi
    7fae14b75724:	48 89 85 60 fe ff ff 	mov    %rax,-0x1a0(%rbp)
    7fae14b7572b:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b75730:	e8 23 fb ff ff       	callq  0x7fae14b75258
    7fae14b75735:	49 8b f7             	mov    %r15,%rsi
    7fae14b75738:	48 8b f8             	mov    %rax,%rdi
    7fae14b7573b:	48 89 85 58 fe ff ff 	mov    %rax,-0x1a8(%rbp)
    7fae14b75742:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b75747:	e8 0c fb ff ff       	callq  0x7fae14b75258
    7fae14b7574c:	49 8b f7             	mov    %r15,%rsi
    7fae14b7574f:	48 8b f8             	mov    %rax,%rdi
    7fae14b75752:	48 89 85 50 fe ff ff 	mov    %rax,-0x1b0(%rbp)
    7fae14b75759:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b7575e:	e8 f5 fa ff ff       	callq  0x7fae14b75258
    7fae14b75763:	49 8b f7             	mov    %r15,%rsi
    7fae14b75766:	48 8b f8             	mov    %rax,%rdi
    7fae14b75769:	48 89 85 48 fe ff ff 	mov    %rax,-0x1b8(%rbp)
    7fae14b75770:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b75775:	e8 de fa ff ff       	callq  0x7fae14b75258
    7fae14b7577a:	49 8b f7             	mov    %r15,%rsi
    7fae14b7577d:	48 8b f8             	mov    %rax,%rdi
    7fae14b75780:	48 89 85 40 fe ff ff 	mov    %rax,-0x1c0(%rbp)
    7fae14b75787:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b7578c:	e8 c7 fa ff ff       	callq  0x7fae14b75258
    7fae14b75791:	49 8b f7             	mov    %r15,%rsi
    7fae14b75794:	48 8b f8             	mov    %rax,%rdi
    7fae14b75797:	48 89 85 38 fe ff ff 	mov    %rax,-0x1c8(%rbp)
    7fae14b7579e:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b757a3:	e8 b0 fa ff ff       	callq  0x7fae14b75258
    7fae14b757a8:	49 8b f7             	mov    %r15,%rsi
    7fae14b757ab:	48 8b f8             	mov    %rax,%rdi
    7fae14b757ae:	48 89 85 30 fe ff ff 	mov    %rax,-0x1d0(%rbp)
    7fae14b757b5:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b757ba:	e8 99 fa ff ff       	callq  0x7fae14b75258
    7fae14b757bf:	49 8b f7             	mov    %r15,%rsi
    7fae14b757c2:	48 8b f8             	mov    %rax,%rdi
    7fae14b757c5:	48 89 85 28 fe ff ff 	mov    %rax,-0x1d8(%rbp)
    7fae14b757cc:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b757d1:	e8 82 fa ff ff       	callq  0x7fae14b75258
    7fae14b757d6:	49 8b f7             	mov    %r15,%rsi
    7fae14b757d9:	48 8b f8             	mov    %rax,%rdi
    7fae14b757dc:	48 89 85 20 fe ff ff 	mov    %rax,-0x1e0(%rbp)
    7fae14b757e3:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b757e8:	e8 6b fa ff ff       	callq  0x7fae14b75258
    7fae14b757ed:	49 8b f7             	mov    %r15,%rsi
    7fae14b757f0:	48 8b f8             	mov    %rax,%rdi
    7fae14b757f3:	48 89 85 18 fe ff ff 	mov    %rax,-0x1e8(%rbp)
    7fae14b757fa:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b757ff:	e8 54 fa ff ff       	callq  0x7fae14b75258
    7fae14b75804:	49 8b f7             	mov    %r15,%rsi
    7fae14b75807:	48 8b f8             	mov    %rax,%rdi
    7fae14b7580a:	48 89 85 10 fe ff ff 	mov    %rax,-0x1f0(%rbp)
    7fae14b75811:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b75816:	e8 3d fa ff ff       	callq  0x7fae14b75258
    7fae14b7581b:	49 8b f7             	mov    %r15,%rsi
    7fae14b7581e:	48 8b f8             	mov    %rax,%rdi
    7fae14b75821:	48 89 85 08 fe ff ff 	mov    %rax,-0x1f8(%rbp)
    7fae14b75828:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b7582d:	e8 26 fa ff ff       	callq  0x7fae14b75258
    7fae14b75832:	49 8b f7             	mov    %r15,%rsi
    7fae14b75835:	48 8b f8             	mov    %rax,%rdi
    7fae14b75838:	48 89 85 00 fe ff ff 	mov    %rax,-0x200(%rbp)
    7fae14b7583f:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b75844:	e8 0f fa ff ff       	callq  0x7fae14b75258
    7fae14b75849:	49 8b f7             	mov    %r15,%rsi
    7fae14b7584c:	48 8b f8             	mov    %rax,%rdi
    7fae14b7584f:	48 89 85 f8 fd ff ff 	mov    %rax,-0x208(%rbp)
    7fae14b75856:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b7585b:	e8 f8 f9 ff ff       	callq  0x7fae14b75258
    7fae14b75860:	49 8b f7             	mov    %r15,%rsi
    7fae14b75863:	48 8b f8             	mov    %rax,%rdi
    7fae14b75866:	48 89 85 f0 fd ff ff 	mov    %rax,-0x210(%rbp)
    7fae14b7586d:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b75872:	e8 e1 f9 ff ff       	callq  0x7fae14b75258
    7fae14b75877:	49 8b f7             	mov    %r15,%rsi
    7fae14b7587a:	48 8b f8             	mov    %rax,%rdi
    7fae14b7587d:	48 89 85 e8 fd ff ff 	mov    %rax,-0x218(%rbp)
    7fae14b75884:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b75889:	e8 ca f9 ff ff       	callq  0x7fae14b75258
    7fae14b7588e:	49 8b f7             	mov    %r15,%rsi
    7fae14b75891:	48 8b f8             	mov    %rax,%rdi
    7fae14b75894:	48 89 85 e0 fd ff ff 	mov    %rax,-0x220(%rbp)
    7fae14b7589b:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b758a0:	e8 b3 f9 ff ff       	callq  0x7fae14b75258
    7fae14b758a5:	49 8b f7             	mov    %r15,%rsi
    7fae14b758a8:	48 8b f8             	mov    %rax,%rdi
    7fae14b758ab:	48 89 85 d8 fd ff ff 	mov    %rax,-0x228(%rbp)
    7fae14b758b2:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b758b7:	e8 9c f9 ff ff       	callq  0x7fae14b75258
    7fae14b758bc:	49 8b f7             	mov    %r15,%rsi
    7fae14b758bf:	48 8b f8             	mov    %rax,%rdi
    7fae14b758c2:	48 89 85 d0 fd ff ff 	mov    %rax,-0x230(%rbp)
    7fae14b758c9:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b758ce:	e8 85 f9 ff ff       	callq  0x7fae14b75258
    7fae14b758d3:	49 8b f7             	mov    %r15,%rsi
    7fae14b758d6:	48 8b f8             	mov    %rax,%rdi
    7fae14b758d9:	48 89 85 c8 fd ff ff 	mov    %rax,-0x238(%rbp)
    7fae14b758e0:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b758e5:	e8 6e f9 ff ff       	callq  0x7fae14b75258
    7fae14b758ea:	49 8b f7             	mov    %r15,%rsi
    7fae14b758ed:	48 8b f8             	mov    %rax,%rdi
    7fae14b758f0:	48 89 85 c0 fd ff ff 	mov    %rax,-0x240(%rbp)
    7fae14b758f7:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b758fc:	e8 57 f9 ff ff       	callq  0x7fae14b75258
    7fae14b75901:	49 8b f7             	mov    %r15,%rsi
    7fae14b75904:	48 8b f8             	mov    %rax,%rdi
    7fae14b75907:	48 89 85 b8 fd ff ff 	mov    %rax,-0x248(%rbp)
    7fae14b7590e:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b75913:	e8 40 f9 ff ff       	callq  0x7fae14b75258
    7fae14b75918:	49 8b f7             	mov    %r15,%rsi
    7fae14b7591b:	48 8b f8             	mov    %rax,%rdi
    7fae14b7591e:	48 89 85 b0 fd ff ff 	mov    %rax,-0x250(%rbp)
    7fae14b75925:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b7592a:	e8 29 f9 ff ff       	callq  0x7fae14b75258
    7fae14b7592f:	49 8b f7             	mov    %r15,%rsi
    7fae14b75932:	48 8b f8             	mov    %rax,%rdi
    7fae14b75935:	48 89 85 a8 fd ff ff 	mov    %rax,-0x258(%rbp)
    7fae14b7593c:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b75941:	e8 12 f9 ff ff       	callq  0x7fae14b75258
    7fae14b75946:	49 8b f7             	mov    %r15,%rsi
    7fae14b75949:	48 8b f8             	mov    %rax,%rdi
    7fae14b7594c:	48 89 85 a0 fd ff ff 	mov    %rax,-0x260(%rbp)
    7fae14b75953:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b75958:	e8 fb f8 ff ff       	callq  0x7fae14b75258
    7fae14b7595d:	49 8b f7             	mov    %r15,%rsi
    7fae14b75960:	48 8b f8             	mov    %rax,%rdi
    7fae14b75963:	48 89 85 98 fd ff ff 	mov    %rax,-0x268(%rbp)
    7fae14b7596a:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b7596f:	e8 e4 f8 ff ff       	callq  0x7fae14b75258
    7fae14b75974:	49 8b f7             	mov    %r15,%rsi
    7fae14b75977:	48 8b f8             	mov    %rax,%rdi
    7fae14b7597a:	48 89 85 90 fd ff ff 	mov    %rax,-0x270(%rbp)
    7fae14b75981:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b75986:	e8 cd f8 ff ff       	callq  0x7fae14b75258
    7fae14b7598b:	49 8b f7             	mov    %r15,%rsi
    7fae14b7598e:	48 8b f8             	mov    %rax,%rdi
    7fae14b75991:	48 89 85 88 fd ff ff 	mov    %rax,-0x278(%rbp)
    7fae14b75998:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b7599d:	e8 b6 f8 ff ff       	callq  0x7fae14b75258
    7fae14b759a2:	49 8b f7             	mov    %r15,%rsi
    7fae14b759a5:	48 8b f8             	mov    %rax,%rdi
    7fae14b759a8:	48 89 85 80 fd ff ff 	mov    %rax,-0x280(%rbp)
    7fae14b759af:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b759b4:	e8 9f f8 ff ff       	callq  0x7fae14b75258
    7fae14b759b9:	49 8b f7             	mov    %r15,%rsi
    7fae14b759bc:	48 8b f8             	mov    %rax,%rdi
    7fae14b759bf:	48 89 85 78 fd ff ff 	mov    %rax,-0x288(%rbp)
    7fae14b759c6:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b759cb:	e8 88 f8 ff ff       	callq  0x7fae14b75258
    7fae14b759d0:	49 8b f7             	mov    %r15,%rsi
    7fae14b759d3:	48 8b f8             	mov    %rax,%rdi
    7fae14b759d6:	48 89 85 70 fd ff ff 	mov    %rax,-0x290(%rbp)
    7fae14b759dd:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b759e2:	e8 71 f8 ff ff       	callq  0x7fae14b75258
    7fae14b759e7:	49 8b f7             	mov    %r15,%rsi
    7fae14b759ea:	48 8b f8             	mov    %rax,%rdi
    7fae14b759ed:	48 89 85 68 fd ff ff 	mov    %rax,-0x298(%rbp)
    7fae14b759f4:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b759f9:	e8 5a f8 ff ff       	callq  0x7fae14b75258
    7fae14b759fe:	49 8b f7             	mov    %r15,%rsi
    7fae14b75a01:	48 8b f8             	mov    %rax,%rdi
    7fae14b75a04:	48 89 85 60 fd ff ff 	mov    %rax,-0x2a0(%rbp)
    7fae14b75a0b:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b75a10:	e8 43 f8 ff ff       	callq  0x7fae14b75258
    7fae14b75a15:	49 8b f7             	mov    %r15,%rsi
    7fae14b75a18:	48 8b f8             	mov    %rax,%rdi
    7fae14b75a1b:	48 89 85 58 fd ff ff 	mov    %rax,-0x2a8(%rbp)
    7fae14b75a22:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b75a27:	e8 2c f8 ff ff       	callq  0x7fae14b75258
    7fae14b75a2c:	49 8b f7             	mov    %r15,%rsi
    7fae14b75a2f:	48 8b f8             	mov    %rax,%rdi
    7fae14b75a32:	48 89 85 50 fd ff ff 	mov    %rax,-0x2b0(%rbp)
    7fae14b75a39:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b75a3e:	e8 15 f8 ff ff       	callq  0x7fae14b75258
    7fae14b75a43:	49 8b f7             	mov    %r15,%rsi
    7fae14b75a46:	48 8b f8             	mov    %rax,%rdi
    7fae14b75a49:	48 89 85 48 fd ff ff 	mov    %rax,-0x2b8(%rbp)
    7fae14b75a50:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b75a55:	e8 fe f7 ff ff       	callq  0x7fae14b75258
    7fae14b75a5a:	49 8b f7             	mov    %r15,%rsi
    7fae14b75a5d:	48 8b f8             	mov    %rax,%rdi
    7fae14b75a60:	48 89 85 40 fd ff ff 	mov    %rax,-0x2c0(%rbp)
    7fae14b75a67:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b75a6c:	e8 e7 f7 ff ff       	callq  0x7fae14b75258
    7fae14b75a71:	49 8b f7             	mov    %r15,%rsi
    7fae14b75a74:	48 8b f8             	mov    %rax,%rdi
    7fae14b75a77:	48 89 85 38 fd ff ff 	mov    %rax,-0x2c8(%rbp)
    7fae14b75a7e:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b75a83:	e8 d0 f7 ff ff       	callq  0x7fae14b75258
    7fae14b75a88:	49 8b f7             	mov    %r15,%rsi
    7fae14b75a8b:	48 8b f8             	mov    %rax,%rdi
    7fae14b75a8e:	48 89 85 30 fd ff ff 	mov    %rax,-0x2d0(%rbp)
    7fae14b75a95:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b75a9a:	e8 b9 f7 ff ff       	callq  0x7fae14b75258
    7fae14b75a9f:	49 8b f7             	mov    %r15,%rsi
    7fae14b75aa2:	48 8b f8             	mov    %rax,%rdi
    7fae14b75aa5:	48 89 85 28 fd ff ff 	mov    %rax,-0x2d8(%rbp)
    7fae14b75aac:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b75ab1:	e8 a2 f7 ff ff       	callq  0x7fae14b75258
    7fae14b75ab6:	49 8b f7             	mov    %r15,%rsi
    7fae14b75ab9:	48 8b f8             	mov    %rax,%rdi
    7fae14b75abc:	48 89 85 20 fd ff ff 	mov    %rax,-0x2e0(%rbp)
    7fae14b75ac3:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b75ac8:	e8 8b f7 ff ff       	callq  0x7fae14b75258
    7fae14b75acd:	49 8b f7             	mov    %r15,%rsi
    7fae14b75ad0:	48 8b f8             	mov    %rax,%rdi
    7fae14b75ad3:	48 89 85 18 fd ff ff 	mov    %rax,-0x2e8(%rbp)
    7fae14b75ada:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b75adf:	e8 74 f7 ff ff       	callq  0x7fae14b75258
    7fae14b75ae4:	49 8b f7             	mov    %r15,%rsi
    7fae14b75ae7:	48 8b f8             	mov    %rax,%rdi
    7fae14b75aea:	48 89 85 10 fd ff ff 	mov    %rax,-0x2f0(%rbp)
    7fae14b75af1:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b75af6:	e8 5d f7 ff ff       	callq  0x7fae14b75258
    7fae14b75afb:	49 8b f7             	mov    %r15,%rsi
    7fae14b75afe:	48 8b f8             	mov    %rax,%rdi
    7fae14b75b01:	48 89 85 08 fd ff ff 	mov    %rax,-0x2f8(%rbp)
    7fae14b75b08:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b75b0d:	e8 46 f7 ff ff       	callq  0x7fae14b75258
    7fae14b75b12:	49 8b f7             	mov    %r15,%rsi
    7fae14b75b15:	48 8b f8             	mov    %rax,%rdi
    7fae14b75b18:	48 89 85 00 fd ff ff 	mov    %rax,-0x300(%rbp)
    7fae14b75b1f:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b75b24:	e8 2f f7 ff ff       	callq  0x7fae14b75258
    7fae14b75b29:	49 8b f7             	mov    %r15,%rsi
    7fae14b75b2c:	48 8b f8             	mov    %rax,%rdi
    7fae14b75b2f:	48 89 85 f8 fc ff ff 	mov    %rax,-0x308(%rbp)
    7fae14b75b36:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b75b3b:	e8 18 f7 ff ff       	callq  0x7fae14b75258
    7fae14b75b40:	49 8b f7             	mov    %r15,%rsi
    7fae14b75b43:	48 8b f8             	mov    %rax,%rdi
    7fae14b75b46:	48 89 85 f0 fc ff ff 	mov    %rax,-0x310(%rbp)
    7fae14b75b4d:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b75b52:	e8 01 f7 ff ff       	callq  0x7fae14b75258
    7fae14b75b57:	49 8b f7             	mov    %r15,%rsi
    7fae14b75b5a:	48 8b f8             	mov    %rax,%rdi
    7fae14b75b5d:	48 89 85 e8 fc ff ff 	mov    %rax,-0x318(%rbp)
    7fae14b75b64:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b75b69:	e8 ea f6 ff ff       	callq  0x7fae14b75258
    7fae14b75b6e:	49 8b f7             	mov    %r15,%rsi
    7fae14b75b71:	48 8b f8             	mov    %rax,%rdi
    7fae14b75b74:	48 89 85 e0 fc ff ff 	mov    %rax,-0x320(%rbp)
    7fae14b75b7b:	b8 08 00 00 00       	mov    $0x8,%eax
    7fae14b75b80:	e8 d3 f6 ff ff       	callq  0x7fae14b75258
    7fae14b75b85:	4c 8b 3c 24          	mov    (%rsp),%r15
    7fae14b75b89:	48 8b e5             	mov    %rbp,%rsp
    7fae14b75b8c:	5d                   	pop    %rbp
    7fae14b75b8d:	c3                   	retq   

end

