<?php

namespace App\Http\Livewire\Dashborad\Store;

use App\Http\Controllers\Api\Traits\GeneralTrait;
use App\Models\cities;
use App\Models\stores;
use App\Models\regions;
use Livewire\Component;
use App\Models\categories;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use App\Http\Resources\branch;
use Illuminate\Support\Facades\Auth;

class Newstore extends Component
{
    use WithFileUploads ,GeneralTrait;

    public $images, $name,$activestore,$numberbranch,$categorys,$selectcity,$citys,$regions,$subcategorys ,$branchlist = [],$selectcategory,
    $selectsubcategory;
    public function mount()
    {
        $this->categorys    = categories::all();
        $this->citys        = cities::all();
        $this->numberbranch = '1';
        $this->activestore = '0';
        $this->branchlist=[
            [
                'importimage'       => '',
                'image'             => asset('assets/images/noimage.jpg'),
                'active'            => '0',
                'descriptionbranch' => '',
                'approval'          => '0',
                'top'               => '0',
                'numproduct'        => '1',
                'opentime'          => '',
                'closetime'         => '',
                'start_date'        => '',
                'expiry_date'       => '',
                'city_id'           => '',
                'region_id'         => '',
                'address'           => '',
                'phone'             => '',
                'phonetwo'          => '',
                'lat'               => '',
                'lng'               => ''
            ]
        ];

    }

    public function updatedBranchlist($value, $nested)
    {
        $nestedData = explode(".", $nested);

        if($nestedData[1] == 'city_id' )
        {

            $this->value                                   = $value;
            $this->branchlist[$nestedData[0]]['region_id'] = null;
            $this->regions[$nestedData[0]]                 = regions::where('city_id', $value)->get()->toarray();
        }}
    public function addbranch()
    {
        $this->branchlist[]=
            [
            'importimage'       => '',
            'image'             => asset('assets/images/noimage.jpg'),
            'active'            => '0',
            'descriptionbranch' => '',
            'approval'          => '0',
            'top'               => '0',
            'numproduct'        => '1',
            'opentime'          => '',
            'closetime'         => '',
            'start_date'        => '',
            'expiry_date'       => '',
            'city_id'           => '',
            'region_id'         => '',
            'address'           => '',
            'phone'             => '',
            'phonetwo'          => '',
            'lat'               => '',
            'lng'               => ''
            ];
    }

    public function removebranch($index)
    {
        unset($this->branchlist[$index]) ;
        $this->branchlist= array_values($this->branchlist);

    }

