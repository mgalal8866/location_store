<?php

namespace App\Http\Livewire\Dashborad\Store;

use App\Models\stores;
use Livewire\Component;
use Livewire\WithPagination;

class Store extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $pages, $status;



        public function filterStoreByStatus($status = null)
        {
            $this->resetPage();

            $this->status = $status;

        }

    public function render()
    {
        $storeall =  stores::count();
        $storeactive =  stores::whereActive(0)->count();
        $storedisactive =  stores::whereActive(1)->count();
        $stores = stores::with('branch')->when($this->status, function ($query, $status) {
            return $query->where('active', $status);
        })->latest()->paginate($this->pages);


        return view('livewire.dashborad.store.viewstore',
        ['stores'=> $stores,'storeactive'=> $storeactive,'storedisactive'=> $storedisactive,'storeall'=>$storeall])
        ->layout('admin.layouts.masterdash');
    }
}
