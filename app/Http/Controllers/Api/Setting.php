<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Traits\GeneralTrait;
use App\Http\Controllers\Controller;
use App\Http\Resources\slider as ResourcesSlider;
use App\Models\setting as ModelsSetting;
use App\Models\slider;

class Setting extends Controller
{
    use GeneralTrait;

    public function app()
    {
        return $this->returnData('Settingapp',ModelsSetting::select('splash')->get());
    }

    public function slider()
    {
        return $this->returnData('slider',ResourcesSlider::collection(slider::whereActive(0)->get()));
    }
}
