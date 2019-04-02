<?php
declare(strict_types=1);

namespace PHPCompilerToolkit\Backend;

use SplObjectStorage;

use PHPCompilerToolkit\BackendAbstract;
use PHPCompilerToolkit\Context;
use PHPCompilerToolkit\CompiledUnit;
use PHPCompilerToolkit\IR\Block;
use PHPCompilerToolkit\IR\Function_;
use PHPCompilerToolkit\IR\Op;
use PHPCompilerToolkit\IR\Parameter;
use PHPCompilerToolkit\IR\Value;
use PHPCompilerToolkit\IR\Value\Constant;

use PHPCompilerToolkit\Type;



class PHP extends BackendAbstract {

    public gcc_jit_context_ptr $context;
    private SplObjectStorage $fieldMap;
    private SplObjectStorage $structMap;

    const PRIMITIVE_TYPE_MAP = [
        Type\Primitive::T_VOID => 'void',
        Type\Primitive::T_VOID_PTR => '',
        Type\Primitive::T_BOOL => 'bool',
        Type\Primitive::T_CHAR => 'int',
        Type\Primitive::T_SIGNED_CHAR => 'int',
        Type\Primitive::T_UNSIGNED_CHAR => 'int',
        Type\Primitive::T_SHORT => 'int',
        Type\Primitive::T_UNSIGNED_SHORT => 'int',
        Type\Primitive::T_INT => 'int',
        Type\Primitive::T_UNSIGNED_INT  => 'int',
        Type\Primitive::T_LONG  => 'int',
        Type\Primitive::T_UNSIGNED_LONG  => 'int',
        Type\Primitive::T_LONG_LONG  => 'int',
        Type\Primitive::T_UNSIGNED_LONG_LONG  => 'int',
        Type\Primitive::T_FLOAT  => 'float',
        Type\Primitive::T_DOUBLE  => 'float',
        Type\Primitive::T_LONG_DOUBLE  => 'float',
        Type\Primitive::T_SIZE_T  => 'int',
    ];

    public function __construct() {
    }

    private string $namespace;

    private string $code;

    protected function beforeCompile(Context $context, int $optimizationLevel): void {
        $this->parameterMap = [];
        $this->fieldMap = new SplObjectStorage;
        $this->structMap = new SplObjectStorage;
        $this->namespace = 'ct_' . mt_rand(0, 99999);
        $this->code = 'declare(strict_types=1); namespace ' . $this->namespace . ";\n";
    }

    protected function afterCompile(Context $context): void {
        unset($this->parameterMap);
        unset($this->fieldMap);
        unset($this->structMap);
        unset($this->namespace);
        unset($this->code);
    }

    protected function compileType(Type $type) {
        if ($type instanceof Type\Primitive) {
            return self::PRIMITIVE_TYPE_MAP[$type->kind];
        } elseif ($type instanceof Type\Struct) {
            $code = 'class ' . $type->name . " {\n";
            foreach ($type->fields as $field) {
                $code .= "    public {$this->typeMap[$field->type]} \${$field->name};\n";
            }
            $code .= "}\n";
            $this->code .= $code;
            return '\\' . $this->namespace . '\\' . $type->name;
        }
        throw new \LogicException("Not implemented type for gcc_jit: " . get_class($type));
    }

    protected function compileConstant(Constant $constant) {
        return $constant->value;
    }

    protected function importFunction(Function_ $function) {
        // noop
    }

    protected array $declaredFunctions = [];

    protected function declareFunction(Function_ $function) {
        // noop
        if ($function instanceof Function_\AlwaysInline) {
        } elseif ($function instanceof Function_\Static_) {
        } else {
            $this->declaredFunctions[$function->name] = $this->namespace . '\\' . $function->name;
        }
    }

    private SplObjectStorage $localMap;
    private SplObjectStorage $valueMap;
    private SplObjectStorage $blockMap;

    protected function compileFunction(Function_ $function, $func): void {
        $this->valueMap = new SplObjectStorage;
        $this->blockMap = new SplObjectStorage;
        $this->localMap = new SplObjectStorage;
        $code = 'function ' . $function->name . '(';
        foreach ($this->constantMap as $constant) {
            $this->valueMap[$constant] = $this->constantMap[$constant];
        }
        $params = [];
        foreach ($function->parameters as $index => $parameter) {
            $this->valueMap[$parameter->value] = '$p_' . $index;
            $params[] = $this->typeMap[$parameter->type] . ' ' . $this->valueMap[$parameter->value];
        }
        $code .= implode(', ', $params) . '): ' . $this->typeMap[$function->returnType] . " {\n";
        foreach ($function->locals as $local) {
            $this->localMap[$local] = '$l_' . count($this->localMap);
            $this->valueMap[$local] = $this->localMap[$local];
            if ($local->type instanceof Type\Struct) {
                $code .= "    {$this->localMap[$local]} = new {$this->typeMap[$local->type]};\n";
            }
        }
        foreach ($function->blocks as $block) {
            foreach ($block->arguments as $idx => $argument) {
                $this->localMap[$argument] = '$bs_' . count($this->localMap);
            }
        }
        foreach ($function->blocks as $block) {
            $code .= $this->compileBlock($block);
        }
        $code .= "}\n";
        $this->code .= $code;
        unset($this->localMap);
        unset($this->valueMap);
        unset($this->blockMap);
    }

