<?php

namespace JamesBhatta\AppSettings\Tests;

use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    /**
     * @param \Illuminate\Foundation\Application $app
     */
    public function setUp(): void
    {
        parent::setup();

        include_once __DIR__ . '/../database/migrations/2020_12_23_173602_create_app_settings_table.php';

        (new \CreateAppSettingsTable)->up();
    }

    // protected function getEnvironmentSetUp($app)
    // {
    //     $app['config']->set('database.default', 'testbench');
    //     $app['config']->set('database.connections.testbench', [
    //         'driver' => 'sqlite',
    //         'database' => ':memory:',
    //         'prefix' => '',
    //     ]);
    // }

  
}
