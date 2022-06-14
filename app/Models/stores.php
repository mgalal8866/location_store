<?php

namespace App\Models;

use App\Models\User;
use App\Models\branchs;
use App\Models\categories;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class stores extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];

    public function branch()
    {
        return $this->hasMany(branchs::class);
    }

    public function user()
    {
        return $this->belongsto(User::class);
    }

    public function category()
    {
        return $this->belongsto(categories::class);
    }

    public function getActiveAttribute($val){
            if($val == 1){
                // return '<span class="badge badge-pill badge-danger">Deactivate</span> ';
                return 'Deactivate';
            }
            else
            {
                // return '<span class="badge badge-pill badge-success">Active</span>';
                return 'Active';
            }
   }


   public function getActiveBadgeAttribute()
   {
       $badge=[
           '0' => 'success',
           '1' => 'danger'
       ];
       return $badge[$this->getAttributes()['active']];

    }


}
