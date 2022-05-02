<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifymobile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    'mobile',
    'password',
    'gender',
    'name',
    'ip_address',
    'device_token',
    'city_id',
    'region_id',
    'image',];
    public function city()
    {
        return $this->belongsTo(cities::class);
    }

    public function region()
    {
        return $this->belongsTo(regions::class);
    }
    public function getImageAttribute($val){
        return ($val !== null ) ? asset('assets/images/' . $val) : asset('assets/images/noimage.jpg');
    }
    protected $hidden = [
        'password', 'remember_token',
    ];


    protected $casts = [
        'mobile_verified_at' => 'datetime',
    ];

    public function getGenderAttribute($val)
    {
        if($val == 0){
            return 'ذكر';
        }else{
            return 'أنثى';
        };
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
