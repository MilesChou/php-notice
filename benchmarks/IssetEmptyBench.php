<?php

namespace Benchmarks;

use PhpBench\Benchmark\Metadata\Annotations\Iterations;
use PhpBench\Benchmark\Metadata\Annotations\Revs;
use RuntimeException;

class IssetIsNullBench
{

    /**
     * @Revs(100000)
     * @Iterations(5)
     */
    public function benchIsset()
    {
        $v = null;

        $t = isset($v);
    }

    /**
     * @Revs(100000)
     * @Iterations(5)
     */
    public function benchEmpty()
    {
        $v = null;

        $t = !empty($v);
    }
}
