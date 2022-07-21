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
public $idaction,$image,$title,$description,$promotion,$oldimage;


        public function view($id)
        {
                $this->idaction = $id;
                $this->promotion =  ModelsPromotion::find($id);
                $this->title =  $this->promotion->title;
                $this->description =  $this->promotion->description;
                $this->oldimage =  $this->promotion->image;

        }

        public function edit()
        {
            if ($this->image != null){
                $this->image = uploadimages('promotion',$this->image);
             }
            // $promotion =  ModelsPromotion::find($this->idaction);
           $this->promotion->update([
                'title'       => $this->title ,
                'description' => $this->description,
                'image'       => $this->image??$this->promotion->getAttributes()['image']
            ]);
            $this->dispatchBrowserEvent('successmsg',['msg' => 'Save  Success ✔']);
            $this->reset();
        }


        public function delete()
        {
            $promotion =  ModelsPromotion::find($this->idaction);
            deleteimage('promotion',  $promotion->getAttributes()['image']);
            $promotion->delete();
            $this->reset();
        }
        public function save($type)
        {
            if($type == 'new')
            {
                $this->image= uploadimages('promotion',$this->image);
                ModelsPromotion::create(['title'=> $this->title,'description'=> $this->description,'image'=> $this->image]);
                $this->dispatchBrowserEvent('successmsg',['msg' => 'Save  Success ✔']);
                $this->reset();
            }

        }

    public function render()
    {
        $promotionview = ModelsPromotion::get();
        return view('livewire.dashborad.promotion.promotion',['promotionview' => $promotionview])->layout('admin.layouts.masterdash');
    }
}
