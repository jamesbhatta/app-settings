<?php

namespace JamesBhatta\AppSettings;

use Illuminate\Support\ServiceProvider;
use JamesBhatta\AppSettings\Facades\Setting;

class AppSettingServiceProvider extends ServiceProvider
{
    public function boot()
    {
        dd('tetx');
        // 
    }

    public function register()
    {
        $this->app->bind('setting', function($app) {
            return new Setting();
        });
    }
}
