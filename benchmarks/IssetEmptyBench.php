<?php

namespace Benchmarks;

use PhpBench\Benchmark\Metadata\Annotations\Iterations;
use PhpBench\Benchmark\Metadata\Annotations\Revs;

class IssetEmptyBench
{
    /**
     * @Revs(100000)
     * @Iterations(5)
     */
    public function benchIssetUndefined()
    {
        $t = isset($v);
    }

    /**
     * @Revs(100000)
     * @Iterations(5)
     */
    public function benchEmptyUndefined()
    {
        $t = empty($v);
    }
}
