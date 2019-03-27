<?php namespace libgccjit;
use FFI;
interface ilibgccjit {}
class libgccjit {
    const SOFILE = '/usr/lib/x86_64-linux-gnu/libgccjit.so.0';
    const HEADER_DEF = 'typedef unsigned char __u_char;
typedef unsigned short int __u_short;
typedef unsigned int __u_int;
typedef unsigned long int __u_long;
typedef signed char __int8_t;
typedef unsigned char __uint8_t;
typedef signed short int __int16_t;
typedef unsigned short int __uint16_t;
typedef signed int __int32_t;
typedef unsigned int __uint32_t;
typedef signed long int __int64_t;
typedef unsigned long int __uint64_t;
typedef long int __quad_t;
typedef unsigned long int __u_quad_t;
typedef unsigned long int __dev_t;
typedef unsigned int __uid_t;
typedef unsigned int __gid_t;
typedef unsigned long int __ino_t;
typedef unsigned long int __ino64_t;
typedef unsigned int __mode_t;
typedef unsigned long int __nlink_t;
typedef long int __off_t;
typedef long int __off64_t;
typedef int __pid_t;
typedef struct {
  int __val[2];
} __fsid_t;
typedef long int __clock_t;
typedef unsigned long int __rlim_t;
typedef unsigned long int __rlim64_t;
typedef unsigned int __id_t;
typedef long int __time_t;
typedef unsigned int __useconds_t;
typedef long int __suseconds_t;
typedef int __daddr_t;
typedef int __key_t;
typedef int __clockid_t;
typedef void* __timer_t;
typedef long int __blksize_t;
typedef long int __blkcnt_t;
typedef long int __blkcnt64_t;
typedef unsigned long int __fsblkcnt_t;
typedef unsigned long int __fsblkcnt64_t;
typedef unsigned long int __fsfilcnt_t;
typedef unsigned long int __fsfilcnt64_t;
typedef long int __fsword_t;
typedef long int __ssize_t;
typedef long int __syscall_slong_t;
typedef unsigned long int __syscall_ulong_t;
typedef __off64_t __loff_t;
typedef __quad_t* __qaddr_t;
typedef char* __caddr_t;
typedef long int __intptr_t;
typedef unsigned int __socklen_t;
struct _IO_FILE;
typedef struct _IO_FILE FILE;
typedef struct _IO_FILE __FILE;
typedef unsigned int wint_t;
typedef struct {
  int __count;
  union {
    wint_t __wch;
    char __wchb[4];
  } __value;
} __mbstate_t;
typedef struct {
  __off_t __pos;
  __mbstate_t __state;
} _G_fpos_t;
typedef struct {
  __off64_t __pos;
  __mbstate_t __state;
} _G_fpos64_t;
struct _IO_jump_t;
struct _IO_FILE;
typedef void _IO_lock_t;
struct _IO_marker {
  struct _IO_marker* _next;
  struct _IO_FILE* _sbuf;
  int _pos;
};
enum __codecvt_result {
  __codecvt_ok,
  __codecvt_partial,
  __codecvt_error,
  __codecvt_noconv,
};
struct _IO_FILE {
  int _flags;
  char* _IO_read_ptr;
  char* _IO_read_end;
  char* _IO_read_base;
  char* _IO_write_base;
  char* _IO_write_ptr;
  char* _IO_write_end;
  char* _IO_buf_base;
  char* _IO_buf_end;
  char* _IO_save_base;
  char* _IO_backup_base;
  char* _IO_save_end;
  struct _IO_marker* _markers;
  struct _IO_FILE* _chain;
  int _fileno;
  int _flags2;
  __off_t _old_offset;
  unsigned short _cur_column;
  signed char _vtable_offset;
  char _shortbuf[1];
  _IO_lock_t* _lock;
  __off64_t _offset;
  void* __pad1;
  void* __pad2;
  void* __pad3;
  void* __pad4;
  size_t __pad5;
  int _mode;
  char _unused2[(((15 * (sizeof (int))) - (4 * (sizeof (void*)))) - (sizeof (size_t)))];
};
typedef struct _IO_FILE _IO_FILE;

int __underflow(_IO_FILE*);
int __uflow(_IO_FILE*);
int __overflow(_IO_FILE*, int);
int _IO_getc(_IO_FILE*);
int _IO_putc(int, _IO_FILE*);
int _IO_feof(_IO_FILE*);
int _IO_ferror(_IO_FILE*);
int _IO_peekc_locked(_IO_FILE*);
void _IO_flockfile(_IO_FILE*);
void _IO_funlockfile(_IO_FILE*);
int _IO_ftrylockfile(_IO_FILE*);
int _IO_vfscanf(_IO_FILE*, char*, __gnuc_va_list, int*);
int _IO_vfprintf(_IO_FILE*, char*, __gnuc_va_list);
__ssize_t _IO_padn(_IO_FILE*, int, __ssize_t);
size_t _IO_sgetn(_IO_FILE*, void*, size_t);
__off64_t _IO_seekoff(_IO_FILE*, __off64_t, int, int);
__off64_t _IO_seekpos(_IO_FILE*, __off64_t, int);
void _IO_free_backup_area(_IO_FILE*);
typedef _G_fpos_t fpos_t;
struct _IO_FILE* stdin;
struct _IO_FILE* stdout;
struct _IO_FILE* stderr;
int remove(char*);
int rename(char*, char*);
int renameat(int, char*, int, char*);
FILE* tmpfile(void);
char* tmpnam(char*);
char* tmpnam_r(char*);
char* tempnam(char*, char*);
int fclose(FILE*);
int fflush(FILE*);
int fflush_unlocked(FILE*);
FILE* fopen(char*, char*);
FILE* freopen(char*, char*, FILE*);
FILE* fdopen(int, char*);
FILE* fmemopen(void*, size_t, char*);
FILE* open_memstream(char**, size_t*);
void setbuf(FILE*, char*);
int setvbuf(FILE*, char*, int, size_t);
void setbuffer(FILE*, char*, size_t);
void setlinebuf(FILE*);
int fprintf(FILE*, char*, ...);
int printf(char*, ...);
int sprintf(char*, char*, ...);
int vfprintf(FILE*, char*, __gnuc_va_list);
int vprintf(char*, __gnuc_va_list);
int vsprintf(char*, char*, __gnuc_va_list);
int snprintf(char*, size_t, char*, ...);
int vsnprintf(char*, size_t, char*, __gnuc_va_list);
int vdprintf(int, char*, __gnuc_va_list);
int dprintf(int, char*, ...);
int fscanf(FILE*, char*, ...);
int scanf(char*, ...);
int sscanf(char*, char*, ...);
int __isoc99_fscanf(FILE*, char*, ...);
int __isoc99_scanf(char*, ...);
int __isoc99_sscanf(char*, char*, ...);
int vfscanf(FILE*, char*, __gnuc_va_list);
int vscanf(char*, __gnuc_va_list);
int vsscanf(char*, char*, __gnuc_va_list);
int __isoc99_vfscanf(FILE*, char*, __gnuc_va_list);
int __isoc99_vscanf(char*, __gnuc_va_list);
int __isoc99_vsscanf(char*, char*, __gnuc_va_list);
int fgetc(FILE*);
int getc(FILE*);
int getchar(void);
int getc_unlocked(FILE*);
int getchar_unlocked(void);
int fgetc_unlocked(FILE*);
int fputc(int, FILE*);
int putc(int, FILE*);
int putchar(int);
int fputc_unlocked(int, FILE*);
int putc_unlocked(int, FILE*);
int putchar_unlocked(int);
int getw(FILE*);
int putw(int, FILE*);
char* fgets(char*, int, FILE*);
char* gets(char*);
__ssize_t __getdelim(char**, size_t*, int, FILE*);
__ssize_t getdelim(char**, size_t*, int, FILE*);
__ssize_t getline(char**, size_t*, FILE*);
int fputs(char*, FILE*);
int puts(char*);
int ungetc(int, FILE*);
size_t fread(void*, size_t, size_t, FILE*);
size_t fwrite(void*, size_t, size_t, FILE*);
size_t fread_unlocked(void*, size_t, size_t, FILE*);
size_t fwrite_unlocked(void*, size_t, size_t, FILE*);
int fseek(FILE*, long int, int);
long int ftell(FILE*);
void rewind(FILE*);
int fseeko(FILE*, __off_t, int);
__off_t ftello(FILE*);
int fgetpos(FILE*, fpos_t*);
int fsetpos(FILE*, fpos_t*);
void clearerr(FILE*);
int feof(FILE*);
int ferror(FILE*);
void clearerr_unlocked(FILE*);
int feof_unlocked(FILE*);
int ferror_unlocked(FILE*);
void perror(char*);
int sys_nerr;
int fileno(FILE*);
int fileno_unlocked(FILE*);
FILE* popen(char*, char*);
int pclose(FILE*);
char* ctermid(char*);
void flockfile(FILE*);
int ftrylockfile(FILE*);
void funlockfile(FILE*);
typedef struct gcc_jit_context gcc_jit_context;
typedef struct gcc_jit_result gcc_jit_result;
typedef struct gcc_jit_object gcc_jit_object;
typedef struct gcc_jit_location gcc_jit_location;
typedef struct gcc_jit_type gcc_jit_type;
typedef struct gcc_jit_field gcc_jit_field;
typedef struct gcc_jit_struct gcc_jit_struct;
typedef struct gcc_jit_function gcc_jit_function;
typedef struct gcc_jit_block gcc_jit_block;
typedef struct gcc_jit_rvalue gcc_jit_rvalue;
typedef struct gcc_jit_lvalue gcc_jit_lvalue;
typedef struct gcc_jit_param gcc_jit_param;
typedef struct gcc_jit_case gcc_jit_case;
gcc_jit_context* gcc_jit_context_acquire(void);
void gcc_jit_context_release(gcc_jit_context*);
enum gcc_jit_str_option {
  GCC_JIT_STR_OPTION_PROGNAME,
  GCC_JIT_NUM_STR_OPTIONS,
};
enum gcc_jit_int_option {
  GCC_JIT_INT_OPTION_OPTIMIZATION_LEVEL,
  GCC_JIT_NUM_INT_OPTIONS,
};
enum gcc_jit_bool_option {
  GCC_JIT_BOOL_OPTION_DEBUGINFO,
  GCC_JIT_BOOL_OPTION_DUMP_INITIAL_TREE,
  GCC_JIT_BOOL_OPTION_DUMP_INITIAL_GIMPLE,
  GCC_JIT_BOOL_OPTION_DUMP_GENERATED_CODE,
  GCC_JIT_BOOL_OPTION_DUMP_SUMMARY,
  GCC_JIT_BOOL_OPTION_DUMP_EVERYTHING,
  GCC_JIT_BOOL_OPTION_SELFCHECK_GC,
  GCC_JIT_BOOL_OPTION_KEEP_INTERMEDIATES,
  GCC_JIT_NUM_BOOL_OPTIONS,
};
void gcc_jit_context_set_str_option(gcc_jit_context*, enum gcc_jit_str_option, char*);
void gcc_jit_context_set_int_option(gcc_jit_context*, enum gcc_jit_int_option, int);
void gcc_jit_context_set_bool_option(gcc_jit_context*, enum gcc_jit_bool_option, int);
void gcc_jit_context_set_bool_allow_unreachable_blocks(gcc_jit_context*, int);
void gcc_jit_context_set_bool_use_external_driver(gcc_jit_context*, int);
void gcc_jit_context_add_command_line_option(gcc_jit_context*, char*);
gcc_jit_result* gcc_jit_context_compile(gcc_jit_context*);
enum gcc_jit_output_kind {
  GCC_JIT_OUTPUT_KIND_ASSEMBLER,
  GCC_JIT_OUTPUT_KIND_OBJECT_FILE,
  GCC_JIT_OUTPUT_KIND_DYNAMIC_LIBRARY,
  GCC_JIT_OUTPUT_KIND_EXECUTABLE,
};
void gcc_jit_context_compile_to_file(gcc_jit_context*, enum gcc_jit_output_kind, char*);
void gcc_jit_context_dump_to_file(gcc_jit_context*, char*, int);
void gcc_jit_context_set_logfile(gcc_jit_context*, FILE*, int, int);
char* gcc_jit_context_get_first_error(gcc_jit_context*);
char* gcc_jit_context_get_last_error(gcc_jit_context*);
void* gcc_jit_result_get_code(gcc_jit_result*, char*);
void* gcc_jit_result_get_global(gcc_jit_result*, char*);
void gcc_jit_result_release(gcc_jit_result*);
gcc_jit_context* gcc_jit_object_get_context(gcc_jit_object*);
char* gcc_jit_object_get_debug_string(gcc_jit_object*);
gcc_jit_location* gcc_jit_context_new_location(gcc_jit_context*, char*, int, int);
gcc_jit_object* gcc_jit_location_as_object(gcc_jit_location*);
gcc_jit_object* gcc_jit_type_as_object(gcc_jit_type*);
enum gcc_jit_types {
  GCC_JIT_TYPE_VOID,
  GCC_JIT_TYPE_VOID_PTR,
  GCC_JIT_TYPE_BOOL,
  GCC_JIT_TYPE_CHAR,
  GCC_JIT_TYPE_SIGNED_CHAR,
  GCC_JIT_TYPE_UNSIGNED_CHAR,
  GCC_JIT_TYPE_SHORT,
  GCC_JIT_TYPE_UNSIGNED_SHORT,
  GCC_JIT_TYPE_INT,
  GCC_JIT_TYPE_UNSIGNED_INT,
  GCC_JIT_TYPE_LONG,
  GCC_JIT_TYPE_UNSIGNED_LONG,
  GCC_JIT_TYPE_LONG_LONG,
  GCC_JIT_TYPE_UNSIGNED_LONG_LONG,
  GCC_JIT_TYPE_FLOAT,
  GCC_JIT_TYPE_DOUBLE,
  GCC_JIT_TYPE_LONG_DOUBLE,
  GCC_JIT_TYPE_CONST_CHAR_PTR,
  GCC_JIT_TYPE_SIZE_T,
  GCC_JIT_TYPE_FILE_PTR,
  GCC_JIT_TYPE_COMPLEX_FLOAT,
  GCC_JIT_TYPE_COMPLEX_DOUBLE,
  GCC_JIT_TYPE_COMPLEX_LONG_DOUBLE,
};
gcc_jit_type* gcc_jit_context_get_type(gcc_jit_context*, enum gcc_jit_types);
gcc_jit_type* gcc_jit_context_get_int_type(gcc_jit_context*, int, int);
gcc_jit_type* gcc_jit_type_get_pointer(gcc_jit_type*);
gcc_jit_type* gcc_jit_type_get_const(gcc_jit_type*);
gcc_jit_type* gcc_jit_type_get_volatile(gcc_jit_type*);
gcc_jit_type* gcc_jit_context_new_array_type(gcc_jit_context*, gcc_jit_location*, gcc_jit_type*, int);
gcc_jit_field* gcc_jit_context_new_field(gcc_jit_context*, gcc_jit_location*, gcc_jit_type*, char*);
gcc_jit_object* gcc_jit_field_as_object(gcc_jit_field*);
gcc_jit_struct* gcc_jit_context_new_struct_type(gcc_jit_context*, gcc_jit_location*, char*, int, gcc_jit_field**);
gcc_jit_struct* gcc_jit_context_new_opaque_struct(gcc_jit_context*, gcc_jit_location*, char*);
gcc_jit_type* gcc_jit_struct_as_type(gcc_jit_struct*);
void gcc_jit_struct_set_fields(gcc_jit_struct*, gcc_jit_location*, int, gcc_jit_field**);
gcc_jit_type* gcc_jit_context_new_union_type(gcc_jit_context*, gcc_jit_location*, char*, int, gcc_jit_field**);
gcc_jit_type* gcc_jit_context_new_function_ptr_type(gcc_jit_context*, gcc_jit_location*, gcc_jit_type*, int, gcc_jit_type**, int);
gcc_jit_param* gcc_jit_context_new_param(gcc_jit_context*, gcc_jit_location*, gcc_jit_type*, char*);
gcc_jit_object* gcc_jit_param_as_object(gcc_jit_param*);
gcc_jit_lvalue* gcc_jit_param_as_lvalue(gcc_jit_param*);
gcc_jit_rvalue* gcc_jit_param_as_rvalue(gcc_jit_param*);
enum gcc_jit_function_kind {
  GCC_JIT_FUNCTION_EXPORTED,
  GCC_JIT_FUNCTION_INTERNAL,
  GCC_JIT_FUNCTION_IMPORTED,
  GCC_JIT_FUNCTION_ALWAYS_INLINE,
};
gcc_jit_function* gcc_jit_context_new_function(gcc_jit_context*, gcc_jit_location*, enum gcc_jit_function_kind, gcc_jit_type*, char*, int, gcc_jit_param**, int);
gcc_jit_function* gcc_jit_context_get_builtin_function(gcc_jit_context*, char*);
gcc_jit_object* gcc_jit_function_as_object(gcc_jit_function*);
gcc_jit_param* gcc_jit_function_get_param(gcc_jit_function*, int);
void gcc_jit_function_dump_to_dot(gcc_jit_function*, char*);
gcc_jit_block* gcc_jit_function_new_block(gcc_jit_function*, char*);
gcc_jit_object* gcc_jit_block_as_object(gcc_jit_block*);
gcc_jit_function* gcc_jit_block_get_function(gcc_jit_block*);
enum gcc_jit_global_kind {
  GCC_JIT_GLOBAL_EXPORTED,
  GCC_JIT_GLOBAL_INTERNAL,
  GCC_JIT_GLOBAL_IMPORTED,
};
gcc_jit_lvalue* gcc_jit_context_new_global(gcc_jit_context*, gcc_jit_location*, enum gcc_jit_global_kind, gcc_jit_type*, char*);
gcc_jit_object* gcc_jit_lvalue_as_object(gcc_jit_lvalue*);
gcc_jit_rvalue* gcc_jit_lvalue_as_rvalue(gcc_jit_lvalue*);
gcc_jit_object* gcc_jit_rvalue_as_object(gcc_jit_rvalue*);
gcc_jit_type* gcc_jit_rvalue_get_type(gcc_jit_rvalue*);
gcc_jit_rvalue* gcc_jit_context_new_rvalue_from_int(gcc_jit_context*, gcc_jit_type*, int);
gcc_jit_rvalue* gcc_jit_context_new_rvalue_from_long(gcc_jit_context*, gcc_jit_type*, long);
gcc_jit_rvalue* gcc_jit_context_zero(gcc_jit_context*, gcc_jit_type*);
gcc_jit_rvalue* gcc_jit_context_one(gcc_jit_context*, gcc_jit_type*);
gcc_jit_rvalue* gcc_jit_context_new_rvalue_from_double(gcc_jit_context*, gcc_jit_type*, double);
gcc_jit_rvalue* gcc_jit_context_new_rvalue_from_ptr(gcc_jit_context*, gcc_jit_type*, void*);
gcc_jit_rvalue* gcc_jit_context_null(gcc_jit_context*, gcc_jit_type*);
gcc_jit_rvalue* gcc_jit_context_new_string_literal(gcc_jit_context*, char*);
enum gcc_jit_unary_op {
  GCC_JIT_UNARY_OP_MINUS,
  GCC_JIT_UNARY_OP_BITWISE_NEGATE,
  GCC_JIT_UNARY_OP_LOGICAL_NEGATE,
  GCC_JIT_UNARY_OP_ABS,
};
gcc_jit_rvalue* gcc_jit_context_new_unary_op(gcc_jit_context*, gcc_jit_location*, enum gcc_jit_unary_op, gcc_jit_type*, gcc_jit_rvalue*);
enum gcc_jit_binary_op {
  GCC_JIT_BINARY_OP_PLUS,
  GCC_JIT_BINARY_OP_MINUS,
  GCC_JIT_BINARY_OP_MULT,
  GCC_JIT_BINARY_OP_DIVIDE,
  GCC_JIT_BINARY_OP_MODULO,
  GCC_JIT_BINARY_OP_BITWISE_AND,
  GCC_JIT_BINARY_OP_BITWISE_XOR,
  GCC_JIT_BINARY_OP_BITWISE_OR,
  GCC_JIT_BINARY_OP_LOGICAL_AND,
  GCC_JIT_BINARY_OP_LOGICAL_OR,
  GCC_JIT_BINARY_OP_LSHIFT,
  GCC_JIT_BINARY_OP_RSHIFT,
};
gcc_jit_rvalue* gcc_jit_context_new_binary_op(gcc_jit_context*, gcc_jit_location*, enum gcc_jit_binary_op, gcc_jit_type*, gcc_jit_rvalue*, gcc_jit_rvalue*);
enum gcc_jit_comparison {
  GCC_JIT_COMPARISON_EQ,
  GCC_JIT_COMPARISON_NE,
  GCC_JIT_COMPARISON_LT,
  GCC_JIT_COMPARISON_LE,
  GCC_JIT_COMPARISON_GT,
  GCC_JIT_COMPARISON_GE,
};
gcc_jit_rvalue* gcc_jit_context_new_comparison(gcc_jit_context*, gcc_jit_location*, enum gcc_jit_comparison, gcc_jit_rvalue*, gcc_jit_rvalue*);
gcc_jit_rvalue* gcc_jit_context_new_call(gcc_jit_context*, gcc_jit_location*, gcc_jit_function*, int, gcc_jit_rvalue**);
gcc_jit_rvalue* gcc_jit_context_new_call_through_ptr(gcc_jit_context*, gcc_jit_location*, gcc_jit_rvalue*, int, gcc_jit_rvalue**);
gcc_jit_rvalue* gcc_jit_context_new_cast(gcc_jit_context*, gcc_jit_location*, gcc_jit_rvalue*, gcc_jit_type*);
gcc_jit_lvalue* gcc_jit_context_new_array_access(gcc_jit_context*, gcc_jit_location*, gcc_jit_rvalue*, gcc_jit_rvalue*);
gcc_jit_lvalue* gcc_jit_lvalue_access_field(gcc_jit_lvalue*, gcc_jit_location*, gcc_jit_field*);
gcc_jit_rvalue* gcc_jit_rvalue_access_field(gcc_jit_rvalue*, gcc_jit_location*, gcc_jit_field*);
gcc_jit_lvalue* gcc_jit_rvalue_dereference_field(gcc_jit_rvalue*, gcc_jit_location*, gcc_jit_field*);
gcc_jit_lvalue* gcc_jit_rvalue_dereference(gcc_jit_rvalue*, gcc_jit_location*);
gcc_jit_rvalue* gcc_jit_lvalue_get_address(gcc_jit_lvalue*, gcc_jit_location*);
gcc_jit_lvalue* gcc_jit_function_new_local(gcc_jit_function*, gcc_jit_location*, gcc_jit_type*, char*);
void gcc_jit_block_add_eval(gcc_jit_block*, gcc_jit_location*, gcc_jit_rvalue*);
void gcc_jit_block_add_assignment(gcc_jit_block*, gcc_jit_location*, gcc_jit_lvalue*, gcc_jit_rvalue*);
void gcc_jit_block_add_assignment_op(gcc_jit_block*, gcc_jit_location*, gcc_jit_lvalue*, enum gcc_jit_binary_op, gcc_jit_rvalue*);
void gcc_jit_block_add_comment(gcc_jit_block*, gcc_jit_location*, char*);
void gcc_jit_block_end_with_conditional(gcc_jit_block*, gcc_jit_location*, gcc_jit_rvalue*, gcc_jit_block*, gcc_jit_block*);
void gcc_jit_block_end_with_jump(gcc_jit_block*, gcc_jit_location*, gcc_jit_block*);
void gcc_jit_block_end_with_return(gcc_jit_block*, gcc_jit_location*, gcc_jit_rvalue*);
void gcc_jit_block_end_with_void_return(gcc_jit_block*, gcc_jit_location*);
gcc_jit_case* gcc_jit_context_new_case(gcc_jit_context*, gcc_jit_rvalue*, gcc_jit_rvalue*, gcc_jit_block*);
gcc_jit_object* gcc_jit_case_as_object(gcc_jit_case*);
void gcc_jit_block_end_with_switch(gcc_jit_block*, gcc_jit_location*, gcc_jit_rvalue*, gcc_jit_block*, int, gcc_jit_case**);
gcc_jit_context* gcc_jit_context_new_child_context(gcc_jit_context*);
void gcc_jit_context_dump_reproducer_to_file(gcc_jit_context*, char*);
void gcc_jit_context_enable_dump(gcc_jit_context*, char*, char**);
typedef struct gcc_jit_timer gcc_jit_timer;
gcc_jit_timer* gcc_jit_timer_new(void);
void gcc_jit_timer_release(gcc_jit_timer*);
void gcc_jit_context_set_timer(gcc_jit_context*, gcc_jit_timer*);
gcc_jit_timer* gcc_jit_context_get_timer(gcc_jit_context*);
void gcc_jit_timer_push(gcc_jit_timer*, char*);
void gcc_jit_timer_pop(gcc_jit_timer*, char*);
void gcc_jit_timer_print(gcc_jit_timer*, FILE*);
';
    private FFI $ffi;
    public function __construct() {
        $this->ffi = FFI::cdef(self::HEADER_DEF, self::SOFILE);
    }
    
