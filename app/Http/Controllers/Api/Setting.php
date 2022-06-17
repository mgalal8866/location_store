<?php

namespace App\Http\Controllers\Api;

use App\Models\slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\setting as ModelsSetting;
use App\Http\Controllers\Api\Traits\GeneralTrait;
use App\Http\Resources\slider as ResourcesSlider;

class Setting extends Controller
{
    use GeneralTrait;

    public function app()
    {
        return $this->returnData('Settingapp',ModelsSetting::select('splash')->get());
    }

    public function slider(Request $request)
    {
        if($request->region_id == null ){
            $slider = slider::whereActive(0)->get();
        }else{
            $slider = slider::whereActive(0)->where('region_id',$request->region_id)->get();
        }

        return $this->returnData('slider',ResourcesSlider::collection($slider));
    }
}
