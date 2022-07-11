<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class promotion extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function promotion_images()
    {
        return $this->hasMany(promotion_image::class);
    }
}
