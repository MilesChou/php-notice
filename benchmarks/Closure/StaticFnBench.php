<?php

namespace Benchmarks\Closure;

use PhpBench\Benchmark\Metadata\Annotations\Iterations;
use PhpBench\Benchmark\Metadata\Annotations\Revs;

class StaticFnBench
{
    /**
     * @Revs(100000)
     * @Iterations(5)
     */
    public function bench()
    {
        $y = 1;

        (static fn($x) => $x + $y)(2);
    }
}