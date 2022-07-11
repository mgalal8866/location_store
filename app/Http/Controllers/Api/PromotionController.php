<?php

namespace App\Http\Controllers\Api;


use App\Models\promotion;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Api\Traits\GeneralTrait;
use App\Http\Resources\promotion as ResourcesPromotion;

class PromotionController extends Controller
{
    use GeneralTrait;
  public function getpromotion()
  {
    return $this->returnData('promotion', ResourcesPromotion::collection(promotion::get()) );


  }
}
