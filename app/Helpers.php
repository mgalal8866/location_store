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
        // dd($setting);
        return $setting->{$key};
    }
}


function timetask($key)
{   $timetask = Cache::rememberForever('timetask', function () { return Timetask::make();});
    if ($timetask){

        return $timetask[$key];
    }
}
