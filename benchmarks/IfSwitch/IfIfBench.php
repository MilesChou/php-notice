<?php

namespace Benchmarks\IfSwitch;

use PhpBench\Benchmark\Metadata\Annotations\Iterations;
use PhpBench\Benchmark\Metadata\Annotations\Revs;

class IfIfBench
{
    /**
     * @Revs(100000)
     * @Iterations(5)
     */
    public function bench3Condition()
    {
        $a = 3;

        if (1 === $a) {
            $i = 1;
        }

        if (2 === $a) {
            $i = 2;
        }

        if (3 === $a) {
            $i = 3;
        }
    }

    /**
     * @Revs(100000)
     * @Iterations(5)
     */
    public function bench10Condition()
    {
        $a = 10;

        if (1 === $a) {
            $i = 1;
        }

        if (2 === $a) {
            $i = 2;
        }

        if (3 === $a) {
            $i = 3;
        }

        if (4 === $a) {
            $i = 4;
        }

        if (5 === $a) {
            $i = 5;
        }

        if (6 === $a) {
            $i = 6;
        }

        if (7 === $a) {
            $i = 7;
        }

        if (8 === $a) {
            $i = 8;
        }

        if (9 === $a) {
            $i = 9;
        }

        if (10 === $a) {
            $i = 10;
        }
    }
}
