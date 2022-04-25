<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Traits\GeneralTrait;
use App\Http\Controllers\Controller;
use App\Models\cities;
use Illuminate\Http\Request;
use App\Http\Resources\city;
use App\Http\Resources\region;
use App\Models\regions;

class CitiesController extends Controller
{
    use GeneralTrait;
    public function getcity(){
        return $this->returnData('city',city::collection(cities::all()),'');
    }
    public function getregions(Request $request){
       return$this->returnData('regions',region::collection(regions::whereCityId($request->id_city)->get()),'');
    }
}
