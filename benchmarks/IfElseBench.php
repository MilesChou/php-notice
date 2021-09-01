<?php

namespace Benchmarks;

use PhpBench\Benchmark\Metadata\Annotations\Iterations;
use PhpBench\Benchmark\Metadata\Annotations\Revs;

class IfElseBench
{
    /**
     * @Revs(100000)
     * @Iterations(5)
     */
    public function benchTrue()
    {
        if (true) {
            $i = 1 + 1;
        } else {
            $i = 1 - 1;
        }
    }

    /**
     * @Revs(100000)
     * @Iterations(5)
     */
    public function benchQuestionMarkAssignWhenTrue()
    {
        $i = true ? 1 + 1 : 1 - 1;
    }

    /**
     * @Revs(100000)
     * @Iterations(5)
     */
    public function benchFalse()
    {
        if (false) {
            $i = 1 + 1;
        } else {
            $i = 1 - 1;
        }
    }

    /**
     * @Revs(100000)
     * @Iterations(5)
     */
    public function benchQuestionMarkAssignWhenFalse()
    {
        $i = false ? 1 + 1 : 1 - 1;
    }
}
