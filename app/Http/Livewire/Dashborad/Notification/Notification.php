<?php

namespace App\Http\Livewire\Dashborad\Notification;

use App\Http\Controllers\Api\Traits\GeneralTrait;
use App\Models\cities;
use App\Models\regions;
use App\Models\User;
use Livewire\Component;

class Notification extends Component
{ use GeneralTrait;
  public $dd =true,$title,$body,$image,$region,$city,$getcity,$getregion,$gender;
    public function mount(){
        $this->getcity = cities::get();
    }
    public function updatedCity($id){
        $this->getregion = regions::whereCityId($id)->get();
    }
    public function sendnotify(){
       // dd(User::when('gender' , function($query){($this->gender != 'all')? return $query->where('gender', 'like', $this->gender)};)->get());
    }
    public function render()
    {
        return view('livewire.dashborad.notification.notification')->layout('admin.layouts.masterdash');
    }
}