    public function cast(ilibgccjit $from, string $to): ilibgccjit {
        if (!is_a($to, ilibgccjit::class)) {
            throw new \LogicException("Cannot cast to a non-wrapper type");
        }
        return new $to($this->ffi->cast($to::getType(), $from->getData()));
    }

    public function makeArray(string $class, array $elements) {
        $type = $class::getType();
        if (substr($type, -1) !== "*") {
            throw new \LogicException("Attempting to make a non-pointer element into an array");
        }
        $cdata = $this->ffi->new(substr($type, 0, -1) . "[" . count($elements) . "]");
        foreach ($elements as $key => $raw) {
            $cdata[$key] = $raw === null ? null : $raw->getData();
        }
        return new $class($cdata);
    }

    public function sizeof($classOrObject): int {
        if (is_object($classOrObject) && $classOrObject instanceof ilibgccjit) {
            return $this->ffi->sizeof($classOrObject->getData());
        } elseif (is_a($classOrObject, ilibgccjit::class)) {
            return $this->ffi->sizeof($this->ffi->type($classOrObject::getType()));
        } else {
            throw new \LogicException("Unknown class/object passed to sizeof()");
        }
    }

    public function getFFI(): FFI {
        return $this->ffi;
    }

    
    public function __get(string $name) {
        switch($name) {
            case '_IO_2_1_stdin_': $tmp = $this->ffi->_IO_2_1_stdin_; return $tmp === null ? null : new _IO_FILE_plus($tmp);
            case '_IO_2_1_stdout_': $tmp = $this->ffi->_IO_2_1_stdout_; return $tmp === null ? null : new _IO_FILE_plus($tmp);
            case '_IO_2_1_stderr_': $tmp = $this->ffi->_IO_2_1_stderr_; return $tmp === null ? null : new _IO_FILE_plus($tmp);
            case 'stdin': $tmp = $this->ffi->stdin; return $tmp === null ? null : new _IO_FILE_ptr($tmp);
            case 'stdout': $tmp = $this->ffi->stdout; return $tmp === null ? null : new _IO_FILE_ptr($tmp);
            case 'stderr': $tmp = $this->ffi->stderr; return $tmp === null ? null : new _IO_FILE_ptr($tmp);
            case 'sys_nerr': return $this->ffi->sys_nerr;
            case 'sys_errlist': return $this->ffi->sys_errlist;
            default: return $this->ffi->$name;
        }
    }
    // enum __codecvt_result
    const __codecvt_ok = 0;
    const __codecvt_partial = 1;
    const __codecvt_error = 2;
    const __codecvt_noconv = 3;
    public function __underflow(?_IO_FILE_ptr $p0): ?int {
        $result = $this->ffi->__underflow($p0 === null ? null : $p0->getData());
        return $result;
    }
    public function __uflow(?_IO_FILE_ptr $p0): ?int {
        $result = $this->ffi->__uflow($p0 === null ? null : $p0->getData());
        return $result;
    }
    public function __overflow(?_IO_FILE_ptr $p0, ?int $p1): ?int {
        $result = $this->ffi->__overflow($p0 === null ? null : $p0->getData(), $p1);
        return $result;
    }
    public function _IO_getc(?_IO_FILE_ptr $p0): ?int {
        $result = $this->ffi->_IO_getc($p0 === null ? null : $p0->getData());
        return $result;
    }
    public function _IO_putc(?int $p0, ?_IO_FILE_ptr $p1): ?int {
        $result = $this->ffi->_IO_putc($p0, $p1 === null ? null : $p1->getData());
        return $result;
    }
    public function _IO_feof(?_IO_FILE_ptr $p0): ?int {
        $result = $this->ffi->_IO_feof($p0 === null ? null : $p0->getData());
        return $result;
    }
    public function _IO_ferror(?_IO_FILE_ptr $p0): ?int {
        $result = $this->ffi->_IO_ferror($p0 === null ? null : $p0->getData());
        return $result;
    }
    public function _IO_peekc_locked(?_IO_FILE_ptr $p0): ?int {
        $result = $this->ffi->_IO_peekc_locked($p0 === null ? null : $p0->getData());
        return $result;
    }
    public function _IO_flockfile(?_IO_FILE_ptr $p0): void {
        $this->ffi->_IO_flockfile($p0 === null ? null : $p0->getData());
    }
    public function _IO_funlockfile(?_IO_FILE_ptr $p0): void {
        $this->ffi->_IO_funlockfile($p0 === null ? null : $p0->getData());
    }
    public function _IO_ftrylockfile(?_IO_FILE_ptr $p0): ?int {
        $result = $this->ffi->_IO_ftrylockfile($p0 === null ? null : $p0->getData());
        return $result;
    }
    public function _IO_vfscanf(?_IO_FILE_ptr $p0, ?string $p1, ?__gnuc_va_list $p2, ?int_ptr $p3): ?int {
        $result = $this->ffi->_IO_vfscanf($p0 === null ? null : $p0->getData(), $p1, $p2 === null ? null : $p2->getData(), $p3 === null ? null : $p3->getData());
        return $result;
    }
    public function _IO_vfprintf(?_IO_FILE_ptr $p0, ?string $p1, ?__gnuc_va_list $p2): ?int {
        $result = $this->ffi->_IO_vfprintf($p0 === null ? null : $p0->getData(), $p1, $p2 === null ? null : $p2->getData());
        return $result;
    }
    public function _IO_padn(?_IO_FILE_ptr $p0, ?int $p1, ?__ssize_t $p2): ?__ssize_t {
        $result = $this->ffi->_IO_padn($p0 === null ? null : $p0->getData(), $p1, $p2 === null ? null : $p2->getData());
        return $result === null ? null : new __ssize_t($result);
    }
    public function _IO_sgetn(?_IO_FILE_ptr $p0, ?void_ptr $p1, ?size_t $p2): ?size_t {
        $result = $this->ffi->_IO_sgetn($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result === null ? null : new size_t($result);
    }
    public function _IO_seekoff(?_IO_FILE_ptr $p0, ?__off64_t $p1, ?int $p2, ?int $p3): ?__off64_t {
        $result = $this->ffi->_IO_seekoff($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2, $p3);
        return $result === null ? null : new __off64_t($result);
    }
    public function _IO_seekpos(?_IO_FILE_ptr $p0, ?__off64_t $p1, ?int $p2): ?__off64_t {
        $result = $this->ffi->_IO_seekpos($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2);
        return $result === null ? null : new __off64_t($result);
    }
    public function _IO_free_backup_area(?_IO_FILE_ptr $p0): void {
        $this->ffi->_IO_free_backup_area($p0 === null ? null : $p0->getData());
    }
    public function remove(?string $p0): ?int {
        $result = $this->ffi->remove($p0);
        return $result;
    }
    public function rename(?string $p0, ?string $p1): ?int {
        $result = $this->ffi->rename($p0, $p1);
        return $result;
    }
    public function renameat(?int $p0, ?string $p1, ?int $p2, ?string $p3): ?int {
        $result = $this->ffi->renameat($p0, $p1, $p2, $p3);
        return $result;
    }
    public function tmpfile(): ?FILE_ptr {
        $result = $this->ffi->tmpfile();
        return $result === null ? null : new FILE_ptr($result);
    }
    public function tmpnam(?string $p0): ?string {
        $result = $this->ffi->tmpnam($p0);
        return $result;
    }
    public function tmpnam_r(?string $p0): ?string {
        $result = $this->ffi->tmpnam_r($p0);
        return $result;
    }
    public function tempnam(?string $p0, ?string $p1): ?string {
        $result = $this->ffi->tempnam($p0, $p1);
        return $result;
    }
    public function fclose(?FILE_ptr $p0): ?int {
        $result = $this->ffi->fclose($p0 === null ? null : $p0->getData());
        return $result;
    }
    public function fflush(?FILE_ptr $p0): ?int {
        $result = $this->ffi->fflush($p0 === null ? null : $p0->getData());
        return $result;
    }
    public function fflush_unlocked(?FILE_ptr $p0): ?int {
        $result = $this->ffi->fflush_unlocked($p0 === null ? null : $p0->getData());
        return $result;
    }
    public function fopen(?string $p0, ?string $p1): ?FILE_ptr {
        $result = $this->ffi->fopen($p0, $p1);
        return $result === null ? null : new FILE_ptr($result);
    }
    public function freopen(?string $p0, ?string $p1, ?FILE_ptr $p2): ?FILE_ptr {
        $result = $this->ffi->freopen($p0, $p1, $p2 === null ? null : $p2->getData());
        return $result === null ? null : new FILE_ptr($result);
    }
    public function fdopen(?int $p0, ?string $p1): ?FILE_ptr {
        $result = $this->ffi->fdopen($p0, $p1);
        return $result === null ? null : new FILE_ptr($result);
    }
    public function fmemopen(?void_ptr $p0, ?size_t $p1, ?string $p2): ?FILE_ptr {
        $result = $this->ffi->fmemopen($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2);
        return $result === null ? null : new FILE_ptr($result);
    }
    public function open_memstream(?string_ptr $p0, ?size_t_ptr $p1): ?FILE_ptr {
        $result = $this->ffi->open_memstream($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new FILE_ptr($result);
    }
    public function setbuf(?FILE_ptr $p0, ?string $p1): void {
        $this->ffi->setbuf($p0 === null ? null : $p0->getData(), $p1);
    }
    public function setvbuf(?FILE_ptr $p0, ?string $p1, ?int $p2, ?size_t $p3): ?int {
        $result = $this->ffi->setvbuf($p0 === null ? null : $p0->getData(), $p1, $p2, $p3 === null ? null : $p3->getData());
        return $result;
    }
    public function setbuffer(?FILE_ptr $p0, ?string $p1, ?size_t $p2): void {
        $this->ffi->setbuffer($p0 === null ? null : $p0->getData(), $p1, $p2 === null ? null : $p2->getData());
    }
    public function setlinebuf(?FILE_ptr $p0): void {
        $this->ffi->setlinebuf($p0 === null ? null : $p0->getData());
    }
    public function fprintf(?FILE_ptr $p0, ?string $p1): ?int {
        $result = $this->ffi->fprintf($p0 === null ? null : $p0->getData(), $p1);
        return $result;
    }
    public function printf(?string $p0): ?int {
        $result = $this->ffi->printf($p0);
        return $result;
    }
    public function sprintf(?string $p0, ?string $p1): ?int {
        $result = $this->ffi->sprintf($p0, $p1);
        return $result;
    }
    public function vfprintf(?FILE_ptr $p0, ?string $p1, ?__gnuc_va_list $p2): ?int {
        $result = $this->ffi->vfprintf($p0 === null ? null : $p0->getData(), $p1, $p2 === null ? null : $p2->getData());
        return $result;
    }
    public function vprintf(?string $p0, ?__gnuc_va_list $p1): ?int {
        $result = $this->ffi->vprintf($p0, $p1 === null ? null : $p1->getData());
        return $result;
    }
    public function vsprintf(?string $p0, ?string $p1, ?__gnuc_va_list $p2): ?int {
        $result = $this->ffi->vsprintf($p0, $p1, $p2 === null ? null : $p2->getData());
        return $result;
    }
    public function snprintf(?string $p0, ?size_t $p1, ?string $p2): ?int {
        $result = $this->ffi->snprintf($p0, $p1 === null ? null : $p1->getData(), $p2);
        return $result;
    }
    public function vsnprintf(?string $p0, ?size_t $p1, ?string $p2, ?__gnuc_va_list $p3): ?int {
        $result = $this->ffi->vsnprintf($p0, $p1 === null ? null : $p1->getData(), $p2, $p3 === null ? null : $p3->getData());
        return $result;
    }
    public function vdprintf(?int $p0, ?string $p1, ?__gnuc_va_list $p2): ?int {
        $result = $this->ffi->vdprintf($p0, $p1, $p2 === null ? null : $p2->getData());
        return $result;
    }
    public function dprintf(?int $p0, ?string $p1): ?int {
        $result = $this->ffi->dprintf($p0, $p1);
        return $result;
    }
    public function fscanf(?FILE_ptr $p0, ?string $p1): ?int {
        $result = $this->ffi->fscanf($p0 === null ? null : $p0->getData(), $p1);
        return $result;
    }
    public function scanf(?string $p0): ?int {
        $result = $this->ffi->scanf($p0);
        return $result;
    }
    public function sscanf(?string $p0, ?string $p1): ?int {
        $result = $this->ffi->sscanf($p0, $p1);
        return $result;
    }
    public function __isoc99_fscanf(?FILE_ptr $p0, ?string $p1): ?int {
        $result = $this->ffi->__isoc99_fscanf($p0 === null ? null : $p0->getData(), $p1);
        return $result;
    }
    public function __isoc99_scanf(?string $p0): ?int {
        $result = $this->ffi->__isoc99_scanf($p0);
        return $result;
    }
    public function __isoc99_sscanf(?string $p0, ?string $p1): ?int {
        $result = $this->ffi->__isoc99_sscanf($p0, $p1);
        return $result;
    }
    public function vfscanf(?FILE_ptr $p0, ?string $p1, ?__gnuc_va_list $p2): ?int {
        $result = $this->ffi->vfscanf($p0 === null ? null : $p0->getData(), $p1, $p2 === null ? null : $p2->getData());
        return $result;
    }
    public function vscanf(?string $p0, ?__gnuc_va_list $p1): ?int {
        $result = $this->ffi->vscanf($p0, $p1 === null ? null : $p1->getData());
        return $result;
    }
    public function vsscanf(?string $p0, ?string $p1, ?__gnuc_va_list $p2): ?int {
        $result = $this->ffi->vsscanf($p0, $p1, $p2 === null ? null : $p2->getData());
        return $result;
    }
    public function __isoc99_vfscanf(?FILE_ptr $p0, ?string $p1, ?__gnuc_va_list $p2): ?int {
        $result = $this->ffi->__isoc99_vfscanf($p0 === null ? null : $p0->getData(), $p1, $p2 === null ? null : $p2->getData());
        return $result;
    }
    public function __isoc99_vscanf(?string $p0, ?__gnuc_va_list $p1): ?int {
        $result = $this->ffi->__isoc99_vscanf($p0, $p1 === null ? null : $p1->getData());
        return $result;
    }
    public function __isoc99_vsscanf(?string $p0, ?string $p1, ?__gnuc_va_list $p2): ?int {
        $result = $this->ffi->__isoc99_vsscanf($p0, $p1, $p2 === null ? null : $p2->getData());
        return $result;
    }
    public function fgetc(?FILE_ptr $p0): ?int {
        $result = $this->ffi->fgetc($p0 === null ? null : $p0->getData());
        return $result;
    }
    public function getc(?FILE_ptr $p0): ?int {
        $result = $this->ffi->getc($p0 === null ? null : $p0->getData());
        return $result;
    }
    public function getchar(): ?int {
        $result = $this->ffi->getchar();
        return $result;
    }
    public function getc_unlocked(?FILE_ptr $p0): ?int {
        $result = $this->ffi->getc_unlocked($p0 === null ? null : $p0->getData());
        return $result;
    }
    public function getchar_unlocked(): ?int {
        $result = $this->ffi->getchar_unlocked();
        return $result;
    }
    public function fgetc_unlocked(?FILE_ptr $p0): ?int {
        $result = $this->ffi->fgetc_unlocked($p0 === null ? null : $p0->getData());
        return $result;
    }
    public function fputc(?int $p0, ?FILE_ptr $p1): ?int {
        $result = $this->ffi->fputc($p0, $p1 === null ? null : $p1->getData());
        return $result;
    }
    public function putc(?int $p0, ?FILE_ptr $p1): ?int {
        $result = $this->ffi->putc($p0, $p1 === null ? null : $p1->getData());
        return $result;
    }
    public function putchar(?int $p0): ?int {
        $result = $this->ffi->putchar($p0);
        return $result;
    }
    public function fputc_unlocked(?int $p0, ?FILE_ptr $p1): ?int {
        $result = $this->ffi->fputc_unlocked($p0, $p1 === null ? null : $p1->getData());
        return $result;
    }
    public function putc_unlocked(?int $p0, ?FILE_ptr $p1): ?int {
        $result = $this->ffi->putc_unlocked($p0, $p1 === null ? null : $p1->getData());
        return $result;
    }
    public function putchar_unlocked(?int $p0): ?int {
        $result = $this->ffi->putchar_unlocked($p0);
        return $result;
    }
    public function getw(?FILE_ptr $p0): ?int {
        $result = $this->ffi->getw($p0 === null ? null : $p0->getData());
        return $result;
    }
    public function putw(?int $p0, ?FILE_ptr $p1): ?int {
        $result = $this->ffi->putw($p0, $p1 === null ? null : $p1->getData());
        return $result;
    }
    public function fgets(?string $p0, ?int $p1, ?FILE_ptr $p2): ?string {
        $result = $this->ffi->fgets($p0, $p1, $p2 === null ? null : $p2->getData());
        return $result;
    }
    public function gets(?string $p0): ?string {
        $result = $this->ffi->gets($p0);
        return $result;
    }
    public function __getdelim(?string_ptr $p0, ?size_t_ptr $p1, ?int $p2, ?FILE_ptr $p3): ?__ssize_t {
        $result = $this->ffi->__getdelim($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2, $p3 === null ? null : $p3->getData());
        return $result === null ? null : new __ssize_t($result);
    }
    public function getdelim(?string_ptr $p0, ?size_t_ptr $p1, ?int $p2, ?FILE_ptr $p3): ?__ssize_t {
        $result = $this->ffi->getdelim($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2, $p3 === null ? null : $p3->getData());
        return $result === null ? null : new __ssize_t($result);
    }
    public function getline(?string_ptr $p0, ?size_t_ptr $p1, ?FILE_ptr $p2): ?__ssize_t {
        $result = $this->ffi->getline($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result === null ? null : new __ssize_t($result);
    }
    public function fputs(?string $p0, ?FILE_ptr $p1): ?int {
        $result = $this->ffi->fputs($p0, $p1 === null ? null : $p1->getData());
        return $result;
    }
    public function puts(?string $p0): ?int {
        $result = $this->ffi->puts($p0);
        return $result;
    }
    public function ungetc(?int $p0, ?FILE_ptr $p1): ?int {
        $result = $this->ffi->ungetc($p0, $p1 === null ? null : $p1->getData());
        return $result;
    }
    public function fread(?void_ptr $p0, ?size_t $p1, ?size_t $p2, ?FILE_ptr $p3): ?size_t {
        $result = $this->ffi->fread($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData(), $p3 === null ? null : $p3->getData());
        return $result === null ? null : new size_t($result);
    }
    public function fwrite(?void_ptr $p0, ?size_t $p1, ?size_t $p2, ?FILE_ptr $p3): ?size_t {
        $result = $this->ffi->fwrite($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData(), $p3 === null ? null : $p3->getData());
        return $result === null ? null : new size_t($result);
    }
    public function fread_unlocked(?void_ptr $p0, ?size_t $p1, ?size_t $p2, ?FILE_ptr $p3): ?size_t {
        $result = $this->ffi->fread_unlocked($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData(), $p3 === null ? null : $p3->getData());
        return $result === null ? null : new size_t($result);
    }
    public function fwrite_unlocked(?void_ptr $p0, ?size_t $p1, ?size_t $p2, ?FILE_ptr $p3): ?size_t {
        $result = $this->ffi->fwrite_unlocked($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData(), $p3 === null ? null : $p3->getData());
        return $result === null ? null : new size_t($result);
    }
    public function fseek(?FILE_ptr $p0, ?int $p1, ?int $p2): ?int {
        $result = $this->ffi->fseek($p0 === null ? null : $p0->getData(), $p1, $p2);
        return $result;
    }
    public function ftell(?FILE_ptr $p0): ?int {
        $result = $this->ffi->ftell($p0 === null ? null : $p0->getData());
        return $result;
    }
    public function rewind(?FILE_ptr $p0): void {
        $this->ffi->rewind($p0 === null ? null : $p0->getData());
    }
    public function fseeko(?FILE_ptr $p0, ?__off_t $p1, ?int $p2): ?int {
        $result = $this->ffi->fseeko($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2);
        return $result;
    }
    public function ftello(?FILE_ptr $p0): ?__off_t {
        $result = $this->ffi->ftello($p0 === null ? null : $p0->getData());
        return $result === null ? null : new __off_t($result);
    }
    public function fgetpos(?FILE_ptr $p0, ?fpos_t_ptr $p1): ?int {
        $result = $this->ffi->fgetpos($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result;
    }
    public function fsetpos(?FILE_ptr $p0, ?fpos_t_ptr $p1): ?int {
        $result = $this->ffi->fsetpos($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result;
    }
    public function clearerr(?FILE_ptr $p0): void {
        $this->ffi->clearerr($p0 === null ? null : $p0->getData());
    }
    public function feof(?FILE_ptr $p0): ?int {
        $result = $this->ffi->feof($p0 === null ? null : $p0->getData());
        return $result;
    }
    public function ferror(?FILE_ptr $p0): ?int {
        $result = $this->ffi->ferror($p0 === null ? null : $p0->getData());
        return $result;
    }
    public function clearerr_unlocked(?FILE_ptr $p0): void {
        $this->ffi->clearerr_unlocked($p0 === null ? null : $p0->getData());
    }
    public function feof_unlocked(?FILE_ptr $p0): ?int {
        $result = $this->ffi->feof_unlocked($p0 === null ? null : $p0->getData());
        return $result;
    }
    public function ferror_unlocked(?FILE_ptr $p0): ?int {
        $result = $this->ffi->ferror_unlocked($p0 === null ? null : $p0->getData());
        return $result;
    }
    public function perror(?string $p0): void {
        $this->ffi->perror($p0);
    }
    public function fileno(?FILE_ptr $p0): ?int {
        $result = $this->ffi->fileno($p0 === null ? null : $p0->getData());
        return $result;
    }
    public function fileno_unlocked(?FILE_ptr $p0): ?int {
        $result = $this->ffi->fileno_unlocked($p0 === null ? null : $p0->getData());
        return $result;
    }
    public function popen(?string $p0, ?string $p1): ?FILE_ptr {
        $result = $this->ffi->popen($p0, $p1);
        return $result === null ? null : new FILE_ptr($result);
    }
    public function pclose(?FILE_ptr $p0): ?int {
        $result = $this->ffi->pclose($p0 === null ? null : $p0->getData());
        return $result;
    }
    public function ctermid(?string $p0): ?string {
        $result = $this->ffi->ctermid($p0);
        return $result;
    }
    public function flockfile(?FILE_ptr $p0): void {
        $this->ffi->flockfile($p0 === null ? null : $p0->getData());
    }
    public function ftrylockfile(?FILE_ptr $p0): ?int {
        $result = $this->ffi->ftrylockfile($p0 === null ? null : $p0->getData());
        return $result;
    }
    public function funlockfile(?FILE_ptr $p0): void {
        $this->ffi->funlockfile($p0 === null ? null : $p0->getData());
    }
    public function gcc_jit_context_acquire(): ?gcc_jit_context_ptr {
        $result = $this->ffi->gcc_jit_context_acquire();
        return $result === null ? null : new gcc_jit_context_ptr($result);
    }
    public function gcc_jit_context_release(?gcc_jit_context_ptr $p0): void {
        $this->ffi->gcc_jit_context_release($p0 === null ? null : $p0->getData());
    }
    // enum gcc_jit_str_option
    const GCC_JIT_STR_OPTION_PROGNAME = 0;
    const GCC_JIT_NUM_STR_OPTIONS = 1;
    // enum gcc_jit_int_option
    const GCC_JIT_INT_OPTION_OPTIMIZATION_LEVEL = 0;
    const GCC_JIT_NUM_INT_OPTIONS = 1;
    // enum gcc_jit_bool_option
    const GCC_JIT_BOOL_OPTION_DEBUGINFO = 0;
    const GCC_JIT_BOOL_OPTION_DUMP_INITIAL_TREE = 1;
    const GCC_JIT_BOOL_OPTION_DUMP_INITIAL_GIMPLE = 2;
    const GCC_JIT_BOOL_OPTION_DUMP_GENERATED_CODE = 3;
    const GCC_JIT_BOOL_OPTION_DUMP_SUMMARY = 4;
    const GCC_JIT_BOOL_OPTION_DUMP_EVERYTHING = 5;
    const GCC_JIT_BOOL_OPTION_SELFCHECK_GC = 6;
    const GCC_JIT_BOOL_OPTION_KEEP_INTERMEDIATES = 7;
    const GCC_JIT_NUM_BOOL_OPTIONS = 8;
    public function gcc_jit_context_set_str_option(?gcc_jit_context_ptr $p0, ?int $p1, ?string $p2): void {
        $this->ffi->gcc_jit_context_set_str_option($p0 === null ? null : $p0->getData(), $p1, $p2);
    }
    public function gcc_jit_context_set_int_option(?gcc_jit_context_ptr $p0, ?int $p1, ?int $p2): void {
        $this->ffi->gcc_jit_context_set_int_option($p0 === null ? null : $p0->getData(), $p1, $p2);
    }
    public function gcc_jit_context_set_bool_option(?gcc_jit_context_ptr $p0, ?int $p1, ?int $p2): void {
        $this->ffi->gcc_jit_context_set_bool_option($p0 === null ? null : $p0->getData(), $p1, $p2);
    }
    public function gcc_jit_context_set_bool_allow_unreachable_blocks(?gcc_jit_context_ptr $p0, ?int $p1): void {
        $this->ffi->gcc_jit_context_set_bool_allow_unreachable_blocks($p0 === null ? null : $p0->getData(), $p1);
    }
    public function gcc_jit_context_set_bool_use_external_driver(?gcc_jit_context_ptr $p0, ?int $p1): void {
        $this->ffi->gcc_jit_context_set_bool_use_external_driver($p0 === null ? null : $p0->getData(), $p1);
    }
    public function gcc_jit_context_add_command_line_option(?gcc_jit_context_ptr $p0, ?string $p1): void {
        $this->ffi->gcc_jit_context_add_command_line_option($p0 === null ? null : $p0->getData(), $p1);
    }
    public function gcc_jit_context_compile(?gcc_jit_context_ptr $p0): ?gcc_jit_result_ptr {
        $result = $this->ffi->gcc_jit_context_compile($p0 === null ? null : $p0->getData());
        return $result === null ? null : new gcc_jit_result_ptr($result);
    }
    // enum gcc_jit_output_kind
    const GCC_JIT_OUTPUT_KIND_ASSEMBLER = 0;
    const GCC_JIT_OUTPUT_KIND_OBJECT_FILE = 1;
    const GCC_JIT_OUTPUT_KIND_DYNAMIC_LIBRARY = 2;
    const GCC_JIT_OUTPUT_KIND_EXECUTABLE = 3;
    public function gcc_jit_context_compile_to_file(?gcc_jit_context_ptr $p0, ?int $p1, ?string $p2): void {
        $this->ffi->gcc_jit_context_compile_to_file($p0 === null ? null : $p0->getData(), $p1, $p2);
    }
    public function gcc_jit_context_dump_to_file(?gcc_jit_context_ptr $p0, ?string $p1, ?int $p2): void {
        $this->ffi->gcc_jit_context_dump_to_file($p0 === null ? null : $p0->getData(), $p1, $p2);
    }
    public function gcc_jit_context_set_logfile(?gcc_jit_context_ptr $p0, ?FILE_ptr $p1, ?int $p2, ?int $p3): void {
        $this->ffi->gcc_jit_context_set_logfile($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2, $p3);
    }
    public function gcc_jit_context_get_first_error(?gcc_jit_context_ptr $p0): ?string {
        $result = $this->ffi->gcc_jit_context_get_first_error($p0 === null ? null : $p0->getData());
        return $result;
    }
    public function gcc_jit_context_get_last_error(?gcc_jit_context_ptr $p0): ?string {
        $result = $this->ffi->gcc_jit_context_get_last_error($p0 === null ? null : $p0->getData());
        return $result;
    }
    public function gcc_jit_result_get_code(?gcc_jit_result_ptr $p0, ?string $p1): ?void_ptr {
        $result = $this->ffi->gcc_jit_result_get_code($p0 === null ? null : $p0->getData(), $p1);
        return $result === null ? null : new void_ptr($result);
    }
    public function gcc_jit_result_get_global(?gcc_jit_result_ptr $p0, ?string $p1): ?void_ptr {
        $result = $this->ffi->gcc_jit_result_get_global($p0 === null ? null : $p0->getData(), $p1);
        return $result === null ? null : new void_ptr($result);
    }
    public function gcc_jit_result_release(?gcc_jit_result_ptr $p0): void {
        $this->ffi->gcc_jit_result_release($p0 === null ? null : $p0->getData());
    }
    public function gcc_jit_object_get_context(?gcc_jit_object_ptr $p0): ?gcc_jit_context_ptr {
        $result = $this->ffi->gcc_jit_object_get_context($p0 === null ? null : $p0->getData());
        return $result === null ? null : new gcc_jit_context_ptr($result);
    }
    public function gcc_jit_object_get_debug_string(?gcc_jit_object_ptr $p0): ?string {
        $result = $this->ffi->gcc_jit_object_get_debug_string($p0 === null ? null : $p0->getData());
        return $result;
    }
    public function gcc_jit_context_new_location(?gcc_jit_context_ptr $p0, ?string $p1, ?int $p2, ?int $p3): ?gcc_jit_location_ptr {
        $result = $this->ffi->gcc_jit_context_new_location($p0 === null ? null : $p0->getData(), $p1, $p2, $p3);
        return $result === null ? null : new gcc_jit_location_ptr($result);
    }
    public function gcc_jit_location_as_object(?gcc_jit_location_ptr $p0): ?gcc_jit_object_ptr {
        $result = $this->ffi->gcc_jit_location_as_object($p0 === null ? null : $p0->getData());
        return $result === null ? null : new gcc_jit_object_ptr($result);
    }
    public function gcc_jit_type_as_object(?gcc_jit_type_ptr $p0): ?gcc_jit_object_ptr {
        $result = $this->ffi->gcc_jit_type_as_object($p0 === null ? null : $p0->getData());
        return $result === null ? null : new gcc_jit_object_ptr($result);
    }
    // enum gcc_jit_types
    const GCC_JIT_TYPE_VOID = 0;
    const GCC_JIT_TYPE_VOID_PTR = 1;
    const GCC_JIT_TYPE_BOOL = 2;
    const GCC_JIT_TYPE_CHAR = 3;
    const GCC_JIT_TYPE_SIGNED_CHAR = 4;
    const GCC_JIT_TYPE_UNSIGNED_CHAR = 5;
    const GCC_JIT_TYPE_SHORT = 6;
    const GCC_JIT_TYPE_UNSIGNED_SHORT = 7;
    const GCC_JIT_TYPE_INT = 8;
    const GCC_JIT_TYPE_UNSIGNED_INT = 9;
    const GCC_JIT_TYPE_LONG = 10;
    const GCC_JIT_TYPE_UNSIGNED_LONG = 11;
    const GCC_JIT_TYPE_LONG_LONG = 12;
    const GCC_JIT_TYPE_UNSIGNED_LONG_LONG = 13;
    const GCC_JIT_TYPE_FLOAT = 14;
    const GCC_JIT_TYPE_DOUBLE = 15;
    const GCC_JIT_TYPE_LONG_DOUBLE = 16;
    const GCC_JIT_TYPE_CONST_CHAR_PTR = 17;
    const GCC_JIT_TYPE_SIZE_T = 18;
    const GCC_JIT_TYPE_FILE_PTR = 19;
    const GCC_JIT_TYPE_COMPLEX_FLOAT = 20;
    const GCC_JIT_TYPE_COMPLEX_DOUBLE = 21;
    const GCC_JIT_TYPE_COMPLEX_LONG_DOUBLE = 22;
    public function gcc_jit_context_get_type(?gcc_jit_context_ptr $p0, ?int $p1): ?gcc_jit_type_ptr {
        $result = $this->ffi->gcc_jit_context_get_type($p0 === null ? null : $p0->getData(), $p1);
        return $result === null ? null : new gcc_jit_type_ptr($result);
    }
    public function gcc_jit_context_get_int_type(?gcc_jit_context_ptr $p0, ?int $p1, ?int $p2): ?gcc_jit_type_ptr {
        $result = $this->ffi->gcc_jit_context_get_int_type($p0 === null ? null : $p0->getData(), $p1, $p2);
        return $result === null ? null : new gcc_jit_type_ptr($result);
    }
    public function gcc_jit_type_get_pointer(?gcc_jit_type_ptr $p0): ?gcc_jit_type_ptr {
        $result = $this->ffi->gcc_jit_type_get_pointer($p0 === null ? null : $p0->getData());
        return $result === null ? null : new gcc_jit_type_ptr($result);
    }
    public function gcc_jit_type_get_const(?gcc_jit_type_ptr $p0): ?gcc_jit_type_ptr {
        $result = $this->ffi->gcc_jit_type_get_const($p0 === null ? null : $p0->getData());
        return $result === null ? null : new gcc_jit_type_ptr($result);
    }
    public function gcc_jit_type_get_volatile(?gcc_jit_type_ptr $p0): ?gcc_jit_type_ptr {
        $result = $this->ffi->gcc_jit_type_get_volatile($p0 === null ? null : $p0->getData());
        return $result === null ? null : new gcc_jit_type_ptr($result);
    }
    public function gcc_jit_context_new_array_type(?gcc_jit_context_ptr $p0, ?gcc_jit_location_ptr $p1, ?gcc_jit_type_ptr $p2, ?int $p3): ?gcc_jit_type_ptr {
        $result = $this->ffi->gcc_jit_context_new_array_type($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData(), $p3);
        return $result === null ? null : new gcc_jit_type_ptr($result);
    }
    public function gcc_jit_context_new_field(?gcc_jit_context_ptr $p0, ?gcc_jit_location_ptr $p1, ?gcc_jit_type_ptr $p2, ?string $p3): ?gcc_jit_field_ptr {
        $result = $this->ffi->gcc_jit_context_new_field($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData(), $p3);
        return $result === null ? null : new gcc_jit_field_ptr($result);
    }
    public function gcc_jit_field_as_object(?gcc_jit_field_ptr $p0): ?gcc_jit_object_ptr {
        $result = $this->ffi->gcc_jit_field_as_object($p0 === null ? null : $p0->getData());
        return $result === null ? null : new gcc_jit_object_ptr($result);
    }
    public function gcc_jit_context_new_struct_type(?gcc_jit_context_ptr $p0, ?gcc_jit_location_ptr $p1, ?string $p2, ?int $p3, ?gcc_jit_field_ptr_ptr $p4): ?gcc_jit_struct_ptr {
        $result = $this->ffi->gcc_jit_context_new_struct_type($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2, $p3, $p4 === null ? null : $p4->getData());
        return $result === null ? null : new gcc_jit_struct_ptr($result);
    }
    public function gcc_jit_context_new_opaque_struct(?gcc_jit_context_ptr $p0, ?gcc_jit_location_ptr $p1, ?string $p2): ?gcc_jit_struct_ptr {
        $result = $this->ffi->gcc_jit_context_new_opaque_struct($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2);
        return $result === null ? null : new gcc_jit_struct_ptr($result);
    }
    public function gcc_jit_struct_as_type(?gcc_jit_struct_ptr $p0): ?gcc_jit_type_ptr {
        $result = $this->ffi->gcc_jit_struct_as_type($p0 === null ? null : $p0->getData());
        return $result === null ? null : new gcc_jit_type_ptr($result);
    }
    public function gcc_jit_struct_set_fields(?gcc_jit_struct_ptr $p0, ?gcc_jit_location_ptr $p1, ?int $p2, ?gcc_jit_field_ptr_ptr $p3): void {
        $this->ffi->gcc_jit_struct_set_fields($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2, $p3 === null ? null : $p3->getData());
    }
    public function gcc_jit_context_new_union_type(?gcc_jit_context_ptr $p0, ?gcc_jit_location_ptr $p1, ?string $p2, ?int $p3, ?gcc_jit_field_ptr_ptr $p4): ?gcc_jit_type_ptr {
        $result = $this->ffi->gcc_jit_context_new_union_type($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2, $p3, $p4 === null ? null : $p4->getData());
        return $result === null ? null : new gcc_jit_type_ptr($result);
    }
    public function gcc_jit_context_new_function_ptr_type(?gcc_jit_context_ptr $p0, ?gcc_jit_location_ptr $p1, ?gcc_jit_type_ptr $p2, ?int $p3, ?gcc_jit_type_ptr_ptr $p4, ?int $p5): ?gcc_jit_type_ptr {
        $result = $this->ffi->gcc_jit_context_new_function_ptr_type($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData(), $p3, $p4 === null ? null : $p4->getData(), $p5);
        return $result === null ? null : new gcc_jit_type_ptr($result);
    }
    public function gcc_jit_context_new_param(?gcc_jit_context_ptr $p0, ?gcc_jit_location_ptr $p1, ?gcc_jit_type_ptr $p2, ?string $p3): ?gcc_jit_param_ptr {
        $result = $this->ffi->gcc_jit_context_new_param($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData(), $p3);
        return $result === null ? null : new gcc_jit_param_ptr($result);
    }
    public function gcc_jit_param_as_object(?gcc_jit_param_ptr $p0): ?gcc_jit_object_ptr {
        $result = $this->ffi->gcc_jit_param_as_object($p0 === null ? null : $p0->getData());
        return $result === null ? null : new gcc_jit_object_ptr($result);
    }
    public function gcc_jit_param_as_lvalue(?gcc_jit_param_ptr $p0): ?gcc_jit_lvalue_ptr {
        $result = $this->ffi->gcc_jit_param_as_lvalue($p0 === null ? null : $p0->getData());
        return $result === null ? null : new gcc_jit_lvalue_ptr($result);
    }
    public function gcc_jit_param_as_rvalue(?gcc_jit_param_ptr $p0): ?gcc_jit_rvalue_ptr {
        $result = $this->ffi->gcc_jit_param_as_rvalue($p0 === null ? null : $p0->getData());
        return $result === null ? null : new gcc_jit_rvalue_ptr($result);
    }
    // enum gcc_jit_function_kind
    const GCC_JIT_FUNCTION_EXPORTED = 0;
    const GCC_JIT_FUNCTION_INTERNAL = 1;
    const GCC_JIT_FUNCTION_IMPORTED = 2;
    const GCC_JIT_FUNCTION_ALWAYS_INLINE = 3;
    public function gcc_jit_context_new_function(?gcc_jit_context_ptr $p0, ?gcc_jit_location_ptr $p1, ?int $p2, ?gcc_jit_type_ptr $p3, ?string $p4, ?int $p5, ?gcc_jit_param_ptr_ptr $p6, ?int $p7): ?gcc_jit_function_ptr {
        $result = $this->ffi->gcc_jit_context_new_function($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2, $p3 === null ? null : $p3->getData(), $p4, $p5, $p6 === null ? null : $p6->getData(), $p7);
        return $result === null ? null : new gcc_jit_function_ptr($result);
    }
    public function gcc_jit_context_get_builtin_function(?gcc_jit_context_ptr $p0, ?string $p1): ?gcc_jit_function_ptr {
        $result = $this->ffi->gcc_jit_context_get_builtin_function($p0 === null ? null : $p0->getData(), $p1);
        return $result === null ? null : new gcc_jit_function_ptr($result);
    }
    public function gcc_jit_function_as_object(?gcc_jit_function_ptr $p0): ?gcc_jit_object_ptr {
        $result = $this->ffi->gcc_jit_function_as_object($p0 === null ? null : $p0->getData());
        return $result === null ? null : new gcc_jit_object_ptr($result);
    }
    public function gcc_jit_function_get_param(?gcc_jit_function_ptr $p0, ?int $p1): ?gcc_jit_param_ptr {
        $result = $this->ffi->gcc_jit_function_get_param($p0 === null ? null : $p0->getData(), $p1);
        return $result === null ? null : new gcc_jit_param_ptr($result);
    }
    public function gcc_jit_function_dump_to_dot(?gcc_jit_function_ptr $p0, ?string $p1): void {
        $this->ffi->gcc_jit_function_dump_to_dot($p0 === null ? null : $p0->getData(), $p1);
    }
    public function gcc_jit_function_new_block(?gcc_jit_function_ptr $p0, ?string $p1): ?gcc_jit_block_ptr {
        $result = $this->ffi->gcc_jit_function_new_block($p0 === null ? null : $p0->getData(), $p1);
        return $result === null ? null : new gcc_jit_block_ptr($result);
    }
    public function gcc_jit_block_as_object(?gcc_jit_block_ptr $p0): ?gcc_jit_object_ptr {
        $result = $this->ffi->gcc_jit_block_as_object($p0 === null ? null : $p0->getData());
        return $result === null ? null : new gcc_jit_object_ptr($result);
    }
    public function gcc_jit_block_get_function(?gcc_jit_block_ptr $p0): ?gcc_jit_function_ptr {
        $result = $this->ffi->gcc_jit_block_get_function($p0 === null ? null : $p0->getData());
        return $result === null ? null : new gcc_jit_function_ptr($result);
    }
    // enum gcc_jit_global_kind
    const GCC_JIT_GLOBAL_EXPORTED = 0;
    const GCC_JIT_GLOBAL_INTERNAL = 1;
    const GCC_JIT_GLOBAL_IMPORTED = 2;
    public function gcc_jit_context_new_global(?gcc_jit_context_ptr $p0, ?gcc_jit_location_ptr $p1, ?int $p2, ?gcc_jit_type_ptr $p3, ?string $p4): ?gcc_jit_lvalue_ptr {
        $result = $this->ffi->gcc_jit_context_new_global($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2, $p3 === null ? null : $p3->getData(), $p4);
        return $result === null ? null : new gcc_jit_lvalue_ptr($result);
    }
    public function gcc_jit_lvalue_as_object(?gcc_jit_lvalue_ptr $p0): ?gcc_jit_object_ptr {
        $result = $this->ffi->gcc_jit_lvalue_as_object($p0 === null ? null : $p0->getData());
        return $result === null ? null : new gcc_jit_object_ptr($result);
    }
    public function gcc_jit_lvalue_as_rvalue(?gcc_jit_lvalue_ptr $p0): ?gcc_jit_rvalue_ptr {
        $result = $this->ffi->gcc_jit_lvalue_as_rvalue($p0 === null ? null : $p0->getData());
        return $result === null ? null : new gcc_jit_rvalue_ptr($result);
    }
    public function gcc_jit_rvalue_as_object(?gcc_jit_rvalue_ptr $p0): ?gcc_jit_object_ptr {
        $result = $this->ffi->gcc_jit_rvalue_as_object($p0 === null ? null : $p0->getData());
        return $result === null ? null : new gcc_jit_object_ptr($result);
    }
    public function gcc_jit_rvalue_get_type(?gcc_jit_rvalue_ptr $p0): ?gcc_jit_type_ptr {
        $result = $this->ffi->gcc_jit_rvalue_get_type($p0 === null ? null : $p0->getData());
        return $result === null ? null : new gcc_jit_type_ptr($result);
    }
    public function gcc_jit_context_new_rvalue_from_int(?gcc_jit_context_ptr $p0, ?gcc_jit_type_ptr $p1, ?int $p2): ?gcc_jit_rvalue_ptr {
        $result = $this->ffi->gcc_jit_context_new_rvalue_from_int($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2);
        return $result === null ? null : new gcc_jit_rvalue_ptr($result);
    }
    public function gcc_jit_context_new_rvalue_from_long(?gcc_jit_context_ptr $p0, ?gcc_jit_type_ptr $p1, ?int $p2): ?gcc_jit_rvalue_ptr {
        $result = $this->ffi->gcc_jit_context_new_rvalue_from_long($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2);
        return $result === null ? null : new gcc_jit_rvalue_ptr($result);
    }
    public function gcc_jit_context_zero(?gcc_jit_context_ptr $p0, ?gcc_jit_type_ptr $p1): ?gcc_jit_rvalue_ptr {
        $result = $this->ffi->gcc_jit_context_zero($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new gcc_jit_rvalue_ptr($result);
    }
    public function gcc_jit_context_one(?gcc_jit_context_ptr $p0, ?gcc_jit_type_ptr $p1): ?gcc_jit_rvalue_ptr {
        $result = $this->ffi->gcc_jit_context_one($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new gcc_jit_rvalue_ptr($result);
    }
    public function gcc_jit_context_new_rvalue_from_double(?gcc_jit_context_ptr $p0, ?gcc_jit_type_ptr $p1, ?float $p2): ?gcc_jit_rvalue_ptr {
        $result = $this->ffi->gcc_jit_context_new_rvalue_from_double($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2);
        return $result === null ? null : new gcc_jit_rvalue_ptr($result);
    }
    public function gcc_jit_context_new_rvalue_from_ptr(?gcc_jit_context_ptr $p0, ?gcc_jit_type_ptr $p1, ?void_ptr $p2): ?gcc_jit_rvalue_ptr {
        $result = $this->ffi->gcc_jit_context_new_rvalue_from_ptr($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result === null ? null : new gcc_jit_rvalue_ptr($result);
    }
    public function gcc_jit_context_null(?gcc_jit_context_ptr $p0, ?gcc_jit_type_ptr $p1): ?gcc_jit_rvalue_ptr {
        $result = $this->ffi->gcc_jit_context_null($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new gcc_jit_rvalue_ptr($result);
    }
    public function gcc_jit_context_new_string_literal(?gcc_jit_context_ptr $p0, ?string $p1): ?gcc_jit_rvalue_ptr {
        $result = $this->ffi->gcc_jit_context_new_string_literal($p0 === null ? null : $p0->getData(), $p1);
        return $result === null ? null : new gcc_jit_rvalue_ptr($result);
    }
    // enum gcc_jit_unary_op
    const GCC_JIT_UNARY_OP_MINUS = 0;
    const GCC_JIT_UNARY_OP_BITWISE_NEGATE = 1;
    const GCC_JIT_UNARY_OP_LOGICAL_NEGATE = 2;
    const GCC_JIT_UNARY_OP_ABS = 3;
    public function gcc_jit_context_new_unary_op(?gcc_jit_context_ptr $p0, ?gcc_jit_location_ptr $p1, ?int $p2, ?gcc_jit_type_ptr $p3, ?gcc_jit_rvalue_ptr $p4): ?gcc_jit_rvalue_ptr {
        $result = $this->ffi->gcc_jit_context_new_unary_op($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2, $p3 === null ? null : $p3->getData(), $p4 === null ? null : $p4->getData());
        return $result === null ? null : new gcc_jit_rvalue_ptr($result);
    }
    // enum gcc_jit_binary_op
    const GCC_JIT_BINARY_OP_PLUS = 0;
    const GCC_JIT_BINARY_OP_MINUS = 1;
    const GCC_JIT_BINARY_OP_MULT = 2;
    const GCC_JIT_BINARY_OP_DIVIDE = 3;
    const GCC_JIT_BINARY_OP_MODULO = 4;
    const GCC_JIT_BINARY_OP_BITWISE_AND = 5;
    const GCC_JIT_BINARY_OP_BITWISE_XOR = 6;
    const GCC_JIT_BINARY_OP_BITWISE_OR = 7;
    const GCC_JIT_BINARY_OP_LOGICAL_AND = 8;
    const GCC_JIT_BINARY_OP_LOGICAL_OR = 9;
    const GCC_JIT_BINARY_OP_LSHIFT = 10;
    const GCC_JIT_BINARY_OP_RSHIFT = 11;
    public function gcc_jit_context_new_binary_op(?gcc_jit_context_ptr $p0, ?gcc_jit_location_ptr $p1, ?int $p2, ?gcc_jit_type_ptr $p3, ?gcc_jit_rvalue_ptr $p4, ?gcc_jit_rvalue_ptr $p5): ?gcc_jit_rvalue_ptr {
        $result = $this->ffi->gcc_jit_context_new_binary_op($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2, $p3 === null ? null : $p3->getData(), $p4 === null ? null : $p4->getData(), $p5 === null ? null : $p5->getData());
        return $result === null ? null : new gcc_jit_rvalue_ptr($result);
    }
    // enum gcc_jit_comparison
    const GCC_JIT_COMPARISON_EQ = 0;
    const GCC_JIT_COMPARISON_NE = 1;
    const GCC_JIT_COMPARISON_LT = 2;
    const GCC_JIT_COMPARISON_LE = 3;
    const GCC_JIT_COMPARISON_GT = 4;
    const GCC_JIT_COMPARISON_GE = 5;
    public function gcc_jit_context_new_comparison(?gcc_jit_context_ptr $p0, ?gcc_jit_location_ptr $p1, ?int $p2, ?gcc_jit_rvalue_ptr $p3, ?gcc_jit_rvalue_ptr $p4): ?gcc_jit_rvalue_ptr {
        $result = $this->ffi->gcc_jit_context_new_comparison($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2, $p3 === null ? null : $p3->getData(), $p4 === null ? null : $p4->getData());
        return $result === null ? null : new gcc_jit_rvalue_ptr($result);
    }
    public function gcc_jit_context_new_call(?gcc_jit_context_ptr $p0, ?gcc_jit_location_ptr $p1, ?gcc_jit_function_ptr $p2, ?int $p3, ?gcc_jit_rvalue_ptr_ptr $p4): ?gcc_jit_rvalue_ptr {
        $result = $this->ffi->gcc_jit_context_new_call($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData(), $p3, $p4 === null ? null : $p4->getData());
        return $result === null ? null : new gcc_jit_rvalue_ptr($result);
    }
    public function gcc_jit_context_new_call_through_ptr(?gcc_jit_context_ptr $p0, ?gcc_jit_location_ptr $p1, ?gcc_jit_rvalue_ptr $p2, ?int $p3, ?gcc_jit_rvalue_ptr_ptr $p4): ?gcc_jit_rvalue_ptr {
        $result = $this->ffi->gcc_jit_context_new_call_through_ptr($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData(), $p3, $p4 === null ? null : $p4->getData());
        return $result === null ? null : new gcc_jit_rvalue_ptr($result);
    }
    public function gcc_jit_context_new_cast(?gcc_jit_context_ptr $p0, ?gcc_jit_location_ptr $p1, ?gcc_jit_rvalue_ptr $p2, ?gcc_jit_type_ptr $p3): ?gcc_jit_rvalue_ptr {
        $result = $this->ffi->gcc_jit_context_new_cast($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData(), $p3 === null ? null : $p3->getData());
        return $result === null ? null : new gcc_jit_rvalue_ptr($result);
    }
    public function gcc_jit_context_new_array_access(?gcc_jit_context_ptr $p0, ?gcc_jit_location_ptr $p1, ?gcc_jit_rvalue_ptr $p2, ?gcc_jit_rvalue_ptr $p3): ?gcc_jit_lvalue_ptr {
        $result = $this->ffi->gcc_jit_context_new_array_access($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData(), $p3 === null ? null : $p3->getData());
        return $result === null ? null : new gcc_jit_lvalue_ptr($result);
    }
    public function gcc_jit_lvalue_access_field(?gcc_jit_lvalue_ptr $p0, ?gcc_jit_location_ptr $p1, ?gcc_jit_field_ptr $p2): ?gcc_jit_lvalue_ptr {
        $result = $this->ffi->gcc_jit_lvalue_access_field($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result === null ? null : new gcc_jit_lvalue_ptr($result);
    }
    public function gcc_jit_rvalue_access_field(?gcc_jit_rvalue_ptr $p0, ?gcc_jit_location_ptr $p1, ?gcc_jit_field_ptr $p2): ?gcc_jit_rvalue_ptr {
        $result = $this->ffi->gcc_jit_rvalue_access_field($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result === null ? null : new gcc_jit_rvalue_ptr($result);
    }
    public function gcc_jit_rvalue_dereference_field(?gcc_jit_rvalue_ptr $p0, ?gcc_jit_location_ptr $p1, ?gcc_jit_field_ptr $p2): ?gcc_jit_lvalue_ptr {
        $result = $this->ffi->gcc_jit_rvalue_dereference_field($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result === null ? null : new gcc_jit_lvalue_ptr($result);
    }
    public function gcc_jit_rvalue_dereference(?gcc_jit_rvalue_ptr $p0, ?gcc_jit_location_ptr $p1): ?gcc_jit_lvalue_ptr {
        $result = $this->ffi->gcc_jit_rvalue_dereference($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new gcc_jit_lvalue_ptr($result);
    }
    public function gcc_jit_lvalue_get_address(?gcc_jit_lvalue_ptr $p0, ?gcc_jit_location_ptr $p1): ?gcc_jit_rvalue_ptr {
        $result = $this->ffi->gcc_jit_lvalue_get_address($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new gcc_jit_rvalue_ptr($result);
    }
    public function gcc_jit_function_new_local(?gcc_jit_function_ptr $p0, ?gcc_jit_location_ptr $p1, ?gcc_jit_type_ptr $p2, ?string $p3): ?gcc_jit_lvalue_ptr {
        $result = $this->ffi->gcc_jit_function_new_local($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData(), $p3);
        return $result === null ? null : new gcc_jit_lvalue_ptr($result);
    }
    public function gcc_jit_block_add_eval(?gcc_jit_block_ptr $p0, ?gcc_jit_location_ptr $p1, ?gcc_jit_rvalue_ptr $p2): void {
        $this->ffi->gcc_jit_block_add_eval($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
    }
    public function gcc_jit_block_add_assignment(?gcc_jit_block_ptr $p0, ?gcc_jit_location_ptr $p1, ?gcc_jit_lvalue_ptr $p2, ?gcc_jit_rvalue_ptr $p3): void {
        $this->ffi->gcc_jit_block_add_assignment($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData(), $p3 === null ? null : $p3->getData());
    }
    public function gcc_jit_block_add_assignment_op(?gcc_jit_block_ptr $p0, ?gcc_jit_location_ptr $p1, ?gcc_jit_lvalue_ptr $p2, ?int $p3, ?gcc_jit_rvalue_ptr $p4): void {
        $this->ffi->gcc_jit_block_add_assignment_op($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData(), $p3, $p4 === null ? null : $p4->getData());
    }
    public function gcc_jit_block_add_comment(?gcc_jit_block_ptr $p0, ?gcc_jit_location_ptr $p1, ?string $p2): void {
        $this->ffi->gcc_jit_block_add_comment($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2);
    }
    public function gcc_jit_block_end_with_conditional(?gcc_jit_block_ptr $p0, ?gcc_jit_location_ptr $p1, ?gcc_jit_rvalue_ptr $p2, ?gcc_jit_block_ptr $p3, ?gcc_jit_block_ptr $p4): void {
        $this->ffi->gcc_jit_block_end_with_conditional($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData(), $p3 === null ? null : $p3->getData(), $p4 === null ? null : $p4->getData());
    }
    public function gcc_jit_block_end_with_jump(?gcc_jit_block_ptr $p0, ?gcc_jit_location_ptr $p1, ?gcc_jit_block_ptr $p2): void {
        $this->ffi->gcc_jit_block_end_with_jump($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
    }
    public function gcc_jit_block_end_with_return(?gcc_jit_block_ptr $p0, ?gcc_jit_location_ptr $p1, ?gcc_jit_rvalue_ptr $p2): void {
        $this->ffi->gcc_jit_block_end_with_return($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
    }
    public function gcc_jit_block_end_with_void_return(?gcc_jit_block_ptr $p0, ?gcc_jit_location_ptr $p1): void {
        $this->ffi->gcc_jit_block_end_with_void_return($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
    }
    public function gcc_jit_context_new_case(?gcc_jit_context_ptr $p0, ?gcc_jit_rvalue_ptr $p1, ?gcc_jit_rvalue_ptr $p2, ?gcc_jit_block_ptr $p3): ?gcc_jit_case_ptr {
        $result = $this->ffi->gcc_jit_context_new_case($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData(), $p3 === null ? null : $p3->getData());
        return $result === null ? null : new gcc_jit_case_ptr($result);
    }
    public function gcc_jit_case_as_object(?gcc_jit_case_ptr $p0): ?gcc_jit_object_ptr {
        $result = $this->ffi->gcc_jit_case_as_object($p0 === null ? null : $p0->getData());
        return $result === null ? null : new gcc_jit_object_ptr($result);
    }
    public function gcc_jit_block_end_with_switch(?gcc_jit_block_ptr $p0, ?gcc_jit_location_ptr $p1, ?gcc_jit_rvalue_ptr $p2, ?gcc_jit_block_ptr $p3, ?int $p4, ?gcc_jit_case_ptr_ptr $p5): void {
        $this->ffi->gcc_jit_block_end_with_switch($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData(), $p3 === null ? null : $p3->getData(), $p4, $p5 === null ? null : $p5->getData());
    }
    public function gcc_jit_context_new_child_context(?gcc_jit_context_ptr $p0): ?gcc_jit_context_ptr {
        $result = $this->ffi->gcc_jit_context_new_child_context($p0 === null ? null : $p0->getData());
        return $result === null ? null : new gcc_jit_context_ptr($result);
    }
    public function gcc_jit_context_dump_reproducer_to_file(?gcc_jit_context_ptr $p0, ?string $p1): void {
        $this->ffi->gcc_jit_context_dump_reproducer_to_file($p0 === null ? null : $p0->getData(), $p1);
    }
    public function gcc_jit_context_enable_dump(?gcc_jit_context_ptr $p0, ?string $p1, ?string_ptr $p2): void {
        $this->ffi->gcc_jit_context_enable_dump($p0 === null ? null : $p0->getData(), $p1, $p2 === null ? null : $p2->getData());
    }
    public function gcc_jit_timer_new(): ?gcc_jit_timer_ptr {
        $result = $this->ffi->gcc_jit_timer_new();
        return $result === null ? null : new gcc_jit_timer_ptr($result);
    }
    public function gcc_jit_timer_release(?gcc_jit_timer_ptr $p0): void {
        $this->ffi->gcc_jit_timer_release($p0 === null ? null : $p0->getData());
    }
    public function gcc_jit_context_set_timer(?gcc_jit_context_ptr $p0, ?gcc_jit_timer_ptr $p1): void {
        $this->ffi->gcc_jit_context_set_timer($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
    }
    public function gcc_jit_context_get_timer(?gcc_jit_context_ptr $p0): ?gcc_jit_timer_ptr {
        $result = $this->ffi->gcc_jit_context_get_timer($p0 === null ? null : $p0->getData());
        return $result === null ? null : new gcc_jit_timer_ptr($result);
    }
    public function gcc_jit_timer_push(?gcc_jit_timer_ptr $p0, ?string $p1): void {
        $this->ffi->gcc_jit_timer_push($p0 === null ? null : $p0->getData(), $p1);
    }
    public function gcc_jit_timer_pop(?gcc_jit_timer_ptr $p0, ?string $p1): void {
        $this->ffi->gcc_jit_timer_pop($p0 === null ? null : $p0->getData(), $p1);
    }
    public function gcc_jit_timer_print(?gcc_jit_timer_ptr $p0, ?FILE_ptr $p1): void {
        $this->ffi->gcc_jit_timer_print($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
    }
}

class __u_char implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__u_char $other): bool { return $this->data == $other->data; }
    public function addr(): __u_char_ptr { return new __u_char_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__u_char'; }
}
class __u_char_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__u_char_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __u_char_ptr_ptr { return new __u_char_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __u_char { return new __u_char($this->data[$n]); }
    public static function getType(): string { return '__u_char*'; }
}
class __u_char_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__u_char_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __u_char_ptr_ptr_ptr { return new __u_char_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __u_char_ptr { return new __u_char_ptr($this->data[$n]); }
    public static function getType(): string { return '__u_char**'; }
}
class __u_char_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__u_char_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __u_char_ptr_ptr_ptr_ptr { return new __u_char_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __u_char_ptr_ptr { return new __u_char_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__u_char***'; }
}
class __u_char_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__u_char_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __u_char_ptr_ptr_ptr_ptr_ptr { return new __u_char_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __u_char_ptr_ptr_ptr { return new __u_char_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__u_char****'; }
}
class __u_short implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__u_short $other): bool { return $this->data == $other->data; }
    public function addr(): __u_short_ptr { return new __u_short_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__u_short'; }
}
class __u_short_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__u_short_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __u_short_ptr_ptr { return new __u_short_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __u_short { return new __u_short($this->data[$n]); }
    public static function getType(): string { return '__u_short*'; }
}
class __u_short_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__u_short_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __u_short_ptr_ptr_ptr { return new __u_short_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __u_short_ptr { return new __u_short_ptr($this->data[$n]); }
    public static function getType(): string { return '__u_short**'; }
}
class __u_short_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__u_short_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __u_short_ptr_ptr_ptr_ptr { return new __u_short_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __u_short_ptr_ptr { return new __u_short_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__u_short***'; }
}
class __u_short_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__u_short_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __u_short_ptr_ptr_ptr_ptr_ptr { return new __u_short_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __u_short_ptr_ptr_ptr { return new __u_short_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__u_short****'; }
}
class __u_int implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__u_int $other): bool { return $this->data == $other->data; }
    public function addr(): __u_int_ptr { return new __u_int_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__u_int'; }
}
class __u_int_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__u_int_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __u_int_ptr_ptr { return new __u_int_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __u_int { return new __u_int($this->data[$n]); }
    public static function getType(): string { return '__u_int*'; }
}
class __u_int_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__u_int_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __u_int_ptr_ptr_ptr { return new __u_int_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __u_int_ptr { return new __u_int_ptr($this->data[$n]); }
    public static function getType(): string { return '__u_int**'; }
}
class __u_int_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__u_int_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __u_int_ptr_ptr_ptr_ptr { return new __u_int_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __u_int_ptr_ptr { return new __u_int_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__u_int***'; }
}
class __u_int_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__u_int_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __u_int_ptr_ptr_ptr_ptr_ptr { return new __u_int_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __u_int_ptr_ptr_ptr { return new __u_int_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__u_int****'; }
}
class __u_long implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__u_long $other): bool { return $this->data == $other->data; }
    public function addr(): __u_long_ptr { return new __u_long_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__u_long'; }
}
class __u_long_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__u_long_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __u_long_ptr_ptr { return new __u_long_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __u_long { return new __u_long($this->data[$n]); }
    public static function getType(): string { return '__u_long*'; }
}
class __u_long_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__u_long_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __u_long_ptr_ptr_ptr { return new __u_long_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __u_long_ptr { return new __u_long_ptr($this->data[$n]); }
    public static function getType(): string { return '__u_long**'; }
}
class __u_long_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__u_long_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __u_long_ptr_ptr_ptr_ptr { return new __u_long_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __u_long_ptr_ptr { return new __u_long_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__u_long***'; }
}
class __u_long_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__u_long_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __u_long_ptr_ptr_ptr_ptr_ptr { return new __u_long_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __u_long_ptr_ptr_ptr { return new __u_long_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__u_long****'; }
}
class __int8_t implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__int8_t $other): bool { return $this->data == $other->data; }
    public function addr(): __int8_t_ptr { return new __int8_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__int8_t'; }
}
class __int8_t_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__int8_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __int8_t_ptr_ptr { return new __int8_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __int8_t { return new __int8_t($this->data[$n]); }
    public static function getType(): string { return '__int8_t*'; }
}
class __int8_t_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__int8_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __int8_t_ptr_ptr_ptr { return new __int8_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __int8_t_ptr { return new __int8_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__int8_t**'; }
}
class __int8_t_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__int8_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __int8_t_ptr_ptr_ptr_ptr { return new __int8_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __int8_t_ptr_ptr { return new __int8_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__int8_t***'; }
}
class __int8_t_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__int8_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __int8_t_ptr_ptr_ptr_ptr_ptr { return new __int8_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __int8_t_ptr_ptr_ptr { return new __int8_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__int8_t****'; }
}
class __uint8_t implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__uint8_t $other): bool { return $this->data == $other->data; }
    public function addr(): __uint8_t_ptr { return new __uint8_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__uint8_t'; }
}
class __uint8_t_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__uint8_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __uint8_t_ptr_ptr { return new __uint8_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __uint8_t { return new __uint8_t($this->data[$n]); }
    public static function getType(): string { return '__uint8_t*'; }
}
class __uint8_t_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__uint8_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __uint8_t_ptr_ptr_ptr { return new __uint8_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __uint8_t_ptr { return new __uint8_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__uint8_t**'; }
}
class __uint8_t_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__uint8_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __uint8_t_ptr_ptr_ptr_ptr { return new __uint8_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __uint8_t_ptr_ptr { return new __uint8_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__uint8_t***'; }
}
class __uint8_t_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__uint8_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __uint8_t_ptr_ptr_ptr_ptr_ptr { return new __uint8_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __uint8_t_ptr_ptr_ptr { return new __uint8_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__uint8_t****'; }
}
class __int16_t implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__int16_t $other): bool { return $this->data == $other->data; }
    public function addr(): __int16_t_ptr { return new __int16_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__int16_t'; }
}
class __int16_t_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__int16_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __int16_t_ptr_ptr { return new __int16_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __int16_t { return new __int16_t($this->data[$n]); }
    public static function getType(): string { return '__int16_t*'; }
}
class __int16_t_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__int16_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __int16_t_ptr_ptr_ptr { return new __int16_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __int16_t_ptr { return new __int16_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__int16_t**'; }
}
class __int16_t_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__int16_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __int16_t_ptr_ptr_ptr_ptr { return new __int16_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __int16_t_ptr_ptr { return new __int16_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__int16_t***'; }
}
class __int16_t_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__int16_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __int16_t_ptr_ptr_ptr_ptr_ptr { return new __int16_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __int16_t_ptr_ptr_ptr { return new __int16_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__int16_t****'; }
}
class __uint16_t implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__uint16_t $other): bool { return $this->data == $other->data; }
    public function addr(): __uint16_t_ptr { return new __uint16_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__uint16_t'; }
}
class __uint16_t_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__uint16_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __uint16_t_ptr_ptr { return new __uint16_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __uint16_t { return new __uint16_t($this->data[$n]); }
    public static function getType(): string { return '__uint16_t*'; }
}
class __uint16_t_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__uint16_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __uint16_t_ptr_ptr_ptr { return new __uint16_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __uint16_t_ptr { return new __uint16_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__uint16_t**'; }
}
class __uint16_t_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__uint16_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __uint16_t_ptr_ptr_ptr_ptr { return new __uint16_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __uint16_t_ptr_ptr { return new __uint16_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__uint16_t***'; }
}
class __uint16_t_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__uint16_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __uint16_t_ptr_ptr_ptr_ptr_ptr { return new __uint16_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __uint16_t_ptr_ptr_ptr { return new __uint16_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__uint16_t****'; }
}
class __int32_t implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__int32_t $other): bool { return $this->data == $other->data; }
    public function addr(): __int32_t_ptr { return new __int32_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__int32_t'; }
}
class __int32_t_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__int32_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __int32_t_ptr_ptr { return new __int32_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __int32_t { return new __int32_t($this->data[$n]); }
    public static function getType(): string { return '__int32_t*'; }
}
class __int32_t_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__int32_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __int32_t_ptr_ptr_ptr { return new __int32_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __int32_t_ptr { return new __int32_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__int32_t**'; }
}
class __int32_t_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__int32_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __int32_t_ptr_ptr_ptr_ptr { return new __int32_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __int32_t_ptr_ptr { return new __int32_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__int32_t***'; }
}
class __int32_t_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__int32_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __int32_t_ptr_ptr_ptr_ptr_ptr { return new __int32_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __int32_t_ptr_ptr_ptr { return new __int32_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__int32_t****'; }
}
class __uint32_t implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__uint32_t $other): bool { return $this->data == $other->data; }
    public function addr(): __uint32_t_ptr { return new __uint32_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__uint32_t'; }
}
class __uint32_t_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__uint32_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __uint32_t_ptr_ptr { return new __uint32_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __uint32_t { return new __uint32_t($this->data[$n]); }
    public static function getType(): string { return '__uint32_t*'; }
}
class __uint32_t_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__uint32_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __uint32_t_ptr_ptr_ptr { return new __uint32_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __uint32_t_ptr { return new __uint32_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__uint32_t**'; }
}
class __uint32_t_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__uint32_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __uint32_t_ptr_ptr_ptr_ptr { return new __uint32_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __uint32_t_ptr_ptr { return new __uint32_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__uint32_t***'; }
}
class __uint32_t_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__uint32_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __uint32_t_ptr_ptr_ptr_ptr_ptr { return new __uint32_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __uint32_t_ptr_ptr_ptr { return new __uint32_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__uint32_t****'; }
}
class __int64_t implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__int64_t $other): bool { return $this->data == $other->data; }
    public function addr(): __int64_t_ptr { return new __int64_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__int64_t'; }
}
class __int64_t_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__int64_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __int64_t_ptr_ptr { return new __int64_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __int64_t { return new __int64_t($this->data[$n]); }
    public static function getType(): string { return '__int64_t*'; }
}
class __int64_t_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__int64_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __int64_t_ptr_ptr_ptr { return new __int64_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __int64_t_ptr { return new __int64_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__int64_t**'; }
}
class __int64_t_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__int64_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __int64_t_ptr_ptr_ptr_ptr { return new __int64_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __int64_t_ptr_ptr { return new __int64_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__int64_t***'; }
}
class __int64_t_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__int64_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __int64_t_ptr_ptr_ptr_ptr_ptr { return new __int64_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __int64_t_ptr_ptr_ptr { return new __int64_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__int64_t****'; }
}
class __uint64_t implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__uint64_t $other): bool { return $this->data == $other->data; }
    public function addr(): __uint64_t_ptr { return new __uint64_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__uint64_t'; }
}
class __uint64_t_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__uint64_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __uint64_t_ptr_ptr { return new __uint64_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __uint64_t { return new __uint64_t($this->data[$n]); }
    public static function getType(): string { return '__uint64_t*'; }
}
class __uint64_t_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__uint64_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __uint64_t_ptr_ptr_ptr { return new __uint64_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __uint64_t_ptr { return new __uint64_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__uint64_t**'; }
}
class __uint64_t_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__uint64_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __uint64_t_ptr_ptr_ptr_ptr { return new __uint64_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __uint64_t_ptr_ptr { return new __uint64_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__uint64_t***'; }
}
class __uint64_t_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__uint64_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __uint64_t_ptr_ptr_ptr_ptr_ptr { return new __uint64_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __uint64_t_ptr_ptr_ptr { return new __uint64_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__uint64_t****'; }
}
class __quad_t implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__quad_t $other): bool { return $this->data == $other->data; }
    public function addr(): __quad_t_ptr { return new __quad_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__quad_t'; }
}
class __quad_t_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__quad_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __quad_t_ptr_ptr { return new __quad_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __quad_t { return new __quad_t($this->data[$n]); }
    public static function getType(): string { return '__quad_t*'; }
}
class __quad_t_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__quad_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __quad_t_ptr_ptr_ptr { return new __quad_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __quad_t_ptr { return new __quad_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__quad_t**'; }
}
class __quad_t_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__quad_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __quad_t_ptr_ptr_ptr_ptr { return new __quad_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __quad_t_ptr_ptr { return new __quad_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__quad_t***'; }
}
class __quad_t_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__quad_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __quad_t_ptr_ptr_ptr_ptr_ptr { return new __quad_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __quad_t_ptr_ptr_ptr { return new __quad_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__quad_t****'; }
}
class __u_quad_t implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__u_quad_t $other): bool { return $this->data == $other->data; }
    public function addr(): __u_quad_t_ptr { return new __u_quad_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__u_quad_t'; }
}
class __u_quad_t_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__u_quad_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __u_quad_t_ptr_ptr { return new __u_quad_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __u_quad_t { return new __u_quad_t($this->data[$n]); }
    public static function getType(): string { return '__u_quad_t*'; }
}
class __u_quad_t_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__u_quad_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __u_quad_t_ptr_ptr_ptr { return new __u_quad_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __u_quad_t_ptr { return new __u_quad_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__u_quad_t**'; }
}
class __u_quad_t_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__u_quad_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __u_quad_t_ptr_ptr_ptr_ptr { return new __u_quad_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __u_quad_t_ptr_ptr { return new __u_quad_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__u_quad_t***'; }
}
class __u_quad_t_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__u_quad_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __u_quad_t_ptr_ptr_ptr_ptr_ptr { return new __u_quad_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __u_quad_t_ptr_ptr_ptr { return new __u_quad_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__u_quad_t****'; }
}
class __dev_t implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__dev_t $other): bool { return $this->data == $other->data; }
    public function addr(): __dev_t_ptr { return new __dev_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__dev_t'; }
}
class __dev_t_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__dev_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __dev_t_ptr_ptr { return new __dev_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __dev_t { return new __dev_t($this->data[$n]); }
    public static function getType(): string { return '__dev_t*'; }
}
class __dev_t_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__dev_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __dev_t_ptr_ptr_ptr { return new __dev_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __dev_t_ptr { return new __dev_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__dev_t**'; }
}
class __dev_t_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__dev_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __dev_t_ptr_ptr_ptr_ptr { return new __dev_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __dev_t_ptr_ptr { return new __dev_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__dev_t***'; }
}
class __dev_t_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__dev_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __dev_t_ptr_ptr_ptr_ptr_ptr { return new __dev_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __dev_t_ptr_ptr_ptr { return new __dev_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__dev_t****'; }
}
class __uid_t implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__uid_t $other): bool { return $this->data == $other->data; }
    public function addr(): __uid_t_ptr { return new __uid_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__uid_t'; }
}
class __uid_t_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__uid_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __uid_t_ptr_ptr { return new __uid_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __uid_t { return new __uid_t($this->data[$n]); }
    public static function getType(): string { return '__uid_t*'; }
}
class __uid_t_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__uid_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __uid_t_ptr_ptr_ptr { return new __uid_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __uid_t_ptr { return new __uid_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__uid_t**'; }
}
class __uid_t_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__uid_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __uid_t_ptr_ptr_ptr_ptr { return new __uid_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __uid_t_ptr_ptr { return new __uid_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__uid_t***'; }
}
class __uid_t_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__uid_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __uid_t_ptr_ptr_ptr_ptr_ptr { return new __uid_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __uid_t_ptr_ptr_ptr { return new __uid_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__uid_t****'; }
}
class __gid_t implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__gid_t $other): bool { return $this->data == $other->data; }
    public function addr(): __gid_t_ptr { return new __gid_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__gid_t'; }
}
class __gid_t_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__gid_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __gid_t_ptr_ptr { return new __gid_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __gid_t { return new __gid_t($this->data[$n]); }
    public static function getType(): string { return '__gid_t*'; }
}
class __gid_t_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__gid_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __gid_t_ptr_ptr_ptr { return new __gid_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __gid_t_ptr { return new __gid_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__gid_t**'; }
}
class __gid_t_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__gid_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __gid_t_ptr_ptr_ptr_ptr { return new __gid_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __gid_t_ptr_ptr { return new __gid_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__gid_t***'; }
}
class __gid_t_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__gid_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __gid_t_ptr_ptr_ptr_ptr_ptr { return new __gid_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __gid_t_ptr_ptr_ptr { return new __gid_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__gid_t****'; }
}
class __ino_t implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__ino_t $other): bool { return $this->data == $other->data; }
    public function addr(): __ino_t_ptr { return new __ino_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__ino_t'; }
}
class __ino_t_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__ino_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __ino_t_ptr_ptr { return new __ino_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __ino_t { return new __ino_t($this->data[$n]); }
    public static function getType(): string { return '__ino_t*'; }
}
class __ino_t_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__ino_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __ino_t_ptr_ptr_ptr { return new __ino_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __ino_t_ptr { return new __ino_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__ino_t**'; }
}
class __ino_t_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__ino_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __ino_t_ptr_ptr_ptr_ptr { return new __ino_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __ino_t_ptr_ptr { return new __ino_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__ino_t***'; }
}
class __ino_t_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__ino_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __ino_t_ptr_ptr_ptr_ptr_ptr { return new __ino_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __ino_t_ptr_ptr_ptr { return new __ino_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__ino_t****'; }
}
class __ino64_t implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__ino64_t $other): bool { return $this->data == $other->data; }
    public function addr(): __ino64_t_ptr { return new __ino64_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__ino64_t'; }
}
class __ino64_t_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__ino64_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __ino64_t_ptr_ptr { return new __ino64_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __ino64_t { return new __ino64_t($this->data[$n]); }
    public static function getType(): string { return '__ino64_t*'; }
}
class __ino64_t_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__ino64_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __ino64_t_ptr_ptr_ptr { return new __ino64_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __ino64_t_ptr { return new __ino64_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__ino64_t**'; }
}
class __ino64_t_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__ino64_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __ino64_t_ptr_ptr_ptr_ptr { return new __ino64_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __ino64_t_ptr_ptr { return new __ino64_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__ino64_t***'; }
}
class __ino64_t_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__ino64_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __ino64_t_ptr_ptr_ptr_ptr_ptr { return new __ino64_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __ino64_t_ptr_ptr_ptr { return new __ino64_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__ino64_t****'; }
}
class __mode_t implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__mode_t $other): bool { return $this->data == $other->data; }
    public function addr(): __mode_t_ptr { return new __mode_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__mode_t'; }
}
class __mode_t_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__mode_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __mode_t_ptr_ptr { return new __mode_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __mode_t { return new __mode_t($this->data[$n]); }
    public static function getType(): string { return '__mode_t*'; }
}
class __mode_t_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__mode_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __mode_t_ptr_ptr_ptr { return new __mode_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __mode_t_ptr { return new __mode_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__mode_t**'; }
}
class __mode_t_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__mode_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __mode_t_ptr_ptr_ptr_ptr { return new __mode_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __mode_t_ptr_ptr { return new __mode_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__mode_t***'; }
}
class __mode_t_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__mode_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __mode_t_ptr_ptr_ptr_ptr_ptr { return new __mode_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __mode_t_ptr_ptr_ptr { return new __mode_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__mode_t****'; }
}
class __nlink_t implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__nlink_t $other): bool { return $this->data == $other->data; }
    public function addr(): __nlink_t_ptr { return new __nlink_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__nlink_t'; }
}
class __nlink_t_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__nlink_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __nlink_t_ptr_ptr { return new __nlink_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __nlink_t { return new __nlink_t($this->data[$n]); }
    public static function getType(): string { return '__nlink_t*'; }
}
class __nlink_t_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__nlink_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __nlink_t_ptr_ptr_ptr { return new __nlink_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __nlink_t_ptr { return new __nlink_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__nlink_t**'; }
}
class __nlink_t_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__nlink_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __nlink_t_ptr_ptr_ptr_ptr { return new __nlink_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __nlink_t_ptr_ptr { return new __nlink_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__nlink_t***'; }
}
class __nlink_t_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__nlink_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __nlink_t_ptr_ptr_ptr_ptr_ptr { return new __nlink_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __nlink_t_ptr_ptr_ptr { return new __nlink_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__nlink_t****'; }
}
class __off_t implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__off_t $other): bool { return $this->data == $other->data; }
    public function addr(): __off_t_ptr { return new __off_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__off_t'; }
}
class __off_t_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__off_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __off_t_ptr_ptr { return new __off_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __off_t { return new __off_t($this->data[$n]); }
    public static function getType(): string { return '__off_t*'; }
}
class __off_t_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__off_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __off_t_ptr_ptr_ptr { return new __off_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __off_t_ptr { return new __off_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__off_t**'; }
}
class __off_t_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__off_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __off_t_ptr_ptr_ptr_ptr { return new __off_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __off_t_ptr_ptr { return new __off_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__off_t***'; }
}
class __off_t_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__off_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __off_t_ptr_ptr_ptr_ptr_ptr { return new __off_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __off_t_ptr_ptr_ptr { return new __off_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__off_t****'; }
}
class __off64_t implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__off64_t $other): bool { return $this->data == $other->data; }
    public function addr(): __off64_t_ptr { return new __off64_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__off64_t'; }
}
class __off64_t_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__off64_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __off64_t_ptr_ptr { return new __off64_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __off64_t { return new __off64_t($this->data[$n]); }
    public static function getType(): string { return '__off64_t*'; }
}
class __off64_t_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__off64_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __off64_t_ptr_ptr_ptr { return new __off64_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __off64_t_ptr { return new __off64_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__off64_t**'; }
}
class __off64_t_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__off64_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __off64_t_ptr_ptr_ptr_ptr { return new __off64_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __off64_t_ptr_ptr { return new __off64_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__off64_t***'; }
}
class __off64_t_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__off64_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __off64_t_ptr_ptr_ptr_ptr_ptr { return new __off64_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __off64_t_ptr_ptr_ptr { return new __off64_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__off64_t****'; }
}
class __pid_t implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__pid_t $other): bool { return $this->data == $other->data; }
    public function addr(): __pid_t_ptr { return new __pid_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__pid_t'; }
}
class __pid_t_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__pid_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __pid_t_ptr_ptr { return new __pid_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __pid_t { return new __pid_t($this->data[$n]); }
    public static function getType(): string { return '__pid_t*'; }
}
class __pid_t_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__pid_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __pid_t_ptr_ptr_ptr { return new __pid_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __pid_t_ptr { return new __pid_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__pid_t**'; }
}
class __pid_t_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__pid_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __pid_t_ptr_ptr_ptr_ptr { return new __pid_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __pid_t_ptr_ptr { return new __pid_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__pid_t***'; }
}
class __pid_t_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__pid_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __pid_t_ptr_ptr_ptr_ptr_ptr { return new __pid_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __pid_t_ptr_ptr_ptr { return new __pid_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__pid_t****'; }
}
class __fsid_t implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__fsid_t $other): bool { return $this->data == $other->data; }
    public function addr(): __fsid_t_ptr { return new __fsid_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__fsid_t'; }
}
class __fsid_t_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__fsid_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __fsid_t_ptr_ptr { return new __fsid_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __fsid_t { return new __fsid_t($this->data[$n]); }
    public static function getType(): string { return '__fsid_t*'; }
}
class __fsid_t_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__fsid_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __fsid_t_ptr_ptr_ptr { return new __fsid_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __fsid_t_ptr { return new __fsid_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__fsid_t**'; }
}
class __fsid_t_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__fsid_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __fsid_t_ptr_ptr_ptr_ptr { return new __fsid_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __fsid_t_ptr_ptr { return new __fsid_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__fsid_t***'; }
}
class __fsid_t_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__fsid_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __fsid_t_ptr_ptr_ptr_ptr_ptr { return new __fsid_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __fsid_t_ptr_ptr_ptr { return new __fsid_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__fsid_t****'; }
}
class __clock_t implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__clock_t $other): bool { return $this->data == $other->data; }
    public function addr(): __clock_t_ptr { return new __clock_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__clock_t'; }
}
class __clock_t_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__clock_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __clock_t_ptr_ptr { return new __clock_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __clock_t { return new __clock_t($this->data[$n]); }
    public static function getType(): string { return '__clock_t*'; }
}
class __clock_t_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__clock_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __clock_t_ptr_ptr_ptr { return new __clock_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __clock_t_ptr { return new __clock_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__clock_t**'; }
}
class __clock_t_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__clock_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __clock_t_ptr_ptr_ptr_ptr { return new __clock_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __clock_t_ptr_ptr { return new __clock_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__clock_t***'; }
}
class __clock_t_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__clock_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __clock_t_ptr_ptr_ptr_ptr_ptr { return new __clock_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __clock_t_ptr_ptr_ptr { return new __clock_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__clock_t****'; }
}
class __rlim_t implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__rlim_t $other): bool { return $this->data == $other->data; }
    public function addr(): __rlim_t_ptr { return new __rlim_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__rlim_t'; }
}
class __rlim_t_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__rlim_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __rlim_t_ptr_ptr { return new __rlim_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __rlim_t { return new __rlim_t($this->data[$n]); }
    public static function getType(): string { return '__rlim_t*'; }
}
class __rlim_t_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__rlim_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __rlim_t_ptr_ptr_ptr { return new __rlim_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __rlim_t_ptr { return new __rlim_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__rlim_t**'; }
}
class __rlim_t_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__rlim_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __rlim_t_ptr_ptr_ptr_ptr { return new __rlim_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __rlim_t_ptr_ptr { return new __rlim_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__rlim_t***'; }
}
class __rlim_t_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__rlim_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __rlim_t_ptr_ptr_ptr_ptr_ptr { return new __rlim_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __rlim_t_ptr_ptr_ptr { return new __rlim_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__rlim_t****'; }
}
class __rlim64_t implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__rlim64_t $other): bool { return $this->data == $other->data; }
    public function addr(): __rlim64_t_ptr { return new __rlim64_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__rlim64_t'; }
}
class __rlim64_t_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__rlim64_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __rlim64_t_ptr_ptr { return new __rlim64_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __rlim64_t { return new __rlim64_t($this->data[$n]); }
    public static function getType(): string { return '__rlim64_t*'; }
}
class __rlim64_t_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__rlim64_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __rlim64_t_ptr_ptr_ptr { return new __rlim64_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __rlim64_t_ptr { return new __rlim64_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__rlim64_t**'; }
}
class __rlim64_t_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__rlim64_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __rlim64_t_ptr_ptr_ptr_ptr { return new __rlim64_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __rlim64_t_ptr_ptr { return new __rlim64_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__rlim64_t***'; }
}
class __rlim64_t_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__rlim64_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __rlim64_t_ptr_ptr_ptr_ptr_ptr { return new __rlim64_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __rlim64_t_ptr_ptr_ptr { return new __rlim64_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__rlim64_t****'; }
}
class __id_t implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__id_t $other): bool { return $this->data == $other->data; }
    public function addr(): __id_t_ptr { return new __id_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__id_t'; }
}
class __id_t_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__id_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __id_t_ptr_ptr { return new __id_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __id_t { return new __id_t($this->data[$n]); }
    public static function getType(): string { return '__id_t*'; }
}
class __id_t_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__id_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __id_t_ptr_ptr_ptr { return new __id_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __id_t_ptr { return new __id_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__id_t**'; }
}
class __id_t_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__id_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __id_t_ptr_ptr_ptr_ptr { return new __id_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __id_t_ptr_ptr { return new __id_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__id_t***'; }
}
class __id_t_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__id_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __id_t_ptr_ptr_ptr_ptr_ptr { return new __id_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __id_t_ptr_ptr_ptr { return new __id_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__id_t****'; }
}
class __time_t implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__time_t $other): bool { return $this->data == $other->data; }
    public function addr(): __time_t_ptr { return new __time_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__time_t'; }
}
class __time_t_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__time_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __time_t_ptr_ptr { return new __time_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __time_t { return new __time_t($this->data[$n]); }
    public static function getType(): string { return '__time_t*'; }
}
class __time_t_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__time_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __time_t_ptr_ptr_ptr { return new __time_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __time_t_ptr { return new __time_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__time_t**'; }
}
class __time_t_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__time_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __time_t_ptr_ptr_ptr_ptr { return new __time_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __time_t_ptr_ptr { return new __time_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__time_t***'; }
}
class __time_t_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__time_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __time_t_ptr_ptr_ptr_ptr_ptr { return new __time_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __time_t_ptr_ptr_ptr { return new __time_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__time_t****'; }
}
class __useconds_t implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__useconds_t $other): bool { return $this->data == $other->data; }
    public function addr(): __useconds_t_ptr { return new __useconds_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__useconds_t'; }
}
class __useconds_t_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__useconds_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __useconds_t_ptr_ptr { return new __useconds_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __useconds_t { return new __useconds_t($this->data[$n]); }
    public static function getType(): string { return '__useconds_t*'; }
}
class __useconds_t_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__useconds_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __useconds_t_ptr_ptr_ptr { return new __useconds_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __useconds_t_ptr { return new __useconds_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__useconds_t**'; }
}
class __useconds_t_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__useconds_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __useconds_t_ptr_ptr_ptr_ptr { return new __useconds_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __useconds_t_ptr_ptr { return new __useconds_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__useconds_t***'; }
}
class __useconds_t_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__useconds_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __useconds_t_ptr_ptr_ptr_ptr_ptr { return new __useconds_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __useconds_t_ptr_ptr_ptr { return new __useconds_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__useconds_t****'; }
}
class __suseconds_t implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__suseconds_t $other): bool { return $this->data == $other->data; }
    public function addr(): __suseconds_t_ptr { return new __suseconds_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__suseconds_t'; }
}
class __suseconds_t_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__suseconds_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __suseconds_t_ptr_ptr { return new __suseconds_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __suseconds_t { return new __suseconds_t($this->data[$n]); }
    public static function getType(): string { return '__suseconds_t*'; }
}
class __suseconds_t_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__suseconds_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __suseconds_t_ptr_ptr_ptr { return new __suseconds_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __suseconds_t_ptr { return new __suseconds_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__suseconds_t**'; }
}
class __suseconds_t_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__suseconds_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __suseconds_t_ptr_ptr_ptr_ptr { return new __suseconds_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __suseconds_t_ptr_ptr { return new __suseconds_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__suseconds_t***'; }
}
class __suseconds_t_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__suseconds_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __suseconds_t_ptr_ptr_ptr_ptr_ptr { return new __suseconds_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __suseconds_t_ptr_ptr_ptr { return new __suseconds_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__suseconds_t****'; }
}
class __daddr_t implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__daddr_t $other): bool { return $this->data == $other->data; }
    public function addr(): __daddr_t_ptr { return new __daddr_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__daddr_t'; }
}
class __daddr_t_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__daddr_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __daddr_t_ptr_ptr { return new __daddr_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __daddr_t { return new __daddr_t($this->data[$n]); }
    public static function getType(): string { return '__daddr_t*'; }
}
class __daddr_t_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__daddr_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __daddr_t_ptr_ptr_ptr { return new __daddr_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __daddr_t_ptr { return new __daddr_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__daddr_t**'; }
}
class __daddr_t_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__daddr_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __daddr_t_ptr_ptr_ptr_ptr { return new __daddr_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __daddr_t_ptr_ptr { return new __daddr_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__daddr_t***'; }
}
class __daddr_t_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__daddr_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __daddr_t_ptr_ptr_ptr_ptr_ptr { return new __daddr_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __daddr_t_ptr_ptr_ptr { return new __daddr_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__daddr_t****'; }
}
class __key_t implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__key_t $other): bool { return $this->data == $other->data; }
    public function addr(): __key_t_ptr { return new __key_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__key_t'; }
}
class __key_t_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__key_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __key_t_ptr_ptr { return new __key_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __key_t { return new __key_t($this->data[$n]); }
    public static function getType(): string { return '__key_t*'; }
}
class __key_t_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__key_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __key_t_ptr_ptr_ptr { return new __key_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __key_t_ptr { return new __key_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__key_t**'; }
}
class __key_t_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__key_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __key_t_ptr_ptr_ptr_ptr { return new __key_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __key_t_ptr_ptr { return new __key_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__key_t***'; }
}
class __key_t_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__key_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __key_t_ptr_ptr_ptr_ptr_ptr { return new __key_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __key_t_ptr_ptr_ptr { return new __key_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__key_t****'; }
}
class __clockid_t implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__clockid_t $other): bool { return $this->data == $other->data; }
    public function addr(): __clockid_t_ptr { return new __clockid_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__clockid_t'; }
}
class __clockid_t_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__clockid_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __clockid_t_ptr_ptr { return new __clockid_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __clockid_t { return new __clockid_t($this->data[$n]); }
    public static function getType(): string { return '__clockid_t*'; }
}
class __clockid_t_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__clockid_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __clockid_t_ptr_ptr_ptr { return new __clockid_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __clockid_t_ptr { return new __clockid_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__clockid_t**'; }
}
class __clockid_t_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__clockid_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __clockid_t_ptr_ptr_ptr_ptr { return new __clockid_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __clockid_t_ptr_ptr { return new __clockid_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__clockid_t***'; }
}
class __clockid_t_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__clockid_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __clockid_t_ptr_ptr_ptr_ptr_ptr { return new __clockid_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __clockid_t_ptr_ptr_ptr { return new __clockid_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__clockid_t****'; }
}
class __timer_t implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__timer_t $other): bool { return $this->data == $other->data; }
    public function addr(): __timer_t_ptr { return new __timer_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__timer_t'; }
}
class __timer_t_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__timer_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __timer_t_ptr_ptr { return new __timer_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __timer_t { return new __timer_t($this->data[$n]); }
    public static function getType(): string { return '__timer_t*'; }
}
class __timer_t_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__timer_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __timer_t_ptr_ptr_ptr { return new __timer_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __timer_t_ptr { return new __timer_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__timer_t**'; }
}
class __timer_t_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__timer_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __timer_t_ptr_ptr_ptr_ptr { return new __timer_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __timer_t_ptr_ptr { return new __timer_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__timer_t***'; }
}
class __timer_t_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__timer_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __timer_t_ptr_ptr_ptr_ptr_ptr { return new __timer_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __timer_t_ptr_ptr_ptr { return new __timer_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__timer_t****'; }
}
class __blksize_t implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__blksize_t $other): bool { return $this->data == $other->data; }
    public function addr(): __blksize_t_ptr { return new __blksize_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__blksize_t'; }
}
class __blksize_t_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__blksize_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __blksize_t_ptr_ptr { return new __blksize_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __blksize_t { return new __blksize_t($this->data[$n]); }
    public static function getType(): string { return '__blksize_t*'; }
}
class __blksize_t_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__blksize_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __blksize_t_ptr_ptr_ptr { return new __blksize_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __blksize_t_ptr { return new __blksize_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__blksize_t**'; }
}
class __blksize_t_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__blksize_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __blksize_t_ptr_ptr_ptr_ptr { return new __blksize_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __blksize_t_ptr_ptr { return new __blksize_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__blksize_t***'; }
}
class __blksize_t_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__blksize_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __blksize_t_ptr_ptr_ptr_ptr_ptr { return new __blksize_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __blksize_t_ptr_ptr_ptr { return new __blksize_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__blksize_t****'; }
}
class __blkcnt_t implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__blkcnt_t $other): bool { return $this->data == $other->data; }
    public function addr(): __blkcnt_t_ptr { return new __blkcnt_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__blkcnt_t'; }
}
class __blkcnt_t_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__blkcnt_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __blkcnt_t_ptr_ptr { return new __blkcnt_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __blkcnt_t { return new __blkcnt_t($this->data[$n]); }
    public static function getType(): string { return '__blkcnt_t*'; }
}
class __blkcnt_t_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__blkcnt_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __blkcnt_t_ptr_ptr_ptr { return new __blkcnt_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __blkcnt_t_ptr { return new __blkcnt_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__blkcnt_t**'; }
}
class __blkcnt_t_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__blkcnt_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __blkcnt_t_ptr_ptr_ptr_ptr { return new __blkcnt_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __blkcnt_t_ptr_ptr { return new __blkcnt_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__blkcnt_t***'; }
}
class __blkcnt_t_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__blkcnt_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __blkcnt_t_ptr_ptr_ptr_ptr_ptr { return new __blkcnt_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __blkcnt_t_ptr_ptr_ptr { return new __blkcnt_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__blkcnt_t****'; }
}
class __blkcnt64_t implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__blkcnt64_t $other): bool { return $this->data == $other->data; }
    public function addr(): __blkcnt64_t_ptr { return new __blkcnt64_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__blkcnt64_t'; }
}
class __blkcnt64_t_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__blkcnt64_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __blkcnt64_t_ptr_ptr { return new __blkcnt64_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __blkcnt64_t { return new __blkcnt64_t($this->data[$n]); }
    public static function getType(): string { return '__blkcnt64_t*'; }
}
class __blkcnt64_t_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__blkcnt64_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __blkcnt64_t_ptr_ptr_ptr { return new __blkcnt64_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __blkcnt64_t_ptr { return new __blkcnt64_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__blkcnt64_t**'; }
}
class __blkcnt64_t_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__blkcnt64_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __blkcnt64_t_ptr_ptr_ptr_ptr { return new __blkcnt64_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __blkcnt64_t_ptr_ptr { return new __blkcnt64_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__blkcnt64_t***'; }
}
class __blkcnt64_t_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__blkcnt64_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __blkcnt64_t_ptr_ptr_ptr_ptr_ptr { return new __blkcnt64_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __blkcnt64_t_ptr_ptr_ptr { return new __blkcnt64_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__blkcnt64_t****'; }
}
class __fsblkcnt_t implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__fsblkcnt_t $other): bool { return $this->data == $other->data; }
    public function addr(): __fsblkcnt_t_ptr { return new __fsblkcnt_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__fsblkcnt_t'; }
}
class __fsblkcnt_t_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__fsblkcnt_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __fsblkcnt_t_ptr_ptr { return new __fsblkcnt_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __fsblkcnt_t { return new __fsblkcnt_t($this->data[$n]); }
    public static function getType(): string { return '__fsblkcnt_t*'; }
}
class __fsblkcnt_t_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__fsblkcnt_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __fsblkcnt_t_ptr_ptr_ptr { return new __fsblkcnt_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __fsblkcnt_t_ptr { return new __fsblkcnt_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__fsblkcnt_t**'; }
}
class __fsblkcnt_t_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__fsblkcnt_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __fsblkcnt_t_ptr_ptr_ptr_ptr { return new __fsblkcnt_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __fsblkcnt_t_ptr_ptr { return new __fsblkcnt_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__fsblkcnt_t***'; }
}
class __fsblkcnt_t_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__fsblkcnt_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __fsblkcnt_t_ptr_ptr_ptr_ptr_ptr { return new __fsblkcnt_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __fsblkcnt_t_ptr_ptr_ptr { return new __fsblkcnt_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__fsblkcnt_t****'; }
}
class __fsblkcnt64_t implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__fsblkcnt64_t $other): bool { return $this->data == $other->data; }
    public function addr(): __fsblkcnt64_t_ptr { return new __fsblkcnt64_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__fsblkcnt64_t'; }
}
class __fsblkcnt64_t_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__fsblkcnt64_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __fsblkcnt64_t_ptr_ptr { return new __fsblkcnt64_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __fsblkcnt64_t { return new __fsblkcnt64_t($this->data[$n]); }
    public static function getType(): string { return '__fsblkcnt64_t*'; }
}
class __fsblkcnt64_t_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__fsblkcnt64_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __fsblkcnt64_t_ptr_ptr_ptr { return new __fsblkcnt64_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __fsblkcnt64_t_ptr { return new __fsblkcnt64_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__fsblkcnt64_t**'; }
}
class __fsblkcnt64_t_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__fsblkcnt64_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __fsblkcnt64_t_ptr_ptr_ptr_ptr { return new __fsblkcnt64_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __fsblkcnt64_t_ptr_ptr { return new __fsblkcnt64_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__fsblkcnt64_t***'; }
}
class __fsblkcnt64_t_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__fsblkcnt64_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __fsblkcnt64_t_ptr_ptr_ptr_ptr_ptr { return new __fsblkcnt64_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __fsblkcnt64_t_ptr_ptr_ptr { return new __fsblkcnt64_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__fsblkcnt64_t****'; }
}
class __fsfilcnt_t implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__fsfilcnt_t $other): bool { return $this->data == $other->data; }
    public function addr(): __fsfilcnt_t_ptr { return new __fsfilcnt_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__fsfilcnt_t'; }
}
class __fsfilcnt_t_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__fsfilcnt_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __fsfilcnt_t_ptr_ptr { return new __fsfilcnt_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __fsfilcnt_t { return new __fsfilcnt_t($this->data[$n]); }
    public static function getType(): string { return '__fsfilcnt_t*'; }
}
class __fsfilcnt_t_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__fsfilcnt_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __fsfilcnt_t_ptr_ptr_ptr { return new __fsfilcnt_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __fsfilcnt_t_ptr { return new __fsfilcnt_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__fsfilcnt_t**'; }
}
class __fsfilcnt_t_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__fsfilcnt_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __fsfilcnt_t_ptr_ptr_ptr_ptr { return new __fsfilcnt_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __fsfilcnt_t_ptr_ptr { return new __fsfilcnt_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__fsfilcnt_t***'; }
}
class __fsfilcnt_t_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__fsfilcnt_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __fsfilcnt_t_ptr_ptr_ptr_ptr_ptr { return new __fsfilcnt_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __fsfilcnt_t_ptr_ptr_ptr { return new __fsfilcnt_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__fsfilcnt_t****'; }
}
class __fsfilcnt64_t implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__fsfilcnt64_t $other): bool { return $this->data == $other->data; }
    public function addr(): __fsfilcnt64_t_ptr { return new __fsfilcnt64_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__fsfilcnt64_t'; }
}
class __fsfilcnt64_t_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__fsfilcnt64_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __fsfilcnt64_t_ptr_ptr { return new __fsfilcnt64_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __fsfilcnt64_t { return new __fsfilcnt64_t($this->data[$n]); }
    public static function getType(): string { return '__fsfilcnt64_t*'; }
}
class __fsfilcnt64_t_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__fsfilcnt64_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __fsfilcnt64_t_ptr_ptr_ptr { return new __fsfilcnt64_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __fsfilcnt64_t_ptr { return new __fsfilcnt64_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__fsfilcnt64_t**'; }
}
class __fsfilcnt64_t_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__fsfilcnt64_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __fsfilcnt64_t_ptr_ptr_ptr_ptr { return new __fsfilcnt64_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __fsfilcnt64_t_ptr_ptr { return new __fsfilcnt64_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__fsfilcnt64_t***'; }
}
class __fsfilcnt64_t_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__fsfilcnt64_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __fsfilcnt64_t_ptr_ptr_ptr_ptr_ptr { return new __fsfilcnt64_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __fsfilcnt64_t_ptr_ptr_ptr { return new __fsfilcnt64_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__fsfilcnt64_t****'; }
}
class __fsword_t implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__fsword_t $other): bool { return $this->data == $other->data; }
    public function addr(): __fsword_t_ptr { return new __fsword_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__fsword_t'; }
}
class __fsword_t_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__fsword_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __fsword_t_ptr_ptr { return new __fsword_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __fsword_t { return new __fsword_t($this->data[$n]); }
    public static function getType(): string { return '__fsword_t*'; }
}
class __fsword_t_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__fsword_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __fsword_t_ptr_ptr_ptr { return new __fsword_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __fsword_t_ptr { return new __fsword_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__fsword_t**'; }
}
class __fsword_t_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__fsword_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __fsword_t_ptr_ptr_ptr_ptr { return new __fsword_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __fsword_t_ptr_ptr { return new __fsword_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__fsword_t***'; }
}
class __fsword_t_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__fsword_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __fsword_t_ptr_ptr_ptr_ptr_ptr { return new __fsword_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __fsword_t_ptr_ptr_ptr { return new __fsword_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__fsword_t****'; }
}
class __ssize_t implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__ssize_t $other): bool { return $this->data == $other->data; }
    public function addr(): __ssize_t_ptr { return new __ssize_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__ssize_t'; }
}
class __ssize_t_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__ssize_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __ssize_t_ptr_ptr { return new __ssize_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __ssize_t { return new __ssize_t($this->data[$n]); }
    public static function getType(): string { return '__ssize_t*'; }
}
class __ssize_t_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__ssize_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __ssize_t_ptr_ptr_ptr { return new __ssize_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __ssize_t_ptr { return new __ssize_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__ssize_t**'; }
}
class __ssize_t_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__ssize_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __ssize_t_ptr_ptr_ptr_ptr { return new __ssize_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __ssize_t_ptr_ptr { return new __ssize_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__ssize_t***'; }
}
class __ssize_t_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__ssize_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __ssize_t_ptr_ptr_ptr_ptr_ptr { return new __ssize_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __ssize_t_ptr_ptr_ptr { return new __ssize_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__ssize_t****'; }
}
class __syscall_slong_t implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__syscall_slong_t $other): bool { return $this->data == $other->data; }
    public function addr(): __syscall_slong_t_ptr { return new __syscall_slong_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__syscall_slong_t'; }
}
class __syscall_slong_t_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__syscall_slong_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __syscall_slong_t_ptr_ptr { return new __syscall_slong_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __syscall_slong_t { return new __syscall_slong_t($this->data[$n]); }
    public static function getType(): string { return '__syscall_slong_t*'; }
}
class __syscall_slong_t_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__syscall_slong_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __syscall_slong_t_ptr_ptr_ptr { return new __syscall_slong_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __syscall_slong_t_ptr { return new __syscall_slong_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__syscall_slong_t**'; }
}
class __syscall_slong_t_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__syscall_slong_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __syscall_slong_t_ptr_ptr_ptr_ptr { return new __syscall_slong_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __syscall_slong_t_ptr_ptr { return new __syscall_slong_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__syscall_slong_t***'; }
}
class __syscall_slong_t_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__syscall_slong_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __syscall_slong_t_ptr_ptr_ptr_ptr_ptr { return new __syscall_slong_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __syscall_slong_t_ptr_ptr_ptr { return new __syscall_slong_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__syscall_slong_t****'; }
}
class __syscall_ulong_t implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__syscall_ulong_t $other): bool { return $this->data == $other->data; }
    public function addr(): __syscall_ulong_t_ptr { return new __syscall_ulong_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__syscall_ulong_t'; }
}
class __syscall_ulong_t_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__syscall_ulong_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __syscall_ulong_t_ptr_ptr { return new __syscall_ulong_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __syscall_ulong_t { return new __syscall_ulong_t($this->data[$n]); }
    public static function getType(): string { return '__syscall_ulong_t*'; }
}
class __syscall_ulong_t_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__syscall_ulong_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __syscall_ulong_t_ptr_ptr_ptr { return new __syscall_ulong_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __syscall_ulong_t_ptr { return new __syscall_ulong_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__syscall_ulong_t**'; }
}
class __syscall_ulong_t_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__syscall_ulong_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __syscall_ulong_t_ptr_ptr_ptr_ptr { return new __syscall_ulong_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __syscall_ulong_t_ptr_ptr { return new __syscall_ulong_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__syscall_ulong_t***'; }
}
class __syscall_ulong_t_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__syscall_ulong_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __syscall_ulong_t_ptr_ptr_ptr_ptr_ptr { return new __syscall_ulong_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __syscall_ulong_t_ptr_ptr_ptr { return new __syscall_ulong_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__syscall_ulong_t****'; }
}
class __loff_t implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__loff_t $other): bool { return $this->data == $other->data; }
    public function addr(): __loff_t_ptr { return new __loff_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__loff_t'; }
}
class __loff_t_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__loff_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __loff_t_ptr_ptr { return new __loff_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __loff_t { return new __loff_t($this->data[$n]); }
    public static function getType(): string { return '__loff_t*'; }
}
class __loff_t_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__loff_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __loff_t_ptr_ptr_ptr { return new __loff_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __loff_t_ptr { return new __loff_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__loff_t**'; }
}
class __loff_t_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__loff_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __loff_t_ptr_ptr_ptr_ptr { return new __loff_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __loff_t_ptr_ptr { return new __loff_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__loff_t***'; }
}
class __loff_t_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__loff_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __loff_t_ptr_ptr_ptr_ptr_ptr { return new __loff_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __loff_t_ptr_ptr_ptr { return new __loff_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__loff_t****'; }
}
class __qaddr_t implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__qaddr_t $other): bool { return $this->data == $other->data; }
    public function addr(): __qaddr_t_ptr { return new __qaddr_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__qaddr_t'; }
}
class __qaddr_t_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__qaddr_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __qaddr_t_ptr_ptr { return new __qaddr_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __qaddr_t { return new __qaddr_t($this->data[$n]); }
    public static function getType(): string { return '__qaddr_t*'; }
}
class __qaddr_t_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__qaddr_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __qaddr_t_ptr_ptr_ptr { return new __qaddr_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __qaddr_t_ptr { return new __qaddr_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__qaddr_t**'; }
}
class __qaddr_t_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__qaddr_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __qaddr_t_ptr_ptr_ptr_ptr { return new __qaddr_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __qaddr_t_ptr_ptr { return new __qaddr_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__qaddr_t***'; }
}
class __qaddr_t_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__qaddr_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __qaddr_t_ptr_ptr_ptr_ptr_ptr { return new __qaddr_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __qaddr_t_ptr_ptr_ptr { return new __qaddr_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__qaddr_t****'; }
}
class __caddr_t implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__caddr_t $other): bool { return $this->data == $other->data; }
    public function addr(): __caddr_t_ptr { return new __caddr_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__caddr_t'; }
}
class __caddr_t_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__caddr_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __caddr_t_ptr_ptr { return new __caddr_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __caddr_t { return new __caddr_t($this->data[$n]); }
    public static function getType(): string { return '__caddr_t*'; }
}
class __caddr_t_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__caddr_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __caddr_t_ptr_ptr_ptr { return new __caddr_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __caddr_t_ptr { return new __caddr_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__caddr_t**'; }
}
class __caddr_t_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__caddr_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __caddr_t_ptr_ptr_ptr_ptr { return new __caddr_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __caddr_t_ptr_ptr { return new __caddr_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__caddr_t***'; }
}
class __caddr_t_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__caddr_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __caddr_t_ptr_ptr_ptr_ptr_ptr { return new __caddr_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __caddr_t_ptr_ptr_ptr { return new __caddr_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__caddr_t****'; }
}
class __intptr_t implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__intptr_t $other): bool { return $this->data == $other->data; }
    public function addr(): __intptr_t_ptr { return new __intptr_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__intptr_t'; }
}
class __intptr_t_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__intptr_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __intptr_t_ptr_ptr { return new __intptr_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __intptr_t { return new __intptr_t($this->data[$n]); }
    public static function getType(): string { return '__intptr_t*'; }
}
class __intptr_t_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__intptr_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __intptr_t_ptr_ptr_ptr { return new __intptr_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __intptr_t_ptr { return new __intptr_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__intptr_t**'; }
}
class __intptr_t_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__intptr_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __intptr_t_ptr_ptr_ptr_ptr { return new __intptr_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __intptr_t_ptr_ptr { return new __intptr_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__intptr_t***'; }
}
class __intptr_t_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__intptr_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __intptr_t_ptr_ptr_ptr_ptr_ptr { return new __intptr_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __intptr_t_ptr_ptr_ptr { return new __intptr_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__intptr_t****'; }
}
class __socklen_t implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__socklen_t $other): bool { return $this->data == $other->data; }
    public function addr(): __socklen_t_ptr { return new __socklen_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__socklen_t'; }
}
class __socklen_t_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__socklen_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __socklen_t_ptr_ptr { return new __socklen_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __socklen_t { return new __socklen_t($this->data[$n]); }
    public static function getType(): string { return '__socklen_t*'; }
}
class __socklen_t_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__socklen_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __socklen_t_ptr_ptr_ptr { return new __socklen_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __socklen_t_ptr { return new __socklen_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__socklen_t**'; }
}
class __socklen_t_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__socklen_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __socklen_t_ptr_ptr_ptr_ptr { return new __socklen_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __socklen_t_ptr_ptr { return new __socklen_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__socklen_t***'; }
}
class __socklen_t_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__socklen_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __socklen_t_ptr_ptr_ptr_ptr_ptr { return new __socklen_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __socklen_t_ptr_ptr_ptr { return new __socklen_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__socklen_t****'; }
}
class FILE implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(FILE $other): bool { return $this->data == $other->data; }
    public function addr(): FILE_ptr { return new FILE_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'FILE'; }
}
class FILE_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(FILE_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): FILE_ptr_ptr { return new FILE_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): FILE { return new FILE($this->data[$n]); }
    public static function getType(): string { return 'FILE*'; }
}
class FILE_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(FILE_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): FILE_ptr_ptr_ptr { return new FILE_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): FILE_ptr { return new FILE_ptr($this->data[$n]); }
    public static function getType(): string { return 'FILE**'; }
}
class FILE_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(FILE_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): FILE_ptr_ptr_ptr_ptr { return new FILE_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): FILE_ptr_ptr { return new FILE_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'FILE***'; }
}
class FILE_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(FILE_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): FILE_ptr_ptr_ptr_ptr_ptr { return new FILE_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): FILE_ptr_ptr_ptr { return new FILE_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'FILE****'; }
}
class __FILE implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__FILE $other): bool { return $this->data == $other->data; }
    public function addr(): __FILE_ptr { return new __FILE_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__FILE'; }
}
class __FILE_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__FILE_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __FILE_ptr_ptr { return new __FILE_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __FILE { return new __FILE($this->data[$n]); }
    public static function getType(): string { return '__FILE*'; }
}
class __FILE_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__FILE_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __FILE_ptr_ptr_ptr { return new __FILE_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __FILE_ptr { return new __FILE_ptr($this->data[$n]); }
    public static function getType(): string { return '__FILE**'; }
}
class __FILE_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__FILE_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __FILE_ptr_ptr_ptr_ptr { return new __FILE_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __FILE_ptr_ptr { return new __FILE_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__FILE***'; }
}
class __FILE_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__FILE_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __FILE_ptr_ptr_ptr_ptr_ptr { return new __FILE_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __FILE_ptr_ptr_ptr { return new __FILE_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__FILE****'; }
}
class wint_t implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(wint_t $other): bool { return $this->data == $other->data; }
    public function addr(): wint_t_ptr { return new wint_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'wint_t'; }
}
class wint_t_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(wint_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): wint_t_ptr_ptr { return new wint_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): wint_t { return new wint_t($this->data[$n]); }
    public static function getType(): string { return 'wint_t*'; }
}
class wint_t_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(wint_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): wint_t_ptr_ptr_ptr { return new wint_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): wint_t_ptr { return new wint_t_ptr($this->data[$n]); }
    public static function getType(): string { return 'wint_t**'; }
}
class wint_t_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(wint_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): wint_t_ptr_ptr_ptr_ptr { return new wint_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): wint_t_ptr_ptr { return new wint_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'wint_t***'; }
}
class wint_t_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(wint_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): wint_t_ptr_ptr_ptr_ptr_ptr { return new wint_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): wint_t_ptr_ptr_ptr { return new wint_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'wint_t****'; }
}
class __mbstate_t implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__mbstate_t $other): bool { return $this->data == $other->data; }
    public function addr(): __mbstate_t_ptr { return new __mbstate_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__mbstate_t'; }
}
class __mbstate_t_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__mbstate_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __mbstate_t_ptr_ptr { return new __mbstate_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __mbstate_t { return new __mbstate_t($this->data[$n]); }
    public static function getType(): string { return '__mbstate_t*'; }
}
class __mbstate_t_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__mbstate_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __mbstate_t_ptr_ptr_ptr { return new __mbstate_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __mbstate_t_ptr { return new __mbstate_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__mbstate_t**'; }
}
class __mbstate_t_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__mbstate_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __mbstate_t_ptr_ptr_ptr_ptr { return new __mbstate_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __mbstate_t_ptr_ptr { return new __mbstate_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__mbstate_t***'; }
}
class __mbstate_t_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__mbstate_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __mbstate_t_ptr_ptr_ptr_ptr_ptr { return new __mbstate_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __mbstate_t_ptr_ptr_ptr { return new __mbstate_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__mbstate_t****'; }
}
class _G_fpos_t implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(_G_fpos_t $other): bool { return $this->data == $other->data; }
    public function addr(): _G_fpos_t_ptr { return new _G_fpos_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '_G_fpos_t'; }
}
class _G_fpos_t_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(_G_fpos_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): _G_fpos_t_ptr_ptr { return new _G_fpos_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): _G_fpos_t { return new _G_fpos_t($this->data[$n]); }
    public static function getType(): string { return '_G_fpos_t*'; }
}
class _G_fpos_t_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(_G_fpos_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): _G_fpos_t_ptr_ptr_ptr { return new _G_fpos_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): _G_fpos_t_ptr { return new _G_fpos_t_ptr($this->data[$n]); }
    public static function getType(): string { return '_G_fpos_t**'; }
}
class _G_fpos_t_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(_G_fpos_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): _G_fpos_t_ptr_ptr_ptr_ptr { return new _G_fpos_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): _G_fpos_t_ptr_ptr { return new _G_fpos_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '_G_fpos_t***'; }
}
class _G_fpos_t_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(_G_fpos_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): _G_fpos_t_ptr_ptr_ptr_ptr_ptr { return new _G_fpos_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): _G_fpos_t_ptr_ptr_ptr { return new _G_fpos_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '_G_fpos_t****'; }
}
class _G_fpos64_t implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(_G_fpos64_t $other): bool { return $this->data == $other->data; }
    public function addr(): _G_fpos64_t_ptr { return new _G_fpos64_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '_G_fpos64_t'; }
}
class _G_fpos64_t_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(_G_fpos64_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): _G_fpos64_t_ptr_ptr { return new _G_fpos64_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): _G_fpos64_t { return new _G_fpos64_t($this->data[$n]); }
    public static function getType(): string { return '_G_fpos64_t*'; }
}
class _G_fpos64_t_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(_G_fpos64_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): _G_fpos64_t_ptr_ptr_ptr { return new _G_fpos64_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): _G_fpos64_t_ptr { return new _G_fpos64_t_ptr($this->data[$n]); }
    public static function getType(): string { return '_G_fpos64_t**'; }
}
class _G_fpos64_t_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(_G_fpos64_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): _G_fpos64_t_ptr_ptr_ptr_ptr { return new _G_fpos64_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): _G_fpos64_t_ptr_ptr { return new _G_fpos64_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '_G_fpos64_t***'; }
}
class _G_fpos64_t_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(_G_fpos64_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): _G_fpos64_t_ptr_ptr_ptr_ptr_ptr { return new _G_fpos64_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): _G_fpos64_t_ptr_ptr_ptr { return new _G_fpos64_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '_G_fpos64_t****'; }
}
class _IO_lock_t implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(_IO_lock_t $other): bool { return $this->data == $other->data; }
    public function addr(): _IO_lock_t_ptr { return new _IO_lock_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '_IO_lock_t'; }
}
class _IO_lock_t_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(_IO_lock_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): _IO_lock_t_ptr_ptr { return new _IO_lock_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): _IO_lock_t { return new _IO_lock_t($this->data[$n]); }
    public static function getType(): string { return '_IO_lock_t*'; }
}
class _IO_lock_t_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(_IO_lock_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): _IO_lock_t_ptr_ptr_ptr { return new _IO_lock_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): _IO_lock_t_ptr { return new _IO_lock_t_ptr($this->data[$n]); }
    public static function getType(): string { return '_IO_lock_t**'; }
}
class _IO_lock_t_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(_IO_lock_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): _IO_lock_t_ptr_ptr_ptr_ptr { return new _IO_lock_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): _IO_lock_t_ptr_ptr { return new _IO_lock_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '_IO_lock_t***'; }
}
class _IO_lock_t_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(_IO_lock_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): _IO_lock_t_ptr_ptr_ptr_ptr_ptr { return new _IO_lock_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): _IO_lock_t_ptr_ptr_ptr { return new _IO_lock_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '_IO_lock_t****'; }
}
class _IO_FILE implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(_IO_FILE $other): bool { return $this->data == $other->data; }
    public function addr(): _IO_FILE_ptr { return new _IO_FILE_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '_IO_FILE'; }
}
class _IO_FILE_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(_IO_FILE_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): _IO_FILE_ptr_ptr { return new _IO_FILE_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): _IO_FILE { return new _IO_FILE($this->data[$n]); }
    public static function getType(): string { return '_IO_FILE*'; }
}
class _IO_FILE_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(_IO_FILE_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): _IO_FILE_ptr_ptr_ptr { return new _IO_FILE_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): _IO_FILE_ptr { return new _IO_FILE_ptr($this->data[$n]); }
    public static function getType(): string { return '_IO_FILE**'; }
}
class _IO_FILE_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(_IO_FILE_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): _IO_FILE_ptr_ptr_ptr_ptr { return new _IO_FILE_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): _IO_FILE_ptr_ptr { return new _IO_FILE_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '_IO_FILE***'; }
}
class _IO_FILE_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(_IO_FILE_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): _IO_FILE_ptr_ptr_ptr_ptr_ptr { return new _IO_FILE_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): _IO_FILE_ptr_ptr_ptr { return new _IO_FILE_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '_IO_FILE****'; }
}
class __io_read_fn implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__io_read_fn $other): bool { return $this->data == $other->data; }
    public function addr(): __io_read_fn_ptr { return new __io_read_fn_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__io_read_fn'; }
}
class __io_read_fn_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__io_read_fn_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __io_read_fn_ptr_ptr { return new __io_read_fn_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __io_read_fn { return new __io_read_fn($this->data[$n]); }
    public static function getType(): string { return '__io_read_fn*'; }
}
class __io_read_fn_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__io_read_fn_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __io_read_fn_ptr_ptr_ptr { return new __io_read_fn_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __io_read_fn_ptr { return new __io_read_fn_ptr($this->data[$n]); }
    public static function getType(): string { return '__io_read_fn**'; }
}
class __io_read_fn_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__io_read_fn_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __io_read_fn_ptr_ptr_ptr_ptr { return new __io_read_fn_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __io_read_fn_ptr_ptr { return new __io_read_fn_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__io_read_fn***'; }
}
class __io_read_fn_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__io_read_fn_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __io_read_fn_ptr_ptr_ptr_ptr_ptr { return new __io_read_fn_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __io_read_fn_ptr_ptr_ptr { return new __io_read_fn_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__io_read_fn****'; }
}
class __io_write_fn implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__io_write_fn $other): bool { return $this->data == $other->data; }
    public function addr(): __io_write_fn_ptr { return new __io_write_fn_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__io_write_fn'; }
}
class __io_write_fn_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__io_write_fn_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __io_write_fn_ptr_ptr { return new __io_write_fn_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __io_write_fn { return new __io_write_fn($this->data[$n]); }
    public static function getType(): string { return '__io_write_fn*'; }
}
class __io_write_fn_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__io_write_fn_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __io_write_fn_ptr_ptr_ptr { return new __io_write_fn_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __io_write_fn_ptr { return new __io_write_fn_ptr($this->data[$n]); }
    public static function getType(): string { return '__io_write_fn**'; }
}
class __io_write_fn_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__io_write_fn_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __io_write_fn_ptr_ptr_ptr_ptr { return new __io_write_fn_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __io_write_fn_ptr_ptr { return new __io_write_fn_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__io_write_fn***'; }
}
class __io_write_fn_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__io_write_fn_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __io_write_fn_ptr_ptr_ptr_ptr_ptr { return new __io_write_fn_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __io_write_fn_ptr_ptr_ptr { return new __io_write_fn_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__io_write_fn****'; }
}
class __io_seek_fn implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__io_seek_fn $other): bool { return $this->data == $other->data; }
    public function addr(): __io_seek_fn_ptr { return new __io_seek_fn_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__io_seek_fn'; }
}
class __io_seek_fn_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__io_seek_fn_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __io_seek_fn_ptr_ptr { return new __io_seek_fn_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __io_seek_fn { return new __io_seek_fn($this->data[$n]); }
    public static function getType(): string { return '__io_seek_fn*'; }
}
class __io_seek_fn_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__io_seek_fn_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __io_seek_fn_ptr_ptr_ptr { return new __io_seek_fn_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __io_seek_fn_ptr { return new __io_seek_fn_ptr($this->data[$n]); }
    public static function getType(): string { return '__io_seek_fn**'; }
}
class __io_seek_fn_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__io_seek_fn_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __io_seek_fn_ptr_ptr_ptr_ptr { return new __io_seek_fn_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __io_seek_fn_ptr_ptr { return new __io_seek_fn_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__io_seek_fn***'; }
}
class __io_seek_fn_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__io_seek_fn_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __io_seek_fn_ptr_ptr_ptr_ptr_ptr { return new __io_seek_fn_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __io_seek_fn_ptr_ptr_ptr { return new __io_seek_fn_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__io_seek_fn****'; }
}
class __io_close_fn implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__io_close_fn $other): bool { return $this->data == $other->data; }
    public function addr(): __io_close_fn_ptr { return new __io_close_fn_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__io_close_fn'; }
}
class __io_close_fn_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__io_close_fn_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __io_close_fn_ptr_ptr { return new __io_close_fn_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __io_close_fn { return new __io_close_fn($this->data[$n]); }
    public static function getType(): string { return '__io_close_fn*'; }
}
class __io_close_fn_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__io_close_fn_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __io_close_fn_ptr_ptr_ptr { return new __io_close_fn_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __io_close_fn_ptr { return new __io_close_fn_ptr($this->data[$n]); }
    public static function getType(): string { return '__io_close_fn**'; }
}
class __io_close_fn_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__io_close_fn_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __io_close_fn_ptr_ptr_ptr_ptr { return new __io_close_fn_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __io_close_fn_ptr_ptr { return new __io_close_fn_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__io_close_fn***'; }
}
class __io_close_fn_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__io_close_fn_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __io_close_fn_ptr_ptr_ptr_ptr_ptr { return new __io_close_fn_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __io_close_fn_ptr_ptr_ptr { return new __io_close_fn_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__io_close_fn****'; }
}
class fpos_t implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(fpos_t $other): bool { return $this->data == $other->data; }
    public function addr(): fpos_t_ptr { return new fpos_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'fpos_t'; }
}
class fpos_t_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(fpos_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): fpos_t_ptr_ptr { return new fpos_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): fpos_t { return new fpos_t($this->data[$n]); }
    public static function getType(): string { return 'fpos_t*'; }
}
class fpos_t_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(fpos_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): fpos_t_ptr_ptr_ptr { return new fpos_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): fpos_t_ptr { return new fpos_t_ptr($this->data[$n]); }
    public static function getType(): string { return 'fpos_t**'; }
}
class fpos_t_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(fpos_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): fpos_t_ptr_ptr_ptr_ptr { return new fpos_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): fpos_t_ptr_ptr { return new fpos_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'fpos_t***'; }
}
class fpos_t_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(fpos_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): fpos_t_ptr_ptr_ptr_ptr_ptr { return new fpos_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): fpos_t_ptr_ptr_ptr { return new fpos_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'fpos_t****'; }
}
class gcc_jit_context implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(gcc_jit_context $other): bool { return $this->data == $other->data; }
    public function addr(): gcc_jit_context_ptr { return new gcc_jit_context_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'gcc_jit_context'; }
}
class gcc_jit_context_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(gcc_jit_context_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): gcc_jit_context_ptr_ptr { return new gcc_jit_context_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): gcc_jit_context { return new gcc_jit_context($this->data[$n]); }
    public static function getType(): string { return 'gcc_jit_context*'; }
}
class gcc_jit_context_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(gcc_jit_context_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): gcc_jit_context_ptr_ptr_ptr { return new gcc_jit_context_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): gcc_jit_context_ptr { return new gcc_jit_context_ptr($this->data[$n]); }
    public static function getType(): string { return 'gcc_jit_context**'; }
}
class gcc_jit_context_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(gcc_jit_context_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): gcc_jit_context_ptr_ptr_ptr_ptr { return new gcc_jit_context_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): gcc_jit_context_ptr_ptr { return new gcc_jit_context_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'gcc_jit_context***'; }
}
class gcc_jit_context_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(gcc_jit_context_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): gcc_jit_context_ptr_ptr_ptr_ptr_ptr { return new gcc_jit_context_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): gcc_jit_context_ptr_ptr_ptr { return new gcc_jit_context_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'gcc_jit_context****'; }
}
class gcc_jit_result implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(gcc_jit_result $other): bool { return $this->data == $other->data; }
    public function addr(): gcc_jit_result_ptr { return new gcc_jit_result_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'gcc_jit_result'; }
}
class gcc_jit_result_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(gcc_jit_result_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): gcc_jit_result_ptr_ptr { return new gcc_jit_result_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): gcc_jit_result { return new gcc_jit_result($this->data[$n]); }
    public static function getType(): string { return 'gcc_jit_result*'; }
}
class gcc_jit_result_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(gcc_jit_result_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): gcc_jit_result_ptr_ptr_ptr { return new gcc_jit_result_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): gcc_jit_result_ptr { return new gcc_jit_result_ptr($this->data[$n]); }
    public static function getType(): string { return 'gcc_jit_result**'; }
}
class gcc_jit_result_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(gcc_jit_result_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): gcc_jit_result_ptr_ptr_ptr_ptr { return new gcc_jit_result_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): gcc_jit_result_ptr_ptr { return new gcc_jit_result_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'gcc_jit_result***'; }
}
class gcc_jit_result_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(gcc_jit_result_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): gcc_jit_result_ptr_ptr_ptr_ptr_ptr { return new gcc_jit_result_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): gcc_jit_result_ptr_ptr_ptr { return new gcc_jit_result_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'gcc_jit_result****'; }
}
class gcc_jit_object implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(gcc_jit_object $other): bool { return $this->data == $other->data; }
    public function addr(): gcc_jit_object_ptr { return new gcc_jit_object_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'gcc_jit_object'; }
}
class gcc_jit_object_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(gcc_jit_object_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): gcc_jit_object_ptr_ptr { return new gcc_jit_object_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): gcc_jit_object { return new gcc_jit_object($this->data[$n]); }
    public static function getType(): string { return 'gcc_jit_object*'; }
}
class gcc_jit_object_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(gcc_jit_object_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): gcc_jit_object_ptr_ptr_ptr { return new gcc_jit_object_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): gcc_jit_object_ptr { return new gcc_jit_object_ptr($this->data[$n]); }
    public static function getType(): string { return 'gcc_jit_object**'; }
}
class gcc_jit_object_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(gcc_jit_object_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): gcc_jit_object_ptr_ptr_ptr_ptr { return new gcc_jit_object_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): gcc_jit_object_ptr_ptr { return new gcc_jit_object_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'gcc_jit_object***'; }
}
class gcc_jit_object_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(gcc_jit_object_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): gcc_jit_object_ptr_ptr_ptr_ptr_ptr { return new gcc_jit_object_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): gcc_jit_object_ptr_ptr_ptr { return new gcc_jit_object_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'gcc_jit_object****'; }
}
class gcc_jit_location implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(gcc_jit_location $other): bool { return $this->data == $other->data; }
    public function addr(): gcc_jit_location_ptr { return new gcc_jit_location_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'gcc_jit_location'; }
}
class gcc_jit_location_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(gcc_jit_location_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): gcc_jit_location_ptr_ptr { return new gcc_jit_location_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): gcc_jit_location { return new gcc_jit_location($this->data[$n]); }
    public static function getType(): string { return 'gcc_jit_location*'; }
}
class gcc_jit_location_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(gcc_jit_location_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): gcc_jit_location_ptr_ptr_ptr { return new gcc_jit_location_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): gcc_jit_location_ptr { return new gcc_jit_location_ptr($this->data[$n]); }
    public static function getType(): string { return 'gcc_jit_location**'; }
}
class gcc_jit_location_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(gcc_jit_location_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): gcc_jit_location_ptr_ptr_ptr_ptr { return new gcc_jit_location_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): gcc_jit_location_ptr_ptr { return new gcc_jit_location_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'gcc_jit_location***'; }
}
class gcc_jit_location_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(gcc_jit_location_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): gcc_jit_location_ptr_ptr_ptr_ptr_ptr { return new gcc_jit_location_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): gcc_jit_location_ptr_ptr_ptr { return new gcc_jit_location_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'gcc_jit_location****'; }
}
class gcc_jit_type implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(gcc_jit_type $other): bool { return $this->data == $other->data; }
    public function addr(): gcc_jit_type_ptr { return new gcc_jit_type_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'gcc_jit_type'; }
}
class gcc_jit_type_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(gcc_jit_type_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): gcc_jit_type_ptr_ptr { return new gcc_jit_type_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): gcc_jit_type { return new gcc_jit_type($this->data[$n]); }
    public static function getType(): string { return 'gcc_jit_type*'; }
}
class gcc_jit_type_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(gcc_jit_type_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): gcc_jit_type_ptr_ptr_ptr { return new gcc_jit_type_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): gcc_jit_type_ptr { return new gcc_jit_type_ptr($this->data[$n]); }
    public static function getType(): string { return 'gcc_jit_type**'; }
}
class gcc_jit_type_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(gcc_jit_type_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): gcc_jit_type_ptr_ptr_ptr_ptr { return new gcc_jit_type_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): gcc_jit_type_ptr_ptr { return new gcc_jit_type_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'gcc_jit_type***'; }
}
class gcc_jit_type_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(gcc_jit_type_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): gcc_jit_type_ptr_ptr_ptr_ptr_ptr { return new gcc_jit_type_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): gcc_jit_type_ptr_ptr_ptr { return new gcc_jit_type_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'gcc_jit_type****'; }
}
class gcc_jit_field implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(gcc_jit_field $other): bool { return $this->data == $other->data; }
    public function addr(): gcc_jit_field_ptr { return new gcc_jit_field_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'gcc_jit_field'; }
}
class gcc_jit_field_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(gcc_jit_field_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): gcc_jit_field_ptr_ptr { return new gcc_jit_field_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): gcc_jit_field { return new gcc_jit_field($this->data[$n]); }
    public static function getType(): string { return 'gcc_jit_field*'; }
}
class gcc_jit_field_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(gcc_jit_field_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): gcc_jit_field_ptr_ptr_ptr { return new gcc_jit_field_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): gcc_jit_field_ptr { return new gcc_jit_field_ptr($this->data[$n]); }
    public static function getType(): string { return 'gcc_jit_field**'; }
}
class gcc_jit_field_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(gcc_jit_field_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): gcc_jit_field_ptr_ptr_ptr_ptr { return new gcc_jit_field_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): gcc_jit_field_ptr_ptr { return new gcc_jit_field_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'gcc_jit_field***'; }
}
class gcc_jit_field_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(gcc_jit_field_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): gcc_jit_field_ptr_ptr_ptr_ptr_ptr { return new gcc_jit_field_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): gcc_jit_field_ptr_ptr_ptr { return new gcc_jit_field_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'gcc_jit_field****'; }
}
class gcc_jit_struct implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(gcc_jit_struct $other): bool { return $this->data == $other->data; }
    public function addr(): gcc_jit_struct_ptr { return new gcc_jit_struct_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'gcc_jit_struct'; }
}
class gcc_jit_struct_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(gcc_jit_struct_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): gcc_jit_struct_ptr_ptr { return new gcc_jit_struct_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): gcc_jit_struct { return new gcc_jit_struct($this->data[$n]); }
    public static function getType(): string { return 'gcc_jit_struct*'; }
}
class gcc_jit_struct_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(gcc_jit_struct_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): gcc_jit_struct_ptr_ptr_ptr { return new gcc_jit_struct_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): gcc_jit_struct_ptr { return new gcc_jit_struct_ptr($this->data[$n]); }
    public static function getType(): string { return 'gcc_jit_struct**'; }
}
class gcc_jit_struct_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(gcc_jit_struct_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): gcc_jit_struct_ptr_ptr_ptr_ptr { return new gcc_jit_struct_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): gcc_jit_struct_ptr_ptr { return new gcc_jit_struct_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'gcc_jit_struct***'; }
}
class gcc_jit_struct_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(gcc_jit_struct_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): gcc_jit_struct_ptr_ptr_ptr_ptr_ptr { return new gcc_jit_struct_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): gcc_jit_struct_ptr_ptr_ptr { return new gcc_jit_struct_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'gcc_jit_struct****'; }
}
class gcc_jit_function implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(gcc_jit_function $other): bool { return $this->data == $other->data; }
    public function addr(): gcc_jit_function_ptr { return new gcc_jit_function_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'gcc_jit_function'; }
}
class gcc_jit_function_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(gcc_jit_function_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): gcc_jit_function_ptr_ptr { return new gcc_jit_function_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): gcc_jit_function { return new gcc_jit_function($this->data[$n]); }
    public static function getType(): string { return 'gcc_jit_function*'; }
}
class gcc_jit_function_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(gcc_jit_function_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): gcc_jit_function_ptr_ptr_ptr { return new gcc_jit_function_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): gcc_jit_function_ptr { return new gcc_jit_function_ptr($this->data[$n]); }
    public static function getType(): string { return 'gcc_jit_function**'; }
}
class gcc_jit_function_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(gcc_jit_function_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): gcc_jit_function_ptr_ptr_ptr_ptr { return new gcc_jit_function_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): gcc_jit_function_ptr_ptr { return new gcc_jit_function_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'gcc_jit_function***'; }
}
class gcc_jit_function_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(gcc_jit_function_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): gcc_jit_function_ptr_ptr_ptr_ptr_ptr { return new gcc_jit_function_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): gcc_jit_function_ptr_ptr_ptr { return new gcc_jit_function_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'gcc_jit_function****'; }
}
class gcc_jit_block implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(gcc_jit_block $other): bool { return $this->data == $other->data; }
    public function addr(): gcc_jit_block_ptr { return new gcc_jit_block_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'gcc_jit_block'; }
}
class gcc_jit_block_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(gcc_jit_block_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): gcc_jit_block_ptr_ptr { return new gcc_jit_block_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): gcc_jit_block { return new gcc_jit_block($this->data[$n]); }
    public static function getType(): string { return 'gcc_jit_block*'; }
}
class gcc_jit_block_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(gcc_jit_block_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): gcc_jit_block_ptr_ptr_ptr { return new gcc_jit_block_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): gcc_jit_block_ptr { return new gcc_jit_block_ptr($this->data[$n]); }
    public static function getType(): string { return 'gcc_jit_block**'; }
}
class gcc_jit_block_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(gcc_jit_block_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): gcc_jit_block_ptr_ptr_ptr_ptr { return new gcc_jit_block_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): gcc_jit_block_ptr_ptr { return new gcc_jit_block_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'gcc_jit_block***'; }
}
class gcc_jit_block_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(gcc_jit_block_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): gcc_jit_block_ptr_ptr_ptr_ptr_ptr { return new gcc_jit_block_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): gcc_jit_block_ptr_ptr_ptr { return new gcc_jit_block_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'gcc_jit_block****'; }
}
class gcc_jit_rvalue implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(gcc_jit_rvalue $other): bool { return $this->data == $other->data; }
    public function addr(): gcc_jit_rvalue_ptr { return new gcc_jit_rvalue_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'gcc_jit_rvalue'; }
}
class gcc_jit_rvalue_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(gcc_jit_rvalue_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): gcc_jit_rvalue_ptr_ptr { return new gcc_jit_rvalue_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): gcc_jit_rvalue { return new gcc_jit_rvalue($this->data[$n]); }
    public static function getType(): string { return 'gcc_jit_rvalue*'; }
}
class gcc_jit_rvalue_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(gcc_jit_rvalue_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): gcc_jit_rvalue_ptr_ptr_ptr { return new gcc_jit_rvalue_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): gcc_jit_rvalue_ptr { return new gcc_jit_rvalue_ptr($this->data[$n]); }
    public static function getType(): string { return 'gcc_jit_rvalue**'; }
}
class gcc_jit_rvalue_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(gcc_jit_rvalue_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): gcc_jit_rvalue_ptr_ptr_ptr_ptr { return new gcc_jit_rvalue_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): gcc_jit_rvalue_ptr_ptr { return new gcc_jit_rvalue_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'gcc_jit_rvalue***'; }
}
class gcc_jit_rvalue_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(gcc_jit_rvalue_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): gcc_jit_rvalue_ptr_ptr_ptr_ptr_ptr { return new gcc_jit_rvalue_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): gcc_jit_rvalue_ptr_ptr_ptr { return new gcc_jit_rvalue_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'gcc_jit_rvalue****'; }
}
class gcc_jit_lvalue implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(gcc_jit_lvalue $other): bool { return $this->data == $other->data; }
    public function addr(): gcc_jit_lvalue_ptr { return new gcc_jit_lvalue_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'gcc_jit_lvalue'; }
}
class gcc_jit_lvalue_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(gcc_jit_lvalue_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): gcc_jit_lvalue_ptr_ptr { return new gcc_jit_lvalue_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): gcc_jit_lvalue { return new gcc_jit_lvalue($this->data[$n]); }
    public static function getType(): string { return 'gcc_jit_lvalue*'; }
}
class gcc_jit_lvalue_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(gcc_jit_lvalue_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): gcc_jit_lvalue_ptr_ptr_ptr { return new gcc_jit_lvalue_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): gcc_jit_lvalue_ptr { return new gcc_jit_lvalue_ptr($this->data[$n]); }
    public static function getType(): string { return 'gcc_jit_lvalue**'; }
}
class gcc_jit_lvalue_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(gcc_jit_lvalue_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): gcc_jit_lvalue_ptr_ptr_ptr_ptr { return new gcc_jit_lvalue_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): gcc_jit_lvalue_ptr_ptr { return new gcc_jit_lvalue_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'gcc_jit_lvalue***'; }
}
class gcc_jit_lvalue_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(gcc_jit_lvalue_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): gcc_jit_lvalue_ptr_ptr_ptr_ptr_ptr { return new gcc_jit_lvalue_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): gcc_jit_lvalue_ptr_ptr_ptr { return new gcc_jit_lvalue_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'gcc_jit_lvalue****'; }
}
class gcc_jit_param implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(gcc_jit_param $other): bool { return $this->data == $other->data; }
    public function addr(): gcc_jit_param_ptr { return new gcc_jit_param_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'gcc_jit_param'; }
}
class gcc_jit_param_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(gcc_jit_param_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): gcc_jit_param_ptr_ptr { return new gcc_jit_param_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): gcc_jit_param { return new gcc_jit_param($this->data[$n]); }
    public static function getType(): string { return 'gcc_jit_param*'; }
}
class gcc_jit_param_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(gcc_jit_param_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): gcc_jit_param_ptr_ptr_ptr { return new gcc_jit_param_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): gcc_jit_param_ptr { return new gcc_jit_param_ptr($this->data[$n]); }
    public static function getType(): string { return 'gcc_jit_param**'; }
}
class gcc_jit_param_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(gcc_jit_param_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): gcc_jit_param_ptr_ptr_ptr_ptr { return new gcc_jit_param_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): gcc_jit_param_ptr_ptr { return new gcc_jit_param_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'gcc_jit_param***'; }
}
class gcc_jit_param_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(gcc_jit_param_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): gcc_jit_param_ptr_ptr_ptr_ptr_ptr { return new gcc_jit_param_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): gcc_jit_param_ptr_ptr_ptr { return new gcc_jit_param_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'gcc_jit_param****'; }
}
class gcc_jit_case implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(gcc_jit_case $other): bool { return $this->data == $other->data; }
    public function addr(): gcc_jit_case_ptr { return new gcc_jit_case_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'gcc_jit_case'; }
}
class gcc_jit_case_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(gcc_jit_case_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): gcc_jit_case_ptr_ptr { return new gcc_jit_case_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): gcc_jit_case { return new gcc_jit_case($this->data[$n]); }
    public static function getType(): string { return 'gcc_jit_case*'; }
}
class gcc_jit_case_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(gcc_jit_case_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): gcc_jit_case_ptr_ptr_ptr { return new gcc_jit_case_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): gcc_jit_case_ptr { return new gcc_jit_case_ptr($this->data[$n]); }
    public static function getType(): string { return 'gcc_jit_case**'; }
}
class gcc_jit_case_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(gcc_jit_case_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): gcc_jit_case_ptr_ptr_ptr_ptr { return new gcc_jit_case_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): gcc_jit_case_ptr_ptr { return new gcc_jit_case_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'gcc_jit_case***'; }
}
class gcc_jit_case_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(gcc_jit_case_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): gcc_jit_case_ptr_ptr_ptr_ptr_ptr { return new gcc_jit_case_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): gcc_jit_case_ptr_ptr_ptr { return new gcc_jit_case_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'gcc_jit_case****'; }
}
class gcc_jit_timer implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(gcc_jit_timer $other): bool { return $this->data == $other->data; }
    public function addr(): gcc_jit_timer_ptr { return new gcc_jit_timer_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'gcc_jit_timer'; }
}
class gcc_jit_timer_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(gcc_jit_timer_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): gcc_jit_timer_ptr_ptr { return new gcc_jit_timer_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): gcc_jit_timer { return new gcc_jit_timer($this->data[$n]); }
    public static function getType(): string { return 'gcc_jit_timer*'; }
}
class gcc_jit_timer_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(gcc_jit_timer_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): gcc_jit_timer_ptr_ptr_ptr { return new gcc_jit_timer_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): gcc_jit_timer_ptr { return new gcc_jit_timer_ptr($this->data[$n]); }
    public static function getType(): string { return 'gcc_jit_timer**'; }
}
class gcc_jit_timer_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(gcc_jit_timer_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): gcc_jit_timer_ptr_ptr_ptr_ptr { return new gcc_jit_timer_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): gcc_jit_timer_ptr_ptr { return new gcc_jit_timer_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'gcc_jit_timer***'; }
}
class gcc_jit_timer_ptr_ptr_ptr_ptr implements ilibgccjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(gcc_jit_timer_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): gcc_jit_timer_ptr_ptr_ptr_ptr_ptr { return new gcc_jit_timer_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): gcc_jit_timer_ptr_ptr_ptr { return new gcc_jit_timer_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'gcc_jit_timer****'; }
}