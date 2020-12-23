<?php

namespace JamesBhatta\AppSettings\Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Cache;
use JamesBhatta\AppSettings\Facades\AppSetting as FacadesAppSetting;
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

    /** @test */
    public function it_updated_settings_if_key_exists()
    {
        $this->appSettings->set('name', 'James Bhatta');
        $this->assertDatabaseHas('app_settings', ['key' => 'name', 'value' => 'James Bhatta']);

        $this->appSettings->set('name', 'James');
        $this->assertDatabaseHas('app_settings', ['key' => 'name', 'value' => 'James']);
        $this->assertDatabaseMissing('app_settings', ['key' => 'name', 'value' => 'James Bhatta']);
    }

    /** @test */
    public function it_can_get_setting_by_key()
    {
        $this->appSettings->set('name', 'James Bhatta');

        $this->assertEquals('James Bhatta', $this->appSettings->get('name'));
    }

    /** @test */
    public function it_stores_array_as_individual_key_value_pairs()
    {
        $this->appSettings->set([
            'name' => 'James Bhatta',
            'profession' => 'programmer',
            'website' => 'manojbhatta.com.np'
        ]);

        $this->assertCount(3, $this->appSettings->allSettings());
        $this->assertEquals('James Bhatta', $this->appSettings->get('name', null, $fresh = true));
        $this->assertEquals('programmer', $this->appSettings->get('profession'));
        $this->assertEquals('manojbhatta.com.np', $this->appSettings->get('website'));
    }

    /** @test */
    public function it_can_check_of_certail_key_exists()
    {
        $this->appSettings->set('name', 'James Bhatta');

        $this->assertTrue($this->appSettings->has('name'));
        $this->assertFalse($this->appSettings->has('unknown_key'));
    }

    /** @test */
    public function it_caches_settings()
    {
        $this->appSettings->set('name', 'James Bhatta');

        Cache::shouldReceive('rememberForever')
            ->once();

        $this->appSettings->allsettings();
    }

    /** @test */
    public function it_can_remove_a_key_from_setting()
    {
        $this->appSettings->set('name', 'James Bhatta');

        $this->appSettings->remove('name');

        $this->assertCount(0, $this->appSettings->allSettings());
    }

    /** @test */
    public function app_settings_can_be_accessed_using_facades()
    {
        FacadesAppSetting::set('name', 'James Bhatta');

        $this->assertEquals('James Bhatta', FacadesAppSetting::get('name'));
    }
}
