<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cities extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function region()
    {
        return $this->hasMany(regions::class);
    }
}
