<?php

namespace App\Http\Livewire\Dashborad;

use App\Models\cities;
use Livewire\Component;

class Citits extends Component
{
    public function render()
    {
        $cities = cities::all();
        return view('admin.livewire.dashborad.city.citits',['cities'=> $cities])->layout('admin.layouts.masterdash');
    }
}
