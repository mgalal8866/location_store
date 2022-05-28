<?php

namespace App\Http\Livewire\Dashborad\Branch;

use App\Models\branchs;
use App\Models\cities;
use App\Models\regions;
use Livewire\Component;
use Livewire\WithFileUploads;

class Branch extends Component
{
    use WithFileUploads;

    public $image;
    public  $name,$start_date,
            $expiry_date,$branch_num,
            $address,$description,
            $lat,$lng,$phone,$phone2,
            $opentime,$closetime,
            $city,$active,$accept,
            $region,$city_id,$region_id,
            $numproduct;
    public function render()
    {
        $citys = cities::all();

        $branch  = branchs::whereId(1)->first();
            $this->name= $branch->stores->name;
            $this->address= $branch->address;
            $this->start_date= $branch->start_date;
            $this->expiry_date= $branch->expiry_date;
            $this->description= $branch->description;
            $this->phone = $branch->phone;
            $this->city_id= $branch->city_id;
            $this->region_id= $branch->region_id;
            $this->opentime= $branch->opentime;
            $this->closetime= $branch->closetime;
            $this->numproduct= $branch->product_num;
        $regions = regions::whereCityId($this->city_id)->get();
        return view('livewire.dashborad.branch.branch',
        ['citys'=>$citys
        ,'regions'=>$regions
        // ,'branch'=> $branch
        ]
        )->layout('admin.layouts.masterdash');

    }
}
