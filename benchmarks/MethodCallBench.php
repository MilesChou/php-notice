<?php

namespace Benchmarks;

use Benchmarks\MethodCall\Stub;
use PhpBench\Benchmark\Metadata\Annotations\AfterMethods;
use PhpBench\Benchmark\Metadata\Annotations\BeforeMethods;
use PhpBench\Benchmark\Metadata\Annotations\Revs;
use ReflectionClass;

/**
 * @BeforeMethods({"init"})
 * @AfterMethods({"tearDown"})
 */
class MethodCallBench
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
     */
    public function benchObjectCall()
    {
        $this->object->dummy('test');
    }

    /**
     * @Revs(100000)
     */
    public function benchObjectCallUsingVariable()
    {
        $var = 'dummy';

        $this->object->$var('test');
    }

    /**
     * @Revs(100000)
     */
    public function benchObjectCallable()
    {
        $target = [$this->object, 'dummy'];
        $target('test');
    }

    /**
     * @Revs(100000)
     */
    public function benchObjectCallableWithCallUserFunc()
    {
        call_user_func([$this->object, 'dummy'], 'test');
    }

    /**
     * @Revs(100000)
     */
    public function benchObjectCallableWithCallUserFuncArray()
    {
        call_user_func_array([$this->object, 'dummy'], ['test']);
    }

    /**
     * @Revs(100000)
     */
    public function benchObjectReflectionCall()
    {
        $target = (new ReflectionClass($this->object))->getMethod('dummy');
        $target->invoke($this->object, 'test');
    }

    /**
     * @Revs(100000)
     */
    public function benchObjectReflectionCallArray()
    {
        $target = (new ReflectionClass($this->object))->getMethod('dummy');
        $target->invokeArgs($this->object, ['test']);
    }

    /**
     * @Revs(100000)
     */
    public function benchStaticCall()
    {
        Stub::dummy('test');
    }

    /**
     * @Revs(100000)
     */
    public function benchStaticCallWithVariable()
    {
        $var = 'dummy';

        Stub::$var('test');
    }

    /**
     * @Revs(100000)
     */
    public function benchStaticCallable()
    {
        $target = [Stub::class, 'dummy'];
        $target('test');
    }

    /**
     * @Revs(100000)
     */
    public function benchStaticCallableAndCallUserFunc()
    {
        call_user_func([Stub::class, 'dummy'], 'test');
    }

    /**
     * @Revs(100000)
     */
    public function benchStaticCallableAndCallUserFuncArray()
    {
        call_user_func_array([Stub::class, 'dummy'], ['test']);
    }

    /**
     * @Revs(100000)
     */
    public function benchStaticReflectionCall()
    {
        $target = (new ReflectionClass(Stub::class))->getMethod('dummy');
        $target->invoke(null, 'test');
    }

    /**
     * @Revs(100000)
     */
    public function benchStaticReflectionCallArray()
    {
        $target = (new ReflectionClass(Stub::class))->getMethod('dummy');
        $target->invokeArgs(null, ['test']);
    }
}