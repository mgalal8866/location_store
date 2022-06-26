<?php

namespace App\Http\Livewire\Dashborad\Users;

use Livewire\Component;

class NewUser extends Component
{
    public function render()
    {
        return view('livewire.dashborad.users.new-user')->layout('admin.layouts.masterdash');
    }
}
