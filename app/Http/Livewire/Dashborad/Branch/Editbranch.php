<?php

namespace App\Http\Livewire\Dashborad\Branch;

use App\Models\cities;
use App\Models\branchs;
use Livewire\Component;
use App\Models\categories;
use App\Models\regions;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class Editbranch extends Component
{
    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $top, $oldimage,$regions,$citys,$branch,$slug,$descriptionbranch,$lat,$lng,$phone,$phonetwo,$city_id,$region_id,$address,$start_date,$expiry_date,$opentime,$closetime,$numproduct,$approval,$active,$image;

    public function mount($slug=null)
    {
        $this->slug = $slug;

        $this->citys   = cities::all();
        $this->branch  = branchs::whereSlug($slug)->first();

        $this->descriptionbranch = $this->branch->description;
        $this->lat               = $this->branch->lat;
        $this->lng               = $this->branch->lng;
        $this->phone             = $this->branch->phone;
        $this->phonetwo          = $this->branch->phone2;
        $this->city_id           = $this->branch->city_id;
        $this->region_id         = $this->branch->region_id;
        $this->address           = $this->branch->address;
        $this->start_date        = $this->branch->start_date;
        $this->expiry_date       = $this->branch->expiry_date;
        $this->opentime          = $this->branch->opentime;
        $this->closetime         = $this->branch->closetime;
        $this->numproduct        = $this->branch->product_num;
        $this->approval          = $this->branch->accept;
        $this->active            = $this->branch->active;
        $this->oldimage          = $this->branch->image;
        $this->top               = $this->branch->top;
        $this->regions           = regions::where('city_id', $this->branch->city_id)->get()->toarray();

    }

    public function save()
    {
        if ($this->image != null){
            $image = uploadimages('branch',$this->image);
        }

        $this->branch->update([
            'description'       => $this->descriptionbranch ,
            'lat'               => $this->lat               ,
            'lng'               => $this->lng               ,
            'phone'             => $this->phone             ,
            'phone2'            => $this->phonetwo??null    ,
            'city_id'           => $this->city_id           ,
            'region_id'         => $this->region_id         ,
            'address'           => $this->address           ,
            'start_date'        => ($this->start_date == '') ? null : $this->start_date,
            'expiry_date'       => ($this->expiry_date == '') ? null : $this->expiry_date,
            'opentime'          => $this->opentime?? null   ,
            'closetime'         => $this->closetime?? null  ,
            'product_num'       => $this->numproduct        ,
            'accept'            => $this->approval          ,
            'active'            => $this->active            ,
            'top'               => $this->top               ,
            'image'             => $image??$this->branch->getAttributes()['image'],
        ]);

        $this->dispatchBrowserEvent('successmsg',['msg' => 'Save Update Success ✔']);

        if($this->branch->expiry_date == ''){
            $this->dispatchBrowserEvent('warningmsg',['msg' => 'Expiry Date not Set']);
        }
    }
   
    public function updatedCityId()
    {
            $this->region_id= null;
            $this->regions   = regions::where('city_id', $this->city_id)->get()->toarray();
    }

    public function render()
    {
        return view('livewire.dashborad.branch.editbranch')->layout('admin.layouts.masterdash');
    }
}
