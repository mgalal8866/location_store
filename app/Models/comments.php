<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getrating($branch_id)
    {
        $Branch =  comments::whereBranchId($branch_id)->get();

        return $Branch;
    }
}
