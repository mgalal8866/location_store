<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Traits\GeneralTrait;
use App\Http\Controllers\Controller;
use App\Models\about;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    use GeneralTrait;
  public function sendmessage(Request $request)
  {
  $about =   about::create([
        'message' => $request->message,
        'user_id' => auth('api')->user()->id
    ]);

    return $this->returnSuccessMessage('تم الارسال بنجاح');


  }
}
