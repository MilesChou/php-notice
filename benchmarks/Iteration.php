<?php

namespace Benchmarks;

use Benchmarks\Iteration\Iterator;
use PhpBench\Benchmark\Metadata\Annotations\BeforeMethods;
use PhpBench\Benchmark\Metadata\Annotations\Iterations;
use PhpBench\Benchmark\Metadata\Annotations\Revs;

/**
 * Benchmark string
 *
 * @BeforeMethods({"init"})
 */
class Iteration
{
    /**
     * @var array
     */
    private $target;

    /**
     * @var int
     */
    private $sum;

    public function init()
    {
        $this->target = range(1, 10000);
    }

    /**
     * @Revs(1000)
     */
    public function benchArrayMap()
    {
        $sum = 0;

        array_map(function ($v) use (&$sum) {
            $sum += $v;
        }, $this->target);
    }

    /**
     * @Revs(1000)
     */
    public function benchArrayReduce()
    {
        array_reduce($this->target, function ($c, $v) {
            $c += $v;

            return $c;
        }, 0);
    }

    /**
     * @Revs(1000)
     */
    public function benchArrayWalk()
    {
        $sum = 0;

        array_walk($this->target, function ($v) use (&$sum) {
            $sum += $v;
        });
    }

    /**
     * @Revs(1000)
     */
    public function benchFor()
    {
        $sum = 0;

        $len = count($this->target);

        for ($i = 0; $i < $len; $i++) {
            $sum += $this->target[$i];
        }
    }

    /**
     * @Revs(1000)
     */
    public function benchForeachValue()
    {
        $sum = 0;

        foreach ($this->target as $v) {
            $sum += $v;
        }
    }

    /**
     * @Revs(1000)
     */
    public function benchForeachKeyValue()
    {
        $sum = 0;

        foreach ($this->target as $k => $v) {
            $sum += $v;
        }
    }

    /**
     * @Revs(1000)
     */
    public function benchGenerator()
    {
        $sum = 0;

        $generator = call_user_func(function () {
            foreach ($this->target as $k => $v) {
                yield $v;
            }
        });

        foreach ($generator as $v) {
            $sum += $v;
        }
    }

    /**
     * @Revs(1000)
     */
    public function benchIterator()
    {
        $iterator = new Iterator($this->target);

        $sum = 0;

        foreach ($iterator as $v) {
            $sum += $v;
        }
    }
}
