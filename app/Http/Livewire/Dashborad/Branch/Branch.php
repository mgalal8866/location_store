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
    public
    $name,
    $slug,
    $stores,
    $active,
    $numberbranch,

    $subcategorys=null,
    $selectsubcategory=null,
    $selectcategory=null,

    $description,
    $branch_id;
    public $i =0;
    public $branchlist =[],$regions =[],$citys=[];
    protected $rules = [
        // 'branchlist.*.address' => 'string|required|min:6',
        'branchlist.*.region_id' => 'string|required|min:6',
    ];


    public function mount($slug)
    {
        $this->slug = $slug;
        $this->categorys = categories::all();
        $this->citys = cities::all();
        $this->stores  = stores::whereSlug($this->slug)->first();
            $this->name=$this->stores->name;
            $this->active =$this->stores->getAttributes()['active'];
            $this->numberbranch =$this->stores->branch_num;
        $parent = categories::whereId($this->stores->category_id)->first();
            if( $parent->parent_id != null){
             $this->selectsubcategory =$this->stores->category_id;
             $this->selectcategory = $parent->parent_id;
             $this->subcategorys = categories::whereParentId($this->selectcategory)->get();
            }else
            {
             $this->selectcategory =$this->stores->category_id;
            }
             foreach($this->stores->branch as $branch)
                {
                    // $this->branchlist[ $this->i]['image']=$this->stores->image;
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
                    $this->regions[ $this->i]  =   regions::where('city_id', $branch->city_id)->get()->toarray();
                    $this->i +=  1;
                }



    }
    public function savestore()
    {
        $store = stores::whereSlug($this->slug)->first();
        $store->update(
            [
                'name'=>$this->name,
                'active'=>$this->active,
                'category_id' => ($this->selectsubcategory != null)? $this->selectsubcategory : $this->selectcategory ,
                'branch_num'=>$this->numberbranch,
            ]);
    }
    public function save($slug , $index)
    {
         Validator::make($this->branchlist, [
        'branchlist.*.address' =>'string|required|min:6',
        'branchlist.*.region_id' => 'string|required|min:6',
        ])->validate();
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

    public function updatedSelectcategory($id)
    {
        $data = categories::whereParentId($id)->get();
        if( $data->count() == 0)
        {
            $this->subcategorys = null;
            $this->selectsubcategory = null;
        }else
        {
            $this->selectsubcategory = null;
            $this->subcategorys =  $data;
        }
    }

    public function updatedBranchlist($value, $nested)
    {
        $nestedData = explode(".", $nested);
        if($nestedData[1] == 'city_id' )
        {
            $this->value =$value;
            $this->branchlist[$nestedData[0]]['region_id'] =null;
            $this->regions[$nestedData[0]] = regions::where('city_id', $value)->get()->toarray();
        }


    }


    public function updatedRegion($value, $nested)
    {
        $nestedData = explode(".", $nested);

        if($nestedData[1] == 'region_id' )
        {
            dd($this->regions);
        }
    }
    public function render()
    {
        return view('livewire.dashborad.branch.branch')->layout('admin.layouts.masterdash');
    }
}
