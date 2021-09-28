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
    public function bench()
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
}
