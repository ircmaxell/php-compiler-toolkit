<?php namespace libjit;
use FFI;
interface ilibjit {}
class libjit {
    const SOFILE = '/opt/lib/libjit.so.0';
    const HEADER_DEF = 'typedef char jit_sbyte;
typedef unsigned char jit_ubyte;
typedef short jit_short;
typedef unsigned short jit_ushort;
typedef int jit_int;
typedef unsigned int jit_uint;
typedef long jit_nint;
typedef unsigned long jit_nuint;
typedef long jit_long;
typedef unsigned long jit_ulong;
typedef float jit_float32;
typedef double jit_float64;
typedef long double jit_nfloat;
typedef void* jit_ptr;
typedef struct _jit_context* jit_context_t;
typedef struct _jit_function* jit_function_t;
typedef struct _jit_block* jit_block_t;
typedef struct _jit_insn* jit_insn_t;
typedef struct _jit_value* jit_value_t;
typedef struct _jit_type* jit_type_t;
typedef struct jit_stack_trace* jit_stack_trace_t;
typedef jit_nuint jit_label_t;
typedef void (*jit_meta_free_func)(void *data);
typedef int (*jit_on_demand_func)(jit_function_t func);
typedef void *(*jit_on_demand_driver_func)(jit_function_t func);
typedef unsigned int jit_size_t;
typedef void* jit_memory_context_t;
typedef void* jit_function_info_t;
typedef struct jit_memory_manager* jit_memory_manager_t;
struct jit_memory_manager
{
  jit_memory_context_t (*create)(jit_context_t context);
  void (*destroy)(jit_memory_context_t memctx);

  jit_function_info_t (*find_function_info)(jit_memory_context_t memctx, void *pc);
  jit_function_t (*get_function)(jit_memory_context_t memctx, jit_function_info_t info);
  void * (*get_function_start)(jit_memory_context_t memctx, jit_function_info_t info);
  void * (*get_function_end)(jit_memory_context_t memctx, jit_function_info_t info);

  jit_function_t (*alloc_function)(jit_memory_context_t memctx);
  void (*free_function)(jit_memory_context_t memctx, jit_function_t func);

  int (*start_function)(jit_memory_context_t memctx, jit_function_t func);
  int (*end_function)(jit_memory_context_t memctx, int result);
  int (*extend_limit)(jit_memory_context_t memctx, int count);

  void * (*get_limit)(jit_memory_context_t memctx);
  void * (*get_break)(jit_memory_context_t memctx);
  void (*set_break)(jit_memory_context_t memctx, void *brk);

  void * (*alloc_trampoline)(jit_memory_context_t memctx);
  void (*free_trampoline)(jit_memory_context_t memctx, void *ptr);

  void * (*alloc_closure)(jit_memory_context_t memctx);
  void (*free_closure)(jit_memory_context_t memctx, void *ptr);

  void * (*alloc_data)(jit_memory_context_t memctx, jit_size_t size, jit_size_t align);
};
jit_memory_manager_t jit_default_memory_manager(void);
jit_context_t jit_context_create(void);
void jit_context_destroy(jit_context_t);
void jit_context_build_start(jit_context_t);
void jit_context_build_end(jit_context_t);
void jit_context_set_on_demand_driver(jit_context_t, jit_on_demand_driver_func);
void jit_context_set_memory_manager(jit_context_t, jit_memory_manager_t);
int jit_context_set_meta(jit_context_t, int, void*, jit_meta_free_func);
int jit_context_set_meta_numeric(jit_context_t, int, jit_nuint);
void* jit_context_get_meta(jit_context_t, int);
jit_nuint jit_context_get_meta_numeric(jit_context_t, int);
void jit_context_free_meta(jit_context_t, int);
jit_type_t jit_type_void;
jit_type_t jit_type_sbyte;
jit_type_t jit_type_ubyte;
jit_type_t jit_type_short;
jit_type_t jit_type_ushort;
jit_type_t jit_type_int;
jit_type_t jit_type_uint;
jit_type_t jit_type_nint;
jit_type_t jit_type_nuint;
jit_type_t jit_type_long;
jit_type_t jit_type_ulong;
jit_type_t jit_type_float32;
jit_type_t jit_type_float64;
jit_type_t jit_type_nfloat;
jit_type_t jit_type_void_ptr;
jit_type_t jit_type_sys_bool;
jit_type_t jit_type_sys_char;
jit_type_t jit_type_sys_schar;
jit_type_t jit_type_sys_uchar;
jit_type_t jit_type_sys_short;
jit_type_t jit_type_sys_ushort;
jit_type_t jit_type_sys_int;
jit_type_t jit_type_sys_uint;
jit_type_t jit_type_sys_long;
jit_type_t jit_type_sys_ulong;
jit_type_t jit_type_sys_longlong;
jit_type_t jit_type_sys_ulonglong;
jit_type_t jit_type_sys_float;
jit_type_t jit_type_sys_double;
jit_type_t jit_type_sys_long_double;
typedef enum {
  jit_abi_cdecl,
  jit_abi_vararg,
  jit_abi_stdcall,
  jit_abi_fastcall,
} jit_abi_t;
jit_type_t jit_type_copy(jit_type_t);
void jit_type_free(jit_type_t);
jit_type_t jit_type_create_struct(jit_type_t*, unsigned int, int);
jit_type_t jit_type_create_union(jit_type_t*, unsigned int, int);
jit_type_t jit_type_create_signature(jit_abi_t, jit_type_t, jit_type_t*, unsigned int, int);
jit_type_t jit_type_create_pointer(jit_type_t, int);
jit_type_t jit_type_create_tagged(jit_type_t, int, void*, jit_meta_free_func, int);
int jit_type_set_names(jit_type_t, char**, unsigned int);
void jit_type_set_size_and_alignment(jit_type_t, jit_nint, jit_nint);
void jit_type_set_offset(jit_type_t, unsigned int, jit_nuint);
int jit_type_get_kind(jit_type_t);
jit_nuint jit_type_get_size(jit_type_t);
jit_nuint jit_type_get_alignment(jit_type_t);
jit_nuint jit_type_best_alignment(void);
unsigned int jit_type_num_fields(jit_type_t);
jit_type_t jit_type_get_field(jit_type_t, unsigned int);
jit_nuint jit_type_get_offset(jit_type_t, unsigned int);
char* jit_type_get_name(jit_type_t, unsigned int);
unsigned int jit_type_find_name(jit_type_t, char*);
unsigned int jit_type_num_params(jit_type_t);
jit_type_t jit_type_get_return(jit_type_t);
jit_type_t jit_type_get_param(jit_type_t, unsigned int);
jit_abi_t jit_type_get_abi(jit_type_t);
jit_type_t jit_type_get_ref(jit_type_t);
jit_type_t jit_type_get_tagged_type(jit_type_t);
void jit_type_set_tagged_type(jit_type_t, jit_type_t, int);
int jit_type_get_tagged_kind(jit_type_t);
void* jit_type_get_tagged_data(jit_type_t);
void jit_type_set_tagged_data(jit_type_t, void*, jit_meta_free_func);
int jit_type_is_primitive(jit_type_t);
int jit_type_is_struct(jit_type_t);
int jit_type_is_union(jit_type_t);
int jit_type_is_signature(jit_type_t);
int jit_type_is_pointer(jit_type_t);
int jit_type_is_tagged(jit_type_t);
jit_type_t jit_type_remove_tags(jit_type_t);
jit_type_t jit_type_normalize(jit_type_t);
jit_type_t jit_type_promote_int(jit_type_t);
int jit_type_return_via_pointer(jit_type_t);
int jit_type_has_tag(jit_type_t, int);
typedef void (*jit_closure_func)(jit_type_t signature, void *result,
                                 void **args, void *user_data);
typedef struct jit_closure_va_list* jit_closure_va_list_t;
void jit_apply(jit_type_t, void*, void**, unsigned int, void*);
void jit_apply_raw(jit_type_t, void*, void*, void*);
int jit_raw_supported(jit_type_t);
void* jit_closure_create(jit_context_t, jit_type_t, jit_closure_func, void*);
jit_nint jit_closure_va_get_nint(jit_closure_va_list_t);
jit_nuint jit_closure_va_get_nuint(jit_closure_va_list_t);
jit_long jit_closure_va_get_long(jit_closure_va_list_t);
jit_ulong jit_closure_va_get_ulong(jit_closure_va_list_t);
jit_float32 jit_closure_va_get_float32(jit_closure_va_list_t);
jit_float64 jit_closure_va_get_float64(jit_closure_va_list_t);
jit_nfloat jit_closure_va_get_nfloat(jit_closure_va_list_t);
void* jit_closure_va_get_ptr(jit_closure_va_list_t);
void jit_closure_va_get_struct(jit_closure_va_list_t, void*, jit_type_t);
jit_function_t jit_block_get_function(jit_block_t);
jit_context_t jit_block_get_context(jit_block_t);
jit_label_t jit_block_get_label(jit_block_t);
jit_label_t jit_block_get_next_label(jit_block_t, jit_label_t);
jit_block_t jit_block_next(jit_function_t, jit_block_t);
jit_block_t jit_block_previous(jit_function_t, jit_block_t);
jit_block_t jit_block_from_label(jit_function_t, jit_label_t);
int jit_block_set_meta(jit_block_t, int, void*, jit_meta_free_func);
void* jit_block_get_meta(jit_block_t, int);
void jit_block_free_meta(jit_block_t, int);
int jit_block_is_reachable(jit_block_t);
int jit_block_ends_in_dead(jit_block_t);
int jit_block_current_is_dead(jit_function_t);
typedef struct jit_debugger* jit_debugger_t;
typedef jit_nint jit_debugger_thread_id_t;
typedef jit_nint jit_debugger_breakpoint_id_t;
typedef struct jit_debugger_event {
  int type;
  jit_debugger_thread_id_t thread;
  jit_function_t function;
  jit_nint data1;
  jit_nint data2;
  jit_debugger_breakpoint_id_t id;
  jit_stack_trace_t trace;
} jit_debugger_event_t;
typedef struct jit_debugger_breakpoint_info {
  int flags;
  jit_debugger_thread_id_t thread;
  jit_function_t function;
  jit_nint data1;
  jit_nint data2;
}* jit_debugger_breakpoint_info_t;
typedef void (*jit_debugger_hook_func)
  (jit_function_t func, jit_nint data1, jit_nint data2);
int jit_debugging_possible(void);
jit_debugger_t jit_debugger_create(jit_context_t);
void jit_debugger_destroy(jit_debugger_t);
jit_context_t jit_debugger_get_context(jit_debugger_t);
jit_debugger_t jit_debugger_from_context(jit_context_t);
jit_debugger_thread_id_t jit_debugger_get_self(jit_debugger_t);
jit_debugger_thread_id_t jit_debugger_get_thread(jit_debugger_t, void*);
int jit_debugger_get_native_thread(jit_debugger_t, jit_debugger_thread_id_t, void*);
void jit_debugger_set_breakable(jit_debugger_t, void*, int);
void jit_debugger_attach_self(jit_debugger_t, int);
void jit_debugger_detach_self(jit_debugger_t);
int jit_debugger_wait_event(jit_debugger_t, jit_debugger_event_t*, jit_int);
jit_debugger_breakpoint_id_t jit_debugger_add_breakpoint(jit_debugger_t, jit_debugger_breakpoint_info_t);
void jit_debugger_remove_breakpoint(jit_debugger_t, jit_debugger_breakpoint_id_t);
void jit_debugger_remove_all_breakpoints(jit_debugger_t);
int jit_debugger_is_alive(jit_debugger_t, jit_debugger_thread_id_t);
int jit_debugger_is_running(jit_debugger_t, jit_debugger_thread_id_t);
void jit_debugger_run(jit_debugger_t, jit_debugger_thread_id_t);
void jit_debugger_step(jit_debugger_t, jit_debugger_thread_id_t);
void jit_debugger_next(jit_debugger_t, jit_debugger_thread_id_t);
void jit_debugger_finish(jit_debugger_t, jit_debugger_thread_id_t);
void jit_debugger_break(jit_debugger_t);
void jit_debugger_quit(jit_debugger_t);
jit_debugger_hook_func jit_debugger_set_hook(jit_context_t, jit_debugger_hook_func);
typedef struct jit_readelf* jit_readelf_t;
typedef struct jit_writeelf* jit_writeelf_t;
int jit_readelf_open(jit_readelf_t*, char*, int);
void jit_readelf_close(jit_readelf_t);
char* jit_readelf_get_name(jit_readelf_t);
void* jit_readelf_get_symbol(jit_readelf_t, char*);
void* jit_readelf_get_section(jit_readelf_t, char*, jit_nuint*);
void* jit_readelf_get_section_by_type(jit_readelf_t, jit_int, jit_nuint*);
void* jit_readelf_map_vaddr(jit_readelf_t, jit_nuint);
unsigned int jit_readelf_num_needed(jit_readelf_t);
char* jit_readelf_get_needed(jit_readelf_t, unsigned int);
void jit_readelf_add_to_context(jit_readelf_t, jit_context_t);
int jit_readelf_resolve_all(jit_context_t, int);
int jit_readelf_register_symbol(jit_context_t, char*, void*, int);
jit_writeelf_t jit_writeelf_create(char*);
void jit_writeelf_destroy(jit_writeelf_t);
int jit_writeelf_write(jit_writeelf_t, char*);
int jit_writeelf_add_function(jit_writeelf_t, jit_function_t, char*);
int jit_writeelf_add_needed(jit_writeelf_t, char*);
int jit_writeelf_write_section(jit_writeelf_t, char*, jit_int, void*, unsigned int, int);
typedef void *(*jit_exception_func)(int exception_type);
void* jit_exception_get_last(void);
void* jit_exception_get_last_and_clear(void);
void jit_exception_set_last(void*);
void jit_exception_clear_last(void);
void jit_exception_throw(void*);
void jit_exception_builtin(int);
jit_exception_func jit_exception_set_handler(jit_exception_func);
jit_exception_func jit_exception_get_handler(void);
jit_stack_trace_t jit_exception_get_stack_trace(void);
unsigned int jit_stack_trace_get_size(jit_stack_trace_t);
jit_function_t jit_stack_trace_get_function(jit_context_t, jit_stack_trace_t, unsigned int);
void* jit_stack_trace_get_pc(jit_stack_trace_t, unsigned int);
unsigned int jit_stack_trace_get_offset(jit_context_t, jit_stack_trace_t, unsigned int);
void jit_stack_trace_free(jit_stack_trace_t);
jit_function_t jit_function_create(jit_context_t, jit_type_t);
jit_function_t jit_function_create_nested(jit_context_t, jit_type_t, jit_function_t);
void jit_function_abandon(jit_function_t);
jit_context_t jit_function_get_context(jit_function_t);
jit_type_t jit_function_get_signature(jit_function_t);
int jit_function_set_meta(jit_function_t, int, void*, jit_meta_free_func, int);
void* jit_function_get_meta(jit_function_t, int);
void jit_function_free_meta(jit_function_t, int);
jit_function_t jit_function_next(jit_context_t, jit_function_t);
jit_function_t jit_function_previous(jit_context_t, jit_function_t);
jit_block_t jit_function_get_entry(jit_function_t);
jit_block_t jit_function_get_current(jit_function_t);
jit_function_t jit_function_get_nested_parent(jit_function_t);
int jit_function_compile(jit_function_t);
int jit_function_is_compiled(jit_function_t);
void jit_function_set_recompilable(jit_function_t);
void jit_function_clear_recompilable(jit_function_t);
int jit_function_is_recompilable(jit_function_t);
int jit_function_compile_entry(jit_function_t, void**);
void jit_function_setup_entry(jit_function_t, void*);
void* jit_function_to_closure(jit_function_t);
jit_function_t jit_function_from_closure(jit_context_t, void*);
jit_function_t jit_function_from_pc(jit_context_t, void*, void**);
void* jit_function_to_vtable_pointer(jit_function_t);
jit_function_t jit_function_from_vtable_pointer(jit_context_t, void*);
void jit_function_set_on_demand_compiler(jit_function_t, jit_on_demand_func);
jit_on_demand_func jit_function_get_on_demand_compiler(jit_function_t);
int jit_function_apply(jit_function_t, void**, void*);
int jit_function_apply_vararg(jit_function_t, jit_type_t, void**, void*);
void jit_function_set_optimization_level(jit_function_t, unsigned int);
unsigned int jit_function_get_optimization_level(jit_function_t);
unsigned int jit_function_get_max_optimization_level(void);
jit_label_t jit_function_reserve_label(jit_function_t);
int jit_function_labels_equal(jit_function_t, jit_label_t, jit_label_t);
void jit_init(void);
int jit_uses_interpreter(void);
int jit_supports_threads(void);
int jit_supports_virtual_memory(void);
int jit_supports_closures(void);
unsigned int jit_get_closure_size(void);
unsigned int jit_get_closure_alignment(void);
unsigned int jit_get_trampoline_size(void);
unsigned int jit_get_trampoline_alignment(void);
typedef struct {
  jit_type_t return_type;
  jit_type_t ptr_result_type;
  jit_type_t arg1_type;
  jit_type_t arg2_type;
} jit_intrinsic_descr_t;
typedef struct {
  jit_block_t block;
  int posn;
} jit_insn_iter_t;
int jit_insn_get_opcode(jit_insn_t);
jit_value_t jit_insn_get_dest(jit_insn_t);
jit_value_t jit_insn_get_value1(jit_insn_t);
jit_value_t jit_insn_get_value2(jit_insn_t);
jit_label_t jit_insn_get_label(jit_insn_t);
jit_function_t jit_insn_get_function(jit_insn_t);
void* jit_insn_get_native(jit_insn_t);
char* jit_insn_get_name(jit_insn_t);
jit_type_t jit_insn_get_signature(jit_insn_t);
int jit_insn_dest_is_value(jit_insn_t);
int jit_insn_label(jit_function_t, jit_label_t*);
int jit_insn_label_tight(jit_function_t, jit_label_t*);
int jit_insn_new_block(jit_function_t);
jit_value_t jit_insn_load(jit_function_t, jit_value_t);
jit_value_t jit_insn_dup(jit_function_t, jit_value_t);
int jit_insn_store(jit_function_t, jit_value_t, jit_value_t);
jit_value_t jit_insn_load_relative(jit_function_t, jit_value_t, jit_nint, jit_type_t);
int jit_insn_store_relative(jit_function_t, jit_value_t, jit_nint, jit_value_t);
jit_value_t jit_insn_add_relative(jit_function_t, jit_value_t, jit_nint);
jit_value_t jit_insn_load_elem(jit_function_t, jit_value_t, jit_value_t, jit_type_t);
jit_value_t jit_insn_load_elem_address(jit_function_t, jit_value_t, jit_value_t, jit_type_t);
int jit_insn_store_elem(jit_function_t, jit_value_t, jit_value_t, jit_value_t);
int jit_insn_check_null(jit_function_t, jit_value_t);
int jit_insn_nop(jit_function_t);
jit_value_t jit_insn_add(jit_function_t, jit_value_t, jit_value_t);
jit_value_t jit_insn_add_ovf(jit_function_t, jit_value_t, jit_value_t);
jit_value_t jit_insn_sub(jit_function_t, jit_value_t, jit_value_t);
jit_value_t jit_insn_sub_ovf(jit_function_t, jit_value_t, jit_value_t);
jit_value_t jit_insn_mul(jit_function_t, jit_value_t, jit_value_t);
jit_value_t jit_insn_mul_ovf(jit_function_t, jit_value_t, jit_value_t);
jit_value_t jit_insn_div(jit_function_t, jit_value_t, jit_value_t);
jit_value_t jit_insn_rem(jit_function_t, jit_value_t, jit_value_t);
jit_value_t jit_insn_rem_ieee(jit_function_t, jit_value_t, jit_value_t);
jit_value_t jit_insn_neg(jit_function_t, jit_value_t);
jit_value_t jit_insn_and(jit_function_t, jit_value_t, jit_value_t);
jit_value_t jit_insn_or(jit_function_t, jit_value_t, jit_value_t);
jit_value_t jit_insn_xor(jit_function_t, jit_value_t, jit_value_t);
jit_value_t jit_insn_not(jit_function_t, jit_value_t);
jit_value_t jit_insn_shl(jit_function_t, jit_value_t, jit_value_t);
jit_value_t jit_insn_shr(jit_function_t, jit_value_t, jit_value_t);
jit_value_t jit_insn_ushr(jit_function_t, jit_value_t, jit_value_t);
jit_value_t jit_insn_sshr(jit_function_t, jit_value_t, jit_value_t);
jit_value_t jit_insn_eq(jit_function_t, jit_value_t, jit_value_t);
jit_value_t jit_insn_ne(jit_function_t, jit_value_t, jit_value_t);
jit_value_t jit_insn_lt(jit_function_t, jit_value_t, jit_value_t);
jit_value_t jit_insn_le(jit_function_t, jit_value_t, jit_value_t);
jit_value_t jit_insn_gt(jit_function_t, jit_value_t, jit_value_t);
jit_value_t jit_insn_ge(jit_function_t, jit_value_t, jit_value_t);
jit_value_t jit_insn_cmpl(jit_function_t, jit_value_t, jit_value_t);
jit_value_t jit_insn_cmpg(jit_function_t, jit_value_t, jit_value_t);
jit_value_t jit_insn_to_bool(jit_function_t, jit_value_t);
jit_value_t jit_insn_to_not_bool(jit_function_t, jit_value_t);
jit_value_t jit_insn_acos(jit_function_t, jit_value_t);
jit_value_t jit_insn_asin(jit_function_t, jit_value_t);
jit_value_t jit_insn_atan(jit_function_t, jit_value_t);
jit_value_t jit_insn_atan2(jit_function_t, jit_value_t, jit_value_t);
jit_value_t jit_insn_ceil(jit_function_t, jit_value_t);
jit_value_t jit_insn_cos(jit_function_t, jit_value_t);
jit_value_t jit_insn_cosh(jit_function_t, jit_value_t);
jit_value_t jit_insn_exp(jit_function_t, jit_value_t);
jit_value_t jit_insn_floor(jit_function_t, jit_value_t);
jit_value_t jit_insn_log(jit_function_t, jit_value_t);
jit_value_t jit_insn_log10(jit_function_t, jit_value_t);
jit_value_t jit_insn_pow(jit_function_t, jit_value_t, jit_value_t);
jit_value_t jit_insn_rint(jit_function_t, jit_value_t);
jit_value_t jit_insn_round(jit_function_t, jit_value_t);
jit_value_t jit_insn_sin(jit_function_t, jit_value_t);
jit_value_t jit_insn_sinh(jit_function_t, jit_value_t);
jit_value_t jit_insn_sqrt(jit_function_t, jit_value_t);
jit_value_t jit_insn_tan(jit_function_t, jit_value_t);
jit_value_t jit_insn_tanh(jit_function_t, jit_value_t);
jit_value_t jit_insn_trunc(jit_function_t, jit_value_t);
jit_value_t jit_insn_is_nan(jit_function_t, jit_value_t);
jit_value_t jit_insn_is_finite(jit_function_t, jit_value_t);
jit_value_t jit_insn_is_inf(jit_function_t, jit_value_t);
jit_value_t jit_insn_abs(jit_function_t, jit_value_t);
jit_value_t jit_insn_min(jit_function_t, jit_value_t, jit_value_t);
jit_value_t jit_insn_max(jit_function_t, jit_value_t, jit_value_t);
jit_value_t jit_insn_sign(jit_function_t, jit_value_t);
int jit_insn_branch(jit_function_t, jit_label_t*);
int jit_insn_branch_if(jit_function_t, jit_value_t, jit_label_t*);
int jit_insn_branch_if_not(jit_function_t, jit_value_t, jit_label_t*);
int jit_insn_jump_table(jit_function_t, jit_value_t, jit_label_t*, unsigned int);
jit_value_t jit_insn_address_of(jit_function_t, jit_value_t);
jit_value_t jit_insn_address_of_label(jit_function_t, jit_label_t*);
jit_value_t jit_insn_convert(jit_function_t, jit_value_t, jit_type_t, int);
jit_value_t jit_insn_call(jit_function_t, char*, jit_function_t, jit_type_t, jit_value_t*, unsigned int, int);
jit_value_t jit_insn_call_indirect(jit_function_t, jit_value_t, jit_type_t, jit_value_t*, unsigned int, int);
jit_value_t jit_insn_call_indirect_vtable(jit_function_t, jit_value_t, jit_type_t, jit_value_t*, unsigned int, int);
jit_value_t jit_insn_call_native(jit_function_t, char*, void*, jit_type_t, jit_value_t*, unsigned int, int);
jit_value_t jit_insn_call_intrinsic(jit_function_t, char*, void*, jit_intrinsic_descr_t*, jit_value_t, jit_value_t);
int jit_insn_incoming_reg(jit_function_t, jit_value_t, int);
int jit_insn_incoming_frame_posn(jit_function_t, jit_value_t, jit_nint);
int jit_insn_outgoing_reg(jit_function_t, jit_value_t, int);
int jit_insn_outgoing_frame_posn(jit_function_t, jit_value_t, jit_nint);
int jit_insn_return_reg(jit_function_t, jit_value_t, int);
int jit_insn_setup_for_nested(jit_function_t, int, int);
int jit_insn_flush_struct(jit_function_t, jit_value_t);
jit_value_t jit_insn_import(jit_function_t, jit_value_t);
int jit_insn_push(jit_function_t, jit_value_t);
int jit_insn_push_ptr(jit_function_t, jit_value_t, jit_type_t);
int jit_insn_set_param(jit_function_t, jit_value_t, jit_nint);
int jit_insn_set_param_ptr(jit_function_t, jit_value_t, jit_type_t, jit_nint);
int jit_insn_push_return_area_ptr(jit_function_t);
int jit_insn_pop_stack(jit_function_t, jit_nint);
int jit_insn_defer_pop_stack(jit_function_t, jit_nint);
int jit_insn_flush_defer_pop(jit_function_t, jit_nint);
int jit_insn_return(jit_function_t, jit_value_t);
int jit_insn_return_ptr(jit_function_t, jit_value_t, jit_type_t);
int jit_insn_default_return(jit_function_t);
int jit_insn_throw(jit_function_t, jit_value_t);
jit_value_t jit_insn_get_call_stack(jit_function_t);
jit_value_t jit_insn_thrown_exception(jit_function_t);
int jit_insn_uses_catcher(jit_function_t);
jit_value_t jit_insn_start_catcher(jit_function_t);
int jit_insn_branch_if_pc_not_in_range(jit_function_t, jit_label_t, jit_label_t, jit_label_t*);
int jit_insn_rethrow_unhandled(jit_function_t);
int jit_insn_start_finally(jit_function_t, jit_label_t*);
int jit_insn_return_from_finally(jit_function_t);
int jit_insn_call_finally(jit_function_t, jit_label_t*);
jit_value_t jit_insn_start_filter(jit_function_t, jit_label_t*, jit_type_t);
int jit_insn_return_from_filter(jit_function_t, jit_value_t);
jit_value_t jit_insn_call_filter(jit_function_t, jit_label_t*, jit_value_t, jit_type_t);
int jit_insn_memcpy(jit_function_t, jit_value_t, jit_value_t, jit_value_t);
int jit_insn_memmove(jit_function_t, jit_value_t, jit_value_t, jit_value_t);
int jit_insn_memset(jit_function_t, jit_value_t, jit_value_t, jit_value_t);
jit_value_t jit_insn_alloca(jit_function_t, jit_value_t);
int jit_insn_move_blocks_to_end(jit_function_t, jit_label_t, jit_label_t);
int jit_insn_move_blocks_to_start(jit_function_t, jit_label_t, jit_label_t);
int jit_insn_mark_offset(jit_function_t, jit_int);
int jit_insn_mark_breakpoint(jit_function_t, jit_nint, jit_nint);
int jit_insn_mark_breakpoint_variable(jit_function_t, jit_value_t, jit_value_t);
void jit_insn_iter_init(jit_insn_iter_t*, jit_block_t);
void jit_insn_iter_init_last(jit_insn_iter_t*, jit_block_t);
jit_insn_t jit_insn_iter_next(jit_insn_iter_t*);
jit_insn_t jit_insn_iter_previous(jit_insn_iter_t*);
jit_int jit_int_add(jit_int, jit_int);
jit_int jit_int_sub(jit_int, jit_int);
jit_int jit_int_mul(jit_int, jit_int);
jit_int jit_int_div(jit_int*, jit_int, jit_int);
jit_int jit_int_rem(jit_int*, jit_int, jit_int);
jit_int jit_int_add_ovf(jit_int*, jit_int, jit_int);
jit_int jit_int_sub_ovf(jit_int*, jit_int, jit_int);
jit_int jit_int_mul_ovf(jit_int*, jit_int, jit_int);
jit_int jit_int_neg(jit_int);
jit_int jit_int_and(jit_int, jit_int);
jit_int jit_int_or(jit_int, jit_int);
jit_int jit_int_xor(jit_int, jit_int);
jit_int jit_int_not(jit_int);
jit_int jit_int_shl(jit_int, jit_uint);
jit_int jit_int_shr(jit_int, jit_uint);
jit_int jit_int_eq(jit_int, jit_int);
jit_int jit_int_ne(jit_int, jit_int);
jit_int jit_int_lt(jit_int, jit_int);
jit_int jit_int_le(jit_int, jit_int);
jit_int jit_int_gt(jit_int, jit_int);
jit_int jit_int_ge(jit_int, jit_int);
jit_int jit_int_cmp(jit_int, jit_int);
jit_int jit_int_abs(jit_int);
jit_int jit_int_min(jit_int, jit_int);
jit_int jit_int_max(jit_int, jit_int);
jit_int jit_int_sign(jit_int);
jit_uint jit_uint_add(jit_uint, jit_uint);
jit_uint jit_uint_sub(jit_uint, jit_uint);
jit_uint jit_uint_mul(jit_uint, jit_uint);
jit_int jit_uint_div(jit_uint*, jit_uint, jit_uint);
jit_int jit_uint_rem(jit_uint*, jit_uint, jit_uint);
jit_int jit_uint_add_ovf(jit_uint*, jit_uint, jit_uint);
jit_int jit_uint_sub_ovf(jit_uint*, jit_uint, jit_uint);
jit_int jit_uint_mul_ovf(jit_uint*, jit_uint, jit_uint);
jit_uint jit_uint_neg(jit_uint);
jit_uint jit_uint_and(jit_uint, jit_uint);
jit_uint jit_uint_or(jit_uint, jit_uint);
jit_uint jit_uint_xor(jit_uint, jit_uint);
jit_uint jit_uint_not(jit_uint);
jit_uint jit_uint_shl(jit_uint, jit_uint);
jit_uint jit_uint_shr(jit_uint, jit_uint);
jit_int jit_uint_eq(jit_uint, jit_uint);
jit_int jit_uint_ne(jit_uint, jit_uint);
jit_int jit_uint_lt(jit_uint, jit_uint);
jit_int jit_uint_le(jit_uint, jit_uint);
jit_int jit_uint_gt(jit_uint, jit_uint);
jit_int jit_uint_ge(jit_uint, jit_uint);
jit_int jit_uint_cmp(jit_uint, jit_uint);
jit_uint jit_uint_min(jit_uint, jit_uint);
jit_uint jit_uint_max(jit_uint, jit_uint);
jit_long jit_long_add(jit_long, jit_long);
jit_long jit_long_sub(jit_long, jit_long);
jit_long jit_long_mul(jit_long, jit_long);
jit_int jit_long_div(jit_long*, jit_long, jit_long);
jit_int jit_long_rem(jit_long*, jit_long, jit_long);
jit_int jit_long_add_ovf(jit_long*, jit_long, jit_long);
jit_int jit_long_sub_ovf(jit_long*, jit_long, jit_long);
jit_int jit_long_mul_ovf(jit_long*, jit_long, jit_long);
jit_long jit_long_neg(jit_long);
jit_long jit_long_and(jit_long, jit_long);
jit_long jit_long_or(jit_long, jit_long);
jit_long jit_long_xor(jit_long, jit_long);
jit_long jit_long_not(jit_long);
jit_long jit_long_shl(jit_long, jit_uint);
jit_long jit_long_shr(jit_long, jit_uint);
jit_int jit_long_eq(jit_long, jit_long);
jit_int jit_long_ne(jit_long, jit_long);
jit_int jit_long_lt(jit_long, jit_long);
jit_int jit_long_le(jit_long, jit_long);
jit_int jit_long_gt(jit_long, jit_long);
jit_int jit_long_ge(jit_long, jit_long);
jit_int jit_long_cmp(jit_long, jit_long);
jit_long jit_long_abs(jit_long);
jit_long jit_long_min(jit_long, jit_long);
jit_long jit_long_max(jit_long, jit_long);
jit_int jit_long_sign(jit_long);
jit_ulong jit_ulong_add(jit_ulong, jit_ulong);
jit_ulong jit_ulong_sub(jit_ulong, jit_ulong);
jit_ulong jit_ulong_mul(jit_ulong, jit_ulong);
jit_int jit_ulong_div(jit_ulong*, jit_ulong, jit_ulong);
jit_int jit_ulong_rem(jit_ulong*, jit_ulong, jit_ulong);
jit_int jit_ulong_add_ovf(jit_ulong*, jit_ulong, jit_ulong);
jit_int jit_ulong_sub_ovf(jit_ulong*, jit_ulong, jit_ulong);
jit_int jit_ulong_mul_ovf(jit_ulong*, jit_ulong, jit_ulong);
jit_ulong jit_ulong_neg(jit_ulong);
jit_ulong jit_ulong_and(jit_ulong, jit_ulong);
jit_ulong jit_ulong_or(jit_ulong, jit_ulong);
jit_ulong jit_ulong_xor(jit_ulong, jit_ulong);
jit_ulong jit_ulong_not(jit_ulong);
jit_ulong jit_ulong_shl(jit_ulong, jit_uint);
jit_ulong jit_ulong_shr(jit_ulong, jit_uint);
jit_int jit_ulong_eq(jit_ulong, jit_ulong);
jit_int jit_ulong_ne(jit_ulong, jit_ulong);
jit_int jit_ulong_lt(jit_ulong, jit_ulong);
jit_int jit_ulong_le(jit_ulong, jit_ulong);
jit_int jit_ulong_gt(jit_ulong, jit_ulong);
jit_int jit_ulong_ge(jit_ulong, jit_ulong);
jit_int jit_ulong_cmp(jit_ulong, jit_ulong);
jit_ulong jit_ulong_min(jit_ulong, jit_ulong);
jit_ulong jit_ulong_max(jit_ulong, jit_ulong);
jit_float32 jit_float32_add(jit_float32, jit_float32);
jit_float32 jit_float32_sub(jit_float32, jit_float32);
jit_float32 jit_float32_mul(jit_float32, jit_float32);
jit_float32 jit_float32_div(jit_float32, jit_float32);
jit_float32 jit_float32_rem(jit_float32, jit_float32);
jit_float32 jit_float32_ieee_rem(jit_float32, jit_float32);
jit_float32 jit_float32_neg(jit_float32);
jit_int jit_float32_eq(jit_float32, jit_float32);
jit_int jit_float32_ne(jit_float32, jit_float32);
jit_int jit_float32_lt(jit_float32, jit_float32);
jit_int jit_float32_le(jit_float32, jit_float32);
jit_int jit_float32_gt(jit_float32, jit_float32);
jit_int jit_float32_ge(jit_float32, jit_float32);
jit_int jit_float32_cmpl(jit_float32, jit_float32);
jit_int jit_float32_cmpg(jit_float32, jit_float32);
jit_float32 jit_float32_acos(jit_float32);
jit_float32 jit_float32_asin(jit_float32);
jit_float32 jit_float32_atan(jit_float32);
jit_float32 jit_float32_atan2(jit_float32, jit_float32);
jit_float32 jit_float32_ceil(jit_float32);
jit_float32 jit_float32_cos(jit_float32);
jit_float32 jit_float32_cosh(jit_float32);
jit_float32 jit_float32_exp(jit_float32);
jit_float32 jit_float32_floor(jit_float32);
jit_float32 jit_float32_log(jit_float32);
jit_float32 jit_float32_log10(jit_float32);
jit_float32 jit_float32_pow(jit_float32, jit_float32);
jit_float32 jit_float32_rint(jit_float32);
jit_float32 jit_float32_round(jit_float32);
jit_float32 jit_float32_sin(jit_float32);
jit_float32 jit_float32_sinh(jit_float32);
jit_float32 jit_float32_sqrt(jit_float32);
jit_float32 jit_float32_tan(jit_float32);
jit_float32 jit_float32_tanh(jit_float32);
jit_float32 jit_float32_trunc(jit_float32);
jit_int jit_float32_is_finite(jit_float32);
jit_int jit_float32_is_nan(jit_float32);
jit_int jit_float32_is_inf(jit_float32);
jit_float32 jit_float32_abs(jit_float32);
jit_float32 jit_float32_min(jit_float32, jit_float32);
jit_float32 jit_float32_max(jit_float32, jit_float32);
jit_int jit_float32_sign(jit_float32);
jit_float64 jit_float64_add(jit_float64, jit_float64);
jit_float64 jit_float64_sub(jit_float64, jit_float64);
jit_float64 jit_float64_mul(jit_float64, jit_float64);
jit_float64 jit_float64_div(jit_float64, jit_float64);
jit_float64 jit_float64_rem(jit_float64, jit_float64);
jit_float64 jit_float64_ieee_rem(jit_float64, jit_float64);
jit_float64 jit_float64_neg(jit_float64);
jit_int jit_float64_eq(jit_float64, jit_float64);
jit_int jit_float64_ne(jit_float64, jit_float64);
jit_int jit_float64_lt(jit_float64, jit_float64);
jit_int jit_float64_le(jit_float64, jit_float64);
jit_int jit_float64_gt(jit_float64, jit_float64);
jit_int jit_float64_ge(jit_float64, jit_float64);
jit_int jit_float64_cmpl(jit_float64, jit_float64);
jit_int jit_float64_cmpg(jit_float64, jit_float64);
jit_float64 jit_float64_acos(jit_float64);
jit_float64 jit_float64_asin(jit_float64);
jit_float64 jit_float64_atan(jit_float64);
jit_float64 jit_float64_atan2(jit_float64, jit_float64);
jit_float64 jit_float64_ceil(jit_float64);
jit_float64 jit_float64_cos(jit_float64);
jit_float64 jit_float64_cosh(jit_float64);
jit_float64 jit_float64_exp(jit_float64);
jit_float64 jit_float64_floor(jit_float64);
jit_float64 jit_float64_log(jit_float64);
jit_float64 jit_float64_log10(jit_float64);
jit_float64 jit_float64_pow(jit_float64, jit_float64);
jit_float64 jit_float64_rint(jit_float64);
jit_float64 jit_float64_round(jit_float64);
jit_float64 jit_float64_sin(jit_float64);
jit_float64 jit_float64_sinh(jit_float64);
jit_float64 jit_float64_sqrt(jit_float64);
jit_float64 jit_float64_tan(jit_float64);
jit_float64 jit_float64_tanh(jit_float64);
jit_float64 jit_float64_trunc(jit_float64);
jit_int jit_float64_is_finite(jit_float64);
jit_int jit_float64_is_nan(jit_float64);
jit_int jit_float64_is_inf(jit_float64);
jit_float64 jit_float64_abs(jit_float64);
jit_float64 jit_float64_min(jit_float64, jit_float64);
jit_float64 jit_float64_max(jit_float64, jit_float64);
jit_int jit_float64_sign(jit_float64);
jit_nfloat jit_nfloat_add(jit_nfloat, jit_nfloat);
jit_nfloat jit_nfloat_sub(jit_nfloat, jit_nfloat);
jit_nfloat jit_nfloat_mul(jit_nfloat, jit_nfloat);
jit_nfloat jit_nfloat_div(jit_nfloat, jit_nfloat);
jit_nfloat jit_nfloat_rem(jit_nfloat, jit_nfloat);
jit_nfloat jit_nfloat_ieee_rem(jit_nfloat, jit_nfloat);
jit_nfloat jit_nfloat_neg(jit_nfloat);
jit_int jit_nfloat_eq(jit_nfloat, jit_nfloat);
jit_int jit_nfloat_ne(jit_nfloat, jit_nfloat);
jit_int jit_nfloat_lt(jit_nfloat, jit_nfloat);
jit_int jit_nfloat_le(jit_nfloat, jit_nfloat);
jit_int jit_nfloat_gt(jit_nfloat, jit_nfloat);
jit_int jit_nfloat_ge(jit_nfloat, jit_nfloat);
jit_int jit_nfloat_cmpl(jit_nfloat, jit_nfloat);
jit_int jit_nfloat_cmpg(jit_nfloat, jit_nfloat);
jit_nfloat jit_nfloat_acos(jit_nfloat);
jit_nfloat jit_nfloat_asin(jit_nfloat);
jit_nfloat jit_nfloat_atan(jit_nfloat);
jit_nfloat jit_nfloat_atan2(jit_nfloat, jit_nfloat);
jit_nfloat jit_nfloat_ceil(jit_nfloat);
jit_nfloat jit_nfloat_cos(jit_nfloat);
jit_nfloat jit_nfloat_cosh(jit_nfloat);
jit_nfloat jit_nfloat_exp(jit_nfloat);
jit_nfloat jit_nfloat_floor(jit_nfloat);
jit_nfloat jit_nfloat_log(jit_nfloat);
jit_nfloat jit_nfloat_log10(jit_nfloat);
jit_nfloat jit_nfloat_pow(jit_nfloat, jit_nfloat);
jit_nfloat jit_nfloat_rint(jit_nfloat);
jit_nfloat jit_nfloat_round(jit_nfloat);
jit_nfloat jit_nfloat_sin(jit_nfloat);
jit_nfloat jit_nfloat_sinh(jit_nfloat);
jit_nfloat jit_nfloat_sqrt(jit_nfloat);
jit_nfloat jit_nfloat_tan(jit_nfloat);
jit_nfloat jit_nfloat_tanh(jit_nfloat);
jit_nfloat jit_nfloat_trunc(jit_nfloat);
jit_int jit_nfloat_is_finite(jit_nfloat);
jit_int jit_nfloat_is_nan(jit_nfloat);
jit_int jit_nfloat_is_inf(jit_nfloat);
jit_nfloat jit_nfloat_abs(jit_nfloat);
jit_nfloat jit_nfloat_min(jit_nfloat, jit_nfloat);
jit_nfloat jit_nfloat_max(jit_nfloat, jit_nfloat);
jit_int jit_nfloat_sign(jit_nfloat);
jit_int jit_int_to_sbyte(jit_int);
jit_int jit_int_to_ubyte(jit_int);
jit_int jit_int_to_short(jit_int);
jit_int jit_int_to_ushort(jit_int);
jit_int jit_int_to_int(jit_int);
jit_uint jit_int_to_uint(jit_int);
jit_long jit_int_to_long(jit_int);
jit_ulong jit_int_to_ulong(jit_int);
jit_int jit_uint_to_int(jit_uint);
jit_uint jit_uint_to_uint(jit_uint);
jit_long jit_uint_to_long(jit_uint);
jit_ulong jit_uint_to_ulong(jit_uint);
jit_int jit_long_to_int(jit_long);
jit_uint jit_long_to_uint(jit_long);
jit_long jit_long_to_long(jit_long);
jit_ulong jit_long_to_ulong(jit_long);
jit_int jit_ulong_to_int(jit_ulong);
jit_uint jit_ulong_to_uint(jit_ulong);
jit_long jit_ulong_to_long(jit_ulong);
jit_ulong jit_ulong_to_ulong(jit_ulong);
jit_int jit_int_to_sbyte_ovf(jit_int*, jit_int);
jit_int jit_int_to_ubyte_ovf(jit_int*, jit_int);
jit_int jit_int_to_short_ovf(jit_int*, jit_int);
jit_int jit_int_to_ushort_ovf(jit_int*, jit_int);
jit_int jit_int_to_int_ovf(jit_int*, jit_int);
jit_int jit_int_to_uint_ovf(jit_uint*, jit_int);
jit_int jit_int_to_long_ovf(jit_long*, jit_int);
jit_int jit_int_to_ulong_ovf(jit_ulong*, jit_int);
jit_int jit_uint_to_int_ovf(jit_int*, jit_uint);
jit_int jit_uint_to_uint_ovf(jit_uint*, jit_uint);
jit_int jit_uint_to_long_ovf(jit_long*, jit_uint);
jit_int jit_uint_to_ulong_ovf(jit_ulong*, jit_uint);
jit_int jit_long_to_int_ovf(jit_int*, jit_long);
jit_int jit_long_to_uint_ovf(jit_uint*, jit_long);
jit_int jit_long_to_long_ovf(jit_long*, jit_long);
jit_int jit_long_to_ulong_ovf(jit_ulong*, jit_long);
jit_int jit_ulong_to_int_ovf(jit_int*, jit_ulong);
jit_int jit_ulong_to_uint_ovf(jit_uint*, jit_ulong);
jit_int jit_ulong_to_long_ovf(jit_long*, jit_ulong);
jit_int jit_ulong_to_ulong_ovf(jit_ulong*, jit_ulong);
jit_int jit_float32_to_int(jit_float32);
jit_uint jit_float32_to_uint(jit_float32);
jit_long jit_float32_to_long(jit_float32);
jit_ulong jit_float32_to_ulong(jit_float32);
jit_int jit_float32_to_int_ovf(jit_int*, jit_float32);
jit_int jit_float32_to_uint_ovf(jit_uint*, jit_float32);
jit_int jit_float32_to_long_ovf(jit_long*, jit_float32);
jit_int jit_float32_to_ulong_ovf(jit_ulong*, jit_float32);
jit_int jit_float64_to_int(jit_float64);
jit_uint jit_float64_to_uint(jit_float64);
jit_long jit_float64_to_long(jit_float64);
jit_ulong jit_float64_to_ulong(jit_float64);
jit_int jit_float64_to_int_ovf(jit_int*, jit_float64);
jit_int jit_float64_to_uint_ovf(jit_uint*, jit_float64);
jit_int jit_float64_to_long_ovf(jit_long*, jit_float64);
jit_int jit_float64_to_ulong_ovf(jit_ulong*, jit_float64);
jit_int jit_nfloat_to_int(jit_nfloat);
jit_uint jit_nfloat_to_uint(jit_nfloat);
jit_long jit_nfloat_to_long(jit_nfloat);
jit_ulong jit_nfloat_to_ulong(jit_nfloat);
jit_int jit_nfloat_to_int_ovf(jit_int*, jit_nfloat);
jit_int jit_nfloat_to_uint_ovf(jit_uint*, jit_nfloat);
jit_int jit_nfloat_to_long_ovf(jit_long*, jit_nfloat);
jit_int jit_nfloat_to_ulong_ovf(jit_ulong*, jit_nfloat);
jit_float32 jit_int_to_float32(jit_int);
jit_float64 jit_int_to_float64(jit_int);
jit_nfloat jit_int_to_nfloat(jit_int);
jit_float32 jit_uint_to_float32(jit_uint);
jit_float64 jit_uint_to_float64(jit_uint);
jit_nfloat jit_uint_to_nfloat(jit_uint);
jit_float32 jit_long_to_float32(jit_long);
jit_float64 jit_long_to_float64(jit_long);
jit_nfloat jit_long_to_nfloat(jit_long);
jit_float32 jit_ulong_to_float32(jit_ulong);
jit_float64 jit_ulong_to_float64(jit_ulong);
jit_nfloat jit_ulong_to_nfloat(jit_ulong);
jit_float64 jit_float32_to_float64(jit_float32);
jit_nfloat jit_float32_to_nfloat(jit_float32);
jit_float32 jit_float64_to_float32(jit_float64);
jit_nfloat jit_float64_to_nfloat(jit_float64);
jit_float32 jit_nfloat_to_float32(jit_nfloat);
jit_float64 jit_nfloat_to_float64(jit_nfloat);
typedef struct _jit_meta* jit_meta_t;
int jit_meta_set(jit_meta_t*, int, void*, jit_meta_free_func, jit_function_t);
void* jit_meta_get(jit_meta_t, int);
void jit_meta_free(jit_meta_t*, int);
void jit_meta_destroy(jit_meta_t*);
typedef struct jit_objmodel* jit_objmodel_t;
typedef struct jitom_class* jitom_class_t;
typedef struct jitom_field* jitom_field_t;
typedef struct jitom_method* jitom_method_t;
void jitom_destroy_model(jit_objmodel_t);
jitom_class_t jitom_get_class_by_name(jit_objmodel_t, char*);
char* jitom_class_get_name(jit_objmodel_t, jitom_class_t);
int jitom_class_get_modifiers(jit_objmodel_t, jitom_class_t);
jit_type_t jitom_class_get_type(jit_objmodel_t, jitom_class_t);
jit_type_t jitom_class_get_value_type(jit_objmodel_t, jitom_class_t);
jitom_class_t jitom_class_get_primary_super(jit_objmodel_t, jitom_class_t);
jitom_class_t* jitom_class_get_all_supers(jit_objmodel_t, jitom_class_t, unsigned int*);
jitom_class_t* jitom_class_get_interfaces(jit_objmodel_t, jitom_class_t, unsigned int*);
jitom_field_t* jitom_class_get_fields(jit_objmodel_t, jitom_class_t, unsigned int*);
jitom_method_t* jitom_class_get_methods(jit_objmodel_t, jitom_class_t, unsigned int*);
jit_value_t jitom_class_new(jit_objmodel_t, jitom_class_t, jitom_method_t, jit_function_t, jit_value_t*, unsigned int, int);
jit_value_t jitom_class_new_value(jit_objmodel_t, jitom_class_t, jitom_method_t, jit_function_t, jit_value_t*, unsigned int, int);
int jitom_class_delete(jit_objmodel_t, jitom_class_t, jit_value_t);
int jitom_class_add_ref(jit_objmodel_t, jitom_class_t, jit_value_t);
char* jitom_field_get_name(jit_objmodel_t, jitom_class_t, jitom_field_t);
jit_type_t jitom_field_get_type(jit_objmodel_t, jitom_class_t, jitom_field_t);
int jitom_field_get_modifiers(jit_objmodel_t, jitom_class_t, jitom_field_t);
jit_value_t jitom_field_load(jit_objmodel_t, jitom_class_t, jitom_field_t, jit_function_t, jit_value_t);
jit_value_t jitom_field_load_address(jit_objmodel_t, jitom_class_t, jitom_field_t, jit_function_t, jit_value_t);
int jitom_field_store(jit_objmodel_t, jitom_class_t, jitom_field_t, jit_function_t, jit_value_t, jit_value_t);
char* jitom_method_get_name(jit_objmodel_t, jitom_class_t, jitom_method_t);
jit_type_t jitom_method_get_type(jit_objmodel_t, jitom_class_t, jitom_method_t);
int jitom_method_get_modifiers(jit_objmodel_t, jitom_class_t, jitom_method_t);
jit_value_t jitom_method_invoke(jit_objmodel_t, jitom_class_t, jitom_method_t, jit_function_t, jit_value_t*, unsigned int, int);
jit_value_t jitom_method_invoke_virtual(jit_objmodel_t, jitom_class_t, jitom_method_t, jit_function_t, jit_value_t*, unsigned int, int);
jit_type_t jitom_type_tag_as_class(jit_type_t, jit_objmodel_t, jitom_class_t, int);
jit_type_t jitom_type_tag_as_value(jit_type_t, jit_objmodel_t, jitom_class_t, int);
int jitom_type_is_class(jit_type_t);
int jitom_type_is_value(jit_type_t);
jit_objmodel_t jitom_type_get_model(jit_type_t);
jitom_class_t jitom_type_get_class(jit_type_t);
typedef struct jit_opcode_info jit_opcode_info_t;
struct jit_opcode_info {
  char* name;
  int flags;
};
jit_opcode_info_t jit_opcodes[0x01B7];
typedef struct _jit_arch_frame _jit_arch_frame_t;
struct _jit_arch_frame {
  _jit_arch_frame_t* next_frame;
  void* return_address;
};
typedef struct {
  void* frame;
  void* cache;
  jit_context_t context;
} jit_unwind_context_t;
int jit_unwind_init(jit_unwind_context_t*, jit_context_t);
void jit_unwind_free(jit_unwind_context_t*);
int jit_unwind_next(jit_unwind_context_t*);
int jit_unwind_next_pc(jit_unwind_context_t*);
void* jit_unwind_get_pc(jit_unwind_context_t*);
int jit_unwind_jump(jit_unwind_context_t*, void*);
jit_function_t jit_unwind_get_function(jit_unwind_context_t*);
unsigned int jit_unwind_get_offset(jit_unwind_context_t*);
void* jit_malloc(unsigned int);
void* jit_calloc(unsigned int, unsigned int);
void* jit_realloc(void*, unsigned int);
void jit_free(void*);
void* jit_memset(void*, int, unsigned int);
void* jit_memcpy(void*, void*, unsigned int);
void* jit_memmove(void*, void*, unsigned int);
int jit_memcmp(void*, void*, unsigned int);
void* jit_memchr(void*, int, unsigned int);
unsigned int jit_strlen(char*);
char* jit_strcpy(char*, char*);
char* jit_strcat(char*, char*);
char* jit_strncpy(char*, char*, unsigned int);
char* jit_strdup(char*);
char* jit_strndup(char*, unsigned int);
int jit_strcmp(char*, char*);
int jit_strncmp(char*, char*, unsigned int);
int jit_stricmp(char*, char*);
int jit_strnicmp(char*, char*, unsigned int);
char* jit_strchr(char*, int);
char* jit_strrchr(char*, int);
int jit_sprintf(char*, char*, ...);
int jit_snprintf(char*, unsigned int, char*, ...);
typedef struct {
  jit_type_t type;
  union {
    void* ptr_value;
    jit_int int_value;
    jit_uint uint_value;
    jit_nint nint_value;
    jit_nuint nuint_value;
    jit_long long_value;
    jit_ulong ulong_value;
    jit_float32 float32_value;
    jit_float64 float64_value;
    jit_nfloat nfloat_value;
  } un;
} jit_constant_t;
jit_value_t jit_value_create(jit_function_t, jit_type_t);
jit_value_t jit_value_create_nint_constant(jit_function_t, jit_type_t, jit_nint);
jit_value_t jit_value_create_long_constant(jit_function_t, jit_type_t, jit_long);
jit_value_t jit_value_create_float32_constant(jit_function_t, jit_type_t, jit_float32);
jit_value_t jit_value_create_float64_constant(jit_function_t, jit_type_t, jit_float64);
jit_value_t jit_value_create_nfloat_constant(jit_function_t, jit_type_t, jit_nfloat);
jit_value_t jit_value_create_constant(jit_function_t, jit_constant_t*);
jit_value_t jit_value_get_param(jit_function_t, unsigned int);
jit_value_t jit_value_get_struct_pointer(jit_function_t);
int jit_value_is_temporary(jit_value_t);
int jit_value_is_local(jit_value_t);
int jit_value_is_constant(jit_value_t);
int jit_value_is_parameter(jit_value_t);
void jit_value_ref(jit_function_t, jit_value_t);
void jit_value_set_volatile(jit_value_t);
int jit_value_is_volatile(jit_value_t);
void jit_value_set_addressable(jit_value_t);
int jit_value_is_addressable(jit_value_t);
jit_type_t jit_value_get_type(jit_value_t);
jit_function_t jit_value_get_function(jit_value_t);
jit_block_t jit_value_get_block(jit_value_t);
jit_context_t jit_value_get_context(jit_value_t);
jit_constant_t jit_value_get_constant(jit_value_t);
jit_nint jit_value_get_nint_constant(jit_value_t);
jit_long jit_value_get_long_constant(jit_value_t);
jit_float32 jit_value_get_float32_constant(jit_value_t);
jit_float64 jit_value_get_float64_constant(jit_value_t);
jit_nfloat jit_value_get_nfloat_constant(jit_value_t);
int jit_value_is_true(jit_value_t);
int jit_constant_convert(jit_constant_t*, jit_constant_t*, jit_type_t, int);
typedef enum {
  JIT_PROT_NONE,
  JIT_PROT_READ,
  JIT_PROT_READ_WRITE,
  JIT_PROT_EXEC_READ,
  JIT_PROT_EXEC_READ_WRITE,
} jit_prot_t;
void jit_vmem_init(void);
jit_uint jit_vmem_page_size(void);
jit_nuint jit_vmem_round_up(jit_nuint);
jit_nuint jit_vmem_round_down(jit_nuint);
void* jit_vmem_reserve(jit_uint);
void* jit_vmem_reserve_committed(jit_uint, jit_prot_t);
int jit_vmem_release(void*, jit_uint);
int jit_vmem_commit(void*, jit_uint, jit_prot_t);
int jit_vmem_decommit(void*, jit_uint);
int jit_vmem_protect(void*, jit_uint, jit_prot_t);
void* _jit_get_frame_address(void*, unsigned int);
void* _jit_get_next_frame_address(void*);
void* _jit_get_return_address(void*, void*, void*);
typedef struct {
  volatile void* mark;
} jit_crawl_mark_t;
int jit_frame_contains_crawl_mark(void*, jit_crawl_mark_t*);
';
    private FFI $ffi;
    public function __construct() {
        $this->ffi = FFI::cdef(self::HEADER_DEF, self::SOFILE);
    }
    
