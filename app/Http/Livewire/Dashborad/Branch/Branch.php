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
    public $name,$slug,$index,$subcategory,$category,$active,$numberbranch,$description,$branch_id;
    public $i =0;
    public $branchlist = [] , $regions=[] ,$citys;


    protected $rules = [
        'branchlist.*.address' => 'string|required|min:6',
        // 'branchlist.0.address' => 'string|required|min:6',

    ];


    public function mount($slug)
    {
        $this->slug = $slug;
    }
    public function savestore()
    {

        $store = stores::whereSlug($this->slug)->first();
        $store->update(
            [
                'name'=>$this->name,
                'active'=>$this->active,
                'category_id' => ($this->subcategory != null)? $this->subcategory : $this->category ,
                'branch_num'=>$this->numberbranch,

            ]);
    }

    public function save($slug , $index)
    {
        // $validator = Validator::make($this->branchlist, [
        // 'branchlist.*.address' =>'string|required|min:6',]);
        // $this->validate();

        // dd( $this->branchlist[$index]['expiry_date']);

        $branch = branchs::find($this->branchlist[$index]['branch_id']);
        $branch->update(
            [
            'active'     => $this->branchlist[$index]['active'],
            'top'        => $this->branchlist[$index]['top'],
            'description'=> $this->branchlist[$index]['description'],
            'start_date' => $this->branchlist[$index]['start_date'],
            'expiry_date'=> $this->branchlist[$index]['expiry_date'],
            'address'    => $this->branchlist[$index]['address'],
            'accept'     => $this->branchlist[$index]['approval'],
            'phone'      => $this->branchlist[$index]['phone'],
            'phone2'     => $this->branchlist[$index]['phonetwo'],
            'city_id'    => $this->branchlist[$index]['city_id'],
            'lat'        => $this->branchlist[$index]['lat'],
            'lng'        => $this->branchlist[$index]['lng'],
            'region_id'  => $this->branchlist[$index]['region_id'],
            'opentime'   => $this->branchlist[$index]['opentime'],
            'closetime'  => $this->branchlist[$index]['closetime'],
            'product_num'=> $this->branchlist[$index]['numproduct'],
            ]
        );
    }

    public function showregions($id, $index)
    {
        // $this->regions= regions::where('city_id', $id)->get();
    }

    public function updatedBranchlist($value, $nested)
    {

        // Get the nested property that was changed. this will yield a string formated as "1.prop1" or "2.prop1"
        // Let's pretend that the $value variable says "value 1" and the $nested variable is "1.prop1"
        // if ($nestedData[1] == 'prop1') {
        //     $this->items[$nestedData[0]]["secondary_value"] = 'secondary value';
            // This should yield an items array that looks like this: items[1]['secondary_value'] = 'secondary value'
        // }
        // if ($nestedData[1] == 'prop2') {
        //     $this->items[$nestedData[0]]["third_value"] = 'third value';
            // This should yield an items array that looks like this: items[1]['third_value'] = 'secondary value'
        // }
        $nestedData = explode(".", $nested);
        if($nestedData[1] == 'city_id' )
        {
            // $this->regions[$nestedData[0]] =   regions::where('city_id', $value)->get();
            $this->branchlist[$nestedData[0]]["region_id"] = $value;
        //   dd($this->branchlist[$nestedData[0]]["region_id"]);
        }
    }

    public function render()
    {
        // $this->dispatchBrowserEvent('successmsg',['message' =>'ddddd']);

        $this->citys = cities::all();
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
                    $this->branchlist[ $this->i]['phonetwo'] = $branch->phone2;
                    $this->branchlist[ $this->i]['city_id']= $branch->city_id;
                    $this->branchlist[ $this->i]['region_id']= $branch->region_id;
                    $this->branchlist[ $this->i]['opentime']= $branch->opentime;
                    $this->branchlist[ $this->i]['closetime']= $branch->closetime;
                    $this->branchlist[ $this->i]['numproduct']= $branch->product_num;
                    $this->branchlist[ $this->i]['lat']= $branch->lat;
                    $this->branchlist[ $this->i]['lng']= $branch->lng;
                    $this->branchlist[ $this->i]['top']= $branch->top;
                    $this->regions[$this->i] =   regions::where('city_id', $branch->city_id)->get();

                    $this->i +=  1;
                }



        return view('livewire.dashborad.branch.branch',
                    ['citys'=>$this->citys
                        ,'regions'=>$this->regions
                        ,'stores'=> $stores
                        ,'categorys'=>$categorys
                        ,'subcategorys' =>$subcategorys
                    ]
        )->layout('admin.layouts.masterdash');

    }
}
