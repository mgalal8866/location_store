<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Traits\GeneralTrait;
use App\Http\Controllers\Controller;
use App\Http\Resources\store;
use App\Models\stores;
use Illuminate\Http\Request;

class StoresController extends Controller
{
    use GeneralTrait;
    public function getstores()
    {
        return $this->returnData('stores',store::collection(stores::whereActive(0)->get()));
    }
}
