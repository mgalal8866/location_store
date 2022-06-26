<?php

namespace App\Http\Livewire\Dashborad\Home;

use Livewire\Component;
use App\Models\products;
use Livewire\WithPagination;

class ProductWatingActive extends Component
{   use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $products = products::whereHas('branch')->whereActive(1)->paginate(5);
        return view('livewire.dashborad.home.product-wating-active',['products'=>$products]);
    }
}
