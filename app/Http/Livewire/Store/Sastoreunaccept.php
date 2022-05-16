<?php

namespace App\Http\Livewire\Store;

use App\Models\branchs;
use Livewire\Component;

class Sastoreunaccept extends Component
{


    public function changeactive($id,$status)
    {
        $branch = branchs::where('id',$id)->first();

        if( $branch->getAttributes()['active'] == 1) {
            $branch->update(['active' => $status,]);
            $this->dispatchBrowserEvent('Toast',['ev' => 'success','msg' => 'branch is avtive now']);
        }else {
            $branch->update(['active' => $status,]);
            $this->dispatchBrowserEvent('Toast',['ev' => 'success','msg' => 'branch is Desavtive now']);
        }
    }
    public function changeaccept($id,$status)
    {
        $branch = branchs::where('id',$id)->first();

        if( $branch->getAttributes()['accept'] == 1) {
            $branch->update(['accept' => $status,]);
            $this->dispatchBrowserEvent('Toast',['ev' => 'success','msg' => 'branch is avtive now']);
        }else {
            $branch->update(['accept' => $status,]);
            $this->dispatchBrowserEvent('Toast',['ev' => 'success','msg' => 'branch is Desavtive now']);
        }
    }
    public function render()
    {
        $branchnNotAccept = branchs::whereActive(1)->get();
        return view('livewire.store.sastoreunaccept',['branchnNotAccept' => $branchnNotAccept]);
    }
}
