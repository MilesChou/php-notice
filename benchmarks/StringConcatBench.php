<?php

namespace Benchmarks;

use PhpBench\Benchmark\Metadata\Annotations\Iterations;
use PhpBench\Benchmark\Metadata\Annotations\Revs;
use RuntimeException;

/**
 * Benchmark string
 *
 * @AfterMethods({"check"})
 */
class StringConcatBench
{
    /**
     * @var string
     */
    private $target;

    public function check()
    {
        if($this->target !== 'foobar') {
            throw new RuntimeException('Check error, expect is foobar, actual is ' . $this->target);
        }
    }

    /**
     * @Revs(100000)
     * @Iterations(5)
     */
    public function benchSingleQuote()
    {
        $bar = 'bar';

        $this->target = 'foo' . $bar;
    }

    /**
     * @Revs(100000)
     * @Iterations(5)
     */
    public function benchDoubleQuote()
    {
        $bar = 'bar';

        $this->target = "foo" . $bar;
    }

    /**
     * @Revs(100000)
     * @Iterations(5)
     */
    public function benchDoubleQuoteWithPreProcess()
    {
        $bar = 'bar';

        $this->target = "foo{$bar}";
    }

    /**
     * @Revs(100000)
     * @Iterations(5)
     */
    public function benchSprintf()
    {
        $bar = 'bar';

        $this->target = sprintf('foo%s', $bar);
    }

    /**
     * @Revs(100000)
     * @Iterations(5)
     */
    public function benchVsprintf()
    {
        $bar = 'bar';

        $this->target = vsprintf('foo%s', [$bar]);
    }

    /**
     * @Revs(100000)
     * @Iterations(5)
     */
    public function benchStrtr()
    {
        $bar = 'bar';

        $this->target = strtr('foo%s', ['%s' => $bar]);
    }

    /**
     * @Revs(100000)
     * @Iterations(5)
     */
    public function benchStrReplace()
    {
        $bar = 'bar';

        $this->target = str_replace('%s', $bar, 'foo%s');
    }

    /**
     * @Revs(100000)
     * @Iterations(5)
     */
    public function benchStrReplaceArray()
    {
        $bar = 'bar';

        $this->target = str_replace(['%s'], [$bar], 'foo%s');
    }
}