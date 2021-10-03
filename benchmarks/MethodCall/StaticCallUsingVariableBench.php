<?php

namespace Benchmarks\MethodCall;

use PhpBench\Benchmark\Metadata\Annotations\AfterMethods;
use PhpBench\Benchmark\Metadata\Annotations\BeforeMethods;
use PhpBench\Benchmark\Metadata\Annotations\Iterations;
use PhpBench\Benchmark\Metadata\Annotations\Revs;

/**
 * @BeforeMethods({"init"})
 * @AfterMethods({"tearDown"})
 */
class StaticCallUsingVariableBench
{
    /**
     * @var Stub
     */
    private $object;

    public function init()
    {
        $this->object = new Stub();
    }

    public function tearDown()
    {
        $this->object = null;
    }

    /**
     * @Revs(100000)
     * @Iterations(5)
     */
    public function bench()
    {
        $var = 'dummy';

        Stub::$var('test');
    }
}