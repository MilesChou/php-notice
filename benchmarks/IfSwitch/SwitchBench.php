<?php

namespace Benchmarks\IfSwitch;

use PhpBench\Benchmark\Metadata\Annotations\Iterations;
use PhpBench\Benchmark\Metadata\Annotations\Revs;

class SwitchBench
{
    /**
     * @Revs(100000)
     * @Iterations(5)
     */
    public function bench3Condition()
    {
        $a = 3;

        switch ($a) {
            case 1:
                $i = 1;
                return;
            case 2:
                $i = 2;
                return;
            case 3:
                $i = 3;
                return;
        }
    }

    /**
     * @Revs(100000)
     * @Iterations(5)
     */
    public function bench10Condition()
    {
        $a = 10;

        switch ($a) {
            case 1:
                $i = 1;
                return;
            case 2:
                $i = 2;
                return;
            case 3:
                $i = 3;
                return;
            case 4:
                $i = 4;
                return;
            case 5:
                $i = 5;
                return;
            case 6:
                $i = 6;
                return;
            case 7:
                $i = 7;
                return;
            case 8:
                $i = 8;
                return;
            case 9:
                $i = 9;
                return;
            case 10:
                $i = 10;
                return;
        }
    }
}