    public function updatedSelectcity($value)
    {
        $this->regions = regions::whereCityId($value)->get();
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

    public function checkstore()
    {
        if(empty($this->branchlist[0]['region_id']))
        {
            $this->dispatchBrowserEvent('openalertModal');
            // $this->dispatchBrowserEvent('closealertModal');

        }else{
            $this->savestore();

        }

    }
    public function SaveStoreToAllRegion()
    {
    //     foreach( $this->branchlist as $index => $branch){
    //     if($this->branchlist[$index]['importimage'] != null){
    //         $importimages = $this->uploadimages('branch',$this->branchlist[$index]['importimage']);
    //     }else
    //     {
    //         $importimages = null;
    //     }
    //     dd( $this->branchlist[$index]['importimage'],$importimages );
    // }


        $store = stores::create(
            ['name'        => $this->name??null
            ,'slug'        => Str::slug($this->name)
            ,'category_id' => $this->selectsubcategory??$this->selectcategory
            ,'active'      => $this->activestore??null
            ,'branch_num'  => $this->numberbranch??null
            ,'user_id'     => Auth::guard()->id()??null
            ]
        );
            $region = regions::whereMain(false)->get();

            foreach(  $region as $index1 => $regionitem){
                foreach( $this->branchlist as $index => $branch)
                {
                    if($this->branchlist[$index]['importimage'] != null){
                        $importimages = $this->uploadimages('branch',$this->branchlist[$index]['importimage']);
                    }else
                    {
                        $importimages = null;
                    }

                    $store->branch()->create([
                        'slug2'        =>$this->name .' branch ' . $index . ($index1+1) ,
                        'image'       => $importimages??null,
                        'region_id'   => $regionitem->id,
                        'city_id'     => $regionitem->city_id,
                        'address'     => empty($this->branchlist[$index]['address'])?null:$this->branchlist[$index]['address'],
                        'accept'      => $this->branchlist[$index]['approval']??null,
                        'active'      => $this->branchlist[$index]['active']??null,
                        'top'         => $this->branchlist[$index]['top']??null,
                        'product_num' => $this->branchlist[$index]['numproduct']??null,
                        'lat'         => empty($this->branchlist[$index]['lat'])?null:$this->branchlist[$index]['lat'],
                        'lng'         => empty($this->branchlist[$index]['lng'])?null:$this->branchlist[$index]['lng'],
                        'opentime'    => empty($this->branchlist[$index]['opentime'])?null:$this->branchlist[$index]['opentime'],
                        'closetime'   => empty($this->branchlist[$index]['closetime'])?null:$this->branchlist[$index]['closetime'],
                        'start_date'  => empty($this->branchlist[$index]['start_date'])?null:$this->branchlist[$index]['start_date'],
                        'expiry_date' => empty($this->branchlist[$index]['expiry_date'])?null:$this->branchlist[$index]['expiry_date'],
                        'description' => empty($this->branchlist[$index]['descriptionbranch'])?null:$this->branchlist[$index]['descriptionbranch'],
                        'phone'       => empty($this->branchlist[$index]['phone'])?null:$this->branchlist[$index]['phone'],
                        'phone2'      => empty($this->branchlist[$index]['phonetwo'])?null:$this->branchlist[$index]['phonetwo'],
                    ]);
                }
            }
            $this->dispatchBrowserEvent('successmsg',['msg' => 'Save Store Success ❤ ']);

    }

    public function savestore()
    {

        $store = stores::create(
            ['name'        => $this->name??null
            ,'slug'        => Str::slug($this->name)
            ,'category_id' => $this->selectsubcategory??$this->selectcategory
            ,'active'      => $this->activestore??null
            ,'branch_num'  => $this->numberbranch??null
            ,'user_id'     => Auth::guard()->id()??null
            ]
        );

        foreach( $this->branchlist as $index => $branch){

            if($this->branchlist[$index]['importimage'] != null){
                $importimages = $this->uploadimages('branch',$this->branchlist[$index]['importimage']);
            }else
            {
                $importimages = null;
            }

                $store->branch()->create([
                    'slug2'       =>$this->name .' branch ' . ($index+1) ,
                    'image'       => $importimages??null,
                    'region_id'   => empty($this->branchlist[$index]['region_id'])?null:$this->branchlist[$index]['region_id'],
                    'city_id'     => empty($this->branchlist[$index]['city_id'])?null:$this->branchlist[$index]['city_id'],
                    'address'     => empty($this->branchlist[$index]['address'])?null:$this->branchlist[$index]['address'],
                    'accept'      => $this->branchlist[$index]['approval']??null,
                    'active'      => $this->branchlist[$index]['active']??null,
                    'top'         => $this->branchlist[$index]['top']??null,
                    'product_num' => $this->branchlist[$index]['numproduct']??null,
                    'lat'         => empty($this->branchlist[$index]['lat'])?null:$this->branchlist[$index]['lat'],
                    'lng'         => empty($this->branchlist[$index]['lng'])?null:$this->branchlist[$index]['lng'],
                    'opentime'    => empty($this->branchlist[$index]['opentime'])?null:$this->branchlist[$index]['opentime'],
                    'closetime'   => empty($this->branchlist[$index]['closetime'])?null:$this->branchlist[$index]['closetime'],
                    'start_date'  => empty($this->branchlist[$index]['start_date'])?null:$this->branchlist[$index]['start_date'],
                    'expiry_date' => empty($this->branchlist[$index]['expiry_date'])?null:$this->branchlist[$index]['expiry_date'],
                    'description' => empty($this->branchlist[$index]['descriptionbranch'])?null:$this->branchlist[$index]['descriptionbranch'],
                    'phone'       => empty($this->branchlist[$index]['phone'])?null:$this->branchlist[$index]['phone'],
                    'phone2'      => empty($this->branchlist[$index]['phonetwo'])?null:$this->branchlist[$index]['phonetwo'],
                ]);
            }


            $this->dispatchBrowserEvent('successmsg',['msg' => 'Save Store Success ❤ ']);


    }
    public function render()
    {
        return view('livewire.dashborad.store.newstore')->layout('admin.layouts.masterdash');
    }
}
