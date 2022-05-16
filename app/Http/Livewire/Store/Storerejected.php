<?php

namespace App\Http\Livewire\Store;

use App\Models\branchs;
use Livewire\Component;

class Storerejected extends Component
{
    public function changeaccept($id,$status)
    {
        $branch = branchs::where('id',$id)->first();

        if( $status == 1) {
            $branch->update(['accept' => $status,]);
            $this->dispatchBrowserEvent('Toast',['ev' => 'success','msg' => 'branch is des now']);
        }  if($status == 0) {
            $branch->update(['accept' => $status,]);
            $this->dispatchBrowserEvent('Toast',['ev' => 'success','msg' => 'branch is Active now']);
        }else {
            $branch->update(['accept' => $status,]);
            $this->dispatchBrowserEvent('Toast',['ev' => 'success','msg' => 'branch is waiting now']);
        }
    }
    public function render()
    {
        $branchrejected = branchs::whereAccept(2)->get();
        return view('livewire.store.storerejected',['branchrejected'=>$branchrejected]);
    }
}
