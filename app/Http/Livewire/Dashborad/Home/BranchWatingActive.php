<?php

namespace App\Http\Livewire\Dashborad\Home;

use App\Models\branchs;
use Livewire\Component;
use Livewire\WithPagination;

class BranchWatingActive extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    // public function changeactive($id,$status)
    // {
    //     $branch = branchs::where('id',$id)->first();

    //     if( $branch->getAttributes()['active'] == 1) {
    //         $branch->update(['active' => $status,]);
    //         $this->dispatchBrowserEvent('Toast',['ev' => 'success','msg' => 'branch is avtive now']);
    //     }else {
    //         $branch->update(['active' => $status,]);
    //         $this->dispatchBrowserEvent('Toast',['ev' => 'success','msg' => 'branch is Desavtive now']);
    //     }
    // }
    // public function changeaccept($id,$status)
    // {
    //     $branch = branchs::where('id',$id)->first();

    //     if( $branch->getAttributes()['accept'] == 1) {
    //         $branch->update(['accept' => $status,]);
    //         $this->dispatchBrowserEvent('Toast',['ev' => 'success','msg' => 'branch is avtive now']);
    //     }else {
    //         $branch->update(['accept' => $status,]);
    //         $this->dispatchBrowserEvent('Toast',['ev' => 'success','msg' => 'branch is Desavtive now']);
    //     }
    // }
    public function render()
    {
        $branchnNotAccept = branchs::whereActive(1)->paginate(5);
        return view('livewire.dashborad.home.branch-wating-active',['branchnNotAccept' => $branchnNotAccept]);
    }
}
