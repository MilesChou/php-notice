<?php

namespace Notice;

use PHPUnit_Framework_TestCase;
use stdClass;

class CallableTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function selfRunAnonymousFunction()
    {
        $actual = call_user_func(function () {
            $var = 'something';
            // Do something...

            return true;
        });

        // Function will call
        $this->assertTrue($actual);

        // $var is not set
        $this->assertNotTrue(isset($var));
    }

    /**
     * @test
     */
    public function useJavascriptStyle()
    {
        /* PHP 7.0 can run this
            $actual = (function () {
                return false;
            })();
        */

        // Compatibility in 5.x
        $actual = call_user_func(function () {
            return true;
        });

        $this->assertTrue($actual);
    }

    /**
     * @test
     */
    public function useJavascriptStyleNested()
    {
        /* PHP 7.0 can run this
            $actual = call_user_func(function () {
                return function () {
                    return false;
                };
            })();
        */

        // Compatibility in 5.x
        $actual = call_user_func(call_user_func(function () {
            return function () {
                return true;
            };
        }));

        $this->assertTrue($actual);
    }

    /**
     * @test
     */
    public function useAnotherFluentPattern()
    {
        $objA = new stdClass();
        $objB = new stdClass();
        $objC = new stdClass();

        /* PHP 7.0 can run this
            fluentFunc($objA, 'foo', 'barA')($objB, 'foo', 'barB')($objC, 'foo', 'barC');
        */

        // Compatibility in 5.x , but not good
        call_user_func(
            call_user_func(
                fluentFunc(
                    $objA,
                    'foo',
                    'barA'
                ),
                $objB,
                'foo',
                'barB'
            ),
            $objC,
            'foo',
            'barC'
        );

        $this->assertAttributeEquals('barA', 'foo', $objA);
        $this->assertAttributeEquals('barB', 'foo', $objB);
        $this->assertAttributeEquals('barC', 'foo', $objC);
    }
}

/**
 * @param stdClass $object
 * @param string $key
 * @param mixed $value
 * @return callable
 */
function fluentFunc($object, $key, $value)
{

    $object->$key = $value;

    return __NAMESPACE__ . '\\fluentFunc';
}
