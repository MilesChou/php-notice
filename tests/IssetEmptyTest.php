<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use stdClass;

/**
 * See https://www.php.net/manual/en/types.comparisons.php to get examples
 *
 * @see ArrayKeyExistsTest
 */
class IssetEmptyTest extends TestCase
{
    public function issetTrueArrayCase(): iterable
    {
        yield [['foo' => '']];
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

    public function issetFalseArrayCase(): iterable
    {
        yield [[]];
        yield [['foo' => null]];
    }

    /**
     * @test
     * @dataProvider issetTrueArrayCase
     */
    public function shouldReturnTrueWhenIssetTrueArrayCaseUsingIsset($arr)
    {
        $actual = isset($arr['foo']);

        $this->assertTrue($actual);
    }

    /**
     * @test
     * @dataProvider issetTrueArrayCase
     */
    public function shouldReturnTrueWhenIssetTrueArrayCaseUsingIssetOrNotEmpty($arr)
    {
        $actual = isset($arr['foo']) || !empty($arr['foo']);

        $this->assertTrue($actual);
    }

    /**
     * @test
     * @dataProvider issetFalseArrayCase
     */
    public function shouldReturnFalseWhenIssetFalseArrayCaseUsingIsset($arr)
    {
        $actual = isset($arr['foo']);

        $this->assertFalse($actual);
    }

    /**
     * @test
     * @dataProvider issetFalseArrayCase
     */
    public function shouldReturnFalseWhenIssetFalseArrayCaseUsingIssetOrNotEmpty($arr)
    {
        $actual = isset($arr['foo']) || !empty($arr['foo']);

        $this->assertFalse($actual);
    }
}
