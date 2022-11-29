<?php

namespace Benchmarks\Cast;

use function intval;

class CastBench
{
    /**
     * @Revs(100000)
     * @Iterations(5)
     */
    public function benchIntValFunction(): void
    {
        $x = '123456789';

        $y = intval($x);
    }

    /**
     * @Revs(100000)
     * @Iterations(5)
     */
    public function benchIntSyntax(): void
    {
        $x = '123456789';

        $y = (int)$x;
    }

}