<?php

namespace Benchmarks;

use Benchmarks\MethodCall\Stub;
use PhpBench\Benchmark\Metadata\Annotations\Iterations;
use PhpBench\Benchmark\Metadata\Annotations\Revs;
use ReflectionClass;
use ReflectionMethod;

/**
 * Benchmark the Incrementing/Decrementing Operators
 */
class IncDecBench
{
    /**
     * @var int
     */
    private $i = 0;

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