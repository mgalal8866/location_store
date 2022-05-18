<?php

namespace App\Models;

use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class product_images extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function getImgAttribute($val){
        $path = public_path('assets/images/product/'. $val);
        if(File::exists($path)) {
         return ($val !== null ) ? asset('assets/images/product/' . $val) : asset('assets/images/noimage.jpg');
        }else{
            return asset('assets/images/noimage.jpg');
        }
    }

    public function product()
    {
        return $this->belongsTo(products::class);
    }
}
