<?php

namespace Benchmarks\Closure;

use PhpBench\Benchmark\Metadata\Annotations\Iterations;
use PhpBench\Benchmark\Metadata\Annotations\Revs;

class StaticFunctionBench
{
    /**
     * @Revs(100000)
     * @Iterations(5)
     */
    public function bench()
    {
        $y = 1;

        (static function($x) use ($y){
            return $x + $y;
        })(2);
    }
}