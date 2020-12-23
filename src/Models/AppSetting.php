<?php

namespace JamesBhatta\AppSettings\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class AppSetting extends Model
{
    protected $guarded = ['id', 'updated_at'];

    protected $table = 'app_settings';

    protected $cacheKey = 'jb-app-settings';

    public function set($key, $value = null)
    {
        if (is_array($key)) {
            foreach ($key as $k => $v) {
                $this->set($k, $v);
            }
            return true;
        }

        $appSetting = $this->getAppSettingModel()->firstOrnew([
            'key' => $key
        ]);

        $appSetting->key = $key;
        $appSetting->value = $value;
        $appSetting->save();

        $this->flushCache();

        return $value;
    }

    public function allSettings($fresh = false)
    {
        if ($fresh) {
            return $this->getModelQuery()->pluck('value', 'key');
        }

        return Cache::rememberForever($this->getCacheKey(), function () {
            return $this->getModelQuery()->pluck('value', 'key');
        });
    }

    public function get($key, $default = null, $fresh = false)
    {
        return $this->allSettings($fresh)->get($key, $default);
    }

    public function has($key)
    {
        return $this->allSettings()->has($key);
    }

    public function remove($key)
    {
        $removed = $this->getAppSettingModel()->where('key', $key)->delete();
        
        $this->flushCache();

        return $removed;
    }

    public function flushCache()
    {
        return Cache::forget($this->getCacheKey());
    }

    public function getAppSettingModel()
    {
        return app('\JamesBhatta\AppSettings\Models\AppSetting');
    }

    public function getModelQuery()
    {
        return $this->getAppSettingModel();
    }

    public function getCacheKey()
    {
        return $this->cacheKey;
    }
}
