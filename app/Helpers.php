<?php
use App\Timetask;
use App\NullSetting;
use App\Models\setting;
use Spatie\Valuestore\Valuestore;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;


if (! function_exists('deleteimage')) {
    function deleteimage($path,$image)
    {
        Storage::disk($path)->delete($image);
    }
}

    if (! function_exists('generateCache')) {
        function generateCache()
        {
            $settings2 = Valuestore::make(config_path('settings.json'));
            Setting::all()->each(function ($item) use ($settings2) {
                $settings2->put($item->key, $item->value);
            });
            return '';
        }
    }
    if (! function_exists('getSettingsOf')) {
        function getSettingsOf($key) {
            $settings1 = Valuestore::make(config_path('settings.json'));
            return $settings1->get($key);
        }
    }
    if (! function_exists('gettaskvar')) {
        function gettaskvar($key) {
            $gettaskvar = Valuestore::make(config_path('taskvar.json'));
            return $gettaskvar->get($key);
        }
    }
    if (! function_exists('setting')) {
        function setting($key)
        {
            $setting = Cache::rememberForever('setting', function () {
                return setting::first() ?? NullSetting::make();
            });
            if ($setting) {
                return $setting->{$key};
            }
        }
    }
    if (! function_exists('timetask')) {
        function timetask($key)
        {   $timetask = Cache::rememberForever('timetask', function () { return Timetask::make();});
            if ($timetask){
                return $timetask[$key];
        }
    }
}
