<?php

namespace App\Http\Livewire\Dashborad\Branch;

use Livewire\Component;

class Branch extends Component
{
    public function render()
    {
        // $stores = stores::with('branch')->latest()->paginate(1);
        return view('livewire.dashborad.branch.branch')->layout('admin.layouts.masterdash');

    }
}
