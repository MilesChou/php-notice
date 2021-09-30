<?php

namespace Benchmarks\IsNullAndSet;

use PhpBench\Benchmark\Metadata\Annotations\Iterations;
use PhpBench\Benchmark\Metadata\Annotations\Revs;

class NullCoalescingBench
{
    /**
     * @Revs(100000)
     * @Iterations(5)
     */
    public function bench()
    {
        $v = null;

        $t = $v ?? 'foo';
    }
}
