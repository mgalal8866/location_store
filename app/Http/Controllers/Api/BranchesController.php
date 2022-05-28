<?php

namespace App\Http\Controllers\Api;

use App\Models\stores;
use App\Models\branchs;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Resources\branch;
use App\Http\Resources\onebraches;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\branchesCollection;
use App\Http\Resources\branchesCollectionbyuser;
use App\Http\Controllers\Api\Traits\GeneralTrait;

class BranchesController extends Controller
{
    use GeneralTrait;
// احضار جميع المتاجر (غير مستخدمه )
    public function getbranches()
    {
        return $this->returnData('branches',branch::collection(
        branchs::whereActive(0)->
            whereCityId(auth('api')->user()->city_id)->
            whereRegionId(auth('api')->user()->region_id)->
            latest()->
            orderBy('top', 'DESC')->
            paginate(10))->response()->getData(true),'Done');
    }

// اخر 10 متاجر تم اضافتهم
    public function lastbranch()
    {
        return  $this->returnData('branches',branch::collection(
            branchs::whereActive(0)->WhereHas('stores', function($q)
            {$q->whereActive(0);})->latest()->take(setting('app_new_branch'))->get()));
    }
// احضار الفروع  حسب الاى دى القسم والمنطقه
    public function getbranchesbyid(Request $request)
    {
        // Cache::forget('setting');
        $branches = branchs::whereActive(0)->WhereHas('stores', function($q)  use ($request)
        {$q->whereCategoryId($request->category_id)->whereActive(0);})->
            whereRegionId( $request->region_id)->
            orderBy('top', 'DESC')->
            paginate(setting('app_page_branch'));
            return $this->returnData('branches',new branchesCollection($branches) ,'Done');
    }

// احضار الفروع الخاصه بالمستخدم
    public function getbranchesbyuser(Request $request)
    {
        $branches = branchs::whereActive(0)->
        WhereHas('stores', function($q)  use ($request){
            $q->whereUserId(auth('api')->user()->id)->whereActive(0);
        })->
            latest()->
            orderBy('top', 'DESC')->
            paginate(10);
            return $this->returnData('branches',new branchesCollectionbyuser($branches) ,'Done');
    }


// احضار المخزن واحد حسب الاى دى
    public function  getbranchbyid(Request $request)
    {
        DB::table('branchs')->whereId($request->id)->increment('view');

        return $this->returnData('branches',onebraches::collection(
            branchs::whereActive(0)->
            whereId($request->id)->
            orderBy('top', 'DESC')->
            get()),'Done');
    }

// بحث عن طريق المدينه المحافظه المنتج المتجر
    public function  search($query)
    {
         $ss = branchs::whereActive(0)->orderBy('top', 'DESC')->
         WhereHas('stores', function($q) use ($query){
            $q->Where('name','like', '%'.  $query  . '%')->whereActive(0);
        })->
        orWhereHas('city', function($q1) use ($query){
            $q1->Where('city_name_ar','like', '%'.  $query  . '%')
            ->orWhere('city_name_en','like', '%'.  $query  . '%')->whereActive(0);
        })->
        orWhereHas('region', function($q3) use ($query){
            $q3->Where('region_name_ar','like', '%'.  $query  . '%')
            ->orWhere('region_name_en','like', '%'.  $query  . '%')->whereActive(0);
        })->
        orWhereHas('product', function($q4) use ($query){
            $q4->Where('name','like', '%'.  $query  . '%')->whereActive(0);
        })->
        get();


        return $this->returnData('branches',onebraches::collection($ss));
    }

//تعديل متجر
    public function branchedit(Request $request)
    {
        info($request->all());
    try {

        $branch = branchs::findOrFail($request->branch_id);

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
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            ]);

        if($validatorvbranch->fails()){
            return $this->returnError('400',$validatorvbranch->errors());
        }
        if( $request->image != null){
            $image = $this->uploadimages('branch', $request->image);
        }else{
            $image = null;
        }
        $store = $branch->update(array_merge(
                    $validatorvbranch->validated(),
                    ['slug' => Str::slug($request->name),
                    'user_id' =>  auth('api')->user()->id,
                    'image' => $image]
                ));
                return $this->returnSuccessMessage('تم تعديل المتجر بنجاح ');

    } catch (\Exception $e) {
        return  $this->returnError('E002','المتجر غير موجود');
    }
    }

//حذف متجر
    public function branchdelete(Request $request)
    {
        try {
            $branch = branchs::findOrFail($request->branch_id);
            $branch->delete();
            return $this->returnSuccessMessage('تم حذف المتجر بنجاح ');
        } catch (\Exception $e) {
            return  $this->returnError('E002','المتجر غير موجود');
        }
    }


}
