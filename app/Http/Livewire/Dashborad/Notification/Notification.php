<?php

namespace App\Http\Livewire\Dashborad\Notification;

use App\Models\User;
use App\Models\cities;
use App\Models\regions;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Api\Traits\GeneralTrait;
use App\Models\notifyimage;
use App\Models\notifylog;
use Livewire\WithPagination;

class Notification extends Component
{
use GeneralTrait;
use WithFileUploads;
use WithPagination;
protected $paginationTheme = 'bootstrap';
  public $target = 'all',$uploadimage, $countuser = 0 , $dd =true,$title,$body,$image,$users,$region= 'all',$city= 'all',$getcity,$getregion,$gender = 'all';
  public  $finduser,$uploaduserimage,$usertitle,$userbody,$userimage,$hasuser; //For notify user

    public function mount(){
        $this->getcity = cities::get();
        $this->image = asset('assets/images/notify/bell.png');
        $this->userimage = asset('assets/images/notify/bell.png');

    }
    //####################### send notification to one user #######################
    public function updatedFinduser($value){
        $this->hasuser = user::whereMobile($value)->first();
    }
    public function updatedUploaduserimage(){
        $userimage       = $this->uploadimages('notify',$this->uploaduserimage);
        $userimage       = notifyimage::create(['image'=>  $userimage ]);
        $this->userimage = $userimage->image;
    }
    public function sendnotifytouser(){
        if($this->hasuser->count() != 0){
         $notify= $this->notificationFCM($this->usertitle,$this->userbody,[$this->hasuser->device_token],$this->userimage,$this->userimage);
        notifylog::create(['admin_id'=> Auth('admin')->user()->id,'title' => $this->usertitle ,'body' =>$this->userbody,'image' => $this->userimage,'filter'  => ['user'=>$this->hasuser->name]]);
        $this->dispatchBrowserEvent('successmsg',['msg' => 'Send to '.json_decode($notify, true)['success'] .'  Successfully!']);
        }else{
            $this->dispatchBrowserEvent('infomsg',['msg' => 'No Users Or No Device token']);
        }
    }
    //####################### send notification to one user #######################
    //####################### custom notification #######################
    public function updatedCity($id){
        $this->region= 'all';
        $this->getregion = regions::whereCityId($id)->get();
    }
    public function updatedUploadimage(){
     $image       = $this->uploadimages('notify',$this->uploadimage);
     $image       = notifyimage::create(['image'=>  $image ]);
     $this->image = $image->image;
    }
    public function sendnotify(){

        if($this->users->count() != 0){
            $notify= $this->notificationFCM($this->title,$this->body,$this->users->pluck('device_token'),$this->image,$this->image);

        notifylog::create(['admin_id'=> Auth('admin')->user()->id,'title' => $this->title ,'body' =>$this->body,'image' => $this->image,'filter'  => ['city'=>$this->city,'gender'=>$this->gender,'region'=>$this->region]]);
        $this->dispatchBrowserEvent('successmsg',['msg' => 'Send to '.json_decode($notify, true)['success'] .'  Successfully!']);
        }else{
            $this->dispatchBrowserEvent('infomsg',['msg' => 'No Users Or No Device token']);
        }
    }
    //####################### custom notification #######################
    public function render()
    {
        $notifylog = notifylog::paginate(10);
        $query =  user::query();// DB::table('users');
        ($this->gender != 'all')?$query->where('gender',$this->gender):null;
        ($this->target == '1')?$query->whereHas('store'):($this->target == '0'?$query->whereDoesntHave('store') : ($this->target == 'all'??null));
        ($this->city   != 'all')?$query->where('city_id',$this->city):null;
        ($this->region != 'all')?$query->where('region_id',$this->region):null;
         $this->users =  $query->whereNotNull('device_token')->get();
        return view('livewire.dashborad.notification.notification',['notifylog' =>$notifylog ])->layout('admin.layouts.masterdash');
    }
}
