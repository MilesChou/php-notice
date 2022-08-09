<?php

namespace Benchmarks;

use PhpBench\Benchmark\Metadata\Annotations\Iterations;
use PhpBench\Benchmark\Metadata\Annotations\Revs;
use RuntimeException;

/**
 * @AfterMethods({"check"})
 */
class PregSplitExplodeBench
{
    private const EMAIL = 'jangconan@gmail.com';

    private array $target;

    public function check()
    {
        if ($this->target !== ['jangconan', 'gmail.com']) {
            throw new RuntimeException('Check error');
        }
    }

    /**
     * @Revs(100000)
     * @Iterations(5)
     */
    public function benchPregSplit(): void
    {
        $this->target = preg_split('/@/', self::EMAIL);
    }

    /**
     * @Revs(100000)
     * @Iterations(5)
     */
    public function benchExplode(): void
    {
        $this->target = explode('@', self::EMAIL);
    }
}