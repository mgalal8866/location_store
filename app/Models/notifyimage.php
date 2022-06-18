<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class notifyimage extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getImageAttribute($val){
        $path = public_path('assets/images/notify/'. $val);
        if(File::exists($path)) {
            return ($val !== null ) ? asset('assets/images/notify/' . $val) : asset('assets/images/notify/bell.png');
        }else{
            return asset('assets/images/notify/bell.png');
        }
    }
}
