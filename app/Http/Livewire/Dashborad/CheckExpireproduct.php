<?php

namespace App\Http\Livewire\Dashborad;

use App\Models\products;
use Livewire\Component;
use Livewire\WithPagination;

class CheckExpireproduct extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $productexpire = products::whereHas('branch' , function($q){
            $q->whereActive(0);
        })->whereActive(0)->WhereNotNull('expiry_date')->paginate(5);
        return view('livewire.dashborad.check-expireproduct',['productexpire' => $productexpire]);
    }
}
