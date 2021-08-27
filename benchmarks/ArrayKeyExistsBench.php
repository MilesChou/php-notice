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
    public function benchIssetOrNotEmptyWhenNotExist()
    {
        $v = [];

        $t = isset($v['foo']) || !empty($v['foo']);
    }

    /**
     * @Revs(100000)
     * @Iterations(5)
     */
    public function benchIssetOrNotEmptyWhenExist()
    {
        $v = ['foo' => null];

        $t = isset($v['foo']) || !empty($v['foo']);
    }

    /**
     * @Revs(100000)
     * @Iterations(5)
     */
    public function benchIssetAndNotNullWhenNotExist()
    {
        $v = [];

        $t = isset($v['foo']) && (null !== $v['foo']);
    }

    /**
     * @Revs(100000)
     * @Iterations(5)
     */
    public function benchIssetAndNotNullWhenExist()
    {
        $v = ['foo' => null];

        $t = isset($v['foo']) && (null !== $v['foo']);
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