    public function cast(ilibjit $from, string $to): ilibjit {
        if (!is_a($to, ilibjit::class)) {
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
        if (is_object($classOrObject) && $classOrObject instanceof ilibjit) {
            return $this->ffi->sizeof($classOrObject->getData());
        } elseif (is_a($classOrObject, ilibjit::class)) {
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
            case 'jit_type_void': $tmp = $this->ffi->jit_type_void; return $tmp === null ? null : new jit_type_t($tmp);
            case 'jit_type_sbyte': $tmp = $this->ffi->jit_type_sbyte; return $tmp === null ? null : new jit_type_t($tmp);
            case 'jit_type_ubyte': $tmp = $this->ffi->jit_type_ubyte; return $tmp === null ? null : new jit_type_t($tmp);
            case 'jit_type_short': $tmp = $this->ffi->jit_type_short; return $tmp === null ? null : new jit_type_t($tmp);
            case 'jit_type_ushort': $tmp = $this->ffi->jit_type_ushort; return $tmp === null ? null : new jit_type_t($tmp);
            case 'jit_type_int': $tmp = $this->ffi->jit_type_int; return $tmp === null ? null : new jit_type_t($tmp);
            case 'jit_type_uint': $tmp = $this->ffi->jit_type_uint; return $tmp === null ? null : new jit_type_t($tmp);
            case 'jit_type_nint': $tmp = $this->ffi->jit_type_nint; return $tmp === null ? null : new jit_type_t($tmp);
            case 'jit_type_nuint': $tmp = $this->ffi->jit_type_nuint; return $tmp === null ? null : new jit_type_t($tmp);
            case 'jit_type_long': $tmp = $this->ffi->jit_type_long; return $tmp === null ? null : new jit_type_t($tmp);
            case 'jit_type_ulong': $tmp = $this->ffi->jit_type_ulong; return $tmp === null ? null : new jit_type_t($tmp);
            case 'jit_type_float32': $tmp = $this->ffi->jit_type_float32; return $tmp === null ? null : new jit_type_t($tmp);
            case 'jit_type_float64': $tmp = $this->ffi->jit_type_float64; return $tmp === null ? null : new jit_type_t($tmp);
            case 'jit_type_nfloat': $tmp = $this->ffi->jit_type_nfloat; return $tmp === null ? null : new jit_type_t($tmp);
            case 'jit_type_void_ptr': $tmp = $this->ffi->jit_type_void_ptr; return $tmp === null ? null : new jit_type_t($tmp);
            case 'jit_type_sys_bool': $tmp = $this->ffi->jit_type_sys_bool; return $tmp === null ? null : new jit_type_t($tmp);
            case 'jit_type_sys_char': $tmp = $this->ffi->jit_type_sys_char; return $tmp === null ? null : new jit_type_t($tmp);
            case 'jit_type_sys_schar': $tmp = $this->ffi->jit_type_sys_schar; return $tmp === null ? null : new jit_type_t($tmp);
            case 'jit_type_sys_uchar': $tmp = $this->ffi->jit_type_sys_uchar; return $tmp === null ? null : new jit_type_t($tmp);
            case 'jit_type_sys_short': $tmp = $this->ffi->jit_type_sys_short; return $tmp === null ? null : new jit_type_t($tmp);
            case 'jit_type_sys_ushort': $tmp = $this->ffi->jit_type_sys_ushort; return $tmp === null ? null : new jit_type_t($tmp);
            case 'jit_type_sys_int': $tmp = $this->ffi->jit_type_sys_int; return $tmp === null ? null : new jit_type_t($tmp);
            case 'jit_type_sys_uint': $tmp = $this->ffi->jit_type_sys_uint; return $tmp === null ? null : new jit_type_t($tmp);
            case 'jit_type_sys_long': $tmp = $this->ffi->jit_type_sys_long; return $tmp === null ? null : new jit_type_t($tmp);
            case 'jit_type_sys_ulong': $tmp = $this->ffi->jit_type_sys_ulong; return $tmp === null ? null : new jit_type_t($tmp);
            case 'jit_type_sys_longlong': $tmp = $this->ffi->jit_type_sys_longlong; return $tmp === null ? null : new jit_type_t($tmp);
            case 'jit_type_sys_ulonglong': $tmp = $this->ffi->jit_type_sys_ulonglong; return $tmp === null ? null : new jit_type_t($tmp);
            case 'jit_type_sys_float': $tmp = $this->ffi->jit_type_sys_float; return $tmp === null ? null : new jit_type_t($tmp);
            case 'jit_type_sys_double': $tmp = $this->ffi->jit_type_sys_double; return $tmp === null ? null : new jit_type_t($tmp);
            case 'jit_type_sys_long_double': $tmp = $this->ffi->jit_type_sys_long_double; return $tmp === null ? null : new jit_type_t($tmp);
            case 'jit_opcodes': return $this->ffi->jit_opcodes;
            default: return $this->ffi->$name;
        }
    }
    const JIT_TYPETAG_CONST = 10004;
    const JIT_TYPETAG_VOLATILE = 10005;
    public function jit_default_memory_manager(): ?jit_memory_manager_t {
        $result = $this->ffi->jit_default_memory_manager();
        return $result === null ? null : new jit_memory_manager_t($result);
    }
    public function jit_context_create(): ?jit_context_t {
        $result = $this->ffi->jit_context_create();
        return $result === null ? null : new jit_context_t($result);
    }
    public function jit_context_destroy(?jit_context_t $p0): void {
        $this->ffi->jit_context_destroy($p0 === null ? null : $p0->getData());
    }
    public function jit_context_build_start(?jit_context_t $p0): void {
        $this->ffi->jit_context_build_start($p0 === null ? null : $p0->getData());
    }
    public function jit_context_build_end(?jit_context_t $p0): void {
        $this->ffi->jit_context_build_end($p0 === null ? null : $p0->getData());
    }
    public function jit_context_set_on_demand_driver(?jit_context_t $p0, ?jit_on_demand_driver_func $p1): void {
        $this->ffi->jit_context_set_on_demand_driver($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
    }
    public function jit_context_set_memory_manager(?jit_context_t $p0, ?jit_memory_manager_t $p1): void {
        $this->ffi->jit_context_set_memory_manager($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
    }
    public function jit_context_set_meta(?jit_context_t $p0, ?int $p1, ?void_ptr $p2, ?jit_meta_free_func $p3): ?int {
        $result = $this->ffi->jit_context_set_meta($p0 === null ? null : $p0->getData(), $p1, $p2 === null ? null : $p2->getData(), $p3 === null ? null : $p3->getData());
        return $result;
    }
    public function jit_context_set_meta_numeric(?jit_context_t $p0, ?int $p1, ?jit_nuint $p2): ?int {
        $result = $this->ffi->jit_context_set_meta_numeric($p0 === null ? null : $p0->getData(), $p1, $p2 === null ? null : $p2->getData());
        return $result;
    }
    public function jit_context_get_meta(?jit_context_t $p0, ?int $p1): ?void_ptr {
        $result = $this->ffi->jit_context_get_meta($p0 === null ? null : $p0->getData(), $p1);
        return $result === null ? null : new void_ptr($result);
    }
    public function jit_context_get_meta_numeric(?jit_context_t $p0, ?int $p1): ?jit_nuint {
        $result = $this->ffi->jit_context_get_meta_numeric($p0 === null ? null : $p0->getData(), $p1);
        return $result === null ? null : new jit_nuint($result);
    }
    public function jit_context_free_meta(?jit_context_t $p0, ?int $p1): void {
        $this->ffi->jit_context_free_meta($p0 === null ? null : $p0->getData(), $p1);
    }
    public function jit_type_copy(?jit_type_t $p0): ?jit_type_t {
        $result = $this->ffi->jit_type_copy($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_type_t($result);
    }
    public function jit_type_free(?jit_type_t $p0): void {
        $this->ffi->jit_type_free($p0 === null ? null : $p0->getData());
    }
    public function jit_type_create_struct(?jit_type_t_ptr $p0, ?int $p1, ?int $p2): ?jit_type_t {
        $result = $this->ffi->jit_type_create_struct($p0 === null ? null : $p0->getData(), $p1, $p2);
        return $result === null ? null : new jit_type_t($result);
    }
    public function jit_type_create_union(?jit_type_t_ptr $p0, ?int $p1, ?int $p2): ?jit_type_t {
        $result = $this->ffi->jit_type_create_union($p0 === null ? null : $p0->getData(), $p1, $p2);
        return $result === null ? null : new jit_type_t($result);
    }
    public function jit_type_create_signature(?jit_abi_t $p0, ?jit_type_t $p1, ?jit_type_t_ptr $p2, ?int $p3, ?int $p4): ?jit_type_t {
        $result = $this->ffi->jit_type_create_signature($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData(), $p3, $p4);
        return $result === null ? null : new jit_type_t($result);
    }
    public function jit_type_create_pointer(?jit_type_t $p0, ?int $p1): ?jit_type_t {
        $result = $this->ffi->jit_type_create_pointer($p0 === null ? null : $p0->getData(), $p1);
        return $result === null ? null : new jit_type_t($result);
    }
    public function jit_type_create_tagged(?jit_type_t $p0, ?int $p1, ?void_ptr $p2, ?jit_meta_free_func $p3, ?int $p4): ?jit_type_t {
        $result = $this->ffi->jit_type_create_tagged($p0 === null ? null : $p0->getData(), $p1, $p2 === null ? null : $p2->getData(), $p3 === null ? null : $p3->getData(), $p4);
        return $result === null ? null : new jit_type_t($result);
    }
    public function jit_type_set_names(?jit_type_t $p0, ?string_ptr $p1, ?int $p2): ?int {
        $result = $this->ffi->jit_type_set_names($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2);
        return $result;
    }
    public function jit_type_set_size_and_alignment(?jit_type_t $p0, ?jit_nint $p1, ?jit_nint $p2): void {
        $this->ffi->jit_type_set_size_and_alignment($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
    }
    public function jit_type_set_offset(?jit_type_t $p0, ?int $p1, ?jit_nuint $p2): void {
        $this->ffi->jit_type_set_offset($p0 === null ? null : $p0->getData(), $p1, $p2 === null ? null : $p2->getData());
    }
    public function jit_type_get_kind(?jit_type_t $p0): ?int {
        $result = $this->ffi->jit_type_get_kind($p0 === null ? null : $p0->getData());
        return $result;
    }
    public function jit_type_get_size(?jit_type_t $p0): ?jit_nuint {
        $result = $this->ffi->jit_type_get_size($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_nuint($result);
    }
    public function jit_type_get_alignment(?jit_type_t $p0): ?jit_nuint {
        $result = $this->ffi->jit_type_get_alignment($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_nuint($result);
    }
    public function jit_type_best_alignment(): ?jit_nuint {
        $result = $this->ffi->jit_type_best_alignment();
        return $result === null ? null : new jit_nuint($result);
    }
    public function jit_type_num_fields(?jit_type_t $p0): ?int {
        $result = $this->ffi->jit_type_num_fields($p0 === null ? null : $p0->getData());
        return $result;
    }
    public function jit_type_get_field(?jit_type_t $p0, ?int $p1): ?jit_type_t {
        $result = $this->ffi->jit_type_get_field($p0 === null ? null : $p0->getData(), $p1);
        return $result === null ? null : new jit_type_t($result);
    }
    public function jit_type_get_offset(?jit_type_t $p0, ?int $p1): ?jit_nuint {
        $result = $this->ffi->jit_type_get_offset($p0 === null ? null : $p0->getData(), $p1);
        return $result === null ? null : new jit_nuint($result);
    }
    public function jit_type_get_name(?jit_type_t $p0, ?int $p1): ?string {
        $result = $this->ffi->jit_type_get_name($p0 === null ? null : $p0->getData(), $p1);
        return $result;
    }
    public function jit_type_find_name(?jit_type_t $p0, ?string $p1): ?int {
        $result = $this->ffi->jit_type_find_name($p0 === null ? null : $p0->getData(), $p1);
        return $result;
    }
    public function jit_type_num_params(?jit_type_t $p0): ?int {
        $result = $this->ffi->jit_type_num_params($p0 === null ? null : $p0->getData());
        return $result;
    }
    public function jit_type_get_return(?jit_type_t $p0): ?jit_type_t {
        $result = $this->ffi->jit_type_get_return($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_type_t($result);
    }
    public function jit_type_get_param(?jit_type_t $p0, ?int $p1): ?jit_type_t {
        $result = $this->ffi->jit_type_get_param($p0 === null ? null : $p0->getData(), $p1);
        return $result === null ? null : new jit_type_t($result);
    }
    public function jit_type_get_abi(?jit_type_t $p0): ?jit_abi_t {
        $result = $this->ffi->jit_type_get_abi($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_abi_t($result);
    }
    public function jit_type_get_ref(?jit_type_t $p0): ?jit_type_t {
        $result = $this->ffi->jit_type_get_ref($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_type_t($result);
    }
    public function jit_type_get_tagged_type(?jit_type_t $p0): ?jit_type_t {
        $result = $this->ffi->jit_type_get_tagged_type($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_type_t($result);
    }
    public function jit_type_set_tagged_type(?jit_type_t $p0, ?jit_type_t $p1, ?int $p2): void {
        $this->ffi->jit_type_set_tagged_type($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2);
    }
    public function jit_type_get_tagged_kind(?jit_type_t $p0): ?int {
        $result = $this->ffi->jit_type_get_tagged_kind($p0 === null ? null : $p0->getData());
        return $result;
    }
    public function jit_type_get_tagged_data(?jit_type_t $p0): ?void_ptr {
        $result = $this->ffi->jit_type_get_tagged_data($p0 === null ? null : $p0->getData());
        return $result === null ? null : new void_ptr($result);
    }
    public function jit_type_set_tagged_data(?jit_type_t $p0, ?void_ptr $p1, ?jit_meta_free_func $p2): void {
        $this->ffi->jit_type_set_tagged_data($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
    }
    public function jit_type_is_primitive(?jit_type_t $p0): ?int {
        $result = $this->ffi->jit_type_is_primitive($p0 === null ? null : $p0->getData());
        return $result;
    }
    public function jit_type_is_struct(?jit_type_t $p0): ?int {
        $result = $this->ffi->jit_type_is_struct($p0 === null ? null : $p0->getData());
        return $result;
    }
    public function jit_type_is_union(?jit_type_t $p0): ?int {
        $result = $this->ffi->jit_type_is_union($p0 === null ? null : $p0->getData());
        return $result;
    }
    public function jit_type_is_signature(?jit_type_t $p0): ?int {
        $result = $this->ffi->jit_type_is_signature($p0 === null ? null : $p0->getData());
        return $result;
    }
    public function jit_type_is_pointer(?jit_type_t $p0): ?int {
        $result = $this->ffi->jit_type_is_pointer($p0 === null ? null : $p0->getData());
        return $result;
    }
    public function jit_type_is_tagged(?jit_type_t $p0): ?int {
        $result = $this->ffi->jit_type_is_tagged($p0 === null ? null : $p0->getData());
        return $result;
    }
    public function jit_type_remove_tags(?jit_type_t $p0): ?jit_type_t {
        $result = $this->ffi->jit_type_remove_tags($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_type_t($result);
    }
    public function jit_type_normalize(?jit_type_t $p0): ?jit_type_t {
        $result = $this->ffi->jit_type_normalize($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_type_t($result);
    }
    public function jit_type_promote_int(?jit_type_t $p0): ?jit_type_t {
        $result = $this->ffi->jit_type_promote_int($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_type_t($result);
    }
    public function jit_type_return_via_pointer(?jit_type_t $p0): ?int {
        $result = $this->ffi->jit_type_return_via_pointer($p0 === null ? null : $p0->getData());
        return $result;
    }
    public function jit_type_has_tag(?jit_type_t $p0, ?int $p1): ?int {
        $result = $this->ffi->jit_type_has_tag($p0 === null ? null : $p0->getData(), $p1);
        return $result;
    }
    public function jit_apply(?jit_type_t $p0, ?void_ptr $p1, ?void_ptr_ptr $p2, ?int $p3, ?void_ptr $p4): void {
        $this->ffi->jit_apply($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData(), $p3, $p4 === null ? null : $p4->getData());
    }
    public function jit_apply_raw(?jit_type_t $p0, ?void_ptr $p1, ?void_ptr $p2, ?void_ptr $p3): void {
        $this->ffi->jit_apply_raw($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData(), $p3 === null ? null : $p3->getData());
    }
    public function jit_raw_supported(?jit_type_t $p0): ?int {
        $result = $this->ffi->jit_raw_supported($p0 === null ? null : $p0->getData());
        return $result;
    }
    public function jit_closure_create(?jit_context_t $p0, ?jit_type_t $p1, ?jit_closure_func $p2, ?void_ptr $p3): ?void_ptr {
        $result = $this->ffi->jit_closure_create($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData(), $p3 === null ? null : $p3->getData());
        return $result === null ? null : new void_ptr($result);
    }
    public function jit_closure_va_get_nint(?jit_closure_va_list_t $p0): ?jit_nint {
        $result = $this->ffi->jit_closure_va_get_nint($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_nint($result);
    }
    public function jit_closure_va_get_nuint(?jit_closure_va_list_t $p0): ?jit_nuint {
        $result = $this->ffi->jit_closure_va_get_nuint($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_nuint($result);
    }
    public function jit_closure_va_get_long(?jit_closure_va_list_t $p0): ?jit_long {
        $result = $this->ffi->jit_closure_va_get_long($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_long($result);
    }
    public function jit_closure_va_get_ulong(?jit_closure_va_list_t $p0): ?jit_ulong {
        $result = $this->ffi->jit_closure_va_get_ulong($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_ulong($result);
    }
    public function jit_closure_va_get_float32(?jit_closure_va_list_t $p0): ?jit_float32 {
        $result = $this->ffi->jit_closure_va_get_float32($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_float32($result);
    }
    public function jit_closure_va_get_float64(?jit_closure_va_list_t $p0): ?jit_float64 {
        $result = $this->ffi->jit_closure_va_get_float64($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_float64($result);
    }
    public function jit_closure_va_get_nfloat(?jit_closure_va_list_t $p0): ?jit_nfloat {
        $result = $this->ffi->jit_closure_va_get_nfloat($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_nfloat($result);
    }
    public function jit_closure_va_get_ptr(?jit_closure_va_list_t $p0): ?void_ptr {
        $result = $this->ffi->jit_closure_va_get_ptr($p0 === null ? null : $p0->getData());
        return $result === null ? null : new void_ptr($result);
    }
    public function jit_closure_va_get_struct(?jit_closure_va_list_t $p0, ?void_ptr $p1, ?jit_type_t $p2): void {
        $this->ffi->jit_closure_va_get_struct($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
    }
    public function jit_block_get_function(?jit_block_t $p0): ?jit_function_t {
        $result = $this->ffi->jit_block_get_function($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_function_t($result);
    }
    public function jit_block_get_context(?jit_block_t $p0): ?jit_context_t {
        $result = $this->ffi->jit_block_get_context($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_context_t($result);
    }
    public function jit_block_get_label(?jit_block_t $p0): ?jit_label_t {
        $result = $this->ffi->jit_block_get_label($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_label_t($result);
    }
    public function jit_block_get_next_label(?jit_block_t $p0, ?jit_label_t $p1): ?jit_label_t {
        $result = $this->ffi->jit_block_get_next_label($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_label_t($result);
    }
    public function jit_block_next(?jit_function_t $p0, ?jit_block_t $p1): ?jit_block_t {
        $result = $this->ffi->jit_block_next($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_block_t($result);
    }
    public function jit_block_previous(?jit_function_t $p0, ?jit_block_t $p1): ?jit_block_t {
        $result = $this->ffi->jit_block_previous($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_block_t($result);
    }
    public function jit_block_from_label(?jit_function_t $p0, ?jit_label_t $p1): ?jit_block_t {
        $result = $this->ffi->jit_block_from_label($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_block_t($result);
    }
    public function jit_block_set_meta(?jit_block_t $p0, ?int $p1, ?void_ptr $p2, ?jit_meta_free_func $p3): ?int {
        $result = $this->ffi->jit_block_set_meta($p0 === null ? null : $p0->getData(), $p1, $p2 === null ? null : $p2->getData(), $p3 === null ? null : $p3->getData());
        return $result;
    }
    public function jit_block_get_meta(?jit_block_t $p0, ?int $p1): ?void_ptr {
        $result = $this->ffi->jit_block_get_meta($p0 === null ? null : $p0->getData(), $p1);
        return $result === null ? null : new void_ptr($result);
    }
    public function jit_block_free_meta(?jit_block_t $p0, ?int $p1): void {
        $this->ffi->jit_block_free_meta($p0 === null ? null : $p0->getData(), $p1);
    }
    public function jit_block_is_reachable(?jit_block_t $p0): ?int {
        $result = $this->ffi->jit_block_is_reachable($p0 === null ? null : $p0->getData());
        return $result;
    }
    public function jit_block_ends_in_dead(?jit_block_t $p0): ?int {
        $result = $this->ffi->jit_block_ends_in_dead($p0 === null ? null : $p0->getData());
        return $result;
    }
    public function jit_block_current_is_dead(?jit_function_t $p0): ?int {
        $result = $this->ffi->jit_block_current_is_dead($p0 === null ? null : $p0->getData());
        return $result;
    }
    public function jit_debugging_possible(): ?int {
        $result = $this->ffi->jit_debugging_possible();
        return $result;
    }
    public function jit_debugger_create(?jit_context_t $p0): ?jit_debugger_t {
        $result = $this->ffi->jit_debugger_create($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_debugger_t($result);
    }
    public function jit_debugger_destroy(?jit_debugger_t $p0): void {
        $this->ffi->jit_debugger_destroy($p0 === null ? null : $p0->getData());
    }
    public function jit_debugger_get_context(?jit_debugger_t $p0): ?jit_context_t {
        $result = $this->ffi->jit_debugger_get_context($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_context_t($result);
    }
    public function jit_debugger_from_context(?jit_context_t $p0): ?jit_debugger_t {
        $result = $this->ffi->jit_debugger_from_context($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_debugger_t($result);
    }
    public function jit_debugger_get_self(?jit_debugger_t $p0): ?jit_debugger_thread_id_t {
        $result = $this->ffi->jit_debugger_get_self($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_debugger_thread_id_t($result);
    }
    public function jit_debugger_get_thread(?jit_debugger_t $p0, ?void_ptr $p1): ?jit_debugger_thread_id_t {
        $result = $this->ffi->jit_debugger_get_thread($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_debugger_thread_id_t($result);
    }
    public function jit_debugger_get_native_thread(?jit_debugger_t $p0, ?jit_debugger_thread_id_t $p1, ?void_ptr $p2): ?int {
        $result = $this->ffi->jit_debugger_get_native_thread($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result;
    }
    public function jit_debugger_set_breakable(?jit_debugger_t $p0, ?void_ptr $p1, ?int $p2): void {
        $this->ffi->jit_debugger_set_breakable($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2);
    }
    public function jit_debugger_attach_self(?jit_debugger_t $p0, ?int $p1): void {
        $this->ffi->jit_debugger_attach_self($p0 === null ? null : $p0->getData(), $p1);
    }
    public function jit_debugger_detach_self(?jit_debugger_t $p0): void {
        $this->ffi->jit_debugger_detach_self($p0 === null ? null : $p0->getData());
    }
    public function jit_debugger_wait_event(?jit_debugger_t $p0, ?jit_debugger_event_t_ptr $p1, ?jit_int $p2): ?int {
        $result = $this->ffi->jit_debugger_wait_event($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result;
    }
    public function jit_debugger_add_breakpoint(?jit_debugger_t $p0, ?jit_debugger_breakpoint_info_t $p1): ?jit_debugger_breakpoint_id_t {
        $result = $this->ffi->jit_debugger_add_breakpoint($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_debugger_breakpoint_id_t($result);
    }
    public function jit_debugger_remove_breakpoint(?jit_debugger_t $p0, ?jit_debugger_breakpoint_id_t $p1): void {
        $this->ffi->jit_debugger_remove_breakpoint($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
    }
    public function jit_debugger_remove_all_breakpoints(?jit_debugger_t $p0): void {
        $this->ffi->jit_debugger_remove_all_breakpoints($p0 === null ? null : $p0->getData());
    }
    public function jit_debugger_is_alive(?jit_debugger_t $p0, ?jit_debugger_thread_id_t $p1): ?int {
        $result = $this->ffi->jit_debugger_is_alive($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result;
    }
    public function jit_debugger_is_running(?jit_debugger_t $p0, ?jit_debugger_thread_id_t $p1): ?int {
        $result = $this->ffi->jit_debugger_is_running($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result;
    }
    public function jit_debugger_run(?jit_debugger_t $p0, ?jit_debugger_thread_id_t $p1): void {
        $this->ffi->jit_debugger_run($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
    }
    public function jit_debugger_step(?jit_debugger_t $p0, ?jit_debugger_thread_id_t $p1): void {
        $this->ffi->jit_debugger_step($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
    }
    public function jit_debugger_next(?jit_debugger_t $p0, ?jit_debugger_thread_id_t $p1): void {
        $this->ffi->jit_debugger_next($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
    }
    public function jit_debugger_finish(?jit_debugger_t $p0, ?jit_debugger_thread_id_t $p1): void {
        $this->ffi->jit_debugger_finish($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
    }
    public function jit_debugger_break(?jit_debugger_t $p0): void {
        $this->ffi->jit_debugger_break($p0 === null ? null : $p0->getData());
    }
    public function jit_debugger_quit(?jit_debugger_t $p0): void {
        $this->ffi->jit_debugger_quit($p0 === null ? null : $p0->getData());
    }
    public function jit_debugger_set_hook(?jit_context_t $p0, ?jit_debugger_hook_func $p1): ?jit_debugger_hook_func {
        $result = $this->ffi->jit_debugger_set_hook($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_debugger_hook_func($result);
    }
    public function jit_readelf_open(?jit_readelf_t_ptr $p0, ?string $p1, ?int $p2): ?int {
        $result = $this->ffi->jit_readelf_open($p0 === null ? null : $p0->getData(), $p1, $p2);
        return $result;
    }
    public function jit_readelf_close(?jit_readelf_t $p0): void {
        $this->ffi->jit_readelf_close($p0 === null ? null : $p0->getData());
    }
    public function jit_readelf_get_name(?jit_readelf_t $p0): ?string {
        $result = $this->ffi->jit_readelf_get_name($p0 === null ? null : $p0->getData());
        return $result;
    }
    public function jit_readelf_get_symbol(?jit_readelf_t $p0, ?string $p1): ?void_ptr {
        $result = $this->ffi->jit_readelf_get_symbol($p0 === null ? null : $p0->getData(), $p1);
        return $result === null ? null : new void_ptr($result);
    }
    public function jit_readelf_get_section(?jit_readelf_t $p0, ?string $p1, ?jit_nuint_ptr $p2): ?void_ptr {
        $result = $this->ffi->jit_readelf_get_section($p0 === null ? null : $p0->getData(), $p1, $p2 === null ? null : $p2->getData());
        return $result === null ? null : new void_ptr($result);
    }
    public function jit_readelf_get_section_by_type(?jit_readelf_t $p0, ?jit_int $p1, ?jit_nuint_ptr $p2): ?void_ptr {
        $result = $this->ffi->jit_readelf_get_section_by_type($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result === null ? null : new void_ptr($result);
    }
    public function jit_readelf_map_vaddr(?jit_readelf_t $p0, ?jit_nuint $p1): ?void_ptr {
        $result = $this->ffi->jit_readelf_map_vaddr($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new void_ptr($result);
    }
    public function jit_readelf_num_needed(?jit_readelf_t $p0): ?int {
        $result = $this->ffi->jit_readelf_num_needed($p0 === null ? null : $p0->getData());
        return $result;
    }
    public function jit_readelf_get_needed(?jit_readelf_t $p0, ?int $p1): ?string {
        $result = $this->ffi->jit_readelf_get_needed($p0 === null ? null : $p0->getData(), $p1);
        return $result;
    }
    public function jit_readelf_add_to_context(?jit_readelf_t $p0, ?jit_context_t $p1): void {
        $this->ffi->jit_readelf_add_to_context($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
    }
    public function jit_readelf_resolve_all(?jit_context_t $p0, ?int $p1): ?int {
        $result = $this->ffi->jit_readelf_resolve_all($p0 === null ? null : $p0->getData(), $p1);
        return $result;
    }
    public function jit_readelf_register_symbol(?jit_context_t $p0, ?string $p1, ?void_ptr $p2, ?int $p3): ?int {
        $result = $this->ffi->jit_readelf_register_symbol($p0 === null ? null : $p0->getData(), $p1, $p2 === null ? null : $p2->getData(), $p3);
        return $result;
    }
    public function jit_writeelf_create(?string $p0): ?jit_writeelf_t {
        $result = $this->ffi->jit_writeelf_create($p0);
        return $result === null ? null : new jit_writeelf_t($result);
    }
    public function jit_writeelf_destroy(?jit_writeelf_t $p0): void {
        $this->ffi->jit_writeelf_destroy($p0 === null ? null : $p0->getData());
    }
    public function jit_writeelf_write(?jit_writeelf_t $p0, ?string $p1): ?int {
        $result = $this->ffi->jit_writeelf_write($p0 === null ? null : $p0->getData(), $p1);
        return $result;
    }
    public function jit_writeelf_add_function(?jit_writeelf_t $p0, ?jit_function_t $p1, ?string $p2): ?int {
        $result = $this->ffi->jit_writeelf_add_function($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2);
        return $result;
    }
    public function jit_writeelf_add_needed(?jit_writeelf_t $p0, ?string $p1): ?int {
        $result = $this->ffi->jit_writeelf_add_needed($p0 === null ? null : $p0->getData(), $p1);
        return $result;
    }
    public function jit_writeelf_write_section(?jit_writeelf_t $p0, ?string $p1, ?jit_int $p2, ?void_ptr $p3, ?int $p4, ?int $p5): ?int {
        $result = $this->ffi->jit_writeelf_write_section($p0 === null ? null : $p0->getData(), $p1, $p2 === null ? null : $p2->getData(), $p3 === null ? null : $p3->getData(), $p4, $p5);
        return $result;
    }
    public function jit_exception_get_last(): ?void_ptr {
        $result = $this->ffi->jit_exception_get_last();
        return $result === null ? null : new void_ptr($result);
    }
    public function jit_exception_get_last_and_clear(): ?void_ptr {
        $result = $this->ffi->jit_exception_get_last_and_clear();
        return $result === null ? null : new void_ptr($result);
    }
    public function jit_exception_set_last(?void_ptr $p0): void {
        $this->ffi->jit_exception_set_last($p0 === null ? null : $p0->getData());
    }
    public function jit_exception_clear_last(): void {
        $this->ffi->jit_exception_clear_last();
    }
    public function jit_exception_throw(?void_ptr $p0): void {
        $this->ffi->jit_exception_throw($p0 === null ? null : $p0->getData());
    }
    public function jit_exception_builtin(?int $p0): void {
        $this->ffi->jit_exception_builtin($p0);
    }
    public function jit_exception_set_handler(?jit_exception_func $p0): ?jit_exception_func {
        $result = $this->ffi->jit_exception_set_handler($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_exception_func($result);
    }
    public function jit_exception_get_handler(): ?jit_exception_func {
        $result = $this->ffi->jit_exception_get_handler();
        return $result === null ? null : new jit_exception_func($result);
    }
    public function jit_exception_get_stack_trace(): ?jit_stack_trace_t {
        $result = $this->ffi->jit_exception_get_stack_trace();
        return $result === null ? null : new jit_stack_trace_t($result);
    }
    public function jit_stack_trace_get_size(?jit_stack_trace_t $p0): ?int {
        $result = $this->ffi->jit_stack_trace_get_size($p0 === null ? null : $p0->getData());
        return $result;
    }
    public function jit_stack_trace_get_function(?jit_context_t $p0, ?jit_stack_trace_t $p1, ?int $p2): ?jit_function_t {
        $result = $this->ffi->jit_stack_trace_get_function($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2);
        return $result === null ? null : new jit_function_t($result);
    }
    public function jit_stack_trace_get_pc(?jit_stack_trace_t $p0, ?int $p1): ?void_ptr {
        $result = $this->ffi->jit_stack_trace_get_pc($p0 === null ? null : $p0->getData(), $p1);
        return $result === null ? null : new void_ptr($result);
    }
    public function jit_stack_trace_get_offset(?jit_context_t $p0, ?jit_stack_trace_t $p1, ?int $p2): ?int {
        $result = $this->ffi->jit_stack_trace_get_offset($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2);
        return $result;
    }
    public function jit_stack_trace_free(?jit_stack_trace_t $p0): void {
        $this->ffi->jit_stack_trace_free($p0 === null ? null : $p0->getData());
    }
    public function jit_function_create(?jit_context_t $p0, ?jit_type_t $p1): ?jit_function_t {
        $result = $this->ffi->jit_function_create($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_function_t($result);
    }
    public function jit_function_create_nested(?jit_context_t $p0, ?jit_type_t $p1, ?jit_function_t $p2): ?jit_function_t {
        $result = $this->ffi->jit_function_create_nested($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result === null ? null : new jit_function_t($result);
    }
    public function jit_function_abandon(?jit_function_t $p0): void {
        $this->ffi->jit_function_abandon($p0 === null ? null : $p0->getData());
    }
    public function jit_function_get_context(?jit_function_t $p0): ?jit_context_t {
        $result = $this->ffi->jit_function_get_context($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_context_t($result);
    }
    public function jit_function_get_signature(?jit_function_t $p0): ?jit_type_t {
        $result = $this->ffi->jit_function_get_signature($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_type_t($result);
    }
    public function jit_function_set_meta(?jit_function_t $p0, ?int $p1, ?void_ptr $p2, ?jit_meta_free_func $p3, ?int $p4): ?int {
        $result = $this->ffi->jit_function_set_meta($p0 === null ? null : $p0->getData(), $p1, $p2 === null ? null : $p2->getData(), $p3 === null ? null : $p3->getData(), $p4);
        return $result;
    }
    public function jit_function_get_meta(?jit_function_t $p0, ?int $p1): ?void_ptr {
        $result = $this->ffi->jit_function_get_meta($p0 === null ? null : $p0->getData(), $p1);
        return $result === null ? null : new void_ptr($result);
    }
    public function jit_function_free_meta(?jit_function_t $p0, ?int $p1): void {
        $this->ffi->jit_function_free_meta($p0 === null ? null : $p0->getData(), $p1);
    }
    public function jit_function_next(?jit_context_t $p0, ?jit_function_t $p1): ?jit_function_t {
        $result = $this->ffi->jit_function_next($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_function_t($result);
    }
    public function jit_function_previous(?jit_context_t $p0, ?jit_function_t $p1): ?jit_function_t {
        $result = $this->ffi->jit_function_previous($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_function_t($result);
    }
    public function jit_function_get_entry(?jit_function_t $p0): ?jit_block_t {
        $result = $this->ffi->jit_function_get_entry($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_block_t($result);
    }
    public function jit_function_get_current(?jit_function_t $p0): ?jit_block_t {
        $result = $this->ffi->jit_function_get_current($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_block_t($result);
    }
    public function jit_function_get_nested_parent(?jit_function_t $p0): ?jit_function_t {
        $result = $this->ffi->jit_function_get_nested_parent($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_function_t($result);
    }
    public function jit_function_compile(?jit_function_t $p0): ?int {
        $result = $this->ffi->jit_function_compile($p0 === null ? null : $p0->getData());
        return $result;
    }
    public function jit_function_is_compiled(?jit_function_t $p0): ?int {
        $result = $this->ffi->jit_function_is_compiled($p0 === null ? null : $p0->getData());
        return $result;
    }
    public function jit_function_set_recompilable(?jit_function_t $p0): void {
        $this->ffi->jit_function_set_recompilable($p0 === null ? null : $p0->getData());
    }
    public function jit_function_clear_recompilable(?jit_function_t $p0): void {
        $this->ffi->jit_function_clear_recompilable($p0 === null ? null : $p0->getData());
    }
    public function jit_function_is_recompilable(?jit_function_t $p0): ?int {
        $result = $this->ffi->jit_function_is_recompilable($p0 === null ? null : $p0->getData());
        return $result;
    }
    public function jit_function_compile_entry(?jit_function_t $p0, ?void_ptr_ptr $p1): ?int {
        $result = $this->ffi->jit_function_compile_entry($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result;
    }
    public function jit_function_setup_entry(?jit_function_t $p0, ?void_ptr $p1): void {
        $this->ffi->jit_function_setup_entry($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
    }
    public function jit_function_to_closure(?jit_function_t $p0): ?void_ptr {
        $result = $this->ffi->jit_function_to_closure($p0 === null ? null : $p0->getData());
        return $result === null ? null : new void_ptr($result);
    }
    public function jit_function_from_closure(?jit_context_t $p0, ?void_ptr $p1): ?jit_function_t {
        $result = $this->ffi->jit_function_from_closure($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_function_t($result);
    }
    public function jit_function_from_pc(?jit_context_t $p0, ?void_ptr $p1, ?void_ptr_ptr $p2): ?jit_function_t {
        $result = $this->ffi->jit_function_from_pc($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result === null ? null : new jit_function_t($result);
    }
    public function jit_function_to_vtable_pointer(?jit_function_t $p0): ?void_ptr {
        $result = $this->ffi->jit_function_to_vtable_pointer($p0 === null ? null : $p0->getData());
        return $result === null ? null : new void_ptr($result);
    }
    public function jit_function_from_vtable_pointer(?jit_context_t $p0, ?void_ptr $p1): ?jit_function_t {
        $result = $this->ffi->jit_function_from_vtable_pointer($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_function_t($result);
    }
    public function jit_function_set_on_demand_compiler(?jit_function_t $p0, ?jit_on_demand_func $p1): void {
        $this->ffi->jit_function_set_on_demand_compiler($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
    }
    public function jit_function_get_on_demand_compiler(?jit_function_t $p0): ?jit_on_demand_func {
        $result = $this->ffi->jit_function_get_on_demand_compiler($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_on_demand_func($result);
    }
    public function jit_function_apply(?jit_function_t $p0, ?void_ptr_ptr $p1, ?void_ptr $p2): ?int {
        $result = $this->ffi->jit_function_apply($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result;
    }
    public function jit_function_apply_vararg(?jit_function_t $p0, ?jit_type_t $p1, ?void_ptr_ptr $p2, ?void_ptr $p3): ?int {
        $result = $this->ffi->jit_function_apply_vararg($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData(), $p3 === null ? null : $p3->getData());
        return $result;
    }
    public function jit_function_set_optimization_level(?jit_function_t $p0, ?int $p1): void {
        $this->ffi->jit_function_set_optimization_level($p0 === null ? null : $p0->getData(), $p1);
    }
    public function jit_function_get_optimization_level(?jit_function_t $p0): ?int {
        $result = $this->ffi->jit_function_get_optimization_level($p0 === null ? null : $p0->getData());
        return $result;
    }
    public function jit_function_get_max_optimization_level(): ?int {
        $result = $this->ffi->jit_function_get_max_optimization_level();
        return $result;
    }
    public function jit_function_reserve_label(?jit_function_t $p0): ?jit_label_t {
        $result = $this->ffi->jit_function_reserve_label($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_label_t($result);
    }
    public function jit_function_labels_equal(?jit_function_t $p0, ?jit_label_t $p1, ?jit_label_t $p2): ?int {
        $result = $this->ffi->jit_function_labels_equal($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result;
    }
    public function jit_init(): void {
        $this->ffi->jit_init();
    }
    public function jit_uses_interpreter(): ?int {
        $result = $this->ffi->jit_uses_interpreter();
        return $result;
    }
    public function jit_supports_threads(): ?int {
        $result = $this->ffi->jit_supports_threads();
        return $result;
    }
    public function jit_supports_virtual_memory(): ?int {
        $result = $this->ffi->jit_supports_virtual_memory();
        return $result;
    }
    public function jit_supports_closures(): ?int {
        $result = $this->ffi->jit_supports_closures();
        return $result;
    }
    public function jit_get_closure_size(): ?int {
        $result = $this->ffi->jit_get_closure_size();
        return $result;
    }
    public function jit_get_closure_alignment(): ?int {
        $result = $this->ffi->jit_get_closure_alignment();
        return $result;
    }
    public function jit_get_trampoline_size(): ?int {
        $result = $this->ffi->jit_get_trampoline_size();
        return $result;
    }
    public function jit_get_trampoline_alignment(): ?int {
        $result = $this->ffi->jit_get_trampoline_alignment();
        return $result;
    }
    public function jit_insn_get_opcode(?jit_insn_t $p0): ?int {
        $result = $this->ffi->jit_insn_get_opcode($p0 === null ? null : $p0->getData());
        return $result;
    }
    public function jit_insn_get_dest(?jit_insn_t $p0): ?jit_value_t {
        $result = $this->ffi->jit_insn_get_dest($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_get_value1(?jit_insn_t $p0): ?jit_value_t {
        $result = $this->ffi->jit_insn_get_value1($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_get_value2(?jit_insn_t $p0): ?jit_value_t {
        $result = $this->ffi->jit_insn_get_value2($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_get_label(?jit_insn_t $p0): ?jit_label_t {
        $result = $this->ffi->jit_insn_get_label($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_label_t($result);
    }
    public function jit_insn_get_function(?jit_insn_t $p0): ?jit_function_t {
        $result = $this->ffi->jit_insn_get_function($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_function_t($result);
    }
    public function jit_insn_get_native(?jit_insn_t $p0): ?void_ptr {
        $result = $this->ffi->jit_insn_get_native($p0 === null ? null : $p0->getData());
        return $result === null ? null : new void_ptr($result);
    }
    public function jit_insn_get_name(?jit_insn_t $p0): ?string {
        $result = $this->ffi->jit_insn_get_name($p0 === null ? null : $p0->getData());
        return $result;
    }
    public function jit_insn_get_signature(?jit_insn_t $p0): ?jit_type_t {
        $result = $this->ffi->jit_insn_get_signature($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_type_t($result);
    }
    public function jit_insn_dest_is_value(?jit_insn_t $p0): ?int {
        $result = $this->ffi->jit_insn_dest_is_value($p0 === null ? null : $p0->getData());
        return $result;
    }
    public function jit_insn_label(?jit_function_t $p0, ?jit_label_t_ptr $p1): ?int {
        $result = $this->ffi->jit_insn_label($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result;
    }
    public function jit_insn_label_tight(?jit_function_t $p0, ?jit_label_t_ptr $p1): ?int {
        $result = $this->ffi->jit_insn_label_tight($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result;
    }
    public function jit_insn_new_block(?jit_function_t $p0): ?int {
        $result = $this->ffi->jit_insn_new_block($p0 === null ? null : $p0->getData());
        return $result;
    }
    public function jit_insn_load(?jit_function_t $p0, ?jit_value_t $p1): ?jit_value_t {
        $result = $this->ffi->jit_insn_load($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_dup(?jit_function_t $p0, ?jit_value_t $p1): ?jit_value_t {
        $result = $this->ffi->jit_insn_dup($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_store(?jit_function_t $p0, ?jit_value_t $p1, ?jit_value_t $p2): ?int {
        $result = $this->ffi->jit_insn_store($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result;
    }
    public function jit_insn_load_relative(?jit_function_t $p0, ?jit_value_t $p1, ?jit_nint $p2, ?jit_type_t $p3): ?jit_value_t {
        $result = $this->ffi->jit_insn_load_relative($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData(), $p3 === null ? null : $p3->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_store_relative(?jit_function_t $p0, ?jit_value_t $p1, ?jit_nint $p2, ?jit_value_t $p3): ?int {
        $result = $this->ffi->jit_insn_store_relative($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData(), $p3 === null ? null : $p3->getData());
        return $result;
    }
    public function jit_insn_add_relative(?jit_function_t $p0, ?jit_value_t $p1, ?jit_nint $p2): ?jit_value_t {
        $result = $this->ffi->jit_insn_add_relative($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_load_elem(?jit_function_t $p0, ?jit_value_t $p1, ?jit_value_t $p2, ?jit_type_t $p3): ?jit_value_t {
        $result = $this->ffi->jit_insn_load_elem($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData(), $p3 === null ? null : $p3->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_load_elem_address(?jit_function_t $p0, ?jit_value_t $p1, ?jit_value_t $p2, ?jit_type_t $p3): ?jit_value_t {
        $result = $this->ffi->jit_insn_load_elem_address($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData(), $p3 === null ? null : $p3->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_store_elem(?jit_function_t $p0, ?jit_value_t $p1, ?jit_value_t $p2, ?jit_value_t $p3): ?int {
        $result = $this->ffi->jit_insn_store_elem($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData(), $p3 === null ? null : $p3->getData());
        return $result;
    }
    public function jit_insn_check_null(?jit_function_t $p0, ?jit_value_t $p1): ?int {
        $result = $this->ffi->jit_insn_check_null($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result;
    }
    public function jit_insn_nop(?jit_function_t $p0): ?int {
        $result = $this->ffi->jit_insn_nop($p0 === null ? null : $p0->getData());
        return $result;
    }
    public function jit_insn_add(?jit_function_t $p0, ?jit_value_t $p1, ?jit_value_t $p2): ?jit_value_t {
        $result = $this->ffi->jit_insn_add($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_add_ovf(?jit_function_t $p0, ?jit_value_t $p1, ?jit_value_t $p2): ?jit_value_t {
        $result = $this->ffi->jit_insn_add_ovf($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_sub(?jit_function_t $p0, ?jit_value_t $p1, ?jit_value_t $p2): ?jit_value_t {
        $result = $this->ffi->jit_insn_sub($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_sub_ovf(?jit_function_t $p0, ?jit_value_t $p1, ?jit_value_t $p2): ?jit_value_t {
        $result = $this->ffi->jit_insn_sub_ovf($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_mul(?jit_function_t $p0, ?jit_value_t $p1, ?jit_value_t $p2): ?jit_value_t {
        $result = $this->ffi->jit_insn_mul($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_mul_ovf(?jit_function_t $p0, ?jit_value_t $p1, ?jit_value_t $p2): ?jit_value_t {
        $result = $this->ffi->jit_insn_mul_ovf($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_div(?jit_function_t $p0, ?jit_value_t $p1, ?jit_value_t $p2): ?jit_value_t {
        $result = $this->ffi->jit_insn_div($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_rem(?jit_function_t $p0, ?jit_value_t $p1, ?jit_value_t $p2): ?jit_value_t {
        $result = $this->ffi->jit_insn_rem($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_rem_ieee(?jit_function_t $p0, ?jit_value_t $p1, ?jit_value_t $p2): ?jit_value_t {
        $result = $this->ffi->jit_insn_rem_ieee($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_neg(?jit_function_t $p0, ?jit_value_t $p1): ?jit_value_t {
        $result = $this->ffi->jit_insn_neg($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_and(?jit_function_t $p0, ?jit_value_t $p1, ?jit_value_t $p2): ?jit_value_t {
        $result = $this->ffi->jit_insn_and($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_or(?jit_function_t $p0, ?jit_value_t $p1, ?jit_value_t $p2): ?jit_value_t {
        $result = $this->ffi->jit_insn_or($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_xor(?jit_function_t $p0, ?jit_value_t $p1, ?jit_value_t $p2): ?jit_value_t {
        $result = $this->ffi->jit_insn_xor($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_not(?jit_function_t $p0, ?jit_value_t $p1): ?jit_value_t {
        $result = $this->ffi->jit_insn_not($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_shl(?jit_function_t $p0, ?jit_value_t $p1, ?jit_value_t $p2): ?jit_value_t {
        $result = $this->ffi->jit_insn_shl($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_shr(?jit_function_t $p0, ?jit_value_t $p1, ?jit_value_t $p2): ?jit_value_t {
        $result = $this->ffi->jit_insn_shr($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_ushr(?jit_function_t $p0, ?jit_value_t $p1, ?jit_value_t $p2): ?jit_value_t {
        $result = $this->ffi->jit_insn_ushr($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_sshr(?jit_function_t $p0, ?jit_value_t $p1, ?jit_value_t $p2): ?jit_value_t {
        $result = $this->ffi->jit_insn_sshr($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_eq(?jit_function_t $p0, ?jit_value_t $p1, ?jit_value_t $p2): ?jit_value_t {
        $result = $this->ffi->jit_insn_eq($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_ne(?jit_function_t $p0, ?jit_value_t $p1, ?jit_value_t $p2): ?jit_value_t {
        $result = $this->ffi->jit_insn_ne($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_lt(?jit_function_t $p0, ?jit_value_t $p1, ?jit_value_t $p2): ?jit_value_t {
        $result = $this->ffi->jit_insn_lt($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_le(?jit_function_t $p0, ?jit_value_t $p1, ?jit_value_t $p2): ?jit_value_t {
        $result = $this->ffi->jit_insn_le($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_gt(?jit_function_t $p0, ?jit_value_t $p1, ?jit_value_t $p2): ?jit_value_t {
        $result = $this->ffi->jit_insn_gt($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_ge(?jit_function_t $p0, ?jit_value_t $p1, ?jit_value_t $p2): ?jit_value_t {
        $result = $this->ffi->jit_insn_ge($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_cmpl(?jit_function_t $p0, ?jit_value_t $p1, ?jit_value_t $p2): ?jit_value_t {
        $result = $this->ffi->jit_insn_cmpl($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_cmpg(?jit_function_t $p0, ?jit_value_t $p1, ?jit_value_t $p2): ?jit_value_t {
        $result = $this->ffi->jit_insn_cmpg($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_to_bool(?jit_function_t $p0, ?jit_value_t $p1): ?jit_value_t {
        $result = $this->ffi->jit_insn_to_bool($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_to_not_bool(?jit_function_t $p0, ?jit_value_t $p1): ?jit_value_t {
        $result = $this->ffi->jit_insn_to_not_bool($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_acos(?jit_function_t $p0, ?jit_value_t $p1): ?jit_value_t {
        $result = $this->ffi->jit_insn_acos($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_asin(?jit_function_t $p0, ?jit_value_t $p1): ?jit_value_t {
        $result = $this->ffi->jit_insn_asin($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_atan(?jit_function_t $p0, ?jit_value_t $p1): ?jit_value_t {
        $result = $this->ffi->jit_insn_atan($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_atan2(?jit_function_t $p0, ?jit_value_t $p1, ?jit_value_t $p2): ?jit_value_t {
        $result = $this->ffi->jit_insn_atan2($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_ceil(?jit_function_t $p0, ?jit_value_t $p1): ?jit_value_t {
        $result = $this->ffi->jit_insn_ceil($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_cos(?jit_function_t $p0, ?jit_value_t $p1): ?jit_value_t {
        $result = $this->ffi->jit_insn_cos($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_cosh(?jit_function_t $p0, ?jit_value_t $p1): ?jit_value_t {
        $result = $this->ffi->jit_insn_cosh($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_exp(?jit_function_t $p0, ?jit_value_t $p1): ?jit_value_t {
        $result = $this->ffi->jit_insn_exp($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_floor(?jit_function_t $p0, ?jit_value_t $p1): ?jit_value_t {
        $result = $this->ffi->jit_insn_floor($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_log(?jit_function_t $p0, ?jit_value_t $p1): ?jit_value_t {
        $result = $this->ffi->jit_insn_log($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_log10(?jit_function_t $p0, ?jit_value_t $p1): ?jit_value_t {
        $result = $this->ffi->jit_insn_log10($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_pow(?jit_function_t $p0, ?jit_value_t $p1, ?jit_value_t $p2): ?jit_value_t {
        $result = $this->ffi->jit_insn_pow($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_rint(?jit_function_t $p0, ?jit_value_t $p1): ?jit_value_t {
        $result = $this->ffi->jit_insn_rint($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_round(?jit_function_t $p0, ?jit_value_t $p1): ?jit_value_t {
        $result = $this->ffi->jit_insn_round($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_sin(?jit_function_t $p0, ?jit_value_t $p1): ?jit_value_t {
        $result = $this->ffi->jit_insn_sin($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_sinh(?jit_function_t $p0, ?jit_value_t $p1): ?jit_value_t {
        $result = $this->ffi->jit_insn_sinh($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_sqrt(?jit_function_t $p0, ?jit_value_t $p1): ?jit_value_t {
        $result = $this->ffi->jit_insn_sqrt($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_tan(?jit_function_t $p0, ?jit_value_t $p1): ?jit_value_t {
        $result = $this->ffi->jit_insn_tan($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_tanh(?jit_function_t $p0, ?jit_value_t $p1): ?jit_value_t {
        $result = $this->ffi->jit_insn_tanh($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_trunc(?jit_function_t $p0, ?jit_value_t $p1): ?jit_value_t {
        $result = $this->ffi->jit_insn_trunc($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_is_nan(?jit_function_t $p0, ?jit_value_t $p1): ?jit_value_t {
        $result = $this->ffi->jit_insn_is_nan($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_is_finite(?jit_function_t $p0, ?jit_value_t $p1): ?jit_value_t {
        $result = $this->ffi->jit_insn_is_finite($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_is_inf(?jit_function_t $p0, ?jit_value_t $p1): ?jit_value_t {
        $result = $this->ffi->jit_insn_is_inf($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_abs(?jit_function_t $p0, ?jit_value_t $p1): ?jit_value_t {
        $result = $this->ffi->jit_insn_abs($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_min(?jit_function_t $p0, ?jit_value_t $p1, ?jit_value_t $p2): ?jit_value_t {
        $result = $this->ffi->jit_insn_min($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_max(?jit_function_t $p0, ?jit_value_t $p1, ?jit_value_t $p2): ?jit_value_t {
        $result = $this->ffi->jit_insn_max($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_sign(?jit_function_t $p0, ?jit_value_t $p1): ?jit_value_t {
        $result = $this->ffi->jit_insn_sign($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_branch(?jit_function_t $p0, ?jit_label_t_ptr $p1): ?int {
        $result = $this->ffi->jit_insn_branch($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result;
    }
    public function jit_insn_branch_if(?jit_function_t $p0, ?jit_value_t $p1, ?jit_label_t_ptr $p2): ?int {
        $result = $this->ffi->jit_insn_branch_if($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result;
    }
    public function jit_insn_branch_if_not(?jit_function_t $p0, ?jit_value_t $p1, ?jit_label_t_ptr $p2): ?int {
        $result = $this->ffi->jit_insn_branch_if_not($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result;
    }
    public function jit_insn_jump_table(?jit_function_t $p0, ?jit_value_t $p1, ?jit_label_t_ptr $p2, ?int $p3): ?int {
        $result = $this->ffi->jit_insn_jump_table($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData(), $p3);
        return $result;
    }
    public function jit_insn_address_of(?jit_function_t $p0, ?jit_value_t $p1): ?jit_value_t {
        $result = $this->ffi->jit_insn_address_of($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_address_of_label(?jit_function_t $p0, ?jit_label_t_ptr $p1): ?jit_value_t {
        $result = $this->ffi->jit_insn_address_of_label($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_convert(?jit_function_t $p0, ?jit_value_t $p1, ?jit_type_t $p2, ?int $p3): ?jit_value_t {
        $result = $this->ffi->jit_insn_convert($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData(), $p3);
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_call(?jit_function_t $p0, ?string $p1, ?jit_function_t $p2, ?jit_type_t $p3, ?jit_value_t_ptr $p4, ?int $p5, ?int $p6): ?jit_value_t {
        $result = $this->ffi->jit_insn_call($p0 === null ? null : $p0->getData(), $p1, $p2 === null ? null : $p2->getData(), $p3 === null ? null : $p3->getData(), $p4 === null ? null : $p4->getData(), $p5, $p6);
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_call_indirect(?jit_function_t $p0, ?jit_value_t $p1, ?jit_type_t $p2, ?jit_value_t_ptr $p3, ?int $p4, ?int $p5): ?jit_value_t {
        $result = $this->ffi->jit_insn_call_indirect($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData(), $p3 === null ? null : $p3->getData(), $p4, $p5);
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_call_indirect_vtable(?jit_function_t $p0, ?jit_value_t $p1, ?jit_type_t $p2, ?jit_value_t_ptr $p3, ?int $p4, ?int $p5): ?jit_value_t {
        $result = $this->ffi->jit_insn_call_indirect_vtable($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData(), $p3 === null ? null : $p3->getData(), $p4, $p5);
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_call_native(?jit_function_t $p0, ?string $p1, ?void_ptr $p2, ?jit_type_t $p3, ?jit_value_t_ptr $p4, ?int $p5, ?int $p6): ?jit_value_t {
        $result = $this->ffi->jit_insn_call_native($p0 === null ? null : $p0->getData(), $p1, $p2 === null ? null : $p2->getData(), $p3 === null ? null : $p3->getData(), $p4 === null ? null : $p4->getData(), $p5, $p6);
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_call_intrinsic(?jit_function_t $p0, ?string $p1, ?void_ptr $p2, ?jit_intrinsic_descr_t_ptr $p3, ?jit_value_t $p4, ?jit_value_t $p5): ?jit_value_t {
        $result = $this->ffi->jit_insn_call_intrinsic($p0 === null ? null : $p0->getData(), $p1, $p2 === null ? null : $p2->getData(), $p3 === null ? null : $p3->getData(), $p4 === null ? null : $p4->getData(), $p5 === null ? null : $p5->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_incoming_reg(?jit_function_t $p0, ?jit_value_t $p1, ?int $p2): ?int {
        $result = $this->ffi->jit_insn_incoming_reg($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2);
        return $result;
    }
    public function jit_insn_incoming_frame_posn(?jit_function_t $p0, ?jit_value_t $p1, ?jit_nint $p2): ?int {
        $result = $this->ffi->jit_insn_incoming_frame_posn($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result;
    }
    public function jit_insn_outgoing_reg(?jit_function_t $p0, ?jit_value_t $p1, ?int $p2): ?int {
        $result = $this->ffi->jit_insn_outgoing_reg($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2);
        return $result;
    }
    public function jit_insn_outgoing_frame_posn(?jit_function_t $p0, ?jit_value_t $p1, ?jit_nint $p2): ?int {
        $result = $this->ffi->jit_insn_outgoing_frame_posn($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result;
    }
    public function jit_insn_return_reg(?jit_function_t $p0, ?jit_value_t $p1, ?int $p2): ?int {
        $result = $this->ffi->jit_insn_return_reg($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2);
        return $result;
    }
    public function jit_insn_setup_for_nested(?jit_function_t $p0, ?int $p1, ?int $p2): ?int {
        $result = $this->ffi->jit_insn_setup_for_nested($p0 === null ? null : $p0->getData(), $p1, $p2);
        return $result;
    }
    public function jit_insn_flush_struct(?jit_function_t $p0, ?jit_value_t $p1): ?int {
        $result = $this->ffi->jit_insn_flush_struct($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result;
    }
    public function jit_insn_import(?jit_function_t $p0, ?jit_value_t $p1): ?jit_value_t {
        $result = $this->ffi->jit_insn_import($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_push(?jit_function_t $p0, ?jit_value_t $p1): ?int {
        $result = $this->ffi->jit_insn_push($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result;
    }
    public function jit_insn_push_ptr(?jit_function_t $p0, ?jit_value_t $p1, ?jit_type_t $p2): ?int {
        $result = $this->ffi->jit_insn_push_ptr($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result;
    }
    public function jit_insn_set_param(?jit_function_t $p0, ?jit_value_t $p1, ?jit_nint $p2): ?int {
        $result = $this->ffi->jit_insn_set_param($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result;
    }
    public function jit_insn_set_param_ptr(?jit_function_t $p0, ?jit_value_t $p1, ?jit_type_t $p2, ?jit_nint $p3): ?int {
        $result = $this->ffi->jit_insn_set_param_ptr($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData(), $p3 === null ? null : $p3->getData());
        return $result;
    }
    public function jit_insn_push_return_area_ptr(?jit_function_t $p0): ?int {
        $result = $this->ffi->jit_insn_push_return_area_ptr($p0 === null ? null : $p0->getData());
        return $result;
    }
    public function jit_insn_pop_stack(?jit_function_t $p0, ?jit_nint $p1): ?int {
        $result = $this->ffi->jit_insn_pop_stack($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result;
    }
    public function jit_insn_defer_pop_stack(?jit_function_t $p0, ?jit_nint $p1): ?int {
        $result = $this->ffi->jit_insn_defer_pop_stack($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result;
    }
    public function jit_insn_flush_defer_pop(?jit_function_t $p0, ?jit_nint $p1): ?int {
        $result = $this->ffi->jit_insn_flush_defer_pop($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result;
    }
    public function jit_insn_return(?jit_function_t $p0, ?jit_value_t $p1): ?int {
        $result = $this->ffi->jit_insn_return($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result;
    }
    public function jit_insn_return_ptr(?jit_function_t $p0, ?jit_value_t $p1, ?jit_type_t $p2): ?int {
        $result = $this->ffi->jit_insn_return_ptr($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result;
    }
    public function jit_insn_default_return(?jit_function_t $p0): ?int {
        $result = $this->ffi->jit_insn_default_return($p0 === null ? null : $p0->getData());
        return $result;
    }
    public function jit_insn_throw(?jit_function_t $p0, ?jit_value_t $p1): ?int {
        $result = $this->ffi->jit_insn_throw($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result;
    }
    public function jit_insn_get_call_stack(?jit_function_t $p0): ?jit_value_t {
        $result = $this->ffi->jit_insn_get_call_stack($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_thrown_exception(?jit_function_t $p0): ?jit_value_t {
        $result = $this->ffi->jit_insn_thrown_exception($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_uses_catcher(?jit_function_t $p0): ?int {
        $result = $this->ffi->jit_insn_uses_catcher($p0 === null ? null : $p0->getData());
        return $result;
    }
    public function jit_insn_start_catcher(?jit_function_t $p0): ?jit_value_t {
        $result = $this->ffi->jit_insn_start_catcher($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_branch_if_pc_not_in_range(?jit_function_t $p0, ?jit_label_t $p1, ?jit_label_t $p2, ?jit_label_t_ptr $p3): ?int {
        $result = $this->ffi->jit_insn_branch_if_pc_not_in_range($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData(), $p3 === null ? null : $p3->getData());
        return $result;
    }
    public function jit_insn_rethrow_unhandled(?jit_function_t $p0): ?int {
        $result = $this->ffi->jit_insn_rethrow_unhandled($p0 === null ? null : $p0->getData());
        return $result;
    }
    public function jit_insn_start_finally(?jit_function_t $p0, ?jit_label_t_ptr $p1): ?int {
        $result = $this->ffi->jit_insn_start_finally($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result;
    }
    public function jit_insn_return_from_finally(?jit_function_t $p0): ?int {
        $result = $this->ffi->jit_insn_return_from_finally($p0 === null ? null : $p0->getData());
        return $result;
    }
    public function jit_insn_call_finally(?jit_function_t $p0, ?jit_label_t_ptr $p1): ?int {
        $result = $this->ffi->jit_insn_call_finally($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result;
    }
    public function jit_insn_start_filter(?jit_function_t $p0, ?jit_label_t_ptr $p1, ?jit_type_t $p2): ?jit_value_t {
        $result = $this->ffi->jit_insn_start_filter($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_return_from_filter(?jit_function_t $p0, ?jit_value_t $p1): ?int {
        $result = $this->ffi->jit_insn_return_from_filter($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result;
    }
    public function jit_insn_call_filter(?jit_function_t $p0, ?jit_label_t_ptr $p1, ?jit_value_t $p2, ?jit_type_t $p3): ?jit_value_t {
        $result = $this->ffi->jit_insn_call_filter($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData(), $p3 === null ? null : $p3->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_memcpy(?jit_function_t $p0, ?jit_value_t $p1, ?jit_value_t $p2, ?jit_value_t $p3): ?int {
        $result = $this->ffi->jit_insn_memcpy($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData(), $p3 === null ? null : $p3->getData());
        return $result;
    }
    public function jit_insn_memmove(?jit_function_t $p0, ?jit_value_t $p1, ?jit_value_t $p2, ?jit_value_t $p3): ?int {
        $result = $this->ffi->jit_insn_memmove($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData(), $p3 === null ? null : $p3->getData());
        return $result;
    }
    public function jit_insn_memset(?jit_function_t $p0, ?jit_value_t $p1, ?jit_value_t $p2, ?jit_value_t $p3): ?int {
        $result = $this->ffi->jit_insn_memset($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData(), $p3 === null ? null : $p3->getData());
        return $result;
    }
    public function jit_insn_alloca(?jit_function_t $p0, ?jit_value_t $p1): ?jit_value_t {
        $result = $this->ffi->jit_insn_alloca($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_insn_move_blocks_to_end(?jit_function_t $p0, ?jit_label_t $p1, ?jit_label_t $p2): ?int {
        $result = $this->ffi->jit_insn_move_blocks_to_end($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result;
    }
    public function jit_insn_move_blocks_to_start(?jit_function_t $p0, ?jit_label_t $p1, ?jit_label_t $p2): ?int {
        $result = $this->ffi->jit_insn_move_blocks_to_start($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result;
    }
    public function jit_insn_mark_offset(?jit_function_t $p0, ?jit_int $p1): ?int {
        $result = $this->ffi->jit_insn_mark_offset($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result;
    }
    public function jit_insn_mark_breakpoint(?jit_function_t $p0, ?jit_nint $p1, ?jit_nint $p2): ?int {
        $result = $this->ffi->jit_insn_mark_breakpoint($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result;
    }
    public function jit_insn_mark_breakpoint_variable(?jit_function_t $p0, ?jit_value_t $p1, ?jit_value_t $p2): ?int {
        $result = $this->ffi->jit_insn_mark_breakpoint_variable($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result;
    }
    public function jit_insn_iter_init(?jit_insn_iter_t_ptr $p0, ?jit_block_t $p1): void {
        $this->ffi->jit_insn_iter_init($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
    }
    public function jit_insn_iter_init_last(?jit_insn_iter_t_ptr $p0, ?jit_block_t $p1): void {
        $this->ffi->jit_insn_iter_init_last($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
    }
    public function jit_insn_iter_next(?jit_insn_iter_t_ptr $p0): ?jit_insn_t {
        $result = $this->ffi->jit_insn_iter_next($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_insn_t($result);
    }
    public function jit_insn_iter_previous(?jit_insn_iter_t_ptr $p0): ?jit_insn_t {
        $result = $this->ffi->jit_insn_iter_previous($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_insn_t($result);
    }
    public function jit_int_add(?jit_int $p0, ?jit_int $p1): ?jit_int {
        $result = $this->ffi->jit_int_add($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_int_sub(?jit_int $p0, ?jit_int $p1): ?jit_int {
        $result = $this->ffi->jit_int_sub($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_int_mul(?jit_int $p0, ?jit_int $p1): ?jit_int {
        $result = $this->ffi->jit_int_mul($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_int_div(?jit_int_ptr $p0, ?jit_int $p1, ?jit_int $p2): ?jit_int {
        $result = $this->ffi->jit_int_div($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_int_rem(?jit_int_ptr $p0, ?jit_int $p1, ?jit_int $p2): ?jit_int {
        $result = $this->ffi->jit_int_rem($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_int_add_ovf(?jit_int_ptr $p0, ?jit_int $p1, ?jit_int $p2): ?jit_int {
        $result = $this->ffi->jit_int_add_ovf($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_int_sub_ovf(?jit_int_ptr $p0, ?jit_int $p1, ?jit_int $p2): ?jit_int {
        $result = $this->ffi->jit_int_sub_ovf($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_int_mul_ovf(?jit_int_ptr $p0, ?jit_int $p1, ?jit_int $p2): ?jit_int {
        $result = $this->ffi->jit_int_mul_ovf($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_int_neg(?jit_int $p0): ?jit_int {
        $result = $this->ffi->jit_int_neg($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_int_and(?jit_int $p0, ?jit_int $p1): ?jit_int {
        $result = $this->ffi->jit_int_and($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_int_or(?jit_int $p0, ?jit_int $p1): ?jit_int {
        $result = $this->ffi->jit_int_or($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_int_xor(?jit_int $p0, ?jit_int $p1): ?jit_int {
        $result = $this->ffi->jit_int_xor($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_int_not(?jit_int $p0): ?jit_int {
        $result = $this->ffi->jit_int_not($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_int_shl(?jit_int $p0, ?jit_uint $p1): ?jit_int {
        $result = $this->ffi->jit_int_shl($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_int_shr(?jit_int $p0, ?jit_uint $p1): ?jit_int {
        $result = $this->ffi->jit_int_shr($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_int_eq(?jit_int $p0, ?jit_int $p1): ?jit_int {
        $result = $this->ffi->jit_int_eq($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_int_ne(?jit_int $p0, ?jit_int $p1): ?jit_int {
        $result = $this->ffi->jit_int_ne($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_int_lt(?jit_int $p0, ?jit_int $p1): ?jit_int {
        $result = $this->ffi->jit_int_lt($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_int_le(?jit_int $p0, ?jit_int $p1): ?jit_int {
        $result = $this->ffi->jit_int_le($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_int_gt(?jit_int $p0, ?jit_int $p1): ?jit_int {
        $result = $this->ffi->jit_int_gt($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_int_ge(?jit_int $p0, ?jit_int $p1): ?jit_int {
        $result = $this->ffi->jit_int_ge($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_int_cmp(?jit_int $p0, ?jit_int $p1): ?jit_int {
        $result = $this->ffi->jit_int_cmp($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_int_abs(?jit_int $p0): ?jit_int {
        $result = $this->ffi->jit_int_abs($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_int_min(?jit_int $p0, ?jit_int $p1): ?jit_int {
        $result = $this->ffi->jit_int_min($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_int_max(?jit_int $p0, ?jit_int $p1): ?jit_int {
        $result = $this->ffi->jit_int_max($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_int_sign(?jit_int $p0): ?jit_int {
        $result = $this->ffi->jit_int_sign($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_uint_add(?jit_uint $p0, ?jit_uint $p1): ?jit_uint {
        $result = $this->ffi->jit_uint_add($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_uint($result);
    }
    public function jit_uint_sub(?jit_uint $p0, ?jit_uint $p1): ?jit_uint {
        $result = $this->ffi->jit_uint_sub($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_uint($result);
    }
    public function jit_uint_mul(?jit_uint $p0, ?jit_uint $p1): ?jit_uint {
        $result = $this->ffi->jit_uint_mul($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_uint($result);
    }
    public function jit_uint_div(?jit_uint_ptr $p0, ?jit_uint $p1, ?jit_uint $p2): ?jit_int {
        $result = $this->ffi->jit_uint_div($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_uint_rem(?jit_uint_ptr $p0, ?jit_uint $p1, ?jit_uint $p2): ?jit_int {
        $result = $this->ffi->jit_uint_rem($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_uint_add_ovf(?jit_uint_ptr $p0, ?jit_uint $p1, ?jit_uint $p2): ?jit_int {
        $result = $this->ffi->jit_uint_add_ovf($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_uint_sub_ovf(?jit_uint_ptr $p0, ?jit_uint $p1, ?jit_uint $p2): ?jit_int {
        $result = $this->ffi->jit_uint_sub_ovf($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_uint_mul_ovf(?jit_uint_ptr $p0, ?jit_uint $p1, ?jit_uint $p2): ?jit_int {
        $result = $this->ffi->jit_uint_mul_ovf($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_uint_neg(?jit_uint $p0): ?jit_uint {
        $result = $this->ffi->jit_uint_neg($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_uint($result);
    }
    public function jit_uint_and(?jit_uint $p0, ?jit_uint $p1): ?jit_uint {
        $result = $this->ffi->jit_uint_and($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_uint($result);
    }
    public function jit_uint_or(?jit_uint $p0, ?jit_uint $p1): ?jit_uint {
        $result = $this->ffi->jit_uint_or($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_uint($result);
    }
    public function jit_uint_xor(?jit_uint $p0, ?jit_uint $p1): ?jit_uint {
        $result = $this->ffi->jit_uint_xor($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_uint($result);
    }
    public function jit_uint_not(?jit_uint $p0): ?jit_uint {
        $result = $this->ffi->jit_uint_not($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_uint($result);
    }
    public function jit_uint_shl(?jit_uint $p0, ?jit_uint $p1): ?jit_uint {
        $result = $this->ffi->jit_uint_shl($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_uint($result);
    }
    public function jit_uint_shr(?jit_uint $p0, ?jit_uint $p1): ?jit_uint {
        $result = $this->ffi->jit_uint_shr($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_uint($result);
    }
    public function jit_uint_eq(?jit_uint $p0, ?jit_uint $p1): ?jit_int {
        $result = $this->ffi->jit_uint_eq($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_uint_ne(?jit_uint $p0, ?jit_uint $p1): ?jit_int {
        $result = $this->ffi->jit_uint_ne($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_uint_lt(?jit_uint $p0, ?jit_uint $p1): ?jit_int {
        $result = $this->ffi->jit_uint_lt($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_uint_le(?jit_uint $p0, ?jit_uint $p1): ?jit_int {
        $result = $this->ffi->jit_uint_le($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_uint_gt(?jit_uint $p0, ?jit_uint $p1): ?jit_int {
        $result = $this->ffi->jit_uint_gt($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_uint_ge(?jit_uint $p0, ?jit_uint $p1): ?jit_int {
        $result = $this->ffi->jit_uint_ge($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_uint_cmp(?jit_uint $p0, ?jit_uint $p1): ?jit_int {
        $result = $this->ffi->jit_uint_cmp($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_uint_min(?jit_uint $p0, ?jit_uint $p1): ?jit_uint {
        $result = $this->ffi->jit_uint_min($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_uint($result);
    }
    public function jit_uint_max(?jit_uint $p0, ?jit_uint $p1): ?jit_uint {
        $result = $this->ffi->jit_uint_max($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_uint($result);
    }
    public function jit_long_add(?jit_long $p0, ?jit_long $p1): ?jit_long {
        $result = $this->ffi->jit_long_add($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_long($result);
    }
    public function jit_long_sub(?jit_long $p0, ?jit_long $p1): ?jit_long {
        $result = $this->ffi->jit_long_sub($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_long($result);
    }
    public function jit_long_mul(?jit_long $p0, ?jit_long $p1): ?jit_long {
        $result = $this->ffi->jit_long_mul($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_long($result);
    }
    public function jit_long_div(?jit_long_ptr $p0, ?jit_long $p1, ?jit_long $p2): ?jit_int {
        $result = $this->ffi->jit_long_div($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_long_rem(?jit_long_ptr $p0, ?jit_long $p1, ?jit_long $p2): ?jit_int {
        $result = $this->ffi->jit_long_rem($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_long_add_ovf(?jit_long_ptr $p0, ?jit_long $p1, ?jit_long $p2): ?jit_int {
        $result = $this->ffi->jit_long_add_ovf($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_long_sub_ovf(?jit_long_ptr $p0, ?jit_long $p1, ?jit_long $p2): ?jit_int {
        $result = $this->ffi->jit_long_sub_ovf($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_long_mul_ovf(?jit_long_ptr $p0, ?jit_long $p1, ?jit_long $p2): ?jit_int {
        $result = $this->ffi->jit_long_mul_ovf($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_long_neg(?jit_long $p0): ?jit_long {
        $result = $this->ffi->jit_long_neg($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_long($result);
    }
    public function jit_long_and(?jit_long $p0, ?jit_long $p1): ?jit_long {
        $result = $this->ffi->jit_long_and($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_long($result);
    }
    public function jit_long_or(?jit_long $p0, ?jit_long $p1): ?jit_long {
        $result = $this->ffi->jit_long_or($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_long($result);
    }
    public function jit_long_xor(?jit_long $p0, ?jit_long $p1): ?jit_long {
        $result = $this->ffi->jit_long_xor($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_long($result);
    }
    public function jit_long_not(?jit_long $p0): ?jit_long {
        $result = $this->ffi->jit_long_not($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_long($result);
    }
    public function jit_long_shl(?jit_long $p0, ?jit_uint $p1): ?jit_long {
        $result = $this->ffi->jit_long_shl($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_long($result);
    }
    public function jit_long_shr(?jit_long $p0, ?jit_uint $p1): ?jit_long {
        $result = $this->ffi->jit_long_shr($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_long($result);
    }
    public function jit_long_eq(?jit_long $p0, ?jit_long $p1): ?jit_int {
        $result = $this->ffi->jit_long_eq($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_long_ne(?jit_long $p0, ?jit_long $p1): ?jit_int {
        $result = $this->ffi->jit_long_ne($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_long_lt(?jit_long $p0, ?jit_long $p1): ?jit_int {
        $result = $this->ffi->jit_long_lt($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_long_le(?jit_long $p0, ?jit_long $p1): ?jit_int {
        $result = $this->ffi->jit_long_le($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_long_gt(?jit_long $p0, ?jit_long $p1): ?jit_int {
        $result = $this->ffi->jit_long_gt($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_long_ge(?jit_long $p0, ?jit_long $p1): ?jit_int {
        $result = $this->ffi->jit_long_ge($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_long_cmp(?jit_long $p0, ?jit_long $p1): ?jit_int {
        $result = $this->ffi->jit_long_cmp($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_long_abs(?jit_long $p0): ?jit_long {
        $result = $this->ffi->jit_long_abs($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_long($result);
    }
    public function jit_long_min(?jit_long $p0, ?jit_long $p1): ?jit_long {
        $result = $this->ffi->jit_long_min($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_long($result);
    }
    public function jit_long_max(?jit_long $p0, ?jit_long $p1): ?jit_long {
        $result = $this->ffi->jit_long_max($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_long($result);
    }
    public function jit_long_sign(?jit_long $p0): ?jit_int {
        $result = $this->ffi->jit_long_sign($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_ulong_add(?jit_ulong $p0, ?jit_ulong $p1): ?jit_ulong {
        $result = $this->ffi->jit_ulong_add($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_ulong($result);
    }
    public function jit_ulong_sub(?jit_ulong $p0, ?jit_ulong $p1): ?jit_ulong {
        $result = $this->ffi->jit_ulong_sub($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_ulong($result);
    }
    public function jit_ulong_mul(?jit_ulong $p0, ?jit_ulong $p1): ?jit_ulong {
        $result = $this->ffi->jit_ulong_mul($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_ulong($result);
    }
    public function jit_ulong_div(?jit_ulong_ptr $p0, ?jit_ulong $p1, ?jit_ulong $p2): ?jit_int {
        $result = $this->ffi->jit_ulong_div($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_ulong_rem(?jit_ulong_ptr $p0, ?jit_ulong $p1, ?jit_ulong $p2): ?jit_int {
        $result = $this->ffi->jit_ulong_rem($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_ulong_add_ovf(?jit_ulong_ptr $p0, ?jit_ulong $p1, ?jit_ulong $p2): ?jit_int {
        $result = $this->ffi->jit_ulong_add_ovf($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_ulong_sub_ovf(?jit_ulong_ptr $p0, ?jit_ulong $p1, ?jit_ulong $p2): ?jit_int {
        $result = $this->ffi->jit_ulong_sub_ovf($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_ulong_mul_ovf(?jit_ulong_ptr $p0, ?jit_ulong $p1, ?jit_ulong $p2): ?jit_int {
        $result = $this->ffi->jit_ulong_mul_ovf($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_ulong_neg(?jit_ulong $p0): ?jit_ulong {
        $result = $this->ffi->jit_ulong_neg($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_ulong($result);
    }
    public function jit_ulong_and(?jit_ulong $p0, ?jit_ulong $p1): ?jit_ulong {
        $result = $this->ffi->jit_ulong_and($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_ulong($result);
    }
    public function jit_ulong_or(?jit_ulong $p0, ?jit_ulong $p1): ?jit_ulong {
        $result = $this->ffi->jit_ulong_or($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_ulong($result);
    }
    public function jit_ulong_xor(?jit_ulong $p0, ?jit_ulong $p1): ?jit_ulong {
        $result = $this->ffi->jit_ulong_xor($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_ulong($result);
    }
    public function jit_ulong_not(?jit_ulong $p0): ?jit_ulong {
        $result = $this->ffi->jit_ulong_not($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_ulong($result);
    }
    public function jit_ulong_shl(?jit_ulong $p0, ?jit_uint $p1): ?jit_ulong {
        $result = $this->ffi->jit_ulong_shl($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_ulong($result);
    }
    public function jit_ulong_shr(?jit_ulong $p0, ?jit_uint $p1): ?jit_ulong {
        $result = $this->ffi->jit_ulong_shr($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_ulong($result);
    }
    public function jit_ulong_eq(?jit_ulong $p0, ?jit_ulong $p1): ?jit_int {
        $result = $this->ffi->jit_ulong_eq($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_ulong_ne(?jit_ulong $p0, ?jit_ulong $p1): ?jit_int {
        $result = $this->ffi->jit_ulong_ne($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_ulong_lt(?jit_ulong $p0, ?jit_ulong $p1): ?jit_int {
        $result = $this->ffi->jit_ulong_lt($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_ulong_le(?jit_ulong $p0, ?jit_ulong $p1): ?jit_int {
        $result = $this->ffi->jit_ulong_le($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_ulong_gt(?jit_ulong $p0, ?jit_ulong $p1): ?jit_int {
        $result = $this->ffi->jit_ulong_gt($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_ulong_ge(?jit_ulong $p0, ?jit_ulong $p1): ?jit_int {
        $result = $this->ffi->jit_ulong_ge($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_ulong_cmp(?jit_ulong $p0, ?jit_ulong $p1): ?jit_int {
        $result = $this->ffi->jit_ulong_cmp($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_ulong_min(?jit_ulong $p0, ?jit_ulong $p1): ?jit_ulong {
        $result = $this->ffi->jit_ulong_min($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_ulong($result);
    }
    public function jit_ulong_max(?jit_ulong $p0, ?jit_ulong $p1): ?jit_ulong {
        $result = $this->ffi->jit_ulong_max($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_ulong($result);
    }
    public function jit_float32_add(?jit_float32 $p0, ?jit_float32 $p1): ?jit_float32 {
        $result = $this->ffi->jit_float32_add($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_float32($result);
    }
    public function jit_float32_sub(?jit_float32 $p0, ?jit_float32 $p1): ?jit_float32 {
        $result = $this->ffi->jit_float32_sub($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_float32($result);
    }
    public function jit_float32_mul(?jit_float32 $p0, ?jit_float32 $p1): ?jit_float32 {
        $result = $this->ffi->jit_float32_mul($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_float32($result);
    }
    public function jit_float32_div(?jit_float32 $p0, ?jit_float32 $p1): ?jit_float32 {
        $result = $this->ffi->jit_float32_div($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_float32($result);
    }
    public function jit_float32_rem(?jit_float32 $p0, ?jit_float32 $p1): ?jit_float32 {
        $result = $this->ffi->jit_float32_rem($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_float32($result);
    }
    public function jit_float32_ieee_rem(?jit_float32 $p0, ?jit_float32 $p1): ?jit_float32 {
        $result = $this->ffi->jit_float32_ieee_rem($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_float32($result);
    }
    public function jit_float32_neg(?jit_float32 $p0): ?jit_float32 {
        $result = $this->ffi->jit_float32_neg($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_float32($result);
    }
    public function jit_float32_eq(?jit_float32 $p0, ?jit_float32 $p1): ?jit_int {
        $result = $this->ffi->jit_float32_eq($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_float32_ne(?jit_float32 $p0, ?jit_float32 $p1): ?jit_int {
        $result = $this->ffi->jit_float32_ne($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_float32_lt(?jit_float32 $p0, ?jit_float32 $p1): ?jit_int {
        $result = $this->ffi->jit_float32_lt($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_float32_le(?jit_float32 $p0, ?jit_float32 $p1): ?jit_int {
        $result = $this->ffi->jit_float32_le($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_float32_gt(?jit_float32 $p0, ?jit_float32 $p1): ?jit_int {
        $result = $this->ffi->jit_float32_gt($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_float32_ge(?jit_float32 $p0, ?jit_float32 $p1): ?jit_int {
        $result = $this->ffi->jit_float32_ge($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_float32_cmpl(?jit_float32 $p0, ?jit_float32 $p1): ?jit_int {
        $result = $this->ffi->jit_float32_cmpl($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_float32_cmpg(?jit_float32 $p0, ?jit_float32 $p1): ?jit_int {
        $result = $this->ffi->jit_float32_cmpg($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_float32_acos(?jit_float32 $p0): ?jit_float32 {
        $result = $this->ffi->jit_float32_acos($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_float32($result);
    }
    public function jit_float32_asin(?jit_float32 $p0): ?jit_float32 {
        $result = $this->ffi->jit_float32_asin($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_float32($result);
    }
    public function jit_float32_atan(?jit_float32 $p0): ?jit_float32 {
        $result = $this->ffi->jit_float32_atan($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_float32($result);
    }
    public function jit_float32_atan2(?jit_float32 $p0, ?jit_float32 $p1): ?jit_float32 {
        $result = $this->ffi->jit_float32_atan2($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_float32($result);
    }
    public function jit_float32_ceil(?jit_float32 $p0): ?jit_float32 {
        $result = $this->ffi->jit_float32_ceil($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_float32($result);
    }
    public function jit_float32_cos(?jit_float32 $p0): ?jit_float32 {
        $result = $this->ffi->jit_float32_cos($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_float32($result);
    }
    public function jit_float32_cosh(?jit_float32 $p0): ?jit_float32 {
        $result = $this->ffi->jit_float32_cosh($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_float32($result);
    }
    public function jit_float32_exp(?jit_float32 $p0): ?jit_float32 {
        $result = $this->ffi->jit_float32_exp($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_float32($result);
    }
    public function jit_float32_floor(?jit_float32 $p0): ?jit_float32 {
        $result = $this->ffi->jit_float32_floor($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_float32($result);
    }
    public function jit_float32_log(?jit_float32 $p0): ?jit_float32 {
        $result = $this->ffi->jit_float32_log($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_float32($result);
    }
    public function jit_float32_log10(?jit_float32 $p0): ?jit_float32 {
        $result = $this->ffi->jit_float32_log10($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_float32($result);
    }
    public function jit_float32_pow(?jit_float32 $p0, ?jit_float32 $p1): ?jit_float32 {
        $result = $this->ffi->jit_float32_pow($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_float32($result);
    }
    public function jit_float32_rint(?jit_float32 $p0): ?jit_float32 {
        $result = $this->ffi->jit_float32_rint($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_float32($result);
    }
    public function jit_float32_round(?jit_float32 $p0): ?jit_float32 {
        $result = $this->ffi->jit_float32_round($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_float32($result);
    }
    public function jit_float32_sin(?jit_float32 $p0): ?jit_float32 {
        $result = $this->ffi->jit_float32_sin($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_float32($result);
    }
    public function jit_float32_sinh(?jit_float32 $p0): ?jit_float32 {
        $result = $this->ffi->jit_float32_sinh($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_float32($result);
    }
    public function jit_float32_sqrt(?jit_float32 $p0): ?jit_float32 {
        $result = $this->ffi->jit_float32_sqrt($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_float32($result);
    }
    public function jit_float32_tan(?jit_float32 $p0): ?jit_float32 {
        $result = $this->ffi->jit_float32_tan($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_float32($result);
    }
    public function jit_float32_tanh(?jit_float32 $p0): ?jit_float32 {
        $result = $this->ffi->jit_float32_tanh($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_float32($result);
    }
    public function jit_float32_trunc(?jit_float32 $p0): ?jit_float32 {
        $result = $this->ffi->jit_float32_trunc($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_float32($result);
    }
    public function jit_float32_is_finite(?jit_float32 $p0): ?jit_int {
        $result = $this->ffi->jit_float32_is_finite($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_float32_is_nan(?jit_float32 $p0): ?jit_int {
        $result = $this->ffi->jit_float32_is_nan($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_float32_is_inf(?jit_float32 $p0): ?jit_int {
        $result = $this->ffi->jit_float32_is_inf($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_float32_abs(?jit_float32 $p0): ?jit_float32 {
        $result = $this->ffi->jit_float32_abs($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_float32($result);
    }
    public function jit_float32_min(?jit_float32 $p0, ?jit_float32 $p1): ?jit_float32 {
        $result = $this->ffi->jit_float32_min($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_float32($result);
    }
    public function jit_float32_max(?jit_float32 $p0, ?jit_float32 $p1): ?jit_float32 {
        $result = $this->ffi->jit_float32_max($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_float32($result);
    }
    public function jit_float32_sign(?jit_float32 $p0): ?jit_int {
        $result = $this->ffi->jit_float32_sign($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_float64_add(?jit_float64 $p0, ?jit_float64 $p1): ?jit_float64 {
        $result = $this->ffi->jit_float64_add($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_float64($result);
    }
    public function jit_float64_sub(?jit_float64 $p0, ?jit_float64 $p1): ?jit_float64 {
        $result = $this->ffi->jit_float64_sub($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_float64($result);
    }
    public function jit_float64_mul(?jit_float64 $p0, ?jit_float64 $p1): ?jit_float64 {
        $result = $this->ffi->jit_float64_mul($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_float64($result);
    }
    public function jit_float64_div(?jit_float64 $p0, ?jit_float64 $p1): ?jit_float64 {
        $result = $this->ffi->jit_float64_div($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_float64($result);
    }
    public function jit_float64_rem(?jit_float64 $p0, ?jit_float64 $p1): ?jit_float64 {
        $result = $this->ffi->jit_float64_rem($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_float64($result);
    }
    public function jit_float64_ieee_rem(?jit_float64 $p0, ?jit_float64 $p1): ?jit_float64 {
        $result = $this->ffi->jit_float64_ieee_rem($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_float64($result);
    }
    public function jit_float64_neg(?jit_float64 $p0): ?jit_float64 {
        $result = $this->ffi->jit_float64_neg($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_float64($result);
    }
    public function jit_float64_eq(?jit_float64 $p0, ?jit_float64 $p1): ?jit_int {
        $result = $this->ffi->jit_float64_eq($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_float64_ne(?jit_float64 $p0, ?jit_float64 $p1): ?jit_int {
        $result = $this->ffi->jit_float64_ne($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_float64_lt(?jit_float64 $p0, ?jit_float64 $p1): ?jit_int {
        $result = $this->ffi->jit_float64_lt($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_float64_le(?jit_float64 $p0, ?jit_float64 $p1): ?jit_int {
        $result = $this->ffi->jit_float64_le($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_float64_gt(?jit_float64 $p0, ?jit_float64 $p1): ?jit_int {
        $result = $this->ffi->jit_float64_gt($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_float64_ge(?jit_float64 $p0, ?jit_float64 $p1): ?jit_int {
        $result = $this->ffi->jit_float64_ge($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_float64_cmpl(?jit_float64 $p0, ?jit_float64 $p1): ?jit_int {
        $result = $this->ffi->jit_float64_cmpl($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_float64_cmpg(?jit_float64 $p0, ?jit_float64 $p1): ?jit_int {
        $result = $this->ffi->jit_float64_cmpg($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_float64_acos(?jit_float64 $p0): ?jit_float64 {
        $result = $this->ffi->jit_float64_acos($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_float64($result);
    }
    public function jit_float64_asin(?jit_float64 $p0): ?jit_float64 {
        $result = $this->ffi->jit_float64_asin($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_float64($result);
    }
    public function jit_float64_atan(?jit_float64 $p0): ?jit_float64 {
        $result = $this->ffi->jit_float64_atan($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_float64($result);
    }
    public function jit_float64_atan2(?jit_float64 $p0, ?jit_float64 $p1): ?jit_float64 {
        $result = $this->ffi->jit_float64_atan2($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_float64($result);
    }
    public function jit_float64_ceil(?jit_float64 $p0): ?jit_float64 {
        $result = $this->ffi->jit_float64_ceil($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_float64($result);
    }
    public function jit_float64_cos(?jit_float64 $p0): ?jit_float64 {
        $result = $this->ffi->jit_float64_cos($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_float64($result);
    }
    public function jit_float64_cosh(?jit_float64 $p0): ?jit_float64 {
        $result = $this->ffi->jit_float64_cosh($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_float64($result);
    }
    public function jit_float64_exp(?jit_float64 $p0): ?jit_float64 {
        $result = $this->ffi->jit_float64_exp($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_float64($result);
    }
    public function jit_float64_floor(?jit_float64 $p0): ?jit_float64 {
        $result = $this->ffi->jit_float64_floor($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_float64($result);
    }
    public function jit_float64_log(?jit_float64 $p0): ?jit_float64 {
        $result = $this->ffi->jit_float64_log($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_float64($result);
    }
    public function jit_float64_log10(?jit_float64 $p0): ?jit_float64 {
        $result = $this->ffi->jit_float64_log10($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_float64($result);
    }
    public function jit_float64_pow(?jit_float64 $p0, ?jit_float64 $p1): ?jit_float64 {
        $result = $this->ffi->jit_float64_pow($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_float64($result);
    }
    public function jit_float64_rint(?jit_float64 $p0): ?jit_float64 {
        $result = $this->ffi->jit_float64_rint($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_float64($result);
    }
    public function jit_float64_round(?jit_float64 $p0): ?jit_float64 {
        $result = $this->ffi->jit_float64_round($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_float64($result);
    }
    public function jit_float64_sin(?jit_float64 $p0): ?jit_float64 {
        $result = $this->ffi->jit_float64_sin($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_float64($result);
    }
    public function jit_float64_sinh(?jit_float64 $p0): ?jit_float64 {
        $result = $this->ffi->jit_float64_sinh($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_float64($result);
    }
    public function jit_float64_sqrt(?jit_float64 $p0): ?jit_float64 {
        $result = $this->ffi->jit_float64_sqrt($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_float64($result);
    }
    public function jit_float64_tan(?jit_float64 $p0): ?jit_float64 {
        $result = $this->ffi->jit_float64_tan($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_float64($result);
    }
    public function jit_float64_tanh(?jit_float64 $p0): ?jit_float64 {
        $result = $this->ffi->jit_float64_tanh($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_float64($result);
    }
    public function jit_float64_trunc(?jit_float64 $p0): ?jit_float64 {
        $result = $this->ffi->jit_float64_trunc($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_float64($result);
    }
    public function jit_float64_is_finite(?jit_float64 $p0): ?jit_int {
        $result = $this->ffi->jit_float64_is_finite($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_float64_is_nan(?jit_float64 $p0): ?jit_int {
        $result = $this->ffi->jit_float64_is_nan($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_float64_is_inf(?jit_float64 $p0): ?jit_int {
        $result = $this->ffi->jit_float64_is_inf($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_float64_abs(?jit_float64 $p0): ?jit_float64 {
        $result = $this->ffi->jit_float64_abs($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_float64($result);
    }
    public function jit_float64_min(?jit_float64 $p0, ?jit_float64 $p1): ?jit_float64 {
        $result = $this->ffi->jit_float64_min($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_float64($result);
    }
    public function jit_float64_max(?jit_float64 $p0, ?jit_float64 $p1): ?jit_float64 {
        $result = $this->ffi->jit_float64_max($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_float64($result);
    }
    public function jit_float64_sign(?jit_float64 $p0): ?jit_int {
        $result = $this->ffi->jit_float64_sign($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_nfloat_add(?jit_nfloat $p0, ?jit_nfloat $p1): ?jit_nfloat {
        $result = $this->ffi->jit_nfloat_add($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_nfloat($result);
    }
    public function jit_nfloat_sub(?jit_nfloat $p0, ?jit_nfloat $p1): ?jit_nfloat {
        $result = $this->ffi->jit_nfloat_sub($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_nfloat($result);
    }
    public function jit_nfloat_mul(?jit_nfloat $p0, ?jit_nfloat $p1): ?jit_nfloat {
        $result = $this->ffi->jit_nfloat_mul($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_nfloat($result);
    }
    public function jit_nfloat_div(?jit_nfloat $p0, ?jit_nfloat $p1): ?jit_nfloat {
        $result = $this->ffi->jit_nfloat_div($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_nfloat($result);
    }
    public function jit_nfloat_rem(?jit_nfloat $p0, ?jit_nfloat $p1): ?jit_nfloat {
        $result = $this->ffi->jit_nfloat_rem($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_nfloat($result);
    }
    public function jit_nfloat_ieee_rem(?jit_nfloat $p0, ?jit_nfloat $p1): ?jit_nfloat {
        $result = $this->ffi->jit_nfloat_ieee_rem($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_nfloat($result);
    }
    public function jit_nfloat_neg(?jit_nfloat $p0): ?jit_nfloat {
        $result = $this->ffi->jit_nfloat_neg($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_nfloat($result);
    }
    public function jit_nfloat_eq(?jit_nfloat $p0, ?jit_nfloat $p1): ?jit_int {
        $result = $this->ffi->jit_nfloat_eq($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_nfloat_ne(?jit_nfloat $p0, ?jit_nfloat $p1): ?jit_int {
        $result = $this->ffi->jit_nfloat_ne($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_nfloat_lt(?jit_nfloat $p0, ?jit_nfloat $p1): ?jit_int {
        $result = $this->ffi->jit_nfloat_lt($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_nfloat_le(?jit_nfloat $p0, ?jit_nfloat $p1): ?jit_int {
        $result = $this->ffi->jit_nfloat_le($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_nfloat_gt(?jit_nfloat $p0, ?jit_nfloat $p1): ?jit_int {
        $result = $this->ffi->jit_nfloat_gt($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_nfloat_ge(?jit_nfloat $p0, ?jit_nfloat $p1): ?jit_int {
        $result = $this->ffi->jit_nfloat_ge($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_nfloat_cmpl(?jit_nfloat $p0, ?jit_nfloat $p1): ?jit_int {
        $result = $this->ffi->jit_nfloat_cmpl($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_nfloat_cmpg(?jit_nfloat $p0, ?jit_nfloat $p1): ?jit_int {
        $result = $this->ffi->jit_nfloat_cmpg($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_nfloat_acos(?jit_nfloat $p0): ?jit_nfloat {
        $result = $this->ffi->jit_nfloat_acos($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_nfloat($result);
    }
    public function jit_nfloat_asin(?jit_nfloat $p0): ?jit_nfloat {
        $result = $this->ffi->jit_nfloat_asin($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_nfloat($result);
    }
    public function jit_nfloat_atan(?jit_nfloat $p0): ?jit_nfloat {
        $result = $this->ffi->jit_nfloat_atan($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_nfloat($result);
    }
    public function jit_nfloat_atan2(?jit_nfloat $p0, ?jit_nfloat $p1): ?jit_nfloat {
        $result = $this->ffi->jit_nfloat_atan2($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_nfloat($result);
    }
    public function jit_nfloat_ceil(?jit_nfloat $p0): ?jit_nfloat {
        $result = $this->ffi->jit_nfloat_ceil($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_nfloat($result);
    }
    public function jit_nfloat_cos(?jit_nfloat $p0): ?jit_nfloat {
        $result = $this->ffi->jit_nfloat_cos($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_nfloat($result);
    }
    public function jit_nfloat_cosh(?jit_nfloat $p0): ?jit_nfloat {
        $result = $this->ffi->jit_nfloat_cosh($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_nfloat($result);
    }
    public function jit_nfloat_exp(?jit_nfloat $p0): ?jit_nfloat {
        $result = $this->ffi->jit_nfloat_exp($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_nfloat($result);
    }
    public function jit_nfloat_floor(?jit_nfloat $p0): ?jit_nfloat {
        $result = $this->ffi->jit_nfloat_floor($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_nfloat($result);
    }
    public function jit_nfloat_log(?jit_nfloat $p0): ?jit_nfloat {
        $result = $this->ffi->jit_nfloat_log($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_nfloat($result);
    }
    public function jit_nfloat_log10(?jit_nfloat $p0): ?jit_nfloat {
        $result = $this->ffi->jit_nfloat_log10($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_nfloat($result);
    }
    public function jit_nfloat_pow(?jit_nfloat $p0, ?jit_nfloat $p1): ?jit_nfloat {
        $result = $this->ffi->jit_nfloat_pow($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_nfloat($result);
    }
    public function jit_nfloat_rint(?jit_nfloat $p0): ?jit_nfloat {
        $result = $this->ffi->jit_nfloat_rint($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_nfloat($result);
    }
    public function jit_nfloat_round(?jit_nfloat $p0): ?jit_nfloat {
        $result = $this->ffi->jit_nfloat_round($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_nfloat($result);
    }
    public function jit_nfloat_sin(?jit_nfloat $p0): ?jit_nfloat {
        $result = $this->ffi->jit_nfloat_sin($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_nfloat($result);
    }
    public function jit_nfloat_sinh(?jit_nfloat $p0): ?jit_nfloat {
        $result = $this->ffi->jit_nfloat_sinh($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_nfloat($result);
    }
    public function jit_nfloat_sqrt(?jit_nfloat $p0): ?jit_nfloat {
        $result = $this->ffi->jit_nfloat_sqrt($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_nfloat($result);
    }
    public function jit_nfloat_tan(?jit_nfloat $p0): ?jit_nfloat {
        $result = $this->ffi->jit_nfloat_tan($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_nfloat($result);
    }
    public function jit_nfloat_tanh(?jit_nfloat $p0): ?jit_nfloat {
        $result = $this->ffi->jit_nfloat_tanh($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_nfloat($result);
    }
    public function jit_nfloat_trunc(?jit_nfloat $p0): ?jit_nfloat {
        $result = $this->ffi->jit_nfloat_trunc($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_nfloat($result);
    }
    public function jit_nfloat_is_finite(?jit_nfloat $p0): ?jit_int {
        $result = $this->ffi->jit_nfloat_is_finite($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_nfloat_is_nan(?jit_nfloat $p0): ?jit_int {
        $result = $this->ffi->jit_nfloat_is_nan($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_nfloat_is_inf(?jit_nfloat $p0): ?jit_int {
        $result = $this->ffi->jit_nfloat_is_inf($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_nfloat_abs(?jit_nfloat $p0): ?jit_nfloat {
        $result = $this->ffi->jit_nfloat_abs($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_nfloat($result);
    }
    public function jit_nfloat_min(?jit_nfloat $p0, ?jit_nfloat $p1): ?jit_nfloat {
        $result = $this->ffi->jit_nfloat_min($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_nfloat($result);
    }
    public function jit_nfloat_max(?jit_nfloat $p0, ?jit_nfloat $p1): ?jit_nfloat {
        $result = $this->ffi->jit_nfloat_max($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_nfloat($result);
    }
    public function jit_nfloat_sign(?jit_nfloat $p0): ?jit_int {
        $result = $this->ffi->jit_nfloat_sign($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_int_to_sbyte(?jit_int $p0): ?jit_int {
        $result = $this->ffi->jit_int_to_sbyte($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_int_to_ubyte(?jit_int $p0): ?jit_int {
        $result = $this->ffi->jit_int_to_ubyte($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_int_to_short(?jit_int $p0): ?jit_int {
        $result = $this->ffi->jit_int_to_short($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_int_to_ushort(?jit_int $p0): ?jit_int {
        $result = $this->ffi->jit_int_to_ushort($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_int_to_int(?jit_int $p0): ?jit_int {
        $result = $this->ffi->jit_int_to_int($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_int_to_uint(?jit_int $p0): ?jit_uint {
        $result = $this->ffi->jit_int_to_uint($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_uint($result);
    }
    public function jit_int_to_long(?jit_int $p0): ?jit_long {
        $result = $this->ffi->jit_int_to_long($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_long($result);
    }
    public function jit_int_to_ulong(?jit_int $p0): ?jit_ulong {
        $result = $this->ffi->jit_int_to_ulong($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_ulong($result);
    }
    public function jit_uint_to_int(?jit_uint $p0): ?jit_int {
        $result = $this->ffi->jit_uint_to_int($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_uint_to_uint(?jit_uint $p0): ?jit_uint {
        $result = $this->ffi->jit_uint_to_uint($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_uint($result);
    }
    public function jit_uint_to_long(?jit_uint $p0): ?jit_long {
        $result = $this->ffi->jit_uint_to_long($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_long($result);
    }
    public function jit_uint_to_ulong(?jit_uint $p0): ?jit_ulong {
        $result = $this->ffi->jit_uint_to_ulong($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_ulong($result);
    }
    public function jit_long_to_int(?jit_long $p0): ?jit_int {
        $result = $this->ffi->jit_long_to_int($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_long_to_uint(?jit_long $p0): ?jit_uint {
        $result = $this->ffi->jit_long_to_uint($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_uint($result);
    }
    public function jit_long_to_long(?jit_long $p0): ?jit_long {
        $result = $this->ffi->jit_long_to_long($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_long($result);
    }
    public function jit_long_to_ulong(?jit_long $p0): ?jit_ulong {
        $result = $this->ffi->jit_long_to_ulong($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_ulong($result);
    }
    public function jit_ulong_to_int(?jit_ulong $p0): ?jit_int {
        $result = $this->ffi->jit_ulong_to_int($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_ulong_to_uint(?jit_ulong $p0): ?jit_uint {
        $result = $this->ffi->jit_ulong_to_uint($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_uint($result);
    }
    public function jit_ulong_to_long(?jit_ulong $p0): ?jit_long {
        $result = $this->ffi->jit_ulong_to_long($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_long($result);
    }
    public function jit_ulong_to_ulong(?jit_ulong $p0): ?jit_ulong {
        $result = $this->ffi->jit_ulong_to_ulong($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_ulong($result);
    }
    public function jit_int_to_sbyte_ovf(?jit_int_ptr $p0, ?jit_int $p1): ?jit_int {
        $result = $this->ffi->jit_int_to_sbyte_ovf($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_int_to_ubyte_ovf(?jit_int_ptr $p0, ?jit_int $p1): ?jit_int {
        $result = $this->ffi->jit_int_to_ubyte_ovf($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_int_to_short_ovf(?jit_int_ptr $p0, ?jit_int $p1): ?jit_int {
        $result = $this->ffi->jit_int_to_short_ovf($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_int_to_ushort_ovf(?jit_int_ptr $p0, ?jit_int $p1): ?jit_int {
        $result = $this->ffi->jit_int_to_ushort_ovf($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_int_to_int_ovf(?jit_int_ptr $p0, ?jit_int $p1): ?jit_int {
        $result = $this->ffi->jit_int_to_int_ovf($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_int_to_uint_ovf(?jit_uint_ptr $p0, ?jit_int $p1): ?jit_int {
        $result = $this->ffi->jit_int_to_uint_ovf($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_int_to_long_ovf(?jit_long_ptr $p0, ?jit_int $p1): ?jit_int {
        $result = $this->ffi->jit_int_to_long_ovf($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_int_to_ulong_ovf(?jit_ulong_ptr $p0, ?jit_int $p1): ?jit_int {
        $result = $this->ffi->jit_int_to_ulong_ovf($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_uint_to_int_ovf(?jit_int_ptr $p0, ?jit_uint $p1): ?jit_int {
        $result = $this->ffi->jit_uint_to_int_ovf($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_uint_to_uint_ovf(?jit_uint_ptr $p0, ?jit_uint $p1): ?jit_int {
        $result = $this->ffi->jit_uint_to_uint_ovf($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_uint_to_long_ovf(?jit_long_ptr $p0, ?jit_uint $p1): ?jit_int {
        $result = $this->ffi->jit_uint_to_long_ovf($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_uint_to_ulong_ovf(?jit_ulong_ptr $p0, ?jit_uint $p1): ?jit_int {
        $result = $this->ffi->jit_uint_to_ulong_ovf($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_long_to_int_ovf(?jit_int_ptr $p0, ?jit_long $p1): ?jit_int {
        $result = $this->ffi->jit_long_to_int_ovf($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_long_to_uint_ovf(?jit_uint_ptr $p0, ?jit_long $p1): ?jit_int {
        $result = $this->ffi->jit_long_to_uint_ovf($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_long_to_long_ovf(?jit_long_ptr $p0, ?jit_long $p1): ?jit_int {
        $result = $this->ffi->jit_long_to_long_ovf($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_long_to_ulong_ovf(?jit_ulong_ptr $p0, ?jit_long $p1): ?jit_int {
        $result = $this->ffi->jit_long_to_ulong_ovf($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_ulong_to_int_ovf(?jit_int_ptr $p0, ?jit_ulong $p1): ?jit_int {
        $result = $this->ffi->jit_ulong_to_int_ovf($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_ulong_to_uint_ovf(?jit_uint_ptr $p0, ?jit_ulong $p1): ?jit_int {
        $result = $this->ffi->jit_ulong_to_uint_ovf($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_ulong_to_long_ovf(?jit_long_ptr $p0, ?jit_ulong $p1): ?jit_int {
        $result = $this->ffi->jit_ulong_to_long_ovf($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_ulong_to_ulong_ovf(?jit_ulong_ptr $p0, ?jit_ulong $p1): ?jit_int {
        $result = $this->ffi->jit_ulong_to_ulong_ovf($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_float32_to_int(?jit_float32 $p0): ?jit_int {
        $result = $this->ffi->jit_float32_to_int($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_float32_to_uint(?jit_float32 $p0): ?jit_uint {
        $result = $this->ffi->jit_float32_to_uint($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_uint($result);
    }
    public function jit_float32_to_long(?jit_float32 $p0): ?jit_long {
        $result = $this->ffi->jit_float32_to_long($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_long($result);
    }
    public function jit_float32_to_ulong(?jit_float32 $p0): ?jit_ulong {
        $result = $this->ffi->jit_float32_to_ulong($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_ulong($result);
    }
    public function jit_float32_to_int_ovf(?jit_int_ptr $p0, ?jit_float32 $p1): ?jit_int {
        $result = $this->ffi->jit_float32_to_int_ovf($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_float32_to_uint_ovf(?jit_uint_ptr $p0, ?jit_float32 $p1): ?jit_int {
        $result = $this->ffi->jit_float32_to_uint_ovf($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_float32_to_long_ovf(?jit_long_ptr $p0, ?jit_float32 $p1): ?jit_int {
        $result = $this->ffi->jit_float32_to_long_ovf($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_float32_to_ulong_ovf(?jit_ulong_ptr $p0, ?jit_float32 $p1): ?jit_int {
        $result = $this->ffi->jit_float32_to_ulong_ovf($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_float64_to_int(?jit_float64 $p0): ?jit_int {
        $result = $this->ffi->jit_float64_to_int($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_float64_to_uint(?jit_float64 $p0): ?jit_uint {
        $result = $this->ffi->jit_float64_to_uint($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_uint($result);
    }
    public function jit_float64_to_long(?jit_float64 $p0): ?jit_long {
        $result = $this->ffi->jit_float64_to_long($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_long($result);
    }
    public function jit_float64_to_ulong(?jit_float64 $p0): ?jit_ulong {
        $result = $this->ffi->jit_float64_to_ulong($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_ulong($result);
    }
    public function jit_float64_to_int_ovf(?jit_int_ptr $p0, ?jit_float64 $p1): ?jit_int {
        $result = $this->ffi->jit_float64_to_int_ovf($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_float64_to_uint_ovf(?jit_uint_ptr $p0, ?jit_float64 $p1): ?jit_int {
        $result = $this->ffi->jit_float64_to_uint_ovf($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_float64_to_long_ovf(?jit_long_ptr $p0, ?jit_float64 $p1): ?jit_int {
        $result = $this->ffi->jit_float64_to_long_ovf($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_float64_to_ulong_ovf(?jit_ulong_ptr $p0, ?jit_float64 $p1): ?jit_int {
        $result = $this->ffi->jit_float64_to_ulong_ovf($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_nfloat_to_int(?jit_nfloat $p0): ?jit_int {
        $result = $this->ffi->jit_nfloat_to_int($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_nfloat_to_uint(?jit_nfloat $p0): ?jit_uint {
        $result = $this->ffi->jit_nfloat_to_uint($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_uint($result);
    }
    public function jit_nfloat_to_long(?jit_nfloat $p0): ?jit_long {
        $result = $this->ffi->jit_nfloat_to_long($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_long($result);
    }
    public function jit_nfloat_to_ulong(?jit_nfloat $p0): ?jit_ulong {
        $result = $this->ffi->jit_nfloat_to_ulong($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_ulong($result);
    }
    public function jit_nfloat_to_int_ovf(?jit_int_ptr $p0, ?jit_nfloat $p1): ?jit_int {
        $result = $this->ffi->jit_nfloat_to_int_ovf($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_nfloat_to_uint_ovf(?jit_uint_ptr $p0, ?jit_nfloat $p1): ?jit_int {
        $result = $this->ffi->jit_nfloat_to_uint_ovf($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_nfloat_to_long_ovf(?jit_long_ptr $p0, ?jit_nfloat $p1): ?jit_int {
        $result = $this->ffi->jit_nfloat_to_long_ovf($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_nfloat_to_ulong_ovf(?jit_ulong_ptr $p0, ?jit_nfloat $p1): ?jit_int {
        $result = $this->ffi->jit_nfloat_to_ulong_ovf($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_int($result);
    }
    public function jit_int_to_float32(?jit_int $p0): ?jit_float32 {
        $result = $this->ffi->jit_int_to_float32($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_float32($result);
    }
    public function jit_int_to_float64(?jit_int $p0): ?jit_float64 {
        $result = $this->ffi->jit_int_to_float64($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_float64($result);
    }
    public function jit_int_to_nfloat(?jit_int $p0): ?jit_nfloat {
        $result = $this->ffi->jit_int_to_nfloat($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_nfloat($result);
    }
    public function jit_uint_to_float32(?jit_uint $p0): ?jit_float32 {
        $result = $this->ffi->jit_uint_to_float32($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_float32($result);
    }
    public function jit_uint_to_float64(?jit_uint $p0): ?jit_float64 {
        $result = $this->ffi->jit_uint_to_float64($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_float64($result);
    }
    public function jit_uint_to_nfloat(?jit_uint $p0): ?jit_nfloat {
        $result = $this->ffi->jit_uint_to_nfloat($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_nfloat($result);
    }
    public function jit_long_to_float32(?jit_long $p0): ?jit_float32 {
        $result = $this->ffi->jit_long_to_float32($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_float32($result);
    }
    public function jit_long_to_float64(?jit_long $p0): ?jit_float64 {
        $result = $this->ffi->jit_long_to_float64($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_float64($result);
    }
    public function jit_long_to_nfloat(?jit_long $p0): ?jit_nfloat {
        $result = $this->ffi->jit_long_to_nfloat($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_nfloat($result);
    }
    public function jit_ulong_to_float32(?jit_ulong $p0): ?jit_float32 {
        $result = $this->ffi->jit_ulong_to_float32($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_float32($result);
    }
    public function jit_ulong_to_float64(?jit_ulong $p0): ?jit_float64 {
        $result = $this->ffi->jit_ulong_to_float64($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_float64($result);
    }
    public function jit_ulong_to_nfloat(?jit_ulong $p0): ?jit_nfloat {
        $result = $this->ffi->jit_ulong_to_nfloat($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_nfloat($result);
    }
    public function jit_float32_to_float64(?jit_float32 $p0): ?jit_float64 {
        $result = $this->ffi->jit_float32_to_float64($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_float64($result);
    }
    public function jit_float32_to_nfloat(?jit_float32 $p0): ?jit_nfloat {
        $result = $this->ffi->jit_float32_to_nfloat($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_nfloat($result);
    }
    public function jit_float64_to_float32(?jit_float64 $p0): ?jit_float32 {
        $result = $this->ffi->jit_float64_to_float32($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_float32($result);
    }
    public function jit_float64_to_nfloat(?jit_float64 $p0): ?jit_nfloat {
        $result = $this->ffi->jit_float64_to_nfloat($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_nfloat($result);
    }
    public function jit_nfloat_to_float32(?jit_nfloat $p0): ?jit_float32 {
        $result = $this->ffi->jit_nfloat_to_float32($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_float32($result);
    }
    public function jit_nfloat_to_float64(?jit_nfloat $p0): ?jit_float64 {
        $result = $this->ffi->jit_nfloat_to_float64($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_float64($result);
    }
    public function jit_meta_set(?jit_meta_t_ptr $p0, ?int $p1, ?void_ptr $p2, ?jit_meta_free_func $p3, ?jit_function_t $p4): ?int {
        $result = $this->ffi->jit_meta_set($p0 === null ? null : $p0->getData(), $p1, $p2 === null ? null : $p2->getData(), $p3 === null ? null : $p3->getData(), $p4 === null ? null : $p4->getData());
        return $result;
    }
    public function jit_meta_get(?jit_meta_t $p0, ?int $p1): ?void_ptr {
        $result = $this->ffi->jit_meta_get($p0 === null ? null : $p0->getData(), $p1);
        return $result === null ? null : new void_ptr($result);
    }
    public function jit_meta_free(?jit_meta_t_ptr $p0, ?int $p1): void {
        $this->ffi->jit_meta_free($p0 === null ? null : $p0->getData(), $p1);
    }
    public function jit_meta_destroy(?jit_meta_t_ptr $p0): void {
        $this->ffi->jit_meta_destroy($p0 === null ? null : $p0->getData());
    }
    public function jitom_destroy_model(?jit_objmodel_t $p0): void {
        $this->ffi->jitom_destroy_model($p0 === null ? null : $p0->getData());
    }
    public function jitom_get_class_by_name(?jit_objmodel_t $p0, ?string $p1): ?jitom_class_t {
        $result = $this->ffi->jitom_get_class_by_name($p0 === null ? null : $p0->getData(), $p1);
        return $result === null ? null : new jitom_class_t($result);
    }
    public function jitom_class_get_name(?jit_objmodel_t $p0, ?jitom_class_t $p1): ?string {
        $result = $this->ffi->jitom_class_get_name($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result;
    }
    public function jitom_class_get_modifiers(?jit_objmodel_t $p0, ?jitom_class_t $p1): ?int {
        $result = $this->ffi->jitom_class_get_modifiers($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result;
    }
    public function jitom_class_get_type(?jit_objmodel_t $p0, ?jitom_class_t $p1): ?jit_type_t {
        $result = $this->ffi->jitom_class_get_type($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_type_t($result);
    }
    public function jitom_class_get_value_type(?jit_objmodel_t $p0, ?jitom_class_t $p1): ?jit_type_t {
        $result = $this->ffi->jitom_class_get_value_type($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_type_t($result);
    }
    public function jitom_class_get_primary_super(?jit_objmodel_t $p0, ?jitom_class_t $p1): ?jitom_class_t {
        $result = $this->ffi->jitom_class_get_primary_super($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jitom_class_t($result);
    }
    public function jitom_class_get_all_supers(?jit_objmodel_t $p0, ?jitom_class_t $p1, ?int_ptr $p2): ?jitom_class_t_ptr {
        $result = $this->ffi->jitom_class_get_all_supers($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result === null ? null : new jitom_class_t_ptr($result);
    }
    public function jitom_class_get_interfaces(?jit_objmodel_t $p0, ?jitom_class_t $p1, ?int_ptr $p2): ?jitom_class_t_ptr {
        $result = $this->ffi->jitom_class_get_interfaces($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result === null ? null : new jitom_class_t_ptr($result);
    }
    public function jitom_class_get_fields(?jit_objmodel_t $p0, ?jitom_class_t $p1, ?int_ptr $p2): ?jitom_field_t_ptr {
        $result = $this->ffi->jitom_class_get_fields($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result === null ? null : new jitom_field_t_ptr($result);
    }
    public function jitom_class_get_methods(?jit_objmodel_t $p0, ?jitom_class_t $p1, ?int_ptr $p2): ?jitom_method_t_ptr {
        $result = $this->ffi->jitom_class_get_methods($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result === null ? null : new jitom_method_t_ptr($result);
    }
    public function jitom_class_new(?jit_objmodel_t $p0, ?jitom_class_t $p1, ?jitom_method_t $p2, ?jit_function_t $p3, ?jit_value_t_ptr $p4, ?int $p5, ?int $p6): ?jit_value_t {
        $result = $this->ffi->jitom_class_new($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData(), $p3 === null ? null : $p3->getData(), $p4 === null ? null : $p4->getData(), $p5, $p6);
        return $result === null ? null : new jit_value_t($result);
    }
    public function jitom_class_new_value(?jit_objmodel_t $p0, ?jitom_class_t $p1, ?jitom_method_t $p2, ?jit_function_t $p3, ?jit_value_t_ptr $p4, ?int $p5, ?int $p6): ?jit_value_t {
        $result = $this->ffi->jitom_class_new_value($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData(), $p3 === null ? null : $p3->getData(), $p4 === null ? null : $p4->getData(), $p5, $p6);
        return $result === null ? null : new jit_value_t($result);
    }
    public function jitom_class_delete(?jit_objmodel_t $p0, ?jitom_class_t $p1, ?jit_value_t $p2): ?int {
        $result = $this->ffi->jitom_class_delete($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result;
    }
    public function jitom_class_add_ref(?jit_objmodel_t $p0, ?jitom_class_t $p1, ?jit_value_t $p2): ?int {
        $result = $this->ffi->jitom_class_add_ref($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result;
    }
    public function jitom_field_get_name(?jit_objmodel_t $p0, ?jitom_class_t $p1, ?jitom_field_t $p2): ?string {
        $result = $this->ffi->jitom_field_get_name($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result;
    }
    public function jitom_field_get_type(?jit_objmodel_t $p0, ?jitom_class_t $p1, ?jitom_field_t $p2): ?jit_type_t {
        $result = $this->ffi->jitom_field_get_type($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result === null ? null : new jit_type_t($result);
    }
    public function jitom_field_get_modifiers(?jit_objmodel_t $p0, ?jitom_class_t $p1, ?jitom_field_t $p2): ?int {
        $result = $this->ffi->jitom_field_get_modifiers($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result;
    }
    public function jitom_field_load(?jit_objmodel_t $p0, ?jitom_class_t $p1, ?jitom_field_t $p2, ?jit_function_t $p3, ?jit_value_t $p4): ?jit_value_t {
        $result = $this->ffi->jitom_field_load($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData(), $p3 === null ? null : $p3->getData(), $p4 === null ? null : $p4->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jitom_field_load_address(?jit_objmodel_t $p0, ?jitom_class_t $p1, ?jitom_field_t $p2, ?jit_function_t $p3, ?jit_value_t $p4): ?jit_value_t {
        $result = $this->ffi->jitom_field_load_address($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData(), $p3 === null ? null : $p3->getData(), $p4 === null ? null : $p4->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jitom_field_store(?jit_objmodel_t $p0, ?jitom_class_t $p1, ?jitom_field_t $p2, ?jit_function_t $p3, ?jit_value_t $p4, ?jit_value_t $p5): ?int {
        $result = $this->ffi->jitom_field_store($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData(), $p3 === null ? null : $p3->getData(), $p4 === null ? null : $p4->getData(), $p5 === null ? null : $p5->getData());
        return $result;
    }
    public function jitom_method_get_name(?jit_objmodel_t $p0, ?jitom_class_t $p1, ?jitom_method_t $p2): ?string {
        $result = $this->ffi->jitom_method_get_name($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result;
    }
    public function jitom_method_get_type(?jit_objmodel_t $p0, ?jitom_class_t $p1, ?jitom_method_t $p2): ?jit_type_t {
        $result = $this->ffi->jitom_method_get_type($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result === null ? null : new jit_type_t($result);
    }
    public function jitom_method_get_modifiers(?jit_objmodel_t $p0, ?jitom_class_t $p1, ?jitom_method_t $p2): ?int {
        $result = $this->ffi->jitom_method_get_modifiers($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result;
    }
    public function jitom_method_invoke(?jit_objmodel_t $p0, ?jitom_class_t $p1, ?jitom_method_t $p2, ?jit_function_t $p3, ?jit_value_t_ptr $p4, ?int $p5, ?int $p6): ?jit_value_t {
        $result = $this->ffi->jitom_method_invoke($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData(), $p3 === null ? null : $p3->getData(), $p4 === null ? null : $p4->getData(), $p5, $p6);
        return $result === null ? null : new jit_value_t($result);
    }
    public function jitom_method_invoke_virtual(?jit_objmodel_t $p0, ?jitom_class_t $p1, ?jitom_method_t $p2, ?jit_function_t $p3, ?jit_value_t_ptr $p4, ?int $p5, ?int $p6): ?jit_value_t {
        $result = $this->ffi->jitom_method_invoke_virtual($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData(), $p3 === null ? null : $p3->getData(), $p4 === null ? null : $p4->getData(), $p5, $p6);
        return $result === null ? null : new jit_value_t($result);
    }
    public function jitom_type_tag_as_class(?jit_type_t $p0, ?jit_objmodel_t $p1, ?jitom_class_t $p2, ?int $p3): ?jit_type_t {
        $result = $this->ffi->jitom_type_tag_as_class($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData(), $p3);
        return $result === null ? null : new jit_type_t($result);
    }
    public function jitom_type_tag_as_value(?jit_type_t $p0, ?jit_objmodel_t $p1, ?jitom_class_t $p2, ?int $p3): ?jit_type_t {
        $result = $this->ffi->jitom_type_tag_as_value($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData(), $p3);
        return $result === null ? null : new jit_type_t($result);
    }
    public function jitom_type_is_class(?jit_type_t $p0): ?int {
        $result = $this->ffi->jitom_type_is_class($p0 === null ? null : $p0->getData());
        return $result;
    }
    public function jitom_type_is_value(?jit_type_t $p0): ?int {
        $result = $this->ffi->jitom_type_is_value($p0 === null ? null : $p0->getData());
        return $result;
    }
    public function jitom_type_get_model(?jit_type_t $p0): ?jit_objmodel_t {
        $result = $this->ffi->jitom_type_get_model($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_objmodel_t($result);
    }
    public function jitom_type_get_class(?jit_type_t $p0): ?jitom_class_t {
        $result = $this->ffi->jitom_type_get_class($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jitom_class_t($result);
    }
    public function jit_unwind_init(?jit_unwind_context_t_ptr $p0, ?jit_context_t $p1): ?int {
        $result = $this->ffi->jit_unwind_init($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result;
    }
    public function jit_unwind_free(?jit_unwind_context_t_ptr $p0): void {
        $this->ffi->jit_unwind_free($p0 === null ? null : $p0->getData());
    }
    public function jit_unwind_next(?jit_unwind_context_t_ptr $p0): ?int {
        $result = $this->ffi->jit_unwind_next($p0 === null ? null : $p0->getData());
        return $result;
    }
    public function jit_unwind_next_pc(?jit_unwind_context_t_ptr $p0): ?int {
        $result = $this->ffi->jit_unwind_next_pc($p0 === null ? null : $p0->getData());
        return $result;
    }
    public function jit_unwind_get_pc(?jit_unwind_context_t_ptr $p0): ?void_ptr {
        $result = $this->ffi->jit_unwind_get_pc($p0 === null ? null : $p0->getData());
        return $result === null ? null : new void_ptr($result);
    }
    public function jit_unwind_jump(?jit_unwind_context_t_ptr $p0, ?void_ptr $p1): ?int {
        $result = $this->ffi->jit_unwind_jump($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result;
    }
    public function jit_unwind_get_function(?jit_unwind_context_t_ptr $p0): ?jit_function_t {
        $result = $this->ffi->jit_unwind_get_function($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_function_t($result);
    }
    public function jit_unwind_get_offset(?jit_unwind_context_t_ptr $p0): ?int {
        $result = $this->ffi->jit_unwind_get_offset($p0 === null ? null : $p0->getData());
        return $result;
    }
    public function jit_malloc(?int $p0): ?void_ptr {
        $result = $this->ffi->jit_malloc($p0);
        return $result === null ? null : new void_ptr($result);
    }
    public function jit_calloc(?int $p0, ?int $p1): ?void_ptr {
        $result = $this->ffi->jit_calloc($p0, $p1);
        return $result === null ? null : new void_ptr($result);
    }
    public function jit_realloc(?void_ptr $p0, ?int $p1): ?void_ptr {
        $result = $this->ffi->jit_realloc($p0 === null ? null : $p0->getData(), $p1);
        return $result === null ? null : new void_ptr($result);
    }
    public function jit_free(?void_ptr $p0): void {
        $this->ffi->jit_free($p0 === null ? null : $p0->getData());
    }
    public function jit_memset(?void_ptr $p0, ?int $p1, ?int $p2): ?void_ptr {
        $result = $this->ffi->jit_memset($p0 === null ? null : $p0->getData(), $p1, $p2);
        return $result === null ? null : new void_ptr($result);
    }
    public function jit_memcpy(?void_ptr $p0, ?void_ptr $p1, ?int $p2): ?void_ptr {
        $result = $this->ffi->jit_memcpy($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2);
        return $result === null ? null : new void_ptr($result);
    }
    public function jit_memmove(?void_ptr $p0, ?void_ptr $p1, ?int $p2): ?void_ptr {
        $result = $this->ffi->jit_memmove($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2);
        return $result === null ? null : new void_ptr($result);
    }
    public function jit_memcmp(?void_ptr $p0, ?void_ptr $p1, ?int $p2): ?int {
        $result = $this->ffi->jit_memcmp($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2);
        return $result;
    }
    public function jit_memchr(?void_ptr $p0, ?int $p1, ?int $p2): ?void_ptr {
        $result = $this->ffi->jit_memchr($p0 === null ? null : $p0->getData(), $p1, $p2);
        return $result === null ? null : new void_ptr($result);
    }
    public function jit_strlen(?string $p0): ?int {
        $result = $this->ffi->jit_strlen($p0);
        return $result;
    }
    public function jit_strcpy(?string $p0, ?string $p1): ?string {
        $result = $this->ffi->jit_strcpy($p0, $p1);
        return $result;
    }
    public function jit_strcat(?string $p0, ?string $p1): ?string {
        $result = $this->ffi->jit_strcat($p0, $p1);
        return $result;
    }
    public function jit_strncpy(?string $p0, ?string $p1, ?int $p2): ?string {
        $result = $this->ffi->jit_strncpy($p0, $p1, $p2);
        return $result;
    }
    public function jit_strdup(?string $p0): ?string {
        $result = $this->ffi->jit_strdup($p0);
        return $result;
    }
    public function jit_strndup(?string $p0, ?int $p1): ?string {
        $result = $this->ffi->jit_strndup($p0, $p1);
        return $result;
    }
    public function jit_strcmp(?string $p0, ?string $p1): ?int {
        $result = $this->ffi->jit_strcmp($p0, $p1);
        return $result;
    }
    public function jit_strncmp(?string $p0, ?string $p1, ?int $p2): ?int {
        $result = $this->ffi->jit_strncmp($p0, $p1, $p2);
        return $result;
    }
    public function jit_stricmp(?string $p0, ?string $p1): ?int {
        $result = $this->ffi->jit_stricmp($p0, $p1);
        return $result;
    }
    public function jit_strnicmp(?string $p0, ?string $p1, ?int $p2): ?int {
        $result = $this->ffi->jit_strnicmp($p0, $p1, $p2);
        return $result;
    }
    public function jit_strchr(?string $p0, ?int $p1): ?string {
        $result = $this->ffi->jit_strchr($p0, $p1);
        return $result;
    }
    public function jit_strrchr(?string $p0, ?int $p1): ?string {
        $result = $this->ffi->jit_strrchr($p0, $p1);
        return $result;
    }
    public function jit_sprintf(?string $p0, ?string $p1): ?int {
        $result = $this->ffi->jit_sprintf($p0, $p1);
        return $result;
    }
    public function jit_snprintf(?string $p0, ?int $p1, ?string $p2): ?int {
        $result = $this->ffi->jit_snprintf($p0, $p1, $p2);
        return $result;
    }
    public function jit_value_create(?jit_function_t $p0, ?jit_type_t $p1): ?jit_value_t {
        $result = $this->ffi->jit_value_create($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_value_create_nint_constant(?jit_function_t $p0, ?jit_type_t $p1, ?jit_nint $p2): ?jit_value_t {
        $result = $this->ffi->jit_value_create_nint_constant($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_value_create_long_constant(?jit_function_t $p0, ?jit_type_t $p1, ?jit_long $p2): ?jit_value_t {
        $result = $this->ffi->jit_value_create_long_constant($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_value_create_float32_constant(?jit_function_t $p0, ?jit_type_t $p1, ?jit_float32 $p2): ?jit_value_t {
        $result = $this->ffi->jit_value_create_float32_constant($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_value_create_float64_constant(?jit_function_t $p0, ?jit_type_t $p1, ?jit_float64 $p2): ?jit_value_t {
        $result = $this->ffi->jit_value_create_float64_constant($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_value_create_nfloat_constant(?jit_function_t $p0, ?jit_type_t $p1, ?jit_nfloat $p2): ?jit_value_t {
        $result = $this->ffi->jit_value_create_nfloat_constant($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_value_create_constant(?jit_function_t $p0, ?jit_constant_t_ptr $p1): ?jit_value_t {
        $result = $this->ffi->jit_value_create_constant($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_value_get_param(?jit_function_t $p0, ?int $p1): ?jit_value_t {
        $result = $this->ffi->jit_value_get_param($p0 === null ? null : $p0->getData(), $p1);
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_value_get_struct_pointer(?jit_function_t $p0): ?jit_value_t {
        $result = $this->ffi->jit_value_get_struct_pointer($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_value_t($result);
    }
    public function jit_value_is_temporary(?jit_value_t $p0): ?int {
        $result = $this->ffi->jit_value_is_temporary($p0 === null ? null : $p0->getData());
        return $result;
    }
    public function jit_value_is_local(?jit_value_t $p0): ?int {
        $result = $this->ffi->jit_value_is_local($p0 === null ? null : $p0->getData());
        return $result;
    }
    public function jit_value_is_constant(?jit_value_t $p0): ?int {
        $result = $this->ffi->jit_value_is_constant($p0 === null ? null : $p0->getData());
        return $result;
    }
    public function jit_value_is_parameter(?jit_value_t $p0): ?int {
        $result = $this->ffi->jit_value_is_parameter($p0 === null ? null : $p0->getData());
        return $result;
    }
    public function jit_value_ref(?jit_function_t $p0, ?jit_value_t $p1): void {
        $this->ffi->jit_value_ref($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
    }
    public function jit_value_set_volatile(?jit_value_t $p0): void {
        $this->ffi->jit_value_set_volatile($p0 === null ? null : $p0->getData());
    }
    public function jit_value_is_volatile(?jit_value_t $p0): ?int {
        $result = $this->ffi->jit_value_is_volatile($p0 === null ? null : $p0->getData());
        return $result;
    }
    public function jit_value_set_addressable(?jit_value_t $p0): void {
        $this->ffi->jit_value_set_addressable($p0 === null ? null : $p0->getData());
    }
    public function jit_value_is_addressable(?jit_value_t $p0): ?int {
        $result = $this->ffi->jit_value_is_addressable($p0 === null ? null : $p0->getData());
        return $result;
    }
    public function jit_value_get_type(?jit_value_t $p0): ?jit_type_t {
        $result = $this->ffi->jit_value_get_type($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_type_t($result);
    }
    public function jit_value_get_function(?jit_value_t $p0): ?jit_function_t {
        $result = $this->ffi->jit_value_get_function($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_function_t($result);
    }
    public function jit_value_get_block(?jit_value_t $p0): ?jit_block_t {
        $result = $this->ffi->jit_value_get_block($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_block_t($result);
    }
    public function jit_value_get_context(?jit_value_t $p0): ?jit_context_t {
        $result = $this->ffi->jit_value_get_context($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_context_t($result);
    }
    public function jit_value_get_constant(?jit_value_t $p0): ?jit_constant_t {
        $result = $this->ffi->jit_value_get_constant($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_constant_t($result);
    }
    public function jit_value_get_nint_constant(?jit_value_t $p0): ?jit_nint {
        $result = $this->ffi->jit_value_get_nint_constant($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_nint($result);
    }
    public function jit_value_get_long_constant(?jit_value_t $p0): ?jit_long {
        $result = $this->ffi->jit_value_get_long_constant($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_long($result);
    }
    public function jit_value_get_float32_constant(?jit_value_t $p0): ?jit_float32 {
        $result = $this->ffi->jit_value_get_float32_constant($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_float32($result);
    }
    public function jit_value_get_float64_constant(?jit_value_t $p0): ?jit_float64 {
        $result = $this->ffi->jit_value_get_float64_constant($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_float64($result);
    }
    public function jit_value_get_nfloat_constant(?jit_value_t $p0): ?jit_nfloat {
        $result = $this->ffi->jit_value_get_nfloat_constant($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_nfloat($result);
    }
    public function jit_value_is_true(?jit_value_t $p0): ?int {
        $result = $this->ffi->jit_value_is_true($p0 === null ? null : $p0->getData());
        return $result;
    }
    public function jit_constant_convert(?jit_constant_t_ptr $p0, ?jit_constant_t_ptr $p1, ?jit_type_t $p2, ?int $p3): ?int {
        $result = $this->ffi->jit_constant_convert($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData(), $p3);
        return $result;
    }
    public function jit_vmem_init(): void {
        $this->ffi->jit_vmem_init();
    }
    public function jit_vmem_page_size(): ?jit_uint {
        $result = $this->ffi->jit_vmem_page_size();
        return $result === null ? null : new jit_uint($result);
    }
    public function jit_vmem_round_up(?jit_nuint $p0): ?jit_nuint {
        $result = $this->ffi->jit_vmem_round_up($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_nuint($result);
    }
    public function jit_vmem_round_down(?jit_nuint $p0): ?jit_nuint {
        $result = $this->ffi->jit_vmem_round_down($p0 === null ? null : $p0->getData());
        return $result === null ? null : new jit_nuint($result);
    }
    public function jit_vmem_reserve(?jit_uint $p0): ?void_ptr {
        $result = $this->ffi->jit_vmem_reserve($p0 === null ? null : $p0->getData());
        return $result === null ? null : new void_ptr($result);
    }
    public function jit_vmem_reserve_committed(?jit_uint $p0, ?jit_prot_t $p1): ?void_ptr {
        $result = $this->ffi->jit_vmem_reserve_committed($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result === null ? null : new void_ptr($result);
    }
    public function jit_vmem_release(?void_ptr $p0, ?jit_uint $p1): ?int {
        $result = $this->ffi->jit_vmem_release($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result;
    }
    public function jit_vmem_commit(?void_ptr $p0, ?jit_uint $p1, ?jit_prot_t $p2): ?int {
        $result = $this->ffi->jit_vmem_commit($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result;
    }
    public function jit_vmem_decommit(?void_ptr $p0, ?jit_uint $p1): ?int {
        $result = $this->ffi->jit_vmem_decommit($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result;
    }
    public function jit_vmem_protect(?void_ptr $p0, ?jit_uint $p1, ?jit_prot_t $p2): ?int {
        $result = $this->ffi->jit_vmem_protect($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result;
    }
    public function _jit_get_frame_address(?void_ptr $p0, ?int $p1): ?void_ptr {
        $result = $this->ffi->_jit_get_frame_address($p0 === null ? null : $p0->getData(), $p1);
        return $result === null ? null : new void_ptr($result);
    }
    public function _jit_get_next_frame_address(?void_ptr $p0): ?void_ptr {
        $result = $this->ffi->_jit_get_next_frame_address($p0 === null ? null : $p0->getData());
        return $result === null ? null : new void_ptr($result);
    }
    public function _jit_get_return_address(?void_ptr $p0, ?void_ptr $p1, ?void_ptr $p2): ?void_ptr {
        $result = $this->ffi->_jit_get_return_address($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
        return $result === null ? null : new void_ptr($result);
    }
    public function jit_frame_contains_crawl_mark(?void_ptr $p0, ?jit_crawl_mark_t_ptr $p1): ?int {
        $result = $this->ffi->jit_frame_contains_crawl_mark($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
        return $result;
    }
}

class jit_sbyte implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_sbyte $other): bool { return $this->data == $other->data; }
    public function addr(): jit_sbyte_ptr { return new jit_sbyte_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'jit_sbyte'; }
}
class jit_sbyte_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_sbyte_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_sbyte_ptr_ptr { return new jit_sbyte_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_sbyte { return new jit_sbyte($this->data[$n]); }
    public static function getType(): string { return 'jit_sbyte*'; }
}
class jit_sbyte_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_sbyte_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_sbyte_ptr_ptr_ptr { return new jit_sbyte_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_sbyte_ptr { return new jit_sbyte_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_sbyte**'; }
}
class jit_sbyte_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_sbyte_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_sbyte_ptr_ptr_ptr_ptr { return new jit_sbyte_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_sbyte_ptr_ptr { return new jit_sbyte_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_sbyte***'; }
}
class jit_sbyte_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_sbyte_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_sbyte_ptr_ptr_ptr_ptr_ptr { return new jit_sbyte_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_sbyte_ptr_ptr_ptr { return new jit_sbyte_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_sbyte****'; }
}
class jit_ubyte implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_ubyte $other): bool { return $this->data == $other->data; }
    public function addr(): jit_ubyte_ptr { return new jit_ubyte_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'jit_ubyte'; }
}
class jit_ubyte_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_ubyte_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_ubyte_ptr_ptr { return new jit_ubyte_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_ubyte { return new jit_ubyte($this->data[$n]); }
    public static function getType(): string { return 'jit_ubyte*'; }
}
class jit_ubyte_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_ubyte_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_ubyte_ptr_ptr_ptr { return new jit_ubyte_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_ubyte_ptr { return new jit_ubyte_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_ubyte**'; }
}
class jit_ubyte_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_ubyte_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_ubyte_ptr_ptr_ptr_ptr { return new jit_ubyte_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_ubyte_ptr_ptr { return new jit_ubyte_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_ubyte***'; }
}
class jit_ubyte_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_ubyte_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_ubyte_ptr_ptr_ptr_ptr_ptr { return new jit_ubyte_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_ubyte_ptr_ptr_ptr { return new jit_ubyte_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_ubyte****'; }
}
class jit_short implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_short $other): bool { return $this->data == $other->data; }
    public function addr(): jit_short_ptr { return new jit_short_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'jit_short'; }
}
class jit_short_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_short_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_short_ptr_ptr { return new jit_short_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_short { return new jit_short($this->data[$n]); }
    public static function getType(): string { return 'jit_short*'; }
}
class jit_short_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_short_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_short_ptr_ptr_ptr { return new jit_short_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_short_ptr { return new jit_short_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_short**'; }
}
class jit_short_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_short_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_short_ptr_ptr_ptr_ptr { return new jit_short_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_short_ptr_ptr { return new jit_short_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_short***'; }
}
class jit_short_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_short_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_short_ptr_ptr_ptr_ptr_ptr { return new jit_short_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_short_ptr_ptr_ptr { return new jit_short_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_short****'; }
}
class jit_ushort implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_ushort $other): bool { return $this->data == $other->data; }
    public function addr(): jit_ushort_ptr { return new jit_ushort_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'jit_ushort'; }
}
class jit_ushort_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_ushort_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_ushort_ptr_ptr { return new jit_ushort_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_ushort { return new jit_ushort($this->data[$n]); }
    public static function getType(): string { return 'jit_ushort*'; }
}
class jit_ushort_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_ushort_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_ushort_ptr_ptr_ptr { return new jit_ushort_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_ushort_ptr { return new jit_ushort_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_ushort**'; }
}
class jit_ushort_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_ushort_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_ushort_ptr_ptr_ptr_ptr { return new jit_ushort_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_ushort_ptr_ptr { return new jit_ushort_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_ushort***'; }
}
class jit_ushort_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_ushort_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_ushort_ptr_ptr_ptr_ptr_ptr { return new jit_ushort_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_ushort_ptr_ptr_ptr { return new jit_ushort_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_ushort****'; }
}
class jit_int implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_int $other): bool { return $this->data == $other->data; }
    public function addr(): jit_int_ptr { return new jit_int_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'jit_int'; }
}
class jit_int_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_int_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_int_ptr_ptr { return new jit_int_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_int { return new jit_int($this->data[$n]); }
    public static function getType(): string { return 'jit_int*'; }
}
class jit_int_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_int_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_int_ptr_ptr_ptr { return new jit_int_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_int_ptr { return new jit_int_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_int**'; }
}
class jit_int_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_int_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_int_ptr_ptr_ptr_ptr { return new jit_int_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_int_ptr_ptr { return new jit_int_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_int***'; }
}
class jit_int_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_int_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_int_ptr_ptr_ptr_ptr_ptr { return new jit_int_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_int_ptr_ptr_ptr { return new jit_int_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_int****'; }
}
class jit_uint implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_uint $other): bool { return $this->data == $other->data; }
    public function addr(): jit_uint_ptr { return new jit_uint_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'jit_uint'; }
}
class jit_uint_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_uint_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_uint_ptr_ptr { return new jit_uint_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_uint { return new jit_uint($this->data[$n]); }
    public static function getType(): string { return 'jit_uint*'; }
}
class jit_uint_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_uint_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_uint_ptr_ptr_ptr { return new jit_uint_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_uint_ptr { return new jit_uint_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_uint**'; }
}
class jit_uint_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_uint_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_uint_ptr_ptr_ptr_ptr { return new jit_uint_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_uint_ptr_ptr { return new jit_uint_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_uint***'; }
}
class jit_uint_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_uint_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_uint_ptr_ptr_ptr_ptr_ptr { return new jit_uint_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_uint_ptr_ptr_ptr { return new jit_uint_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_uint****'; }
}
class jit_nint implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_nint $other): bool { return $this->data == $other->data; }
    public function addr(): jit_nint_ptr { return new jit_nint_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'jit_nint'; }
}
class jit_nint_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_nint_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_nint_ptr_ptr { return new jit_nint_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_nint { return new jit_nint($this->data[$n]); }
    public static function getType(): string { return 'jit_nint*'; }
}
class jit_nint_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_nint_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_nint_ptr_ptr_ptr { return new jit_nint_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_nint_ptr { return new jit_nint_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_nint**'; }
}
class jit_nint_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_nint_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_nint_ptr_ptr_ptr_ptr { return new jit_nint_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_nint_ptr_ptr { return new jit_nint_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_nint***'; }
}
class jit_nint_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_nint_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_nint_ptr_ptr_ptr_ptr_ptr { return new jit_nint_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_nint_ptr_ptr_ptr { return new jit_nint_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_nint****'; }
}
class jit_nuint implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_nuint $other): bool { return $this->data == $other->data; }
    public function addr(): jit_nuint_ptr { return new jit_nuint_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'jit_nuint'; }
}
class jit_nuint_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_nuint_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_nuint_ptr_ptr { return new jit_nuint_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_nuint { return new jit_nuint($this->data[$n]); }
    public static function getType(): string { return 'jit_nuint*'; }
}
class jit_nuint_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_nuint_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_nuint_ptr_ptr_ptr { return new jit_nuint_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_nuint_ptr { return new jit_nuint_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_nuint**'; }
}
class jit_nuint_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_nuint_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_nuint_ptr_ptr_ptr_ptr { return new jit_nuint_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_nuint_ptr_ptr { return new jit_nuint_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_nuint***'; }
}
class jit_nuint_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_nuint_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_nuint_ptr_ptr_ptr_ptr_ptr { return new jit_nuint_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_nuint_ptr_ptr_ptr { return new jit_nuint_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_nuint****'; }
}
class jit_long implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_long $other): bool { return $this->data == $other->data; }
    public function addr(): jit_long_ptr { return new jit_long_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'jit_long'; }
}
class jit_long_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_long_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_long_ptr_ptr { return new jit_long_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_long { return new jit_long($this->data[$n]); }
    public static function getType(): string { return 'jit_long*'; }
}
class jit_long_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_long_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_long_ptr_ptr_ptr { return new jit_long_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_long_ptr { return new jit_long_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_long**'; }
}
class jit_long_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_long_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_long_ptr_ptr_ptr_ptr { return new jit_long_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_long_ptr_ptr { return new jit_long_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_long***'; }
}
class jit_long_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_long_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_long_ptr_ptr_ptr_ptr_ptr { return new jit_long_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_long_ptr_ptr_ptr { return new jit_long_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_long****'; }
}
class jit_ulong implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_ulong $other): bool { return $this->data == $other->data; }
    public function addr(): jit_ulong_ptr { return new jit_ulong_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'jit_ulong'; }
}
class jit_ulong_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_ulong_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_ulong_ptr_ptr { return new jit_ulong_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_ulong { return new jit_ulong($this->data[$n]); }
    public static function getType(): string { return 'jit_ulong*'; }
}
class jit_ulong_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_ulong_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_ulong_ptr_ptr_ptr { return new jit_ulong_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_ulong_ptr { return new jit_ulong_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_ulong**'; }
}
class jit_ulong_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_ulong_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_ulong_ptr_ptr_ptr_ptr { return new jit_ulong_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_ulong_ptr_ptr { return new jit_ulong_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_ulong***'; }
}
class jit_ulong_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_ulong_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_ulong_ptr_ptr_ptr_ptr_ptr { return new jit_ulong_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_ulong_ptr_ptr_ptr { return new jit_ulong_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_ulong****'; }
}
class jit_float32 implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_float32 $other): bool { return $this->data == $other->data; }
    public function addr(): jit_float32_ptr { return new jit_float32_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'jit_float32'; }
}
class jit_float32_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_float32_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_float32_ptr_ptr { return new jit_float32_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_float32 { return new jit_float32($this->data[$n]); }
    public static function getType(): string { return 'jit_float32*'; }
}
class jit_float32_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_float32_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_float32_ptr_ptr_ptr { return new jit_float32_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_float32_ptr { return new jit_float32_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_float32**'; }
}
class jit_float32_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_float32_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_float32_ptr_ptr_ptr_ptr { return new jit_float32_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_float32_ptr_ptr { return new jit_float32_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_float32***'; }
}
class jit_float32_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_float32_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_float32_ptr_ptr_ptr_ptr_ptr { return new jit_float32_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_float32_ptr_ptr_ptr { return new jit_float32_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_float32****'; }
}
class jit_float64 implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_float64 $other): bool { return $this->data == $other->data; }
    public function addr(): jit_float64_ptr { return new jit_float64_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'jit_float64'; }
}
class jit_float64_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_float64_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_float64_ptr_ptr { return new jit_float64_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_float64 { return new jit_float64($this->data[$n]); }
    public static function getType(): string { return 'jit_float64*'; }
}
class jit_float64_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_float64_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_float64_ptr_ptr_ptr { return new jit_float64_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_float64_ptr { return new jit_float64_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_float64**'; }
}
class jit_float64_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_float64_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_float64_ptr_ptr_ptr_ptr { return new jit_float64_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_float64_ptr_ptr { return new jit_float64_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_float64***'; }
}
class jit_float64_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_float64_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_float64_ptr_ptr_ptr_ptr_ptr { return new jit_float64_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_float64_ptr_ptr_ptr { return new jit_float64_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_float64****'; }
}
class jit_nfloat implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_nfloat $other): bool { return $this->data == $other->data; }
    public function addr(): jit_nfloat_ptr { return new jit_nfloat_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'jit_nfloat'; }
}
class jit_nfloat_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_nfloat_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_nfloat_ptr_ptr { return new jit_nfloat_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_nfloat { return new jit_nfloat($this->data[$n]); }
    public static function getType(): string { return 'jit_nfloat*'; }
}
class jit_nfloat_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_nfloat_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_nfloat_ptr_ptr_ptr { return new jit_nfloat_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_nfloat_ptr { return new jit_nfloat_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_nfloat**'; }
}
class jit_nfloat_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_nfloat_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_nfloat_ptr_ptr_ptr_ptr { return new jit_nfloat_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_nfloat_ptr_ptr { return new jit_nfloat_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_nfloat***'; }
}
class jit_nfloat_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_nfloat_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_nfloat_ptr_ptr_ptr_ptr_ptr { return new jit_nfloat_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_nfloat_ptr_ptr_ptr { return new jit_nfloat_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_nfloat****'; }
}
class jit_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_ptr_ptr { return new jit_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit { return new jit($this->data[$n]); }
    public static function getType(): string { return 'jit_ptr'; }
}
class jit_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_ptr_ptr_ptr { return new jit_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_ptr { return new jit_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_ptr*'; }
}
class jit_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_ptr_ptr_ptr_ptr { return new jit_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_ptr_ptr { return new jit_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_ptr**'; }
}
class jit_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_ptr_ptr_ptr_ptr_ptr { return new jit_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_ptr_ptr_ptr { return new jit_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_ptr***'; }
}
class jit_ptr_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_ptr_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_ptr_ptr_ptr_ptr_ptr_ptr { return new jit_ptr_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_ptr_ptr_ptr_ptr { return new jit_ptr_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_ptr****'; }
}
class jit_context_t implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_context_t $other): bool { return $this->data == $other->data; }
    public function addr(): jit_context_t_ptr { return new jit_context_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'jit_context_t'; }
}
class jit_context_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_context_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_context_t_ptr_ptr { return new jit_context_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_context_t { return new jit_context_t($this->data[$n]); }
    public static function getType(): string { return 'jit_context_t*'; }
}
class jit_context_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_context_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_context_t_ptr_ptr_ptr { return new jit_context_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_context_t_ptr { return new jit_context_t_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_context_t**'; }
}
class jit_context_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_context_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_context_t_ptr_ptr_ptr_ptr { return new jit_context_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_context_t_ptr_ptr { return new jit_context_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_context_t***'; }
}
class jit_context_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_context_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_context_t_ptr_ptr_ptr_ptr_ptr { return new jit_context_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_context_t_ptr_ptr_ptr { return new jit_context_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_context_t****'; }
}
class jit_function_t implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_function_t $other): bool { return $this->data == $other->data; }
    public function addr(): jit_function_t_ptr { return new jit_function_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'jit_function_t'; }
}
class jit_function_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_function_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_function_t_ptr_ptr { return new jit_function_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_function_t { return new jit_function_t($this->data[$n]); }
    public static function getType(): string { return 'jit_function_t*'; }
}
class jit_function_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_function_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_function_t_ptr_ptr_ptr { return new jit_function_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_function_t_ptr { return new jit_function_t_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_function_t**'; }
}
class jit_function_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_function_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_function_t_ptr_ptr_ptr_ptr { return new jit_function_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_function_t_ptr_ptr { return new jit_function_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_function_t***'; }
}
class jit_function_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_function_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_function_t_ptr_ptr_ptr_ptr_ptr { return new jit_function_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_function_t_ptr_ptr_ptr { return new jit_function_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_function_t****'; }
}
class jit_block_t implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_block_t $other): bool { return $this->data == $other->data; }
    public function addr(): jit_block_t_ptr { return new jit_block_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'jit_block_t'; }
}
class jit_block_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_block_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_block_t_ptr_ptr { return new jit_block_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_block_t { return new jit_block_t($this->data[$n]); }
    public static function getType(): string { return 'jit_block_t*'; }
}
class jit_block_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_block_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_block_t_ptr_ptr_ptr { return new jit_block_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_block_t_ptr { return new jit_block_t_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_block_t**'; }
}
class jit_block_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_block_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_block_t_ptr_ptr_ptr_ptr { return new jit_block_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_block_t_ptr_ptr { return new jit_block_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_block_t***'; }
}
class jit_block_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_block_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_block_t_ptr_ptr_ptr_ptr_ptr { return new jit_block_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_block_t_ptr_ptr_ptr { return new jit_block_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_block_t****'; }
}
class jit_insn_t implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_insn_t $other): bool { return $this->data == $other->data; }
    public function addr(): jit_insn_t_ptr { return new jit_insn_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'jit_insn_t'; }
}
class jit_insn_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_insn_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_insn_t_ptr_ptr { return new jit_insn_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_insn_t { return new jit_insn_t($this->data[$n]); }
    public static function getType(): string { return 'jit_insn_t*'; }
}
class jit_insn_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_insn_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_insn_t_ptr_ptr_ptr { return new jit_insn_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_insn_t_ptr { return new jit_insn_t_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_insn_t**'; }
}
class jit_insn_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_insn_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_insn_t_ptr_ptr_ptr_ptr { return new jit_insn_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_insn_t_ptr_ptr { return new jit_insn_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_insn_t***'; }
}
class jit_insn_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_insn_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_insn_t_ptr_ptr_ptr_ptr_ptr { return new jit_insn_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_insn_t_ptr_ptr_ptr { return new jit_insn_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_insn_t****'; }
}
class jit_value_t implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_value_t $other): bool { return $this->data == $other->data; }
    public function addr(): jit_value_t_ptr { return new jit_value_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'jit_value_t'; }
}
class jit_value_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_value_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_value_t_ptr_ptr { return new jit_value_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_value_t { return new jit_value_t($this->data[$n]); }
    public static function getType(): string { return 'jit_value_t*'; }
}
class jit_value_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_value_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_value_t_ptr_ptr_ptr { return new jit_value_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_value_t_ptr { return new jit_value_t_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_value_t**'; }
}
class jit_value_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_value_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_value_t_ptr_ptr_ptr_ptr { return new jit_value_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_value_t_ptr_ptr { return new jit_value_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_value_t***'; }
}
class jit_value_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_value_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_value_t_ptr_ptr_ptr_ptr_ptr { return new jit_value_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_value_t_ptr_ptr_ptr { return new jit_value_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_value_t****'; }
}
class jit_type_t implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_type_t $other): bool { return $this->data == $other->data; }
    public function addr(): jit_type_t_ptr { return new jit_type_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'jit_type_t'; }
}
class jit_type_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_type_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_type_t_ptr_ptr { return new jit_type_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_type_t { return new jit_type_t($this->data[$n]); }
    public static function getType(): string { return 'jit_type_t*'; }
}
class jit_type_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_type_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_type_t_ptr_ptr_ptr { return new jit_type_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_type_t_ptr { return new jit_type_t_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_type_t**'; }
}
class jit_type_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_type_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_type_t_ptr_ptr_ptr_ptr { return new jit_type_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_type_t_ptr_ptr { return new jit_type_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_type_t***'; }
}
class jit_type_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_type_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_type_t_ptr_ptr_ptr_ptr_ptr { return new jit_type_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_type_t_ptr_ptr_ptr { return new jit_type_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_type_t****'; }
}
class jit_stack_trace_t implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_stack_trace_t $other): bool { return $this->data == $other->data; }
    public function addr(): jit_stack_trace_t_ptr { return new jit_stack_trace_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'jit_stack_trace_t'; }
}
class jit_stack_trace_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_stack_trace_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_stack_trace_t_ptr_ptr { return new jit_stack_trace_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_stack_trace_t { return new jit_stack_trace_t($this->data[$n]); }
    public static function getType(): string { return 'jit_stack_trace_t*'; }
}
class jit_stack_trace_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_stack_trace_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_stack_trace_t_ptr_ptr_ptr { return new jit_stack_trace_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_stack_trace_t_ptr { return new jit_stack_trace_t_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_stack_trace_t**'; }
}
class jit_stack_trace_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_stack_trace_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_stack_trace_t_ptr_ptr_ptr_ptr { return new jit_stack_trace_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_stack_trace_t_ptr_ptr { return new jit_stack_trace_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_stack_trace_t***'; }
}
class jit_stack_trace_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_stack_trace_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_stack_trace_t_ptr_ptr_ptr_ptr_ptr { return new jit_stack_trace_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_stack_trace_t_ptr_ptr_ptr { return new jit_stack_trace_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_stack_trace_t****'; }
}
class jit_label_t implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_label_t $other): bool { return $this->data == $other->data; }
    public function addr(): jit_label_t_ptr { return new jit_label_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'jit_label_t'; }
}
class jit_label_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_label_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_label_t_ptr_ptr { return new jit_label_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_label_t { return new jit_label_t($this->data[$n]); }
    public static function getType(): string { return 'jit_label_t*'; }
}
class jit_label_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_label_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_label_t_ptr_ptr_ptr { return new jit_label_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_label_t_ptr { return new jit_label_t_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_label_t**'; }
}
class jit_label_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_label_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_label_t_ptr_ptr_ptr_ptr { return new jit_label_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_label_t_ptr_ptr { return new jit_label_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_label_t***'; }
}
class jit_label_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_label_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_label_t_ptr_ptr_ptr_ptr_ptr { return new jit_label_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_label_t_ptr_ptr_ptr { return new jit_label_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_label_t****'; }
}
class jit_meta_free_func implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_meta_free_func $other): bool { return $this->data == $other->data; }
    public function addr(): jit_meta_free_func_ptr { return new jit_meta_free_func_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'jit_meta_free_func'; }
}
class jit_meta_free_func_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_meta_free_func_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_meta_free_func_ptr_ptr { return new jit_meta_free_func_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_meta_free_func { return new jit_meta_free_func($this->data[$n]); }
    public static function getType(): string { return 'jit_meta_free_func*'; }
}
class jit_meta_free_func_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_meta_free_func_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_meta_free_func_ptr_ptr_ptr { return new jit_meta_free_func_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_meta_free_func_ptr { return new jit_meta_free_func_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_meta_free_func**'; }
}
class jit_meta_free_func_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_meta_free_func_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_meta_free_func_ptr_ptr_ptr_ptr { return new jit_meta_free_func_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_meta_free_func_ptr_ptr { return new jit_meta_free_func_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_meta_free_func***'; }
}
class jit_meta_free_func_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_meta_free_func_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_meta_free_func_ptr_ptr_ptr_ptr_ptr { return new jit_meta_free_func_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_meta_free_func_ptr_ptr_ptr { return new jit_meta_free_func_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_meta_free_func****'; }
}
class jit_on_demand_func implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_on_demand_func $other): bool { return $this->data == $other->data; }
    public function addr(): jit_on_demand_func_ptr { return new jit_on_demand_func_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'jit_on_demand_func'; }
}
class jit_on_demand_func_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_on_demand_func_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_on_demand_func_ptr_ptr { return new jit_on_demand_func_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_on_demand_func { return new jit_on_demand_func($this->data[$n]); }
    public static function getType(): string { return 'jit_on_demand_func*'; }
}
class jit_on_demand_func_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_on_demand_func_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_on_demand_func_ptr_ptr_ptr { return new jit_on_demand_func_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_on_demand_func_ptr { return new jit_on_demand_func_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_on_demand_func**'; }
}
class jit_on_demand_func_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_on_demand_func_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_on_demand_func_ptr_ptr_ptr_ptr { return new jit_on_demand_func_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_on_demand_func_ptr_ptr { return new jit_on_demand_func_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_on_demand_func***'; }
}
class jit_on_demand_func_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_on_demand_func_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_on_demand_func_ptr_ptr_ptr_ptr_ptr { return new jit_on_demand_func_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_on_demand_func_ptr_ptr_ptr { return new jit_on_demand_func_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_on_demand_func****'; }
}
class jit_on_demand_driver_func implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_on_demand_driver_func $other): bool { return $this->data == $other->data; }
    public function addr(): jit_on_demand_driver_func_ptr { return new jit_on_demand_driver_func_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'jit_on_demand_driver_func'; }
}
class jit_on_demand_driver_func_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_on_demand_driver_func_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_on_demand_driver_func_ptr_ptr { return new jit_on_demand_driver_func_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_on_demand_driver_func { return new jit_on_demand_driver_func($this->data[$n]); }
    public static function getType(): string { return 'jit_on_demand_driver_func*'; }
}
class jit_on_demand_driver_func_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_on_demand_driver_func_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_on_demand_driver_func_ptr_ptr_ptr { return new jit_on_demand_driver_func_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_on_demand_driver_func_ptr { return new jit_on_demand_driver_func_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_on_demand_driver_func**'; }
}
class jit_on_demand_driver_func_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_on_demand_driver_func_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_on_demand_driver_func_ptr_ptr_ptr_ptr { return new jit_on_demand_driver_func_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_on_demand_driver_func_ptr_ptr { return new jit_on_demand_driver_func_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_on_demand_driver_func***'; }
}
class jit_on_demand_driver_func_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_on_demand_driver_func_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_on_demand_driver_func_ptr_ptr_ptr_ptr_ptr { return new jit_on_demand_driver_func_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_on_demand_driver_func_ptr_ptr_ptr { return new jit_on_demand_driver_func_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_on_demand_driver_func****'; }
}
class jit_size_t implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_size_t $other): bool { return $this->data == $other->data; }
    public function addr(): jit_size_t_ptr { return new jit_size_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'jit_size_t'; }
}
class jit_size_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_size_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_size_t_ptr_ptr { return new jit_size_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_size_t { return new jit_size_t($this->data[$n]); }
    public static function getType(): string { return 'jit_size_t*'; }
}
class jit_size_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_size_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_size_t_ptr_ptr_ptr { return new jit_size_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_size_t_ptr { return new jit_size_t_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_size_t**'; }
}
class jit_size_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_size_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_size_t_ptr_ptr_ptr_ptr { return new jit_size_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_size_t_ptr_ptr { return new jit_size_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_size_t***'; }
}
class jit_size_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_size_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_size_t_ptr_ptr_ptr_ptr_ptr { return new jit_size_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_size_t_ptr_ptr_ptr { return new jit_size_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_size_t****'; }
}
class jit_memory_context_t implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_memory_context_t $other): bool { return $this->data == $other->data; }
    public function addr(): jit_memory_context_t_ptr { return new jit_memory_context_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'jit_memory_context_t'; }
}
class jit_memory_context_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_memory_context_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_memory_context_t_ptr_ptr { return new jit_memory_context_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_memory_context_t { return new jit_memory_context_t($this->data[$n]); }
    public static function getType(): string { return 'jit_memory_context_t*'; }
}
class jit_memory_context_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_memory_context_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_memory_context_t_ptr_ptr_ptr { return new jit_memory_context_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_memory_context_t_ptr { return new jit_memory_context_t_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_memory_context_t**'; }
}
class jit_memory_context_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_memory_context_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_memory_context_t_ptr_ptr_ptr_ptr { return new jit_memory_context_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_memory_context_t_ptr_ptr { return new jit_memory_context_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_memory_context_t***'; }
}
class jit_memory_context_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_memory_context_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_memory_context_t_ptr_ptr_ptr_ptr_ptr { return new jit_memory_context_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_memory_context_t_ptr_ptr_ptr { return new jit_memory_context_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_memory_context_t****'; }
}
class jit_function_info_t implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_function_info_t $other): bool { return $this->data == $other->data; }
    public function addr(): jit_function_info_t_ptr { return new jit_function_info_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'jit_function_info_t'; }
}
class jit_function_info_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_function_info_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_function_info_t_ptr_ptr { return new jit_function_info_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_function_info_t { return new jit_function_info_t($this->data[$n]); }
    public static function getType(): string { return 'jit_function_info_t*'; }
}
class jit_function_info_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_function_info_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_function_info_t_ptr_ptr_ptr { return new jit_function_info_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_function_info_t_ptr { return new jit_function_info_t_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_function_info_t**'; }
}
class jit_function_info_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_function_info_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_function_info_t_ptr_ptr_ptr_ptr { return new jit_function_info_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_function_info_t_ptr_ptr { return new jit_function_info_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_function_info_t***'; }
}
class jit_function_info_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_function_info_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_function_info_t_ptr_ptr_ptr_ptr_ptr { return new jit_function_info_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_function_info_t_ptr_ptr_ptr { return new jit_function_info_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_function_info_t****'; }
}
class jit_memory_manager_t implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_memory_manager_t $other): bool { return $this->data == $other->data; }
    public function addr(): jit_memory_manager_t_ptr { return new jit_memory_manager_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'jit_memory_manager_t'; }
}
class jit_memory_manager_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_memory_manager_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_memory_manager_t_ptr_ptr { return new jit_memory_manager_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_memory_manager_t { return new jit_memory_manager_t($this->data[$n]); }
    public static function getType(): string { return 'jit_memory_manager_t*'; }
}
class jit_memory_manager_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_memory_manager_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_memory_manager_t_ptr_ptr_ptr { return new jit_memory_manager_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_memory_manager_t_ptr { return new jit_memory_manager_t_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_memory_manager_t**'; }
}
class jit_memory_manager_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_memory_manager_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_memory_manager_t_ptr_ptr_ptr_ptr { return new jit_memory_manager_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_memory_manager_t_ptr_ptr { return new jit_memory_manager_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_memory_manager_t***'; }
}
class jit_memory_manager_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_memory_manager_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_memory_manager_t_ptr_ptr_ptr_ptr_ptr { return new jit_memory_manager_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_memory_manager_t_ptr_ptr_ptr { return new jit_memory_manager_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_memory_manager_t****'; }
}
class jit_abi_t implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_abi_t $other): bool { return $this->data == $other->data; }
    public function addr(): jit_abi_t_ptr { return new jit_abi_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'jit_abi_t'; }
}
class jit_abi_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_abi_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_abi_t_ptr_ptr { return new jit_abi_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_abi_t { return new jit_abi_t($this->data[$n]); }
    public static function getType(): string { return 'jit_abi_t*'; }
}
class jit_abi_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_abi_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_abi_t_ptr_ptr_ptr { return new jit_abi_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_abi_t_ptr { return new jit_abi_t_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_abi_t**'; }
}
class jit_abi_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_abi_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_abi_t_ptr_ptr_ptr_ptr { return new jit_abi_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_abi_t_ptr_ptr { return new jit_abi_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_abi_t***'; }
}
class jit_abi_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_abi_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_abi_t_ptr_ptr_ptr_ptr_ptr { return new jit_abi_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_abi_t_ptr_ptr_ptr { return new jit_abi_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_abi_t****'; }
}
class jit_closure_func implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_closure_func $other): bool { return $this->data == $other->data; }
    public function addr(): jit_closure_func_ptr { return new jit_closure_func_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'jit_closure_func'; }
}
class jit_closure_func_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_closure_func_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_closure_func_ptr_ptr { return new jit_closure_func_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_closure_func { return new jit_closure_func($this->data[$n]); }
    public static function getType(): string { return 'jit_closure_func*'; }
}
class jit_closure_func_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_closure_func_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_closure_func_ptr_ptr_ptr { return new jit_closure_func_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_closure_func_ptr { return new jit_closure_func_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_closure_func**'; }
}
class jit_closure_func_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_closure_func_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_closure_func_ptr_ptr_ptr_ptr { return new jit_closure_func_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_closure_func_ptr_ptr { return new jit_closure_func_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_closure_func***'; }
}
class jit_closure_func_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_closure_func_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_closure_func_ptr_ptr_ptr_ptr_ptr { return new jit_closure_func_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_closure_func_ptr_ptr_ptr { return new jit_closure_func_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_closure_func****'; }
}
class jit_closure_va_list_t implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_closure_va_list_t $other): bool { return $this->data == $other->data; }
    public function addr(): jit_closure_va_list_t_ptr { return new jit_closure_va_list_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'jit_closure_va_list_t'; }
}
class jit_closure_va_list_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_closure_va_list_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_closure_va_list_t_ptr_ptr { return new jit_closure_va_list_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_closure_va_list_t { return new jit_closure_va_list_t($this->data[$n]); }
    public static function getType(): string { return 'jit_closure_va_list_t*'; }
}
class jit_closure_va_list_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_closure_va_list_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_closure_va_list_t_ptr_ptr_ptr { return new jit_closure_va_list_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_closure_va_list_t_ptr { return new jit_closure_va_list_t_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_closure_va_list_t**'; }
}
class jit_closure_va_list_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_closure_va_list_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_closure_va_list_t_ptr_ptr_ptr_ptr { return new jit_closure_va_list_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_closure_va_list_t_ptr_ptr { return new jit_closure_va_list_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_closure_va_list_t***'; }
}
class jit_closure_va_list_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_closure_va_list_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_closure_va_list_t_ptr_ptr_ptr_ptr_ptr { return new jit_closure_va_list_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_closure_va_list_t_ptr_ptr_ptr { return new jit_closure_va_list_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_closure_va_list_t****'; }
}
class jit_debugger_t implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_debugger_t $other): bool { return $this->data == $other->data; }
    public function addr(): jit_debugger_t_ptr { return new jit_debugger_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'jit_debugger_t'; }
}
class jit_debugger_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_debugger_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_debugger_t_ptr_ptr { return new jit_debugger_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_debugger_t { return new jit_debugger_t($this->data[$n]); }
    public static function getType(): string { return 'jit_debugger_t*'; }
}
class jit_debugger_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_debugger_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_debugger_t_ptr_ptr_ptr { return new jit_debugger_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_debugger_t_ptr { return new jit_debugger_t_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_debugger_t**'; }
}
class jit_debugger_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_debugger_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_debugger_t_ptr_ptr_ptr_ptr { return new jit_debugger_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_debugger_t_ptr_ptr { return new jit_debugger_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_debugger_t***'; }
}
class jit_debugger_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_debugger_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_debugger_t_ptr_ptr_ptr_ptr_ptr { return new jit_debugger_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_debugger_t_ptr_ptr_ptr { return new jit_debugger_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_debugger_t****'; }
}
class jit_debugger_thread_id_t implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_debugger_thread_id_t $other): bool { return $this->data == $other->data; }
    public function addr(): jit_debugger_thread_id_t_ptr { return new jit_debugger_thread_id_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'jit_debugger_thread_id_t'; }
}
class jit_debugger_thread_id_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_debugger_thread_id_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_debugger_thread_id_t_ptr_ptr { return new jit_debugger_thread_id_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_debugger_thread_id_t { return new jit_debugger_thread_id_t($this->data[$n]); }
    public static function getType(): string { return 'jit_debugger_thread_id_t*'; }
}
class jit_debugger_thread_id_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_debugger_thread_id_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_debugger_thread_id_t_ptr_ptr_ptr { return new jit_debugger_thread_id_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_debugger_thread_id_t_ptr { return new jit_debugger_thread_id_t_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_debugger_thread_id_t**'; }
}
class jit_debugger_thread_id_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_debugger_thread_id_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_debugger_thread_id_t_ptr_ptr_ptr_ptr { return new jit_debugger_thread_id_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_debugger_thread_id_t_ptr_ptr { return new jit_debugger_thread_id_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_debugger_thread_id_t***'; }
}
class jit_debugger_thread_id_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_debugger_thread_id_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_debugger_thread_id_t_ptr_ptr_ptr_ptr_ptr { return new jit_debugger_thread_id_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_debugger_thread_id_t_ptr_ptr_ptr { return new jit_debugger_thread_id_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_debugger_thread_id_t****'; }
}
class jit_debugger_breakpoint_id_t implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_debugger_breakpoint_id_t $other): bool { return $this->data == $other->data; }
    public function addr(): jit_debugger_breakpoint_id_t_ptr { return new jit_debugger_breakpoint_id_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'jit_debugger_breakpoint_id_t'; }
}
class jit_debugger_breakpoint_id_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_debugger_breakpoint_id_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_debugger_breakpoint_id_t_ptr_ptr { return new jit_debugger_breakpoint_id_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_debugger_breakpoint_id_t { return new jit_debugger_breakpoint_id_t($this->data[$n]); }
    public static function getType(): string { return 'jit_debugger_breakpoint_id_t*'; }
}
class jit_debugger_breakpoint_id_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_debugger_breakpoint_id_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_debugger_breakpoint_id_t_ptr_ptr_ptr { return new jit_debugger_breakpoint_id_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_debugger_breakpoint_id_t_ptr { return new jit_debugger_breakpoint_id_t_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_debugger_breakpoint_id_t**'; }
}
class jit_debugger_breakpoint_id_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_debugger_breakpoint_id_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_debugger_breakpoint_id_t_ptr_ptr_ptr_ptr { return new jit_debugger_breakpoint_id_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_debugger_breakpoint_id_t_ptr_ptr { return new jit_debugger_breakpoint_id_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_debugger_breakpoint_id_t***'; }
}
class jit_debugger_breakpoint_id_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_debugger_breakpoint_id_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_debugger_breakpoint_id_t_ptr_ptr_ptr_ptr_ptr { return new jit_debugger_breakpoint_id_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_debugger_breakpoint_id_t_ptr_ptr_ptr { return new jit_debugger_breakpoint_id_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_debugger_breakpoint_id_t****'; }
}
class jit_debugger_event_t implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_debugger_event_t $other): bool { return $this->data == $other->data; }
    public function addr(): jit_debugger_event_t_ptr { return new jit_debugger_event_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'jit_debugger_event_t'; }
}
class jit_debugger_event_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_debugger_event_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_debugger_event_t_ptr_ptr { return new jit_debugger_event_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_debugger_event_t { return new jit_debugger_event_t($this->data[$n]); }
    public static function getType(): string { return 'jit_debugger_event_t*'; }
}
class jit_debugger_event_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_debugger_event_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_debugger_event_t_ptr_ptr_ptr { return new jit_debugger_event_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_debugger_event_t_ptr { return new jit_debugger_event_t_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_debugger_event_t**'; }
}
class jit_debugger_event_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_debugger_event_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_debugger_event_t_ptr_ptr_ptr_ptr { return new jit_debugger_event_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_debugger_event_t_ptr_ptr { return new jit_debugger_event_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_debugger_event_t***'; }
}
class jit_debugger_event_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_debugger_event_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_debugger_event_t_ptr_ptr_ptr_ptr_ptr { return new jit_debugger_event_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_debugger_event_t_ptr_ptr_ptr { return new jit_debugger_event_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_debugger_event_t****'; }
}
class jit_debugger_breakpoint_info_t implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_debugger_breakpoint_info_t $other): bool { return $this->data == $other->data; }
    public function addr(): jit_debugger_breakpoint_info_t_ptr { return new jit_debugger_breakpoint_info_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'jit_debugger_breakpoint_info_t'; }
}
class jit_debugger_breakpoint_info_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_debugger_breakpoint_info_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_debugger_breakpoint_info_t_ptr_ptr { return new jit_debugger_breakpoint_info_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_debugger_breakpoint_info_t { return new jit_debugger_breakpoint_info_t($this->data[$n]); }
    public static function getType(): string { return 'jit_debugger_breakpoint_info_t*'; }
}
class jit_debugger_breakpoint_info_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_debugger_breakpoint_info_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_debugger_breakpoint_info_t_ptr_ptr_ptr { return new jit_debugger_breakpoint_info_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_debugger_breakpoint_info_t_ptr { return new jit_debugger_breakpoint_info_t_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_debugger_breakpoint_info_t**'; }
}
class jit_debugger_breakpoint_info_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_debugger_breakpoint_info_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_debugger_breakpoint_info_t_ptr_ptr_ptr_ptr { return new jit_debugger_breakpoint_info_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_debugger_breakpoint_info_t_ptr_ptr { return new jit_debugger_breakpoint_info_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_debugger_breakpoint_info_t***'; }
}
class jit_debugger_breakpoint_info_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_debugger_breakpoint_info_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_debugger_breakpoint_info_t_ptr_ptr_ptr_ptr_ptr { return new jit_debugger_breakpoint_info_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_debugger_breakpoint_info_t_ptr_ptr_ptr { return new jit_debugger_breakpoint_info_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_debugger_breakpoint_info_t****'; }
}
class jit_debugger_hook_func implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_debugger_hook_func $other): bool { return $this->data == $other->data; }
    public function addr(): jit_debugger_hook_func_ptr { return new jit_debugger_hook_func_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'jit_debugger_hook_func'; }
}
class jit_debugger_hook_func_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_debugger_hook_func_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_debugger_hook_func_ptr_ptr { return new jit_debugger_hook_func_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_debugger_hook_func { return new jit_debugger_hook_func($this->data[$n]); }
    public static function getType(): string { return 'jit_debugger_hook_func*'; }
}
class jit_debugger_hook_func_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_debugger_hook_func_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_debugger_hook_func_ptr_ptr_ptr { return new jit_debugger_hook_func_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_debugger_hook_func_ptr { return new jit_debugger_hook_func_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_debugger_hook_func**'; }
}
class jit_debugger_hook_func_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_debugger_hook_func_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_debugger_hook_func_ptr_ptr_ptr_ptr { return new jit_debugger_hook_func_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_debugger_hook_func_ptr_ptr { return new jit_debugger_hook_func_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_debugger_hook_func***'; }
}
class jit_debugger_hook_func_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_debugger_hook_func_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_debugger_hook_func_ptr_ptr_ptr_ptr_ptr { return new jit_debugger_hook_func_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_debugger_hook_func_ptr_ptr_ptr { return new jit_debugger_hook_func_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_debugger_hook_func****'; }
}
class jit_readelf_t implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_readelf_t $other): bool { return $this->data == $other->data; }
    public function addr(): jit_readelf_t_ptr { return new jit_readelf_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'jit_readelf_t'; }
}
class jit_readelf_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_readelf_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_readelf_t_ptr_ptr { return new jit_readelf_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_readelf_t { return new jit_readelf_t($this->data[$n]); }
    public static function getType(): string { return 'jit_readelf_t*'; }
}
class jit_readelf_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_readelf_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_readelf_t_ptr_ptr_ptr { return new jit_readelf_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_readelf_t_ptr { return new jit_readelf_t_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_readelf_t**'; }
}
class jit_readelf_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_readelf_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_readelf_t_ptr_ptr_ptr_ptr { return new jit_readelf_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_readelf_t_ptr_ptr { return new jit_readelf_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_readelf_t***'; }
}
class jit_readelf_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_readelf_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_readelf_t_ptr_ptr_ptr_ptr_ptr { return new jit_readelf_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_readelf_t_ptr_ptr_ptr { return new jit_readelf_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_readelf_t****'; }
}
class jit_writeelf_t implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_writeelf_t $other): bool { return $this->data == $other->data; }
    public function addr(): jit_writeelf_t_ptr { return new jit_writeelf_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'jit_writeelf_t'; }
}
class jit_writeelf_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_writeelf_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_writeelf_t_ptr_ptr { return new jit_writeelf_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_writeelf_t { return new jit_writeelf_t($this->data[$n]); }
    public static function getType(): string { return 'jit_writeelf_t*'; }
}
class jit_writeelf_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_writeelf_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_writeelf_t_ptr_ptr_ptr { return new jit_writeelf_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_writeelf_t_ptr { return new jit_writeelf_t_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_writeelf_t**'; }
}
class jit_writeelf_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_writeelf_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_writeelf_t_ptr_ptr_ptr_ptr { return new jit_writeelf_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_writeelf_t_ptr_ptr { return new jit_writeelf_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_writeelf_t***'; }
}
class jit_writeelf_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_writeelf_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_writeelf_t_ptr_ptr_ptr_ptr_ptr { return new jit_writeelf_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_writeelf_t_ptr_ptr_ptr { return new jit_writeelf_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_writeelf_t****'; }
}
class jit_exception_func implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_exception_func $other): bool { return $this->data == $other->data; }
    public function addr(): jit_exception_func_ptr { return new jit_exception_func_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'jit_exception_func'; }
}
class jit_exception_func_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_exception_func_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_exception_func_ptr_ptr { return new jit_exception_func_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_exception_func { return new jit_exception_func($this->data[$n]); }
    public static function getType(): string { return 'jit_exception_func*'; }
}
class jit_exception_func_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_exception_func_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_exception_func_ptr_ptr_ptr { return new jit_exception_func_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_exception_func_ptr { return new jit_exception_func_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_exception_func**'; }
}
class jit_exception_func_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_exception_func_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_exception_func_ptr_ptr_ptr_ptr { return new jit_exception_func_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_exception_func_ptr_ptr { return new jit_exception_func_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_exception_func***'; }
}
class jit_exception_func_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_exception_func_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_exception_func_ptr_ptr_ptr_ptr_ptr { return new jit_exception_func_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_exception_func_ptr_ptr_ptr { return new jit_exception_func_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_exception_func****'; }
}
class jit_intrinsic_descr_t implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_intrinsic_descr_t $other): bool { return $this->data == $other->data; }
    public function addr(): jit_intrinsic_descr_t_ptr { return new jit_intrinsic_descr_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'jit_intrinsic_descr_t'; }
}
class jit_intrinsic_descr_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_intrinsic_descr_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_intrinsic_descr_t_ptr_ptr { return new jit_intrinsic_descr_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_intrinsic_descr_t { return new jit_intrinsic_descr_t($this->data[$n]); }
    public static function getType(): string { return 'jit_intrinsic_descr_t*'; }
}
class jit_intrinsic_descr_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_intrinsic_descr_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_intrinsic_descr_t_ptr_ptr_ptr { return new jit_intrinsic_descr_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_intrinsic_descr_t_ptr { return new jit_intrinsic_descr_t_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_intrinsic_descr_t**'; }
}
class jit_intrinsic_descr_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_intrinsic_descr_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_intrinsic_descr_t_ptr_ptr_ptr_ptr { return new jit_intrinsic_descr_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_intrinsic_descr_t_ptr_ptr { return new jit_intrinsic_descr_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_intrinsic_descr_t***'; }
}
class jit_intrinsic_descr_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_intrinsic_descr_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_intrinsic_descr_t_ptr_ptr_ptr_ptr_ptr { return new jit_intrinsic_descr_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_intrinsic_descr_t_ptr_ptr_ptr { return new jit_intrinsic_descr_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_intrinsic_descr_t****'; }
}
class jit_insn_iter_t implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_insn_iter_t $other): bool { return $this->data == $other->data; }
    public function addr(): jit_insn_iter_t_ptr { return new jit_insn_iter_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'jit_insn_iter_t'; }
}
class jit_insn_iter_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_insn_iter_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_insn_iter_t_ptr_ptr { return new jit_insn_iter_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_insn_iter_t { return new jit_insn_iter_t($this->data[$n]); }
    public static function getType(): string { return 'jit_insn_iter_t*'; }
}
class jit_insn_iter_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_insn_iter_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_insn_iter_t_ptr_ptr_ptr { return new jit_insn_iter_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_insn_iter_t_ptr { return new jit_insn_iter_t_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_insn_iter_t**'; }
}
class jit_insn_iter_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_insn_iter_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_insn_iter_t_ptr_ptr_ptr_ptr { return new jit_insn_iter_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_insn_iter_t_ptr_ptr { return new jit_insn_iter_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_insn_iter_t***'; }
}
class jit_insn_iter_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_insn_iter_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_insn_iter_t_ptr_ptr_ptr_ptr_ptr { return new jit_insn_iter_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_insn_iter_t_ptr_ptr_ptr { return new jit_insn_iter_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_insn_iter_t****'; }
}
class jit_meta_t implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_meta_t $other): bool { return $this->data == $other->data; }
    public function addr(): jit_meta_t_ptr { return new jit_meta_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'jit_meta_t'; }
}
class jit_meta_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_meta_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_meta_t_ptr_ptr { return new jit_meta_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_meta_t { return new jit_meta_t($this->data[$n]); }
    public static function getType(): string { return 'jit_meta_t*'; }
}
class jit_meta_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_meta_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_meta_t_ptr_ptr_ptr { return new jit_meta_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_meta_t_ptr { return new jit_meta_t_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_meta_t**'; }
}
class jit_meta_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_meta_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_meta_t_ptr_ptr_ptr_ptr { return new jit_meta_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_meta_t_ptr_ptr { return new jit_meta_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_meta_t***'; }
}
class jit_meta_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_meta_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_meta_t_ptr_ptr_ptr_ptr_ptr { return new jit_meta_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_meta_t_ptr_ptr_ptr { return new jit_meta_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_meta_t****'; }
}
class jit_objmodel_t implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_objmodel_t $other): bool { return $this->data == $other->data; }
    public function addr(): jit_objmodel_t_ptr { return new jit_objmodel_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'jit_objmodel_t'; }
}
class jit_objmodel_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_objmodel_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_objmodel_t_ptr_ptr { return new jit_objmodel_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_objmodel_t { return new jit_objmodel_t($this->data[$n]); }
    public static function getType(): string { return 'jit_objmodel_t*'; }
}
class jit_objmodel_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_objmodel_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_objmodel_t_ptr_ptr_ptr { return new jit_objmodel_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_objmodel_t_ptr { return new jit_objmodel_t_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_objmodel_t**'; }
}
class jit_objmodel_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_objmodel_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_objmodel_t_ptr_ptr_ptr_ptr { return new jit_objmodel_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_objmodel_t_ptr_ptr { return new jit_objmodel_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_objmodel_t***'; }
}
class jit_objmodel_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_objmodel_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_objmodel_t_ptr_ptr_ptr_ptr_ptr { return new jit_objmodel_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_objmodel_t_ptr_ptr_ptr { return new jit_objmodel_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_objmodel_t****'; }
}
class jitom_class_t implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jitom_class_t $other): bool { return $this->data == $other->data; }
    public function addr(): jitom_class_t_ptr { return new jitom_class_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'jitom_class_t'; }
}
class jitom_class_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jitom_class_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jitom_class_t_ptr_ptr { return new jitom_class_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jitom_class_t { return new jitom_class_t($this->data[$n]); }
    public static function getType(): string { return 'jitom_class_t*'; }
}
class jitom_class_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jitom_class_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jitom_class_t_ptr_ptr_ptr { return new jitom_class_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jitom_class_t_ptr { return new jitom_class_t_ptr($this->data[$n]); }
    public static function getType(): string { return 'jitom_class_t**'; }
}
class jitom_class_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jitom_class_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jitom_class_t_ptr_ptr_ptr_ptr { return new jitom_class_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jitom_class_t_ptr_ptr { return new jitom_class_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jitom_class_t***'; }
}
class jitom_class_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jitom_class_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jitom_class_t_ptr_ptr_ptr_ptr_ptr { return new jitom_class_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jitom_class_t_ptr_ptr_ptr { return new jitom_class_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jitom_class_t****'; }
}
class jitom_field_t implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jitom_field_t $other): bool { return $this->data == $other->data; }
    public function addr(): jitom_field_t_ptr { return new jitom_field_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'jitom_field_t'; }
}
class jitom_field_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jitom_field_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jitom_field_t_ptr_ptr { return new jitom_field_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jitom_field_t { return new jitom_field_t($this->data[$n]); }
    public static function getType(): string { return 'jitom_field_t*'; }
}
class jitom_field_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jitom_field_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jitom_field_t_ptr_ptr_ptr { return new jitom_field_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jitom_field_t_ptr { return new jitom_field_t_ptr($this->data[$n]); }
    public static function getType(): string { return 'jitom_field_t**'; }
}
class jitom_field_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jitom_field_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jitom_field_t_ptr_ptr_ptr_ptr { return new jitom_field_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jitom_field_t_ptr_ptr { return new jitom_field_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jitom_field_t***'; }
}
class jitom_field_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jitom_field_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jitom_field_t_ptr_ptr_ptr_ptr_ptr { return new jitom_field_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jitom_field_t_ptr_ptr_ptr { return new jitom_field_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jitom_field_t****'; }
}
class jitom_method_t implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jitom_method_t $other): bool { return $this->data == $other->data; }
    public function addr(): jitom_method_t_ptr { return new jitom_method_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'jitom_method_t'; }
}
class jitom_method_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jitom_method_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jitom_method_t_ptr_ptr { return new jitom_method_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jitom_method_t { return new jitom_method_t($this->data[$n]); }
    public static function getType(): string { return 'jitom_method_t*'; }
}
class jitom_method_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jitom_method_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jitom_method_t_ptr_ptr_ptr { return new jitom_method_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jitom_method_t_ptr { return new jitom_method_t_ptr($this->data[$n]); }
    public static function getType(): string { return 'jitom_method_t**'; }
}
class jitom_method_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jitom_method_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jitom_method_t_ptr_ptr_ptr_ptr { return new jitom_method_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jitom_method_t_ptr_ptr { return new jitom_method_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jitom_method_t***'; }
}
class jitom_method_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jitom_method_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jitom_method_t_ptr_ptr_ptr_ptr_ptr { return new jitom_method_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jitom_method_t_ptr_ptr_ptr { return new jitom_method_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jitom_method_t****'; }
}
class jit_opcode_info_t implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_opcode_info_t $other): bool { return $this->data == $other->data; }
    public function addr(): jit_opcode_info_t_ptr { return new jit_opcode_info_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'jit_opcode_info_t'; }
}
class jit_opcode_info_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_opcode_info_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_opcode_info_t_ptr_ptr { return new jit_opcode_info_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_opcode_info_t { return new jit_opcode_info_t($this->data[$n]); }
    public static function getType(): string { return 'jit_opcode_info_t*'; }
}
class jit_opcode_info_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_opcode_info_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_opcode_info_t_ptr_ptr_ptr { return new jit_opcode_info_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_opcode_info_t_ptr { return new jit_opcode_info_t_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_opcode_info_t**'; }
}
class jit_opcode_info_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_opcode_info_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_opcode_info_t_ptr_ptr_ptr_ptr { return new jit_opcode_info_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_opcode_info_t_ptr_ptr { return new jit_opcode_info_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_opcode_info_t***'; }
}
class jit_opcode_info_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_opcode_info_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_opcode_info_t_ptr_ptr_ptr_ptr_ptr { return new jit_opcode_info_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_opcode_info_t_ptr_ptr_ptr { return new jit_opcode_info_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_opcode_info_t****'; }
}
class _jit_arch_frame_t implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(_jit_arch_frame_t $other): bool { return $this->data == $other->data; }
    public function addr(): _jit_arch_frame_t_ptr { return new _jit_arch_frame_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '_jit_arch_frame_t'; }
}
class _jit_arch_frame_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(_jit_arch_frame_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): _jit_arch_frame_t_ptr_ptr { return new _jit_arch_frame_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): _jit_arch_frame_t { return new _jit_arch_frame_t($this->data[$n]); }
    public static function getType(): string { return '_jit_arch_frame_t*'; }
}
class _jit_arch_frame_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(_jit_arch_frame_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): _jit_arch_frame_t_ptr_ptr_ptr { return new _jit_arch_frame_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): _jit_arch_frame_t_ptr { return new _jit_arch_frame_t_ptr($this->data[$n]); }
    public static function getType(): string { return '_jit_arch_frame_t**'; }
}
class _jit_arch_frame_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(_jit_arch_frame_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): _jit_arch_frame_t_ptr_ptr_ptr_ptr { return new _jit_arch_frame_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): _jit_arch_frame_t_ptr_ptr { return new _jit_arch_frame_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '_jit_arch_frame_t***'; }
}
class _jit_arch_frame_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(_jit_arch_frame_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): _jit_arch_frame_t_ptr_ptr_ptr_ptr_ptr { return new _jit_arch_frame_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): _jit_arch_frame_t_ptr_ptr_ptr { return new _jit_arch_frame_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '_jit_arch_frame_t****'; }
}
class jit_unwind_context_t implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_unwind_context_t $other): bool { return $this->data == $other->data; }
    public function addr(): jit_unwind_context_t_ptr { return new jit_unwind_context_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'jit_unwind_context_t'; }
}
class jit_unwind_context_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_unwind_context_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_unwind_context_t_ptr_ptr { return new jit_unwind_context_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_unwind_context_t { return new jit_unwind_context_t($this->data[$n]); }
    public static function getType(): string { return 'jit_unwind_context_t*'; }
}
class jit_unwind_context_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_unwind_context_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_unwind_context_t_ptr_ptr_ptr { return new jit_unwind_context_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_unwind_context_t_ptr { return new jit_unwind_context_t_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_unwind_context_t**'; }
}
class jit_unwind_context_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_unwind_context_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_unwind_context_t_ptr_ptr_ptr_ptr { return new jit_unwind_context_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_unwind_context_t_ptr_ptr { return new jit_unwind_context_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_unwind_context_t***'; }
}
class jit_unwind_context_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_unwind_context_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_unwind_context_t_ptr_ptr_ptr_ptr_ptr { return new jit_unwind_context_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_unwind_context_t_ptr_ptr_ptr { return new jit_unwind_context_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_unwind_context_t****'; }
}
class jit_constant_t implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_constant_t $other): bool { return $this->data == $other->data; }
    public function addr(): jit_constant_t_ptr { return new jit_constant_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'jit_constant_t'; }
}
class jit_constant_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_constant_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_constant_t_ptr_ptr { return new jit_constant_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_constant_t { return new jit_constant_t($this->data[$n]); }
    public static function getType(): string { return 'jit_constant_t*'; }
}
class jit_constant_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_constant_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_constant_t_ptr_ptr_ptr { return new jit_constant_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_constant_t_ptr { return new jit_constant_t_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_constant_t**'; }
}
class jit_constant_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_constant_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_constant_t_ptr_ptr_ptr_ptr { return new jit_constant_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_constant_t_ptr_ptr { return new jit_constant_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_constant_t***'; }
}
class jit_constant_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_constant_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_constant_t_ptr_ptr_ptr_ptr_ptr { return new jit_constant_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_constant_t_ptr_ptr_ptr { return new jit_constant_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_constant_t****'; }
}
class jit_prot_t implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_prot_t $other): bool { return $this->data == $other->data; }
    public function addr(): jit_prot_t_ptr { return new jit_prot_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'jit_prot_t'; }
}
class jit_prot_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_prot_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_prot_t_ptr_ptr { return new jit_prot_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_prot_t { return new jit_prot_t($this->data[$n]); }
    public static function getType(): string { return 'jit_prot_t*'; }
}
class jit_prot_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_prot_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_prot_t_ptr_ptr_ptr { return new jit_prot_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_prot_t_ptr { return new jit_prot_t_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_prot_t**'; }
}
class jit_prot_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_prot_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_prot_t_ptr_ptr_ptr_ptr { return new jit_prot_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_prot_t_ptr_ptr { return new jit_prot_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_prot_t***'; }
}
class jit_prot_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_prot_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_prot_t_ptr_ptr_ptr_ptr_ptr { return new jit_prot_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_prot_t_ptr_ptr_ptr { return new jit_prot_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_prot_t****'; }
}
class jit_crawl_mark_t implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_crawl_mark_t $other): bool { return $this->data == $other->data; }
    public function addr(): jit_crawl_mark_t_ptr { return new jit_crawl_mark_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'jit_crawl_mark_t'; }
}
class jit_crawl_mark_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_crawl_mark_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_crawl_mark_t_ptr_ptr { return new jit_crawl_mark_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_crawl_mark_t { return new jit_crawl_mark_t($this->data[$n]); }
    public static function getType(): string { return 'jit_crawl_mark_t*'; }
}
class jit_crawl_mark_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_crawl_mark_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_crawl_mark_t_ptr_ptr_ptr { return new jit_crawl_mark_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_crawl_mark_t_ptr { return new jit_crawl_mark_t_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_crawl_mark_t**'; }
}
class jit_crawl_mark_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_crawl_mark_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_crawl_mark_t_ptr_ptr_ptr_ptr { return new jit_crawl_mark_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_crawl_mark_t_ptr_ptr { return new jit_crawl_mark_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_crawl_mark_t***'; }
}
class jit_crawl_mark_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(jit_crawl_mark_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): jit_crawl_mark_t_ptr_ptr_ptr_ptr_ptr { return new jit_crawl_mark_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): jit_crawl_mark_t_ptr_ptr_ptr { return new jit_crawl_mark_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'jit_crawl_mark_t****'; }
}