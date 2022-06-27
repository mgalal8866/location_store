<?php

namespace App\Http\Livewire\Dashborad\Users;

use App\Models\cities;
use App\Models\regions;
use App\Models\User;
use Livewire\Component;

class NewUser extends Component
{
    public $title ,$user = null , $editmode = false ,$name ,$gender,$mobile , $password ,$password_confirmation , $citys=[] , $regions =[], $selectcity, $selectregion;
    // protected $listeners = ['newPost'];

    public function mount($id = null , $editmode=false)
    {

        $this->citys = cities::get();
        if($editmode== true && $id !=null){
            $this->title = 'Edit User' ;
            $this->editmode = $editmode;
            $this->user =  User::find($id);
            $this->regions = regions::whereCityId($this->user->city_id)->get();
            $this->name         = $this->user->name;
            $this->mobile       = $this->user->mobile;
            $this->password     = $this->user->password;
            $this->selectcity   = $this->user->city_id;
            $this->selectregion = $this->user->region_id;
            $this->gender       = $this->user->getAttributes()['gender'];

        }else{
            $this->title = 'New User' ;
        }

    }
    public function updatedSelectcity($value)
    {
        $this->regions = regions::whereCityId($value)->get();
    }
    protected $rules = [
        'name' => 'required|min:6',
        'mobile' => 'required|max:100|unique:users',
        'password' =>'required|string|confirmed|min:6',
        'gender' =>'required',
    ];
    public function saveuser()
    {
        if($this->editmode== true && $this->user != null){

             $this->user->update
            ([
                'name'      => $this->name,
                'mobile'    => $this->mobile,
                'password'  => bcrypt($this->password),
                'city_id'   => $this->selectcity,
                'region_id' => $this->selectregion,
                'gender'    => $this->gender
            ]);

            session()->flash('msg','تم تعديل المستخدم بنجاح');
            return redirect()->route('users');
        }else{

            $this->validate();
            $user = User::create
            ([
                'name'      => $this->name,
                'mobile'    => $this->mobile,
                'password'  => bcrypt($this->password),
                'city_id'   => $this->selectcity,
                'region_id' => $this->selectregion,
                'gender'    => $this->gender
            ]);

            session()->flash('msg', 'بنجاح ' .$user->name . ' تم أضافه المستخدم' );
            return redirect()->route('users');
        }
    }
    public function render()
    {
        return view('livewire.dashborad.users.new-user')->layout('admin.layouts.masterdash');
    }
}
