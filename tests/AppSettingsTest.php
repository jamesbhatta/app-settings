<?php

namespace JamesBhatta\AppSettings\Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use JamesBhatta\AppSettings\Models\AppSetting;

class AppSettingsTests extends TestCase
{
    use RefreshDatabase;

    protected $appSettings;

    public function setUp(): void 
    {
        parent::setup();
        $this->appSettings = new AppSetting();
    }

    /** @test */
    public function a_new_app_setting_is_stored()
    {
        // $this->withoutExceptionHandling();

        $this->appSettings->set('name', 'James Bhatta');
        $this->assertDatabaseHas('app_settings', ['key' => 'name', 'value' => 'James Bhatta']);
    }
}
