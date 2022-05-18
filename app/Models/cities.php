<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cities extends Model
{
    use HasFactory;
    protected $guarded = [];



    Public function getNameAttribute()
    {
        $city_name = 'city_name_'.config('err_message.config.lang_for_felid');
        return $this->$city_name;
    }

    public function branch()
    {
        return $this->hasMany(branchs::class);
    }

    public function region()
    {
        return $this->hasMany(regions::class,'city_id');
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
