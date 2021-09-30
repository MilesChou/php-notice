<?php

namespace Benchmarks\IsNullAndSet;

use PhpBench\Benchmark\Metadata\Annotations\Iterations;
use PhpBench\Benchmark\Metadata\Annotations\Revs;

use function is_null;

class IsNullBench
{
    /**
     * @Revs(100000)
     * @Iterations(5)
     */
    public function bench()
    {
        $v = null;

        // Need add `use function is_null;` for performance
        $t = is_null($v) ? 'foo' : $v;
    }
}
