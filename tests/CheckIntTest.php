<?php

namespace Notice;

class CheckIntTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function shouldReturnFalseWhenCallIsIntWithStringTypeInteger()
    {
        $this->assertFalse(is_int('100'));

        $this->assertTrue(is_numeric('100'));
    }
}
