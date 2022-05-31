<?php

namespace App\Http\Livewire\Dashborad\Branch;

use App\Models\cities;
use App\Models\stores;
use App\Models\branchs;
use App\Models\regions;
use Livewire\Component;
use App\Models\categories;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Validator;

class Branch extends Component
{
    use WithFileUploads;

    public $image;
    public $name,$slug,$index,$subcategory,$category,$active,$numberbranch,$description;
    public $i =0;
    public $branchlist = [];


    protected $rules = [
        // 'description' => 'string|required|min:6',
        'branchlist.0.address' => 'string|required|min:6',

    ];


    public function mount($slug)
    {
        $this->slug = $slug;
    }
    public function savestore()
    {
        $store = stores::whereSlug( $this->slug)->first();
        $store->update(['name'=>$this->name,'active'=>$this->active]);
    }

    public function save($slug , $index)
    {
        // $validator = Validator::make($this->branchlist, [
        // 'branchlist.*.address' =>'string|required|min:6',]);
        $this->validate();

        $branch = branchs::find ($this->branchlist[$index]['branch_id'])->first();
        $branch->update(
            ['active'=>$this->branchlist[$index]['active'],
            'description'=>$this->branchlist[$index]['description'],
            'start_date'=>$this->branchlist[$index]['start_date'],
            'expiry_date'=>$this->branchlist[$index]['expiry_date'],
            'address'=>$this->branchlist[$index]['address'],
            'accept'=>$this->branchlist[$index]['approval'],
            'phone'=>$this->branchlist[$index]['phone'],
            'phone2'=>$this->branchlist[$index]['phone2'],
            'city_id'=>$this->branchlist[$index]['city_id'],
            'region_id'=>$this->branchlist[$index]['region_id'],
            'opentime'=>$this->branchlist[$index]['opentime'],
            'closetime'=>$this->branchlist[$index]['closetime'],
            'product_num'=>$this->branchlist[$index]['numproduct'],
            ]
        );
    }

    public function showregions($id, $index)
    {
        // $this->regions= regions::where('city_id', $id)->get();
    }

    public function updatedName()
    {
            // dd('');
    }

    public function render()
    {
        $this->dispatchBrowserEvent('successmsg',['message' =>'ddddd']);

        $citys = cities::all();
        $categorys = categories::all();
        $subcategorys = categories::all();

        $stores  = stores::whereSlug($this->slug)->first();
            $this->name= $stores->name;
            $this->active = $stores->getAttributes()['active'];
            $this->numberbranch = $stores->branch_num;
        $parent = categories::whereId($stores->category_id)->first();
            if( $parent->parent_id != null){
             $this->category = $parent->parent_id;
             $this->subcategory = $stores->category_id;

            }else
            {
             $this->category = $stores->category_id;
            }

             foreach($stores->branch as $branch)
                {
                    // $this->branchlist[ $this->i]['image']= $stores->image;
                    // dd($branch->image);
                    $this->branchlist[ $this->i]['branch_id']= $branch->id;
                    $this->branchlist[ $this->i]['image']= $branch->image;
                    $this->branchlist[ $this->i]['description']= $branch->description;
                    $this->branchlist[ $this->i]['approval']= $branch->accept;
                    $this->branchlist[ $this->i]['active']= $branch->getAttributes()['active'];
                    $this->branchlist[ $this->i]['address']= $branch->address;
                    $this->branchlist[ $this->i]['start_date']= $branch->start_date;
                    $this->branchlist[ $this->i]['expiry_date']= $branch->expiry_date;
                    $this->branchlist[ $this->i]['phone'] = $branch->phone;
                    $this->branchlist[ $this->i]['phone2'] = $branch->phone2;
                    $this->branchlist[ $this->i]['city_id']= $branch->city_id;
                    $this->branchlist[ $this->i]['region_id']= $branch->region_id;
                    $this->branchlist[ $this->i]['opentime']= $branch->opentime;
                    $this->branchlist[ $this->i]['closetime']= $branch->closetime;
                    $this->branchlist[ $this->i]['numproduct']= $branch->product_num;
                    $this->branchlist[ $this->i]['lat']= $branch->lat;
                    $this->branchlist[ $this->i]['lng']= $branch->lng;
                    $this->branchlist[ $this->i]['top']= $branch->top;

                    $this->i +=  1;

                }
                $regions = regions::where('city_id', $this->branchlist[0]['city_id'] )->get();

        return view('livewire.dashborad.branch.branch',
                    ['citys'=>$citys
                        ,'regions'=>$regions
                        ,'stores'=> $stores
                        ,'categorys'=>$categorys
                        ,'subcategorys' =>$subcategorys
                    ]
        )->layout('admin.layouts.masterdash');

    }
}
