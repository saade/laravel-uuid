<?php

namespace RyanChandler\Uuid\Tests;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Orchestra\Testbench\TestCase as TestbenchTestCase;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;

abstract class TestCase extends TestbenchTestCase
{
    use LazilyRefreshDatabase;

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite.database', ':memory:');

        Schema::create('posts', function (Blueprint $table) {
            $table->string('uuid');
            $table->timestamps();
        });
    }
}
