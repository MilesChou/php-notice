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
    public function issetTrueCase(): iterable
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

    public function issetFalseCase(): iterable
    {
        yield [[]];
        yield [['foo' => null]];
    }

    /**
     * @test
     * @dataProvider issetTrueCase
     */
    public function shouldReturnTrueWhenIssetTrueArrayCaseUsingIsset($arr): void
    {
        $actual = isset($arr['foo']);

        $this->assertTrue($actual);
    }

    /**
     * @test
     * @dataProvider issetTrueCase
     */
    public function shouldReturnTrueWhenIssetTrueArrayCaseUsingIssetOrNotEmpty($arr): void
    {
        $actual = isset($arr['foo']) || !empty($arr['foo']);

        $this->assertTrue($actual);
    }

    /**
     * @test
     * @dataProvider issetFalseCase
     */
    public function shouldReturnFalseWhenIssetFalseArrayCaseUsingIsset($arr): void
    {
        $actual = isset($arr['foo']);

        $this->assertFalse($actual);
    }

    /**
     * @test
     * @dataProvider issetFalseCase
     */
    public function shouldReturnFalseWhenIssetFalseArrayCaseUsingIssetOrNotEmpty($arr): void
    {
        $actual = isset($arr['foo']) || !empty($arr['foo']);

        $this->assertFalse($actual);
    }

    public function emptyFalseCase(): iterable
    {
        // Use !empty will return true cases
        yield [['foo' => ['a', 'b']]];
        yield [['foo' => true]];
        yield [['foo' => 1]];
        yield [['foo' => -1]];
        yield [['foo' => '1']];
        yield [['foo' => '-1']];
        yield [['foo' => 'str']];
        yield [['foo' => 'true']];
        yield [['foo' => 'false']];
        yield [['foo' => new stdClass()]];
    }

    public function emptyTrueCase(): iterable
    {
        yield [[]];
        yield [['foo' => null]];
        yield [['foo' => '']];
        yield [['foo' => []]];
        yield [['foo' => false]];
        yield [['foo' => 0]];
        yield [['foo' => '0']];
    }

    /**
     * @test
     * @dataProvider emptyTrueCase
     */
    public function shouldReturnTrueWhenEmptyTrueCaseUsingEmpty($arr): void
    {
        $actual = empty($arr['foo']);

        $this->assertTrue($actual);
    }

    /**
     * @test
     * @dataProvider emptyTrueCase
     */
    public function shouldReturnTrueWhenEmptyTrueCaseUsingNotIssetOrEmpty($arr): void
    {
        $actual = empty($arr['foo']);

        $this->assertTrue($actual);
    }

    /**
     * @test
     * @dataProvider emptyTrueCase
     */
    public function shouldReturnTrueWhenIssetFalseArrayCaseUsingNotIssetOrEmpty($arr): void
    {
        $actual = !isset($arr['foo']) || empty($arr['foo']);

        $this->assertTrue($actual);
    }

    /**
     * @test
     * @dataProvider emptyFalseCase
     */
    public function shouldReturnFalseWhenEmptyFalseCaseUsingEmpty($arr): void
    {
        $actual = empty($arr['foo']);

        $this->assertFalse($actual);
    }

    /**
     * @test
     * @dataProvider emptyFalseCase
     */
    public function shouldReturnTrueWhenEmptyFalseCaseUsingNotIssetOrEmpty($arr): void
    {
        $actual = !isset($arr['foo']) || empty($arr['foo']);

        $this->assertFalse($actual);
    }
}
