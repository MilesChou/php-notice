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
            'aaa' => 'aaa',
            '012' => '012',
            '111' => '111',
        ];

        foreach ($mixList as $key => $value) {
            $keyType = gettype($key);

            if ($key === 'aaa') {
                // $key is aaa
                $this->assertEquals('string', $keyType);
            } elseif ($key === '012') {
                // $key is 012

                // Thx Tsai Eden feedback at Facebook:
                // https://www.facebook.com/groups/199493136812961/permalink/1256542107774720/?comment_id=1256547144440883

                // **The type of key will be string  when key is prefix '0'**
                $this->assertEquals('string', $keyType);
            } else {
                // $key is 111

                // **The type of key will type-cast to integer**
                $this->assertEquals('integer', $keyType);
            }
        }
    }
}
