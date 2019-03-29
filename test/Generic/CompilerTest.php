<?php declare(strict_types=1);

namespace PHPCompilerToolkit;

use PHPUnit\Framework\TestCase;

class GenericTest extends TestCase {

    /**
     * @dataProvider provideBackendAndTypes
     */
    public function testPrimitiveTypes(string $backendName, Compiler $compiler, string $typeName, int $type) {
        $type = $compiler->createPrimitiveType($type);
        $this->assertInstanceOf(Type::class, $type, "$backendName failed to provide a valid type for $typeName");
        $ptr = $type->getPointer();
        $this->assertInstanceOf(Type::class, $type, "$backendName failed to provide a valid type for $typeName*");
        $const = $type->getConst();
        $this->assertInstanceOf(Type::class, $type, "$backendName failed to provide a valid type for const $typeName");
        $volatile = $type->getVolatile();
        $this->assertInstanceOf(Type::class, $type, "$backendName failed to provide a valid type for volatile $typeName");
    }

    /**
     * @dataProvider provideBackends
     */
    public function testBasicFunctionDeclaration(string $backendName, Compiler $compiler) {
        $void = $compiler->createPrimitiveType(Type::T_VOID);
        $func = $compiler->createFunction('test', $void, false);
        $this->assertInstanceOf(Function_::class, $func);
        $this->assertEquals($void, $func->getReturnType());
        $this->assertEquals('test', $func->getName());
        $this->assertEquals([], $func->getParameters());
        $this->assertEquals(false, $func->isVariadic());
    }

    public static function provideBackendAndTypes(): \Generator {
        foreach (self::provideBackends() as $backend) {
            yield [$backend[0], $backend[1], 'void', Type::T_VOID];
            yield [$backend[0], $backend[1], 'void*', Type::T_VOID_PTR];
            yield [$backend[0], $backend[1], 'bool', Type::T_BOOL];
            yield [$backend[0], $backend[1], 'char', Type::T_CHAR];
            yield [$backend[0], $backend[1], 'signed char', Type::T_SIGNED_CHAR];
            yield [$backend[0], $backend[1], 'unsigned char', Type::T_UNSIGNED_CHAR];
            yield [$backend[0], $backend[1], 'short', Type::T_SHORT];
            yield [$backend[0], $backend[1], 'unsigned short', Type::T_UNSIGNED_SHORT];
            yield [$backend[0], $backend[1], 'int', Type::T_INT];
            yield [$backend[0], $backend[1], 'unsigned int', Type::T_UNSIGNED_INT];
            yield [$backend[0], $backend[1], 'long', Type::T_LONG];
            yield [$backend[0], $backend[1], 'unsigned long', Type::T_UNSIGNED_LONG];
            yield [$backend[0], $backend[1], 'long long', Type::T_LONG_LONG];
            yield [$backend[0], $backend[1], 'unsigned long long', Type::T_UNSIGNED_LONG_LONG];
            yield [$backend[0], $backend[1], 'float', Type::T_FLOAT];
            yield [$backend[0], $backend[1], 'double', Type::T_DOUBLE];
            yield [$backend[0], $backend[1], 'long double', Type::T_LONG_DOUBLE];
            yield [$backend[0], $backend[1], 'size_t', Type::T_SIZE_T];
        }
    }

    public static function provideBackends(): \Generator {
        $it = new \DirectoryIterator(__DIR__ . '/../../lib/Backend');
        foreach ($it as $file) {
            if ($file->isFile()) {
                continue;
            }
            $name = $file->getBasename();
            if ($name === '.' || $name === '..') {
                continue;
            }
            $class = __NAMESPACE__ . '\\Backend\\' . $name . '\\Compiler';
            yield [$name, new $class];
        }
    }
}