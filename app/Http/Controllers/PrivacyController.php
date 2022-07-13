<?php

namespace App\Http\Controllers;


class PrivacyController extends Controller
{
    public function index()
    {
        $privacy='';
        return view('privacy',compact(['privacy' => $privacy]));
    }

}
