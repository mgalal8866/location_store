<?php

namespace App\Http\Livewire\Dashborad\Store;

use App\Models\stores;
use Livewire\Component;
use Livewire\WithPagination;

class Store extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
        public $pages=10;

    public function render()
    {
        $stores = stores::with('branch')->latest()->paginate($this->pages);
        return view('livewire.dashborad.store.viewstore',['stores'=> $stores])->layout('admin.layouts.masterdash');
    }
}
