<?php

namespace Benchmarks\IfSwitch;

use PhpBench\Benchmark\Metadata\Annotations\Iterations;
use PhpBench\Benchmark\Metadata\Annotations\Revs;

class IfIfBench
{
    /**
     * @Revs(100000)
     * @Iterations(5)
     */
    public function bench()
    {
        $a = 3;

        if (1 === $a) {
            $i = 1;
        }

        if (2 === $a) {
            $i = 2;
        }

        if (3 === $a) {
            $i = 3;
        }
    }
}
