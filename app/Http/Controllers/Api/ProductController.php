<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Traits\GeneralTrait;
use App\Models\products;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\product;

class ProductController extends Controller
{

    use GeneralTrait;

    public function insert_product(Request $request)
    {
        $product = products::create([
                'branch_id' => $request->branch_id,
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'price' => $request->price,
            ]);
            if($request->has('image')) {
                foreach ($request->image as $image)
                {
                    $filepath = $this->uploadimages('product', $image);
                    $product->product_images()->create([
                        'img' => $filepath
                    ]);
                }
            }


        return $this->returnData('product', new product($product),'تم اضافة المنتج بنجاح ');

    }

    public function get_product(Request $request)
    {
        $product = products::whereBranchId($request->branch_id)->get();
        return $this->returnData('product',  product::collection($product),'');
    }
}
