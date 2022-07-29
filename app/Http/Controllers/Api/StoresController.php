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
use App\Models\branchs;
use Illuminate\Support\Facades\Log;

class StoresController extends Controller
{
    use GeneralTrait;
    public function getstores()
    {
        return $this->returnData('stores',store::collection(stores::whereActive(0)->get()));
    }
    public function newstore(Request $request)
    {
        log::warning($request->all());
        $limit_branch =0;
       $store =  stores::whereUserId(auth('api')->user()->id)->first();

        if($store == null){$limit_branch == 0 ; }else{ $limit_branch = $store->branch_num;}

        $num_branch =  branchs::WhereHas('stores', function($q){$q->whereUserId(auth('api')->user()->id); })->count();

        if($limit_branch> $num_branch  OR $limit_branch == 0){
            if($limit_branch == 0){
            $validator = Validator::make($request->all(), [
                    'category_id' => 'required|exists:categories,id',
                    'name' => 'required|string',
            ]);
             }
             if($limit_branch > $num_branch){
                $validator = Validator::make($request->all(), [
                    'category_id' => 'required|exists:categories,id',
                    // 'name' => 'required|string|unique:stores',
            ]);
             }
            $validatorvbranch = Validator::make($request->all(), [
                'region_id'     => 'required|string|exists:regions,id',
                'city_id'       => 'required|string|exists:cities,id',
                'address'       => 'string',
                'lat'           => 'string',
                'lng'           => 'string',
                'opentime'      => 'string',
                'closetime'     => 'string',
                'description'   => 'string',
                'phone'         => 'string',
                'phone2'        => 'string',
                'image'         => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            ]);
                if($validator->fails()){
                    log::error($validator->errors());
                    return $this->returnSuccessMessage($validator->errors(),'400');
                }
                if( $num_branch == 0)
                {
                    $store = stores::firstOrCreate(array_merge(
                                $validator->validated(),
                                ['slug'    =>  Str::slug($request->name),
                                'user_id' =>  auth('api')->user()->id]));
                }else
                {
                    $store = stores::whereUserId(auth('api')->user()->id)->first();
                }
                    if( $request->image != null)
                    {
                        $image = $this->uploadimages('branch', $request->image);
                    }else
                    {
                        $image = null;
                    }
                $store->branch()->create(array_merge($validatorvbranch->validated(),['image' => $image ,'slug'=> $store,'product_num'=>'1']));
                return $this->returnSuccessMessage(config('err_message.success.newstore'),'0');
            }else
            {

                return $this->returnError('E0001',__('notify.limit_branch'));
            }
    }
    public function storevistor($store_id)
    {
        DB::table('branchs')->whereId($store_id)->increment('view');
    }
}
