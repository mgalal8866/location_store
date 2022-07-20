<?php

namespace App\Http\Livewire\Dashborad\Promotion;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\promotion as ModelsPromotion;
use App\Http\Controllers\Api\Traits\GeneralTrait;

class Promotion extends Component
{
use GeneralTrait;
use WithFileUploads;
public $idaction,$image;
public function updatedImage()
{
    // dd( \Carbon\Carbon::now());
    $this->validate([
        'image' => 'image|max:1024',
    ]);
}
        public function view($id)
        {
                $this->idaction = $id;
        }

        public function edit()
        {
            $promotion =  ModelsPromotion::find($this->idaction);
            $promotion->update([
            'title'=>'',
            'title'=>'',
            'title'=>'']);

        }
        public function delete()
        {
            $promotion =  ModelsPromotion::find($this->idaction);
            deleteimage('promotion',  $promotion->getAttributes()['image']);
            $promotion->delete();
            $this->reste();
        }

    public function render()
    {
        $promotion = ModelsPromotion::get();
        return view('livewire.dashborad.promotion.promotion',['promotion' => $promotion])->layout('admin.layouts.masterdash');
    }
}
