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
        $functionReturn = call_user_func(function () {
            $var = 'something';
            // Do something...

            return true;
        });

        // Function will call
        $this->assertTrue($functionReturn);

        // $var is not set
        $this->assertNotTrue(isset($var));
    }
}
