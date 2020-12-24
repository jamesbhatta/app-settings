<?php

if (!function_exists('settings')) {
    function appSettings($key = null, $default = null, $fresh = null)
    {
        $appSetting = app()->make('\JamesBhatta\AppSettings\Models\AppSetting');

        if (is_null($key)) {
            return $appSetting;
        }

        if (is_array($key)) {
            return $appSetting->set($key);
        }

        return $appSetting->get($key, $default, $fresh);
    }
}
