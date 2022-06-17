<?php

use App\Models\setting;
use App\NullSetting;
use Illuminate\Support\Facades\Cache;

function setting($key)
{
    $setting = Cache::rememberForever('setting', function () {
        return setting::first() ?? NullSetting::make();
    });

    if ($setting) {
        return $setting->{$key};
    }
}

function timetask($key)
{
    $setting = Cache::rememberForever('timetask',  NullSetting::make());

    if ($setting) {
        return $setting->{$key};
    }
}
