<?php

namespace App\Models;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sliderfront extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function getImageAttribute($val){
        $path = public_path('assets/images/sliderfront/'. $val);
        if(File::exists($path)) {
             return ($val !== null ) ? asset('assets/images/sliderfront/' . $val) : asset('assets/images/noimage.jpg');
        }else{
             return asset('assets/images/noimage.jpg');
        }
    }
}
