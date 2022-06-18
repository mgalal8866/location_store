<?php

namespace App\Http\Livewire\Dashborad\Notification;

use App\Models\User;
use App\Models\cities;
use App\Models\regions;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Api\Traits\GeneralTrait;

class Notification extends Component
{
use GeneralTrait;

  public $countuser = 0 , $dd =true,$title,$body,$image,$users,$region= 'all',$city= 'all',$getcity,$getregion,$gender = 'all';
    public function mount(){
        $this->getcity = cities::get();
        $this->title = 'MGGroup- Blog Magazine Script.';
        $this->body = 'MGGroup- Blog Magazine Script.';
        $this->image = 'https://w7.pngwing.com/pngs/537/580/png-transparent-bell-notification-communication-information-icon.png';

    }
    public function updatedCity($id){
        $this->getregion = regions::whereCityId($id)->get();
    }
    public function sendnotify(){
        // dd($this->gender ,$this->city,$this->region, $this->users);
        if($this->users != null){
        $notify = $this->notificationFCM($this->title,$this->body,$this->users->pluck('device_token'),$this->image,$this->image);
        $this->dispatchBrowserEvent('successmsg',['msg' => 'Send to '.json_decode($notify, true)['success'] .'  Successfully!']);
        }else{
            $this->dispatchBrowserEvent('warningmsg',['msg' => 'No Users ..']);
        }

    }
    public function render()
    {
        $query = DB::table('users');
        ($this->gender != 'all')?$query->where('gender',$this->gender):null;
        ($this->city != 'all')?$query->where('city_id',$this->city):null;
        ($this->region != 'all')?$query->where('region_id',$this->region):null;
         $this->users =  $query->whereNotNull('device_token')->get();
        return view('livewire.dashborad.notification.notification',['countuser'=> $this->users->count()])->layout('admin.layouts.masterdash');
    }
}
