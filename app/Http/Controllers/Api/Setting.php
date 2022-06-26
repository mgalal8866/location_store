<?php

namespace App\Http\Controllers\Api;

use App\Models\slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\setting as ModelsSetting;
use App\Http\Controllers\Api\Traits\GeneralTrait;
use App\Http\Resources\slider as ResourcesSlider;
use App\Http\Resources\setting as ResourcesSetting;
class Setting extends Controller
{
    use GeneralTrait;

    public function app()
    {
        return $this->returnData('Settingapp', new ResourcesSetting(ModelsSetting::first()));
    }

    public function slider(Request $request)
    {
        $slider =  slider::whereActive(0)->get();

        if(  $slider->where('region_id',$request->region_id)->count() > 0 ){
            
            return $this->returnData('slider',ResourcesSlider::collection($slider->where('region_id',$request->region_id)));
        }else{

            return $this->returnData('slider',ResourcesSlider::collection($slider->whereNull('region_id')));
        }
        // return $this->returnData('slider',ResourcesSlider::collection($slider));
    }
}
