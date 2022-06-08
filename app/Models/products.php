<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class products extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        'start_date' => 'datetime',
        'expiry_date'=> 'datetime'
    ];


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
    //  public function setStartDateAttribute($value)
    //  {
    //      if($value=='note set') {return null ;}else{return $value;}
    // }
    //  public function getStartDateAttribute($value)
    //  {
    //      if($value==null) {return 'note set' ;}else{return $value;}
    //     }
    // public function getExpiryDateAttribute($value)
    //  {
    //      if($value==null) {return 'note set' ;}else{return $value;}
    // }
    // public function setStartDateAttribute($value){
    //     return  Carbon::parse($value)->toFormattedDate();
    // }
    // public function setExpiryDateAttribute($value){
    //     return  Carbon::parse($value)->toFormattedDate();
    // }

    public function getStartDateAttribute($value){
        return   $value ?  Carbon::parse($value)->toFormattedDate() : '';
    }
    public function getExpiryDateAttribute($value){
        return  $value ?  Carbon::parse($value)->toFormattedDate() : '';
    }
}
