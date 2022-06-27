<?php

namespace App\Http\Livewire\Dashborad\Slider;

use App\Http\Controllers\Api\Traits\GeneralTrait;
use App\Models\cities;
use App\Models\regions;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\slider as ModelsSlider;

class Slider extends Component
{
    use GeneralTrait;
    use WithFileUploads;
    public $statetype ,$slider,$event,$image,$regions,$city ,$selectRegions,$selectCity;

    public function mount()
    {
        $this->city = cities::get();
    }
    public function updatedImage()
    {
        $this->validate([
            'image' => 'image|max:1024',
        ]);
    }
    // public function updatedImage()
    // {
    //     dd($this->image->temporaryUrl());
    // }
    public function UpdatedSelectCity()
    {
        $this->regions = regions::whereCityId($this->selectCity)->get();
    }
    public function add()
    {
        // dd( $this->image);
        $this->image = $this->uploadimages('slider',$this->image);

        $this->slider = ModelsSlider::create([
                'type'  => $this->statetype,
                'event' => $this->event,
                'image' => $this->image,
                'active' => 0,
                'region_id' => $this->selectRegions??null]);
        $this->reset();
        $this->city = cities::get();
        $this->dispatchBrowserEvent('successmsg',['msg' => 'Add Success']);

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
