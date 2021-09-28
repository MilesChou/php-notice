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
    public function bench()
    {
        $a = 3;

        $i = match ($a) {
            1 => 1,
            2 => 2,
            3 => 3,
        };
    }
}
