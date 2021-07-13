<?php

namespace phuongna\onesk\Tests;

use phuongna\onesk\Facades\onesk;
use phuongna\onesk\ServiceProvider;
use Orchestra\Testbench\TestCase;

class oneskTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [ServiceProvider::class];
    }

    protected function getPackageAliases($app)
    {
        return [
            'onesk' => onesk::class,
        ];
    }

    public function testExample()
    {
        $this->assertEquals(1, 1);
    }
}
