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
            $numproduct,$slug;
            public $i =0;
    public $branchlist = [];

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function save($slug , $index)
    {
            dd($slug , $index);

    }

    public function render()
    {
        $citys = cities::all();
        $regions = regions::whereCityId($this->city_id)->get();
        $stores  = stores::whereSlug($this->slug)->first();

            $this->name= $stores->name;
            $this->description= $stores->description;

             foreach($stores->branch as $branch)
                {
                    $this->branchlist[ $this->i]['category_id']= $stores->category_id;
                    $this->branchlist[ $this->i]['image']= $stores->image;

                    $this->branchlist[ $this->i]['address']= $branch->address;
                    $this->branchlist[ $this->i]['start_date']= $branch->start_date;
                    $this->branchlist[ $this->i]['expiry_date']= $branch->expiry_date;
                    $this->branchlist[ $this->i]['phone'] = $branch->phone;
                    $this->branchlist[ $this->i]['city_id']= $branch->city_id;
                    $this->branchlist[ $this->i]['region_id']= $branch->region_id;
                    $this->branchlist[ $this->i]['opentime']= $branch->opentime;
                    $this->branchlist[ $this->i]['closetime']= $branch->closetime;
                    $this->branchlist[ $this->i]['numproduct']= $branch->product_num;
                    $this->i +=  1;
                }



        return view('livewire.dashborad.branch.branch',
                    ['citys'=>$citys
                        ,'regions'=>$regions
                        ,'stores'=> $stores
                    ]
        )->layout('admin.layouts.masterdash');

    }
}
