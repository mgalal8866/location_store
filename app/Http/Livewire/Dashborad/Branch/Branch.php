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
    public $name,$slug,$index,$stores,$categorys,$subcategorys,$subcategory,$category,$active,$numberbranch,$description,$branch_id;
    public $i =0;
    public $branchlist = [] , $regions= [],$citys,$ed =false,$value;
    protected $listeners = ['some-event' => '$refresh'];

    protected $rules = [
        'branchlist.*.address' => 'string|required|min:6',
        // 'branchlist.0.address' => 'string|required|min:6',

    ];


    public function mount($slug)
    {
        $this->slug = $slug;

        $this->citys = cities::all();
        $this->categorys = categories::all();
        $this->subcategorys = categories::all();

        $this->stores  = stores::whereSlug($this->slug)->first();
            $this->name=$this->stores->name;
            $this->active =$this->stores->getAttributes()['active'];
            $this->numberbranch =$this->stores->branch_num;

        $parent = categories::whereId($this->stores->category_id)->first();
            if( $parent->parent_id != null){
             $this->category = $parent->parent_id;
             $this->subcategory =$this->stores->category_id;

            }else
            {
             $this->category =$this->stores->category_id;
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
                    $this->branchlist[ $this->i]['region']= $branch->region_id;
                    $this->branchlist[ $this->i]['opentime']= $branch->opentime;
                    $this->branchlist[ $this->i]['closetime']= $branch->closetime;
                    $this->branchlist[ $this->i]['numproduct']= $branch->product_num;
                    $this->branchlist[ $this->i]['lat']= $branch->lat;
                    $this->branchlist[ $this->i]['lng']= $branch->lng;
                    $this->branchlist[ $this->i]['top']= $branch->top;
                    $this->regions[$this->i] =   regions::where('city_id', $branch->city_id)->get();
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
            'region_id'  => $this->branchlist[$index]['region'],
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
    public function updatedRegions($value, $nested)
    {
    dd( $this->regions);
    }
    public function updatedBranchlist($value, $nested)
    {
        $nestedData = explode(".", $nested);
        if($nestedData[1] == 'city_id' )
        {
            $this->index = $nestedData[0];
            // $this->regions[$nestedData[0]]['region'] = $value;
            $this->branchlist[$nestedData[0]]['region'] ='';
            $this->value =$value;
            // $this->regions[$nestedData[0]] = regions::where('city_id', $value)->get();
            // regions::where('city_id', $value)->get()->toarray()
            $this->ed=true;
        }
    }
    public function tt()
    {
        dd( $this->regions,$this->branchlist);
    }
    public function render()
    {
        // $this->dispatchBrowserEvent('successmsg',['message' =>'ddddd']);
        if($this->ed){
         $this->regions[$this->index] = regions::where('city_id', $this->value)->get();
           }
        return view('livewire.dashborad.branch.branch',
                    [
                        // 'citys'=>$this->citys
                        'regions'=>$this->regions
                        // ,'stores'=>$this->stores
                        // ,'categorys'=>$categorys
                        // ,'subcategorys' =>$subcategorys
                    ]
        )->layout('admin.layouts.masterdash');

    }
}
