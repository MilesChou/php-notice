<?php

namespace Benchmarks\MethodCall;

use PhpBench\Benchmark\Metadata\Annotations\Iterations;
use PhpBench\Benchmark\Metadata\Annotations\Revs;

class StaticCallableAndCallUserFuncArrayBench
{
    /**
     * @Revs(100000)
     * @Iterations(5)
     */
    public function bench()
    {
        call_user_func_array([Stub::class, 'dummy'], ['test']);
    }
}