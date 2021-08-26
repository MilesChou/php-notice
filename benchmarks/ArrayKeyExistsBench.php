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
    public function benchIssetEmptyWhenNotExist()
    {
        $v = [];

        $t = isset($v['foo']) || !empty($v['foo']);
    }

    /**
     * @Revs(100000)
     * @Iterations(5)
     */
    public function benchIssetEmptyWhenExist()
    {
        $v = ['foo' => 'here'];

        $t = isset($v['foo']) || !empty($v['foo']);
    }

    /**
     * @Revs(100000)
     * @Iterations(5)
     */
    public function benchEmptyIssetWhenNotExist()
    {
        $v = [];

        $t = !empty($v['foo']) || isset($v['foo']);
    }

    /**
     * @Revs(100000)
     * @Iterations(5)
     */
    public function benchEmptyIssetWhenExist()
    {
        $v = ['foo' => 'here'];

        $t = !empty($v['foo']) || isset($v['foo']);
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
        $v = ['foo' => 'here'];

        $t = array_key_exists('foo', $v);
    }
}
