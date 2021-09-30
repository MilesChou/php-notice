<?php

namespace Benchmarks\IfSwitch;

use PhpBench\Benchmark\Metadata\Annotations\Iterations;
use PhpBench\Benchmark\Metadata\Annotations\Revs;

class IfElseBench
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
        } elseif (2 === $a) {
            $i = 2;
        } elseif (3 === $a) {
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
        } elseif (2 === $a) {
            $i = 2;
        } elseif (3 === $a) {
            $i = 3;
        } elseif (4 === $a) {
            $i = 4;
        } elseif (5 === $a) {
            $i = 5;
        } elseif (6 === $a) {
            $i = 6;
        } elseif (7 === $a) {
            $i = 7;
        } elseif (8 === $a) {
            $i = 8;
        } elseif (9 === $a) {
            $i = 9;
        } elseif (10 === $a) {
            $i = 10;
        }
    }
}
