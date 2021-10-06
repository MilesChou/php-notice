<?php

namespace Benchmarks\Closure;

use PhpBench\Benchmark\Metadata\Annotations\Iterations;
use PhpBench\Benchmark\Metadata\Annotations\Revs;

class FnBench
{
    /**
     * @Revs(100000)
     * @Iterations(5)
     */
    public function bench()
    {
        $y = 1;

        (fn($x) => $x + $y)(2);
    }
}