<?php

namespace Benchmarks;

use Illuminate\Support\Collection;
use RuntimeException;

class PregVsIntBench
{
    /**
     * @Revs(100)
     * @Iterations(5)
     */
    public function benchPregMatch(): void
    {
        assert(preg_match('/^[0-9]{3, 8}$/', 123) === 1);
        assert(preg_match('/^[0-9]{3, 8}$/', 12) === 0);
    }

    /**
     * @Revs(100)
     * @Iterations(5)
     */
    public function benchIntComparePregMatch(): void
    {
        assert((int)'123' > 99);
        assert((int)'12' <= 99);
    }
}
