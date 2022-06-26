<?php

namespace App\Http\Livewire\Dashborad\Home;

use App\Models\products;
use Livewire\Component;
use Livewire\WithPagination;

class CheckExpireproduct extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $startdatep,$enddatep;
    public function mount(){
        $this->startdatep = now()->toFormattedDate();
        $this->enddatep = now()->addDays(7)->toFormattedDate();
    }
    public function render()
    {
        $productexpire = products::whereHas('branch' , function($q){
            $q->whereActive(0);
        })->whereBetween('expiry_date', [$this->startdatep, $this->enddatep ])->whereActive(0)->WhereNotNull('expiry_date')->paginate(5);
        return view('livewire.dashborad.home.check-expireproduct',['productexpire' => $productexpire]);
    }
}
