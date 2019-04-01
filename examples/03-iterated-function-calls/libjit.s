function add(long, long) : long

/tmp/libjit-dump.o:     file format elf64-x86-64


Disassembly of section .text:

00007f1907d50258 <.text>:
    7f1907d50258:	55                   	push   %rbp
    7f1907d50259:	48 8b ec             	mov    %rsp,%rbp
    7f1907d5025c:	48 83 ec 10          	sub    $0x10,%rsp
    7f1907d50260:	48 89 7d f8          	mov    %rdi,-0x8(%rbp)
    7f1907d50264:	48 89 75 f0          	mov    %rsi,-0x10(%rbp)
    7f1907d50268:	48 8b 45 f8          	mov    -0x8(%rbp),%rax
    7f1907d5026c:	48 03 45 f0          	add    -0x10(%rbp),%rax
    7f1907d50270:	48 8b e5             	mov    %rbp,%rsp
    7f1907d50273:	5d                   	pop    %rbp
    7f1907d50274:	c3                   	retq   

end

function add100(long, long) : long

/tmp/libjit-dump.o:     file format elf64-x86-64


Disassembly of section .text:

00007f1907d502a6 <.text>:
    7f1907d502a6:	55                   	push   %rbp
    7f1907d502a7:	48 8b ec             	mov    %rsp,%rbp
    7f1907d502aa:	48 81 ec 30 03 00 00 	sub    $0x330,%rsp
    7f1907d502b1:	4c 89 3c 24          	mov    %r15,(%rsp)
    7f1907d502b5:	48 89 7d f8          	mov    %rdi,-0x8(%rbp)
    7f1907d502b9:	4c 8b fe             	mov    %rsi,%r15
    7f1907d502bc:	49 8b f7             	mov    %r15,%rsi
    7f1907d502bf:	48 8b 7d f8          	mov    -0x8(%rbp),%rdi
    7f1907d502c3:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d502c8:	e8 8b ff ff ff       	callq  0x7f1907d50258
    7f1907d502cd:	49 8b f7             	mov    %r15,%rsi
    7f1907d502d0:	48 8b f8             	mov    %rax,%rdi
    7f1907d502d3:	48 89 45 f0          	mov    %rax,-0x10(%rbp)
    7f1907d502d7:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d502dc:	e8 77 ff ff ff       	callq  0x7f1907d50258
    7f1907d502e1:	49 8b f7             	mov    %r15,%rsi
    7f1907d502e4:	48 8b f8             	mov    %rax,%rdi
    7f1907d502e7:	48 89 45 e8          	mov    %rax,-0x18(%rbp)
    7f1907d502eb:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d502f0:	e8 63 ff ff ff       	callq  0x7f1907d50258
    7f1907d502f5:	49 8b f7             	mov    %r15,%rsi
    7f1907d502f8:	48 8b f8             	mov    %rax,%rdi
    7f1907d502fb:	48 89 45 e0          	mov    %rax,-0x20(%rbp)
    7f1907d502ff:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d50304:	e8 4f ff ff ff       	callq  0x7f1907d50258
    7f1907d50309:	49 8b f7             	mov    %r15,%rsi
    7f1907d5030c:	48 8b f8             	mov    %rax,%rdi
    7f1907d5030f:	48 89 45 d8          	mov    %rax,-0x28(%rbp)
    7f1907d50313:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d50318:	e8 3b ff ff ff       	callq  0x7f1907d50258
    7f1907d5031d:	49 8b f7             	mov    %r15,%rsi
    7f1907d50320:	48 8b f8             	mov    %rax,%rdi
    7f1907d50323:	48 89 45 d0          	mov    %rax,-0x30(%rbp)
    7f1907d50327:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d5032c:	e8 27 ff ff ff       	callq  0x7f1907d50258
    7f1907d50331:	49 8b f7             	mov    %r15,%rsi
    7f1907d50334:	48 8b f8             	mov    %rax,%rdi
    7f1907d50337:	48 89 45 c8          	mov    %rax,-0x38(%rbp)
    7f1907d5033b:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d50340:	e8 13 ff ff ff       	callq  0x7f1907d50258
    7f1907d50345:	49 8b f7             	mov    %r15,%rsi
    7f1907d50348:	48 8b f8             	mov    %rax,%rdi
    7f1907d5034b:	48 89 45 c0          	mov    %rax,-0x40(%rbp)
    7f1907d5034f:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d50354:	e8 ff fe ff ff       	callq  0x7f1907d50258
    7f1907d50359:	49 8b f7             	mov    %r15,%rsi
    7f1907d5035c:	48 8b f8             	mov    %rax,%rdi
    7f1907d5035f:	48 89 45 b8          	mov    %rax,-0x48(%rbp)
    7f1907d50363:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d50368:	e8 eb fe ff ff       	callq  0x7f1907d50258
    7f1907d5036d:	49 8b f7             	mov    %r15,%rsi
    7f1907d50370:	48 8b f8             	mov    %rax,%rdi
    7f1907d50373:	48 89 45 b0          	mov    %rax,-0x50(%rbp)
    7f1907d50377:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d5037c:	e8 d7 fe ff ff       	callq  0x7f1907d50258
    7f1907d50381:	49 8b f7             	mov    %r15,%rsi
    7f1907d50384:	48 8b f8             	mov    %rax,%rdi
    7f1907d50387:	48 89 45 a8          	mov    %rax,-0x58(%rbp)
    7f1907d5038b:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d50390:	e8 c3 fe ff ff       	callq  0x7f1907d50258
    7f1907d50395:	49 8b f7             	mov    %r15,%rsi
    7f1907d50398:	48 8b f8             	mov    %rax,%rdi
    7f1907d5039b:	48 89 45 a0          	mov    %rax,-0x60(%rbp)
    7f1907d5039f:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d503a4:	e8 af fe ff ff       	callq  0x7f1907d50258
    7f1907d503a9:	49 8b f7             	mov    %r15,%rsi
    7f1907d503ac:	48 8b f8             	mov    %rax,%rdi
    7f1907d503af:	48 89 45 98          	mov    %rax,-0x68(%rbp)
    7f1907d503b3:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d503b8:	e8 9b fe ff ff       	callq  0x7f1907d50258
    7f1907d503bd:	49 8b f7             	mov    %r15,%rsi
    7f1907d503c0:	48 8b f8             	mov    %rax,%rdi
    7f1907d503c3:	48 89 45 90          	mov    %rax,-0x70(%rbp)
    7f1907d503c7:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d503cc:	e8 87 fe ff ff       	callq  0x7f1907d50258
    7f1907d503d1:	49 8b f7             	mov    %r15,%rsi
    7f1907d503d4:	48 8b f8             	mov    %rax,%rdi
    7f1907d503d7:	48 89 45 88          	mov    %rax,-0x78(%rbp)
    7f1907d503db:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d503e0:	e8 73 fe ff ff       	callq  0x7f1907d50258
    7f1907d503e5:	49 8b f7             	mov    %r15,%rsi
    7f1907d503e8:	48 8b f8             	mov    %rax,%rdi
    7f1907d503eb:	48 89 45 80          	mov    %rax,-0x80(%rbp)
    7f1907d503ef:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d503f4:	e8 5f fe ff ff       	callq  0x7f1907d50258
    7f1907d503f9:	49 8b f7             	mov    %r15,%rsi
    7f1907d503fc:	48 8b f8             	mov    %rax,%rdi
    7f1907d503ff:	48 89 85 78 ff ff ff 	mov    %rax,-0x88(%rbp)
    7f1907d50406:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d5040b:	e8 48 fe ff ff       	callq  0x7f1907d50258
    7f1907d50410:	49 8b f7             	mov    %r15,%rsi
    7f1907d50413:	48 8b f8             	mov    %rax,%rdi
    7f1907d50416:	48 89 85 70 ff ff ff 	mov    %rax,-0x90(%rbp)
    7f1907d5041d:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d50422:	e8 31 fe ff ff       	callq  0x7f1907d50258
    7f1907d50427:	49 8b f7             	mov    %r15,%rsi
    7f1907d5042a:	48 8b f8             	mov    %rax,%rdi
    7f1907d5042d:	48 89 85 68 ff ff ff 	mov    %rax,-0x98(%rbp)
    7f1907d50434:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d50439:	e8 1a fe ff ff       	callq  0x7f1907d50258
    7f1907d5043e:	49 8b f7             	mov    %r15,%rsi
    7f1907d50441:	48 8b f8             	mov    %rax,%rdi
    7f1907d50444:	48 89 85 60 ff ff ff 	mov    %rax,-0xa0(%rbp)
    7f1907d5044b:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d50450:	e8 03 fe ff ff       	callq  0x7f1907d50258
    7f1907d50455:	49 8b f7             	mov    %r15,%rsi
    7f1907d50458:	48 8b f8             	mov    %rax,%rdi
    7f1907d5045b:	48 89 85 58 ff ff ff 	mov    %rax,-0xa8(%rbp)
    7f1907d50462:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d50467:	e8 ec fd ff ff       	callq  0x7f1907d50258
    7f1907d5046c:	49 8b f7             	mov    %r15,%rsi
    7f1907d5046f:	48 8b f8             	mov    %rax,%rdi
    7f1907d50472:	48 89 85 50 ff ff ff 	mov    %rax,-0xb0(%rbp)
    7f1907d50479:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d5047e:	e8 d5 fd ff ff       	callq  0x7f1907d50258
    7f1907d50483:	49 8b f7             	mov    %r15,%rsi
    7f1907d50486:	48 8b f8             	mov    %rax,%rdi
    7f1907d50489:	48 89 85 48 ff ff ff 	mov    %rax,-0xb8(%rbp)
    7f1907d50490:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d50495:	e8 be fd ff ff       	callq  0x7f1907d50258
    7f1907d5049a:	49 8b f7             	mov    %r15,%rsi
    7f1907d5049d:	48 8b f8             	mov    %rax,%rdi
    7f1907d504a0:	48 89 85 40 ff ff ff 	mov    %rax,-0xc0(%rbp)
    7f1907d504a7:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d504ac:	e8 a7 fd ff ff       	callq  0x7f1907d50258
    7f1907d504b1:	49 8b f7             	mov    %r15,%rsi
    7f1907d504b4:	48 8b f8             	mov    %rax,%rdi
    7f1907d504b7:	48 89 85 38 ff ff ff 	mov    %rax,-0xc8(%rbp)
    7f1907d504be:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d504c3:	e8 90 fd ff ff       	callq  0x7f1907d50258
    7f1907d504c8:	49 8b f7             	mov    %r15,%rsi
    7f1907d504cb:	48 8b f8             	mov    %rax,%rdi
    7f1907d504ce:	48 89 85 30 ff ff ff 	mov    %rax,-0xd0(%rbp)
    7f1907d504d5:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d504da:	e8 79 fd ff ff       	callq  0x7f1907d50258
    7f1907d504df:	49 8b f7             	mov    %r15,%rsi
    7f1907d504e2:	48 8b f8             	mov    %rax,%rdi
    7f1907d504e5:	48 89 85 28 ff ff ff 	mov    %rax,-0xd8(%rbp)
    7f1907d504ec:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d504f1:	e8 62 fd ff ff       	callq  0x7f1907d50258
    7f1907d504f6:	49 8b f7             	mov    %r15,%rsi
    7f1907d504f9:	48 8b f8             	mov    %rax,%rdi
    7f1907d504fc:	48 89 85 20 ff ff ff 	mov    %rax,-0xe0(%rbp)
    7f1907d50503:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d50508:	e8 4b fd ff ff       	callq  0x7f1907d50258
    7f1907d5050d:	49 8b f7             	mov    %r15,%rsi
    7f1907d50510:	48 8b f8             	mov    %rax,%rdi
    7f1907d50513:	48 89 85 18 ff ff ff 	mov    %rax,-0xe8(%rbp)
    7f1907d5051a:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d5051f:	e8 34 fd ff ff       	callq  0x7f1907d50258
    7f1907d50524:	49 8b f7             	mov    %r15,%rsi
    7f1907d50527:	48 8b f8             	mov    %rax,%rdi
    7f1907d5052a:	48 89 85 10 ff ff ff 	mov    %rax,-0xf0(%rbp)
    7f1907d50531:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d50536:	e8 1d fd ff ff       	callq  0x7f1907d50258
    7f1907d5053b:	49 8b f7             	mov    %r15,%rsi
    7f1907d5053e:	48 8b f8             	mov    %rax,%rdi
    7f1907d50541:	48 89 85 08 ff ff ff 	mov    %rax,-0xf8(%rbp)
    7f1907d50548:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d5054d:	e8 06 fd ff ff       	callq  0x7f1907d50258
    7f1907d50552:	49 8b f7             	mov    %r15,%rsi
    7f1907d50555:	48 8b f8             	mov    %rax,%rdi
    7f1907d50558:	48 89 85 00 ff ff ff 	mov    %rax,-0x100(%rbp)
    7f1907d5055f:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d50564:	e8 ef fc ff ff       	callq  0x7f1907d50258
    7f1907d50569:	49 8b f7             	mov    %r15,%rsi
    7f1907d5056c:	48 8b f8             	mov    %rax,%rdi
    7f1907d5056f:	48 89 85 f8 fe ff ff 	mov    %rax,-0x108(%rbp)
    7f1907d50576:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d5057b:	e8 d8 fc ff ff       	callq  0x7f1907d50258
    7f1907d50580:	49 8b f7             	mov    %r15,%rsi
    7f1907d50583:	48 8b f8             	mov    %rax,%rdi
    7f1907d50586:	48 89 85 f0 fe ff ff 	mov    %rax,-0x110(%rbp)
    7f1907d5058d:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d50592:	e8 c1 fc ff ff       	callq  0x7f1907d50258
    7f1907d50597:	49 8b f7             	mov    %r15,%rsi
    7f1907d5059a:	48 8b f8             	mov    %rax,%rdi
    7f1907d5059d:	48 89 85 e8 fe ff ff 	mov    %rax,-0x118(%rbp)
    7f1907d505a4:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d505a9:	e8 aa fc ff ff       	callq  0x7f1907d50258
    7f1907d505ae:	49 8b f7             	mov    %r15,%rsi
    7f1907d505b1:	48 8b f8             	mov    %rax,%rdi
    7f1907d505b4:	48 89 85 e0 fe ff ff 	mov    %rax,-0x120(%rbp)
    7f1907d505bb:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d505c0:	e8 93 fc ff ff       	callq  0x7f1907d50258
    7f1907d505c5:	49 8b f7             	mov    %r15,%rsi
    7f1907d505c8:	48 8b f8             	mov    %rax,%rdi
    7f1907d505cb:	48 89 85 d8 fe ff ff 	mov    %rax,-0x128(%rbp)
    7f1907d505d2:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d505d7:	e8 7c fc ff ff       	callq  0x7f1907d50258
    7f1907d505dc:	49 8b f7             	mov    %r15,%rsi
    7f1907d505df:	48 8b f8             	mov    %rax,%rdi
    7f1907d505e2:	48 89 85 d0 fe ff ff 	mov    %rax,-0x130(%rbp)
    7f1907d505e9:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d505ee:	e8 65 fc ff ff       	callq  0x7f1907d50258
    7f1907d505f3:	49 8b f7             	mov    %r15,%rsi
    7f1907d505f6:	48 8b f8             	mov    %rax,%rdi
    7f1907d505f9:	48 89 85 c8 fe ff ff 	mov    %rax,-0x138(%rbp)
    7f1907d50600:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d50605:	e8 4e fc ff ff       	callq  0x7f1907d50258
    7f1907d5060a:	49 8b f7             	mov    %r15,%rsi
    7f1907d5060d:	48 8b f8             	mov    %rax,%rdi
    7f1907d50610:	48 89 85 c0 fe ff ff 	mov    %rax,-0x140(%rbp)
    7f1907d50617:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d5061c:	e8 37 fc ff ff       	callq  0x7f1907d50258
    7f1907d50621:	49 8b f7             	mov    %r15,%rsi
    7f1907d50624:	48 8b f8             	mov    %rax,%rdi
    7f1907d50627:	48 89 85 b8 fe ff ff 	mov    %rax,-0x148(%rbp)
    7f1907d5062e:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d50633:	e8 20 fc ff ff       	callq  0x7f1907d50258
    7f1907d50638:	49 8b f7             	mov    %r15,%rsi
    7f1907d5063b:	48 8b f8             	mov    %rax,%rdi
    7f1907d5063e:	48 89 85 b0 fe ff ff 	mov    %rax,-0x150(%rbp)
    7f1907d50645:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d5064a:	e8 09 fc ff ff       	callq  0x7f1907d50258
    7f1907d5064f:	49 8b f7             	mov    %r15,%rsi
    7f1907d50652:	48 8b f8             	mov    %rax,%rdi
    7f1907d50655:	48 89 85 a8 fe ff ff 	mov    %rax,-0x158(%rbp)
    7f1907d5065c:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d50661:	e8 f2 fb ff ff       	callq  0x7f1907d50258
    7f1907d50666:	49 8b f7             	mov    %r15,%rsi
    7f1907d50669:	48 8b f8             	mov    %rax,%rdi
    7f1907d5066c:	48 89 85 a0 fe ff ff 	mov    %rax,-0x160(%rbp)
    7f1907d50673:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d50678:	e8 db fb ff ff       	callq  0x7f1907d50258
    7f1907d5067d:	49 8b f7             	mov    %r15,%rsi
    7f1907d50680:	48 8b f8             	mov    %rax,%rdi
    7f1907d50683:	48 89 85 98 fe ff ff 	mov    %rax,-0x168(%rbp)
    7f1907d5068a:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d5068f:	e8 c4 fb ff ff       	callq  0x7f1907d50258
    7f1907d50694:	49 8b f7             	mov    %r15,%rsi
    7f1907d50697:	48 8b f8             	mov    %rax,%rdi
    7f1907d5069a:	48 89 85 90 fe ff ff 	mov    %rax,-0x170(%rbp)
    7f1907d506a1:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d506a6:	e8 ad fb ff ff       	callq  0x7f1907d50258
    7f1907d506ab:	49 8b f7             	mov    %r15,%rsi
    7f1907d506ae:	48 8b f8             	mov    %rax,%rdi
    7f1907d506b1:	48 89 85 88 fe ff ff 	mov    %rax,-0x178(%rbp)
    7f1907d506b8:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d506bd:	e8 96 fb ff ff       	callq  0x7f1907d50258
    7f1907d506c2:	49 8b f7             	mov    %r15,%rsi
    7f1907d506c5:	48 8b f8             	mov    %rax,%rdi
    7f1907d506c8:	48 89 85 80 fe ff ff 	mov    %rax,-0x180(%rbp)
    7f1907d506cf:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d506d4:	e8 7f fb ff ff       	callq  0x7f1907d50258
    7f1907d506d9:	49 8b f7             	mov    %r15,%rsi
    7f1907d506dc:	48 8b f8             	mov    %rax,%rdi
    7f1907d506df:	48 89 85 78 fe ff ff 	mov    %rax,-0x188(%rbp)
    7f1907d506e6:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d506eb:	e8 68 fb ff ff       	callq  0x7f1907d50258
    7f1907d506f0:	49 8b f7             	mov    %r15,%rsi
    7f1907d506f3:	48 8b f8             	mov    %rax,%rdi
    7f1907d506f6:	48 89 85 70 fe ff ff 	mov    %rax,-0x190(%rbp)
    7f1907d506fd:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d50702:	e8 51 fb ff ff       	callq  0x7f1907d50258
    7f1907d50707:	49 8b f7             	mov    %r15,%rsi
    7f1907d5070a:	48 8b f8             	mov    %rax,%rdi
    7f1907d5070d:	48 89 85 68 fe ff ff 	mov    %rax,-0x198(%rbp)
    7f1907d50714:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d50719:	e8 3a fb ff ff       	callq  0x7f1907d50258
    7f1907d5071e:	49 8b f7             	mov    %r15,%rsi
    7f1907d50721:	48 8b f8             	mov    %rax,%rdi
    7f1907d50724:	48 89 85 60 fe ff ff 	mov    %rax,-0x1a0(%rbp)
    7f1907d5072b:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d50730:	e8 23 fb ff ff       	callq  0x7f1907d50258
    7f1907d50735:	49 8b f7             	mov    %r15,%rsi
    7f1907d50738:	48 8b f8             	mov    %rax,%rdi
    7f1907d5073b:	48 89 85 58 fe ff ff 	mov    %rax,-0x1a8(%rbp)
    7f1907d50742:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d50747:	e8 0c fb ff ff       	callq  0x7f1907d50258
    7f1907d5074c:	49 8b f7             	mov    %r15,%rsi
    7f1907d5074f:	48 8b f8             	mov    %rax,%rdi
    7f1907d50752:	48 89 85 50 fe ff ff 	mov    %rax,-0x1b0(%rbp)
    7f1907d50759:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d5075e:	e8 f5 fa ff ff       	callq  0x7f1907d50258
    7f1907d50763:	49 8b f7             	mov    %r15,%rsi
    7f1907d50766:	48 8b f8             	mov    %rax,%rdi
    7f1907d50769:	48 89 85 48 fe ff ff 	mov    %rax,-0x1b8(%rbp)
    7f1907d50770:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d50775:	e8 de fa ff ff       	callq  0x7f1907d50258
    7f1907d5077a:	49 8b f7             	mov    %r15,%rsi
    7f1907d5077d:	48 8b f8             	mov    %rax,%rdi
    7f1907d50780:	48 89 85 40 fe ff ff 	mov    %rax,-0x1c0(%rbp)
    7f1907d50787:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d5078c:	e8 c7 fa ff ff       	callq  0x7f1907d50258
    7f1907d50791:	49 8b f7             	mov    %r15,%rsi
    7f1907d50794:	48 8b f8             	mov    %rax,%rdi
    7f1907d50797:	48 89 85 38 fe ff ff 	mov    %rax,-0x1c8(%rbp)
    7f1907d5079e:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d507a3:	e8 b0 fa ff ff       	callq  0x7f1907d50258
    7f1907d507a8:	49 8b f7             	mov    %r15,%rsi
    7f1907d507ab:	48 8b f8             	mov    %rax,%rdi
    7f1907d507ae:	48 89 85 30 fe ff ff 	mov    %rax,-0x1d0(%rbp)
    7f1907d507b5:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d507ba:	e8 99 fa ff ff       	callq  0x7f1907d50258
    7f1907d507bf:	49 8b f7             	mov    %r15,%rsi
    7f1907d507c2:	48 8b f8             	mov    %rax,%rdi
    7f1907d507c5:	48 89 85 28 fe ff ff 	mov    %rax,-0x1d8(%rbp)
    7f1907d507cc:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d507d1:	e8 82 fa ff ff       	callq  0x7f1907d50258
    7f1907d507d6:	49 8b f7             	mov    %r15,%rsi
    7f1907d507d9:	48 8b f8             	mov    %rax,%rdi
    7f1907d507dc:	48 89 85 20 fe ff ff 	mov    %rax,-0x1e0(%rbp)
    7f1907d507e3:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d507e8:	e8 6b fa ff ff       	callq  0x7f1907d50258
    7f1907d507ed:	49 8b f7             	mov    %r15,%rsi
    7f1907d507f0:	48 8b f8             	mov    %rax,%rdi
    7f1907d507f3:	48 89 85 18 fe ff ff 	mov    %rax,-0x1e8(%rbp)
    7f1907d507fa:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d507ff:	e8 54 fa ff ff       	callq  0x7f1907d50258
    7f1907d50804:	49 8b f7             	mov    %r15,%rsi
    7f1907d50807:	48 8b f8             	mov    %rax,%rdi
    7f1907d5080a:	48 89 85 10 fe ff ff 	mov    %rax,-0x1f0(%rbp)
    7f1907d50811:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d50816:	e8 3d fa ff ff       	callq  0x7f1907d50258
    7f1907d5081b:	49 8b f7             	mov    %r15,%rsi
    7f1907d5081e:	48 8b f8             	mov    %rax,%rdi
    7f1907d50821:	48 89 85 08 fe ff ff 	mov    %rax,-0x1f8(%rbp)
    7f1907d50828:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d5082d:	e8 26 fa ff ff       	callq  0x7f1907d50258
    7f1907d50832:	49 8b f7             	mov    %r15,%rsi
    7f1907d50835:	48 8b f8             	mov    %rax,%rdi
    7f1907d50838:	48 89 85 00 fe ff ff 	mov    %rax,-0x200(%rbp)
    7f1907d5083f:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d50844:	e8 0f fa ff ff       	callq  0x7f1907d50258
    7f1907d50849:	49 8b f7             	mov    %r15,%rsi
    7f1907d5084c:	48 8b f8             	mov    %rax,%rdi
    7f1907d5084f:	48 89 85 f8 fd ff ff 	mov    %rax,-0x208(%rbp)
    7f1907d50856:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d5085b:	e8 f8 f9 ff ff       	callq  0x7f1907d50258
    7f1907d50860:	49 8b f7             	mov    %r15,%rsi
    7f1907d50863:	48 8b f8             	mov    %rax,%rdi
    7f1907d50866:	48 89 85 f0 fd ff ff 	mov    %rax,-0x210(%rbp)
    7f1907d5086d:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d50872:	e8 e1 f9 ff ff       	callq  0x7f1907d50258
    7f1907d50877:	49 8b f7             	mov    %r15,%rsi
    7f1907d5087a:	48 8b f8             	mov    %rax,%rdi
    7f1907d5087d:	48 89 85 e8 fd ff ff 	mov    %rax,-0x218(%rbp)
    7f1907d50884:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d50889:	e8 ca f9 ff ff       	callq  0x7f1907d50258
    7f1907d5088e:	49 8b f7             	mov    %r15,%rsi
    7f1907d50891:	48 8b f8             	mov    %rax,%rdi
    7f1907d50894:	48 89 85 e0 fd ff ff 	mov    %rax,-0x220(%rbp)
    7f1907d5089b:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d508a0:	e8 b3 f9 ff ff       	callq  0x7f1907d50258
    7f1907d508a5:	49 8b f7             	mov    %r15,%rsi
    7f1907d508a8:	48 8b f8             	mov    %rax,%rdi
    7f1907d508ab:	48 89 85 d8 fd ff ff 	mov    %rax,-0x228(%rbp)
    7f1907d508b2:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d508b7:	e8 9c f9 ff ff       	callq  0x7f1907d50258
    7f1907d508bc:	49 8b f7             	mov    %r15,%rsi
    7f1907d508bf:	48 8b f8             	mov    %rax,%rdi
    7f1907d508c2:	48 89 85 d0 fd ff ff 	mov    %rax,-0x230(%rbp)
    7f1907d508c9:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d508ce:	e8 85 f9 ff ff       	callq  0x7f1907d50258
    7f1907d508d3:	49 8b f7             	mov    %r15,%rsi
    7f1907d508d6:	48 8b f8             	mov    %rax,%rdi
    7f1907d508d9:	48 89 85 c8 fd ff ff 	mov    %rax,-0x238(%rbp)
    7f1907d508e0:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d508e5:	e8 6e f9 ff ff       	callq  0x7f1907d50258
    7f1907d508ea:	49 8b f7             	mov    %r15,%rsi
    7f1907d508ed:	48 8b f8             	mov    %rax,%rdi
    7f1907d508f0:	48 89 85 c0 fd ff ff 	mov    %rax,-0x240(%rbp)
    7f1907d508f7:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d508fc:	e8 57 f9 ff ff       	callq  0x7f1907d50258
    7f1907d50901:	49 8b f7             	mov    %r15,%rsi
    7f1907d50904:	48 8b f8             	mov    %rax,%rdi
    7f1907d50907:	48 89 85 b8 fd ff ff 	mov    %rax,-0x248(%rbp)
    7f1907d5090e:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d50913:	e8 40 f9 ff ff       	callq  0x7f1907d50258
    7f1907d50918:	49 8b f7             	mov    %r15,%rsi
    7f1907d5091b:	48 8b f8             	mov    %rax,%rdi
    7f1907d5091e:	48 89 85 b0 fd ff ff 	mov    %rax,-0x250(%rbp)
    7f1907d50925:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d5092a:	e8 29 f9 ff ff       	callq  0x7f1907d50258
    7f1907d5092f:	49 8b f7             	mov    %r15,%rsi
    7f1907d50932:	48 8b f8             	mov    %rax,%rdi
    7f1907d50935:	48 89 85 a8 fd ff ff 	mov    %rax,-0x258(%rbp)
    7f1907d5093c:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d50941:	e8 12 f9 ff ff       	callq  0x7f1907d50258
    7f1907d50946:	49 8b f7             	mov    %r15,%rsi
    7f1907d50949:	48 8b f8             	mov    %rax,%rdi
    7f1907d5094c:	48 89 85 a0 fd ff ff 	mov    %rax,-0x260(%rbp)
    7f1907d50953:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d50958:	e8 fb f8 ff ff       	callq  0x7f1907d50258
    7f1907d5095d:	49 8b f7             	mov    %r15,%rsi
    7f1907d50960:	48 8b f8             	mov    %rax,%rdi
    7f1907d50963:	48 89 85 98 fd ff ff 	mov    %rax,-0x268(%rbp)
    7f1907d5096a:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d5096f:	e8 e4 f8 ff ff       	callq  0x7f1907d50258
    7f1907d50974:	49 8b f7             	mov    %r15,%rsi
    7f1907d50977:	48 8b f8             	mov    %rax,%rdi
    7f1907d5097a:	48 89 85 90 fd ff ff 	mov    %rax,-0x270(%rbp)
    7f1907d50981:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d50986:	e8 cd f8 ff ff       	callq  0x7f1907d50258
    7f1907d5098b:	49 8b f7             	mov    %r15,%rsi
    7f1907d5098e:	48 8b f8             	mov    %rax,%rdi
    7f1907d50991:	48 89 85 88 fd ff ff 	mov    %rax,-0x278(%rbp)
    7f1907d50998:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d5099d:	e8 b6 f8 ff ff       	callq  0x7f1907d50258
    7f1907d509a2:	49 8b f7             	mov    %r15,%rsi
    7f1907d509a5:	48 8b f8             	mov    %rax,%rdi
    7f1907d509a8:	48 89 85 80 fd ff ff 	mov    %rax,-0x280(%rbp)
    7f1907d509af:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d509b4:	e8 9f f8 ff ff       	callq  0x7f1907d50258
    7f1907d509b9:	49 8b f7             	mov    %r15,%rsi
    7f1907d509bc:	48 8b f8             	mov    %rax,%rdi
    7f1907d509bf:	48 89 85 78 fd ff ff 	mov    %rax,-0x288(%rbp)
    7f1907d509c6:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d509cb:	e8 88 f8 ff ff       	callq  0x7f1907d50258
    7f1907d509d0:	49 8b f7             	mov    %r15,%rsi
    7f1907d509d3:	48 8b f8             	mov    %rax,%rdi
    7f1907d509d6:	48 89 85 70 fd ff ff 	mov    %rax,-0x290(%rbp)
    7f1907d509dd:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d509e2:	e8 71 f8 ff ff       	callq  0x7f1907d50258
    7f1907d509e7:	49 8b f7             	mov    %r15,%rsi
    7f1907d509ea:	48 8b f8             	mov    %rax,%rdi
    7f1907d509ed:	48 89 85 68 fd ff ff 	mov    %rax,-0x298(%rbp)
    7f1907d509f4:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d509f9:	e8 5a f8 ff ff       	callq  0x7f1907d50258
    7f1907d509fe:	49 8b f7             	mov    %r15,%rsi
    7f1907d50a01:	48 8b f8             	mov    %rax,%rdi
    7f1907d50a04:	48 89 85 60 fd ff ff 	mov    %rax,-0x2a0(%rbp)
    7f1907d50a0b:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d50a10:	e8 43 f8 ff ff       	callq  0x7f1907d50258
    7f1907d50a15:	49 8b f7             	mov    %r15,%rsi
    7f1907d50a18:	48 8b f8             	mov    %rax,%rdi
    7f1907d50a1b:	48 89 85 58 fd ff ff 	mov    %rax,-0x2a8(%rbp)
    7f1907d50a22:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d50a27:	e8 2c f8 ff ff       	callq  0x7f1907d50258
    7f1907d50a2c:	49 8b f7             	mov    %r15,%rsi
    7f1907d50a2f:	48 8b f8             	mov    %rax,%rdi
    7f1907d50a32:	48 89 85 50 fd ff ff 	mov    %rax,-0x2b0(%rbp)
    7f1907d50a39:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d50a3e:	e8 15 f8 ff ff       	callq  0x7f1907d50258
    7f1907d50a43:	49 8b f7             	mov    %r15,%rsi
    7f1907d50a46:	48 8b f8             	mov    %rax,%rdi
    7f1907d50a49:	48 89 85 48 fd ff ff 	mov    %rax,-0x2b8(%rbp)
    7f1907d50a50:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d50a55:	e8 fe f7 ff ff       	callq  0x7f1907d50258
    7f1907d50a5a:	49 8b f7             	mov    %r15,%rsi
    7f1907d50a5d:	48 8b f8             	mov    %rax,%rdi
    7f1907d50a60:	48 89 85 40 fd ff ff 	mov    %rax,-0x2c0(%rbp)
    7f1907d50a67:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d50a6c:	e8 e7 f7 ff ff       	callq  0x7f1907d50258
    7f1907d50a71:	49 8b f7             	mov    %r15,%rsi
    7f1907d50a74:	48 8b f8             	mov    %rax,%rdi
    7f1907d50a77:	48 89 85 38 fd ff ff 	mov    %rax,-0x2c8(%rbp)
    7f1907d50a7e:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d50a83:	e8 d0 f7 ff ff       	callq  0x7f1907d50258
    7f1907d50a88:	49 8b f7             	mov    %r15,%rsi
    7f1907d50a8b:	48 8b f8             	mov    %rax,%rdi
    7f1907d50a8e:	48 89 85 30 fd ff ff 	mov    %rax,-0x2d0(%rbp)
    7f1907d50a95:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d50a9a:	e8 b9 f7 ff ff       	callq  0x7f1907d50258
    7f1907d50a9f:	49 8b f7             	mov    %r15,%rsi
    7f1907d50aa2:	48 8b f8             	mov    %rax,%rdi
    7f1907d50aa5:	48 89 85 28 fd ff ff 	mov    %rax,-0x2d8(%rbp)
    7f1907d50aac:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d50ab1:	e8 a2 f7 ff ff       	callq  0x7f1907d50258
    7f1907d50ab6:	49 8b f7             	mov    %r15,%rsi
    7f1907d50ab9:	48 8b f8             	mov    %rax,%rdi
    7f1907d50abc:	48 89 85 20 fd ff ff 	mov    %rax,-0x2e0(%rbp)
    7f1907d50ac3:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d50ac8:	e8 8b f7 ff ff       	callq  0x7f1907d50258
    7f1907d50acd:	49 8b f7             	mov    %r15,%rsi
    7f1907d50ad0:	48 8b f8             	mov    %rax,%rdi
    7f1907d50ad3:	48 89 85 18 fd ff ff 	mov    %rax,-0x2e8(%rbp)
    7f1907d50ada:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d50adf:	e8 74 f7 ff ff       	callq  0x7f1907d50258
    7f1907d50ae4:	49 8b f7             	mov    %r15,%rsi
    7f1907d50ae7:	48 8b f8             	mov    %rax,%rdi
    7f1907d50aea:	48 89 85 10 fd ff ff 	mov    %rax,-0x2f0(%rbp)
    7f1907d50af1:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d50af6:	e8 5d f7 ff ff       	callq  0x7f1907d50258
    7f1907d50afb:	49 8b f7             	mov    %r15,%rsi
    7f1907d50afe:	48 8b f8             	mov    %rax,%rdi
    7f1907d50b01:	48 89 85 08 fd ff ff 	mov    %rax,-0x2f8(%rbp)
    7f1907d50b08:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d50b0d:	e8 46 f7 ff ff       	callq  0x7f1907d50258
    7f1907d50b12:	49 8b f7             	mov    %r15,%rsi
    7f1907d50b15:	48 8b f8             	mov    %rax,%rdi
    7f1907d50b18:	48 89 85 00 fd ff ff 	mov    %rax,-0x300(%rbp)
    7f1907d50b1f:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d50b24:	e8 2f f7 ff ff       	callq  0x7f1907d50258
    7f1907d50b29:	49 8b f7             	mov    %r15,%rsi
    7f1907d50b2c:	48 8b f8             	mov    %rax,%rdi
    7f1907d50b2f:	48 89 85 f8 fc ff ff 	mov    %rax,-0x308(%rbp)
    7f1907d50b36:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d50b3b:	e8 18 f7 ff ff       	callq  0x7f1907d50258
    7f1907d50b40:	49 8b f7             	mov    %r15,%rsi
    7f1907d50b43:	48 8b f8             	mov    %rax,%rdi
    7f1907d50b46:	48 89 85 f0 fc ff ff 	mov    %rax,-0x310(%rbp)
    7f1907d50b4d:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d50b52:	e8 01 f7 ff ff       	callq  0x7f1907d50258
    7f1907d50b57:	49 8b f7             	mov    %r15,%rsi
    7f1907d50b5a:	48 8b f8             	mov    %rax,%rdi
    7f1907d50b5d:	48 89 85 e8 fc ff ff 	mov    %rax,-0x318(%rbp)
    7f1907d50b64:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d50b69:	e8 ea f6 ff ff       	callq  0x7f1907d50258
    7f1907d50b6e:	49 8b f7             	mov    %r15,%rsi
    7f1907d50b71:	48 8b f8             	mov    %rax,%rdi
    7f1907d50b74:	48 89 85 e0 fc ff ff 	mov    %rax,-0x320(%rbp)
    7f1907d50b7b:	b8 08 00 00 00       	mov    $0x8,%eax
    7f1907d50b80:	e8 d3 f6 ff ff       	callq  0x7f1907d50258
    7f1907d50b85:	4c 8b 3c 24          	mov    (%rsp),%r15
    7f1907d50b89:	48 8b e5             	mov    %rbp,%rsp
    7f1907d50b8c:	5d                   	pop    %rbp
    7f1907d50b8d:	c3                   	retq   

end

