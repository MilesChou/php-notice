<?php

namespace Benchmarks;

use PhpBench\Benchmark\Metadata\Annotations\Iterations;
use PhpBench\Benchmark\Metadata\Annotations\Revs;
use RuntimeException;

class ArrayKeyExistsBench
{

    /**
     * @Revs(100000)
     * @Iterations(5)
     */
    public function benchIssetWhenNotExist()
    {
        $v = [];

        $t = isset($v['foo']);
    }

    /**
     * @Revs(100000)
     * @Iterations(5)
     */
    public function benchIssetWhenExist()
    {
        $v = ['foo' => null];

        $t = isset($v['foo']);
    }

    /**
     * @Revs(100000)
     * @Iterations(5)
     */
    public function benchEmptyWhenNotExist()
    {
        $v = [];

        $t = empty($v['foo']);
    }

    /**
     * @Revs(100000)
     * @Iterations(5)
     */
    public function benchEmptyWhenExist()
    {
        $v = ['foo' => null];

        $t = empty($v['foo']);
    }

    /**
     * @Revs(100000)
     * @Iterations(5)
     */
    public function benchArrayKeyExistsWhenNotExist()
    {
        $v = [];

        $t = array_key_exists('foo', $v);
    }

    /**
     * @Revs(100000)
     * @Iterations(5)
     */
    public function benchArrayKeyExistsWhenExist()
    {
        $v = ['foo' => null];

        $t = array_key_exists('foo', $v);
    }
}
