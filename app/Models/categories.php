<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    use HasFactory;
    protected $guarded = [];
    Public function scopeParent($query)
    {
        return $query -> whereNull('parent_id');
    }

    Public function childrens()
    {
            return $this->hasMany(self::class,'parent_id');
    }
    public function warehouse_product()
    {
        return $this->hasOne(Warehouse_product::class);
    }
    Public function _parent()
    {
        return $this->belongsTo(self::class,'parent_id');
    }
    public function getImageAttribute($val){
        return ($val !== null ) ? asset('assets/images/' . $val) : asset('assets/images/noimage.jpg');
    }
}
