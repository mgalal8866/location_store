<?php

namespace App\Models;

use App\Http\Controllers\Api\Traits\GeneralTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class products extends Model
{
    use HasFactory , SoftDeletes ,GeneralTrait;

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

    public function getActiveapiAttribute(){
        if($this->active == 1){
            return 'غير مفعل';
        } else
        {
            return 'مفعل';
        }
    }

    public function getStartDateAttribute($value){
        return   $value ?  Carbon::parse($value)->toFormattedDate() : '';
    }
    public function getExpiryDateAttribute($value){
        return  $value ?  Carbon::parse($value)->toFormattedDate() : '';
    }

    public function slider()
    {
        return $this->hasMany(slider::class);
    }

    public function setActiveAttribute($value){
        if($this->getAttributes()['active'] != $value){
                $this->notificationFCM('Alert ⚠️' , ('📢 Your Product Active Change ' .( $value == 0) ? __('active') : __('unactive')),[$this->branch->stores->user->device_token]);
                $this->attributes['active'] = $value;
        };
    }
}
