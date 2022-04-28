<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\User;
use App\Models\cities;
use App\Models\comments;
use App\Models\stores;
use App\Models\regions;
use App\Models\products;

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
        return view('admin.livewire.dashborad',compact(
            'countcities','countregions','countstores','countproduct'
            ,'countcomments','countusers' ,'countcategory'
        ));
    }
}
