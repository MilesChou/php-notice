<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

class StrposTest extends TestCase
{
    /**
     * @test
     */
    public function emptyNeedle()
    {


        // Can not pass empty string
        //strpos('some-text', '');

        // But can pass null ... WTF
        // PHP 7.3 update: fatal error when pass null
        //strpos('some-text', null);

        $this->expectNotToPerformAssertions();
    }
}
