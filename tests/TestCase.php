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

        include_once __DIR__ . '/../database/migrations/create_app_settings_table.stub';

        (new \CreateAppSettingsTable)->up();
    }
  
}
