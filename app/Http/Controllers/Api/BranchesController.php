<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\Traits\GeneralTrait;
use App\Http\Resources\branch;
use App\Models\branchs;

class BranchesController extends Controller
{
    use GeneralTrait;
    public function getbranches()
    {
        return $this->returnData('branches',branch::collection(branchs::whereActive(0)->get()));
    }
}
