<?php

namespace Notice;

use PHPUnit_Framework_TestCase;

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
}
