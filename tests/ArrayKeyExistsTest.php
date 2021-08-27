<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use stdClass;

/**
 * See https://www.php.net/manual/en/types.comparisons.php to get examples
 */
class ArrayKeyExistsTest extends TestCase
{
    public function exists(): iterable
    {
        yield [['foo' => '']];
        yield [['foo' => null]];
        yield [['foo' => []]];
        yield [['foo' => ['a', 'b']]];
        yield [['foo' => false]];
        yield [['foo' => true]];
        yield [['foo' => 1]];
        yield [['foo' => 0]];
        yield [['foo' => -1]];
        yield [['foo' => '1']];
        yield [['foo' => '0']];
        yield [['foo' => '-1']];
        yield [['foo' => 'str']];
        yield [['foo' => 'true']];
        yield [['foo' => 'false']];
        yield [['foo' => new stdClass()]];
    }

    public function notExists(): iterable
    {
        yield [[]];
    }

    /**
     * @test
     * @dataProvider exists
     */
    public function shouldReturnTrueWhenExistUsingArrayKeyExists($arr)
    {
        $actual = array_key_exists('foo', $arr);

        $this->assertTrue($actual);
    }

    /**
     * @test
     * @dataProvider exists
     */
    public function shouldReturnTrueWhenExistUsingIssetOrNotEmpty($arr)
    {
        $this->markTestSkipped('WTF');

        $actual = isset($arr['foo']) || !empty($arr['foo']);

        $this->assertTrue($actual);
    }

    /**
     * @test
     * @dataProvider exists
     */
    public function shouldReturnTrueWhenExistUsingIssetAndNotNull($arr)
    {
        $this->markTestSkipped('WTF');

        $actual = isset($arr['foo']) && ($arr['foo'] !== null);

        $this->assertTrue($actual);
    }

    /**
     * @test
     * @dataProvider notExists
     */
    public function shouldReturnFalseWhenNotExistUsingArrayKeyExists($arr)
    {
        $this->assertFalse(array_key_exists('foo', $arr));
    }

    /**
     * @test
     * @dataProvider notExists
     */
    public function shouldReturnFalseWhenNotExistUsingIssetOrNotEmpty($arr)
    {
        $this->assertFalse(array_key_exists('foo', $arr));
    }

    /**
     * @test
     * @dataProvider notExists
     */
    public function shouldReturnFalseWhenNotExistUsingIssetAndNotNull($arr)
    {
        $this->assertFalse(array_key_exists('foo', $arr));
    }
}
