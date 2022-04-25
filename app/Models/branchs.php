<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class branchs extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function store()
    {
        return $this->belongsTo(stores::class);
    }
}
