<?php

namespace Benchmarks;

use PhpBench\Benchmark\Metadata\Annotations\Iterations;
use PhpBench\Benchmark\Metadata\Annotations\Revs;

use function is_null;

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
    public function benchIsNull()
    {
        $v = null;

        // Need add `use function is_null;` for performance
        $t = is_null($v);
    }

    /**
     * @Revs(100000)
     * @Iterations(5)
     */
    public function benchConditionNull()
    {
        $v = null;

        $t = null === $v;
    }
}
