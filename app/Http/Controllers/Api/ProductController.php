<?php

namespace App\Http\Controllers\Api;

use App\Models\branchs;
use App\Models\products;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Resources\product;
use App\Http\Controllers\Controller;
use Barryvdh\Debugbar\Facades\Debugbar;
use App\Http\Controllers\Api\Traits\GeneralTrait;

class ProductController extends Controller
{

    use GeneralTrait;

    public function insert_product(Request $request)
    {

        $limit_peoduct =  branchs::find($request->branch_id)->product_num;
        $num_product =  products::whereBranchId($request->branch_id)->count();
        if($limit_peoduct != $num_product){
            $product = products::create([
                    'branch_id' => $request->branch_id,
                    'name' => $request->name,
                    'slug' => Str::slug($request->name),
                    'price' => $request->price,
                    'description' => $request->description,

                ]);
                if(!empty($request->image1)) {
                        $filepath = $this->uploadimages('product', $request->image1);
                        $product->product_images()->create([
                            'img' => $filepath,
                            'is_default' => 0
                        ]);
                }
                if(!empty($request->image2)){
                        $filepath = $this->uploadimages('product', $request->image2);
                        $product->product_images()->create([
                            'img' => $filepath
                        ]);
                }
                if(!empty($request->image3)) {
                        $filepath = $this->uploadimages('product', $request->image3);
                        $product->product_images()->create([
                            'img' => $filepath
                        ]);
                }
            return $this->returnData('product', new product($product),'تم اضافة المنتج بنجاح ');
        }else{

            return $this->returnError('E0001',config('err_message.alert.limit_product'));
        }
    }

    public function get_product(Request $request)
    {
        $product = products::whereBranchId($request->branch_id)->get();
        return $this->returnData('product',  product::collection($product),'');
    }

    public function productedit(Request $request){
        $product = products::findOrFail($request->product_id);
         $product->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'price' => $request->price,
            'description' => $request->description,

        ]);
        if(!empty($request->image1)) {
                $filepath = $this->uploadimages('product', $request->image1);
                $product->product_images()->create([
                    'img' => $filepath,
                    'is_default' => 0
                ]);
        }
        if(!empty($request->image2)){
                $filepath = $this->uploadimages('product', $request->image2);
                $product->product_images()->create([
                    'img' => $filepath
                ]);
        }
        if(!empty($request->image3)) {
                $filepath = $this->uploadimages('product', $request->image3);
                $product->product_images()->create([
                    'img' => $filepath
                ]);
        }

     return $this->returnData('product', new product($product),'تم تعديل المنتج بنجاح ');

    }
    public function  productdelete(Request $request){
        try {
            $branch = products::findOrFail($request->product_id);
            $branch->delete();
            return $this->returnSuccessMessage('تم حذف المنتج بنجاح ');
        } catch (\Exception $e) {
            return  $this->returnError('E002','المنتج غير موجود');
        }
    }
}
