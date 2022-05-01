<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Traits\GeneralTrait;
use App\Http\Controllers\Controller;
use App\Http\Resources\category;
use App\Models\categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    use GeneralTrait;
    public function getcategories()
    {
      $category =  categories::parent()->select('id','name','slug','active','image')->whereActive(0)
        ->with(['childrens' => function($q){
            $q->select('id','parent_id','name','slug','active','image')->whereActive(0);
                $q->with(['childrens' => function($qq){
                    $qq->select('id','parent_id','name','slug','active','image')->whereActive(0);
                }]);
            }])->get();
        return $this->returnData('categories',$category,'success');

    }
    public function getsubcategories(Request $request)
    {
      $category =  categories::select('id','name','slug','active','image')->whereParentId($request->id)->where('parent_id','!=', null)
        ->with(['childrens' => function($q){
            $q->select('id','parent_id','name','slug','active','image')->whereActive(0);
                // $q->with(['childrens' => function($qq){
                //     $qq->select('id','parent_id','name','slug','active','image')->whereActive(0);
                // }]);
            }])->get();
        return $this->returnData('sub',$category, $category->count()>0?'Done':'Cant Find');

    }
}
