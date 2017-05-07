<?php
namespace Notice;

class StrposTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function emptyNeedle()
    {
        // Can not pass empty string
        //strpos('some-text', '');

        // But can pass null ... WTF
        strpos('some-text', null);

        $this->assertTrue(true);
    }
}
