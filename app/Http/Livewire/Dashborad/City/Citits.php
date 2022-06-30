<?php

namespace App\Http\Livewire\Dashborad\City;

use App\Models\cities;
use Livewire\Component;

class Citits extends Component
{
    public $title, $city, $nameen , $namear,$modeedit = false ,$idedit=null,$idcity=null;

    public function deletregion($state){

        if($state == 'soft'){
            $this->city->delete();
        }elseif($state == 'hard'){
            $this->city->forceDelete();
        }
        $this->dispatchBrowserEvent('closeModal');
        $this->reset();
    }
    public function delete($id){
        $this->city = cities::find($id);
    }
    public function updatedModeedit(){
        if($this->modeedit == false){
             $this->title = __('new_city');
             $this->reset('nameen');
             $this->reset('namear');
        }
    }
    public function showregion($id)
    {
      return  redirect()->route('regions',['id'=>$id]);
    }
    public function editcity($id)
    {
       $this->title = __('edit_city');
       $this->city = cities::find($id);
       $this->nameen    = $this->city->city_name_en;
       $this->namear    = $this->city->city_name_ar;
       $this->modeedit  = true;
    }
    public function newcity()
    {
        $this->validate([
            'namear' => 'required',
            'nameen' => 'required'
        ]);

        if($this->modeedit == false){
            cities::create(['city_name_ar' =>  $this->namear ,'city_name_en'=> $this->nameen]);
            $this->dispatchBrowserEvent('successmsg',['msg' => 'Success Add']);
        }elseif($this->modeedit == true){
            $this->city->update(['city_name_ar' =>  $this->namear ,'city_name_en'=> $this->nameen]);
            $this->dispatchBrowserEvent('successmsg',['msg' => 'Success Edit']);
        }
        $this->dispatchBrowserEvent('closeModal');
        $this->reset();
    }
    public function render()
    {
        $cities = cities::all();
        return view('livewire.dashborad.city.citits',['cities'=> $cities])->layout('admin.layouts.masterdash');
    }
}
