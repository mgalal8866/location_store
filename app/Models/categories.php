<?php

namespace App\Models;
use Illuminate\Support\Facades\File;
use App\Models\stores;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class categories extends Model
{
    use HasFactory;
    protected $guarded = [];
    Public function scopeParent($query)
    {
        return $query -> whereNull('parent_id');
    }

    Public function childrens()
    {
            return $this->hasMany(self::class,'parent_id');
    }
    public function store()
    {
        return $this->hasMany(stores::class,'category_id');
    }
    Public function _parent()
    {
        return $this->belongsTo(self::class,'parent_id');
    }
    public function getImageAttribute($val){
        $path = public_path('assets/images/product/'. $val);
        if(File::exists($path)) {
            return ($val !== null ) ? asset('assets/images/category/' . $val) : asset('assets/images/noimage.jpg');
 
        }else{
            return asset('assets/images/noimage.jpg');
        }
          }
    public function getActiveAttribute($val){
        if($val == 1){
            return '<button type="button" class="btn btn-danger dropdown-toggle  btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Deactivate</button>';
        } else
        {
            return '<button type="button" class="btn btn-success dropdown-toggle  btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Active</button>';
        }
}
}
