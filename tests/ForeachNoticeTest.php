<?php

namespace Notice;

use PHPUnit_Framework_TestCase;

class ForeachNoticeTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function itWillBeTypeCastToIntIfKeyIsNumericWhenForeach()
    {
        $list = [
            '111' => 'ABC',
            '222' => 'DEF',
        ];

        foreach ($list as $key => $value) {
            $keyType = gettype($key);

            // **The key will type-cast to integer**
            $this->assertEquals('integer', $keyType);
        }
    }
}
