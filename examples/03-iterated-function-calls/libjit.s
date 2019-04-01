function add(long, long) : long

/tmp/libjit-dump.o:     file format elf64-x86-64


Disassembly of section .text:

00007f517a971258 <.text>:
    7f517a971258:	55                   	push   %rbp
    7f517a971259:	48 8b ec             	mov    %rsp,%rbp
    7f517a97125c:	48 83 ec 10          	sub    $0x10,%rsp
    7f517a971260:	48 89 7d f8          	mov    %rdi,-0x8(%rbp)
    7f517a971264:	48 89 75 f0          	mov    %rsi,-0x10(%rbp)
    7f517a971268:	48 8b 45 f8          	mov    -0x8(%rbp),%rax
    7f517a97126c:	48 03 45 f0          	add    -0x10(%rbp),%rax
    7f517a971270:	48 8b e5             	mov    %rbp,%rsp
    7f517a971273:	5d                   	pop    %rbp
    7f517a971274:	c3                   	retq   

end

function add100(long, long) : long

/tmp/libjit-dump.o:     file format elf64-x86-64


Disassembly of section .text:

00007f517a9712a6 <.text>:
    7f517a9712a6:	55                   	push   %rbp
    7f517a9712a7:	48 8b ec             	mov    %rsp,%rbp
    7f517a9712aa:	48 81 ec 30 03 00 00 	sub    $0x330,%rsp
    7f517a9712b1:	4c 89 3c 24          	mov    %r15,(%rsp)
    7f517a9712b5:	48 89 7d f8          	mov    %rdi,-0x8(%rbp)
    7f517a9712b9:	4c 8b fe             	mov    %rsi,%r15
    7f517a9712bc:	49 8b f7             	mov    %r15,%rsi
    7f517a9712bf:	48 8b 7d f8          	mov    -0x8(%rbp),%rdi
    7f517a9712c3:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a9712c8:	e8 8b ff ff ff       	callq  0x7f517a971258
    7f517a9712cd:	49 8b f7             	mov    %r15,%rsi
    7f517a9712d0:	48 8b f8             	mov    %rax,%rdi
    7f517a9712d3:	48 89 45 f0          	mov    %rax,-0x10(%rbp)
    7f517a9712d7:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a9712dc:	e8 77 ff ff ff       	callq  0x7f517a971258
    7f517a9712e1:	49 8b f7             	mov    %r15,%rsi
    7f517a9712e4:	48 8b f8             	mov    %rax,%rdi
    7f517a9712e7:	48 89 45 e8          	mov    %rax,-0x18(%rbp)
    7f517a9712eb:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a9712f0:	e8 63 ff ff ff       	callq  0x7f517a971258
    7f517a9712f5:	49 8b f7             	mov    %r15,%rsi
    7f517a9712f8:	48 8b f8             	mov    %rax,%rdi
    7f517a9712fb:	48 89 45 e0          	mov    %rax,-0x20(%rbp)
    7f517a9712ff:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a971304:	e8 4f ff ff ff       	callq  0x7f517a971258
    7f517a971309:	49 8b f7             	mov    %r15,%rsi
    7f517a97130c:	48 8b f8             	mov    %rax,%rdi
    7f517a97130f:	48 89 45 d8          	mov    %rax,-0x28(%rbp)
    7f517a971313:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a971318:	e8 3b ff ff ff       	callq  0x7f517a971258
    7f517a97131d:	49 8b f7             	mov    %r15,%rsi
    7f517a971320:	48 8b f8             	mov    %rax,%rdi
    7f517a971323:	48 89 45 d0          	mov    %rax,-0x30(%rbp)
    7f517a971327:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a97132c:	e8 27 ff ff ff       	callq  0x7f517a971258
    7f517a971331:	49 8b f7             	mov    %r15,%rsi
    7f517a971334:	48 8b f8             	mov    %rax,%rdi
    7f517a971337:	48 89 45 c8          	mov    %rax,-0x38(%rbp)
    7f517a97133b:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a971340:	e8 13 ff ff ff       	callq  0x7f517a971258
    7f517a971345:	49 8b f7             	mov    %r15,%rsi
    7f517a971348:	48 8b f8             	mov    %rax,%rdi
    7f517a97134b:	48 89 45 c0          	mov    %rax,-0x40(%rbp)
    7f517a97134f:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a971354:	e8 ff fe ff ff       	callq  0x7f517a971258
    7f517a971359:	49 8b f7             	mov    %r15,%rsi
    7f517a97135c:	48 8b f8             	mov    %rax,%rdi
    7f517a97135f:	48 89 45 b8          	mov    %rax,-0x48(%rbp)
    7f517a971363:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a971368:	e8 eb fe ff ff       	callq  0x7f517a971258
    7f517a97136d:	49 8b f7             	mov    %r15,%rsi
    7f517a971370:	48 8b f8             	mov    %rax,%rdi
    7f517a971373:	48 89 45 b0          	mov    %rax,-0x50(%rbp)
    7f517a971377:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a97137c:	e8 d7 fe ff ff       	callq  0x7f517a971258
    7f517a971381:	49 8b f7             	mov    %r15,%rsi
    7f517a971384:	48 8b f8             	mov    %rax,%rdi
    7f517a971387:	48 89 45 a8          	mov    %rax,-0x58(%rbp)
    7f517a97138b:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a971390:	e8 c3 fe ff ff       	callq  0x7f517a971258
    7f517a971395:	49 8b f7             	mov    %r15,%rsi
    7f517a971398:	48 8b f8             	mov    %rax,%rdi
    7f517a97139b:	48 89 45 a0          	mov    %rax,-0x60(%rbp)
    7f517a97139f:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a9713a4:	e8 af fe ff ff       	callq  0x7f517a971258
    7f517a9713a9:	49 8b f7             	mov    %r15,%rsi
    7f517a9713ac:	48 8b f8             	mov    %rax,%rdi
    7f517a9713af:	48 89 45 98          	mov    %rax,-0x68(%rbp)
    7f517a9713b3:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a9713b8:	e8 9b fe ff ff       	callq  0x7f517a971258
    7f517a9713bd:	49 8b f7             	mov    %r15,%rsi
    7f517a9713c0:	48 8b f8             	mov    %rax,%rdi
    7f517a9713c3:	48 89 45 90          	mov    %rax,-0x70(%rbp)
    7f517a9713c7:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a9713cc:	e8 87 fe ff ff       	callq  0x7f517a971258
    7f517a9713d1:	49 8b f7             	mov    %r15,%rsi
    7f517a9713d4:	48 8b f8             	mov    %rax,%rdi
    7f517a9713d7:	48 89 45 88          	mov    %rax,-0x78(%rbp)
    7f517a9713db:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a9713e0:	e8 73 fe ff ff       	callq  0x7f517a971258
    7f517a9713e5:	49 8b f7             	mov    %r15,%rsi
    7f517a9713e8:	48 8b f8             	mov    %rax,%rdi
    7f517a9713eb:	48 89 45 80          	mov    %rax,-0x80(%rbp)
    7f517a9713ef:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a9713f4:	e8 5f fe ff ff       	callq  0x7f517a971258
    7f517a9713f9:	49 8b f7             	mov    %r15,%rsi
    7f517a9713fc:	48 8b f8             	mov    %rax,%rdi
    7f517a9713ff:	48 89 85 78 ff ff ff 	mov    %rax,-0x88(%rbp)
    7f517a971406:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a97140b:	e8 48 fe ff ff       	callq  0x7f517a971258
    7f517a971410:	49 8b f7             	mov    %r15,%rsi
    7f517a971413:	48 8b f8             	mov    %rax,%rdi
    7f517a971416:	48 89 85 70 ff ff ff 	mov    %rax,-0x90(%rbp)
    7f517a97141d:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a971422:	e8 31 fe ff ff       	callq  0x7f517a971258
    7f517a971427:	49 8b f7             	mov    %r15,%rsi
    7f517a97142a:	48 8b f8             	mov    %rax,%rdi
    7f517a97142d:	48 89 85 68 ff ff ff 	mov    %rax,-0x98(%rbp)
    7f517a971434:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a971439:	e8 1a fe ff ff       	callq  0x7f517a971258
    7f517a97143e:	49 8b f7             	mov    %r15,%rsi
    7f517a971441:	48 8b f8             	mov    %rax,%rdi
    7f517a971444:	48 89 85 60 ff ff ff 	mov    %rax,-0xa0(%rbp)
    7f517a97144b:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a971450:	e8 03 fe ff ff       	callq  0x7f517a971258
    7f517a971455:	49 8b f7             	mov    %r15,%rsi
    7f517a971458:	48 8b f8             	mov    %rax,%rdi
    7f517a97145b:	48 89 85 58 ff ff ff 	mov    %rax,-0xa8(%rbp)
    7f517a971462:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a971467:	e8 ec fd ff ff       	callq  0x7f517a971258
    7f517a97146c:	49 8b f7             	mov    %r15,%rsi
    7f517a97146f:	48 8b f8             	mov    %rax,%rdi
    7f517a971472:	48 89 85 50 ff ff ff 	mov    %rax,-0xb0(%rbp)
    7f517a971479:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a97147e:	e8 d5 fd ff ff       	callq  0x7f517a971258
    7f517a971483:	49 8b f7             	mov    %r15,%rsi
    7f517a971486:	48 8b f8             	mov    %rax,%rdi
    7f517a971489:	48 89 85 48 ff ff ff 	mov    %rax,-0xb8(%rbp)
    7f517a971490:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a971495:	e8 be fd ff ff       	callq  0x7f517a971258
    7f517a97149a:	49 8b f7             	mov    %r15,%rsi
    7f517a97149d:	48 8b f8             	mov    %rax,%rdi
    7f517a9714a0:	48 89 85 40 ff ff ff 	mov    %rax,-0xc0(%rbp)
    7f517a9714a7:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a9714ac:	e8 a7 fd ff ff       	callq  0x7f517a971258
    7f517a9714b1:	49 8b f7             	mov    %r15,%rsi
    7f517a9714b4:	48 8b f8             	mov    %rax,%rdi
    7f517a9714b7:	48 89 85 38 ff ff ff 	mov    %rax,-0xc8(%rbp)
    7f517a9714be:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a9714c3:	e8 90 fd ff ff       	callq  0x7f517a971258
    7f517a9714c8:	49 8b f7             	mov    %r15,%rsi
    7f517a9714cb:	48 8b f8             	mov    %rax,%rdi
    7f517a9714ce:	48 89 85 30 ff ff ff 	mov    %rax,-0xd0(%rbp)
    7f517a9714d5:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a9714da:	e8 79 fd ff ff       	callq  0x7f517a971258
    7f517a9714df:	49 8b f7             	mov    %r15,%rsi
    7f517a9714e2:	48 8b f8             	mov    %rax,%rdi
    7f517a9714e5:	48 89 85 28 ff ff ff 	mov    %rax,-0xd8(%rbp)
    7f517a9714ec:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a9714f1:	e8 62 fd ff ff       	callq  0x7f517a971258
    7f517a9714f6:	49 8b f7             	mov    %r15,%rsi
    7f517a9714f9:	48 8b f8             	mov    %rax,%rdi
    7f517a9714fc:	48 89 85 20 ff ff ff 	mov    %rax,-0xe0(%rbp)
    7f517a971503:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a971508:	e8 4b fd ff ff       	callq  0x7f517a971258
    7f517a97150d:	49 8b f7             	mov    %r15,%rsi
    7f517a971510:	48 8b f8             	mov    %rax,%rdi
    7f517a971513:	48 89 85 18 ff ff ff 	mov    %rax,-0xe8(%rbp)
    7f517a97151a:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a97151f:	e8 34 fd ff ff       	callq  0x7f517a971258
    7f517a971524:	49 8b f7             	mov    %r15,%rsi
    7f517a971527:	48 8b f8             	mov    %rax,%rdi
    7f517a97152a:	48 89 85 10 ff ff ff 	mov    %rax,-0xf0(%rbp)
    7f517a971531:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a971536:	e8 1d fd ff ff       	callq  0x7f517a971258
    7f517a97153b:	49 8b f7             	mov    %r15,%rsi
    7f517a97153e:	48 8b f8             	mov    %rax,%rdi
    7f517a971541:	48 89 85 08 ff ff ff 	mov    %rax,-0xf8(%rbp)
    7f517a971548:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a97154d:	e8 06 fd ff ff       	callq  0x7f517a971258
    7f517a971552:	49 8b f7             	mov    %r15,%rsi
    7f517a971555:	48 8b f8             	mov    %rax,%rdi
    7f517a971558:	48 89 85 00 ff ff ff 	mov    %rax,-0x100(%rbp)
    7f517a97155f:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a971564:	e8 ef fc ff ff       	callq  0x7f517a971258
    7f517a971569:	49 8b f7             	mov    %r15,%rsi
    7f517a97156c:	48 8b f8             	mov    %rax,%rdi
    7f517a97156f:	48 89 85 f8 fe ff ff 	mov    %rax,-0x108(%rbp)
    7f517a971576:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a97157b:	e8 d8 fc ff ff       	callq  0x7f517a971258
    7f517a971580:	49 8b f7             	mov    %r15,%rsi
    7f517a971583:	48 8b f8             	mov    %rax,%rdi
    7f517a971586:	48 89 85 f0 fe ff ff 	mov    %rax,-0x110(%rbp)
    7f517a97158d:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a971592:	e8 c1 fc ff ff       	callq  0x7f517a971258
    7f517a971597:	49 8b f7             	mov    %r15,%rsi
    7f517a97159a:	48 8b f8             	mov    %rax,%rdi
    7f517a97159d:	48 89 85 e8 fe ff ff 	mov    %rax,-0x118(%rbp)
    7f517a9715a4:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a9715a9:	e8 aa fc ff ff       	callq  0x7f517a971258
    7f517a9715ae:	49 8b f7             	mov    %r15,%rsi
    7f517a9715b1:	48 8b f8             	mov    %rax,%rdi
    7f517a9715b4:	48 89 85 e0 fe ff ff 	mov    %rax,-0x120(%rbp)
    7f517a9715bb:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a9715c0:	e8 93 fc ff ff       	callq  0x7f517a971258
    7f517a9715c5:	49 8b f7             	mov    %r15,%rsi
    7f517a9715c8:	48 8b f8             	mov    %rax,%rdi
    7f517a9715cb:	48 89 85 d8 fe ff ff 	mov    %rax,-0x128(%rbp)
    7f517a9715d2:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a9715d7:	e8 7c fc ff ff       	callq  0x7f517a971258
    7f517a9715dc:	49 8b f7             	mov    %r15,%rsi
    7f517a9715df:	48 8b f8             	mov    %rax,%rdi
    7f517a9715e2:	48 89 85 d0 fe ff ff 	mov    %rax,-0x130(%rbp)
    7f517a9715e9:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a9715ee:	e8 65 fc ff ff       	callq  0x7f517a971258
    7f517a9715f3:	49 8b f7             	mov    %r15,%rsi
    7f517a9715f6:	48 8b f8             	mov    %rax,%rdi
    7f517a9715f9:	48 89 85 c8 fe ff ff 	mov    %rax,-0x138(%rbp)
    7f517a971600:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a971605:	e8 4e fc ff ff       	callq  0x7f517a971258
    7f517a97160a:	49 8b f7             	mov    %r15,%rsi
    7f517a97160d:	48 8b f8             	mov    %rax,%rdi
    7f517a971610:	48 89 85 c0 fe ff ff 	mov    %rax,-0x140(%rbp)
    7f517a971617:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a97161c:	e8 37 fc ff ff       	callq  0x7f517a971258
    7f517a971621:	49 8b f7             	mov    %r15,%rsi
    7f517a971624:	48 8b f8             	mov    %rax,%rdi
    7f517a971627:	48 89 85 b8 fe ff ff 	mov    %rax,-0x148(%rbp)
    7f517a97162e:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a971633:	e8 20 fc ff ff       	callq  0x7f517a971258
    7f517a971638:	49 8b f7             	mov    %r15,%rsi
    7f517a97163b:	48 8b f8             	mov    %rax,%rdi
    7f517a97163e:	48 89 85 b0 fe ff ff 	mov    %rax,-0x150(%rbp)
    7f517a971645:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a97164a:	e8 09 fc ff ff       	callq  0x7f517a971258
    7f517a97164f:	49 8b f7             	mov    %r15,%rsi
    7f517a971652:	48 8b f8             	mov    %rax,%rdi
    7f517a971655:	48 89 85 a8 fe ff ff 	mov    %rax,-0x158(%rbp)
    7f517a97165c:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a971661:	e8 f2 fb ff ff       	callq  0x7f517a971258
    7f517a971666:	49 8b f7             	mov    %r15,%rsi
    7f517a971669:	48 8b f8             	mov    %rax,%rdi
    7f517a97166c:	48 89 85 a0 fe ff ff 	mov    %rax,-0x160(%rbp)
    7f517a971673:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a971678:	e8 db fb ff ff       	callq  0x7f517a971258
    7f517a97167d:	49 8b f7             	mov    %r15,%rsi
    7f517a971680:	48 8b f8             	mov    %rax,%rdi
    7f517a971683:	48 89 85 98 fe ff ff 	mov    %rax,-0x168(%rbp)
    7f517a97168a:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a97168f:	e8 c4 fb ff ff       	callq  0x7f517a971258
    7f517a971694:	49 8b f7             	mov    %r15,%rsi
    7f517a971697:	48 8b f8             	mov    %rax,%rdi
    7f517a97169a:	48 89 85 90 fe ff ff 	mov    %rax,-0x170(%rbp)
    7f517a9716a1:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a9716a6:	e8 ad fb ff ff       	callq  0x7f517a971258
    7f517a9716ab:	49 8b f7             	mov    %r15,%rsi
    7f517a9716ae:	48 8b f8             	mov    %rax,%rdi
    7f517a9716b1:	48 89 85 88 fe ff ff 	mov    %rax,-0x178(%rbp)
    7f517a9716b8:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a9716bd:	e8 96 fb ff ff       	callq  0x7f517a971258
    7f517a9716c2:	49 8b f7             	mov    %r15,%rsi
    7f517a9716c5:	48 8b f8             	mov    %rax,%rdi
    7f517a9716c8:	48 89 85 80 fe ff ff 	mov    %rax,-0x180(%rbp)
    7f517a9716cf:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a9716d4:	e8 7f fb ff ff       	callq  0x7f517a971258
    7f517a9716d9:	49 8b f7             	mov    %r15,%rsi
    7f517a9716dc:	48 8b f8             	mov    %rax,%rdi
    7f517a9716df:	48 89 85 78 fe ff ff 	mov    %rax,-0x188(%rbp)
    7f517a9716e6:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a9716eb:	e8 68 fb ff ff       	callq  0x7f517a971258
    7f517a9716f0:	49 8b f7             	mov    %r15,%rsi
    7f517a9716f3:	48 8b f8             	mov    %rax,%rdi
    7f517a9716f6:	48 89 85 70 fe ff ff 	mov    %rax,-0x190(%rbp)
    7f517a9716fd:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a971702:	e8 51 fb ff ff       	callq  0x7f517a971258
    7f517a971707:	49 8b f7             	mov    %r15,%rsi
    7f517a97170a:	48 8b f8             	mov    %rax,%rdi
    7f517a97170d:	48 89 85 68 fe ff ff 	mov    %rax,-0x198(%rbp)
    7f517a971714:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a971719:	e8 3a fb ff ff       	callq  0x7f517a971258
    7f517a97171e:	49 8b f7             	mov    %r15,%rsi
    7f517a971721:	48 8b f8             	mov    %rax,%rdi
    7f517a971724:	48 89 85 60 fe ff ff 	mov    %rax,-0x1a0(%rbp)
    7f517a97172b:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a971730:	e8 23 fb ff ff       	callq  0x7f517a971258
    7f517a971735:	49 8b f7             	mov    %r15,%rsi
    7f517a971738:	48 8b f8             	mov    %rax,%rdi
    7f517a97173b:	48 89 85 58 fe ff ff 	mov    %rax,-0x1a8(%rbp)
    7f517a971742:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a971747:	e8 0c fb ff ff       	callq  0x7f517a971258
    7f517a97174c:	49 8b f7             	mov    %r15,%rsi
    7f517a97174f:	48 8b f8             	mov    %rax,%rdi
    7f517a971752:	48 89 85 50 fe ff ff 	mov    %rax,-0x1b0(%rbp)
    7f517a971759:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a97175e:	e8 f5 fa ff ff       	callq  0x7f517a971258
    7f517a971763:	49 8b f7             	mov    %r15,%rsi
    7f517a971766:	48 8b f8             	mov    %rax,%rdi
    7f517a971769:	48 89 85 48 fe ff ff 	mov    %rax,-0x1b8(%rbp)
    7f517a971770:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a971775:	e8 de fa ff ff       	callq  0x7f517a971258
    7f517a97177a:	49 8b f7             	mov    %r15,%rsi
    7f517a97177d:	48 8b f8             	mov    %rax,%rdi
    7f517a971780:	48 89 85 40 fe ff ff 	mov    %rax,-0x1c0(%rbp)
    7f517a971787:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a97178c:	e8 c7 fa ff ff       	callq  0x7f517a971258
    7f517a971791:	49 8b f7             	mov    %r15,%rsi
    7f517a971794:	48 8b f8             	mov    %rax,%rdi
    7f517a971797:	48 89 85 38 fe ff ff 	mov    %rax,-0x1c8(%rbp)
    7f517a97179e:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a9717a3:	e8 b0 fa ff ff       	callq  0x7f517a971258
    7f517a9717a8:	49 8b f7             	mov    %r15,%rsi
    7f517a9717ab:	48 8b f8             	mov    %rax,%rdi
    7f517a9717ae:	48 89 85 30 fe ff ff 	mov    %rax,-0x1d0(%rbp)
    7f517a9717b5:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a9717ba:	e8 99 fa ff ff       	callq  0x7f517a971258
    7f517a9717bf:	49 8b f7             	mov    %r15,%rsi
    7f517a9717c2:	48 8b f8             	mov    %rax,%rdi
    7f517a9717c5:	48 89 85 28 fe ff ff 	mov    %rax,-0x1d8(%rbp)
    7f517a9717cc:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a9717d1:	e8 82 fa ff ff       	callq  0x7f517a971258
    7f517a9717d6:	49 8b f7             	mov    %r15,%rsi
    7f517a9717d9:	48 8b f8             	mov    %rax,%rdi
    7f517a9717dc:	48 89 85 20 fe ff ff 	mov    %rax,-0x1e0(%rbp)
    7f517a9717e3:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a9717e8:	e8 6b fa ff ff       	callq  0x7f517a971258
    7f517a9717ed:	49 8b f7             	mov    %r15,%rsi
    7f517a9717f0:	48 8b f8             	mov    %rax,%rdi
    7f517a9717f3:	48 89 85 18 fe ff ff 	mov    %rax,-0x1e8(%rbp)
    7f517a9717fa:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a9717ff:	e8 54 fa ff ff       	callq  0x7f517a971258
    7f517a971804:	49 8b f7             	mov    %r15,%rsi
    7f517a971807:	48 8b f8             	mov    %rax,%rdi
    7f517a97180a:	48 89 85 10 fe ff ff 	mov    %rax,-0x1f0(%rbp)
    7f517a971811:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a971816:	e8 3d fa ff ff       	callq  0x7f517a971258
    7f517a97181b:	49 8b f7             	mov    %r15,%rsi
    7f517a97181e:	48 8b f8             	mov    %rax,%rdi
    7f517a971821:	48 89 85 08 fe ff ff 	mov    %rax,-0x1f8(%rbp)
    7f517a971828:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a97182d:	e8 26 fa ff ff       	callq  0x7f517a971258
    7f517a971832:	49 8b f7             	mov    %r15,%rsi
    7f517a971835:	48 8b f8             	mov    %rax,%rdi
    7f517a971838:	48 89 85 00 fe ff ff 	mov    %rax,-0x200(%rbp)
    7f517a97183f:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a971844:	e8 0f fa ff ff       	callq  0x7f517a971258
    7f517a971849:	49 8b f7             	mov    %r15,%rsi
    7f517a97184c:	48 8b f8             	mov    %rax,%rdi
    7f517a97184f:	48 89 85 f8 fd ff ff 	mov    %rax,-0x208(%rbp)
    7f517a971856:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a97185b:	e8 f8 f9 ff ff       	callq  0x7f517a971258
    7f517a971860:	49 8b f7             	mov    %r15,%rsi
    7f517a971863:	48 8b f8             	mov    %rax,%rdi
    7f517a971866:	48 89 85 f0 fd ff ff 	mov    %rax,-0x210(%rbp)
    7f517a97186d:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a971872:	e8 e1 f9 ff ff       	callq  0x7f517a971258
    7f517a971877:	49 8b f7             	mov    %r15,%rsi
    7f517a97187a:	48 8b f8             	mov    %rax,%rdi
    7f517a97187d:	48 89 85 e8 fd ff ff 	mov    %rax,-0x218(%rbp)
    7f517a971884:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a971889:	e8 ca f9 ff ff       	callq  0x7f517a971258
    7f517a97188e:	49 8b f7             	mov    %r15,%rsi
    7f517a971891:	48 8b f8             	mov    %rax,%rdi
    7f517a971894:	48 89 85 e0 fd ff ff 	mov    %rax,-0x220(%rbp)
    7f517a97189b:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a9718a0:	e8 b3 f9 ff ff       	callq  0x7f517a971258
    7f517a9718a5:	49 8b f7             	mov    %r15,%rsi
    7f517a9718a8:	48 8b f8             	mov    %rax,%rdi
    7f517a9718ab:	48 89 85 d8 fd ff ff 	mov    %rax,-0x228(%rbp)
    7f517a9718b2:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a9718b7:	e8 9c f9 ff ff       	callq  0x7f517a971258
    7f517a9718bc:	49 8b f7             	mov    %r15,%rsi
    7f517a9718bf:	48 8b f8             	mov    %rax,%rdi
    7f517a9718c2:	48 89 85 d0 fd ff ff 	mov    %rax,-0x230(%rbp)
    7f517a9718c9:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a9718ce:	e8 85 f9 ff ff       	callq  0x7f517a971258
    7f517a9718d3:	49 8b f7             	mov    %r15,%rsi
    7f517a9718d6:	48 8b f8             	mov    %rax,%rdi
    7f517a9718d9:	48 89 85 c8 fd ff ff 	mov    %rax,-0x238(%rbp)
    7f517a9718e0:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a9718e5:	e8 6e f9 ff ff       	callq  0x7f517a971258
    7f517a9718ea:	49 8b f7             	mov    %r15,%rsi
    7f517a9718ed:	48 8b f8             	mov    %rax,%rdi
    7f517a9718f0:	48 89 85 c0 fd ff ff 	mov    %rax,-0x240(%rbp)
    7f517a9718f7:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a9718fc:	e8 57 f9 ff ff       	callq  0x7f517a971258
    7f517a971901:	49 8b f7             	mov    %r15,%rsi
    7f517a971904:	48 8b f8             	mov    %rax,%rdi
    7f517a971907:	48 89 85 b8 fd ff ff 	mov    %rax,-0x248(%rbp)
    7f517a97190e:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a971913:	e8 40 f9 ff ff       	callq  0x7f517a971258
    7f517a971918:	49 8b f7             	mov    %r15,%rsi
    7f517a97191b:	48 8b f8             	mov    %rax,%rdi
    7f517a97191e:	48 89 85 b0 fd ff ff 	mov    %rax,-0x250(%rbp)
    7f517a971925:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a97192a:	e8 29 f9 ff ff       	callq  0x7f517a971258
    7f517a97192f:	49 8b f7             	mov    %r15,%rsi
    7f517a971932:	48 8b f8             	mov    %rax,%rdi
    7f517a971935:	48 89 85 a8 fd ff ff 	mov    %rax,-0x258(%rbp)
    7f517a97193c:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a971941:	e8 12 f9 ff ff       	callq  0x7f517a971258
    7f517a971946:	49 8b f7             	mov    %r15,%rsi
    7f517a971949:	48 8b f8             	mov    %rax,%rdi
    7f517a97194c:	48 89 85 a0 fd ff ff 	mov    %rax,-0x260(%rbp)
    7f517a971953:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a971958:	e8 fb f8 ff ff       	callq  0x7f517a971258
    7f517a97195d:	49 8b f7             	mov    %r15,%rsi
    7f517a971960:	48 8b f8             	mov    %rax,%rdi
    7f517a971963:	48 89 85 98 fd ff ff 	mov    %rax,-0x268(%rbp)
    7f517a97196a:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a97196f:	e8 e4 f8 ff ff       	callq  0x7f517a971258
    7f517a971974:	49 8b f7             	mov    %r15,%rsi
    7f517a971977:	48 8b f8             	mov    %rax,%rdi
    7f517a97197a:	48 89 85 90 fd ff ff 	mov    %rax,-0x270(%rbp)
    7f517a971981:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a971986:	e8 cd f8 ff ff       	callq  0x7f517a971258
    7f517a97198b:	49 8b f7             	mov    %r15,%rsi
    7f517a97198e:	48 8b f8             	mov    %rax,%rdi
    7f517a971991:	48 89 85 88 fd ff ff 	mov    %rax,-0x278(%rbp)
    7f517a971998:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a97199d:	e8 b6 f8 ff ff       	callq  0x7f517a971258
    7f517a9719a2:	49 8b f7             	mov    %r15,%rsi
    7f517a9719a5:	48 8b f8             	mov    %rax,%rdi
    7f517a9719a8:	48 89 85 80 fd ff ff 	mov    %rax,-0x280(%rbp)
    7f517a9719af:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a9719b4:	e8 9f f8 ff ff       	callq  0x7f517a971258
    7f517a9719b9:	49 8b f7             	mov    %r15,%rsi
    7f517a9719bc:	48 8b f8             	mov    %rax,%rdi
    7f517a9719bf:	48 89 85 78 fd ff ff 	mov    %rax,-0x288(%rbp)
    7f517a9719c6:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a9719cb:	e8 88 f8 ff ff       	callq  0x7f517a971258
    7f517a9719d0:	49 8b f7             	mov    %r15,%rsi
    7f517a9719d3:	48 8b f8             	mov    %rax,%rdi
    7f517a9719d6:	48 89 85 70 fd ff ff 	mov    %rax,-0x290(%rbp)
    7f517a9719dd:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a9719e2:	e8 71 f8 ff ff       	callq  0x7f517a971258
    7f517a9719e7:	49 8b f7             	mov    %r15,%rsi
    7f517a9719ea:	48 8b f8             	mov    %rax,%rdi
    7f517a9719ed:	48 89 85 68 fd ff ff 	mov    %rax,-0x298(%rbp)
    7f517a9719f4:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a9719f9:	e8 5a f8 ff ff       	callq  0x7f517a971258
    7f517a9719fe:	49 8b f7             	mov    %r15,%rsi
    7f517a971a01:	48 8b f8             	mov    %rax,%rdi
    7f517a971a04:	48 89 85 60 fd ff ff 	mov    %rax,-0x2a0(%rbp)
    7f517a971a0b:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a971a10:	e8 43 f8 ff ff       	callq  0x7f517a971258
    7f517a971a15:	49 8b f7             	mov    %r15,%rsi
    7f517a971a18:	48 8b f8             	mov    %rax,%rdi
    7f517a971a1b:	48 89 85 58 fd ff ff 	mov    %rax,-0x2a8(%rbp)
    7f517a971a22:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a971a27:	e8 2c f8 ff ff       	callq  0x7f517a971258
    7f517a971a2c:	49 8b f7             	mov    %r15,%rsi
    7f517a971a2f:	48 8b f8             	mov    %rax,%rdi
    7f517a971a32:	48 89 85 50 fd ff ff 	mov    %rax,-0x2b0(%rbp)
    7f517a971a39:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a971a3e:	e8 15 f8 ff ff       	callq  0x7f517a971258
    7f517a971a43:	49 8b f7             	mov    %r15,%rsi
    7f517a971a46:	48 8b f8             	mov    %rax,%rdi
    7f517a971a49:	48 89 85 48 fd ff ff 	mov    %rax,-0x2b8(%rbp)
    7f517a971a50:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a971a55:	e8 fe f7 ff ff       	callq  0x7f517a971258
    7f517a971a5a:	49 8b f7             	mov    %r15,%rsi
    7f517a971a5d:	48 8b f8             	mov    %rax,%rdi
    7f517a971a60:	48 89 85 40 fd ff ff 	mov    %rax,-0x2c0(%rbp)
    7f517a971a67:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a971a6c:	e8 e7 f7 ff ff       	callq  0x7f517a971258
    7f517a971a71:	49 8b f7             	mov    %r15,%rsi
    7f517a971a74:	48 8b f8             	mov    %rax,%rdi
    7f517a971a77:	48 89 85 38 fd ff ff 	mov    %rax,-0x2c8(%rbp)
    7f517a971a7e:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a971a83:	e8 d0 f7 ff ff       	callq  0x7f517a971258
    7f517a971a88:	49 8b f7             	mov    %r15,%rsi
    7f517a971a8b:	48 8b f8             	mov    %rax,%rdi
    7f517a971a8e:	48 89 85 30 fd ff ff 	mov    %rax,-0x2d0(%rbp)
    7f517a971a95:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a971a9a:	e8 b9 f7 ff ff       	callq  0x7f517a971258
    7f517a971a9f:	49 8b f7             	mov    %r15,%rsi
    7f517a971aa2:	48 8b f8             	mov    %rax,%rdi
    7f517a971aa5:	48 89 85 28 fd ff ff 	mov    %rax,-0x2d8(%rbp)
    7f517a971aac:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a971ab1:	e8 a2 f7 ff ff       	callq  0x7f517a971258
    7f517a971ab6:	49 8b f7             	mov    %r15,%rsi
    7f517a971ab9:	48 8b f8             	mov    %rax,%rdi
    7f517a971abc:	48 89 85 20 fd ff ff 	mov    %rax,-0x2e0(%rbp)
    7f517a971ac3:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a971ac8:	e8 8b f7 ff ff       	callq  0x7f517a971258
    7f517a971acd:	49 8b f7             	mov    %r15,%rsi
    7f517a971ad0:	48 8b f8             	mov    %rax,%rdi
    7f517a971ad3:	48 89 85 18 fd ff ff 	mov    %rax,-0x2e8(%rbp)
    7f517a971ada:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a971adf:	e8 74 f7 ff ff       	callq  0x7f517a971258
    7f517a971ae4:	49 8b f7             	mov    %r15,%rsi
    7f517a971ae7:	48 8b f8             	mov    %rax,%rdi
    7f517a971aea:	48 89 85 10 fd ff ff 	mov    %rax,-0x2f0(%rbp)
    7f517a971af1:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a971af6:	e8 5d f7 ff ff       	callq  0x7f517a971258
    7f517a971afb:	49 8b f7             	mov    %r15,%rsi
    7f517a971afe:	48 8b f8             	mov    %rax,%rdi
    7f517a971b01:	48 89 85 08 fd ff ff 	mov    %rax,-0x2f8(%rbp)
    7f517a971b08:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a971b0d:	e8 46 f7 ff ff       	callq  0x7f517a971258
    7f517a971b12:	49 8b f7             	mov    %r15,%rsi
    7f517a971b15:	48 8b f8             	mov    %rax,%rdi
    7f517a971b18:	48 89 85 00 fd ff ff 	mov    %rax,-0x300(%rbp)
    7f517a971b1f:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a971b24:	e8 2f f7 ff ff       	callq  0x7f517a971258
    7f517a971b29:	49 8b f7             	mov    %r15,%rsi
    7f517a971b2c:	48 8b f8             	mov    %rax,%rdi
    7f517a971b2f:	48 89 85 f8 fc ff ff 	mov    %rax,-0x308(%rbp)
    7f517a971b36:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a971b3b:	e8 18 f7 ff ff       	callq  0x7f517a971258
    7f517a971b40:	49 8b f7             	mov    %r15,%rsi
    7f517a971b43:	48 8b f8             	mov    %rax,%rdi
    7f517a971b46:	48 89 85 f0 fc ff ff 	mov    %rax,-0x310(%rbp)
    7f517a971b4d:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a971b52:	e8 01 f7 ff ff       	callq  0x7f517a971258
    7f517a971b57:	49 8b f7             	mov    %r15,%rsi
    7f517a971b5a:	48 8b f8             	mov    %rax,%rdi
    7f517a971b5d:	48 89 85 e8 fc ff ff 	mov    %rax,-0x318(%rbp)
    7f517a971b64:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a971b69:	e8 ea f6 ff ff       	callq  0x7f517a971258
    7f517a971b6e:	49 8b f7             	mov    %r15,%rsi
    7f517a971b71:	48 8b f8             	mov    %rax,%rdi
    7f517a971b74:	48 89 85 e0 fc ff ff 	mov    %rax,-0x320(%rbp)
    7f517a971b7b:	b8 08 00 00 00       	mov    $0x8,%eax
    7f517a971b80:	e8 d3 f6 ff ff       	callq  0x7f517a971258
    7f517a971b85:	4c 8b 3c 24          	mov    (%rsp),%r15
    7f517a971b89:	48 8b e5             	mov    %rbp,%rsp
    7f517a971b8c:	5d                   	pop    %rbp
    7f517a971b8d:	c3                   	retq   

end

