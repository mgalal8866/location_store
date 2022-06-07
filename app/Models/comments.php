<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = ['rating' => 'decimal:2'];


    public function getrating($branch_id)
    {
        $Branch =  comments::whereBranchId($branch_id)->get();
        return $Branch;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function branch()
    {
        return $this->belongsTo(branchs::class);
    }
}
