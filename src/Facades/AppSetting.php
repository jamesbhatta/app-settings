<?php

namespace JamesBhatta\AppSettings\Facades;

use Illuminate\Support\Facades\Facade;

class AppSetting extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'JamesBhatta\AppSettings\Models\AppSetting';
    }
}