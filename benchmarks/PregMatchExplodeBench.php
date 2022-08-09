<?php

namespace Benchmarks;

use PhpBench\Benchmark\Metadata\Annotations\Iterations;
use PhpBench\Benchmark\Metadata\Annotations\Revs;
use RuntimeException;

/**
 * @AfterMethods({"check"})
 */
class PregMatchExplodeBench
{
    private const EMAIL = 'jangconan@gmail.com';

    private string $target;

    public function check()
    {
        if ($this->target !== 'jangconan') {
            throw new RuntimeException('Check error, expect is jangconan, actual is ' . $this->target);
        }
    }

    /**
     * @Revs(100000)
     * @Iterations(5)
     */
    public function benchPregMatch(): void
    {
        preg_match('/^(\w+)@gmail.com/', self::EMAIL, $match);

        $this->target = $match[1];
    }

    /**
     * @Revs(100000)
     * @Iterations(5)
     */
    public function benchExplode(): void
    {
        [$this->target] = explode('@', self::EMAIL);
    }
}