<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\comments;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use PhpParser\Node\Expr\Cast\Double;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Controllers\Api\Traits\GeneralTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class branchs extends Model
{
    use GeneralTrait;
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];
    // protected $dates = ['deleted_at'];
    protected $casts = [
        'start_date' => 'datetime',
        'expiry_date'=> 'datetime'
    ];



    public function getRatingAttribute()
    {
        $count = comments::getrating($this->id)->count();
        $sum = comments::getrating($this->id)->sum('rating');
        $rating = ($count != 0)?$sum/$count:0.00;
        return $rating;
    }

    public function getImageAttribute($val){
        $path = public_path('assets/images/branch/'. $val);
        if(File::exists($path)) {
            return ($val !== null ) ? asset('assets/images/branch/' . $val) : asset('assets/images/noimage.jpg');
        }else{
            return asset('assets/images/noimage.jpg');
        }
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
        return $this->belongsTo(regions::class ,'region_id');
    }
    public function product()
    {
        return $this->hasMany(products::class,'branch_id');
    }

    public function comments()
    {
        return $this->hasMany(comments::class,'branch_id');
    }

    public function getActivebtnAttribute(){
        if($this->active == 1){
            return '<button type="button" class="btn btn-danger dropdown-toggle  btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Deactivate</button>';
        } else
        {
            return '<button type="button" class="btn btn-success dropdown-toggle  btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Active</button>';
        }
    }
    public function getAcceptbtnAttribute(){
        if($this->accept == 1){
            return '<button type="button" class="btn btn-warning dropdown-toggle  btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Waiting</button>';
        }elseif($this->accept == 2){

            return '<button type="button" class="btn btn-danger dropdown-toggle  btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Unacceptable</button>';
        }else{
            return '<button type="button" class="btn btn-success dropdown-toggle  btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Accept</button>';
        }
    }

    public function getActiveapiAttribute(){
        if($this->active == 1){
            return 'غير مفعل';
        } else
        {
            return 'مفعل';
        }
    }
    public function getAcceptapiAttribute(){
        if($this->accept == 1){
            return 'فى انتظار الموافقه';
        }elseif($this->accept == 2){

            return 'مرفوض';
        }else{
            return 'مقبول';
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
        if($this->getAttributes()['active']??null !=null){
                ($value == 0 )?($this->attributes['start_date'] = now()->toFormattedDate()) : '';
                if($this->getAttributes()['active'] != $value){
                        $this->notificationFCM('Alert ⚠️' , '📢 Your Branch Is ' . (($value == 0 )?   __('active') : __('unactive')) . ' Now',[$this->stores->user->device_token]);
                        $this->attributes['active'] = $value;
                }
        }else{
            $this->attributes['active'] = $value;
        }
    }
    public function setSlugAttribute($value){
        $this->attributes['slug'] = Str::slug($value->name . ' branch ' .   ($value->branch->count() + 1));
    }
    public function setSlug2Attribute($value){
        $this->attributes['slug'] = Str::slug($value);
    }

}
