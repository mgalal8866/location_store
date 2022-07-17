<?php

namespace App\Http\Livewire\Dashborad\Slider;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use App\Models\sliderfront as ModelsSliderfront;
use App\Http\Controllers\Api\Traits\GeneralTrait;

class Sliderfront extends Component
{
    use GeneralTrait;
    use WithFileUploads;
    public $slider,$image;


    public function updatedImage()
    {
        $this->validate([
            'image' => 'image|max:1024',
        ]);
        // dd($this->image);
    }



    public function add()
    {
        $this->image = $this->uploadimages('sliderfront',$this->image);

        $this->slider = ModelsSliderfront::create([
                'image' => $this->image,
                'active' => 0] );
        $this->reset();
        $this->dispatchBrowserEvent('successmsg',['msg' => 'Add Success']);

    }
    public function  deleteslider($id)
    {
         $slider = ModelsSliderfront::find($id);
         Storage::disk('sliderfront')->delete($slider->getAttributes()['image']);
         $slider->delete();
         $this->dispatchBrowserEvent('successmsg',['msg' => 'Deleted ✔']);
    }

    public function render()
    {
        $this->slider = ModelsSliderfront::get();
        return view('livewire.dashborad.slider.sliderfront')->layout('admin.layouts.masterdash');
    }
}
