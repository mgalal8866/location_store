<?php

namespace App\Http\Controllers;

use App\Models\setting;
use App\Models\sliderfront;
use Illuminate\Http\Request;

class FrontController extends Controller
{
   public function index()
   {
    $setting = setting::get();
    $sliderfront = sliderfront::get();
   return view('Front.layout',compact('setting','sliderfront'));
    }
}
