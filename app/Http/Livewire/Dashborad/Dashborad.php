<?php

namespace App\Http\Livewire\Dashborad;

use App\Models\User;
use App\Models\fonts;
use App\Models\cities;
use App\Models\stores;
use App\Models\branchs;
use App\Models\regions;
use Livewire\Component;
use App\Models\comments;
use App\Models\products;
use App\Models\categories;

class Dashborad extends Component
{

    public $topcity=[],$topregions =[] , $countcities ,$countregions,$countusers,$countstores,$countbranchs,$countproduct,$countcomments,$countcategory,$fonts;

    public function mount(){
        $this->topregions           = regions::whereHas('branch')->withCount(['branch'])->orderBy('branch_count', 'desc')->take(5)->get();
        $this->topcity              = cities::whereHas('branch')->withCount(['branch'])->orderBy('branch_count', 'desc')->take(5)->get();
        $this->TopStoreHasBranch    = stores::whereHas('branch')->withCount(['branch'])->orderBy('branch_count', 'desc')->take(5)->get();
        $this->TopBranchHasProduct  = branchs::whereHas('product')->withCount(['product'])->orderBy('product_count', 'desc')->take(5)->get();
        $this->countcities          = cities::count();
        $this->countregions         = regions::count();
        $this->countusers           = User::count();
        $this->countstores          = stores::count();
        $this->countbranchs         = branchs::count();
        $this->countproduct         = products::count();
        $this->countcomments        = comments::count();
        $this->countcategory        = categories::count();
        $this->fonts = fonts::whereIsDefault(1)->get();
    }

    public function render()
    {
        return view('livewire.dashborad.dashborad')->layout('admin.layouts.masterdash');
    }
}
