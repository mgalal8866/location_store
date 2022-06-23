<?php

namespace App\Http\Livewire\Dashborad\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public function render()
    {
        $users = User::latest()->paginate(10);
        return view('livewire.dashborad.users.users',['users'=> $users])->layout('admin.layouts.masterdash');
    }
}
