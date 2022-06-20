<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class setting extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;

    public function getSplashAttribute($val){
        return ($val !== null ) ? asset('assets/images/' . $val) : asset('assets/images/noimage.jpg');
    }
}
