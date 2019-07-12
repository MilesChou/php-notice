<?php

namespace Benchmarks;

use PhpBench\Benchmark\Metadata\Annotations\Iterations;
use PhpBench\Benchmark\Metadata\Annotations\Revs;

/**
 * Benchmark string
 */
class StringConcatBench
{
    /**
     * @Revs(100000)
     * @Iterations(5)
     */
    public function benchSingleQuoteConcat()
    {
        $bar = 'bar';

        $target = 'for' . $bar;
    }

    /**
     * @Revs(100000)
     * @Iterations(5)
     */
    public function benchDoubleQuoteConcat()
    {
        $bar = 'bar';

        $target = "for" . $bar;
    }

    /**
     * @Revs(100000)
     * @Iterations(5)
     */
    public function benchDoubleQuoteConcatWithPreProcess()
    {
        $bar = 'bar';

        $target = "for{$bar}";
    }
}