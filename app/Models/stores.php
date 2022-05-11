<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stores extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function branch()
    {
        return $this->hasMany(branchs::class);
    }

    public function user()
    {
        return $this->belongsto(user::class);
    }
    public function category()
    {
        return $this->belongsto(categories::class);
    }

    public function getActiveAttribute($val){
            if($val == 0){
                return '<span class="badge badge-pill badge-danger">Deactivate</span> ';
            }
            else
            {
                return  '<span class="badge badge-pill badge-success">Active</span>';
            }
   }


}
