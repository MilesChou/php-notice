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
        $mixList = [
            'aaa' => 'ABC',
            '111' => 'DEF',
        ];

        foreach ($mixList as $key => $value) {
            $keyType = gettype($key);

            if ($key === 'aaa') {
                // $key is aaa
                $this->assertEquals('string', $keyType);
            } else {
                // $key is 111

                // **The key will type-cast to integer**
                $this->assertEquals('integer', $keyType);
            }
        }
    }
}
