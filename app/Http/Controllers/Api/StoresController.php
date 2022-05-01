<?php

namespace App\Http\Controllers\Api;

use App\Models\stores;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Resources\store;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Api\Traits\GeneralTrait;


class StoresController extends Controller
{
    use GeneralTrait;
    public function getstores()
    {
        return $this->returnData('stores',store::collection(stores::whereActive(0)->get()));
    }


    public function newstore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|unique:stores',

        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        // return $validator->validated();
        $store = stores::create(array_merge(
                    $validator->validated(),
                    ['slug' => Str::slug($request->name),
                    'user_id' =>  auth('api')->user()->id]
                ));

                $validatorvbranch = Validator::make($request->all(), [
                    'region_id'=>'required|string|exists:regions,id',
                    'city_id'=>'required|string|exists:cities,id',
                    'address' =>'string',
                    'lat' => 'string',
                    'lng' => 'string',
                    'opentime' => 'string',
                    'closetime' => 'string',
                    'description' => 'string',
                    'phone' => 'string',
                    'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

                ]);
                $store->branch()->create(array_merge(
                    $validatorvbranch->validated()
                ));

        return $this->returnSuccessMessage(config('err_message.success.newstore'),'0');
    }


    public function storevistor($store_id)
    {
        DB::table('branchs')->whereId($store_id)->increment('view');
    }
}
