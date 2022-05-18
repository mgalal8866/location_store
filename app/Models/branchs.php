<?php

namespace App\Models;

use App\Models\comments;
use Illuminate\Support\Facades\File;
use PhpParser\Node\Expr\Cast\Double;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class branchs extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];
    // protected $dates = ['deleted_at'];
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

}
