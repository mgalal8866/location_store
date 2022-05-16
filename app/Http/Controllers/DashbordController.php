<?php

namespace App\Http\Controllers;

use App\Models\branchs;
use App\Models\User;
use App\Models\fonts;
use App\Models\cities;
use App\Models\stores;
use App\Models\regions;
use App\Models\comments;
use App\Models\products;
use App\Models\categories;

class DashbordController extends Controller
{
    public function index()
    {
            $countcities = cities::count();
            $countregions = regions::count();
            $countusers = User::count();
            $countstores = stores::count();
            $countproduct = products::count();
            $countcomments = comments::count();
            $countcategory = categories::count();
            $fonts = fonts::whereIsDefault(1)->get();
        return view('admin.livewire.dashborad',compact(
            'countcities','countregions','countstores','countproduct'
            ,'countcomments','countusers' ,'countcategory','fonts'
        ));
    }



}
