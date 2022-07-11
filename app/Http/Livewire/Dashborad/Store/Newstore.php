<?php

namespace App\Http\Livewire\Dashborad\Store;

use App\Models\cities;
use App\Models\regions;
use Livewire\Component;
use App\Models\categories;

class Newstore extends Component
{
    public $categorys,$selectcity,$citys,$regions,$subcategorys ,$branchlist,$selectcategory,
    $selectsubcategory;
    public function mount()
    {
        $this->categorys    = categories::all();
        $this->citys        = cities::all();

    }
    public function updatedSelectcity($value)
    {
        $this->regions = regions::whereCityId($value)->get();
    }
    public function updatedSelectcategory($id)
    {
        $data = categories::whereParentId($id)->get();

        if( $data->count() == 0)
        {
            $this->subcategorys = null;
            $this->selectsubcategory = null;
        }else
        {
            $this->selectsubcategory = null;
            $this->subcategorys =  $data;
        }
    }
    public function render()
    {
        return view('livewire.dashborad.store.newstore')->layout('admin.layouts.masterdash');
    }
}
