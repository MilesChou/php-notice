<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use stdClass;

/**
 * See https://www.php.net/manual/en/types.comparisons.php to get examples
 *
 * @see IssetEmptyTest
 */
class ArrayKeyExistsTest extends TestCase
{
    public function cases(): iterable
    {
        yield [['foo' => ''], true];
        yield [['foo' => null], true];
        yield [['foo' => []], true];
        yield [['foo' => ['a', 'b']], true];
        yield [['foo' => false], true];
        yield [['foo' => true], true];
        yield [['foo' => 1], true];
        yield [['foo' => 0], true];
        yield [['foo' => -1], true];
        yield [['foo' => '1'], true];
        yield [['foo' => '0'], true];
        yield [['foo' => '-1'], true];
        yield [['foo' => 'str'], true];
        yield [['foo' => 'true'], true];
        yield [['foo' => 'false'], true];
        yield [['foo' => new stdClass()], true];
        yield [[], false];
    }

    /**
     * @test
     * @dataProvider cases
     */
    public function shouldReturnTrueWhenArrayExistUsingArrayKeyExists($arr, $expected)
    {
        $actual = array_key_exists('foo', $arr);

        $this->assertSame($expected, $actual);
    }

    /**
     * @test
     * @dataProvider cases
     */
    public function shouldReturnTrueWhenObjectExistUsingPropertyExists($arr, $expected)
    {
        $actual = property_exists((object)$arr, 'foo');

        $this->assertSame($expected, $actual);
    }
}
