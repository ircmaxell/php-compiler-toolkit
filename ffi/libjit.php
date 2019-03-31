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
typedef void * jit_ptr;
typedef struct _jit_context * jit_context_t;
typedef struct _jit_function * jit_function_t;
typedef struct _jit_block * jit_block_t;
typedef struct _jit_insn * jit_insn_t;
typedef struct _jit_value * jit_value_t;
typedef struct _jit_type * jit_type_t;
typedef struct jit_stack_trace * jit_stack_trace_t;
typedef jit_nuint jit_label_t;
typedef void(*jit_meta_free_func)(void *data);
typedef int(*jit_on_demand_func)(jit_function_t func);
typedef void *(*jit_on_demand_driver_func)(jit_function_t func);
typedef unsigned int jit_size_t;
typedef void * jit_memory_context_t;
typedef void * jit_function_info_t;
typedef struct jit_memory_manager * jit_memory_manager_t;
struct jit_memory_manager {
  jit_memory_context_t(*create)(jit_context_t context);
  void(*destroy)(jit_memory_context_t memctx);
  jit_function_info_t(*find_function_info)(jit_memory_context_t memctx, void *pc);
  jit_function_t(*get_function)(jit_memory_context_t memctx, jit_function_info_t info);
  void *(*get_function_start)(jit_memory_context_t memctx, jit_function_info_t info);
  void *(*get_function_end)(jit_memory_context_t memctx, jit_function_info_t info);
  jit_function_t(*alloc_function)(jit_memory_context_t memctx);
  void(*free_function)(jit_memory_context_t memctx, jit_function_t func);
  int(*start_function)(jit_memory_context_t memctx, jit_function_t func);
  int(*end_function)(jit_memory_context_t memctx, int result);
  int(*extend_limit)(jit_memory_context_t memctx, int count);
  void *(*get_limit)(jit_memory_context_t memctx);
  void *(*get_break)(jit_memory_context_t memctx);
  void(*set_break)(jit_memory_context_t memctx, void *brk);
  void *(*alloc_trampoline)(jit_memory_context_t memctx);
  void(*free_trampoline)(jit_memory_context_t memctx, void *ptr);
  void *(*alloc_closure)(jit_memory_context_t memctx);
  void(*free_closure)(jit_memory_context_t memctx, void *ptr);
  void *(*alloc_data)(jit_memory_context_t memctx, jit_size_t size, jit_size_t align);
};
jit_memory_manager_t jit_default_memory_manager(void);
jit_context_t jit_context_create(void);
void jit_context_destroy(jit_context_t context);
void jit_context_build_start(jit_context_t context);
void jit_context_build_end(jit_context_t context);
void jit_context_set_on_demand_driver(jit_context_t context, jit_on_demand_driver_func driver);
void jit_context_set_memory_manager(jit_context_t context, jit_memory_manager_t manager);
int jit_context_set_meta(jit_context_t context, int type, void *data, jit_meta_free_func free_data);
int jit_context_set_meta_numeric(jit_context_t context, int type, jit_nuint data);
void * jit_context_get_meta(jit_context_t context, int type);
jit_nuint jit_context_get_meta_numeric(jit_context_t context, int type);
void jit_context_free_meta(jit_context_t context, int type);
extern jit_type_t jit_type_void;
extern jit_type_t jit_type_sbyte;
extern jit_type_t jit_type_ubyte;
extern jit_type_t jit_type_short;
extern jit_type_t jit_type_ushort;
extern jit_type_t jit_type_int;
extern jit_type_t jit_type_uint;
extern jit_type_t jit_type_nint;
extern jit_type_t jit_type_nuint;
extern jit_type_t jit_type_long;
extern jit_type_t jit_type_ulong;
extern jit_type_t jit_type_float32;
extern jit_type_t jit_type_float64;
extern jit_type_t jit_type_nfloat;
extern jit_type_t jit_type_void_ptr;
extern jit_type_t jit_type_sys_bool;
extern jit_type_t jit_type_sys_char;
extern jit_type_t jit_type_sys_schar;
extern jit_type_t jit_type_sys_uchar;
extern jit_type_t jit_type_sys_short;
extern jit_type_t jit_type_sys_ushort;
extern jit_type_t jit_type_sys_int;
extern jit_type_t jit_type_sys_uint;
extern jit_type_t jit_type_sys_long;
extern jit_type_t jit_type_sys_ulong;
extern jit_type_t jit_type_sys_longlong;
extern jit_type_t jit_type_sys_ulonglong;
extern jit_type_t jit_type_sys_float;
extern jit_type_t jit_type_sys_double;
extern jit_type_t jit_type_sys_long_double;
typedef enum {
  jit_abi_cdecl,
  jit_abi_vararg,
  jit_abi_stdcall,
  jit_abi_fastcall,
} jit_abi_t;
jit_type_t jit_type_copy(jit_type_t type);
void jit_type_free(jit_type_t type);
jit_type_t jit_type_create_struct(jit_type_t *fields, unsigned int num_fields, int incref);
jit_type_t jit_type_create_union(jit_type_t *fields, unsigned int num_fields, int incref);
jit_type_t jit_type_create_signature(jit_abi_t abi, jit_type_t return_type, jit_type_t *params, unsigned int num_params, int incref);
jit_type_t jit_type_create_pointer(jit_type_t type, int incref);
jit_type_t jit_type_create_tagged(jit_type_t type, int kind, void *data, jit_meta_free_func free_func, int incref);
int jit_type_set_names(jit_type_t type, char **names, unsigned int num_names);
void jit_type_set_size_and_alignment(jit_type_t type, jit_nint size, jit_nint alignment);
void jit_type_set_offset(jit_type_t type, unsigned int field_index, jit_nuint offset);
int jit_type_get_kind(jit_type_t type);
jit_nuint jit_type_get_size(jit_type_t type);
jit_nuint jit_type_get_alignment(jit_type_t type);
jit_nuint jit_type_best_alignment(void);
unsigned int jit_type_num_fields(jit_type_t type);
jit_type_t jit_type_get_field(jit_type_t type, unsigned int field_index);
jit_nuint jit_type_get_offset(jit_type_t type, unsigned int field_index);
char * jit_type_get_name(jit_type_t type, unsigned int index);
unsigned int jit_type_find_name(jit_type_t type, char *name);
unsigned int jit_type_num_params(jit_type_t type);
jit_type_t jit_type_get_return(jit_type_t type);
jit_type_t jit_type_get_param(jit_type_t type, unsigned int param_index);
jit_abi_t jit_type_get_abi(jit_type_t type);
jit_type_t jit_type_get_ref(jit_type_t type);
jit_type_t jit_type_get_tagged_type(jit_type_t type);
void jit_type_set_tagged_type(jit_type_t type, jit_type_t underlying, int incref);
int jit_type_get_tagged_kind(jit_type_t type);
void * jit_type_get_tagged_data(jit_type_t type);
void jit_type_set_tagged_data(jit_type_t type, void *data, jit_meta_free_func free_func);
int jit_type_is_primitive(jit_type_t type);
int jit_type_is_struct(jit_type_t type);
int jit_type_is_union(jit_type_t type);
int jit_type_is_signature(jit_type_t type);
int jit_type_is_pointer(jit_type_t type);
int jit_type_is_tagged(jit_type_t type);
jit_type_t jit_type_remove_tags(jit_type_t type);
jit_type_t jit_type_normalize(jit_type_t type);
jit_type_t jit_type_promote_int(jit_type_t type);
int jit_type_return_via_pointer(jit_type_t type);
int jit_type_has_tag(jit_type_t type, int kind);
typedef void(*jit_closure_func)(jit_type_t signature, void *result, void **args, void *user_data);
typedef struct jit_closure_va_list * jit_closure_va_list_t;
void jit_apply(jit_type_t signature, void *func, void **args, unsigned int num_fixed_args, void *return_value);
void jit_apply_raw(jit_type_t signature, void *func, void *args, void *return_value);
int jit_raw_supported(jit_type_t signature);
void * jit_closure_create(jit_context_t context, jit_type_t signature, jit_closure_func func, void *user_data);
jit_nint jit_closure_va_get_nint(jit_closure_va_list_t va);
jit_nuint jit_closure_va_get_nuint(jit_closure_va_list_t va);
jit_long jit_closure_va_get_long(jit_closure_va_list_t va);
jit_ulong jit_closure_va_get_ulong(jit_closure_va_list_t va);
jit_float32 jit_closure_va_get_float32(jit_closure_va_list_t va);
jit_float64 jit_closure_va_get_float64(jit_closure_va_list_t va);
jit_nfloat jit_closure_va_get_nfloat(jit_closure_va_list_t va);
void * jit_closure_va_get_ptr(jit_closure_va_list_t va);
void jit_closure_va_get_struct(jit_closure_va_list_t va, void *buf, jit_type_t type);
jit_function_t jit_block_get_function(jit_block_t block);
jit_context_t jit_block_get_context(jit_block_t block);
jit_label_t jit_block_get_label(jit_block_t block);
jit_label_t jit_block_get_next_label(jit_block_t block, jit_label_t label);
jit_block_t jit_block_next(jit_function_t func, jit_block_t previous);
jit_block_t jit_block_previous(jit_function_t func, jit_block_t previous);
jit_block_t jit_block_from_label(jit_function_t func, jit_label_t label);
int jit_block_set_meta(jit_block_t block, int type, void *data, jit_meta_free_func free_data);
void * jit_block_get_meta(jit_block_t block, int type);
void jit_block_free_meta(jit_block_t block, int type);
int jit_block_is_reachable(jit_block_t block);
int jit_block_ends_in_dead(jit_block_t block);
int jit_block_current_is_dead(jit_function_t func);
typedef struct jit_debugger * jit_debugger_t;
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
} * jit_debugger_breakpoint_info_t;
typedef void(*jit_debugger_hook_func)(jit_function_t func, jit_nint data1, jit_nint data2);
int jit_debugging_possible(void);
jit_debugger_t jit_debugger_create(jit_context_t context);
void jit_debugger_destroy(jit_debugger_t dbg);
jit_context_t jit_debugger_get_context(jit_debugger_t dbg);
jit_debugger_t jit_debugger_from_context(jit_context_t context);
jit_debugger_thread_id_t jit_debugger_get_self(jit_debugger_t dbg);
jit_debugger_thread_id_t jit_debugger_get_thread(jit_debugger_t dbg, void *native_thread);
int jit_debugger_get_native_thread(jit_debugger_t dbg, jit_debugger_thread_id_t thread, void *native_thread);
void jit_debugger_set_breakable(jit_debugger_t dbg, void *native_thread, int flag);
void jit_debugger_attach_self(jit_debugger_t dbg, int stop_immediately);
void jit_debugger_detach_self(jit_debugger_t dbg);
int jit_debugger_wait_event(jit_debugger_t dbg, jit_debugger_event_t *event, jit_int timeout);
jit_debugger_breakpoint_id_t jit_debugger_add_breakpoint(jit_debugger_t dbg, jit_debugger_breakpoint_info_t info);
void jit_debugger_remove_breakpoint(jit_debugger_t dbg, jit_debugger_breakpoint_id_t id);
void jit_debugger_remove_all_breakpoints(jit_debugger_t dbg);
int jit_debugger_is_alive(jit_debugger_t dbg, jit_debugger_thread_id_t thread);
int jit_debugger_is_running(jit_debugger_t dbg, jit_debugger_thread_id_t thread);
void jit_debugger_run(jit_debugger_t dbg, jit_debugger_thread_id_t thread);
void jit_debugger_step(jit_debugger_t dbg, jit_debugger_thread_id_t thread);
void jit_debugger_next(jit_debugger_t dbg, jit_debugger_thread_id_t thread);
void jit_debugger_finish(jit_debugger_t dbg, jit_debugger_thread_id_t thread);
void jit_debugger_break(jit_debugger_t dbg);
void jit_debugger_quit(jit_debugger_t dbg);
jit_debugger_hook_func jit_debugger_set_hook(jit_context_t context, jit_debugger_hook_func hook);
typedef struct jit_readelf * jit_readelf_t;
typedef struct jit_writeelf * jit_writeelf_t;
int jit_readelf_open(jit_readelf_t *readelf, char *filename, int flags);
void jit_readelf_close(jit_readelf_t readelf);
char * jit_readelf_get_name(jit_readelf_t readelf);
void * jit_readelf_get_symbol(jit_readelf_t readelf, char *name);
void * jit_readelf_get_section(jit_readelf_t readelf, char *name, jit_nuint *size);
void * jit_readelf_get_section_by_type(jit_readelf_t readelf, jit_int type, jit_nuint *size);
void * jit_readelf_map_vaddr(jit_readelf_t readelf, jit_nuint vaddr);
unsigned int jit_readelf_num_needed(jit_readelf_t readelf);
char * jit_readelf_get_needed(jit_readelf_t readelf, unsigned int index);
void jit_readelf_add_to_context(jit_readelf_t readelf, jit_context_t context);
int jit_readelf_resolve_all(jit_context_t context, int print_failures);
int jit_readelf_register_symbol(jit_context_t context, char *name, void *value, int after);
jit_writeelf_t jit_writeelf_create(char *library_name);
void jit_writeelf_destroy(jit_writeelf_t writeelf);
int jit_writeelf_write(jit_writeelf_t writeelf, char *filename);
int jit_writeelf_add_function(jit_writeelf_t writeelf, jit_function_t func, char *name);
int jit_writeelf_add_needed(jit_writeelf_t writeelf, char *library_name);
int jit_writeelf_write_section(jit_writeelf_t writeelf, char *name, jit_int type, void *buf, unsigned int len, int discardable);
typedef void *(*jit_exception_func)(int exception_type);
void * jit_exception_get_last(void);
void * jit_exception_get_last_and_clear(void);
void jit_exception_set_last(void *object);
void jit_exception_clear_last(void);
void jit_exception_throw(void *object);
void jit_exception_builtin(int exception_type);
jit_exception_func jit_exception_set_handler(jit_exception_func handler);
jit_exception_func jit_exception_get_handler(void);
jit_stack_trace_t jit_exception_get_stack_trace(void);
unsigned int jit_stack_trace_get_size(jit_stack_trace_t trace);
jit_function_t jit_stack_trace_get_function(jit_context_t context, jit_stack_trace_t trace, unsigned int posn);
void * jit_stack_trace_get_pc(jit_stack_trace_t trace, unsigned int posn);
unsigned int jit_stack_trace_get_offset(jit_context_t context, jit_stack_trace_t trace, unsigned int posn);
void jit_stack_trace_free(jit_stack_trace_t trace);
jit_function_t jit_function_create(jit_context_t context, jit_type_t signature);
jit_function_t jit_function_create_nested(jit_context_t context, jit_type_t signature, jit_function_t parent);
void jit_function_abandon(jit_function_t func);
jit_context_t jit_function_get_context(jit_function_t func);
jit_type_t jit_function_get_signature(jit_function_t func);
int jit_function_set_meta(jit_function_t func, int type, void *data, jit_meta_free_func free_data, int build_only);
void * jit_function_get_meta(jit_function_t func, int type);
void jit_function_free_meta(jit_function_t func, int type);
jit_function_t jit_function_next(jit_context_t context, jit_function_t prev);
jit_function_t jit_function_previous(jit_context_t context, jit_function_t prev);
jit_block_t jit_function_get_entry(jit_function_t func);
jit_block_t jit_function_get_current(jit_function_t func);
jit_function_t jit_function_get_nested_parent(jit_function_t func);
int jit_function_compile(jit_function_t func);
int jit_function_is_compiled(jit_function_t func);
void jit_function_set_recompilable(jit_function_t func);
void jit_function_clear_recompilable(jit_function_t func);
int jit_function_is_recompilable(jit_function_t func);
int jit_function_compile_entry(jit_function_t func, void **entry_point);
void jit_function_setup_entry(jit_function_t func, void *entry_point);
void * jit_function_to_closure(jit_function_t func);
jit_function_t jit_function_from_closure(jit_context_t context, void *closure);
jit_function_t jit_function_from_pc(jit_context_t context, void *pc, void **handler);
void * jit_function_to_vtable_pointer(jit_function_t func);
jit_function_t jit_function_from_vtable_pointer(jit_context_t context, void *vtable_pointer);
void jit_function_set_on_demand_compiler(jit_function_t func, jit_on_demand_func on_demand);
jit_on_demand_func jit_function_get_on_demand_compiler(jit_function_t func);
int jit_function_apply(jit_function_t func, void **args, void *return_area);
int jit_function_apply_vararg(jit_function_t func, jit_type_t signature, void **args, void *return_area);
void jit_function_set_optimization_level(jit_function_t func, unsigned int level);
unsigned int jit_function_get_optimization_level(jit_function_t func);
unsigned int jit_function_get_max_optimization_level(void);
jit_label_t jit_function_reserve_label(jit_function_t func);
int jit_function_labels_equal(jit_function_t func, jit_label_t label, jit_label_t label2);
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
int jit_insn_get_opcode(jit_insn_t insn);
jit_value_t jit_insn_get_dest(jit_insn_t insn);
jit_value_t jit_insn_get_value1(jit_insn_t insn);
jit_value_t jit_insn_get_value2(jit_insn_t insn);
jit_label_t jit_insn_get_label(jit_insn_t insn);
jit_function_t jit_insn_get_function(jit_insn_t insn);
void * jit_insn_get_native(jit_insn_t insn);
char * jit_insn_get_name(jit_insn_t insn);
jit_type_t jit_insn_get_signature(jit_insn_t insn);
int jit_insn_dest_is_value(jit_insn_t insn);
int jit_insn_label(jit_function_t func, jit_label_t *label);
int jit_insn_label_tight(jit_function_t func, jit_label_t *label);
int jit_insn_new_block(jit_function_t func);
jit_value_t jit_insn_load(jit_function_t func, jit_value_t value);
jit_value_t jit_insn_dup(jit_function_t func, jit_value_t value);
int jit_insn_store(jit_function_t func, jit_value_t dest, jit_value_t value);
jit_value_t jit_insn_load_relative(jit_function_t func, jit_value_t value, jit_nint offset, jit_type_t type);
int jit_insn_store_relative(jit_function_t func, jit_value_t dest, jit_nint offset, jit_value_t value);
jit_value_t jit_insn_add_relative(jit_function_t func, jit_value_t value, jit_nint offset);
jit_value_t jit_insn_load_elem(jit_function_t func, jit_value_t base_addr, jit_value_t index, jit_type_t elem_type);
jit_value_t jit_insn_load_elem_address(jit_function_t func, jit_value_t base_addr, jit_value_t index, jit_type_t elem_type);
int jit_insn_store_elem(jit_function_t func, jit_value_t base_addr, jit_value_t index, jit_value_t value);
int jit_insn_check_null(jit_function_t func, jit_value_t value);
int jit_insn_nop(jit_function_t func);
jit_value_t jit_insn_add(jit_function_t func, jit_value_t value1, jit_value_t value2);
jit_value_t jit_insn_add_ovf(jit_function_t func, jit_value_t value1, jit_value_t value2);
jit_value_t jit_insn_sub(jit_function_t func, jit_value_t value1, jit_value_t value2);
jit_value_t jit_insn_sub_ovf(jit_function_t func, jit_value_t value1, jit_value_t value2);
jit_value_t jit_insn_mul(jit_function_t func, jit_value_t value1, jit_value_t value2);
jit_value_t jit_insn_mul_ovf(jit_function_t func, jit_value_t value1, jit_value_t value2);
jit_value_t jit_insn_div(jit_function_t func, jit_value_t value1, jit_value_t value2);
jit_value_t jit_insn_rem(jit_function_t func, jit_value_t value1, jit_value_t value2);
jit_value_t jit_insn_rem_ieee(jit_function_t func, jit_value_t value1, jit_value_t value2);
jit_value_t jit_insn_neg(jit_function_t func, jit_value_t value1);
jit_value_t jit_insn_and(jit_function_t func, jit_value_t value1, jit_value_t value2);
jit_value_t jit_insn_or(jit_function_t func, jit_value_t value1, jit_value_t value2);
jit_value_t jit_insn_xor(jit_function_t func, jit_value_t value1, jit_value_t value2);
jit_value_t jit_insn_not(jit_function_t func, jit_value_t value1);
jit_value_t jit_insn_shl(jit_function_t func, jit_value_t value1, jit_value_t value2);
jit_value_t jit_insn_shr(jit_function_t func, jit_value_t value1, jit_value_t value2);
jit_value_t jit_insn_ushr(jit_function_t func, jit_value_t value1, jit_value_t value2);
jit_value_t jit_insn_sshr(jit_function_t func, jit_value_t value1, jit_value_t value2);
jit_value_t jit_insn_eq(jit_function_t func, jit_value_t value1, jit_value_t value2);
jit_value_t jit_insn_ne(jit_function_t func, jit_value_t value1, jit_value_t value2);
jit_value_t jit_insn_lt(jit_function_t func, jit_value_t value1, jit_value_t value2);
jit_value_t jit_insn_le(jit_function_t func, jit_value_t value1, jit_value_t value2);
jit_value_t jit_insn_gt(jit_function_t func, jit_value_t value1, jit_value_t value2);
jit_value_t jit_insn_ge(jit_function_t func, jit_value_t value1, jit_value_t value2);
jit_value_t jit_insn_cmpl(jit_function_t func, jit_value_t value1, jit_value_t value2);
jit_value_t jit_insn_cmpg(jit_function_t func, jit_value_t value1, jit_value_t value2);
jit_value_t jit_insn_to_bool(jit_function_t func, jit_value_t value1);
jit_value_t jit_insn_to_not_bool(jit_function_t func, jit_value_t value1);
jit_value_t jit_insn_acos(jit_function_t func, jit_value_t value1);
jit_value_t jit_insn_asin(jit_function_t func, jit_value_t value1);
jit_value_t jit_insn_atan(jit_function_t func, jit_value_t value1);
jit_value_t jit_insn_atan2(jit_function_t func, jit_value_t value1, jit_value_t value2);
jit_value_t jit_insn_ceil(jit_function_t func, jit_value_t value1);
jit_value_t jit_insn_cos(jit_function_t func, jit_value_t value1);
jit_value_t jit_insn_cosh(jit_function_t func, jit_value_t value1);
jit_value_t jit_insn_exp(jit_function_t func, jit_value_t value1);
jit_value_t jit_insn_floor(jit_function_t func, jit_value_t value1);
jit_value_t jit_insn_log(jit_function_t func, jit_value_t value1);
jit_value_t jit_insn_log10(jit_function_t func, jit_value_t value1);
jit_value_t jit_insn_pow(jit_function_t func, jit_value_t value1, jit_value_t value2);
jit_value_t jit_insn_rint(jit_function_t func, jit_value_t value1);
jit_value_t jit_insn_round(jit_function_t func, jit_value_t value1);
jit_value_t jit_insn_sin(jit_function_t func, jit_value_t value1);
jit_value_t jit_insn_sinh(jit_function_t func, jit_value_t value1);
jit_value_t jit_insn_sqrt(jit_function_t func, jit_value_t value1);
jit_value_t jit_insn_tan(jit_function_t func, jit_value_t value1);
jit_value_t jit_insn_tanh(jit_function_t func, jit_value_t value1);
jit_value_t jit_insn_trunc(jit_function_t func, jit_value_t value1);
jit_value_t jit_insn_is_nan(jit_function_t func, jit_value_t value1);
jit_value_t jit_insn_is_finite(jit_function_t func, jit_value_t value1);
jit_value_t jit_insn_is_inf(jit_function_t func, jit_value_t value1);
jit_value_t jit_insn_abs(jit_function_t func, jit_value_t value1);
jit_value_t jit_insn_min(jit_function_t func, jit_value_t value1, jit_value_t value2);
jit_value_t jit_insn_max(jit_function_t func, jit_value_t value1, jit_value_t value2);
jit_value_t jit_insn_sign(jit_function_t func, jit_value_t value1);
int jit_insn_branch(jit_function_t func, jit_label_t *label);
int jit_insn_branch_if(jit_function_t func, jit_value_t value, jit_label_t *label);
int jit_insn_branch_if_not(jit_function_t func, jit_value_t value, jit_label_t *label);
int jit_insn_jump_table(jit_function_t func, jit_value_t value, jit_label_t *labels, unsigned int num_labels);
jit_value_t jit_insn_address_of(jit_function_t func, jit_value_t value1);
jit_value_t jit_insn_address_of_label(jit_function_t func, jit_label_t *label);
jit_value_t jit_insn_convert(jit_function_t func, jit_value_t value, jit_type_t type, int overflow_check);
jit_value_t jit_insn_call(jit_function_t func, char *name, jit_function_t jit_func, jit_type_t signature, jit_value_t *args, unsigned int num_args, int flags);
jit_value_t jit_insn_call_indirect(jit_function_t func, jit_value_t value, jit_type_t signature, jit_value_t *args, unsigned int num_args, int flags);
jit_value_t jit_insn_call_indirect_vtable(jit_function_t func, jit_value_t value, jit_type_t signature, jit_value_t *args, unsigned int num_args, int flags);
jit_value_t jit_insn_call_native(jit_function_t func, char *name, void *native_func, jit_type_t signature, jit_value_t *args, unsigned int num_args, int flags);
jit_value_t jit_insn_call_intrinsic(jit_function_t func, char *name, void *intrinsic_func, jit_intrinsic_descr_t *descriptor, jit_value_t arg1, jit_value_t arg2);
int jit_insn_incoming_reg(jit_function_t func, jit_value_t value, int reg);
int jit_insn_incoming_frame_posn(jit_function_t func, jit_value_t value, jit_nint frame_offset);
int jit_insn_outgoing_reg(jit_function_t func, jit_value_t value, int reg);
int jit_insn_outgoing_frame_posn(jit_function_t func, jit_value_t value, jit_nint frame_offset);
int jit_insn_return_reg(jit_function_t func, jit_value_t value, int reg);
int jit_insn_setup_for_nested(jit_function_t func, int nested_level, int reg);
int jit_insn_flush_struct(jit_function_t func, jit_value_t value);
jit_value_t jit_insn_import(jit_function_t func, jit_value_t value);
int jit_insn_push(jit_function_t func, jit_value_t value);
int jit_insn_push_ptr(jit_function_t func, jit_value_t value, jit_type_t type);
int jit_insn_set_param(jit_function_t func, jit_value_t value, jit_nint offset);
int jit_insn_set_param_ptr(jit_function_t func, jit_value_t value, jit_type_t type, jit_nint offset);
int jit_insn_push_return_area_ptr(jit_function_t func);
int jit_insn_pop_stack(jit_function_t func, jit_nint num_items);
int jit_insn_defer_pop_stack(jit_function_t func, jit_nint num_items);
int jit_insn_flush_defer_pop(jit_function_t func, jit_nint num_items);
int jit_insn_return(jit_function_t func, jit_value_t value);
int jit_insn_return_ptr(jit_function_t func, jit_value_t value, jit_type_t type);
int jit_insn_default_return(jit_function_t func);
int jit_insn_throw(jit_function_t func, jit_value_t value);
jit_value_t jit_insn_get_call_stack(jit_function_t func);
jit_value_t jit_insn_thrown_exception(jit_function_t func);
int jit_insn_uses_catcher(jit_function_t func);
jit_value_t jit_insn_start_catcher(jit_function_t func);
int jit_insn_branch_if_pc_not_in_range(jit_function_t func, jit_label_t start_label, jit_label_t end_label, jit_label_t *label);
int jit_insn_rethrow_unhandled(jit_function_t func);
int jit_insn_start_finally(jit_function_t func, jit_label_t *finally_label);
int jit_insn_return_from_finally(jit_function_t func);
int jit_insn_call_finally(jit_function_t func, jit_label_t *finally_label);
jit_value_t jit_insn_start_filter(jit_function_t func, jit_label_t *label, jit_type_t type);
int jit_insn_return_from_filter(jit_function_t func, jit_value_t value);
jit_value_t jit_insn_call_filter(jit_function_t func, jit_label_t *label, jit_value_t value, jit_type_t type);
int jit_insn_memcpy(jit_function_t func, jit_value_t dest, jit_value_t src, jit_value_t size);
int jit_insn_memmove(jit_function_t func, jit_value_t dest, jit_value_t src, jit_value_t size);
int jit_insn_memset(jit_function_t func, jit_value_t dest, jit_value_t value, jit_value_t size);
jit_value_t jit_insn_alloca(jit_function_t func, jit_value_t size);
int jit_insn_move_blocks_to_end(jit_function_t func, jit_label_t from_label, jit_label_t to_label);
int jit_insn_move_blocks_to_start(jit_function_t func, jit_label_t from_label, jit_label_t to_label);
int jit_insn_mark_offset(jit_function_t func, jit_int offset);
int jit_insn_mark_breakpoint(jit_function_t func, jit_nint data1, jit_nint data2);
int jit_insn_mark_breakpoint_variable(jit_function_t func, jit_value_t data1, jit_value_t data2);
void jit_insn_iter_init(jit_insn_iter_t *iter, jit_block_t block);
void jit_insn_iter_init_last(jit_insn_iter_t *iter, jit_block_t block);
jit_insn_t jit_insn_iter_next(jit_insn_iter_t *iter);
jit_insn_t jit_insn_iter_previous(jit_insn_iter_t *iter);
jit_int jit_int_add(jit_int value1, jit_int value2);
jit_int jit_int_sub(jit_int value1, jit_int value2);
jit_int jit_int_mul(jit_int value1, jit_int value2);
jit_int jit_int_div(jit_int *result, jit_int value1, jit_int value2);
jit_int jit_int_rem(jit_int *result, jit_int value1, jit_int value2);
jit_int jit_int_add_ovf(jit_int *result, jit_int value1, jit_int value2);
jit_int jit_int_sub_ovf(jit_int *result, jit_int value1, jit_int value2);
jit_int jit_int_mul_ovf(jit_int *result, jit_int value1, jit_int value2);
jit_int jit_int_neg(jit_int value1);
jit_int jit_int_and(jit_int value1, jit_int value2);
jit_int jit_int_or(jit_int value1, jit_int value2);
jit_int jit_int_xor(jit_int value1, jit_int value2);
jit_int jit_int_not(jit_int value1);
jit_int jit_int_shl(jit_int value1, jit_uint value2);
jit_int jit_int_shr(jit_int value1, jit_uint value2);
jit_int jit_int_eq(jit_int value1, jit_int value2);
jit_int jit_int_ne(jit_int value1, jit_int value2);
jit_int jit_int_lt(jit_int value1, jit_int value2);
jit_int jit_int_le(jit_int value1, jit_int value2);
jit_int jit_int_gt(jit_int value1, jit_int value2);
jit_int jit_int_ge(jit_int value1, jit_int value2);
jit_int jit_int_cmp(jit_int value1, jit_int value2);
jit_int jit_int_abs(jit_int value1);
jit_int jit_int_min(jit_int value1, jit_int value2);
jit_int jit_int_max(jit_int value1, jit_int value2);
jit_int jit_int_sign(jit_int value1);
jit_uint jit_uint_add(jit_uint value1, jit_uint value2);
jit_uint jit_uint_sub(jit_uint value1, jit_uint value2);
jit_uint jit_uint_mul(jit_uint value1, jit_uint value2);
jit_int jit_uint_div(jit_uint *result, jit_uint value1, jit_uint value2);
jit_int jit_uint_rem(jit_uint *result, jit_uint value1, jit_uint value2);
jit_int jit_uint_add_ovf(jit_uint *result, jit_uint value1, jit_uint value2);
jit_int jit_uint_sub_ovf(jit_uint *result, jit_uint value1, jit_uint value2);
jit_int jit_uint_mul_ovf(jit_uint *result, jit_uint value1, jit_uint value2);
jit_uint jit_uint_neg(jit_uint value1);
jit_uint jit_uint_and(jit_uint value1, jit_uint value2);
jit_uint jit_uint_or(jit_uint value1, jit_uint value2);
jit_uint jit_uint_xor(jit_uint value1, jit_uint value2);
jit_uint jit_uint_not(jit_uint value1);
jit_uint jit_uint_shl(jit_uint value1, jit_uint value2);
jit_uint jit_uint_shr(jit_uint value1, jit_uint value2);
jit_int jit_uint_eq(jit_uint value1, jit_uint value2);
jit_int jit_uint_ne(jit_uint value1, jit_uint value2);
jit_int jit_uint_lt(jit_uint value1, jit_uint value2);
jit_int jit_uint_le(jit_uint value1, jit_uint value2);
jit_int jit_uint_gt(jit_uint value1, jit_uint value2);
jit_int jit_uint_ge(jit_uint value1, jit_uint value2);
jit_int jit_uint_cmp(jit_uint value1, jit_uint value2);
jit_uint jit_uint_min(jit_uint value1, jit_uint value2);
jit_uint jit_uint_max(jit_uint value1, jit_uint value2);
jit_long jit_long_add(jit_long value1, jit_long value2);
jit_long jit_long_sub(jit_long value1, jit_long value2);
jit_long jit_long_mul(jit_long value1, jit_long value2);
jit_int jit_long_div(jit_long *result, jit_long value1, jit_long value2);
jit_int jit_long_rem(jit_long *result, jit_long value1, jit_long value2);
jit_int jit_long_add_ovf(jit_long *result, jit_long value1, jit_long value2);
jit_int jit_long_sub_ovf(jit_long *result, jit_long value1, jit_long value2);
jit_int jit_long_mul_ovf(jit_long *result, jit_long value1, jit_long value2);
jit_long jit_long_neg(jit_long value1);
jit_long jit_long_and(jit_long value1, jit_long value2);
jit_long jit_long_or(jit_long value1, jit_long value2);
jit_long jit_long_xor(jit_long value1, jit_long value2);
jit_long jit_long_not(jit_long value1);
jit_long jit_long_shl(jit_long value1, jit_uint value2);
jit_long jit_long_shr(jit_long value1, jit_uint value2);
jit_int jit_long_eq(jit_long value1, jit_long value2);
jit_int jit_long_ne(jit_long value1, jit_long value2);
jit_int jit_long_lt(jit_long value1, jit_long value2);
jit_int jit_long_le(jit_long value1, jit_long value2);
jit_int jit_long_gt(jit_long value1, jit_long value2);
jit_int jit_long_ge(jit_long value1, jit_long value2);
jit_int jit_long_cmp(jit_long value1, jit_long value2);
jit_long jit_long_abs(jit_long value1);
jit_long jit_long_min(jit_long value1, jit_long value2);
jit_long jit_long_max(jit_long value1, jit_long value2);
jit_int jit_long_sign(jit_long value1);
jit_ulong jit_ulong_add(jit_ulong value1, jit_ulong value2);
jit_ulong jit_ulong_sub(jit_ulong value1, jit_ulong value2);
jit_ulong jit_ulong_mul(jit_ulong value1, jit_ulong value2);
jit_int jit_ulong_div(jit_ulong *result, jit_ulong value1, jit_ulong value2);
jit_int jit_ulong_rem(jit_ulong *result, jit_ulong value1, jit_ulong value2);
jit_int jit_ulong_add_ovf(jit_ulong *result, jit_ulong value1, jit_ulong value2);
jit_int jit_ulong_sub_ovf(jit_ulong *result, jit_ulong value1, jit_ulong value2);
jit_int jit_ulong_mul_ovf(jit_ulong *result, jit_ulong value1, jit_ulong value2);
jit_ulong jit_ulong_neg(jit_ulong value1);
jit_ulong jit_ulong_and(jit_ulong value1, jit_ulong value2);
jit_ulong jit_ulong_or(jit_ulong value1, jit_ulong value2);
jit_ulong jit_ulong_xor(jit_ulong value1, jit_ulong value2);
jit_ulong jit_ulong_not(jit_ulong value1);
jit_ulong jit_ulong_shl(jit_ulong value1, jit_uint value2);
jit_ulong jit_ulong_shr(jit_ulong value1, jit_uint value2);
jit_int jit_ulong_eq(jit_ulong value1, jit_ulong value2);
jit_int jit_ulong_ne(jit_ulong value1, jit_ulong value2);
jit_int jit_ulong_lt(jit_ulong value1, jit_ulong value2);
jit_int jit_ulong_le(jit_ulong value1, jit_ulong value2);
jit_int jit_ulong_gt(jit_ulong value1, jit_ulong value2);
jit_int jit_ulong_ge(jit_ulong value1, jit_ulong value2);
jit_int jit_ulong_cmp(jit_ulong value1, jit_ulong value2);
jit_ulong jit_ulong_min(jit_ulong value1, jit_ulong value2);
jit_ulong jit_ulong_max(jit_ulong value1, jit_ulong value2);
jit_float32 jit_float32_add(jit_float32 value1, jit_float32 value2);
jit_float32 jit_float32_sub(jit_float32 value1, jit_float32 value2);
jit_float32 jit_float32_mul(jit_float32 value1, jit_float32 value2);
jit_float32 jit_float32_div(jit_float32 value1, jit_float32 value2);
jit_float32 jit_float32_rem(jit_float32 value1, jit_float32 value2);
jit_float32 jit_float32_ieee_rem(jit_float32 value1, jit_float32 value2);
jit_float32 jit_float32_neg(jit_float32 value1);
jit_int jit_float32_eq(jit_float32 value1, jit_float32 value2);
jit_int jit_float32_ne(jit_float32 value1, jit_float32 value2);
jit_int jit_float32_lt(jit_float32 value1, jit_float32 value2);
jit_int jit_float32_le(jit_float32 value1, jit_float32 value2);
jit_int jit_float32_gt(jit_float32 value1, jit_float32 value2);
jit_int jit_float32_ge(jit_float32 value1, jit_float32 value2);
jit_int jit_float32_cmpl(jit_float32 value1, jit_float32 value2);
jit_int jit_float32_cmpg(jit_float32 value1, jit_float32 value2);
jit_float32 jit_float32_acos(jit_float32 value1);
jit_float32 jit_float32_asin(jit_float32 value1);
jit_float32 jit_float32_atan(jit_float32 value1);
jit_float32 jit_float32_atan2(jit_float32 value1, jit_float32 value2);
jit_float32 jit_float32_ceil(jit_float32 value1);
jit_float32 jit_float32_cos(jit_float32 value1);
jit_float32 jit_float32_cosh(jit_float32 value1);
jit_float32 jit_float32_exp(jit_float32 value1);
jit_float32 jit_float32_floor(jit_float32 value1);
jit_float32 jit_float32_log(jit_float32 value1);
jit_float32 jit_float32_log10(jit_float32 value1);
jit_float32 jit_float32_pow(jit_float32 value1, jit_float32 value2);
jit_float32 jit_float32_rint(jit_float32 value1);
jit_float32 jit_float32_round(jit_float32 value1);
jit_float32 jit_float32_sin(jit_float32 value1);
jit_float32 jit_float32_sinh(jit_float32 value1);
jit_float32 jit_float32_sqrt(jit_float32 value1);
jit_float32 jit_float32_tan(jit_float32 value1);
jit_float32 jit_float32_tanh(jit_float32 value1);
jit_float32 jit_float32_trunc(jit_float32 value1);
jit_int jit_float32_is_finite(jit_float32 value);
jit_int jit_float32_is_nan(jit_float32 value);
jit_int jit_float32_is_inf(jit_float32 value);
jit_float32 jit_float32_abs(jit_float32 value1);
jit_float32 jit_float32_min(jit_float32 value1, jit_float32 value2);
jit_float32 jit_float32_max(jit_float32 value1, jit_float32 value2);
jit_int jit_float32_sign(jit_float32 value1);
jit_float64 jit_float64_add(jit_float64 value1, jit_float64 value2);
jit_float64 jit_float64_sub(jit_float64 value1, jit_float64 value2);
jit_float64 jit_float64_mul(jit_float64 value1, jit_float64 value2);
jit_float64 jit_float64_div(jit_float64 value1, jit_float64 value2);
jit_float64 jit_float64_rem(jit_float64 value1, jit_float64 value2);
jit_float64 jit_float64_ieee_rem(jit_float64 value1, jit_float64 value2);
jit_float64 jit_float64_neg(jit_float64 value1);
jit_int jit_float64_eq(jit_float64 value1, jit_float64 value2);
jit_int jit_float64_ne(jit_float64 value1, jit_float64 value2);
jit_int jit_float64_lt(jit_float64 value1, jit_float64 value2);
jit_int jit_float64_le(jit_float64 value1, jit_float64 value2);
jit_int jit_float64_gt(jit_float64 value1, jit_float64 value2);
jit_int jit_float64_ge(jit_float64 value1, jit_float64 value2);
jit_int jit_float64_cmpl(jit_float64 value1, jit_float64 value2);
jit_int jit_float64_cmpg(jit_float64 value1, jit_float64 value2);
jit_float64 jit_float64_acos(jit_float64 value1);
jit_float64 jit_float64_asin(jit_float64 value1);
jit_float64 jit_float64_atan(jit_float64 value1);
jit_float64 jit_float64_atan2(jit_float64 value1, jit_float64 value2);
jit_float64 jit_float64_ceil(jit_float64 value1);
jit_float64 jit_float64_cos(jit_float64 value1);
jit_float64 jit_float64_cosh(jit_float64 value1);
jit_float64 jit_float64_exp(jit_float64 value1);
jit_float64 jit_float64_floor(jit_float64 value1);
jit_float64 jit_float64_log(jit_float64 value1);
jit_float64 jit_float64_log10(jit_float64 value1);
jit_float64 jit_float64_pow(jit_float64 value1, jit_float64 value2);
jit_float64 jit_float64_rint(jit_float64 value1);
jit_float64 jit_float64_round(jit_float64 value1);
jit_float64 jit_float64_sin(jit_float64 value1);
jit_float64 jit_float64_sinh(jit_float64 value1);
jit_float64 jit_float64_sqrt(jit_float64 value1);
jit_float64 jit_float64_tan(jit_float64 value1);
jit_float64 jit_float64_tanh(jit_float64 value1);
jit_float64 jit_float64_trunc(jit_float64 value1);
jit_int jit_float64_is_finite(jit_float64 value);
jit_int jit_float64_is_nan(jit_float64 value);
jit_int jit_float64_is_inf(jit_float64 value);
jit_float64 jit_float64_abs(jit_float64 value1);
jit_float64 jit_float64_min(jit_float64 value1, jit_float64 value2);
jit_float64 jit_float64_max(jit_float64 value1, jit_float64 value2);
jit_int jit_float64_sign(jit_float64 value1);
jit_nfloat jit_nfloat_add(jit_nfloat value1, jit_nfloat value2);
jit_nfloat jit_nfloat_sub(jit_nfloat value1, jit_nfloat value2);
jit_nfloat jit_nfloat_mul(jit_nfloat value1, jit_nfloat value2);
jit_nfloat jit_nfloat_div(jit_nfloat value1, jit_nfloat value2);
jit_nfloat jit_nfloat_rem(jit_nfloat value1, jit_nfloat value2);
jit_nfloat jit_nfloat_ieee_rem(jit_nfloat value1, jit_nfloat value2);
jit_nfloat jit_nfloat_neg(jit_nfloat value1);
jit_int jit_nfloat_eq(jit_nfloat value1, jit_nfloat value2);
jit_int jit_nfloat_ne(jit_nfloat value1, jit_nfloat value2);
jit_int jit_nfloat_lt(jit_nfloat value1, jit_nfloat value2);
jit_int jit_nfloat_le(jit_nfloat value1, jit_nfloat value2);
jit_int jit_nfloat_gt(jit_nfloat value1, jit_nfloat value2);
jit_int jit_nfloat_ge(jit_nfloat value1, jit_nfloat value2);
jit_int jit_nfloat_cmpl(jit_nfloat value1, jit_nfloat value2);
jit_int jit_nfloat_cmpg(jit_nfloat value1, jit_nfloat value2);
jit_nfloat jit_nfloat_acos(jit_nfloat value1);
jit_nfloat jit_nfloat_asin(jit_nfloat value1);
jit_nfloat jit_nfloat_atan(jit_nfloat value1);
jit_nfloat jit_nfloat_atan2(jit_nfloat value1, jit_nfloat value2);
jit_nfloat jit_nfloat_ceil(jit_nfloat value1);
jit_nfloat jit_nfloat_cos(jit_nfloat value1);
jit_nfloat jit_nfloat_cosh(jit_nfloat value1);
jit_nfloat jit_nfloat_exp(jit_nfloat value1);
jit_nfloat jit_nfloat_floor(jit_nfloat value1);
jit_nfloat jit_nfloat_log(jit_nfloat value1);
jit_nfloat jit_nfloat_log10(jit_nfloat value1);
jit_nfloat jit_nfloat_pow(jit_nfloat value1, jit_nfloat value2);
jit_nfloat jit_nfloat_rint(jit_nfloat value1);
jit_nfloat jit_nfloat_round(jit_nfloat value1);
jit_nfloat jit_nfloat_sin(jit_nfloat value1);
jit_nfloat jit_nfloat_sinh(jit_nfloat value1);
jit_nfloat jit_nfloat_sqrt(jit_nfloat value1);
jit_nfloat jit_nfloat_tan(jit_nfloat value1);
jit_nfloat jit_nfloat_tanh(jit_nfloat value1);
jit_nfloat jit_nfloat_trunc(jit_nfloat value1);
jit_int jit_nfloat_is_finite(jit_nfloat value);
jit_int jit_nfloat_is_nan(jit_nfloat value);
jit_int jit_nfloat_is_inf(jit_nfloat value);
jit_nfloat jit_nfloat_abs(jit_nfloat value1);
jit_nfloat jit_nfloat_min(jit_nfloat value1, jit_nfloat value2);
jit_nfloat jit_nfloat_max(jit_nfloat value1, jit_nfloat value2);
jit_int jit_nfloat_sign(jit_nfloat value1);
jit_int jit_int_to_sbyte(jit_int value);
jit_int jit_int_to_ubyte(jit_int value);
jit_int jit_int_to_short(jit_int value);
jit_int jit_int_to_ushort(jit_int value);
jit_int jit_int_to_int(jit_int value);
jit_uint jit_int_to_uint(jit_int value);
jit_long jit_int_to_long(jit_int value);
jit_ulong jit_int_to_ulong(jit_int value);
jit_int jit_uint_to_int(jit_uint value);
jit_uint jit_uint_to_uint(jit_uint value);
jit_long jit_uint_to_long(jit_uint value);
jit_ulong jit_uint_to_ulong(jit_uint value);
jit_int jit_long_to_int(jit_long value);
jit_uint jit_long_to_uint(jit_long value);
jit_long jit_long_to_long(jit_long value);
jit_ulong jit_long_to_ulong(jit_long value);
jit_int jit_ulong_to_int(jit_ulong value);
jit_uint jit_ulong_to_uint(jit_ulong value);
jit_long jit_ulong_to_long(jit_ulong value);
jit_ulong jit_ulong_to_ulong(jit_ulong value);
jit_int jit_int_to_sbyte_ovf(jit_int *result, jit_int value);
jit_int jit_int_to_ubyte_ovf(jit_int *result, jit_int value);
jit_int jit_int_to_short_ovf(jit_int *result, jit_int value);
jit_int jit_int_to_ushort_ovf(jit_int *result, jit_int value);
jit_int jit_int_to_int_ovf(jit_int *result, jit_int value);
jit_int jit_int_to_uint_ovf(jit_uint *result, jit_int value);
jit_int jit_int_to_long_ovf(jit_long *result, jit_int value);
jit_int jit_int_to_ulong_ovf(jit_ulong *result, jit_int value);
jit_int jit_uint_to_int_ovf(jit_int *result, jit_uint value);
jit_int jit_uint_to_uint_ovf(jit_uint *result, jit_uint value);
jit_int jit_uint_to_long_ovf(jit_long *result, jit_uint value);
jit_int jit_uint_to_ulong_ovf(jit_ulong *result, jit_uint value);
jit_int jit_long_to_int_ovf(jit_int *result, jit_long value);
jit_int jit_long_to_uint_ovf(jit_uint *result, jit_long value);
jit_int jit_long_to_long_ovf(jit_long *result, jit_long value);
jit_int jit_long_to_ulong_ovf(jit_ulong *result, jit_long value);
jit_int jit_ulong_to_int_ovf(jit_int *result, jit_ulong value);
jit_int jit_ulong_to_uint_ovf(jit_uint *result, jit_ulong value);
jit_int jit_ulong_to_long_ovf(jit_long *result, jit_ulong value);
jit_int jit_ulong_to_ulong_ovf(jit_ulong *result, jit_ulong value);
jit_int jit_float32_to_int(jit_float32 value);
jit_uint jit_float32_to_uint(jit_float32 value);
jit_long jit_float32_to_long(jit_float32 value);
jit_ulong jit_float32_to_ulong(jit_float32 value);
jit_int jit_float32_to_int_ovf(jit_int *result, jit_float32 value);
jit_int jit_float32_to_uint_ovf(jit_uint *result, jit_float32 value);
jit_int jit_float32_to_long_ovf(jit_long *result, jit_float32 value);
jit_int jit_float32_to_ulong_ovf(jit_ulong *result, jit_float32 value);
jit_int jit_float64_to_int(jit_float64 value);
jit_uint jit_float64_to_uint(jit_float64 value);
jit_long jit_float64_to_long(jit_float64 value);
jit_ulong jit_float64_to_ulong(jit_float64 value);
jit_int jit_float64_to_int_ovf(jit_int *result, jit_float64 value);
jit_int jit_float64_to_uint_ovf(jit_uint *result, jit_float64 value);
jit_int jit_float64_to_long_ovf(jit_long *result, jit_float64 value);
jit_int jit_float64_to_ulong_ovf(jit_ulong *result, jit_float64 value);
jit_int jit_nfloat_to_int(jit_nfloat value);
jit_uint jit_nfloat_to_uint(jit_nfloat value);
jit_long jit_nfloat_to_long(jit_nfloat value);
jit_ulong jit_nfloat_to_ulong(jit_nfloat value);
jit_int jit_nfloat_to_int_ovf(jit_int *result, jit_nfloat value);
jit_int jit_nfloat_to_uint_ovf(jit_uint *result, jit_nfloat value);
jit_int jit_nfloat_to_long_ovf(jit_long *result, jit_nfloat value);
jit_int jit_nfloat_to_ulong_ovf(jit_ulong *result, jit_nfloat value);
jit_float32 jit_int_to_float32(jit_int value);
jit_float64 jit_int_to_float64(jit_int value);
jit_nfloat jit_int_to_nfloat(jit_int value);
jit_float32 jit_uint_to_float32(jit_uint value);
jit_float64 jit_uint_to_float64(jit_uint value);
jit_nfloat jit_uint_to_nfloat(jit_uint value);
jit_float32 jit_long_to_float32(jit_long value);
jit_float64 jit_long_to_float64(jit_long value);
jit_nfloat jit_long_to_nfloat(jit_long value);
jit_float32 jit_ulong_to_float32(jit_ulong value);
jit_float64 jit_ulong_to_float64(jit_ulong value);
jit_nfloat jit_ulong_to_nfloat(jit_ulong value);
jit_float64 jit_float32_to_float64(jit_float32 value);
jit_nfloat jit_float32_to_nfloat(jit_float32 value);
jit_float32 jit_float64_to_float32(jit_float64 value);
jit_nfloat jit_float64_to_nfloat(jit_float64 value);
jit_float32 jit_nfloat_to_float32(jit_nfloat value);
jit_float64 jit_nfloat_to_float64(jit_nfloat value);
typedef struct _jit_meta * jit_meta_t;
int jit_meta_set(jit_meta_t *list, int type, void *data, jit_meta_free_func free_data, jit_function_t pool_owner);
void * jit_meta_get(jit_meta_t list, int type);
void jit_meta_free(jit_meta_t *list, int type);
void jit_meta_destroy(jit_meta_t *list);
typedef struct jit_objmodel * jit_objmodel_t;
typedef struct jitom_class * jitom_class_t;
typedef struct jitom_field * jitom_field_t;
typedef struct jitom_method * jitom_method_t;
void jitom_destroy_model(jit_objmodel_t model);
jitom_class_t jitom_get_class_by_name(jit_objmodel_t model, char *name);
char * jitom_class_get_name(jit_objmodel_t model, jitom_class_t klass);
int jitom_class_get_modifiers(jit_objmodel_t model, jitom_class_t klass);
jit_type_t jitom_class_get_type(jit_objmodel_t model, jitom_class_t klass);
jit_type_t jitom_class_get_value_type(jit_objmodel_t model, jitom_class_t klass);
jitom_class_t jitom_class_get_primary_super(jit_objmodel_t model, jitom_class_t klass);
jitom_class_t * jitom_class_get_all_supers(jit_objmodel_t model, jitom_class_t klass, unsigned int *num);
jitom_class_t * jitom_class_get_interfaces(jit_objmodel_t model, jitom_class_t klass, unsigned int *num);
jitom_field_t * jitom_class_get_fields(jit_objmodel_t model, jitom_class_t klass, unsigned int *num);
jitom_method_t * jitom_class_get_methods(jit_objmodel_t model, jitom_class_t klass, unsigned int *num);
jit_value_t jitom_class_new(jit_objmodel_t model, jitom_class_t klass, jitom_method_t ctor, jit_function_t func, jit_value_t *args, unsigned int num_args, int flags);
jit_value_t jitom_class_new_value(jit_objmodel_t model, jitom_class_t klass, jitom_method_t ctor, jit_function_t func, jit_value_t *args, unsigned int num_args, int flags);
int jitom_class_delete(jit_objmodel_t model, jitom_class_t klass, jit_value_t obj_value);
int jitom_class_add_ref(jit_objmodel_t model, jitom_class_t klass, jit_value_t obj_value);
char * jitom_field_get_name(jit_objmodel_t model, jitom_class_t klass, jitom_field_t field);
jit_type_t jitom_field_get_type(jit_objmodel_t model, jitom_class_t klass, jitom_field_t field);
int jitom_field_get_modifiers(jit_objmodel_t model, jitom_class_t klass, jitom_field_t field);
jit_value_t jitom_field_load(jit_objmodel_t model, jitom_class_t klass, jitom_field_t field, jit_function_t func, jit_value_t obj_value);
jit_value_t jitom_field_load_address(jit_objmodel_t model, jitom_class_t klass, jitom_field_t field, jit_function_t func, jit_value_t obj_value);
int jitom_field_store(jit_objmodel_t model, jitom_class_t klass, jitom_field_t field, jit_function_t func, jit_value_t obj_value, jit_value_t value);
char * jitom_method_get_name(jit_objmodel_t model, jitom_class_t klass, jitom_method_t method);
jit_type_t jitom_method_get_type(jit_objmodel_t model, jitom_class_t klass, jitom_method_t method);
int jitom_method_get_modifiers(jit_objmodel_t model, jitom_class_t klass, jitom_method_t method);
jit_value_t jitom_method_invoke(jit_objmodel_t model, jitom_class_t klass, jitom_method_t method, jit_function_t func, jit_value_t *args, unsigned int num_args, int flags);
jit_value_t jitom_method_invoke_virtual(jit_objmodel_t model, jitom_class_t klass, jitom_method_t method, jit_function_t func, jit_value_t *args, unsigned int num_args, int flags);
jit_type_t jitom_type_tag_as_class(jit_type_t type, jit_objmodel_t model, jitom_class_t klass, int incref);
jit_type_t jitom_type_tag_as_value(jit_type_t type, jit_objmodel_t model, jitom_class_t klass, int incref);
int jitom_type_is_class(jit_type_t type);
int jitom_type_is_value(jit_type_t type);
jit_objmodel_t jitom_type_get_model(jit_type_t type);
jitom_class_t jitom_type_get_class(jit_type_t type);
typedef struct jit_opcode_info jit_opcode_info_t;
struct jit_opcode_info {
  char *name;
  int flags;
};
extern jit_opcode_info_t jit_opcodes[0x01B7];
typedef struct _jit_arch_frame _jit_arch_frame_t;
struct _jit_arch_frame {
  _jit_arch_frame_t *next_frame;
  void *return_address;
};
typedef struct {
  void *frame;
  void *cache;
  jit_context_t context;
} jit_unwind_context_t;
int jit_unwind_init(jit_unwind_context_t *unwind, jit_context_t context);
void jit_unwind_free(jit_unwind_context_t *unwind);
int jit_unwind_next(jit_unwind_context_t *unwind);
int jit_unwind_next_pc(jit_unwind_context_t *unwind);
void * jit_unwind_get_pc(jit_unwind_context_t *unwind);
int jit_unwind_jump(jit_unwind_context_t *unwind, void *pc);
jit_function_t jit_unwind_get_function(jit_unwind_context_t *unwind);
unsigned int jit_unwind_get_offset(jit_unwind_context_t *unwind);
void * jit_malloc(unsigned int size);
void * jit_calloc(unsigned int num, unsigned int size);
void * jit_realloc(void *ptr, unsigned int size);
void jit_free(void *ptr);
void * jit_memset(void *dest, int ch, unsigned int len);
void * jit_memcpy(void *dest, void *src, unsigned int len);
void * jit_memmove(void *dest, void *src, unsigned int len);
int jit_memcmp(void *s1, void *s2, unsigned int len);
void * jit_memchr(void *str, int ch, unsigned int len);
unsigned int jit_strlen(char *str);
char * jit_strcpy(char *dest, char *src);
char * jit_strcat(char *dest, char *src);
char * jit_strncpy(char *dest, char *src, unsigned int len);
char * jit_strdup(char *str);
char * jit_strndup(char *str, unsigned int len);
int jit_strcmp(char *str1, char *str2);
int jit_strncmp(char *str1, char *str2, unsigned int len);
int jit_stricmp(char *str1, char *str2);
int jit_strnicmp(char *str1, char *str2, unsigned int len);
char * jit_strchr(char *str, int ch);
char * jit_strrchr(char *str, int ch);
int jit_sprintf(char *str, char *format, ...);
int jit_snprintf(char *str, unsigned int len, char *format, ...);
typedef struct {
  jit_type_t type;
  union {
    void *ptr_value;
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
jit_value_t jit_value_create(jit_function_t func, jit_type_t type);
jit_value_t jit_value_create_nint_constant(jit_function_t func, jit_type_t type, jit_nint const_value);
jit_value_t jit_value_create_long_constant(jit_function_t func, jit_type_t type, jit_long const_value);
jit_value_t jit_value_create_float32_constant(jit_function_t func, jit_type_t type, jit_float32 const_value);
jit_value_t jit_value_create_float64_constant(jit_function_t func, jit_type_t type, jit_float64 const_value);
jit_value_t jit_value_create_nfloat_constant(jit_function_t func, jit_type_t type, jit_nfloat const_value);
jit_value_t jit_value_create_constant(jit_function_t func, jit_constant_t *const_value);
jit_value_t jit_value_get_param(jit_function_t func, unsigned int param);
jit_value_t jit_value_get_struct_pointer(jit_function_t func);
int jit_value_is_temporary(jit_value_t value);
int jit_value_is_local(jit_value_t value);
int jit_value_is_constant(jit_value_t value);
int jit_value_is_parameter(jit_value_t value);
void jit_value_ref(jit_function_t func, jit_value_t value);
void jit_value_set_volatile(jit_value_t value);
int jit_value_is_volatile(jit_value_t value);
void jit_value_set_addressable(jit_value_t value);
int jit_value_is_addressable(jit_value_t value);
jit_type_t jit_value_get_type(jit_value_t value);
jit_function_t jit_value_get_function(jit_value_t value);
jit_block_t jit_value_get_block(jit_value_t value);
jit_context_t jit_value_get_context(jit_value_t value);
jit_constant_t jit_value_get_constant(jit_value_t value);
jit_nint jit_value_get_nint_constant(jit_value_t value);
jit_long jit_value_get_long_constant(jit_value_t value);
jit_float32 jit_value_get_float32_constant(jit_value_t value);
jit_float64 jit_value_get_float64_constant(jit_value_t value);
jit_nfloat jit_value_get_nfloat_constant(jit_value_t value);
int jit_value_is_true(jit_value_t value);
int jit_constant_convert(jit_constant_t *result, jit_constant_t *value, jit_type_t type, int overflow_check);
typedef enum {
  JIT_PROT_NONE,
  JIT_PROT_READ,
  JIT_PROT_READ_WRITE,
  JIT_PROT_EXEC_READ,
  JIT_PROT_EXEC_READ_WRITE,
} jit_prot_t;
void jit_vmem_init(void);
jit_uint jit_vmem_page_size(void);
jit_nuint jit_vmem_round_up(jit_nuint value);
jit_nuint jit_vmem_round_down(jit_nuint value);
void * jit_vmem_reserve(jit_uint size);
void * jit_vmem_reserve_committed(jit_uint size, jit_prot_t prot);
int jit_vmem_release(void *addr, jit_uint size);
int jit_vmem_commit(void *addr, jit_uint size, jit_prot_t prot);
int jit_vmem_decommit(void *addr, jit_uint size);
int jit_vmem_protect(void *addr, jit_uint size, jit_prot_t prot);
void * _jit_get_frame_address(void *start, unsigned int n);
void * _jit_get_next_frame_address(void *frame);
void * _jit_get_return_address(void *frame, void *frame0, void *return0);
typedef struct {
  volatile void *mark;
} jit_crawl_mark_t;
int jit_frame_contains_crawl_mark(void *frame, jit_crawl_mark_t *mark);
typedef unsigned char __u_char;
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
typedef void * __timer_t;
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
typedef __quad_t * __qaddr_t;
typedef char * __caddr_t;
typedef long int __intptr_t;
typedef unsigned int __socklen_t;
struct _IO_FILE;
typedef struct _IO_FILE FILE;
typedef struct _IO_FILE __FILE;
typedef unsigned int wint_t;
typedef struct {
  int __count;
  union {
    unsigned int __wch;
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
  struct _IO_marker *_next;
  struct _IO_FILE *_sbuf;
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
  char *_IO_read_ptr;
  char *_IO_read_end;
  char *_IO_read_base;
  char *_IO_write_base;
  char *_IO_write_ptr;
  char *_IO_write_end;
  char *_IO_buf_base;
  char *_IO_buf_end;
  char *_IO_save_base;
  char *_IO_backup_base;
  char *_IO_save_end;
  struct _IO_marker *_markers;
  struct _IO_FILE *_chain;
  int _fileno;
  int _flags2;
  __off_t _old_offset;
  unsigned short _cur_column;
  signed char _vtable_offset;
  char _shortbuf[1];
  _IO_lock_t *_lock;
  __off64_t _offset;
  void *__pad1;
  void *__pad2;
  void *__pad3;
  void *__pad4;
  size_t __pad5;
  int _mode;
  char _unused2[(((15 * (sizeof (int))) - (4 * (sizeof (void *)))) - (sizeof (size_t)))];
};
typedef struct _IO_FILE _IO_FILE;
typedef __ssize_t __io_read_fn(void *__cookie, char *__buf, size_t __nbytes);
typedef __ssize_t __io_write_fn(void *__cookie, char *__buf, size_t __n);
typedef int __io_seek_fn(void *__cookie, __off64_t *__pos, int __w);
typedef int __io_close_fn(void *__cookie);
extern int _IO_getc(_IO_FILE *__fp);
extern int _IO_putc(int __c, _IO_FILE *__fp);
extern int _IO_feof(_IO_FILE *__fp);
extern int _IO_ferror(_IO_FILE *__fp);
extern int _IO_peekc_locked(_IO_FILE *__fp);
extern void _IO_flockfile(_IO_FILE *);
extern void _IO_funlockfile(_IO_FILE *);
extern int _IO_ftrylockfile(_IO_FILE *);
extern int _IO_vfscanf(_IO_FILE *, char *, __gnuc_va_list, int *);
extern int _IO_vfprintf(_IO_FILE *, char *, __gnuc_va_list);
extern __ssize_t _IO_padn(_IO_FILE *, int, __ssize_t);
extern size_t _IO_sgetn(_IO_FILE *, void *, size_t);
extern __off64_t _IO_seekoff(_IO_FILE *, __off64_t, int, int);
extern __off64_t _IO_seekpos(_IO_FILE *, __off64_t, int);
extern void _IO_free_backup_area(_IO_FILE *);
typedef _G_fpos_t fpos_t;
extern struct _IO_FILE *stdin;
extern struct _IO_FILE *stdout;
extern struct _IO_FILE *stderr;
extern int remove(char *__filename);
extern int rename(char *__old, char *__new);
extern int renameat(int __oldfd, char *__old, int __newfd, char *__new);
extern FILE * tmpfile(void);
extern char * tmpnam(char *__s);
extern char * tmpnam_r(char *__s);
extern char * tempnam(char *__dir, char *__pfx);
extern int fclose(FILE *__stream);
extern int fflush(FILE *__stream);
extern int fflush_unlocked(FILE *__stream);
extern FILE * fopen(char *__filename, char *__modes);
extern FILE * freopen(char *__filename, char *__modes, FILE *__stream);
extern FILE * fdopen(int __fd, char *__modes);
extern FILE * fmemopen(void *__s, size_t __len, char *__modes);
extern FILE * open_memstream(char **__bufloc, size_t *__sizeloc);
extern void setbuf(FILE *__stream, char *__buf);
extern int setvbuf(FILE *__stream, char *__buf, int __modes, size_t __n);
extern void setbuffer(FILE *__stream, char *__buf, size_t __size);
extern void setlinebuf(FILE *__stream);
extern int fprintf(FILE *__stream, char *__format, ...);
extern int printf(char *__format, ...);
extern int sprintf(char *__s, char *__format, ...);
extern int vfprintf(FILE *__s, char *__format, __gnuc_va_list __arg);
extern int vprintf(char *__format, __gnuc_va_list __arg);
extern int vsprintf(char *__s, char *__format, __gnuc_va_list __arg);
extern int snprintf(char *__s, size_t __maxlen, char *__format, ...);
extern int vsnprintf(char *__s, size_t __maxlen, char *__format, __gnuc_va_list __arg);
extern int vdprintf(int __fd, char *__fmt, __gnuc_va_list __arg);
extern int dprintf(int __fd, char *__fmt, ...);
extern int fscanf(FILE *__stream, char *__format, ...);
extern int scanf(char *__format, ...);
extern int sscanf(char *__s, char *__format, ...);
extern int vfscanf(FILE *__s, char *__format, __gnuc_va_list __arg);
extern int vscanf(char *__format, __gnuc_va_list __arg);
extern int vsscanf(char *__s, char *__format, __gnuc_va_list __arg);
extern int fgetc(FILE *__stream);
extern int getc(FILE *__stream);
extern int getchar(void);
extern int getc_unlocked(FILE *__stream);
extern int getchar_unlocked(void);
extern int fgetc_unlocked(FILE *__stream);
extern int fputc(int __c, FILE *__stream);
extern int putc(int __c, FILE *__stream);
extern int putchar(int __c);
extern int fputc_unlocked(int __c, FILE *__stream);
extern int putc_unlocked(int __c, FILE *__stream);
extern int putchar_unlocked(int __c);
extern int getw(FILE *__stream);
extern int putw(int __w, FILE *__stream);
extern char * fgets(char *__s, int __n, FILE *__stream);
extern char * gets(char *__s);
extern __ssize_t getdelim(char **__lineptr, size_t *__n, int __delimiter, FILE *__stream);
extern __ssize_t getline(char **__lineptr, size_t *__n, FILE *__stream);
extern int fputs(char *__s, FILE *__stream);
extern int puts(char *__s);
extern int ungetc(int __c, FILE *__stream);
extern size_t fread(void *__ptr, size_t __size, size_t __n, FILE *__stream);
extern size_t fwrite(void *__ptr, size_t __size, size_t __n, FILE *__s);
extern size_t fread_unlocked(void *__ptr, size_t __size, size_t __n, FILE *__stream);
extern size_t fwrite_unlocked(void *__ptr, size_t __size, size_t __n, FILE *__stream);
extern int fseek(FILE *__stream, long int __off, int __whence);
extern long int ftell(FILE *__stream);
extern void rewind(FILE *__stream);
extern int fseeko(FILE *__stream, __off_t __off, int __whence);
extern __off_t ftello(FILE *__stream);
extern int fgetpos(FILE *__stream, fpos_t *__pos);
extern int fsetpos(FILE *__stream, fpos_t *__pos);
extern void clearerr(FILE *__stream);
extern int feof(FILE *__stream);
extern int ferror(FILE *__stream);
extern void clearerr_unlocked(FILE *__stream);
extern int feof_unlocked(FILE *__stream);
extern int ferror_unlocked(FILE *__stream);
extern void perror(char *__s);
extern int sys_nerr;
extern int fileno(FILE *__stream);
extern int fileno_unlocked(FILE *__stream);
extern FILE * popen(char *__command, char *__modes);
extern int pclose(FILE *__stream);
extern char * ctermid(char *__s);
extern void flockfile(FILE *__stream);
extern int ftrylockfile(FILE *__stream);
extern void funlockfile(FILE *__stream);
void jit_dump_type(FILE *stream, jit_type_t type);
void jit_dump_value(FILE *stream, jit_function_t func, jit_value_t value, char *prefix);
void jit_dump_insn(FILE *stream, jit_function_t func, jit_insn_t insn);
void jit_dump_function(FILE *stream, jit_function_t func, char *name);
';
    private FFI $ffi;
    const JIT_NATIVE_INT64 = 1;
    const JIT_MEMORY_OK = 0;
    const JIT_MEMORY_RESTART = 1;
    const JIT_MEMORY_TOO_BIG = 2;
    const JIT_MEMORY_ERROR = 3;
    const JIT_OPTION_CACHE_LIMIT = 10000;
    const JIT_OPTION_CACHE_PAGE_SIZE = 10001;
    const JIT_OPTION_PRE_COMPILE = 10002;
    const JIT_OPTION_DONT_FOLD = 10003;
    const JIT_OPTION_POSITION_INDEPENDENT = 10004;
    const JIT_OPTION_CACHE_MAX_PAGE_FACTOR = 10005;
    const JIT_TYPE_VOID = 0;
    const JIT_TYPE_SBYTE = 1;
    const JIT_TYPE_UBYTE = 2;
    const JIT_TYPE_SHORT = 3;
    const JIT_TYPE_USHORT = 4;
    const JIT_TYPE_INT = 5;
    const JIT_TYPE_UINT = 6;
    const JIT_TYPE_NINT = 7;
    const JIT_TYPE_NUINT = 8;
    const JIT_TYPE_LONG = 9;
    const JIT_TYPE_ULONG = 10;
    const JIT_TYPE_FLOAT32 = 11;
    const JIT_TYPE_FLOAT64 = 12;
    const JIT_TYPE_NFLOAT = 13;
    const JIT_TYPE_STRUCT = 14;
    const JIT_TYPE_UNION = 15;
    const JIT_TYPE_SIGNATURE = 16;
    const JIT_TYPE_PTR = 17;
    const JIT_TYPE_FIRST_TAGGED = 32;
    const JIT_TYPETAG_NAME = 10000;
    const JIT_TYPETAG_STRUCT_NAME = 10001;
    const JIT_TYPETAG_UNION_NAME = 10002;
    const JIT_TYPETAG_ENUM_NAME = 10003;
    const JIT_TYPETAG_CONST = 10004;
    const JIT_TYPETAG_VOLATILE = 10005;
    const JIT_TYPETAG_REFERENCE = 10006;
    const JIT_TYPETAG_OUTPUT = 10007;
    const JIT_TYPETAG_RESTRICT = 10008;
    const JIT_TYPETAG_SYS_BOOL = 10009;
    const JIT_TYPETAG_SYS_CHAR = 10010;
    const JIT_TYPETAG_SYS_SCHAR = 10011;
    const JIT_TYPETAG_SYS_UCHAR = 10012;
    const JIT_TYPETAG_SYS_SHORT = 10013;
    const JIT_TYPETAG_SYS_USHORT = 10014;
    const JIT_TYPETAG_SYS_INT = 10015;
    const JIT_TYPETAG_SYS_UINT = 10016;
    const JIT_TYPETAG_SYS_LONG = 10017;
    const JIT_TYPETAG_SYS_ULONG = 10018;
    const JIT_TYPETAG_SYS_LONGLONG = 10019;
    const JIT_TYPETAG_SYS_ULONGLONG = 10020;
    const JIT_TYPETAG_SYS_FLOAT = 10021;
    const JIT_TYPETAG_SYS_DOUBLE = 10022;
    const JIT_TYPETAG_SYS_LONGDOUBLE = 10023;
    const JIT_DEBUGGER_TYPE_QUIT = 0;
    const JIT_DEBUGGER_TYPE_HARD_BREAKPOINT = 1;
    const JIT_DEBUGGER_TYPE_SOFT_BREAKPOINT = 2;
    const JIT_DEBUGGER_TYPE_USER_BREAKPOINT = 3;
    const JIT_DEBUGGER_TYPE_ATTACH_THREAD = 4;
    const JIT_DEBUGGER_TYPE_DETACH_THREAD = 5;
    const JIT_DEBUGGER_DATA1_FIRST = 10000;
    const JIT_DEBUGGER_DATA1_LINE = 10000;
    const JIT_DEBUGGER_DATA1_ENTER = 10001;
    const JIT_DEBUGGER_DATA1_LEAVE = 10002;
    const JIT_DEBUGGER_DATA1_THROW = 10003;
    const JIT_READELF_OK = 0;
    const JIT_READELF_CANNOT_OPEN = 1;
    const JIT_READELF_NOT_ELF = 2;
    const JIT_READELF_WRONG_ARCH = 3;
    const JIT_READELF_BAD_FORMAT = 4;
    const JIT_READELF_MEMORY = 5;
    const JIT_OPTLEVEL_NONE = 0;
    const JIT_OPTLEVEL_NORMAL = 1;
    const JITOM_MODIFIER_ACCESS_MASK = 0x0007;
    const JITOM_MODIFIER_PUBLIC = 0x0000;
    const JITOM_MODIFIER_PRIVATE = 0x0001;
    const JITOM_MODIFIER_PROTECTED = 0x0002;
    const JITOM_MODIFIER_PACKAGE = 0x0003;
    const JITOM_MODIFIER_PACKAGE_OR_PROTECTED = 0x0004;
    const JITOM_MODIFIER_PACKAGE_AND_PROTECTED = 0x0005;
    const JITOM_MODIFIER_OTHER1 = 0x0006;
    const JITOM_MODIFIER_OTHER2 = 0x0007;
    const JITOM_MODIFIER_STATIC = 0x0008;
    const JITOM_MODIFIER_VIRTUAL = 0x0010;
    const JITOM_MODIFIER_NEW_SLOT = 0x0020;
    const JITOM_MODIFIER_ABSTRACT = 0x0040;
    const JITOM_MODIFIER_LITERAL = 0x0080;
    const JITOM_MODIFIER_CTOR = 0x0100;
    const JITOM_MODIFIER_STATIC_CTOR = 0x0200;
    const JITOM_MODIFIER_DTOR = 0x0400;
    const JITOM_MODIFIER_INTERFACE = 0x0800;
    const JITOM_MODIFIER_VALUE = 0x1000;
    const JITOM_MODIFIER_FINAL = 0x2000;
    const JITOM_MODIFIER_DELETE = 0x4000;
    const JITOM_MODIFIER_REFERENCE_COUNTED = 0x8000;
    const JITOM_TYPETAG_CLASS = 11000;
    const JITOM_TYPETAG_VALUE = 11001;
    const JIT_OP_NOP = 0x0000;
    const JIT_OP_TRUNC_SBYTE = 0x0001;
    const JIT_OP_TRUNC_UBYTE = 0x0002;
    const JIT_OP_TRUNC_SHORT = 0x0003;
    const JIT_OP_TRUNC_USHORT = 0x0004;
    const JIT_OP_TRUNC_INT = 0x0005;
    const JIT_OP_TRUNC_UINT = 0x0006;
    const JIT_OP_CHECK_SBYTE = 0x0007;
    const JIT_OP_CHECK_UBYTE = 0x0008;
    const JIT_OP_CHECK_SHORT = 0x0009;
    const JIT_OP_CHECK_USHORT = 0x000A;
    const JIT_OP_CHECK_INT = 0x000B;
    const JIT_OP_CHECK_UINT = 0x000C;
    const JIT_OP_LOW_WORD = 0x000D;
    const JIT_OP_EXPAND_INT = 0x000E;
    const JIT_OP_EXPAND_UINT = 0x000F;
    const JIT_OP_CHECK_LOW_WORD = 0x0010;
    const JIT_OP_CHECK_SIGNED_LOW_WORD = 0x0011;
    const JIT_OP_CHECK_LONG = 0x0012;
    const JIT_OP_CHECK_ULONG = 0x0013;
    const JIT_OP_FLOAT32_TO_INT = 0x0014;
    const JIT_OP_FLOAT32_TO_UINT = 0x0015;
    const JIT_OP_FLOAT32_TO_LONG = 0x0016;
    const JIT_OP_FLOAT32_TO_ULONG = 0x0017;
    const JIT_OP_CHECK_FLOAT32_TO_INT = 0x0018;
    const JIT_OP_CHECK_FLOAT32_TO_UINT = 0x0019;
    const JIT_OP_CHECK_FLOAT32_TO_LONG = 0x001A;
    const JIT_OP_CHECK_FLOAT32_TO_ULONG = 0x001B;
    const JIT_OP_INT_TO_FLOAT32 = 0x001C;
    const JIT_OP_UINT_TO_FLOAT32 = 0x001D;
    const JIT_OP_LONG_TO_FLOAT32 = 0x001E;
    const JIT_OP_ULONG_TO_FLOAT32 = 0x001F;
    const JIT_OP_FLOAT32_TO_FLOAT64 = 0x0020;
    const JIT_OP_FLOAT64_TO_INT = 0x0021;
    const JIT_OP_FLOAT64_TO_UINT = 0x0022;
    const JIT_OP_FLOAT64_TO_LONG = 0x0023;
    const JIT_OP_FLOAT64_TO_ULONG = 0x0024;
    const JIT_OP_CHECK_FLOAT64_TO_INT = 0x0025;
    const JIT_OP_CHECK_FLOAT64_TO_UINT = 0x0026;
    const JIT_OP_CHECK_FLOAT64_TO_LONG = 0x0027;
    const JIT_OP_CHECK_FLOAT64_TO_ULONG = 0x0028;
    const JIT_OP_INT_TO_FLOAT64 = 0x0029;
    const JIT_OP_UINT_TO_FLOAT64 = 0x002A;
    const JIT_OP_LONG_TO_FLOAT64 = 0x002B;
    const JIT_OP_ULONG_TO_FLOAT64 = 0x002C;
    const JIT_OP_FLOAT64_TO_FLOAT32 = 0x002D;
    const JIT_OP_NFLOAT_TO_INT = 0x002E;
    const JIT_OP_NFLOAT_TO_UINT = 0x002F;
    const JIT_OP_NFLOAT_TO_LONG = 0x0030;
    const JIT_OP_NFLOAT_TO_ULONG = 0x0031;
    const JIT_OP_CHECK_NFLOAT_TO_INT = 0x0032;
    const JIT_OP_CHECK_NFLOAT_TO_UINT = 0x0033;
    const JIT_OP_CHECK_NFLOAT_TO_LONG = 0x0034;
    const JIT_OP_CHECK_NFLOAT_TO_ULONG = 0x0035;
    const JIT_OP_INT_TO_NFLOAT = 0x0036;
    const JIT_OP_UINT_TO_NFLOAT = 0x0037;
    const JIT_OP_LONG_TO_NFLOAT = 0x0038;
    const JIT_OP_ULONG_TO_NFLOAT = 0x0039;
    const JIT_OP_NFLOAT_TO_FLOAT32 = 0x003A;
    const JIT_OP_NFLOAT_TO_FLOAT64 = 0x003B;
    const JIT_OP_FLOAT32_TO_NFLOAT = 0x003C;
    const JIT_OP_FLOAT64_TO_NFLOAT = 0x003D;
    const JIT_OP_IADD = 0x003E;
    const JIT_OP_IADD_OVF = 0x003F;
    const JIT_OP_IADD_OVF_UN = 0x0040;
    const JIT_OP_ISUB = 0x0041;
    const JIT_OP_ISUB_OVF = 0x0042;
    const JIT_OP_ISUB_OVF_UN = 0x0043;
    const JIT_OP_IMUL = 0x0044;
    const JIT_OP_IMUL_OVF = 0x0045;
    const JIT_OP_IMUL_OVF_UN = 0x0046;
    const JIT_OP_IDIV = 0x0047;
    const JIT_OP_IDIV_UN = 0x0048;
    const JIT_OP_IREM = 0x0049;
    const JIT_OP_IREM_UN = 0x004A;
    const JIT_OP_INEG = 0x004B;
    const JIT_OP_LADD = 0x004C;
    const JIT_OP_LADD_OVF = 0x004D;
    const JIT_OP_LADD_OVF_UN = 0x004E;
    const JIT_OP_LSUB = 0x004F;
    const JIT_OP_LSUB_OVF = 0x0050;
    const JIT_OP_LSUB_OVF_UN = 0x0051;
    const JIT_OP_LMUL = 0x0052;
    const JIT_OP_LMUL_OVF = 0x0053;
    const JIT_OP_LMUL_OVF_UN = 0x0054;
    const JIT_OP_LDIV = 0x0055;
    const JIT_OP_LDIV_UN = 0x0056;
    const JIT_OP_LREM = 0x0057;
    const JIT_OP_LREM_UN = 0x0058;
    const JIT_OP_LNEG = 0x0059;
    const JIT_OP_FADD = 0x005A;
    const JIT_OP_FSUB = 0x005B;
    const JIT_OP_FMUL = 0x005C;
    const JIT_OP_FDIV = 0x005D;
    const JIT_OP_FREM = 0x005E;
    const JIT_OP_FREM_IEEE = 0x005F;
    const JIT_OP_FNEG = 0x0060;
    const JIT_OP_DADD = 0x0061;
    const JIT_OP_DSUB = 0x0062;
    const JIT_OP_DMUL = 0x0063;
    const JIT_OP_DDIV = 0x0064;
    const JIT_OP_DREM = 0x0065;
    const JIT_OP_DREM_IEEE = 0x0066;
    const JIT_OP_DNEG = 0x0067;
    const JIT_OP_NFADD = 0x0068;
    const JIT_OP_NFSUB = 0x0069;
    const JIT_OP_NFMUL = 0x006A;
    const JIT_OP_NFDIV = 0x006B;
    const JIT_OP_NFREM = 0x006C;
    const JIT_OP_NFREM_IEEE = 0x006D;
    const JIT_OP_NFNEG = 0x006E;
    const JIT_OP_IAND = 0x006F;
    const JIT_OP_IOR = 0x0070;
    const JIT_OP_IXOR = 0x0071;
    const JIT_OP_INOT = 0x0072;
    const JIT_OP_ISHL = 0x0073;
    const JIT_OP_ISHR = 0x0074;
    const JIT_OP_ISHR_UN = 0x0075;
    const JIT_OP_LAND = 0x0076;
    const JIT_OP_LOR = 0x0077;
    const JIT_OP_LXOR = 0x0078;
    const JIT_OP_LNOT = 0x0079;
    const JIT_OP_LSHL = 0x007A;
    const JIT_OP_LSHR = 0x007B;
    const JIT_OP_LSHR_UN = 0x007C;
    const JIT_OP_BR = 0x007D;
    const JIT_OP_BR_IFALSE = 0x007E;
    const JIT_OP_BR_ITRUE = 0x007F;
    const JIT_OP_BR_IEQ = 0x0080;
    const JIT_OP_BR_INE = 0x0081;
    const JIT_OP_BR_ILT = 0x0082;
    const JIT_OP_BR_ILT_UN = 0x0083;
    const JIT_OP_BR_ILE = 0x0084;
    const JIT_OP_BR_ILE_UN = 0x0085;
    const JIT_OP_BR_IGT = 0x0086;
    const JIT_OP_BR_IGT_UN = 0x0087;
    const JIT_OP_BR_IGE = 0x0088;
    const JIT_OP_BR_IGE_UN = 0x0089;
    const JIT_OP_BR_LFALSE = 0x008A;
    const JIT_OP_BR_LTRUE = 0x008B;
    const JIT_OP_BR_LEQ = 0x008C;
    const JIT_OP_BR_LNE = 0x008D;
    const JIT_OP_BR_LLT = 0x008E;
    const JIT_OP_BR_LLT_UN = 0x008F;
    const JIT_OP_BR_LLE = 0x0090;
    const JIT_OP_BR_LLE_UN = 0x0091;
    const JIT_OP_BR_LGT = 0x0092;
    const JIT_OP_BR_LGT_UN = 0x0093;
    const JIT_OP_BR_LGE = 0x0094;
    const JIT_OP_BR_LGE_UN = 0x0095;
    const JIT_OP_BR_FEQ = 0x0096;
    const JIT_OP_BR_FNE = 0x0097;
    const JIT_OP_BR_FLT = 0x0098;
    const JIT_OP_BR_FLE = 0x0099;
    const JIT_OP_BR_FGT = 0x009A;
    const JIT_OP_BR_FGE = 0x009B;
    const JIT_OP_BR_FLT_INV = 0x009C;
    const JIT_OP_BR_FLE_INV = 0x009D;
    const JIT_OP_BR_FGT_INV = 0x009E;
    const JIT_OP_BR_FGE_INV = 0x009F;
    const JIT_OP_BR_DEQ = 0x00A0;
    const JIT_OP_BR_DNE = 0x00A1;
    const JIT_OP_BR_DLT = 0x00A2;
    const JIT_OP_BR_DLE = 0x00A3;
    const JIT_OP_BR_DGT = 0x00A4;
    const JIT_OP_BR_DGE = 0x00A5;
    const JIT_OP_BR_DLT_INV = 0x00A6;
    const JIT_OP_BR_DLE_INV = 0x00A7;
    const JIT_OP_BR_DGT_INV = 0x00A8;
    const JIT_OP_BR_DGE_INV = 0x00A9;
    const JIT_OP_BR_NFEQ = 0x00AA;
    const JIT_OP_BR_NFNE = 0x00AB;
    const JIT_OP_BR_NFLT = 0x00AC;
    const JIT_OP_BR_NFLE = 0x00AD;
    const JIT_OP_BR_NFGT = 0x00AE;
    const JIT_OP_BR_NFGE = 0x00AF;
    const JIT_OP_BR_NFLT_INV = 0x00B0;
    const JIT_OP_BR_NFLE_INV = 0x00B1;
    const JIT_OP_BR_NFGT_INV = 0x00B2;
    const JIT_OP_BR_NFGE_INV = 0x00B3;
    const JIT_OP_ICMP = 0x00B4;
    const JIT_OP_ICMP_UN = 0x00B5;
    const JIT_OP_LCMP = 0x00B6;
    const JIT_OP_LCMP_UN = 0x00B7;
    const JIT_OP_FCMPL = 0x00B8;
    const JIT_OP_FCMPG = 0x00B9;
    const JIT_OP_DCMPL = 0x00BA;
    const JIT_OP_DCMPG = 0x00BB;
    const JIT_OP_NFCMPL = 0x00BC;
    const JIT_OP_NFCMPG = 0x00BD;
    const JIT_OP_IEQ = 0x00BE;
    const JIT_OP_INE = 0x00BF;
    const JIT_OP_ILT = 0x00C0;
    const JIT_OP_ILT_UN = 0x00C1;
    const JIT_OP_ILE = 0x00C2;
    const JIT_OP_ILE_UN = 0x00C3;
    const JIT_OP_IGT = 0x00C4;
    const JIT_OP_IGT_UN = 0x00C5;
    const JIT_OP_IGE = 0x00C6;
    const JIT_OP_IGE_UN = 0x00C7;
    const JIT_OP_LEQ = 0x00C8;
    const JIT_OP_LNE = 0x00C9;
    const JIT_OP_LLT = 0x00CA;
    const JIT_OP_LLT_UN = 0x00CB;
    const JIT_OP_LLE = 0x00CC;
    const JIT_OP_LLE_UN = 0x00CD;
    const JIT_OP_LGT = 0x00CE;
    const JIT_OP_LGT_UN = 0x00CF;
    const JIT_OP_LGE = 0x00D0;
    const JIT_OP_LGE_UN = 0x00D1;
    const JIT_OP_FEQ = 0x00D2;
    const JIT_OP_FNE = 0x00D3;
    const JIT_OP_FLT = 0x00D4;
    const JIT_OP_FLE = 0x00D5;
    const JIT_OP_FGT = 0x00D6;
    const JIT_OP_FGE = 0x00D7;
    const JIT_OP_FLT_INV = 0x00D8;
    const JIT_OP_FLE_INV = 0x00D9;
    const JIT_OP_FGT_INV = 0x00DA;
    const JIT_OP_FGE_INV = 0x00DB;
    const JIT_OP_DEQ = 0x00DC;
    const JIT_OP_DNE = 0x00DD;
    const JIT_OP_DLT = 0x00DE;
    const JIT_OP_DLE = 0x00DF;
    const JIT_OP_DGT = 0x00E0;
    const JIT_OP_DGE = 0x00E1;
    const JIT_OP_DLT_INV = 0x00E2;
    const JIT_OP_DLE_INV = 0x00E3;
    const JIT_OP_DGT_INV = 0x00E4;
    const JIT_OP_DGE_INV = 0x00E5;
    const JIT_OP_NFEQ = 0x00E6;
    const JIT_OP_NFNE = 0x00E7;
    const JIT_OP_NFLT = 0x00E8;
    const JIT_OP_NFLE = 0x00E9;
    const JIT_OP_NFGT = 0x00EA;
    const JIT_OP_NFGE = 0x00EB;
    const JIT_OP_NFLT_INV = 0x00EC;
    const JIT_OP_NFLE_INV = 0x00ED;
    const JIT_OP_NFGT_INV = 0x00EE;
    const JIT_OP_NFGE_INV = 0x00EF;
    const JIT_OP_IS_FNAN = 0x00F0;
    const JIT_OP_IS_FINF = 0x00F1;
    const JIT_OP_IS_FFINITE = 0x00F2;
    const JIT_OP_IS_DNAN = 0x00F3;
    const JIT_OP_IS_DINF = 0x00F4;
    const JIT_OP_IS_DFINITE = 0x00F5;
    const JIT_OP_IS_NFNAN = 0x00F6;
    const JIT_OP_IS_NFINF = 0x00F7;
    const JIT_OP_IS_NFFINITE = 0x00F8;
    const JIT_OP_FACOS = 0x00F9;
    const JIT_OP_FASIN = 0x00FA;
    const JIT_OP_FATAN = 0x00FB;
    const JIT_OP_FATAN2 = 0x00FC;
    const JIT_OP_FCEIL = 0x00FD;
    const JIT_OP_FCOS = 0x00FE;
    const JIT_OP_FCOSH = 0x00FF;
    const JIT_OP_FEXP = 0x0100;
    const JIT_OP_FFLOOR = 0x0101;
    const JIT_OP_FLOG = 0x0102;
    const JIT_OP_FLOG10 = 0x0103;
    const JIT_OP_FPOW = 0x0104;
    const JIT_OP_FRINT = 0x0105;
    const JIT_OP_FROUND = 0x0106;
    const JIT_OP_FSIN = 0x0107;
    const JIT_OP_FSINH = 0x0108;
    const JIT_OP_FSQRT = 0x0109;
    const JIT_OP_FTAN = 0x010A;
    const JIT_OP_FTANH = 0x010B;
    const JIT_OP_FTRUNC = 0x010C;
    const JIT_OP_DACOS = 0x010D;
    const JIT_OP_DASIN = 0x010E;
    const JIT_OP_DATAN = 0x010F;
    const JIT_OP_DATAN2 = 0x0110;
    const JIT_OP_DCEIL = 0x0111;
    const JIT_OP_DCOS = 0x0112;
    const JIT_OP_DCOSH = 0x0113;
    const JIT_OP_DEXP = 0x0114;
    const JIT_OP_DFLOOR = 0x0115;
    const JIT_OP_DLOG = 0x0116;
    const JIT_OP_DLOG10 = 0x0117;
    const JIT_OP_DPOW = 0x0118;
    const JIT_OP_DRINT = 0x0119;
    const JIT_OP_DROUND = 0x011A;
    const JIT_OP_DSIN = 0x011B;
    const JIT_OP_DSINH = 0x011C;
    const JIT_OP_DSQRT = 0x011D;
    const JIT_OP_DTAN = 0x011E;
    const JIT_OP_DTANH = 0x011F;
    const JIT_OP_DTRUNC = 0x0120;
    const JIT_OP_NFACOS = 0x0121;
    const JIT_OP_NFASIN = 0x0122;
    const JIT_OP_NFATAN = 0x0123;
    const JIT_OP_NFATAN2 = 0x0124;
    const JIT_OP_NFCEIL = 0x0125;
    const JIT_OP_NFCOS = 0x0126;
    const JIT_OP_NFCOSH = 0x0127;
    const JIT_OP_NFEXP = 0x0128;
    const JIT_OP_NFFLOOR = 0x0129;
    const JIT_OP_NFLOG = 0x012A;
    const JIT_OP_NFLOG10 = 0x012B;
    const JIT_OP_NFPOW = 0x012C;
    const JIT_OP_NFRINT = 0x012D;
    const JIT_OP_NFROUND = 0x012E;
    const JIT_OP_NFSIN = 0x012F;
    const JIT_OP_NFSINH = 0x0130;
    const JIT_OP_NFSQRT = 0x0131;
    const JIT_OP_NFTAN = 0x0132;
    const JIT_OP_NFTANH = 0x0133;
    const JIT_OP_NFTRUNC = 0x0134;
    const JIT_OP_IABS = 0x0135;
    const JIT_OP_LABS = 0x0136;
    const JIT_OP_FABS = 0x0137;
    const JIT_OP_DABS = 0x0138;
    const JIT_OP_NFABS = 0x0139;
    const JIT_OP_IMIN = 0x013A;
    const JIT_OP_IMIN_UN = 0x013B;
    const JIT_OP_LMIN = 0x013C;
    const JIT_OP_LMIN_UN = 0x013D;
    const JIT_OP_FMIN = 0x013E;
    const JIT_OP_DMIN = 0x013F;
    const JIT_OP_NFMIN = 0x0140;
    const JIT_OP_IMAX = 0x0141;
    const JIT_OP_IMAX_UN = 0x0142;
    const JIT_OP_LMAX = 0x0143;
    const JIT_OP_LMAX_UN = 0x0144;
    const JIT_OP_FMAX = 0x0145;
    const JIT_OP_DMAX = 0x0146;
    const JIT_OP_NFMAX = 0x0147;
    const JIT_OP_ISIGN = 0x0148;
    const JIT_OP_LSIGN = 0x0149;
    const JIT_OP_FSIGN = 0x014A;
    const JIT_OP_DSIGN = 0x014B;
    const JIT_OP_NFSIGN = 0x014C;
    const JIT_OP_CHECK_NULL = 0x014D;
    const JIT_OP_CALL = 0x014E;
    const JIT_OP_CALL_TAIL = 0x014F;
    const JIT_OP_CALL_INDIRECT = 0x0150;
    const JIT_OP_CALL_INDIRECT_TAIL = 0x0151;
    const JIT_OP_CALL_VTABLE_PTR = 0x0152;
    const JIT_OP_CALL_VTABLE_PTR_TAIL = 0x0153;
    const JIT_OP_CALL_EXTERNAL = 0x0154;
    const JIT_OP_CALL_EXTERNAL_TAIL = 0x0155;
    const JIT_OP_RETURN = 0x0156;
    const JIT_OP_RETURN_INT = 0x0157;
    const JIT_OP_RETURN_LONG = 0x0158;
    const JIT_OP_RETURN_FLOAT32 = 0x0159;
    const JIT_OP_RETURN_FLOAT64 = 0x015A;
    const JIT_OP_RETURN_NFLOAT = 0x015B;
    const JIT_OP_RETURN_SMALL_STRUCT = 0x015C;
    const JIT_OP_SETUP_FOR_NESTED = 0x015D;
    const JIT_OP_SETUP_FOR_SIBLING = 0x015E;
    const JIT_OP_IMPORT = 0x015F;
    const JIT_OP_THROW = 0x0160;
    const JIT_OP_RETHROW = 0x0161;
    const JIT_OP_LOAD_PC = 0x0162;
    const JIT_OP_LOAD_EXCEPTION_PC = 0x0163;
    const JIT_OP_ENTER_FINALLY = 0x0164;
    const JIT_OP_LEAVE_FINALLY = 0x0165;
    const JIT_OP_CALL_FINALLY = 0x0166;
    const JIT_OP_ENTER_FILTER = 0x0167;
    const JIT_OP_LEAVE_FILTER = 0x0168;
    const JIT_OP_CALL_FILTER = 0x0169;
    const JIT_OP_CALL_FILTER_RETURN = 0x016A;
    const JIT_OP_ADDRESS_OF_LABEL = 0x016B;
    const JIT_OP_COPY_LOAD_SBYTE = 0x016C;
    const JIT_OP_COPY_LOAD_UBYTE = 0x016D;
    const JIT_OP_COPY_LOAD_SHORT = 0x016E;
    const JIT_OP_COPY_LOAD_USHORT = 0x016F;
    const JIT_OP_COPY_INT = 0x0170;
    const JIT_OP_COPY_LONG = 0x0171;
    const JIT_OP_COPY_FLOAT32 = 0x0172;
    const JIT_OP_COPY_FLOAT64 = 0x0173;
    const JIT_OP_COPY_NFLOAT = 0x0174;
    const JIT_OP_COPY_STRUCT = 0x0175;
    const JIT_OP_COPY_STORE_BYTE = 0x0176;
    const JIT_OP_COPY_STORE_SHORT = 0x0177;
    const JIT_OP_ADDRESS_OF = 0x0178;
    const JIT_OP_INCOMING_REG = 0x0179;
    const JIT_OP_INCOMING_FRAME_POSN = 0x017A;
    const JIT_OP_OUTGOING_REG = 0x017B;
    const JIT_OP_OUTGOING_FRAME_POSN = 0x017C;
    const JIT_OP_RETURN_REG = 0x017D;
    const JIT_OP_PUSH_INT = 0x017E;
    const JIT_OP_PUSH_LONG = 0x017F;
    const JIT_OP_PUSH_FLOAT32 = 0x0180;
    const JIT_OP_PUSH_FLOAT64 = 0x0181;
    const JIT_OP_PUSH_NFLOAT = 0x0182;
    const JIT_OP_PUSH_STRUCT = 0x0183;
    const JIT_OP_POP_STACK = 0x0184;
    const JIT_OP_FLUSH_SMALL_STRUCT = 0x0185;
    const JIT_OP_SET_PARAM_INT = 0x0186;
    const JIT_OP_SET_PARAM_LONG = 0x0187;
    const JIT_OP_SET_PARAM_FLOAT32 = 0x0188;
    const JIT_OP_SET_PARAM_FLOAT64 = 0x0189;
    const JIT_OP_SET_PARAM_NFLOAT = 0x018A;
    const JIT_OP_SET_PARAM_STRUCT = 0x018B;
    const JIT_OP_PUSH_RETURN_AREA_PTR = 0x018C;
    const JIT_OP_LOAD_RELATIVE_SBYTE = 0x018D;
    const JIT_OP_LOAD_RELATIVE_UBYTE = 0x018E;
    const JIT_OP_LOAD_RELATIVE_SHORT = 0x018F;
    const JIT_OP_LOAD_RELATIVE_USHORT = 0x0190;
    const JIT_OP_LOAD_RELATIVE_INT = 0x0191;
    const JIT_OP_LOAD_RELATIVE_LONG = 0x0192;
    const JIT_OP_LOAD_RELATIVE_FLOAT32 = 0x0193;
    const JIT_OP_LOAD_RELATIVE_FLOAT64 = 0x0194;
    const JIT_OP_LOAD_RELATIVE_NFLOAT = 0x0195;
    const JIT_OP_LOAD_RELATIVE_STRUCT = 0x0196;
    const JIT_OP_STORE_RELATIVE_BYTE = 0x0197;
    const JIT_OP_STORE_RELATIVE_SHORT = 0x0198;
    const JIT_OP_STORE_RELATIVE_INT = 0x0199;
    const JIT_OP_STORE_RELATIVE_LONG = 0x019A;
    const JIT_OP_STORE_RELATIVE_FLOAT32 = 0x019B;
    const JIT_OP_STORE_RELATIVE_FLOAT64 = 0x019C;
    const JIT_OP_STORE_RELATIVE_NFLOAT = 0x019D;
    const JIT_OP_STORE_RELATIVE_STRUCT = 0x019E;
    const JIT_OP_ADD_RELATIVE = 0x019F;
    const JIT_OP_LOAD_ELEMENT_SBYTE = 0x01A0;
    const JIT_OP_LOAD_ELEMENT_UBYTE = 0x01A1;
    const JIT_OP_LOAD_ELEMENT_SHORT = 0x01A2;
    const JIT_OP_LOAD_ELEMENT_USHORT = 0x01A3;
    const JIT_OP_LOAD_ELEMENT_INT = 0x01A4;
    const JIT_OP_LOAD_ELEMENT_LONG = 0x01A5;
    const JIT_OP_LOAD_ELEMENT_FLOAT32 = 0x01A6;
    const JIT_OP_LOAD_ELEMENT_FLOAT64 = 0x01A7;
    const JIT_OP_LOAD_ELEMENT_NFLOAT = 0x01A8;
    const JIT_OP_STORE_ELEMENT_BYTE = 0x01A9;
    const JIT_OP_STORE_ELEMENT_SHORT = 0x01AA;
    const JIT_OP_STORE_ELEMENT_INT = 0x01AB;
    const JIT_OP_STORE_ELEMENT_LONG = 0x01AC;
    const JIT_OP_STORE_ELEMENT_FLOAT32 = 0x01AD;
    const JIT_OP_STORE_ELEMENT_FLOAT64 = 0x01AE;
    const JIT_OP_STORE_ELEMENT_NFLOAT = 0x01AF;
    const JIT_OP_MEMCPY = 0x01B0;
    const JIT_OP_MEMMOVE = 0x01B1;
    const JIT_OP_MEMSET = 0x01B2;
    const JIT_OP_ALLOCA = 0x01B3;
    const JIT_OP_MARK_OFFSET = 0x01B4;
    const JIT_OP_MARK_BREAKPOINT = 0x01B5;
    const JIT_OP_JUMP_TABLE = 0x01B6;
    const JIT_OP_NUM_OPCODES = 0x01B7;
    const JIT_OPCODE_DEST_MASK = 0x0000000F;
    const JIT_OPCODE_DEST_EMPTY = 0x00000000;
    const JIT_OPCODE_DEST_INT = 0x00000001;
    const JIT_OPCODE_DEST_LONG = 0x00000002;
    const JIT_OPCODE_DEST_FLOAT32 = 0x00000003;
    const JIT_OPCODE_DEST_FLOAT64 = 0x00000004;
    const JIT_OPCODE_DEST_NFLOAT = 0x00000005;
    const JIT_OPCODE_DEST_ANY = 0x00000006;
    const JIT_OPCODE_SRC1_MASK = 0x000000F0;
    const JIT_OPCODE_SRC1_EMPTY = 0x00000000;
    const JIT_OPCODE_SRC1_INT = 0x00000010;
    const JIT_OPCODE_SRC1_LONG = 0x00000020;
    const JIT_OPCODE_SRC1_FLOAT32 = 0x00000030;
    const JIT_OPCODE_SRC1_FLOAT64 = 0x00000040;
    const JIT_OPCODE_SRC1_NFLOAT = 0x00000050;
    const JIT_OPCODE_SRC1_ANY = 0x00000060;
    const JIT_OPCODE_SRC2_MASK = 0x00000F00;
    const JIT_OPCODE_SRC2_EMPTY = 0x00000000;
    const JIT_OPCODE_SRC2_INT = 0x00000100;
    const JIT_OPCODE_SRC2_LONG = 0x00000200;
    const JIT_OPCODE_SRC2_FLOAT32 = 0x00000300;
    const JIT_OPCODE_SRC2_FLOAT64 = 0x00000400;
    const JIT_OPCODE_SRC2_NFLOAT = 0x00000500;
    const JIT_OPCODE_SRC2_ANY = 0x00000600;
    const JIT_OPCODE_IS_BRANCH = 0x00001000;
    const JIT_OPCODE_IS_CALL = 0x00002000;
    const JIT_OPCODE_IS_CALL_EXTERNAL = 0x00004000;
    const JIT_OPCODE_IS_REG = 0x00008000;
    const JIT_OPCODE_IS_ADDROF_LABEL = 0x00010000;
    const JIT_OPCODE_IS_JUMP_TABLE = 0x00020000;
    const JIT_OPCODE_OPER_MASK = 0x01F00000;
    const JIT_OPCODE_OPER_NONE = 0x00000000;
    const JIT_OPCODE_OPER_ADD = 0x00100000;
    const JIT_OPCODE_OPER_SUB = 0x00200000;
    const JIT_OPCODE_OPER_MUL = 0x00300000;
    const JIT_OPCODE_OPER_DIV = 0x00400000;
    const JIT_OPCODE_OPER_REM = 0x00500000;
    const JIT_OPCODE_OPER_NEG = 0x00600000;
    const JIT_OPCODE_OPER_AND = 0x00700000;
    const JIT_OPCODE_OPER_OR = 0x00800000;
    const JIT_OPCODE_OPER_XOR = 0x00900000;
    const JIT_OPCODE_OPER_NOT = 0x00A00000;
    const JIT_OPCODE_OPER_EQ = 0x00B00000;
    const JIT_OPCODE_OPER_NE = 0x00C00000;
    const JIT_OPCODE_OPER_LT = 0x00D00000;
    const JIT_OPCODE_OPER_LE = 0x00E00000;
    const JIT_OPCODE_OPER_GT = 0x00F00000;
    const JIT_OPCODE_OPER_GE = 0x01000000;
    const JIT_OPCODE_OPER_SHL = 0x01100000;
    const JIT_OPCODE_OPER_SHR = 0x01200000;
    const JIT_OPCODE_OPER_SHR_UN = 0x01300000;
    const JIT_OPCODE_OPER_COPY = 0x01400000;
    const JIT_OPCODE_OPER_ADDRESS_OF = 0x01500000;
    const JIT_FAST_GET_CURRENT_FRAME = 1;
    const _STDIO_H = 1;
    const _FEATURES_H = 1;
    const _DEFAULT_SOURCE = 1;
    const __USE_POSIX_IMPLICITLY = 1;
    const _POSIX_SOURCE = 1;
    const _POSIX_C_SOURCE = 200809;
    const __USE_POSIX = 1;
    const __USE_POSIX2 = 1;
    const __USE_POSIX199309 = 1;
    const __USE_POSIX199506 = 1;
    const __USE_XOPEN2K = 1;
    const __USE_ISOC95 = 1;
    const __USE_ISOC99 = 1;
    const __USE_XOPEN2K8 = 1;
    const _ATFILE_SOURCE = 1;
    const __USE_MISC = 1;
    const __USE_ATFILE = 1;
    const __USE_FORTIFY_LEVEL = 0;
    const _STDC_PREDEF_H = 1;
    const __STDC_IEC_559__ = 1;
    const __STDC_IEC_559_COMPLEX__ = 1;
    const __STDC_ISO_10646__ = 201605;
    const __STDC_NO_THREADS__ = 1;
    const __GNU_LIBRARY__ = 6;
    const __GLIBC__ = 2;
    const __GLIBC_MINOR__ = 24;
    const _SYS_CDEFS_H = 1;
    const __WORDSIZE = 64;
    const __WORDSIZE_TIME64_COMPAT32 = 1;
    const __SYSCALL_WORDSIZE = 64;
    const _BITS_TYPES_H = 1;
    const _BITS_TYPESIZES_H = 1;
    const __OFF_T_MATCHES_OFF64_T = 1;
    const __INO_T_MATCHES_INO64_T = 1;
    const __FD_SETSIZE = 1024;
    const __FILE_defined = 1;
    const ____FILE_defined = 1;
    const _G_config_h = 1;
    const ____mbstate_t_defined = 1;
    const _G_HAVE_MMAP = 1;
    const _G_HAVE_MREMAP = 1;
    const _G_IO_IO_FILE_VERSION = 0x20001;
    const _G_BUFSIZ = 8192;
    const _IO_UNIFIED_JUMPTABLES = 1;
    const _IOS_INPUT = 1;
    const _IOS_OUTPUT = 2;
    const _IOS_ATEND = 4;
    const _IOS_APPEND = 8;
    const _IOS_TRUNC = 16;
    const _IOS_NOCREATE = 32;
    const _IOS_NOREPLACE = 64;
    const _IOS_BIN = 128;
    const _IO_MAGIC = 0xFBAD0000;
    const _OLD_STDIO_MAGIC = 0xFABC0000;
    const _IO_MAGIC_MASK = 0xFFFF0000;
    const _IO_USER_BUF = 1;
    const _IO_UNBUFFERED = 2;
    const _IO_NO_READS = 4;
    const _IO_NO_WRITES = 8;
    const _IO_EOF_SEEN = 0x10;
    const _IO_ERR_SEEN = 0x20;
    const _IO_DELETE_DONT_CLOSE = 0x40;
    const _IO_LINKED = 0x80;
    const _IO_IN_BACKUP = 0x100;
    const _IO_LINE_BUF = 0x200;
    const _IO_TIED_PUT_GET = 0x400;
    const _IO_CURRENTLY_PUTTING = 0x800;
    const _IO_IS_APPENDING = 0x1000;
    const _IO_IS_FILEBUF = 0x2000;
    const _IO_BAD_SEEN = 0x4000;
    const _IO_USER_LOCK = 0x8000;
    const _IO_FLAGS2_MMAP = 1;
    const _IO_FLAGS2_NOTCANCEL = 2;
    const _IO_FLAGS2_USER_WBUF = 8;
    const _IO_SKIPWS = 01;
    const _IO_LEFT = 02;
    const _IO_RIGHT = 04;
    const _IO_INTERNAL = 010;
    const _IO_DEC = 020;
    const _IO_OCT = 040;
    const _IO_HEX = 0100;
    const _IO_SHOWBASE = 0200;
    const _IO_SHOWPOINT = 0400;
    const _IO_UPPERCASE = 01000;
    const _IO_SHOWPOS = 02000;
    const _IO_SCIENTIFIC = 04000;
    const _IO_FIXED = 010000;
    const _IO_UNITBUF = 020000;
    const _IO_STDIO = 040000;
    const _IO_DONT_CLOSE = 0100000;
    const _IO_BOOLALPHA = 0200000;
    const _IOFBF = 0;
    const _IOLBF = 1;
    const _IONBF = 2;
    const SEEK_SET = 0;
    const SEEK_CUR = 1;
    const SEEK_END = 2;
    const L_tmpnam = 20;
    const TMP_MAX = 238328;
    const FILENAME_MAX = 4096;
    const L_ctermid = 9;
    const FOPEN_MAX = 16;
    public function __construct(string $pathToSoFile = self::SOFILE) {
        $this->ffi = FFI::cdef(self::HEADER_DEF, $pathToSoFile);
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
            case 'stdin': $tmp = $this->ffi->stdin; return $tmp === null ? null : new _IO_FILE_ptr($tmp);
            case 'stdout': $tmp = $this->ffi->stdout; return $tmp === null ? null : new _IO_FILE_ptr($tmp);
            case 'stderr': $tmp = $this->ffi->stderr; return $tmp === null ? null : new _IO_FILE_ptr($tmp);
            case 'sys_nerr': return $this->ffi->sys_nerr;
            default: return $this->ffi->$name;
        }
    }
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
 // typedefenum jit_abi_t
    const jit_abi_cdecl = (0) + 0;
    const jit_abi_vararg = (0) + 1;
    const jit_abi_stdcall = (0) + 2;
    const jit_abi_fastcall = (0) + 3;
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
    public function jit_type_get_name(?jit_type_t $p0, ?int $p1): ?int_ptr {
        $result = $this->ffi->jit_type_get_name($p0 === null ? null : $p0->getData(), $p1);
        return $result === null ? null : new int_ptr($result);
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
    public function jit_readelf_get_name(?jit_readelf_t $p0): ?int_ptr {
        $result = $this->ffi->jit_readelf_get_name($p0 === null ? null : $p0->getData());
        return $result === null ? null : new int_ptr($result);
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
    public function jit_readelf_get_needed(?jit_readelf_t $p0, ?int $p1): ?int_ptr {
        $result = $this->ffi->jit_readelf_get_needed($p0 === null ? null : $p0->getData(), $p1);
        return $result === null ? null : new int_ptr($result);
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
    public function jit_insn_get_name(?jit_insn_t $p0): ?int_ptr {
        $result = $this->ffi->jit_insn_get_name($p0 === null ? null : $p0->getData());
        return $result === null ? null : new int_ptr($result);
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
 // typedefenum jit_prot_t
    const JIT_PROT_NONE = (0) + 0;
    const JIT_PROT_READ = (0) + 1;
    const JIT_PROT_READ_WRITE = (0) + 2;
    const JIT_PROT_EXEC_READ = (0) + 3;
    const JIT_PROT_EXEC_READ_WRITE = (0) + 4;
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
    // enum __codecvt_result
    const __codecvt_ok = (0) + 0;
    const __codecvt_partial = (0) + 1;
    const __codecvt_error = (0) + 2;
    const __codecvt_noconv = (0) + 3;
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
    public function tmpnam(?string $p0): ?int_ptr {
        $result = $this->ffi->tmpnam($p0);
        return $result === null ? null : new int_ptr($result);
    }
    public function tmpnam_r(?string $p0): ?int_ptr {
        $result = $this->ffi->tmpnam_r($p0);
        return $result === null ? null : new int_ptr($result);
    }
    public function tempnam(?string $p0, ?string $p1): ?int_ptr {
        $result = $this->ffi->tempnam($p0, $p1);
        return $result === null ? null : new int_ptr($result);
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
    public function fgets(?string $p0, ?int $p1, ?FILE_ptr $p2): ?int_ptr {
        $result = $this->ffi->fgets($p0, $p1, $p2 === null ? null : $p2->getData());
        return $result === null ? null : new int_ptr($result);
    }
    public function gets(?string $p0): ?int_ptr {
        $result = $this->ffi->gets($p0);
        return $result === null ? null : new int_ptr($result);
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
    public function ctermid(?string $p0): ?int_ptr {
        $result = $this->ffi->ctermid($p0);
        return $result === null ? null : new int_ptr($result);
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
    public function jit_dump_type(?FILE_ptr $p0, ?jit_type_t $p1): void {
        $this->ffi->jit_dump_type($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData());
    }
    public function jit_dump_value(?FILE_ptr $p0, ?jit_function_t $p1, ?jit_value_t $p2, ?string $p3): void {
        $this->ffi->jit_dump_value($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData(), $p3);
    }
    public function jit_dump_insn(?FILE_ptr $p0, ?jit_function_t $p1, ?jit_insn_t $p2): void {
        $this->ffi->jit_dump_insn($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2 === null ? null : $p2->getData());
    }
    public function jit_dump_function(?FILE_ptr $p0, ?jit_function_t $p1, ?string $p2): void {
        $this->ffi->jit_dump_function($p0 === null ? null : $p0->getData(), $p1 === null ? null : $p1->getData(), $p2);
    }
}

class void_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(void_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): void_ptr_ptr { return new void_ptr_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'void*'; }
}
class void_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(void_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): void_ptr_ptr_ptr { return new void_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): void_ptr { return new void_ptr($this->data[$n]); }
    public static function getType(): string { return 'void**'; }
}
class void_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(void_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): void_ptr_ptr_ptr_ptr { return new void_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): void_ptr_ptr { return new void_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'void***'; }
}
class jit_sbyte implements ilibjit {
    private FFI\CData $data;
    public function __construct($data) { $tmp = FFI::new('char'); $tmp = $data; $this->data = $tmp; }
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
    public function __construct($data) { $tmp = FFI::new('unsigned char'); $tmp = $data; $this->data = $tmp; }
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
    public function __construct($data) { $tmp = FFI::new('short'); $tmp = $data; $this->data = $tmp; }
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
    public function __construct($data) { $tmp = FFI::new('unsigned short'); $tmp = $data; $this->data = $tmp; }
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
    public function __construct($data) { $tmp = FFI::new('int'); $tmp = $data; $this->data = $tmp; }
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
    public function __construct($data) { $tmp = FFI::new('unsigned int'); $tmp = $data; $this->data = $tmp; }
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
    public function __construct($data) { $tmp = FFI::new('long'); $tmp = $data; $this->data = $tmp; }
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
    public function __construct($data) { $tmp = FFI::new('unsigned long'); $tmp = $data; $this->data = $tmp; }
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
    public function __construct($data) { $tmp = FFI::new('long'); $tmp = $data; $this->data = $tmp; }
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
    public function __construct($data) { $tmp = FFI::new('unsigned long'); $tmp = $data; $this->data = $tmp; }
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
    public function __construct($data) { $tmp = FFI::new('float'); $tmp = $data; $this->data = $tmp; }
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
    public function __construct($data) { $tmp = FFI::new('double'); $tmp = $data; $this->data = $tmp; }
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
    public function __construct($data) { $tmp = FFI::new('long double'); $tmp = $data; $this->data = $tmp; }
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
    public function __construct($data) { $tmp = FFI::new('unsigned long'); $tmp = $data; $this->data = $tmp; }
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
    public function __construct($data) { $tmp = FFI::new('unsigned int'); $tmp = $data; $this->data = $tmp; }
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
    public function __construct($data) { $tmp = FFI::new('long'); $tmp = $data; $this->data = $tmp; }
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
    public function __construct($data) { $tmp = FFI::new('long'); $tmp = $data; $this->data = $tmp; }
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
class __u_char implements ilibjit {
    private FFI\CData $data;
    public function __construct($data) { $tmp = FFI::new('unsigned char'); $tmp = $data; $this->data = $tmp; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__u_char $other): bool { return $this->data == $other->data; }
    public function addr(): __u_char_ptr { return new __u_char_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__u_char'; }
}
class __u_char_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__u_char_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __u_char_ptr_ptr { return new __u_char_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __u_char { return new __u_char($this->data[$n]); }
    public static function getType(): string { return '__u_char*'; }
}
class __u_char_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__u_char_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __u_char_ptr_ptr_ptr { return new __u_char_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __u_char_ptr { return new __u_char_ptr($this->data[$n]); }
    public static function getType(): string { return '__u_char**'; }
}
class __u_char_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__u_char_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __u_char_ptr_ptr_ptr_ptr { return new __u_char_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __u_char_ptr_ptr { return new __u_char_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__u_char***'; }
}
class __u_char_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__u_char_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __u_char_ptr_ptr_ptr_ptr_ptr { return new __u_char_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __u_char_ptr_ptr_ptr { return new __u_char_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__u_char****'; }
}
class __u_short implements ilibjit {
    private FFI\CData $data;
    public function __construct($data) { $tmp = FFI::new('unsigned short int'); $tmp = $data; $this->data = $tmp; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__u_short $other): bool { return $this->data == $other->data; }
    public function addr(): __u_short_ptr { return new __u_short_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__u_short'; }
}
class __u_short_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__u_short_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __u_short_ptr_ptr { return new __u_short_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __u_short { return new __u_short($this->data[$n]); }
    public static function getType(): string { return '__u_short*'; }
}
class __u_short_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__u_short_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __u_short_ptr_ptr_ptr { return new __u_short_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __u_short_ptr { return new __u_short_ptr($this->data[$n]); }
    public static function getType(): string { return '__u_short**'; }
}
class __u_short_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__u_short_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __u_short_ptr_ptr_ptr_ptr { return new __u_short_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __u_short_ptr_ptr { return new __u_short_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__u_short***'; }
}
class __u_short_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__u_short_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __u_short_ptr_ptr_ptr_ptr_ptr { return new __u_short_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __u_short_ptr_ptr_ptr { return new __u_short_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__u_short****'; }
}
class __u_int implements ilibjit {
    private FFI\CData $data;
    public function __construct($data) { $tmp = FFI::new('unsigned int'); $tmp = $data; $this->data = $tmp; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__u_int $other): bool { return $this->data == $other->data; }
    public function addr(): __u_int_ptr { return new __u_int_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__u_int'; }
}
class __u_int_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__u_int_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __u_int_ptr_ptr { return new __u_int_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __u_int { return new __u_int($this->data[$n]); }
    public static function getType(): string { return '__u_int*'; }
}
class __u_int_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__u_int_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __u_int_ptr_ptr_ptr { return new __u_int_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __u_int_ptr { return new __u_int_ptr($this->data[$n]); }
    public static function getType(): string { return '__u_int**'; }
}
class __u_int_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__u_int_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __u_int_ptr_ptr_ptr_ptr { return new __u_int_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __u_int_ptr_ptr { return new __u_int_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__u_int***'; }
}
class __u_int_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__u_int_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __u_int_ptr_ptr_ptr_ptr_ptr { return new __u_int_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __u_int_ptr_ptr_ptr { return new __u_int_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__u_int****'; }
}
class __u_long implements ilibjit {
    private FFI\CData $data;
    public function __construct($data) { $tmp = FFI::new('unsigned long int'); $tmp = $data; $this->data = $tmp; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__u_long $other): bool { return $this->data == $other->data; }
    public function addr(): __u_long_ptr { return new __u_long_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__u_long'; }
}
class __u_long_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__u_long_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __u_long_ptr_ptr { return new __u_long_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __u_long { return new __u_long($this->data[$n]); }
    public static function getType(): string { return '__u_long*'; }
}
class __u_long_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__u_long_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __u_long_ptr_ptr_ptr { return new __u_long_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __u_long_ptr { return new __u_long_ptr($this->data[$n]); }
    public static function getType(): string { return '__u_long**'; }
}
class __u_long_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__u_long_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __u_long_ptr_ptr_ptr_ptr { return new __u_long_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __u_long_ptr_ptr { return new __u_long_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__u_long***'; }
}
class __u_long_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__u_long_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __u_long_ptr_ptr_ptr_ptr_ptr { return new __u_long_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __u_long_ptr_ptr_ptr { return new __u_long_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__u_long****'; }
}
class __int8_t implements ilibjit {
    private FFI\CData $data;
    public function __construct($data) { $tmp = FFI::new('signed char'); $tmp = $data; $this->data = $tmp; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__int8_t $other): bool { return $this->data == $other->data; }
    public function addr(): __int8_t_ptr { return new __int8_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__int8_t'; }
}
class __int8_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__int8_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __int8_t_ptr_ptr { return new __int8_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __int8_t { return new __int8_t($this->data[$n]); }
    public static function getType(): string { return '__int8_t*'; }
}
class __int8_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__int8_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __int8_t_ptr_ptr_ptr { return new __int8_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __int8_t_ptr { return new __int8_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__int8_t**'; }
}
class __int8_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__int8_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __int8_t_ptr_ptr_ptr_ptr { return new __int8_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __int8_t_ptr_ptr { return new __int8_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__int8_t***'; }
}
class __int8_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__int8_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __int8_t_ptr_ptr_ptr_ptr_ptr { return new __int8_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __int8_t_ptr_ptr_ptr { return new __int8_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__int8_t****'; }
}
class __uint8_t implements ilibjit {
    private FFI\CData $data;
    public function __construct($data) { $tmp = FFI::new('unsigned char'); $tmp = $data; $this->data = $tmp; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__uint8_t $other): bool { return $this->data == $other->data; }
    public function addr(): __uint8_t_ptr { return new __uint8_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__uint8_t'; }
}
class __uint8_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__uint8_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __uint8_t_ptr_ptr { return new __uint8_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __uint8_t { return new __uint8_t($this->data[$n]); }
    public static function getType(): string { return '__uint8_t*'; }
}
class __uint8_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__uint8_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __uint8_t_ptr_ptr_ptr { return new __uint8_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __uint8_t_ptr { return new __uint8_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__uint8_t**'; }
}
class __uint8_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__uint8_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __uint8_t_ptr_ptr_ptr_ptr { return new __uint8_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __uint8_t_ptr_ptr { return new __uint8_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__uint8_t***'; }
}
class __uint8_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__uint8_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __uint8_t_ptr_ptr_ptr_ptr_ptr { return new __uint8_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __uint8_t_ptr_ptr_ptr { return new __uint8_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__uint8_t****'; }
}
class __int16_t implements ilibjit {
    private FFI\CData $data;
    public function __construct($data) { $tmp = FFI::new('signed short int'); $tmp = $data; $this->data = $tmp; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__int16_t $other): bool { return $this->data == $other->data; }
    public function addr(): __int16_t_ptr { return new __int16_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__int16_t'; }
}
class __int16_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__int16_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __int16_t_ptr_ptr { return new __int16_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __int16_t { return new __int16_t($this->data[$n]); }
    public static function getType(): string { return '__int16_t*'; }
}
class __int16_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__int16_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __int16_t_ptr_ptr_ptr { return new __int16_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __int16_t_ptr { return new __int16_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__int16_t**'; }
}
class __int16_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__int16_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __int16_t_ptr_ptr_ptr_ptr { return new __int16_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __int16_t_ptr_ptr { return new __int16_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__int16_t***'; }
}
class __int16_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__int16_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __int16_t_ptr_ptr_ptr_ptr_ptr { return new __int16_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __int16_t_ptr_ptr_ptr { return new __int16_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__int16_t****'; }
}
class __uint16_t implements ilibjit {
    private FFI\CData $data;
    public function __construct($data) { $tmp = FFI::new('unsigned short int'); $tmp = $data; $this->data = $tmp; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__uint16_t $other): bool { return $this->data == $other->data; }
    public function addr(): __uint16_t_ptr { return new __uint16_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__uint16_t'; }
}
class __uint16_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__uint16_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __uint16_t_ptr_ptr { return new __uint16_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __uint16_t { return new __uint16_t($this->data[$n]); }
    public static function getType(): string { return '__uint16_t*'; }
}
class __uint16_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__uint16_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __uint16_t_ptr_ptr_ptr { return new __uint16_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __uint16_t_ptr { return new __uint16_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__uint16_t**'; }
}
class __uint16_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__uint16_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __uint16_t_ptr_ptr_ptr_ptr { return new __uint16_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __uint16_t_ptr_ptr { return new __uint16_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__uint16_t***'; }
}
class __uint16_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__uint16_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __uint16_t_ptr_ptr_ptr_ptr_ptr { return new __uint16_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __uint16_t_ptr_ptr_ptr { return new __uint16_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__uint16_t****'; }
}
class __int32_t implements ilibjit {
    private FFI\CData $data;
    public function __construct($data) { $tmp = FFI::new('signed int'); $tmp = $data; $this->data = $tmp; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__int32_t $other): bool { return $this->data == $other->data; }
    public function addr(): __int32_t_ptr { return new __int32_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__int32_t'; }
}
class __int32_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__int32_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __int32_t_ptr_ptr { return new __int32_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __int32_t { return new __int32_t($this->data[$n]); }
    public static function getType(): string { return '__int32_t*'; }
}
class __int32_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__int32_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __int32_t_ptr_ptr_ptr { return new __int32_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __int32_t_ptr { return new __int32_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__int32_t**'; }
}
class __int32_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__int32_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __int32_t_ptr_ptr_ptr_ptr { return new __int32_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __int32_t_ptr_ptr { return new __int32_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__int32_t***'; }
}
class __int32_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__int32_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __int32_t_ptr_ptr_ptr_ptr_ptr { return new __int32_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __int32_t_ptr_ptr_ptr { return new __int32_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__int32_t****'; }
}
class __uint32_t implements ilibjit {
    private FFI\CData $data;
    public function __construct($data) { $tmp = FFI::new('unsigned int'); $tmp = $data; $this->data = $tmp; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__uint32_t $other): bool { return $this->data == $other->data; }
    public function addr(): __uint32_t_ptr { return new __uint32_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__uint32_t'; }
}
class __uint32_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__uint32_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __uint32_t_ptr_ptr { return new __uint32_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __uint32_t { return new __uint32_t($this->data[$n]); }
    public static function getType(): string { return '__uint32_t*'; }
}
class __uint32_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__uint32_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __uint32_t_ptr_ptr_ptr { return new __uint32_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __uint32_t_ptr { return new __uint32_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__uint32_t**'; }
}
class __uint32_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__uint32_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __uint32_t_ptr_ptr_ptr_ptr { return new __uint32_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __uint32_t_ptr_ptr { return new __uint32_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__uint32_t***'; }
}
class __uint32_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__uint32_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __uint32_t_ptr_ptr_ptr_ptr_ptr { return new __uint32_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __uint32_t_ptr_ptr_ptr { return new __uint32_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__uint32_t****'; }
}
class __int64_t implements ilibjit {
    private FFI\CData $data;
    public function __construct($data) { $tmp = FFI::new('signed long int'); $tmp = $data; $this->data = $tmp; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__int64_t $other): bool { return $this->data == $other->data; }
    public function addr(): __int64_t_ptr { return new __int64_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__int64_t'; }
}
class __int64_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__int64_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __int64_t_ptr_ptr { return new __int64_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __int64_t { return new __int64_t($this->data[$n]); }
    public static function getType(): string { return '__int64_t*'; }
}
class __int64_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__int64_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __int64_t_ptr_ptr_ptr { return new __int64_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __int64_t_ptr { return new __int64_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__int64_t**'; }
}
class __int64_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__int64_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __int64_t_ptr_ptr_ptr_ptr { return new __int64_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __int64_t_ptr_ptr { return new __int64_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__int64_t***'; }
}
class __int64_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__int64_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __int64_t_ptr_ptr_ptr_ptr_ptr { return new __int64_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __int64_t_ptr_ptr_ptr { return new __int64_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__int64_t****'; }
}
class __uint64_t implements ilibjit {
    private FFI\CData $data;
    public function __construct($data) { $tmp = FFI::new('unsigned long int'); $tmp = $data; $this->data = $tmp; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__uint64_t $other): bool { return $this->data == $other->data; }
    public function addr(): __uint64_t_ptr { return new __uint64_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__uint64_t'; }
}
class __uint64_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__uint64_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __uint64_t_ptr_ptr { return new __uint64_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __uint64_t { return new __uint64_t($this->data[$n]); }
    public static function getType(): string { return '__uint64_t*'; }
}
class __uint64_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__uint64_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __uint64_t_ptr_ptr_ptr { return new __uint64_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __uint64_t_ptr { return new __uint64_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__uint64_t**'; }
}
class __uint64_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__uint64_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __uint64_t_ptr_ptr_ptr_ptr { return new __uint64_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __uint64_t_ptr_ptr { return new __uint64_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__uint64_t***'; }
}
class __uint64_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__uint64_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __uint64_t_ptr_ptr_ptr_ptr_ptr { return new __uint64_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __uint64_t_ptr_ptr_ptr { return new __uint64_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__uint64_t****'; }
}
class __quad_t implements ilibjit {
    private FFI\CData $data;
    public function __construct($data) { $tmp = FFI::new('long int'); $tmp = $data; $this->data = $tmp; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__quad_t $other): bool { return $this->data == $other->data; }
    public function addr(): __quad_t_ptr { return new __quad_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__quad_t'; }
}
class __quad_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__quad_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __quad_t_ptr_ptr { return new __quad_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __quad_t { return new __quad_t($this->data[$n]); }
    public static function getType(): string { return '__quad_t*'; }
}
class __quad_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__quad_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __quad_t_ptr_ptr_ptr { return new __quad_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __quad_t_ptr { return new __quad_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__quad_t**'; }
}
class __quad_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__quad_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __quad_t_ptr_ptr_ptr_ptr { return new __quad_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __quad_t_ptr_ptr { return new __quad_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__quad_t***'; }
}
class __quad_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__quad_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __quad_t_ptr_ptr_ptr_ptr_ptr { return new __quad_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __quad_t_ptr_ptr_ptr { return new __quad_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__quad_t****'; }
}
class __u_quad_t implements ilibjit {
    private FFI\CData $data;
    public function __construct($data) { $tmp = FFI::new('unsigned long int'); $tmp = $data; $this->data = $tmp; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__u_quad_t $other): bool { return $this->data == $other->data; }
    public function addr(): __u_quad_t_ptr { return new __u_quad_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__u_quad_t'; }
}
class __u_quad_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__u_quad_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __u_quad_t_ptr_ptr { return new __u_quad_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __u_quad_t { return new __u_quad_t($this->data[$n]); }
    public static function getType(): string { return '__u_quad_t*'; }
}
class __u_quad_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__u_quad_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __u_quad_t_ptr_ptr_ptr { return new __u_quad_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __u_quad_t_ptr { return new __u_quad_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__u_quad_t**'; }
}
class __u_quad_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__u_quad_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __u_quad_t_ptr_ptr_ptr_ptr { return new __u_quad_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __u_quad_t_ptr_ptr { return new __u_quad_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__u_quad_t***'; }
}
class __u_quad_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__u_quad_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __u_quad_t_ptr_ptr_ptr_ptr_ptr { return new __u_quad_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __u_quad_t_ptr_ptr_ptr { return new __u_quad_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__u_quad_t****'; }
}
class __dev_t implements ilibjit {
    private FFI\CData $data;
    public function __construct($data) { $tmp = FFI::new('unsigned long int'); $tmp = $data; $this->data = $tmp; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__dev_t $other): bool { return $this->data == $other->data; }
    public function addr(): __dev_t_ptr { return new __dev_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__dev_t'; }
}
class __dev_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__dev_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __dev_t_ptr_ptr { return new __dev_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __dev_t { return new __dev_t($this->data[$n]); }
    public static function getType(): string { return '__dev_t*'; }
}
class __dev_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__dev_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __dev_t_ptr_ptr_ptr { return new __dev_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __dev_t_ptr { return new __dev_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__dev_t**'; }
}
class __dev_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__dev_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __dev_t_ptr_ptr_ptr_ptr { return new __dev_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __dev_t_ptr_ptr { return new __dev_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__dev_t***'; }
}
class __dev_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__dev_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __dev_t_ptr_ptr_ptr_ptr_ptr { return new __dev_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __dev_t_ptr_ptr_ptr { return new __dev_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__dev_t****'; }
}
class __uid_t implements ilibjit {
    private FFI\CData $data;
    public function __construct($data) { $tmp = FFI::new('unsigned int'); $tmp = $data; $this->data = $tmp; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__uid_t $other): bool { return $this->data == $other->data; }
    public function addr(): __uid_t_ptr { return new __uid_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__uid_t'; }
}
class __uid_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__uid_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __uid_t_ptr_ptr { return new __uid_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __uid_t { return new __uid_t($this->data[$n]); }
    public static function getType(): string { return '__uid_t*'; }
}
class __uid_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__uid_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __uid_t_ptr_ptr_ptr { return new __uid_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __uid_t_ptr { return new __uid_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__uid_t**'; }
}
class __uid_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__uid_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __uid_t_ptr_ptr_ptr_ptr { return new __uid_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __uid_t_ptr_ptr { return new __uid_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__uid_t***'; }
}
class __uid_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__uid_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __uid_t_ptr_ptr_ptr_ptr_ptr { return new __uid_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __uid_t_ptr_ptr_ptr { return new __uid_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__uid_t****'; }
}
class __gid_t implements ilibjit {
    private FFI\CData $data;
    public function __construct($data) { $tmp = FFI::new('unsigned int'); $tmp = $data; $this->data = $tmp; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__gid_t $other): bool { return $this->data == $other->data; }
    public function addr(): __gid_t_ptr { return new __gid_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__gid_t'; }
}
class __gid_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__gid_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __gid_t_ptr_ptr { return new __gid_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __gid_t { return new __gid_t($this->data[$n]); }
    public static function getType(): string { return '__gid_t*'; }
}
class __gid_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__gid_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __gid_t_ptr_ptr_ptr { return new __gid_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __gid_t_ptr { return new __gid_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__gid_t**'; }
}
class __gid_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__gid_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __gid_t_ptr_ptr_ptr_ptr { return new __gid_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __gid_t_ptr_ptr { return new __gid_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__gid_t***'; }
}
class __gid_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__gid_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __gid_t_ptr_ptr_ptr_ptr_ptr { return new __gid_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __gid_t_ptr_ptr_ptr { return new __gid_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__gid_t****'; }
}
class __ino_t implements ilibjit {
    private FFI\CData $data;
    public function __construct($data) { $tmp = FFI::new('unsigned long int'); $tmp = $data; $this->data = $tmp; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__ino_t $other): bool { return $this->data == $other->data; }
    public function addr(): __ino_t_ptr { return new __ino_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__ino_t'; }
}
class __ino_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__ino_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __ino_t_ptr_ptr { return new __ino_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __ino_t { return new __ino_t($this->data[$n]); }
    public static function getType(): string { return '__ino_t*'; }
}
class __ino_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__ino_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __ino_t_ptr_ptr_ptr { return new __ino_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __ino_t_ptr { return new __ino_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__ino_t**'; }
}
class __ino_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__ino_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __ino_t_ptr_ptr_ptr_ptr { return new __ino_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __ino_t_ptr_ptr { return new __ino_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__ino_t***'; }
}
class __ino_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__ino_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __ino_t_ptr_ptr_ptr_ptr_ptr { return new __ino_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __ino_t_ptr_ptr_ptr { return new __ino_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__ino_t****'; }
}
class __ino64_t implements ilibjit {
    private FFI\CData $data;
    public function __construct($data) { $tmp = FFI::new('unsigned long int'); $tmp = $data; $this->data = $tmp; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__ino64_t $other): bool { return $this->data == $other->data; }
    public function addr(): __ino64_t_ptr { return new __ino64_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__ino64_t'; }
}
class __ino64_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__ino64_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __ino64_t_ptr_ptr { return new __ino64_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __ino64_t { return new __ino64_t($this->data[$n]); }
    public static function getType(): string { return '__ino64_t*'; }
}
class __ino64_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__ino64_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __ino64_t_ptr_ptr_ptr { return new __ino64_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __ino64_t_ptr { return new __ino64_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__ino64_t**'; }
}
class __ino64_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__ino64_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __ino64_t_ptr_ptr_ptr_ptr { return new __ino64_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __ino64_t_ptr_ptr { return new __ino64_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__ino64_t***'; }
}
class __ino64_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__ino64_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __ino64_t_ptr_ptr_ptr_ptr_ptr { return new __ino64_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __ino64_t_ptr_ptr_ptr { return new __ino64_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__ino64_t****'; }
}
class __mode_t implements ilibjit {
    private FFI\CData $data;
    public function __construct($data) { $tmp = FFI::new('unsigned int'); $tmp = $data; $this->data = $tmp; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__mode_t $other): bool { return $this->data == $other->data; }
    public function addr(): __mode_t_ptr { return new __mode_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__mode_t'; }
}
class __mode_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__mode_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __mode_t_ptr_ptr { return new __mode_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __mode_t { return new __mode_t($this->data[$n]); }
    public static function getType(): string { return '__mode_t*'; }
}
class __mode_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__mode_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __mode_t_ptr_ptr_ptr { return new __mode_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __mode_t_ptr { return new __mode_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__mode_t**'; }
}
class __mode_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__mode_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __mode_t_ptr_ptr_ptr_ptr { return new __mode_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __mode_t_ptr_ptr { return new __mode_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__mode_t***'; }
}
class __mode_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__mode_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __mode_t_ptr_ptr_ptr_ptr_ptr { return new __mode_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __mode_t_ptr_ptr_ptr { return new __mode_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__mode_t****'; }
}
class __nlink_t implements ilibjit {
    private FFI\CData $data;
    public function __construct($data) { $tmp = FFI::new('unsigned long int'); $tmp = $data; $this->data = $tmp; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__nlink_t $other): bool { return $this->data == $other->data; }
    public function addr(): __nlink_t_ptr { return new __nlink_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__nlink_t'; }
}
class __nlink_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__nlink_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __nlink_t_ptr_ptr { return new __nlink_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __nlink_t { return new __nlink_t($this->data[$n]); }
    public static function getType(): string { return '__nlink_t*'; }
}
class __nlink_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__nlink_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __nlink_t_ptr_ptr_ptr { return new __nlink_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __nlink_t_ptr { return new __nlink_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__nlink_t**'; }
}
class __nlink_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__nlink_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __nlink_t_ptr_ptr_ptr_ptr { return new __nlink_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __nlink_t_ptr_ptr { return new __nlink_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__nlink_t***'; }
}
class __nlink_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__nlink_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __nlink_t_ptr_ptr_ptr_ptr_ptr { return new __nlink_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __nlink_t_ptr_ptr_ptr { return new __nlink_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__nlink_t****'; }
}
class __off_t implements ilibjit {
    private FFI\CData $data;
    public function __construct($data) { $tmp = FFI::new('long int'); $tmp = $data; $this->data = $tmp; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__off_t $other): bool { return $this->data == $other->data; }
    public function addr(): __off_t_ptr { return new __off_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__off_t'; }
}
class __off_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__off_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __off_t_ptr_ptr { return new __off_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __off_t { return new __off_t($this->data[$n]); }
    public static function getType(): string { return '__off_t*'; }
}
class __off_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__off_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __off_t_ptr_ptr_ptr { return new __off_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __off_t_ptr { return new __off_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__off_t**'; }
}
class __off_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__off_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __off_t_ptr_ptr_ptr_ptr { return new __off_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __off_t_ptr_ptr { return new __off_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__off_t***'; }
}
class __off_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__off_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __off_t_ptr_ptr_ptr_ptr_ptr { return new __off_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __off_t_ptr_ptr_ptr { return new __off_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__off_t****'; }
}
class __off64_t implements ilibjit {
    private FFI\CData $data;
    public function __construct($data) { $tmp = FFI::new('long int'); $tmp = $data; $this->data = $tmp; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__off64_t $other): bool { return $this->data == $other->data; }
    public function addr(): __off64_t_ptr { return new __off64_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__off64_t'; }
}
class __off64_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__off64_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __off64_t_ptr_ptr { return new __off64_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __off64_t { return new __off64_t($this->data[$n]); }
    public static function getType(): string { return '__off64_t*'; }
}
class __off64_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__off64_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __off64_t_ptr_ptr_ptr { return new __off64_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __off64_t_ptr { return new __off64_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__off64_t**'; }
}
class __off64_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__off64_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __off64_t_ptr_ptr_ptr_ptr { return new __off64_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __off64_t_ptr_ptr { return new __off64_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__off64_t***'; }
}
class __off64_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__off64_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __off64_t_ptr_ptr_ptr_ptr_ptr { return new __off64_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __off64_t_ptr_ptr_ptr { return new __off64_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__off64_t****'; }
}
class __pid_t implements ilibjit {
    private FFI\CData $data;
    public function __construct($data) { $tmp = FFI::new('int'); $tmp = $data; $this->data = $tmp; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__pid_t $other): bool { return $this->data == $other->data; }
    public function addr(): __pid_t_ptr { return new __pid_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__pid_t'; }
}
class __pid_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__pid_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __pid_t_ptr_ptr { return new __pid_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __pid_t { return new __pid_t($this->data[$n]); }
    public static function getType(): string { return '__pid_t*'; }
}
class __pid_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__pid_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __pid_t_ptr_ptr_ptr { return new __pid_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __pid_t_ptr { return new __pid_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__pid_t**'; }
}
class __pid_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__pid_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __pid_t_ptr_ptr_ptr_ptr { return new __pid_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __pid_t_ptr_ptr { return new __pid_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__pid_t***'; }
}
class __pid_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__pid_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __pid_t_ptr_ptr_ptr_ptr_ptr { return new __pid_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __pid_t_ptr_ptr_ptr { return new __pid_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__pid_t****'; }
}
class __fsid_t implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__fsid_t $other): bool { return $this->data == $other->data; }
    public function addr(): __fsid_t_ptr { return new __fsid_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__fsid_t'; }
}
class __fsid_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__fsid_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __fsid_t_ptr_ptr { return new __fsid_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __fsid_t { return new __fsid_t($this->data[$n]); }
    public static function getType(): string { return '__fsid_t*'; }
}
class __fsid_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__fsid_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __fsid_t_ptr_ptr_ptr { return new __fsid_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __fsid_t_ptr { return new __fsid_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__fsid_t**'; }
}
class __fsid_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__fsid_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __fsid_t_ptr_ptr_ptr_ptr { return new __fsid_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __fsid_t_ptr_ptr { return new __fsid_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__fsid_t***'; }
}
class __fsid_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__fsid_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __fsid_t_ptr_ptr_ptr_ptr_ptr { return new __fsid_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __fsid_t_ptr_ptr_ptr { return new __fsid_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__fsid_t****'; }
}
class __clock_t implements ilibjit {
    private FFI\CData $data;
    public function __construct($data) { $tmp = FFI::new('long int'); $tmp = $data; $this->data = $tmp; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__clock_t $other): bool { return $this->data == $other->data; }
    public function addr(): __clock_t_ptr { return new __clock_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__clock_t'; }
}
class __clock_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__clock_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __clock_t_ptr_ptr { return new __clock_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __clock_t { return new __clock_t($this->data[$n]); }
    public static function getType(): string { return '__clock_t*'; }
}
class __clock_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__clock_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __clock_t_ptr_ptr_ptr { return new __clock_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __clock_t_ptr { return new __clock_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__clock_t**'; }
}
class __clock_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__clock_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __clock_t_ptr_ptr_ptr_ptr { return new __clock_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __clock_t_ptr_ptr { return new __clock_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__clock_t***'; }
}
class __clock_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__clock_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __clock_t_ptr_ptr_ptr_ptr_ptr { return new __clock_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __clock_t_ptr_ptr_ptr { return new __clock_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__clock_t****'; }
}
class __rlim_t implements ilibjit {
    private FFI\CData $data;
    public function __construct($data) { $tmp = FFI::new('unsigned long int'); $tmp = $data; $this->data = $tmp; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__rlim_t $other): bool { return $this->data == $other->data; }
    public function addr(): __rlim_t_ptr { return new __rlim_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__rlim_t'; }
}
class __rlim_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__rlim_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __rlim_t_ptr_ptr { return new __rlim_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __rlim_t { return new __rlim_t($this->data[$n]); }
    public static function getType(): string { return '__rlim_t*'; }
}
class __rlim_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__rlim_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __rlim_t_ptr_ptr_ptr { return new __rlim_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __rlim_t_ptr { return new __rlim_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__rlim_t**'; }
}
class __rlim_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__rlim_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __rlim_t_ptr_ptr_ptr_ptr { return new __rlim_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __rlim_t_ptr_ptr { return new __rlim_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__rlim_t***'; }
}
class __rlim_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__rlim_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __rlim_t_ptr_ptr_ptr_ptr_ptr { return new __rlim_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __rlim_t_ptr_ptr_ptr { return new __rlim_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__rlim_t****'; }
}
class __rlim64_t implements ilibjit {
    private FFI\CData $data;
    public function __construct($data) { $tmp = FFI::new('unsigned long int'); $tmp = $data; $this->data = $tmp; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__rlim64_t $other): bool { return $this->data == $other->data; }
    public function addr(): __rlim64_t_ptr { return new __rlim64_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__rlim64_t'; }
}
class __rlim64_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__rlim64_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __rlim64_t_ptr_ptr { return new __rlim64_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __rlim64_t { return new __rlim64_t($this->data[$n]); }
    public static function getType(): string { return '__rlim64_t*'; }
}
class __rlim64_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__rlim64_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __rlim64_t_ptr_ptr_ptr { return new __rlim64_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __rlim64_t_ptr { return new __rlim64_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__rlim64_t**'; }
}
class __rlim64_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__rlim64_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __rlim64_t_ptr_ptr_ptr_ptr { return new __rlim64_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __rlim64_t_ptr_ptr { return new __rlim64_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__rlim64_t***'; }
}
class __rlim64_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__rlim64_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __rlim64_t_ptr_ptr_ptr_ptr_ptr { return new __rlim64_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __rlim64_t_ptr_ptr_ptr { return new __rlim64_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__rlim64_t****'; }
}
class __id_t implements ilibjit {
    private FFI\CData $data;
    public function __construct($data) { $tmp = FFI::new('unsigned int'); $tmp = $data; $this->data = $tmp; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__id_t $other): bool { return $this->data == $other->data; }
    public function addr(): __id_t_ptr { return new __id_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__id_t'; }
}
class __id_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__id_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __id_t_ptr_ptr { return new __id_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __id_t { return new __id_t($this->data[$n]); }
    public static function getType(): string { return '__id_t*'; }
}
class __id_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__id_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __id_t_ptr_ptr_ptr { return new __id_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __id_t_ptr { return new __id_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__id_t**'; }
}
class __id_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__id_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __id_t_ptr_ptr_ptr_ptr { return new __id_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __id_t_ptr_ptr { return new __id_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__id_t***'; }
}
class __id_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__id_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __id_t_ptr_ptr_ptr_ptr_ptr { return new __id_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __id_t_ptr_ptr_ptr { return new __id_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__id_t****'; }
}
class __time_t implements ilibjit {
    private FFI\CData $data;
    public function __construct($data) { $tmp = FFI::new('long int'); $tmp = $data; $this->data = $tmp; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__time_t $other): bool { return $this->data == $other->data; }
    public function addr(): __time_t_ptr { return new __time_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__time_t'; }
}
class __time_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__time_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __time_t_ptr_ptr { return new __time_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __time_t { return new __time_t($this->data[$n]); }
    public static function getType(): string { return '__time_t*'; }
}
class __time_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__time_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __time_t_ptr_ptr_ptr { return new __time_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __time_t_ptr { return new __time_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__time_t**'; }
}
class __time_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__time_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __time_t_ptr_ptr_ptr_ptr { return new __time_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __time_t_ptr_ptr { return new __time_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__time_t***'; }
}
class __time_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__time_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __time_t_ptr_ptr_ptr_ptr_ptr { return new __time_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __time_t_ptr_ptr_ptr { return new __time_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__time_t****'; }
}
class __useconds_t implements ilibjit {
    private FFI\CData $data;
    public function __construct($data) { $tmp = FFI::new('unsigned int'); $tmp = $data; $this->data = $tmp; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__useconds_t $other): bool { return $this->data == $other->data; }
    public function addr(): __useconds_t_ptr { return new __useconds_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__useconds_t'; }
}
class __useconds_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__useconds_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __useconds_t_ptr_ptr { return new __useconds_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __useconds_t { return new __useconds_t($this->data[$n]); }
    public static function getType(): string { return '__useconds_t*'; }
}
class __useconds_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__useconds_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __useconds_t_ptr_ptr_ptr { return new __useconds_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __useconds_t_ptr { return new __useconds_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__useconds_t**'; }
}
class __useconds_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__useconds_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __useconds_t_ptr_ptr_ptr_ptr { return new __useconds_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __useconds_t_ptr_ptr { return new __useconds_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__useconds_t***'; }
}
class __useconds_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__useconds_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __useconds_t_ptr_ptr_ptr_ptr_ptr { return new __useconds_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __useconds_t_ptr_ptr_ptr { return new __useconds_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__useconds_t****'; }
}
class __suseconds_t implements ilibjit {
    private FFI\CData $data;
    public function __construct($data) { $tmp = FFI::new('long int'); $tmp = $data; $this->data = $tmp; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__suseconds_t $other): bool { return $this->data == $other->data; }
    public function addr(): __suseconds_t_ptr { return new __suseconds_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__suseconds_t'; }
}
class __suseconds_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__suseconds_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __suseconds_t_ptr_ptr { return new __suseconds_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __suseconds_t { return new __suseconds_t($this->data[$n]); }
    public static function getType(): string { return '__suseconds_t*'; }
}
class __suseconds_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__suseconds_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __suseconds_t_ptr_ptr_ptr { return new __suseconds_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __suseconds_t_ptr { return new __suseconds_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__suseconds_t**'; }
}
class __suseconds_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__suseconds_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __suseconds_t_ptr_ptr_ptr_ptr { return new __suseconds_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __suseconds_t_ptr_ptr { return new __suseconds_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__suseconds_t***'; }
}
class __suseconds_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__suseconds_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __suseconds_t_ptr_ptr_ptr_ptr_ptr { return new __suseconds_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __suseconds_t_ptr_ptr_ptr { return new __suseconds_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__suseconds_t****'; }
}
class __daddr_t implements ilibjit {
    private FFI\CData $data;
    public function __construct($data) { $tmp = FFI::new('int'); $tmp = $data; $this->data = $tmp; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__daddr_t $other): bool { return $this->data == $other->data; }
    public function addr(): __daddr_t_ptr { return new __daddr_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__daddr_t'; }
}
class __daddr_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__daddr_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __daddr_t_ptr_ptr { return new __daddr_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __daddr_t { return new __daddr_t($this->data[$n]); }
    public static function getType(): string { return '__daddr_t*'; }
}
class __daddr_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__daddr_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __daddr_t_ptr_ptr_ptr { return new __daddr_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __daddr_t_ptr { return new __daddr_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__daddr_t**'; }
}
class __daddr_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__daddr_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __daddr_t_ptr_ptr_ptr_ptr { return new __daddr_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __daddr_t_ptr_ptr { return new __daddr_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__daddr_t***'; }
}
class __daddr_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__daddr_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __daddr_t_ptr_ptr_ptr_ptr_ptr { return new __daddr_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __daddr_t_ptr_ptr_ptr { return new __daddr_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__daddr_t****'; }
}
class __key_t implements ilibjit {
    private FFI\CData $data;
    public function __construct($data) { $tmp = FFI::new('int'); $tmp = $data; $this->data = $tmp; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__key_t $other): bool { return $this->data == $other->data; }
    public function addr(): __key_t_ptr { return new __key_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__key_t'; }
}
class __key_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__key_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __key_t_ptr_ptr { return new __key_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __key_t { return new __key_t($this->data[$n]); }
    public static function getType(): string { return '__key_t*'; }
}
class __key_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__key_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __key_t_ptr_ptr_ptr { return new __key_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __key_t_ptr { return new __key_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__key_t**'; }
}
class __key_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__key_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __key_t_ptr_ptr_ptr_ptr { return new __key_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __key_t_ptr_ptr { return new __key_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__key_t***'; }
}
class __key_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__key_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __key_t_ptr_ptr_ptr_ptr_ptr { return new __key_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __key_t_ptr_ptr_ptr { return new __key_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__key_t****'; }
}
class __clockid_t implements ilibjit {
    private FFI\CData $data;
    public function __construct($data) { $tmp = FFI::new('int'); $tmp = $data; $this->data = $tmp; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__clockid_t $other): bool { return $this->data == $other->data; }
    public function addr(): __clockid_t_ptr { return new __clockid_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__clockid_t'; }
}
class __clockid_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__clockid_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __clockid_t_ptr_ptr { return new __clockid_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __clockid_t { return new __clockid_t($this->data[$n]); }
    public static function getType(): string { return '__clockid_t*'; }
}
class __clockid_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__clockid_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __clockid_t_ptr_ptr_ptr { return new __clockid_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __clockid_t_ptr { return new __clockid_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__clockid_t**'; }
}
class __clockid_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__clockid_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __clockid_t_ptr_ptr_ptr_ptr { return new __clockid_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __clockid_t_ptr_ptr { return new __clockid_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__clockid_t***'; }
}
class __clockid_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__clockid_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __clockid_t_ptr_ptr_ptr_ptr_ptr { return new __clockid_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __clockid_t_ptr_ptr_ptr { return new __clockid_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__clockid_t****'; }
}
class __timer_t implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__timer_t $other): bool { return $this->data == $other->data; }
    public function addr(): __timer_t_ptr { return new __timer_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__timer_t'; }
}
class __timer_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__timer_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __timer_t_ptr_ptr { return new __timer_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __timer_t { return new __timer_t($this->data[$n]); }
    public static function getType(): string { return '__timer_t*'; }
}
class __timer_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__timer_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __timer_t_ptr_ptr_ptr { return new __timer_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __timer_t_ptr { return new __timer_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__timer_t**'; }
}
class __timer_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__timer_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __timer_t_ptr_ptr_ptr_ptr { return new __timer_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __timer_t_ptr_ptr { return new __timer_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__timer_t***'; }
}
class __timer_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__timer_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __timer_t_ptr_ptr_ptr_ptr_ptr { return new __timer_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __timer_t_ptr_ptr_ptr { return new __timer_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__timer_t****'; }
}
class __blksize_t implements ilibjit {
    private FFI\CData $data;
    public function __construct($data) { $tmp = FFI::new('long int'); $tmp = $data; $this->data = $tmp; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__blksize_t $other): bool { return $this->data == $other->data; }
    public function addr(): __blksize_t_ptr { return new __blksize_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__blksize_t'; }
}
class __blksize_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__blksize_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __blksize_t_ptr_ptr { return new __blksize_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __blksize_t { return new __blksize_t($this->data[$n]); }
    public static function getType(): string { return '__blksize_t*'; }
}
class __blksize_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__blksize_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __blksize_t_ptr_ptr_ptr { return new __blksize_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __blksize_t_ptr { return new __blksize_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__blksize_t**'; }
}
class __blksize_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__blksize_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __blksize_t_ptr_ptr_ptr_ptr { return new __blksize_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __blksize_t_ptr_ptr { return new __blksize_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__blksize_t***'; }
}
class __blksize_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__blksize_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __blksize_t_ptr_ptr_ptr_ptr_ptr { return new __blksize_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __blksize_t_ptr_ptr_ptr { return new __blksize_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__blksize_t****'; }
}
class __blkcnt_t implements ilibjit {
    private FFI\CData $data;
    public function __construct($data) { $tmp = FFI::new('long int'); $tmp = $data; $this->data = $tmp; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__blkcnt_t $other): bool { return $this->data == $other->data; }
    public function addr(): __blkcnt_t_ptr { return new __blkcnt_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__blkcnt_t'; }
}
class __blkcnt_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__blkcnt_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __blkcnt_t_ptr_ptr { return new __blkcnt_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __blkcnt_t { return new __blkcnt_t($this->data[$n]); }
    public static function getType(): string { return '__blkcnt_t*'; }
}
class __blkcnt_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__blkcnt_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __blkcnt_t_ptr_ptr_ptr { return new __blkcnt_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __blkcnt_t_ptr { return new __blkcnt_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__blkcnt_t**'; }
}
class __blkcnt_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__blkcnt_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __blkcnt_t_ptr_ptr_ptr_ptr { return new __blkcnt_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __blkcnt_t_ptr_ptr { return new __blkcnt_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__blkcnt_t***'; }
}
class __blkcnt_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__blkcnt_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __blkcnt_t_ptr_ptr_ptr_ptr_ptr { return new __blkcnt_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __blkcnt_t_ptr_ptr_ptr { return new __blkcnt_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__blkcnt_t****'; }
}
class __blkcnt64_t implements ilibjit {
    private FFI\CData $data;
    public function __construct($data) { $tmp = FFI::new('long int'); $tmp = $data; $this->data = $tmp; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__blkcnt64_t $other): bool { return $this->data == $other->data; }
    public function addr(): __blkcnt64_t_ptr { return new __blkcnt64_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__blkcnt64_t'; }
}
class __blkcnt64_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__blkcnt64_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __blkcnt64_t_ptr_ptr { return new __blkcnt64_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __blkcnt64_t { return new __blkcnt64_t($this->data[$n]); }
    public static function getType(): string { return '__blkcnt64_t*'; }
}
class __blkcnt64_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__blkcnt64_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __blkcnt64_t_ptr_ptr_ptr { return new __blkcnt64_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __blkcnt64_t_ptr { return new __blkcnt64_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__blkcnt64_t**'; }
}
class __blkcnt64_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__blkcnt64_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __blkcnt64_t_ptr_ptr_ptr_ptr { return new __blkcnt64_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __blkcnt64_t_ptr_ptr { return new __blkcnt64_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__blkcnt64_t***'; }
}
class __blkcnt64_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__blkcnt64_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __blkcnt64_t_ptr_ptr_ptr_ptr_ptr { return new __blkcnt64_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __blkcnt64_t_ptr_ptr_ptr { return new __blkcnt64_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__blkcnt64_t****'; }
}
class __fsblkcnt_t implements ilibjit {
    private FFI\CData $data;
    public function __construct($data) { $tmp = FFI::new('unsigned long int'); $tmp = $data; $this->data = $tmp; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__fsblkcnt_t $other): bool { return $this->data == $other->data; }
    public function addr(): __fsblkcnt_t_ptr { return new __fsblkcnt_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__fsblkcnt_t'; }
}
class __fsblkcnt_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__fsblkcnt_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __fsblkcnt_t_ptr_ptr { return new __fsblkcnt_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __fsblkcnt_t { return new __fsblkcnt_t($this->data[$n]); }
    public static function getType(): string { return '__fsblkcnt_t*'; }
}
class __fsblkcnt_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__fsblkcnt_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __fsblkcnt_t_ptr_ptr_ptr { return new __fsblkcnt_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __fsblkcnt_t_ptr { return new __fsblkcnt_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__fsblkcnt_t**'; }
}
class __fsblkcnt_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__fsblkcnt_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __fsblkcnt_t_ptr_ptr_ptr_ptr { return new __fsblkcnt_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __fsblkcnt_t_ptr_ptr { return new __fsblkcnt_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__fsblkcnt_t***'; }
}
class __fsblkcnt_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__fsblkcnt_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __fsblkcnt_t_ptr_ptr_ptr_ptr_ptr { return new __fsblkcnt_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __fsblkcnt_t_ptr_ptr_ptr { return new __fsblkcnt_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__fsblkcnt_t****'; }
}
class __fsblkcnt64_t implements ilibjit {
    private FFI\CData $data;
    public function __construct($data) { $tmp = FFI::new('unsigned long int'); $tmp = $data; $this->data = $tmp; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__fsblkcnt64_t $other): bool { return $this->data == $other->data; }
    public function addr(): __fsblkcnt64_t_ptr { return new __fsblkcnt64_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__fsblkcnt64_t'; }
}
class __fsblkcnt64_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__fsblkcnt64_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __fsblkcnt64_t_ptr_ptr { return new __fsblkcnt64_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __fsblkcnt64_t { return new __fsblkcnt64_t($this->data[$n]); }
    public static function getType(): string { return '__fsblkcnt64_t*'; }
}
class __fsblkcnt64_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__fsblkcnt64_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __fsblkcnt64_t_ptr_ptr_ptr { return new __fsblkcnt64_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __fsblkcnt64_t_ptr { return new __fsblkcnt64_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__fsblkcnt64_t**'; }
}
class __fsblkcnt64_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__fsblkcnt64_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __fsblkcnt64_t_ptr_ptr_ptr_ptr { return new __fsblkcnt64_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __fsblkcnt64_t_ptr_ptr { return new __fsblkcnt64_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__fsblkcnt64_t***'; }
}
class __fsblkcnt64_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__fsblkcnt64_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __fsblkcnt64_t_ptr_ptr_ptr_ptr_ptr { return new __fsblkcnt64_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __fsblkcnt64_t_ptr_ptr_ptr { return new __fsblkcnt64_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__fsblkcnt64_t****'; }
}
class __fsfilcnt_t implements ilibjit {
    private FFI\CData $data;
    public function __construct($data) { $tmp = FFI::new('unsigned long int'); $tmp = $data; $this->data = $tmp; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__fsfilcnt_t $other): bool { return $this->data == $other->data; }
    public function addr(): __fsfilcnt_t_ptr { return new __fsfilcnt_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__fsfilcnt_t'; }
}
class __fsfilcnt_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__fsfilcnt_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __fsfilcnt_t_ptr_ptr { return new __fsfilcnt_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __fsfilcnt_t { return new __fsfilcnt_t($this->data[$n]); }
    public static function getType(): string { return '__fsfilcnt_t*'; }
}
class __fsfilcnt_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__fsfilcnt_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __fsfilcnt_t_ptr_ptr_ptr { return new __fsfilcnt_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __fsfilcnt_t_ptr { return new __fsfilcnt_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__fsfilcnt_t**'; }
}
class __fsfilcnt_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__fsfilcnt_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __fsfilcnt_t_ptr_ptr_ptr_ptr { return new __fsfilcnt_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __fsfilcnt_t_ptr_ptr { return new __fsfilcnt_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__fsfilcnt_t***'; }
}
class __fsfilcnt_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__fsfilcnt_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __fsfilcnt_t_ptr_ptr_ptr_ptr_ptr { return new __fsfilcnt_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __fsfilcnt_t_ptr_ptr_ptr { return new __fsfilcnt_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__fsfilcnt_t****'; }
}
class __fsfilcnt64_t implements ilibjit {
    private FFI\CData $data;
    public function __construct($data) { $tmp = FFI::new('unsigned long int'); $tmp = $data; $this->data = $tmp; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__fsfilcnt64_t $other): bool { return $this->data == $other->data; }
    public function addr(): __fsfilcnt64_t_ptr { return new __fsfilcnt64_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__fsfilcnt64_t'; }
}
class __fsfilcnt64_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__fsfilcnt64_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __fsfilcnt64_t_ptr_ptr { return new __fsfilcnt64_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __fsfilcnt64_t { return new __fsfilcnt64_t($this->data[$n]); }
    public static function getType(): string { return '__fsfilcnt64_t*'; }
}
class __fsfilcnt64_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__fsfilcnt64_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __fsfilcnt64_t_ptr_ptr_ptr { return new __fsfilcnt64_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __fsfilcnt64_t_ptr { return new __fsfilcnt64_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__fsfilcnt64_t**'; }
}
class __fsfilcnt64_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__fsfilcnt64_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __fsfilcnt64_t_ptr_ptr_ptr_ptr { return new __fsfilcnt64_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __fsfilcnt64_t_ptr_ptr { return new __fsfilcnt64_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__fsfilcnt64_t***'; }
}
class __fsfilcnt64_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__fsfilcnt64_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __fsfilcnt64_t_ptr_ptr_ptr_ptr_ptr { return new __fsfilcnt64_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __fsfilcnt64_t_ptr_ptr_ptr { return new __fsfilcnt64_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__fsfilcnt64_t****'; }
}
class __fsword_t implements ilibjit {
    private FFI\CData $data;
    public function __construct($data) { $tmp = FFI::new('long int'); $tmp = $data; $this->data = $tmp; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__fsword_t $other): bool { return $this->data == $other->data; }
    public function addr(): __fsword_t_ptr { return new __fsword_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__fsword_t'; }
}
class __fsword_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__fsword_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __fsword_t_ptr_ptr { return new __fsword_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __fsword_t { return new __fsword_t($this->data[$n]); }
    public static function getType(): string { return '__fsword_t*'; }
}
class __fsword_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__fsword_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __fsword_t_ptr_ptr_ptr { return new __fsword_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __fsword_t_ptr { return new __fsword_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__fsword_t**'; }
}
class __fsword_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__fsword_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __fsword_t_ptr_ptr_ptr_ptr { return new __fsword_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __fsword_t_ptr_ptr { return new __fsword_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__fsword_t***'; }
}
class __fsword_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__fsword_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __fsword_t_ptr_ptr_ptr_ptr_ptr { return new __fsword_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __fsword_t_ptr_ptr_ptr { return new __fsword_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__fsword_t****'; }
}
class __ssize_t implements ilibjit {
    private FFI\CData $data;
    public function __construct($data) { $tmp = FFI::new('long int'); $tmp = $data; $this->data = $tmp; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__ssize_t $other): bool { return $this->data == $other->data; }
    public function addr(): __ssize_t_ptr { return new __ssize_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__ssize_t'; }
}
class __ssize_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__ssize_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __ssize_t_ptr_ptr { return new __ssize_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __ssize_t { return new __ssize_t($this->data[$n]); }
    public static function getType(): string { return '__ssize_t*'; }
}
class __ssize_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__ssize_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __ssize_t_ptr_ptr_ptr { return new __ssize_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __ssize_t_ptr { return new __ssize_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__ssize_t**'; }
}
class __ssize_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__ssize_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __ssize_t_ptr_ptr_ptr_ptr { return new __ssize_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __ssize_t_ptr_ptr { return new __ssize_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__ssize_t***'; }
}
class __ssize_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__ssize_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __ssize_t_ptr_ptr_ptr_ptr_ptr { return new __ssize_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __ssize_t_ptr_ptr_ptr { return new __ssize_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__ssize_t****'; }
}
class __syscall_slong_t implements ilibjit {
    private FFI\CData $data;
    public function __construct($data) { $tmp = FFI::new('long int'); $tmp = $data; $this->data = $tmp; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__syscall_slong_t $other): bool { return $this->data == $other->data; }
    public function addr(): __syscall_slong_t_ptr { return new __syscall_slong_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__syscall_slong_t'; }
}
class __syscall_slong_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__syscall_slong_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __syscall_slong_t_ptr_ptr { return new __syscall_slong_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __syscall_slong_t { return new __syscall_slong_t($this->data[$n]); }
    public static function getType(): string { return '__syscall_slong_t*'; }
}
class __syscall_slong_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__syscall_slong_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __syscall_slong_t_ptr_ptr_ptr { return new __syscall_slong_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __syscall_slong_t_ptr { return new __syscall_slong_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__syscall_slong_t**'; }
}
class __syscall_slong_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__syscall_slong_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __syscall_slong_t_ptr_ptr_ptr_ptr { return new __syscall_slong_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __syscall_slong_t_ptr_ptr { return new __syscall_slong_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__syscall_slong_t***'; }
}
class __syscall_slong_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__syscall_slong_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __syscall_slong_t_ptr_ptr_ptr_ptr_ptr { return new __syscall_slong_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __syscall_slong_t_ptr_ptr_ptr { return new __syscall_slong_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__syscall_slong_t****'; }
}
class __syscall_ulong_t implements ilibjit {
    private FFI\CData $data;
    public function __construct($data) { $tmp = FFI::new('unsigned long int'); $tmp = $data; $this->data = $tmp; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__syscall_ulong_t $other): bool { return $this->data == $other->data; }
    public function addr(): __syscall_ulong_t_ptr { return new __syscall_ulong_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__syscall_ulong_t'; }
}
class __syscall_ulong_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__syscall_ulong_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __syscall_ulong_t_ptr_ptr { return new __syscall_ulong_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __syscall_ulong_t { return new __syscall_ulong_t($this->data[$n]); }
    public static function getType(): string { return '__syscall_ulong_t*'; }
}
class __syscall_ulong_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__syscall_ulong_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __syscall_ulong_t_ptr_ptr_ptr { return new __syscall_ulong_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __syscall_ulong_t_ptr { return new __syscall_ulong_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__syscall_ulong_t**'; }
}
class __syscall_ulong_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__syscall_ulong_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __syscall_ulong_t_ptr_ptr_ptr_ptr { return new __syscall_ulong_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __syscall_ulong_t_ptr_ptr { return new __syscall_ulong_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__syscall_ulong_t***'; }
}
class __syscall_ulong_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__syscall_ulong_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __syscall_ulong_t_ptr_ptr_ptr_ptr_ptr { return new __syscall_ulong_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __syscall_ulong_t_ptr_ptr_ptr { return new __syscall_ulong_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__syscall_ulong_t****'; }
}
class __loff_t implements ilibjit {
    private FFI\CData $data;
    public function __construct($data) { $tmp = FFI::new('long int'); $tmp = $data; $this->data = $tmp; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__loff_t $other): bool { return $this->data == $other->data; }
    public function addr(): __loff_t_ptr { return new __loff_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__loff_t'; }
}
class __loff_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__loff_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __loff_t_ptr_ptr { return new __loff_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __loff_t { return new __loff_t($this->data[$n]); }
    public static function getType(): string { return '__loff_t*'; }
}
class __loff_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__loff_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __loff_t_ptr_ptr_ptr { return new __loff_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __loff_t_ptr { return new __loff_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__loff_t**'; }
}
class __loff_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__loff_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __loff_t_ptr_ptr_ptr_ptr { return new __loff_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __loff_t_ptr_ptr { return new __loff_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__loff_t***'; }
}
class __loff_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__loff_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __loff_t_ptr_ptr_ptr_ptr_ptr { return new __loff_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __loff_t_ptr_ptr_ptr { return new __loff_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__loff_t****'; }
}
class __qaddr_t implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__qaddr_t $other): bool { return $this->data == $other->data; }
    public function addr(): __qaddr_t_ptr { return new __qaddr_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__qaddr_t'; }
}
class __qaddr_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__qaddr_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __qaddr_t_ptr_ptr { return new __qaddr_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __qaddr_t { return new __qaddr_t($this->data[$n]); }
    public static function getType(): string { return '__qaddr_t*'; }
}
class __qaddr_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__qaddr_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __qaddr_t_ptr_ptr_ptr { return new __qaddr_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __qaddr_t_ptr { return new __qaddr_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__qaddr_t**'; }
}
class __qaddr_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__qaddr_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __qaddr_t_ptr_ptr_ptr_ptr { return new __qaddr_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __qaddr_t_ptr_ptr { return new __qaddr_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__qaddr_t***'; }
}
class __qaddr_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__qaddr_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __qaddr_t_ptr_ptr_ptr_ptr_ptr { return new __qaddr_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __qaddr_t_ptr_ptr_ptr { return new __qaddr_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__qaddr_t****'; }
}
class __caddr_t implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__caddr_t $other): bool { return $this->data == $other->data; }
    public function addr(): __caddr_t_ptr { return new __caddr_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__caddr_t'; }
}
class __caddr_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__caddr_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __caddr_t_ptr_ptr { return new __caddr_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __caddr_t { return new __caddr_t($this->data[$n]); }
    public static function getType(): string { return '__caddr_t*'; }
}
class __caddr_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__caddr_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __caddr_t_ptr_ptr_ptr { return new __caddr_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __caddr_t_ptr { return new __caddr_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__caddr_t**'; }
}
class __caddr_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__caddr_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __caddr_t_ptr_ptr_ptr_ptr { return new __caddr_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __caddr_t_ptr_ptr { return new __caddr_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__caddr_t***'; }
}
class __caddr_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__caddr_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __caddr_t_ptr_ptr_ptr_ptr_ptr { return new __caddr_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __caddr_t_ptr_ptr_ptr { return new __caddr_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__caddr_t****'; }
}
class __intptr_t implements ilibjit {
    private FFI\CData $data;
    public function __construct($data) { $tmp = FFI::new('long int'); $tmp = $data; $this->data = $tmp; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__intptr_t $other): bool { return $this->data == $other->data; }
    public function addr(): __intptr_t_ptr { return new __intptr_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__intptr_t'; }
}
class __intptr_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__intptr_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __intptr_t_ptr_ptr { return new __intptr_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __intptr_t { return new __intptr_t($this->data[$n]); }
    public static function getType(): string { return '__intptr_t*'; }
}
class __intptr_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__intptr_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __intptr_t_ptr_ptr_ptr { return new __intptr_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __intptr_t_ptr { return new __intptr_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__intptr_t**'; }
}
class __intptr_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__intptr_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __intptr_t_ptr_ptr_ptr_ptr { return new __intptr_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __intptr_t_ptr_ptr { return new __intptr_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__intptr_t***'; }
}
class __intptr_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__intptr_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __intptr_t_ptr_ptr_ptr_ptr_ptr { return new __intptr_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __intptr_t_ptr_ptr_ptr { return new __intptr_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__intptr_t****'; }
}
class __socklen_t implements ilibjit {
    private FFI\CData $data;
    public function __construct($data) { $tmp = FFI::new('unsigned int'); $tmp = $data; $this->data = $tmp; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__socklen_t $other): bool { return $this->data == $other->data; }
    public function addr(): __socklen_t_ptr { return new __socklen_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__socklen_t'; }
}
class __socklen_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__socklen_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __socklen_t_ptr_ptr { return new __socklen_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __socklen_t { return new __socklen_t($this->data[$n]); }
    public static function getType(): string { return '__socklen_t*'; }
}
class __socklen_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__socklen_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __socklen_t_ptr_ptr_ptr { return new __socklen_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __socklen_t_ptr { return new __socklen_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__socklen_t**'; }
}
class __socklen_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__socklen_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __socklen_t_ptr_ptr_ptr_ptr { return new __socklen_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __socklen_t_ptr_ptr { return new __socklen_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__socklen_t***'; }
}
class __socklen_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__socklen_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __socklen_t_ptr_ptr_ptr_ptr_ptr { return new __socklen_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __socklen_t_ptr_ptr_ptr { return new __socklen_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__socklen_t****'; }
}
class FILE implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(FILE $other): bool { return $this->data == $other->data; }
    public function addr(): FILE_ptr { return new FILE_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'FILE'; }
}
class FILE_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(FILE_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): FILE_ptr_ptr { return new FILE_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): FILE { return new FILE($this->data[$n]); }
    public static function getType(): string { return 'FILE*'; }
}
class FILE_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(FILE_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): FILE_ptr_ptr_ptr { return new FILE_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): FILE_ptr { return new FILE_ptr($this->data[$n]); }
    public static function getType(): string { return 'FILE**'; }
}
class FILE_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(FILE_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): FILE_ptr_ptr_ptr_ptr { return new FILE_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): FILE_ptr_ptr { return new FILE_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'FILE***'; }
}
class FILE_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(FILE_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): FILE_ptr_ptr_ptr_ptr_ptr { return new FILE_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): FILE_ptr_ptr_ptr { return new FILE_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'FILE****'; }
}
class __FILE implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__FILE $other): bool { return $this->data == $other->data; }
    public function addr(): __FILE_ptr { return new __FILE_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__FILE'; }
}
class __FILE_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__FILE_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __FILE_ptr_ptr { return new __FILE_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __FILE { return new __FILE($this->data[$n]); }
    public static function getType(): string { return '__FILE*'; }
}
class __FILE_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__FILE_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __FILE_ptr_ptr_ptr { return new __FILE_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __FILE_ptr { return new __FILE_ptr($this->data[$n]); }
    public static function getType(): string { return '__FILE**'; }
}
class __FILE_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__FILE_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __FILE_ptr_ptr_ptr_ptr { return new __FILE_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __FILE_ptr_ptr { return new __FILE_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__FILE***'; }
}
class __FILE_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__FILE_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __FILE_ptr_ptr_ptr_ptr_ptr { return new __FILE_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __FILE_ptr_ptr_ptr { return new __FILE_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__FILE****'; }
}
class wint_t implements ilibjit {
    private FFI\CData $data;
    public function __construct($data) { $tmp = FFI::new('unsigned int'); $tmp = $data; $this->data = $tmp; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(wint_t $other): bool { return $this->data == $other->data; }
    public function addr(): wint_t_ptr { return new wint_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'wint_t'; }
}
class wint_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(wint_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): wint_t_ptr_ptr { return new wint_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): wint_t { return new wint_t($this->data[$n]); }
    public static function getType(): string { return 'wint_t*'; }
}
class wint_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(wint_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): wint_t_ptr_ptr_ptr { return new wint_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): wint_t_ptr { return new wint_t_ptr($this->data[$n]); }
    public static function getType(): string { return 'wint_t**'; }
}
class wint_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(wint_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): wint_t_ptr_ptr_ptr_ptr { return new wint_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): wint_t_ptr_ptr { return new wint_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'wint_t***'; }
}
class wint_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(wint_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): wint_t_ptr_ptr_ptr_ptr_ptr { return new wint_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): wint_t_ptr_ptr_ptr { return new wint_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'wint_t****'; }
}
class __mbstate_t implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__mbstate_t $other): bool { return $this->data == $other->data; }
    public function addr(): __mbstate_t_ptr { return new __mbstate_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__mbstate_t'; }
}
class __mbstate_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__mbstate_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __mbstate_t_ptr_ptr { return new __mbstate_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __mbstate_t { return new __mbstate_t($this->data[$n]); }
    public static function getType(): string { return '__mbstate_t*'; }
}
class __mbstate_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__mbstate_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __mbstate_t_ptr_ptr_ptr { return new __mbstate_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __mbstate_t_ptr { return new __mbstate_t_ptr($this->data[$n]); }
    public static function getType(): string { return '__mbstate_t**'; }
}
class __mbstate_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__mbstate_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __mbstate_t_ptr_ptr_ptr_ptr { return new __mbstate_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __mbstate_t_ptr_ptr { return new __mbstate_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__mbstate_t***'; }
}
class __mbstate_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__mbstate_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __mbstate_t_ptr_ptr_ptr_ptr_ptr { return new __mbstate_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __mbstate_t_ptr_ptr_ptr { return new __mbstate_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__mbstate_t****'; }
}
class _G_fpos_t implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(_G_fpos_t $other): bool { return $this->data == $other->data; }
    public function addr(): _G_fpos_t_ptr { return new _G_fpos_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '_G_fpos_t'; }
}
class _G_fpos_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(_G_fpos_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): _G_fpos_t_ptr_ptr { return new _G_fpos_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): _G_fpos_t { return new _G_fpos_t($this->data[$n]); }
    public static function getType(): string { return '_G_fpos_t*'; }
}
class _G_fpos_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(_G_fpos_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): _G_fpos_t_ptr_ptr_ptr { return new _G_fpos_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): _G_fpos_t_ptr { return new _G_fpos_t_ptr($this->data[$n]); }
    public static function getType(): string { return '_G_fpos_t**'; }
}
class _G_fpos_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(_G_fpos_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): _G_fpos_t_ptr_ptr_ptr_ptr { return new _G_fpos_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): _G_fpos_t_ptr_ptr { return new _G_fpos_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '_G_fpos_t***'; }
}
class _G_fpos_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(_G_fpos_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): _G_fpos_t_ptr_ptr_ptr_ptr_ptr { return new _G_fpos_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): _G_fpos_t_ptr_ptr_ptr { return new _G_fpos_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '_G_fpos_t****'; }
}
class _G_fpos64_t implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(_G_fpos64_t $other): bool { return $this->data == $other->data; }
    public function addr(): _G_fpos64_t_ptr { return new _G_fpos64_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '_G_fpos64_t'; }
}
class _G_fpos64_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(_G_fpos64_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): _G_fpos64_t_ptr_ptr { return new _G_fpos64_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): _G_fpos64_t { return new _G_fpos64_t($this->data[$n]); }
    public static function getType(): string { return '_G_fpos64_t*'; }
}
class _G_fpos64_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(_G_fpos64_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): _G_fpos64_t_ptr_ptr_ptr { return new _G_fpos64_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): _G_fpos64_t_ptr { return new _G_fpos64_t_ptr($this->data[$n]); }
    public static function getType(): string { return '_G_fpos64_t**'; }
}
class _G_fpos64_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(_G_fpos64_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): _G_fpos64_t_ptr_ptr_ptr_ptr { return new _G_fpos64_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): _G_fpos64_t_ptr_ptr { return new _G_fpos64_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '_G_fpos64_t***'; }
}
class _G_fpos64_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(_G_fpos64_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): _G_fpos64_t_ptr_ptr_ptr_ptr_ptr { return new _G_fpos64_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): _G_fpos64_t_ptr_ptr_ptr { return new _G_fpos64_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '_G_fpos64_t****'; }
}
class _IO_lock_t implements ilibjit {
    private FFI\CData $data;
    public function __construct($data) { $tmp = FFI::new('void'); $tmp = $data; $this->data = $tmp; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(_IO_lock_t $other): bool { return $this->data == $other->data; }
    public function addr(): _IO_lock_t_ptr { return new _IO_lock_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '_IO_lock_t'; }
}
class _IO_lock_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(_IO_lock_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): _IO_lock_t_ptr_ptr { return new _IO_lock_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): _IO_lock_t { return new _IO_lock_t($this->data[$n]); }
    public static function getType(): string { return '_IO_lock_t*'; }
}
class _IO_lock_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(_IO_lock_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): _IO_lock_t_ptr_ptr_ptr { return new _IO_lock_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): _IO_lock_t_ptr { return new _IO_lock_t_ptr($this->data[$n]); }
    public static function getType(): string { return '_IO_lock_t**'; }
}
class _IO_lock_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(_IO_lock_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): _IO_lock_t_ptr_ptr_ptr_ptr { return new _IO_lock_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): _IO_lock_t_ptr_ptr { return new _IO_lock_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '_IO_lock_t***'; }
}
class _IO_lock_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(_IO_lock_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): _IO_lock_t_ptr_ptr_ptr_ptr_ptr { return new _IO_lock_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): _IO_lock_t_ptr_ptr_ptr { return new _IO_lock_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '_IO_lock_t****'; }
}
class _IO_FILE implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(_IO_FILE $other): bool { return $this->data == $other->data; }
    public function addr(): _IO_FILE_ptr { return new _IO_FILE_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '_IO_FILE'; }
}
class _IO_FILE_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(_IO_FILE_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): _IO_FILE_ptr_ptr { return new _IO_FILE_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): _IO_FILE { return new _IO_FILE($this->data[$n]); }
    public static function getType(): string { return '_IO_FILE*'; }
}
class _IO_FILE_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(_IO_FILE_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): _IO_FILE_ptr_ptr_ptr { return new _IO_FILE_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): _IO_FILE_ptr { return new _IO_FILE_ptr($this->data[$n]); }
    public static function getType(): string { return '_IO_FILE**'; }
}
class _IO_FILE_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(_IO_FILE_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): _IO_FILE_ptr_ptr_ptr_ptr { return new _IO_FILE_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): _IO_FILE_ptr_ptr { return new _IO_FILE_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '_IO_FILE***'; }
}
class _IO_FILE_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(_IO_FILE_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): _IO_FILE_ptr_ptr_ptr_ptr_ptr { return new _IO_FILE_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): _IO_FILE_ptr_ptr_ptr { return new _IO_FILE_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '_IO_FILE****'; }
}
class __io_read_fn implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__io_read_fn $other): bool { return $this->data == $other->data; }
    public function addr(): __io_read_fn_ptr { return new __io_read_fn_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__io_read_fn'; }
}
class __io_read_fn_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__io_read_fn_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __io_read_fn_ptr_ptr { return new __io_read_fn_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __io_read_fn { return new __io_read_fn($this->data[$n]); }
    public static function getType(): string { return '__io_read_fn*'; }
}
class __io_read_fn_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__io_read_fn_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __io_read_fn_ptr_ptr_ptr { return new __io_read_fn_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __io_read_fn_ptr { return new __io_read_fn_ptr($this->data[$n]); }
    public static function getType(): string { return '__io_read_fn**'; }
}
class __io_read_fn_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__io_read_fn_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __io_read_fn_ptr_ptr_ptr_ptr { return new __io_read_fn_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __io_read_fn_ptr_ptr { return new __io_read_fn_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__io_read_fn***'; }
}
class __io_read_fn_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__io_read_fn_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __io_read_fn_ptr_ptr_ptr_ptr_ptr { return new __io_read_fn_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __io_read_fn_ptr_ptr_ptr { return new __io_read_fn_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__io_read_fn****'; }
}
class __io_write_fn implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__io_write_fn $other): bool { return $this->data == $other->data; }
    public function addr(): __io_write_fn_ptr { return new __io_write_fn_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__io_write_fn'; }
}
class __io_write_fn_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__io_write_fn_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __io_write_fn_ptr_ptr { return new __io_write_fn_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __io_write_fn { return new __io_write_fn($this->data[$n]); }
    public static function getType(): string { return '__io_write_fn*'; }
}
class __io_write_fn_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__io_write_fn_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __io_write_fn_ptr_ptr_ptr { return new __io_write_fn_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __io_write_fn_ptr { return new __io_write_fn_ptr($this->data[$n]); }
    public static function getType(): string { return '__io_write_fn**'; }
}
class __io_write_fn_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__io_write_fn_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __io_write_fn_ptr_ptr_ptr_ptr { return new __io_write_fn_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __io_write_fn_ptr_ptr { return new __io_write_fn_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__io_write_fn***'; }
}
class __io_write_fn_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__io_write_fn_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __io_write_fn_ptr_ptr_ptr_ptr_ptr { return new __io_write_fn_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __io_write_fn_ptr_ptr_ptr { return new __io_write_fn_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__io_write_fn****'; }
}
class __io_seek_fn implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__io_seek_fn $other): bool { return $this->data == $other->data; }
    public function addr(): __io_seek_fn_ptr { return new __io_seek_fn_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__io_seek_fn'; }
}
class __io_seek_fn_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__io_seek_fn_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __io_seek_fn_ptr_ptr { return new __io_seek_fn_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __io_seek_fn { return new __io_seek_fn($this->data[$n]); }
    public static function getType(): string { return '__io_seek_fn*'; }
}
class __io_seek_fn_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__io_seek_fn_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __io_seek_fn_ptr_ptr_ptr { return new __io_seek_fn_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __io_seek_fn_ptr { return new __io_seek_fn_ptr($this->data[$n]); }
    public static function getType(): string { return '__io_seek_fn**'; }
}
class __io_seek_fn_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__io_seek_fn_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __io_seek_fn_ptr_ptr_ptr_ptr { return new __io_seek_fn_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __io_seek_fn_ptr_ptr { return new __io_seek_fn_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__io_seek_fn***'; }
}
class __io_seek_fn_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__io_seek_fn_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __io_seek_fn_ptr_ptr_ptr_ptr_ptr { return new __io_seek_fn_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __io_seek_fn_ptr_ptr_ptr { return new __io_seek_fn_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__io_seek_fn****'; }
}
class __io_close_fn implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__io_close_fn $other): bool { return $this->data == $other->data; }
    public function addr(): __io_close_fn_ptr { return new __io_close_fn_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return '__io_close_fn'; }
}
class __io_close_fn_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__io_close_fn_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __io_close_fn_ptr_ptr { return new __io_close_fn_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __io_close_fn { return new __io_close_fn($this->data[$n]); }
    public static function getType(): string { return '__io_close_fn*'; }
}
class __io_close_fn_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__io_close_fn_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __io_close_fn_ptr_ptr_ptr { return new __io_close_fn_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __io_close_fn_ptr { return new __io_close_fn_ptr($this->data[$n]); }
    public static function getType(): string { return '__io_close_fn**'; }
}
class __io_close_fn_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__io_close_fn_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __io_close_fn_ptr_ptr_ptr_ptr { return new __io_close_fn_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __io_close_fn_ptr_ptr { return new __io_close_fn_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__io_close_fn***'; }
}
class __io_close_fn_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(__io_close_fn_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): __io_close_fn_ptr_ptr_ptr_ptr_ptr { return new __io_close_fn_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): __io_close_fn_ptr_ptr_ptr { return new __io_close_fn_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return '__io_close_fn****'; }
}
class fpos_t implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(fpos_t $other): bool { return $this->data == $other->data; }
    public function addr(): fpos_t_ptr { return new fpos_t_ptr(FFI::addr($this->data)); }
    public static function getType(): string { return 'fpos_t'; }
}
class fpos_t_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(fpos_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): fpos_t_ptr_ptr { return new fpos_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): fpos_t { return new fpos_t($this->data[$n]); }
    public static function getType(): string { return 'fpos_t*'; }
}
class fpos_t_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(fpos_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): fpos_t_ptr_ptr_ptr { return new fpos_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): fpos_t_ptr { return new fpos_t_ptr($this->data[$n]); }
    public static function getType(): string { return 'fpos_t**'; }
}
class fpos_t_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(fpos_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): fpos_t_ptr_ptr_ptr_ptr { return new fpos_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): fpos_t_ptr_ptr { return new fpos_t_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'fpos_t***'; }
}
class fpos_t_ptr_ptr_ptr_ptr implements ilibjit {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(fpos_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): fpos_t_ptr_ptr_ptr_ptr_ptr { return new fpos_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): fpos_t_ptr_ptr_ptr { return new fpos_t_ptr_ptr_ptr($this->data[$n]); }
    public static function getType(): string { return 'fpos_t****'; }
}