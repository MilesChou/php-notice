<?php

namespace Benchmarks\IfSwitch;

use PhpBench\Benchmark\Metadata\Annotations\Iterations;
use PhpBench\Benchmark\Metadata\Annotations\Revs;

class MatchBench
{
    /**
     * @Revs(100000)
     * @Iterations(5)
     */
    public function bench3Condition()
    {
        $a = 3;

        $i = match ($a) {
            1 => 1,
            2 => 2,
            3 => 3,
        };
    }

    /**
     * @Revs(100000)
     * @Iterations(5)
     */
    public function bench10Condition()
    {
        $a = 10;

        $i = match ($a) {
            1 => 1,
            2 => 2,
            3 => 3,
            4 => 4,
            5 => 5,
            6 => 6,
            7 => 7,
            8 => 8,
            9 => 9,
            10 => 10,
        };
    }
}
