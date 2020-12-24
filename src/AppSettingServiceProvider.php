<?php

namespace JamesBhatta\AppSettings;

use Illuminate\Support\ServiceProvider;
use JamesBhatta\AppSettings\Facades\Setting;

class AppSettingServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // 
    }

    public function register()
    {
        $this->app->bind('setting', function($app) {
            return new Setting();
        });

        // load migrations
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }
}