    protected function compileBlock(Block $block): string {
        $code = $block->name . ":\n";
        foreach ($block->arguments as $argument) {
            $this->valueMap[$argument] = '$ba_' . count($this->valueMap);
            $code .= "    {$this->valueMap[$argument]} = {$this->localMap[$argument]};\n";
        }
        foreach ($block->ops as $op) {
            $code .= $this->compileOp($op);
        }
        return $code;
    }

    public function temp(Value $value): string {
        $this->valueMap[$value] = '$t_' . count($this->valueMap);
        return $this->valueMap[$value];
    }

    protected function compileOp(Op $op): string {
        if ($op instanceof Op\BinaryOp) {
            return $this->compileBinaryOp($op);
        } elseif ($op instanceof Op\ReturnVoid) {
            return "    return;\n";
        } elseif ($op instanceof Op\ReturnValue) {
            return "    return {$this->valueMap[$op->value]};\n";
        } elseif ($op instanceof Op\Call) {
            return "    " . $this->temp($op->return) . " = " . $this->doCall($op) . ";\n";
        } elseif ($op instanceof Op\CallNoReturn) {
            return "    " . $this->doCall($op) . ";\n";
        } elseif ($op instanceof Op\FieldRead) {
            return "    " . $this->temp($op->return) . " = {$this->valueMap[$op->struct]}->{$op->field->name};\n";
        } elseif ($op instanceof Op\FieldWrite) {
            if ($this->localMap->contains($op->struct)) {
                return "    {$this->localMap[$op->struct]}->{$op->field->name} = {$this->valueMap[$op->value]};\n";
            } else {
                throw new \LogicException("Cannot write to rvalue");
            }
        } elseif ($op instanceof Op\BlockCall) {
            return $this->compileBlockCall($op);
        } elseif ($op instanceof Op\ConditionalBlockCall) {
            return   "    if ({$this->valueMap[$op->cond]}) {\n"
                   . "        " . $this->compileBlockCall($op->ifTrue) . "\n"
                   . "    } else {\n"
                   . "        " . $this->compileBlockCall($op->ifFalse) . "\n"
                   . "    }\n";
        } else {
            throw new \LogicException("Unknown Op encountered: " . get_class($op));
        }
    }

    protected function doCall(Op $op): string {
        $params = [];
        foreach ($op->parameters as $parameter) {
            $params[] = $this->valueMap[$parameter];
        }
        return $op->function->name . '(' . implode(', ', $params) . ')';
    }

    protected function compileBlockCall(Op\BlockCall $op): string {
        $code = '';
        foreach ($op->block->arguments as $index => $argument) {
            $code .= "    {$this->localMap[$argument]} = {$this->valueMap[$op->arguments[$index]]};\n";
        }
        $code .= "    goto {$op->block->name};\n";
        return $code;
    }

    const BINARYOP_MAP = [
        Op\BinaryOp\Add::class => '+',
        Op\BinaryOp\BitwiseAnd::class => '&',
        Op\BinaryOp\BitwiseOr::class => '|',
        Op\BinaryOp\BitwiseXor::class => '^',
        Op\BinaryOp\Div::class => '/',
        Op\BinaryOp\LogicalAnd::class => '&&',
        Op\BinaryOp\LogicalOr::class => '||',
        Op\BinaryOp\Mod::class => '%',
        Op\BinaryOp\Mul::class => '*',
        Op\BinaryOp\SL::class => '<<',
        Op\BinaryOp\SR::class => '>>',
        Op\BinaryOp\Sub::class => '-',
    ];

    const COMPAREOP_MAP = [
        OP\BinaryOp\EQ::class => '===',
        OP\BinaryOp\GE::class => '>=',
        OP\BinaryOp\GT::class => '>',
        OP\BinaryOp\LE::class => '<=',
        OP\BinaryOp\LT::class => '<',
        OP\BinaryOp\NE::class => '!==',
    ];

    protected function compileBinaryOp(Op\BinaryOp $op): string {
        $class = get_class($op);
        if (isset(self::BINARYOP_MAP[$class])) {
            return "    " . $this->temp($op->result) . " = {$this->valueMap[$op->left]} " . self::BINARYOP_MAP[$class] . " {$this->valueMap[$op->right]};\n";
        } elseif (isset(self::COMPAREOP_MAP[$class])) {
            return "    " . $this->temp($op->result) . " = {$this->valueMap[$op->left]} " . self::COMPAREOP_MAP[$class] . " {$this->valueMap[$op->right]};\n";
        } else {
            throw new \LogicException("Unknown BinaryOp encountered: $class");
        }
    }

    protected function buildResult(): CompiledUnit {
        eval($this->code);
        return new PHP\CompiledUnit($this, $this->code, $this->declaredFunctions);
    }

}