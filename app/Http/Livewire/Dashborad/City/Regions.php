<?php

namespace App\Http\Livewire\Dashborad\City;

use Livewire\Component;
use App\Models\regions as ModelsRegions;



class Regions extends Component
{

    public $idr = null, $title,$region,  $nameen , $namear,$modeedit = false ,$idedit=null,$idcity=null ;

    public function mount($id = null)
    {
        $this->idr = $id;
    }
    public function deletregion($state){

        if($state == 'soft'){
            $this->region->delete();
        }elseif($state == 'hard'){
            $this->region->forceDelete();
        }
        $this->reset();
    }
    public function delete($id){
        $this->region = ModelsRegions::find($id);
    }
    public function updatedModeedit(){
        if($this->modeedit == false){
             $this->title = __('new_region');
             $this->reset('nameen');
             $this->reset('namear');
        }
    }

    public function editregion($id)
    {
       $this->title = __('edit_region');
       $this->region = ModelsRegions::find($id);
       $this->nameen    = $this->region->region_name_en;
       $this->namear    = $this->region->region_name_ar;
       $this->modeedit  = true;
    }
    public function newcity()
    {
        $this->validate([
            'namear' => 'required',
            'nameen' => 'required'
        ]);

        if($this->modeedit == false){
            ModelsRegions::create(['region_name_ar' =>  $this->namear ,'region_name_en'=> $this->nameen]);
            $this->dispatchBrowserEvent('successmsg',['msg' => 'Success Add']);
        }elseif($this->modeedit == true){
            $this->region->update(['region_name_ar' =>  $this->namear ,'region_name_en'=> $this->nameen]);
            $this->dispatchBrowserEvent('successmsg',['msg' => 'Success Edit']);
        }
        $this->reset();
    }
    public function render()
    {
        $regions=  ModelsRegions::whereCityId($this->idr)->get();
        return view('livewire.dashborad.city.regions',['regions'=>$regions])->layout('admin.layouts.masterdash');
    }
}
