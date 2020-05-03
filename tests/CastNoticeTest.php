<?php

namespace Notice;

class CastNoticeTest extends \PHPUnit_Framework_TestCase
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

        $this->assertTrue(0 == 'whatever');
        $this->assertTrue('whatever' == 0);

        $this->assertFalse(0 === 'whatever');
        $this->assertFalse('whatever' === 0);
    }
}
