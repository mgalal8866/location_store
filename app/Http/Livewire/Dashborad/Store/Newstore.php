<?php

namespace App\Http\Livewire\Dashborad\Store;

use App\Http\Resources\branch;
use App\Models\cities;
use App\Models\stores;
use App\Models\regions;
use Livewire\Component;
use App\Models\categories;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class Newstore extends Component
{
    public $name,$activestore,$numberbranch,$categorys,$selectcity,$citys,$regions,$subcategorys ,$branchlist = [],$selectcategory,
    $selectsubcategory;
    public function mount()
    {
        $this->categorys    = categories::all();
        $this->citys        = cities::all();
        $this->branchlist=[
            ['active'=>'0',
            'descriptionbranch'=>'test0',
            'approval'=>'1',
            'top'=>'0',
            'opentime'=>'',
            'closetime'=>'',
            'start_date'=>'',
            'expiry_date'=>'',
            'city_id'=>'',
            'region_id'=>'',
            'address'=>'',
            'phone'=>'',
            'phonetwo'=>'',
            'lat'=>'',
            'lng'=>'']
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
            ['active'=>  '1',
            'descriptionbranch'=>'1',
            'approval'=>'1',
            'top'=>'0',
            'opentime'=>'',
            'closetime'=>'',
            'start_date'=>'',
            'expiry_date'=>'',
            'city_id'=>'',
            'region_id'=>'',
            'address'=>'',
            'phone'=>'',
            'phonetwo'=>'',
            'lat'=>'',
            'lng'=>'']
        ;
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

    public function savestore()
    {
    //   dd($this->branchlist);
        $store = stores::create(
            ['name'        => $this->name??null
            ,'slug'        => Str::slug($this->name)
            ,'category_id' => $this->subcategorys??$this->selectcategory
            ,'active'      => $this->activestore??null
            ,'branch_num'  => $this->numberbranch??null
            ,'user_id'     => Auth::user()->id??null
            ]
        );

        foreach( $this->branchlist as $index => $branch){
                $store->branch()->create([
                    'region_id'   => $this->branchlist[$index]['region_id']??null,
                    'city_id'     => $this->branchlist[$index]['city_id']??null,
                    'address'     => $this->branchlist[$index]['address']??null,
                    'accept'      => $this->branchlist[$index]['approval']??null,
                    'top'         => $this->branchlist[$index]['top']??null,
                    'lat'         => $this->branchlist[$index]['lat']??null,
                    'lng'         => $this->branchlist[$index]['lng']??null,
                    'opentime'    => $this->branchlist[$index]['opentime']??null,
                    'closetime'   => $this->branchlist[$index]['closetime']??null,
                    'start_date'  => $this->branchlist[$index]['start_date']??null,
                    'expiry_date' => $this->branchlist[$index]['expiry_date']??null,
                    'description' => $this->branchlist[$index]['descriptionbranch']??null,
                    'phone'       => $this->branchlist[$index]['phone']??null,
                    'phone2'      => $this->branchlist[$index]['phonetwo']??null,
                ]);
            }
            $this->dispatchBrowserEvent('successmsg',['msg' => 'Save Store Success ❤ ']);


    }
    public function render()
    {
        return view('livewire.dashborad.store.newstore')->layout('admin.layouts.masterdash');
    }
}
