<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function branch()
    {
        return $this->belongsTo(branchs::class);
    }
    public function product_images()
    {
        return $this->hasMany(product_images::class);
    }

    public function getActiveBadgeAttribute()
    {
        $badge=[
            '0' => 'success',
            '1' => 'danger'
        ];
        return $badge[$this->active];
     }
     public function setStartDateAttribute($value)
     {
         if($value=='note set') {return null ;}else{return $value;}
    }
     public function getStartDateAttribute($value)
     {
         if($value==null) {return 'note set' ;}else{return $value;}
        }
    public function getExpiryDateAttribute($value)
     {
         if($value==null) {return 'note set' ;}else{return $value;}
    }
}
