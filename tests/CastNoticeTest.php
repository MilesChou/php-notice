<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

class CastNoticeTest extends TestCase
{
    /**
     * @test
     */
    public function autoCastBehavior()
    {
        $this->assertTrue(false == []);
        $this->assertTrue([] == false);

        $this->assertFalse(false === []);
        $this->assertFalse([] === false);

        $this->markTestSkipped('PHP 8 will failed');

        $this->assertTrue(0 == 'whatever');
        $this->assertTrue('whatever' == 0);

        $this->assertFalse(0 === 'whatever');
        $this->assertFalse('whatever' === 0);
    }
}
