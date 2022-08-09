<?php

namespace Benchmarks;

use PhpBench\Benchmark\Metadata\Annotations\Iterations;
use PhpBench\Benchmark\Metadata\Annotations\Revs;
use RuntimeException;

/**
 * @AfterMethods({"check"})
 */
class PregReplaceStrReplaceBench
{
    private const EMAIL = 'jang.conan';

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
    public function benchPregReplace(): void
    {
        $this->target = preg_replace('/\./', '', self::EMAIL);
    }

    /**
     * @Revs(100000)
     * @Iterations(5)
     */
    public function benchStrReplace(): void
    {
        $this->target = str_replace('.', '', self::EMAIL);
    }
}