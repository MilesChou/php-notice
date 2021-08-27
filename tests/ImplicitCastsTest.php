<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

/**
 * @see https://www.php.net/manual/en/language.operators.comparison.php
 */
class ImplicitCastsTest extends TestCase
{
    /**
     * compare a number with a string or the comparison involves numerical strings,
     * then each string is converted to a number and the comparison performed numerically
     *
     * @test
     */
    public function whenUsingEqualComparison()
    {
        $this->markTestSkipped('PHP 8 will failed');
        $this->assertTrue(0 == ' ');      // 0 == 0
        $this->assertTrue('0' == false);  // 0 == 0
        $this->assertTrue('1' == '01');   // 1 == 1
        $this->assertTrue('10' == '1e1'); // 10 == 10
        $this->assertTrue(100 == '1e2');  // 100 == 100

        // 123 == 123
        $this->assertTrue('123' == '       123');
    }

    public function whenUsingNotEqualComparison()
    {
        $this->assertTrue('123' <> ' 123');  // '123' <> ' 123'
    }
}
