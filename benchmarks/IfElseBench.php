<?php

namespace Benchmarks;

use PhpBench\Benchmark\Metadata\Annotations\Revs;

class IfElseBench
{
    /**
     * @Revs(1000000)
     */
    public function benchTrue()
    {
        if (true) {
            $i = 1 + 1;
        } else {
            $i = 1 - 1;
        }
    }

    /**
     * @Revs(1000000)
     */
    public function benchFalse()
    {
        if (false) {
            $i = 1 + 1;
        } else {
            $i = 1 - 1;
        }
    }
}
