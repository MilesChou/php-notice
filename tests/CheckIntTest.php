<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

class CheckIntTest extends TestCase
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
