<?php

namespace App\Http\Livewire\Dashborad\Store;

use App\Models\stores;
use Livewire\Component;
use Livewire\WithPagination;

class Store extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $stores = stores::with('branch')->latest()->paginate(15);
        return view('admin.livewire.dashborad.store.store',['stores'=> $stores])->layout('admin.layouts.masterdash');
    }
}
