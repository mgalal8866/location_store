<?php

namespace App\Http\Livewire\Dashborad\Users;


use App\Models\User;
use App\Models\about;
use Livewire\Component;

class Message extends Component
{
    public $messages;

    public function mount($id =null)
    {
        $this->messages = about::with('user')->whereUserId($id)->latest()->take(10)->get()->sortBy('id');
    }
    public function dehydrateMessages()
    {
        foreach( $this->messages as $seen)
        {
         $seen->update(['IsSeen' => '0' ]);
        }
    }
    
    public function render()
    {
        return view('livewire.dashborad.users.message')->layout('admin.layouts.masterdash');;
    }
}
