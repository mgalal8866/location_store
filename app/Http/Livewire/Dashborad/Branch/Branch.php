<?php

namespace App\Http\Livewire\Dashborad\Branch;

use App\Models\cities;
use App\Models\stores;
use App\Models\branchs;
use App\Models\regions;
use Livewire\Component;
use App\Models\categories;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Livewire\FileUploadConfiguration;

class Branch extends Component
{
    use WithFileUploads;

    public $image;
    public
    $name,
    $slug,
    $stores,
    $activestore,
    $numberbranch,
    $subcategorys=null,
    $selectsubcategory=null,
    $selectcategory=null,
    $description,
    $branch_id;

    public $i =0;
    public $branchlist=[] , $regions=[] , $citys=[];

    public function mount($slug)
    {
        $this->slug         = $slug;
        $this->categorys    = categories::all();
        $this->citys        = cities::all();
        $this->stores       = stores::whereSlug($this->slug)->first();
        $this->name         = $this->stores->name;
        $this->activestore  = $this->stores->getAttributes()['active'];
        $this->numberbranch = $this->stores->branch_num;
        $parent             = categories::whereId($this->stores->category_id)->first();

            if( $parent->parent_id != null){
                $this->selectsubcategory = $this->stores->category_id;
                $this->selectcategory    = $parent->parent_id;
                $this->subcategorys      = categories::whereParentId($this->selectcategory)->get();
            }else
            {
                $this->selectcategory    = $this->stores->category_id;
            }

            foreach($this->stores->branch as $branch)
                {
                    $this->branchlist[ $this->i]['branch_id']        = $branch->id;
                    $this->branchlist[ $this->i]['image']            = $branch->image;
                    $this->branchlist[ $this->i]['descriptionbranch']= $branch->description;
                    $this->branchlist[ $this->i]['approval']         = $branch->accept;
                    $this->branchlist[ $this->i]['active']           = $branch->getAttributes()['active'];
                    $this->branchlist[ $this->i]['address']          = $branch->address;
                    $this->branchlist[ $this->i]['start_date']       = $branch->start_date;
                    $this->branchlist[ $this->i]['expiry_date']      = $branch->expiry_date;
                    $this->branchlist[ $this->i]['phone']            = $branch->phone;
                    $this->branchlist[ $this->i]['phonetwo']         = $branch->phone2;
                    $this->branchlist[ $this->i]['city_id']          = $branch->city_id;
                    $this->branchlist[ $this->i]['region_id']        = $branch->region_id;
                    $this->branchlist[ $this->i]['opentime']         = $branch->opentime;
                    $this->branchlist[ $this->i]['closetime']        = $branch->closetime;
                    $this->branchlist[ $this->i]['numproduct']       = $branch->product_num;
                    $this->branchlist[ $this->i]['lat']              = $branch->lat;
                    $this->branchlist[ $this->i]['lng']              = $branch->lng;
                    $this->branchlist[ $this->i]['top']              = $branch->top;
                    $this->regions[ $this->i]                        = regions::where('city_id', $branch->city_id)->get()->toarray();
                    $this->i +=  1;
               }
    }

    public function savestore()
    {
        $rulesList=[
            "name"         => "required",
            "numberbranch" => "required|min:1|gt:0",
            "activestore"  => "required"
          ];

        if(!empty($this->subcategorys)){
            $rulesList["selectsubcategory"] = 'required';
        }

        $this->validate( $rulesList ,[
            'selectsubcategory.required' => 'برجاء اختيار القسم الفرعى',
            'name.required'              => 'الاسم مطلوب',
            'activestore.required'       => 'الحاله مطلوب',
            'numberbranch.required'      => 'عدد الفروع مطلوب',
            'numberbranch.gt'            => 'عدد الفروع مطلوب',
        ]);

        $store = stores::whereSlug($this->slug)->first();
        $store->update(
            [
                'name'        =>  $this->name,
                'active'      =>  $this->activestore,
                'category_id' => ($this->selectsubcategory != null)? $this->selectsubcategory : $this->selectcategory ,
                'branch_num'  =>  $this->numberbranch,
            ]);

        $this->dispatchBrowserEvent('successmsg',['msg' => 'Save Update Success ❤ ']);
    }

    public function save($slug , $index)
    {
        $rulesList=[
            "branchlist.*.descriptionbranch"=>"required",
            "branchlist.*.address"          =>"required",
            "branchlist.*.phone"            => "required",
            //  "branchlist.*.start_date"=>"required",
            //  "branchlist.*.expiry_date"=>"required",
            //  "branchlist.*.phonetwo" => "required",
            //  "branchlist.*.region_id" => "required",
            //  "branchlist.*.city_id" => "required",
            //  "branchlist.*.opentime" => "required",
            //  "branchlist.*.closetime" => "required",
            // "branchlist.*.numproduct" => "required|min:1|gt:0",
            //  "branchlist.*.lat" => "required",
            //  "branchlist.*.lng" => "required",
        ];
        $this->validate( $rulesList ,[
            'branchlist.*.descriptionbranch.required' => 'الوصف مطلوب',
            'branchlist.*.address.required'           => 'العنوان مطلوب',
            'branchlist.*.numproduct.required'        => 'عدد المنتجات مطلوب',
            'branchlist.*.numproduct.gt'              => 'عدد المنتجات يجب ان يكون لايساوى0'
        ]);

            // dd($this->branchlist[$index]['start_date']);
            $branch = branchs::find($this->branchlist[$index]['branch_id']);
            $branch->update(
                [
                    'active'     => $this->branchlist[$index]['active'],
                    'top'        => $this->branchlist[$index]['top'],
                    'description'=> $this->branchlist[$index]['descriptionbranch'],
                    'start_date' => ($this->branchlist[$index]['start_date'] == '')? null : $this->branchlist[$index]['start_date'],
                    'expiry_date'=> ($this->branchlist[$index]['expiry_date'] == '')? null :$this->branchlist[$index]['expiry_date'],
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
        $this->dispatchBrowserEvent('successmsg',['msg' => 'Save Update Success ✔']);

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
            $this->value                                   = $value;
            $this->branchlist[$nestedData[0]]['region_id'] = null;
            $this->regions[$nestedData[0]]                 = regions::where('city_id', $value)->get()->toarray();
        }

        if($nestedData[1] == 'image' )
        {
            $branch = branchs::find($this->branchlist[$nestedData[0]]['branch_id']);
            $previousPath   = $branch->getAttributes()['image'];
            $mmm            = $this->branchlist[$nestedData[0]]['image']->store('/', 'branch');
            $branch->update(['image' =>  $mmm  ]);

            $this->branchlist[$nestedData[0]]['image'] = $branch->image;
            Storage::disk('branch')->delete($previousPath);


            $this->dispatchBrowserEvent('successmsg',['msg' => 'Changed Image ✔']);
        }

        if($nestedData[1] == 'start_date' )
        {
            // dd($this->branchlist[$nestedData[0]]['start_date']);
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

    protected function cleanupOldUploads()
    {
            $storage = Storage::disk('local');
            foreach(  $storage->allFiles('livewire-tmp') as $filepathname)
            {
                $yesterdaysStemp = now()->subHours(1)->timestamp ;
                if($yesterdaysStemp > $storage->lastModified($filepathname) ){
                    $storage->delete($filepathname);
                }
            }
    }

    public function render()
    {
        return view('livewire.dashborad.branch.branch')->layout('admin.layouts.masterdash');
    }
}
