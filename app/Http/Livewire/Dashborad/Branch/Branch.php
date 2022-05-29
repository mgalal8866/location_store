<?php

namespace App\Http\Livewire\Dashborad\Branch;

use App\Models\branchs;
use App\Models\cities;
use App\Models\regions;
use App\Models\stores;
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

            public $i =0;

    public $branchlist = [];
    public function render()
    {
        $citys = cities::all();

        $stores  = stores::first();
            $this->name= $stores->name;
            $this->description= $stores->description;
             foreach($stores->branch as $branch)
                {
                    $this->branchlist[ $this->i]['numproduct'] = $branch->product_num;
                    $this->i +=  1;
                }


        //     $this->address= $branch->address;
        //     $this->start_date= $branch->start_date;
        //     $this->expiry_date= $branch->expiry_date;

        //     $this->phone = $branch->phone;
        //     $this->city_id= $branch->city_id;
        //     $this->region_id= $branch->region_id;
        //     $this->opentime= $branch->opentime;
        //     $this->closetime= $branch->closetime;
        //     $this->numproduct= $branch->product_num;
        $regions = regions::whereCityId($this->city_id)->get();

        return view('livewire.dashborad.branch.branch',
        ['citys'=>$citys
        ,'regions'=>$regions
       ,'stores'=> $stores
        ]
        )->layout('admin.layouts.masterdash');

    }
}
