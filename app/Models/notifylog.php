<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notifylog extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        'filter' => 'array'
    ];

    public function setFilterAttribute($value)
	{

	    $this->attributes['filter'] = json_encode($value);
	}
    public function user()
    {
        return $this->belongsTo(user::class,'admin_id');
    }
}
