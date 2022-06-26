<?php

namespace App\Http\Livewire\Dashborad\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $pages =10, $status;
	public $searchTerm = null;
    


    public function render()
    {
        $users = User::where('mobile', 'like', '%'.$this->searchTerm.'%')->latest()->paginate($this->pages);
        return view('livewire.dashborad.users.users',['users'=> $users])->layout('admin.layouts.masterdash');
    }
}
