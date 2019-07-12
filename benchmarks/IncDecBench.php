<?php

namespace Benchmarks;

use PhpBench\Benchmark\Metadata\Annotations\BeforeMethods;
use PhpBench\Benchmark\Metadata\Annotations\Iterations;
use PhpBench\Benchmark\Metadata\Annotations\Revs;

/**
 * Benchmark the Incrementing/Decrementing Operators
 *
 * @BeforeMethods({"init"})
 */
class IncDecBench
{
    /**
     * @var int
     */
    private $i = 0;

    public function init()
    {
        $this->i = 0;
    }

    /**
     * @Revs(100000)
     * @Iterations(5)
     */
    public function benchPreIncrement()
    {
        ++$this->i;
    }

    /**
     * @Revs(100000)
     * @Iterations(5)
     */
    public function benchPostIncrement()
    {
        $this->i++;
    }

    /**
     * @Revs(100000)
     * @Iterations(5)
     */
    public function benchPreDecrement()
    {
        --$this->i;
    }

    /**
     * @Revs(100000)
     * @Iterations(5)
     */
    public function benchPostDecrement()
    {
        $this->i--;
    }
}