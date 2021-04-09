<?php

namespace Thotam\ThotamPlus\Tests;

use Orchestra\Testbench\TestCase;
use Thotam\ThotamPlus\ThotamPlusServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [ThotamPlusServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
