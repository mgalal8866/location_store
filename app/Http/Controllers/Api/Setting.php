<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Traits\GeneralTrait;
use App\Http\Controllers\Controller;
use App\Models\setting as ModelsSetting;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class Setting extends Controller
{
    use GeneralTrait;
    public function app(){
        return $this->returnData('Settingapp',ModelsSetting::select('splash')->get());
    }
}
