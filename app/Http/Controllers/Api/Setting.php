<?php

namespace App\Http\Controllers\Api;

use App\Models\slider;
use App\Models\regions;
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
        $slider =  slider::query();
        $slider2 = $slider ;
        $slider1=  $slider->whereActive(0)->where(function ($q) use ($request) {
            $reg = regions::whereId($request->region_id)->first() ;
            if( $reg->main != null and $reg->main == true){
                $q->whereCityId($reg->city_id);
            }else{
                $q->whereRegionId($request->region_id);
            };
        });

        if(  $slider1->count() > 0 ){
            return $this->returnData('slider',ResourcesSlider::collection($slider1->get()));
        }else{

            return $this->returnData('slider',ResourcesSlider::collection(slider::whereActive(0)->whereNull('region_id')->get()));
        }
        // return $this->returnData('slider',ResourcesSlider::collection($slider));
    }
}
