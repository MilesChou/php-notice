<?php

namespace Notice;

use PHPUnit\Framework\TestCase;

class InArrayNoticeTest extends TestCase
{
    /**
     * @test
     */
    public function suggestUsingStrictTypeWhenUsingInArrayFunction()
    {
        $findThisItemInList = 0;
        $list = [
            'ABC',
            'DEF',
        ];

        // 0 is in List ['ABC', 'DEF'] ?? What the ....
        $actualCallInArrayWithInt0 = in_array($findThisItemInList, $list);
        $this->assertTrue($actualCallInArrayWithInt0);


        // Using strict mode
        $actualCallInArrayWithInt0 = in_array($findThisItemInList, $list, true);
        $this->assertFalse($actualCallInArrayWithInt0);


        // Or force type-cast if type is uniform in $list
        $actualCallInArrayWithString0 = in_array((string)$findThisItemInList, $list);
        $this->assertFalse($actualCallInArrayWithString0);
    }
}
