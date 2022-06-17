<?php

namespace App\Http\Livewire\Dashborad\Slider;

use App\Http\Controllers\Api\Traits\GeneralTrait;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\slider as ModelsSlider;

class Slider extends Component
{
    use GeneralTrait;
    use WithFileUploads;
    public $statetype ,$slider,$event,$image;

    public function add()
    {
        $this->image = $this->uploadimages('slider',$this->image);
        $this->slider = ModelsSlider::create([
                'type'  => $this->statetype,
                'event' => $this->event,
                'image' => $this->image]);

        $this->dispatchBrowserEvent('successmsg',['msg' => 'Deleted ✔']);

    }
    public function updatedStatetype()
    {        // dd($this->statetype);
    }
    public function  deleteslider($id)
    {
         $slider = ModelsSlider::find($id);
         $slider->delete();
         $this->dispatchBrowserEvent('successmsg',['msg' => 'Deleted ✔']);
    }
    public function render()
    {
        $this->slider = ModelsSlider::with('product')->get();
    //    dd( $this->slider );
        return view('livewire.dashborad.slider.slider')->layout('admin.layouts.masterdash');
    }
}
