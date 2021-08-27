<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

class ArrayPlusAndMergeTest extends TestCase
{
    /**
     * @test
     */
    public function combineHashMap()
    {
        // Should ignore by backward item in the same string key when using plus
        $this->assertSame(['foo' => 0], ['foo' => 0] + ['foo' => 1]);

        // Should overwrite by backward item in the same string key when using array_merge
        $this->assertSame(['foo' => 1], array_merge(['foo' => 0], ['foo' => 1]));
    }

    /**
     * @test
     */
    public function combineArray()
    {
        // Should ignore by backward item in the same key when using plus
        $this->assertSame([0], [0] + [1]);

        // Should merge two array when using array_merge
        $this->assertSame([0, 1], array_merge([0], [1]));
    }

    /**
     * @test
     */
    public function combineArrayAndHashMap()
    {
        // Because the key is diff, so the result will have two item with origin key
        $this->assertSame([0, 'foo' => 1], [0] + ['foo' => 1]);

        // Change the seq and result will change too.
        $this->assertSame(['foo' => 1, 0], ['foo' => 1] + [0]);

        // Because the key is diff, so the result will have two item with origin key
        $this->assertSame([0, 'foo' => 1], array_merge([0], ['foo' => 1]));

        // Change the seq and result will change too.
        $this->assertSame(['foo' => 1, 0], array_merge(['foo' => 1], [0]));
    }
}
