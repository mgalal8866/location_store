<?php

namespace App\Models;

use App\Models\comments;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use PhpParser\Node\Expr\Cast\Double;

class branchs extends Model
{
    use HasFactory;
    protected $guarded = [];
    // protected $casts = [
    //     'rating' => 'decimal:2',
    // ];



    public function getRatingAttribute()
    {
        $count = comments::getrating($this->id)->count();
        $sum = comments::getrating($this->id)->sum('rating');
        $rating = ($count != 0)?$sum/$count:0.00;
        return $rating;
    }

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
        return $this->hasMany(products::class,'branch_id');
    }

    public function comments()
    {
        return $this->hasMany(comments::class,'branch_id');
    }
}
