function add(long, long) : long

/tmp/libjit-dump.o:     file format elf64-x86-64


Disassembly of section .text:

00007fd4769a4258 <.text>:
    7fd4769a4258:	55                   	push   %rbp
    7fd4769a4259:	48 8b ec             	mov    %rsp,%rbp
    7fd4769a425c:	48 83 ec 10          	sub    $0x10,%rsp
    7fd4769a4260:	48 89 7d f8          	mov    %rdi,-0x8(%rbp)
    7fd4769a4264:	48 89 75 f0          	mov    %rsi,-0x10(%rbp)
    7fd4769a4268:	48 8b 45 f8          	mov    -0x8(%rbp),%rax
    7fd4769a426c:	48 03 45 f0          	add    -0x10(%rbp),%rax
    7fd4769a4270:	48 8b e5             	mov    %rbp,%rsp
    7fd4769a4273:	5d                   	pop    %rbp
    7fd4769a4274:	c3                   	retq   

end

function add100(long, long) : long

/tmp/libjit-dump.o:     file format elf64-x86-64


Disassembly of section .text:

00007fd4769a42a6 <.text>:
    7fd4769a42a6:	55                   	push   %rbp
    7fd4769a42a7:	48 8b ec             	mov    %rsp,%rbp
    7fd4769a42aa:	48 81 ec 30 03 00 00 	sub    $0x330,%rsp
    7fd4769a42b1:	4c 89 3c 24          	mov    %r15,(%rsp)
    7fd4769a42b5:	48 89 7d f8          	mov    %rdi,-0x8(%rbp)
    7fd4769a42b9:	4c 8b fe             	mov    %rsi,%r15
    7fd4769a42bc:	49 8b f7             	mov    %r15,%rsi
    7fd4769a42bf:	48 8b 7d f8          	mov    -0x8(%rbp),%rdi
    7fd4769a42c3:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a42c8:	e8 8b ff ff ff       	callq  0x7fd4769a4258
    7fd4769a42cd:	49 8b f7             	mov    %r15,%rsi
    7fd4769a42d0:	48 8b f8             	mov    %rax,%rdi
    7fd4769a42d3:	48 89 45 f0          	mov    %rax,-0x10(%rbp)
    7fd4769a42d7:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a42dc:	e8 77 ff ff ff       	callq  0x7fd4769a4258
    7fd4769a42e1:	49 8b f7             	mov    %r15,%rsi
    7fd4769a42e4:	48 8b f8             	mov    %rax,%rdi
    7fd4769a42e7:	48 89 45 e8          	mov    %rax,-0x18(%rbp)
    7fd4769a42eb:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a42f0:	e8 63 ff ff ff       	callq  0x7fd4769a4258
    7fd4769a42f5:	49 8b f7             	mov    %r15,%rsi
    7fd4769a42f8:	48 8b f8             	mov    %rax,%rdi
    7fd4769a42fb:	48 89 45 e0          	mov    %rax,-0x20(%rbp)
    7fd4769a42ff:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a4304:	e8 4f ff ff ff       	callq  0x7fd4769a4258
    7fd4769a4309:	49 8b f7             	mov    %r15,%rsi
    7fd4769a430c:	48 8b f8             	mov    %rax,%rdi
    7fd4769a430f:	48 89 45 d8          	mov    %rax,-0x28(%rbp)
    7fd4769a4313:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a4318:	e8 3b ff ff ff       	callq  0x7fd4769a4258
    7fd4769a431d:	49 8b f7             	mov    %r15,%rsi
    7fd4769a4320:	48 8b f8             	mov    %rax,%rdi
    7fd4769a4323:	48 89 45 d0          	mov    %rax,-0x30(%rbp)
    7fd4769a4327:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a432c:	e8 27 ff ff ff       	callq  0x7fd4769a4258
    7fd4769a4331:	49 8b f7             	mov    %r15,%rsi
    7fd4769a4334:	48 8b f8             	mov    %rax,%rdi
    7fd4769a4337:	48 89 45 c8          	mov    %rax,-0x38(%rbp)
    7fd4769a433b:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a4340:	e8 13 ff ff ff       	callq  0x7fd4769a4258
    7fd4769a4345:	49 8b f7             	mov    %r15,%rsi
    7fd4769a4348:	48 8b f8             	mov    %rax,%rdi
    7fd4769a434b:	48 89 45 c0          	mov    %rax,-0x40(%rbp)
    7fd4769a434f:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a4354:	e8 ff fe ff ff       	callq  0x7fd4769a4258
    7fd4769a4359:	49 8b f7             	mov    %r15,%rsi
    7fd4769a435c:	48 8b f8             	mov    %rax,%rdi
    7fd4769a435f:	48 89 45 b8          	mov    %rax,-0x48(%rbp)
    7fd4769a4363:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a4368:	e8 eb fe ff ff       	callq  0x7fd4769a4258
    7fd4769a436d:	49 8b f7             	mov    %r15,%rsi
    7fd4769a4370:	48 8b f8             	mov    %rax,%rdi
    7fd4769a4373:	48 89 45 b0          	mov    %rax,-0x50(%rbp)
    7fd4769a4377:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a437c:	e8 d7 fe ff ff       	callq  0x7fd4769a4258
    7fd4769a4381:	49 8b f7             	mov    %r15,%rsi
    7fd4769a4384:	48 8b f8             	mov    %rax,%rdi
    7fd4769a4387:	48 89 45 a8          	mov    %rax,-0x58(%rbp)
    7fd4769a438b:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a4390:	e8 c3 fe ff ff       	callq  0x7fd4769a4258
    7fd4769a4395:	49 8b f7             	mov    %r15,%rsi
    7fd4769a4398:	48 8b f8             	mov    %rax,%rdi
    7fd4769a439b:	48 89 45 a0          	mov    %rax,-0x60(%rbp)
    7fd4769a439f:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a43a4:	e8 af fe ff ff       	callq  0x7fd4769a4258
    7fd4769a43a9:	49 8b f7             	mov    %r15,%rsi
    7fd4769a43ac:	48 8b f8             	mov    %rax,%rdi
    7fd4769a43af:	48 89 45 98          	mov    %rax,-0x68(%rbp)
    7fd4769a43b3:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a43b8:	e8 9b fe ff ff       	callq  0x7fd4769a4258
    7fd4769a43bd:	49 8b f7             	mov    %r15,%rsi
    7fd4769a43c0:	48 8b f8             	mov    %rax,%rdi
    7fd4769a43c3:	48 89 45 90          	mov    %rax,-0x70(%rbp)
    7fd4769a43c7:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a43cc:	e8 87 fe ff ff       	callq  0x7fd4769a4258
    7fd4769a43d1:	49 8b f7             	mov    %r15,%rsi
    7fd4769a43d4:	48 8b f8             	mov    %rax,%rdi
    7fd4769a43d7:	48 89 45 88          	mov    %rax,-0x78(%rbp)
    7fd4769a43db:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a43e0:	e8 73 fe ff ff       	callq  0x7fd4769a4258
    7fd4769a43e5:	49 8b f7             	mov    %r15,%rsi
    7fd4769a43e8:	48 8b f8             	mov    %rax,%rdi
    7fd4769a43eb:	48 89 45 80          	mov    %rax,-0x80(%rbp)
    7fd4769a43ef:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a43f4:	e8 5f fe ff ff       	callq  0x7fd4769a4258
    7fd4769a43f9:	49 8b f7             	mov    %r15,%rsi
    7fd4769a43fc:	48 8b f8             	mov    %rax,%rdi
    7fd4769a43ff:	48 89 85 78 ff ff ff 	mov    %rax,-0x88(%rbp)
    7fd4769a4406:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a440b:	e8 48 fe ff ff       	callq  0x7fd4769a4258
    7fd4769a4410:	49 8b f7             	mov    %r15,%rsi
    7fd4769a4413:	48 8b f8             	mov    %rax,%rdi
    7fd4769a4416:	48 89 85 70 ff ff ff 	mov    %rax,-0x90(%rbp)
    7fd4769a441d:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a4422:	e8 31 fe ff ff       	callq  0x7fd4769a4258
    7fd4769a4427:	49 8b f7             	mov    %r15,%rsi
    7fd4769a442a:	48 8b f8             	mov    %rax,%rdi
    7fd4769a442d:	48 89 85 68 ff ff ff 	mov    %rax,-0x98(%rbp)
    7fd4769a4434:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a4439:	e8 1a fe ff ff       	callq  0x7fd4769a4258
    7fd4769a443e:	49 8b f7             	mov    %r15,%rsi
    7fd4769a4441:	48 8b f8             	mov    %rax,%rdi
    7fd4769a4444:	48 89 85 60 ff ff ff 	mov    %rax,-0xa0(%rbp)
    7fd4769a444b:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a4450:	e8 03 fe ff ff       	callq  0x7fd4769a4258
    7fd4769a4455:	49 8b f7             	mov    %r15,%rsi
    7fd4769a4458:	48 8b f8             	mov    %rax,%rdi
    7fd4769a445b:	48 89 85 58 ff ff ff 	mov    %rax,-0xa8(%rbp)
    7fd4769a4462:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a4467:	e8 ec fd ff ff       	callq  0x7fd4769a4258
    7fd4769a446c:	49 8b f7             	mov    %r15,%rsi
    7fd4769a446f:	48 8b f8             	mov    %rax,%rdi
    7fd4769a4472:	48 89 85 50 ff ff ff 	mov    %rax,-0xb0(%rbp)
    7fd4769a4479:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a447e:	e8 d5 fd ff ff       	callq  0x7fd4769a4258
    7fd4769a4483:	49 8b f7             	mov    %r15,%rsi
    7fd4769a4486:	48 8b f8             	mov    %rax,%rdi
    7fd4769a4489:	48 89 85 48 ff ff ff 	mov    %rax,-0xb8(%rbp)
    7fd4769a4490:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a4495:	e8 be fd ff ff       	callq  0x7fd4769a4258
    7fd4769a449a:	49 8b f7             	mov    %r15,%rsi
    7fd4769a449d:	48 8b f8             	mov    %rax,%rdi
    7fd4769a44a0:	48 89 85 40 ff ff ff 	mov    %rax,-0xc0(%rbp)
    7fd4769a44a7:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a44ac:	e8 a7 fd ff ff       	callq  0x7fd4769a4258
    7fd4769a44b1:	49 8b f7             	mov    %r15,%rsi
    7fd4769a44b4:	48 8b f8             	mov    %rax,%rdi
    7fd4769a44b7:	48 89 85 38 ff ff ff 	mov    %rax,-0xc8(%rbp)
    7fd4769a44be:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a44c3:	e8 90 fd ff ff       	callq  0x7fd4769a4258
    7fd4769a44c8:	49 8b f7             	mov    %r15,%rsi
    7fd4769a44cb:	48 8b f8             	mov    %rax,%rdi
    7fd4769a44ce:	48 89 85 30 ff ff ff 	mov    %rax,-0xd0(%rbp)
    7fd4769a44d5:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a44da:	e8 79 fd ff ff       	callq  0x7fd4769a4258
    7fd4769a44df:	49 8b f7             	mov    %r15,%rsi
    7fd4769a44e2:	48 8b f8             	mov    %rax,%rdi
    7fd4769a44e5:	48 89 85 28 ff ff ff 	mov    %rax,-0xd8(%rbp)
    7fd4769a44ec:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a44f1:	e8 62 fd ff ff       	callq  0x7fd4769a4258
    7fd4769a44f6:	49 8b f7             	mov    %r15,%rsi
    7fd4769a44f9:	48 8b f8             	mov    %rax,%rdi
    7fd4769a44fc:	48 89 85 20 ff ff ff 	mov    %rax,-0xe0(%rbp)
    7fd4769a4503:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a4508:	e8 4b fd ff ff       	callq  0x7fd4769a4258
    7fd4769a450d:	49 8b f7             	mov    %r15,%rsi
    7fd4769a4510:	48 8b f8             	mov    %rax,%rdi
    7fd4769a4513:	48 89 85 18 ff ff ff 	mov    %rax,-0xe8(%rbp)
    7fd4769a451a:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a451f:	e8 34 fd ff ff       	callq  0x7fd4769a4258
    7fd4769a4524:	49 8b f7             	mov    %r15,%rsi
    7fd4769a4527:	48 8b f8             	mov    %rax,%rdi
    7fd4769a452a:	48 89 85 10 ff ff ff 	mov    %rax,-0xf0(%rbp)
    7fd4769a4531:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a4536:	e8 1d fd ff ff       	callq  0x7fd4769a4258
    7fd4769a453b:	49 8b f7             	mov    %r15,%rsi
    7fd4769a453e:	48 8b f8             	mov    %rax,%rdi
    7fd4769a4541:	48 89 85 08 ff ff ff 	mov    %rax,-0xf8(%rbp)
    7fd4769a4548:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a454d:	e8 06 fd ff ff       	callq  0x7fd4769a4258
    7fd4769a4552:	49 8b f7             	mov    %r15,%rsi
    7fd4769a4555:	48 8b f8             	mov    %rax,%rdi
    7fd4769a4558:	48 89 85 00 ff ff ff 	mov    %rax,-0x100(%rbp)
    7fd4769a455f:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a4564:	e8 ef fc ff ff       	callq  0x7fd4769a4258
    7fd4769a4569:	49 8b f7             	mov    %r15,%rsi
    7fd4769a456c:	48 8b f8             	mov    %rax,%rdi
    7fd4769a456f:	48 89 85 f8 fe ff ff 	mov    %rax,-0x108(%rbp)
    7fd4769a4576:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a457b:	e8 d8 fc ff ff       	callq  0x7fd4769a4258
    7fd4769a4580:	49 8b f7             	mov    %r15,%rsi
    7fd4769a4583:	48 8b f8             	mov    %rax,%rdi
    7fd4769a4586:	48 89 85 f0 fe ff ff 	mov    %rax,-0x110(%rbp)
    7fd4769a458d:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a4592:	e8 c1 fc ff ff       	callq  0x7fd4769a4258
    7fd4769a4597:	49 8b f7             	mov    %r15,%rsi
    7fd4769a459a:	48 8b f8             	mov    %rax,%rdi
    7fd4769a459d:	48 89 85 e8 fe ff ff 	mov    %rax,-0x118(%rbp)
    7fd4769a45a4:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a45a9:	e8 aa fc ff ff       	callq  0x7fd4769a4258
    7fd4769a45ae:	49 8b f7             	mov    %r15,%rsi
    7fd4769a45b1:	48 8b f8             	mov    %rax,%rdi
    7fd4769a45b4:	48 89 85 e0 fe ff ff 	mov    %rax,-0x120(%rbp)
    7fd4769a45bb:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a45c0:	e8 93 fc ff ff       	callq  0x7fd4769a4258
    7fd4769a45c5:	49 8b f7             	mov    %r15,%rsi
    7fd4769a45c8:	48 8b f8             	mov    %rax,%rdi
    7fd4769a45cb:	48 89 85 d8 fe ff ff 	mov    %rax,-0x128(%rbp)
    7fd4769a45d2:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a45d7:	e8 7c fc ff ff       	callq  0x7fd4769a4258
    7fd4769a45dc:	49 8b f7             	mov    %r15,%rsi
    7fd4769a45df:	48 8b f8             	mov    %rax,%rdi
    7fd4769a45e2:	48 89 85 d0 fe ff ff 	mov    %rax,-0x130(%rbp)
    7fd4769a45e9:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a45ee:	e8 65 fc ff ff       	callq  0x7fd4769a4258
    7fd4769a45f3:	49 8b f7             	mov    %r15,%rsi
    7fd4769a45f6:	48 8b f8             	mov    %rax,%rdi
    7fd4769a45f9:	48 89 85 c8 fe ff ff 	mov    %rax,-0x138(%rbp)
    7fd4769a4600:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a4605:	e8 4e fc ff ff       	callq  0x7fd4769a4258
    7fd4769a460a:	49 8b f7             	mov    %r15,%rsi
    7fd4769a460d:	48 8b f8             	mov    %rax,%rdi
    7fd4769a4610:	48 89 85 c0 fe ff ff 	mov    %rax,-0x140(%rbp)
    7fd4769a4617:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a461c:	e8 37 fc ff ff       	callq  0x7fd4769a4258
    7fd4769a4621:	49 8b f7             	mov    %r15,%rsi
    7fd4769a4624:	48 8b f8             	mov    %rax,%rdi
    7fd4769a4627:	48 89 85 b8 fe ff ff 	mov    %rax,-0x148(%rbp)
    7fd4769a462e:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a4633:	e8 20 fc ff ff       	callq  0x7fd4769a4258
    7fd4769a4638:	49 8b f7             	mov    %r15,%rsi
    7fd4769a463b:	48 8b f8             	mov    %rax,%rdi
    7fd4769a463e:	48 89 85 b0 fe ff ff 	mov    %rax,-0x150(%rbp)
    7fd4769a4645:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a464a:	e8 09 fc ff ff       	callq  0x7fd4769a4258
    7fd4769a464f:	49 8b f7             	mov    %r15,%rsi
    7fd4769a4652:	48 8b f8             	mov    %rax,%rdi
    7fd4769a4655:	48 89 85 a8 fe ff ff 	mov    %rax,-0x158(%rbp)
    7fd4769a465c:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a4661:	e8 f2 fb ff ff       	callq  0x7fd4769a4258
    7fd4769a4666:	49 8b f7             	mov    %r15,%rsi
    7fd4769a4669:	48 8b f8             	mov    %rax,%rdi
    7fd4769a466c:	48 89 85 a0 fe ff ff 	mov    %rax,-0x160(%rbp)
    7fd4769a4673:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a4678:	e8 db fb ff ff       	callq  0x7fd4769a4258
    7fd4769a467d:	49 8b f7             	mov    %r15,%rsi
    7fd4769a4680:	48 8b f8             	mov    %rax,%rdi
    7fd4769a4683:	48 89 85 98 fe ff ff 	mov    %rax,-0x168(%rbp)
    7fd4769a468a:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a468f:	e8 c4 fb ff ff       	callq  0x7fd4769a4258
    7fd4769a4694:	49 8b f7             	mov    %r15,%rsi
    7fd4769a4697:	48 8b f8             	mov    %rax,%rdi
    7fd4769a469a:	48 89 85 90 fe ff ff 	mov    %rax,-0x170(%rbp)
    7fd4769a46a1:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a46a6:	e8 ad fb ff ff       	callq  0x7fd4769a4258
    7fd4769a46ab:	49 8b f7             	mov    %r15,%rsi
    7fd4769a46ae:	48 8b f8             	mov    %rax,%rdi
    7fd4769a46b1:	48 89 85 88 fe ff ff 	mov    %rax,-0x178(%rbp)
    7fd4769a46b8:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a46bd:	e8 96 fb ff ff       	callq  0x7fd4769a4258
    7fd4769a46c2:	49 8b f7             	mov    %r15,%rsi
    7fd4769a46c5:	48 8b f8             	mov    %rax,%rdi
    7fd4769a46c8:	48 89 85 80 fe ff ff 	mov    %rax,-0x180(%rbp)
    7fd4769a46cf:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a46d4:	e8 7f fb ff ff       	callq  0x7fd4769a4258
    7fd4769a46d9:	49 8b f7             	mov    %r15,%rsi
    7fd4769a46dc:	48 8b f8             	mov    %rax,%rdi
    7fd4769a46df:	48 89 85 78 fe ff ff 	mov    %rax,-0x188(%rbp)
    7fd4769a46e6:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a46eb:	e8 68 fb ff ff       	callq  0x7fd4769a4258
    7fd4769a46f0:	49 8b f7             	mov    %r15,%rsi
    7fd4769a46f3:	48 8b f8             	mov    %rax,%rdi
    7fd4769a46f6:	48 89 85 70 fe ff ff 	mov    %rax,-0x190(%rbp)
    7fd4769a46fd:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a4702:	e8 51 fb ff ff       	callq  0x7fd4769a4258
    7fd4769a4707:	49 8b f7             	mov    %r15,%rsi
    7fd4769a470a:	48 8b f8             	mov    %rax,%rdi
    7fd4769a470d:	48 89 85 68 fe ff ff 	mov    %rax,-0x198(%rbp)
    7fd4769a4714:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a4719:	e8 3a fb ff ff       	callq  0x7fd4769a4258
    7fd4769a471e:	49 8b f7             	mov    %r15,%rsi
    7fd4769a4721:	48 8b f8             	mov    %rax,%rdi
    7fd4769a4724:	48 89 85 60 fe ff ff 	mov    %rax,-0x1a0(%rbp)
    7fd4769a472b:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a4730:	e8 23 fb ff ff       	callq  0x7fd4769a4258
    7fd4769a4735:	49 8b f7             	mov    %r15,%rsi
    7fd4769a4738:	48 8b f8             	mov    %rax,%rdi
    7fd4769a473b:	48 89 85 58 fe ff ff 	mov    %rax,-0x1a8(%rbp)
    7fd4769a4742:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a4747:	e8 0c fb ff ff       	callq  0x7fd4769a4258
    7fd4769a474c:	49 8b f7             	mov    %r15,%rsi
    7fd4769a474f:	48 8b f8             	mov    %rax,%rdi
    7fd4769a4752:	48 89 85 50 fe ff ff 	mov    %rax,-0x1b0(%rbp)
    7fd4769a4759:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a475e:	e8 f5 fa ff ff       	callq  0x7fd4769a4258
    7fd4769a4763:	49 8b f7             	mov    %r15,%rsi
    7fd4769a4766:	48 8b f8             	mov    %rax,%rdi
    7fd4769a4769:	48 89 85 48 fe ff ff 	mov    %rax,-0x1b8(%rbp)
    7fd4769a4770:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a4775:	e8 de fa ff ff       	callq  0x7fd4769a4258
    7fd4769a477a:	49 8b f7             	mov    %r15,%rsi
    7fd4769a477d:	48 8b f8             	mov    %rax,%rdi
    7fd4769a4780:	48 89 85 40 fe ff ff 	mov    %rax,-0x1c0(%rbp)
    7fd4769a4787:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a478c:	e8 c7 fa ff ff       	callq  0x7fd4769a4258
    7fd4769a4791:	49 8b f7             	mov    %r15,%rsi
    7fd4769a4794:	48 8b f8             	mov    %rax,%rdi
    7fd4769a4797:	48 89 85 38 fe ff ff 	mov    %rax,-0x1c8(%rbp)
    7fd4769a479e:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a47a3:	e8 b0 fa ff ff       	callq  0x7fd4769a4258
    7fd4769a47a8:	49 8b f7             	mov    %r15,%rsi
    7fd4769a47ab:	48 8b f8             	mov    %rax,%rdi
    7fd4769a47ae:	48 89 85 30 fe ff ff 	mov    %rax,-0x1d0(%rbp)
    7fd4769a47b5:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a47ba:	e8 99 fa ff ff       	callq  0x7fd4769a4258
    7fd4769a47bf:	49 8b f7             	mov    %r15,%rsi
    7fd4769a47c2:	48 8b f8             	mov    %rax,%rdi
    7fd4769a47c5:	48 89 85 28 fe ff ff 	mov    %rax,-0x1d8(%rbp)
    7fd4769a47cc:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a47d1:	e8 82 fa ff ff       	callq  0x7fd4769a4258
    7fd4769a47d6:	49 8b f7             	mov    %r15,%rsi
    7fd4769a47d9:	48 8b f8             	mov    %rax,%rdi
    7fd4769a47dc:	48 89 85 20 fe ff ff 	mov    %rax,-0x1e0(%rbp)
    7fd4769a47e3:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a47e8:	e8 6b fa ff ff       	callq  0x7fd4769a4258
    7fd4769a47ed:	49 8b f7             	mov    %r15,%rsi
    7fd4769a47f0:	48 8b f8             	mov    %rax,%rdi
    7fd4769a47f3:	48 89 85 18 fe ff ff 	mov    %rax,-0x1e8(%rbp)
    7fd4769a47fa:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a47ff:	e8 54 fa ff ff       	callq  0x7fd4769a4258
    7fd4769a4804:	49 8b f7             	mov    %r15,%rsi
    7fd4769a4807:	48 8b f8             	mov    %rax,%rdi
    7fd4769a480a:	48 89 85 10 fe ff ff 	mov    %rax,-0x1f0(%rbp)
    7fd4769a4811:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a4816:	e8 3d fa ff ff       	callq  0x7fd4769a4258
    7fd4769a481b:	49 8b f7             	mov    %r15,%rsi
    7fd4769a481e:	48 8b f8             	mov    %rax,%rdi
    7fd4769a4821:	48 89 85 08 fe ff ff 	mov    %rax,-0x1f8(%rbp)
    7fd4769a4828:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a482d:	e8 26 fa ff ff       	callq  0x7fd4769a4258
    7fd4769a4832:	49 8b f7             	mov    %r15,%rsi
    7fd4769a4835:	48 8b f8             	mov    %rax,%rdi
    7fd4769a4838:	48 89 85 00 fe ff ff 	mov    %rax,-0x200(%rbp)
    7fd4769a483f:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a4844:	e8 0f fa ff ff       	callq  0x7fd4769a4258
    7fd4769a4849:	49 8b f7             	mov    %r15,%rsi
    7fd4769a484c:	48 8b f8             	mov    %rax,%rdi
    7fd4769a484f:	48 89 85 f8 fd ff ff 	mov    %rax,-0x208(%rbp)
    7fd4769a4856:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a485b:	e8 f8 f9 ff ff       	callq  0x7fd4769a4258
    7fd4769a4860:	49 8b f7             	mov    %r15,%rsi
    7fd4769a4863:	48 8b f8             	mov    %rax,%rdi
    7fd4769a4866:	48 89 85 f0 fd ff ff 	mov    %rax,-0x210(%rbp)
    7fd4769a486d:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a4872:	e8 e1 f9 ff ff       	callq  0x7fd4769a4258
    7fd4769a4877:	49 8b f7             	mov    %r15,%rsi
    7fd4769a487a:	48 8b f8             	mov    %rax,%rdi
    7fd4769a487d:	48 89 85 e8 fd ff ff 	mov    %rax,-0x218(%rbp)
    7fd4769a4884:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a4889:	e8 ca f9 ff ff       	callq  0x7fd4769a4258
    7fd4769a488e:	49 8b f7             	mov    %r15,%rsi
    7fd4769a4891:	48 8b f8             	mov    %rax,%rdi
    7fd4769a4894:	48 89 85 e0 fd ff ff 	mov    %rax,-0x220(%rbp)
    7fd4769a489b:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a48a0:	e8 b3 f9 ff ff       	callq  0x7fd4769a4258
    7fd4769a48a5:	49 8b f7             	mov    %r15,%rsi
    7fd4769a48a8:	48 8b f8             	mov    %rax,%rdi
    7fd4769a48ab:	48 89 85 d8 fd ff ff 	mov    %rax,-0x228(%rbp)
    7fd4769a48b2:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a48b7:	e8 9c f9 ff ff       	callq  0x7fd4769a4258
    7fd4769a48bc:	49 8b f7             	mov    %r15,%rsi
    7fd4769a48bf:	48 8b f8             	mov    %rax,%rdi
    7fd4769a48c2:	48 89 85 d0 fd ff ff 	mov    %rax,-0x230(%rbp)
    7fd4769a48c9:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a48ce:	e8 85 f9 ff ff       	callq  0x7fd4769a4258
    7fd4769a48d3:	49 8b f7             	mov    %r15,%rsi
    7fd4769a48d6:	48 8b f8             	mov    %rax,%rdi
    7fd4769a48d9:	48 89 85 c8 fd ff ff 	mov    %rax,-0x238(%rbp)
    7fd4769a48e0:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a48e5:	e8 6e f9 ff ff       	callq  0x7fd4769a4258
    7fd4769a48ea:	49 8b f7             	mov    %r15,%rsi
    7fd4769a48ed:	48 8b f8             	mov    %rax,%rdi
    7fd4769a48f0:	48 89 85 c0 fd ff ff 	mov    %rax,-0x240(%rbp)
    7fd4769a48f7:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a48fc:	e8 57 f9 ff ff       	callq  0x7fd4769a4258
    7fd4769a4901:	49 8b f7             	mov    %r15,%rsi
    7fd4769a4904:	48 8b f8             	mov    %rax,%rdi
    7fd4769a4907:	48 89 85 b8 fd ff ff 	mov    %rax,-0x248(%rbp)
    7fd4769a490e:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a4913:	e8 40 f9 ff ff       	callq  0x7fd4769a4258
    7fd4769a4918:	49 8b f7             	mov    %r15,%rsi
    7fd4769a491b:	48 8b f8             	mov    %rax,%rdi
    7fd4769a491e:	48 89 85 b0 fd ff ff 	mov    %rax,-0x250(%rbp)
    7fd4769a4925:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a492a:	e8 29 f9 ff ff       	callq  0x7fd4769a4258
    7fd4769a492f:	49 8b f7             	mov    %r15,%rsi
    7fd4769a4932:	48 8b f8             	mov    %rax,%rdi
    7fd4769a4935:	48 89 85 a8 fd ff ff 	mov    %rax,-0x258(%rbp)
    7fd4769a493c:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a4941:	e8 12 f9 ff ff       	callq  0x7fd4769a4258
    7fd4769a4946:	49 8b f7             	mov    %r15,%rsi
    7fd4769a4949:	48 8b f8             	mov    %rax,%rdi
    7fd4769a494c:	48 89 85 a0 fd ff ff 	mov    %rax,-0x260(%rbp)
    7fd4769a4953:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a4958:	e8 fb f8 ff ff       	callq  0x7fd4769a4258
    7fd4769a495d:	49 8b f7             	mov    %r15,%rsi
    7fd4769a4960:	48 8b f8             	mov    %rax,%rdi
    7fd4769a4963:	48 89 85 98 fd ff ff 	mov    %rax,-0x268(%rbp)
    7fd4769a496a:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a496f:	e8 e4 f8 ff ff       	callq  0x7fd4769a4258
    7fd4769a4974:	49 8b f7             	mov    %r15,%rsi
    7fd4769a4977:	48 8b f8             	mov    %rax,%rdi
    7fd4769a497a:	48 89 85 90 fd ff ff 	mov    %rax,-0x270(%rbp)
    7fd4769a4981:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a4986:	e8 cd f8 ff ff       	callq  0x7fd4769a4258
    7fd4769a498b:	49 8b f7             	mov    %r15,%rsi
    7fd4769a498e:	48 8b f8             	mov    %rax,%rdi
    7fd4769a4991:	48 89 85 88 fd ff ff 	mov    %rax,-0x278(%rbp)
    7fd4769a4998:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a499d:	e8 b6 f8 ff ff       	callq  0x7fd4769a4258
    7fd4769a49a2:	49 8b f7             	mov    %r15,%rsi
    7fd4769a49a5:	48 8b f8             	mov    %rax,%rdi
    7fd4769a49a8:	48 89 85 80 fd ff ff 	mov    %rax,-0x280(%rbp)
    7fd4769a49af:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a49b4:	e8 9f f8 ff ff       	callq  0x7fd4769a4258
    7fd4769a49b9:	49 8b f7             	mov    %r15,%rsi
    7fd4769a49bc:	48 8b f8             	mov    %rax,%rdi
    7fd4769a49bf:	48 89 85 78 fd ff ff 	mov    %rax,-0x288(%rbp)
    7fd4769a49c6:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a49cb:	e8 88 f8 ff ff       	callq  0x7fd4769a4258
    7fd4769a49d0:	49 8b f7             	mov    %r15,%rsi
    7fd4769a49d3:	48 8b f8             	mov    %rax,%rdi
    7fd4769a49d6:	48 89 85 70 fd ff ff 	mov    %rax,-0x290(%rbp)
    7fd4769a49dd:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a49e2:	e8 71 f8 ff ff       	callq  0x7fd4769a4258
    7fd4769a49e7:	49 8b f7             	mov    %r15,%rsi
    7fd4769a49ea:	48 8b f8             	mov    %rax,%rdi
    7fd4769a49ed:	48 89 85 68 fd ff ff 	mov    %rax,-0x298(%rbp)
    7fd4769a49f4:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a49f9:	e8 5a f8 ff ff       	callq  0x7fd4769a4258
    7fd4769a49fe:	49 8b f7             	mov    %r15,%rsi
    7fd4769a4a01:	48 8b f8             	mov    %rax,%rdi
    7fd4769a4a04:	48 89 85 60 fd ff ff 	mov    %rax,-0x2a0(%rbp)
    7fd4769a4a0b:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a4a10:	e8 43 f8 ff ff       	callq  0x7fd4769a4258
    7fd4769a4a15:	49 8b f7             	mov    %r15,%rsi
    7fd4769a4a18:	48 8b f8             	mov    %rax,%rdi
    7fd4769a4a1b:	48 89 85 58 fd ff ff 	mov    %rax,-0x2a8(%rbp)
    7fd4769a4a22:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a4a27:	e8 2c f8 ff ff       	callq  0x7fd4769a4258
    7fd4769a4a2c:	49 8b f7             	mov    %r15,%rsi
    7fd4769a4a2f:	48 8b f8             	mov    %rax,%rdi
    7fd4769a4a32:	48 89 85 50 fd ff ff 	mov    %rax,-0x2b0(%rbp)
    7fd4769a4a39:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a4a3e:	e8 15 f8 ff ff       	callq  0x7fd4769a4258
    7fd4769a4a43:	49 8b f7             	mov    %r15,%rsi
    7fd4769a4a46:	48 8b f8             	mov    %rax,%rdi
    7fd4769a4a49:	48 89 85 48 fd ff ff 	mov    %rax,-0x2b8(%rbp)
    7fd4769a4a50:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a4a55:	e8 fe f7 ff ff       	callq  0x7fd4769a4258
    7fd4769a4a5a:	49 8b f7             	mov    %r15,%rsi
    7fd4769a4a5d:	48 8b f8             	mov    %rax,%rdi
    7fd4769a4a60:	48 89 85 40 fd ff ff 	mov    %rax,-0x2c0(%rbp)
    7fd4769a4a67:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a4a6c:	e8 e7 f7 ff ff       	callq  0x7fd4769a4258
    7fd4769a4a71:	49 8b f7             	mov    %r15,%rsi
    7fd4769a4a74:	48 8b f8             	mov    %rax,%rdi
    7fd4769a4a77:	48 89 85 38 fd ff ff 	mov    %rax,-0x2c8(%rbp)
    7fd4769a4a7e:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a4a83:	e8 d0 f7 ff ff       	callq  0x7fd4769a4258
    7fd4769a4a88:	49 8b f7             	mov    %r15,%rsi
    7fd4769a4a8b:	48 8b f8             	mov    %rax,%rdi
    7fd4769a4a8e:	48 89 85 30 fd ff ff 	mov    %rax,-0x2d0(%rbp)
    7fd4769a4a95:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a4a9a:	e8 b9 f7 ff ff       	callq  0x7fd4769a4258
    7fd4769a4a9f:	49 8b f7             	mov    %r15,%rsi
    7fd4769a4aa2:	48 8b f8             	mov    %rax,%rdi
    7fd4769a4aa5:	48 89 85 28 fd ff ff 	mov    %rax,-0x2d8(%rbp)
    7fd4769a4aac:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a4ab1:	e8 a2 f7 ff ff       	callq  0x7fd4769a4258
    7fd4769a4ab6:	49 8b f7             	mov    %r15,%rsi
    7fd4769a4ab9:	48 8b f8             	mov    %rax,%rdi
    7fd4769a4abc:	48 89 85 20 fd ff ff 	mov    %rax,-0x2e0(%rbp)
    7fd4769a4ac3:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a4ac8:	e8 8b f7 ff ff       	callq  0x7fd4769a4258
    7fd4769a4acd:	49 8b f7             	mov    %r15,%rsi
    7fd4769a4ad0:	48 8b f8             	mov    %rax,%rdi
    7fd4769a4ad3:	48 89 85 18 fd ff ff 	mov    %rax,-0x2e8(%rbp)
    7fd4769a4ada:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a4adf:	e8 74 f7 ff ff       	callq  0x7fd4769a4258
    7fd4769a4ae4:	49 8b f7             	mov    %r15,%rsi
    7fd4769a4ae7:	48 8b f8             	mov    %rax,%rdi
    7fd4769a4aea:	48 89 85 10 fd ff ff 	mov    %rax,-0x2f0(%rbp)
    7fd4769a4af1:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a4af6:	e8 5d f7 ff ff       	callq  0x7fd4769a4258
    7fd4769a4afb:	49 8b f7             	mov    %r15,%rsi
    7fd4769a4afe:	48 8b f8             	mov    %rax,%rdi
    7fd4769a4b01:	48 89 85 08 fd ff ff 	mov    %rax,-0x2f8(%rbp)
    7fd4769a4b08:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a4b0d:	e8 46 f7 ff ff       	callq  0x7fd4769a4258
    7fd4769a4b12:	49 8b f7             	mov    %r15,%rsi
    7fd4769a4b15:	48 8b f8             	mov    %rax,%rdi
    7fd4769a4b18:	48 89 85 00 fd ff ff 	mov    %rax,-0x300(%rbp)
    7fd4769a4b1f:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a4b24:	e8 2f f7 ff ff       	callq  0x7fd4769a4258
    7fd4769a4b29:	49 8b f7             	mov    %r15,%rsi
    7fd4769a4b2c:	48 8b f8             	mov    %rax,%rdi
    7fd4769a4b2f:	48 89 85 f8 fc ff ff 	mov    %rax,-0x308(%rbp)
    7fd4769a4b36:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a4b3b:	e8 18 f7 ff ff       	callq  0x7fd4769a4258
    7fd4769a4b40:	49 8b f7             	mov    %r15,%rsi
    7fd4769a4b43:	48 8b f8             	mov    %rax,%rdi
    7fd4769a4b46:	48 89 85 f0 fc ff ff 	mov    %rax,-0x310(%rbp)
    7fd4769a4b4d:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a4b52:	e8 01 f7 ff ff       	callq  0x7fd4769a4258
    7fd4769a4b57:	49 8b f7             	mov    %r15,%rsi
    7fd4769a4b5a:	48 8b f8             	mov    %rax,%rdi
    7fd4769a4b5d:	48 89 85 e8 fc ff ff 	mov    %rax,-0x318(%rbp)
    7fd4769a4b64:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a4b69:	e8 ea f6 ff ff       	callq  0x7fd4769a4258
    7fd4769a4b6e:	49 8b f7             	mov    %r15,%rsi
    7fd4769a4b71:	48 8b f8             	mov    %rax,%rdi
    7fd4769a4b74:	48 89 85 e0 fc ff ff 	mov    %rax,-0x320(%rbp)
    7fd4769a4b7b:	b8 08 00 00 00       	mov    $0x8,%eax
    7fd4769a4b80:	e8 d3 f6 ff ff       	callq  0x7fd4769a4258
    7fd4769a4b85:	4c 8b 3c 24          	mov    (%rsp),%r15
    7fd4769a4b89:	48 8b e5             	mov    %rbp,%rsp
    7fd4769a4b8c:	5d                   	pop    %rbp
    7fd4769a4b8d:	c3                   	retq   

end

