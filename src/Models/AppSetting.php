<?php

namespace JamesBhatta\AppSettings\Models;

use Illuminate\Database\Eloquent\Model;

class AppSetting extends Model
{
    protected $guarded = ['id', 'updated_at'];

    protected $table = 'app_settings';

    public function set($key, $value = null)
    {
        $this->getAppSettingModel()->firstOrCreate([
            'key' => $key,
            'value' => $value
        ]);

        return $value;
    }

    public function getAppSettingModel()
    {
        return app('\JamesBhatta\AppSettings\Models\AppSetting');
    }
}
