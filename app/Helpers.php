<?php


use App\Timetask;
use App\NullSetting;
use App\Models\setting;
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
    $timetask = Cache::rememberForever('timetask', [   'delete_store'            => '* * * * *'

    ]);

    if ($timetask) {
        return $timetask->{$key};
    }
}
