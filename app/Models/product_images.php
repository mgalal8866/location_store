<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_images extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function getImgAttribute($val){
        return ($val !== null ) ? asset('assets/images/product/' . $val) : asset('assets/images/noimage.jpg');
    }

    public function product()
    {
        return $this->belongsTo(products::class);
    }
}
