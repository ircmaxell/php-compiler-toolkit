<?php declare(strict_types=1);
namespace PHPCompilerToolkit;

use SplObjectStorage;

class Printer {

    const PRINT_MODE_NORMAL      = 0b00001;
    const PRINT_MODE_FULL        = 0b00010;
    const PRINT_MODE_ALWAYS_FULL = 0b00110;

    public function print(Context $context): string {
        $results = [];
        foreach ($context->types as $type) {
            $text = $this->printType($type, self::PRINT_MODE_FULL);
            if (!empty($text)) {
                $results[] = $text;
            }
        }
        $constantMap = new SplObjectStorage;
        foreach ($context->constants as $constant) {
            $constantMap[$constant] = '(' . $this->printType($constant->type) . ') ' . $constant->value;
        }
        foreach ($context->imports as $import) {
            $results[] = "external " . $this->printFunctionDeclaration($import, new SplObjectStorage, 0) . ';';
        }
        $results[] = '';
        foreach ($context->functions as $function) {
            $results[] = $this->printFunction($function, $constantMap);
        }
        return implode("\n", $results);
    }

    public function printFunctionDeclaration(IR\Function_ $function, SplObjectStorage $scope, int $constantOffset) {
        $return = $this->printType($function->returnType) . ' ' . $function->name . '(';
        $params = []; 
        foreach ($function->parameters as $param) {
            if ($function instanceof IR\Function_\Implemented) {
                $scope[$param->value] = '$' . (count($scope) - $constantOffset);
                $params[] = $this->printType($param->type) . ' ' . $scope[$param->value] . "<{$param->name}>";
            } else {
                $params[] = $this->printType($param->type) . ' ' . $param->name;
            }
        }
        if ($function->isVariadic) {
            $params[] = "...";
        }
        $return .= implode(', ', $params) . ")";
        return $return;
    }

    public function printFunction(IR\Function_ $function, SplObjectStorage $constantMap): string {
        $scope = new SplObjectStorage;
        foreach ($constantMap as $constant) {
            $scope[$constant] = $constantMap[$constant];
        }
        $constantOffset = count($constantMap);
        $return = $this->printFunctionDeclaration($function, $scope, $constantOffset) . " {\n";

        foreach ($function->locals as $local) {
            $scope[$local] = '$' . (count($scope) - $constantOffset);

            $return .= '    ' . $this->printType($local->type) . ' ' . $scope[$local] . '<' . $local->name . ">;\n";
        }
        $return .= "\n";
        foreach ($function->blocks as $block) {
            $return .= '    ' . $block->name . '(';
            $args = [];
            foreach ($block->arguments as $argument) {
                $scope[$argument] = '#' . (count($scope) - $constantOffset);
                $args[] = $scope[$argument];
            }
            $return .= implode(', ', $args) . "):\n";
            foreach ($block->ops as $op) {
                if ($op instanceof IR\TerminalOp) {
                    if ($op instanceof IR\Op\ReturnVoid) {
                        $return .= "        Return;\n";
                    } elseif ($op instanceof IR\Op\ReturnValue) {
                        $return .= '        ReturnValue ' . $scope[$op->value] . ";\n";
                    } elseif ($op instanceof IR\Op\BlockCall) {
                        $return .= '        ' . $this->printBlockCall($op);
                    } elseif ($op instanceof IR\Op\ConditionalBlockCall) {
                        $return .= '        IF (' . $scope[$op->cond] . "):\n";
                        $return .= '            ' . $this->printBlockCall($op->ifTrue, $scope);
                        $return .= "        ELSE:\n";
                        $return .= '            ' . $this->printBlockCall($op->ifFalse, $scope);
                    } else {
                        throw new \LogicException("Unknown terminal op found: " . get_class($op));
                    }
                } elseif ($op instanceof IR\Op\FieldRead) {
                    $scope[$op->return] = '#' . (count($scope) - $constantOffset);
                    $return .= '        ' . $scope[$op->return] . ' = ' . $scope[$op->struct] . '.' . $op->field->name . ";\n";
                } elseif ($op instanceof IR\Op\FieldWrite) {
                    $return .= '        ' . $scope[$op->struct] . '.' . $op->field->name . ' = ' . $scope[$op->value] . ";\n";
                } else {
                    $tmp = $op->getResult();
                    if ($tmp) {
                        $scope[$tmp] = '#' . (count($scope) - $constantOffset);
                        $return .= '        ' . $scope[$tmp] . ' = '; 
                    } else {
                        $return .= '        ';
                    }
                    $return .= $op->getShortName() . "(";
                    $args = [];
                    if ($op instanceof IR\Op\Call) {
                        $args[] = $op->function->name;
                    } elseif ($op instanceof IR\Op\CallNoReturn) {
                        $args[] = $op->function->name;
                    }
                    foreach ($op->getArguments() as $idx => $argument) {
                        $args[] = $scope[$argument];
                    }
                    $return .= implode(', ', $args) . ");\n";
                }
            }
            $return .= "\n";
        }
        return $return . "}\n";
    }

    protected function printBlockCall(IR\Op\BlockCall $op, SplObjectStorage $scope): string {
        $return = 'jump ' . $op->block->name . '(';
        $args = [];
        foreach ($op->arguments as $arg) {
            $args[] = $scope[$arg];
        }
        $return .= implode(', ', $args) . ");\n";
        return $return;
    }

    public function printType(Type $type, int $mode = self::PRINT_MODE_NORMAL): string {
        if ($mode & self::PRINT_MODE_FULL) {
            if ($type instanceof Type\Struct) {
                $return = "struct {$type->name} {\n";
                foreach ($type->fields as $field) {
                    $return .= "  " . $this->printType($field->type, self::PRINT_MODE_ALWAYS_FULL) . " {$field->name};\n";
                }
                return $return . "}";
            }
        }
        if ($mode === self::PRINT_MODE_FULL) {
            // skip 
            return '';
        }
        if ($type instanceof Type\Primitive) {
            return $type->asCString();
        } elseif ($type instanceof Type\Const_) {
            return 'const ' . $this->printType($type->parent, $mode);
        } elseif ($type instanceof Type\Pointer) {
            return '(' . $this->printType($type->parent, $mode) . ')*';
        } elseif ($type instanceof Type\Volatile) {
            return 'volatile ' . $this->printType($type->parent, $mode);
        } elseif ($type instanceof Type\Struct) {
            return 'struct ' . $type->name;
        } elseif ($type instanceof Type\ArrayType) {
            return '(' . $this->printType($type->parent, $mode) . ')[' . $type->numElements . ']';
        }
    }

}