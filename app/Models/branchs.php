<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class branchs extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function getImageAttribute($val){
        return ($val !== null ) ? asset('assets/images/' . $val) : asset('assets/images/noimage.jpg');
    }
    public function stores()
    {
        return $this->belongsTo(stores::class);
    }
    public function city()
    {
        return $this->belongsTo(cities::class);
    }
    public function region()
    {
        return $this->belongsTo(regions::class);
    }
    public function product()
    {
        return $this->hasMany(products::class);
    }

    public function comments()
    {
        return $this->belongsTo(comments::class);
    }
}
