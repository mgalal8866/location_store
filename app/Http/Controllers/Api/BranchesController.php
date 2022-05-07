<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\Traits\GeneralTrait;
use App\Http\Resources\branch;
use App\Http\Resources\onebraches;
use App\Models\branchs;

class BranchesController extends Controller
{
    use GeneralTrait;
    public function getbranches()
    {
        return $this->returnData('branches',branch::collection(
        branchs::whereActive(0)->
        whereCityId(auth('api')->user()->city_id)->
        whereRegionId(auth('api')->user()->region_id)
        ->latest()->paginate(10))->response()->getData(true),'Done');
    }

    public function getbranchesbyid(Request $request)
    {
       
        return $this->returnData('branches',branch::collection(
        branchs::whereActive(0)->WhereHas('stores', function($q)  use ($request){
            $q->whereCategoryId($request->category_id);
        })->whereCityId(auth('api')->user()->city_id)->
        whereRegionId(auth('api')->user()->region_id)
        ->latest()->paginate(10))->response()->getData(true),'Done');
    }

    public function  getbranchbyid(Request $request)
    {
        return $this->returnData('branches',onebraches::collection(
            branchs::whereActive(0)->
            whereId($request->id)
            ->get()),'Done');
    }

    public function  search($query)
    {
         $ss = branchs::whereActive(0)->
         WhereHas('stores', function($q) use ($query){
            $q->Where('name','like', '%'.  $query  . '%');
        })->
        orWhereHas('city', function($q1) use ($query){
            $q1->Where('city_name_ar','like', '%'.  $query  . '%')
            ->orWhere('city_name_en','like', '%'.  $query  . '%');
        })->
        orWhereHas('region', function($q3) use ($query){
            $q3->Where('region_name_ar','like', '%'.  $query  . '%')
            ->orWhere('region_name_en','like', '%'.  $query  . '%');
        })->
        orWhereHas('product', function($q4) use ($query){
            $q4->Where('name','like', '%'.  $query  . '%');
        })->
        get();


        return $this->returnData('branches',onebraches::collection($ss));
    }

}
