<?php

namespace JamesBhatta\AppSettings;

use Illuminate\Support\ServiceProvider;
use JamesBhatta\AppSettings\Facades\Setting;

class AppSettingServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishMigrations();
    }

    public function register()
    {
        $this->app->bind('setting', function ($app) {
            return new Setting();
        });

        // load migrations
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }

    protected function publishMigrations()
    {
        if ($this->app->runningInConsole()) {
            if (!class_exists('CreateAppSettingsTable')) {
                $this->publishes([
                    __DIR__ . '/../database/migrations/create_app_settings.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . 'create_app_settings.php'),
                ], 'migrations');
            }
        }
    }
}
