<?php

namespace App\Http\Controllers\Api;

use App\Models\branchs;
use App\Models\products;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Resources\product;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\productbyid;
use App\Http\Controllers\Controller;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Api\Traits\GeneralTrait;

class ProductController extends Controller
{

    use GeneralTrait;

    public function insert_product(Request $request)
    {

        $limit_peoduct =  branchs::find($request->branch_id);
        if( $limit_peoduct ==null){
            return response()->json(['status' => true,'number' => '0']);
        }
        $num_product =  products::whereBranchId($request->branch_id)->count();
        if($limit_peoduct->product_num != $num_product){
            $product = products::create([
                    'branch_id' => $request->branch_id,
                    'name' => $request->name,
                    'slug' => $limit_peoduct,
                    'price' => $request->price,
                    'description' => $request->description,

                ]);
                if(!empty($request->image1)) {
                        $filepath = $this->uploadimages('product', $request->image1);
                        $product->product_images()->create([
                            'img' => $filepath,
                            'is_default' => 1,
                            'position' => 1,
                        ]);
                }
                if(!empty($request->image2)){
                        $filepath = $this->uploadimages('product', $request->image2);
                        $product->product_images()->create([
                            'img' => $filepath,
                            'position' => 2,
                        ]);
                }
                if(!empty($request->image3)) {
                        $filepath = $this->uploadimages('product', $request->image3);
                        $product->product_images()->create([
                            'img' => $filepath,
                            'position' => 3,
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
                // 'sulg'=> ['name'=> $product->branch->stores->name , 'number'=> ($product->count()+1)],
                'price' => $request->price,
                'description' => $request->description,
             ]);
        if(!empty($request->image1)) {
                $previousPath =   $product->product_images()->where('position','1')->where('is_default',1)->first()??null;
                $filepath = $this->uploadimages('product', $request->image1);
                if($previousPath == null){
                    $product->product_images()->create([
                        'img'        =>  $filepath ,
                        'is_default' => 1,
                        'position'   => 1,
                    ]);

                }else{
                    $product->product_images()->where('position','1')->where('is_default',1)->first()->update([
                        'img'        => $filepath,
                        // 'is_default' => 1,
                        // 'position'   => 1,
                    ]);
                    if($previousPath != null)Storage::disk('branch')->delete($previousPath->getAttributes()['img']);

                }
        }
        if(!empty($request->image2)){
                $previousPath =   $product->product_images()->where('position','2')->first()??null;
                     $filepath = $this->uploadimages('product', $request->image2);
                     if($previousPath == null){
                        $product->product_images()->create([
                            'img'        =>  $filepath ,
                            'is_default' => 0,
                            'position'   => 2,
                        ]);

                    }else{
                        $product->product_images()->where('position','2')->first()->update([
                            'img'      => $filepath,
                            // 'position' => 2,
                        ]);
                        if($previousPath != null)Storage::disk('branch')->delete($previousPath->getAttributes()['img']);

                    }
        }
        if(!empty($request->image3)) {
                $previousPath =   $product->product_images()->where('position','3')->first()??null;
                $filepath = $this->uploadimages('product', $request->image3);
                if($previousPath == null){
                    $product->product_images()->create([
                        'img'        =>  $filepath ,
                        'is_default' => 0,
                        'position'   => 3,
                    ]);
                }else{
                    $product->product_images()->where('position','3')->first()->update([
                        'img'      => $filepath,
                        // 'position' => 3,
                    ]);
                    if($previousPath != null)Storage::disk('branch')->delete($previousPath->getAttributes()['img']);

                }
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

    public function productcheck($branch_id)
    {
        $limit_peoduct =  branchs::find($branch_id)->product_num ;
        if( $limit_peoduct ==null){
            return response()->json(['status' => true,'number' => '0']);
        }

        $num_product =  products::whereBranchId($branch_id)->count();
        if($limit_peoduct > $num_product)
        {
            $product = products::whereBranchId($branch_id)->get();
            return response()->json([
                'data'   =>  product::collection($product),
                'status' =>  true,
                'number' =>  $num_product . ' / ' .$limit_peoduct
            ]);
        }
        else
        {
            return response()->json([
                'status' => false,
                'number' => $num_product . ' / ' .$limit_peoduct  ,
                'msg'    => config('err_message.alert.limit_product')
            ]);
        }
    }

    public function getbyid($product_id)
    {
      DB::table('products')->whereId($product_id)->increment('view');
      $product =   products::find($product_id);
      return  $this->returnData('data',new productbyid($product));
    }

}
