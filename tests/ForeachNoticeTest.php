<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

class ForeachNoticeTest extends TestCase
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

    /**
     * @test
     */
    public function refNoticeWhenForeach()
    {
        $list = [1, 2, 3];

        foreach ($list as &$item) {
            // Do something
        }

        $this->assertSame([1, 2, 3], $list);

        // The $item is reference to the last item in $list
        foreach ($list as $k => $item) {
            if ($k === 0) {
                // Assign 1 into reference $item, so last item is 1
                $this->assertSame([1, 2, 1], $list);
                $this->assertSame(1, $item);
            }

            if ($k === 1) {
                // Assign 2 into reference $item, so last item is 2
                $this->assertSame([1, 2, 2], $list);
                $this->assertSame(2, $item);
            }

            if ($k === 2) {
                // Last item is 2, so assign into reference $item
                $this->assertSame([1, 2, 2], $list);
                $this->assertSame(2, $item);
            }
        }

        $this->assertSame([1, 2, 2], $list);

        $item = 100;

        $this->assertSame([1, 2, 100], $list);
    }
}
