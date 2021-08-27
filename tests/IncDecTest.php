<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

class IncDecTest extends TestCase
{
    /**
     * @test
     */
    public function triplePlus()
    {
        $foo = 1;

        $actual = $foo++ + $foo;

        $this->assertSame(3, $actual);
    }

    /**
     * @test
     */
    public function tokenizer()
    {
        $tokens = token_get_all('<?php $foo+++$foo');

        // <?php
        $this->assertSame(T_OPEN_TAG, $tokens[0][0]);

        // $foo
        $this->assertSame(T_VARIABLE, $tokens[1][0]);

        // Means '++'
        $this->assertSame(T_INC, $tokens[2][0]);

        // Means the third +
        $this->assertSame('+', $tokens[3][0]);

        // $foo
        $this->assertSame(T_VARIABLE, $tokens[4][0]);

        // Its means: $foo++ + $foo
    }
}
