<?php


use App\Timetask;
use App\NullSetting;
use App\Models\setting;
use Spatie\Valuestore\Valuestore;
use Illuminate\Support\Facades\Cache;


 function generateCache()
{
    $settings = Valuestore::make(config_path('settings.json'));
    Setting::all()->each(function ($item) use ($settings) {
        $settings->put($item->key, $item->value);
    });
}
function getSettingsOf($key) {
    $settings = Valuestore::make(config_path('settings.json'));
    return $settings->get($key);
}

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
