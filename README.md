# A compiler toolkit for PHP

This attempts to be a pretty heavy abstraction on top of (initially) three libraries: 
 
 * [libgccjit](https://gcc.gnu.org/onlinedocs/gcc-7.2.0/jit/index.html)
 * [ligjit](https://www.gnu.org/software/libjit/)
 * [llvm](https://llvm.org/docs/)

As each project differs quite a bit once you get beyond the initial level, I'm not sure how useful a high level abstraction will be.

However, this project aims to be a pluggable backend for [PHP-Compiler](https://github.com/ircmaxell/php-compiler). The primary goal is to assess performance of each compiler and resulting code.

As such, the performance of this library isn't incredibly important today. Over time, it may become critical.

# How to use?

No idea. I haven't gotten that far yet...