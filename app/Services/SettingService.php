<?php

namespace App\Services;

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

class SettingService
{
    function getSetting()
    {
        return Cache::rememberForever('setting', function () {
            return Setting::pluck('value', 'key')->toArray();
        });
    }

    function setSetting()
    {
        $setting = $this->getSetting();
        config()->set('setting', $setting);
    }

    function clearCachedSetting()
    {
        Cache::forget('setting');
    }
}
