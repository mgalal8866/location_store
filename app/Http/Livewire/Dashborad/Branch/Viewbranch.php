<?php




namespace App\Http\Livewire\Dashborad\Branch;


use App\Models\stores;
use App\Models\branchs;
use Livewire\Component;
use App\Models\categories;
use Livewire\WithPagination;
use Livewire\WithFileUploads;


class Viewbranch extends Component
{
    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
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

    public function mount($slug)
    {
        $this->slug         = $slug;
        $this->categorys    = categories::all();
        $store = stores::whereSlug($this->slug)->first();
        $this->name         = $store->name;
        $this->activestore  = $store->getAttributes()['active'];
        $this->numberbranch = $store->branch_num;
        $parent             = categories::whereId($store->category_id)->first();
        if( $parent->parent_id != null){
            $this->selectsubcategory = $store->category_id;
            $this->selectcategory    = $parent->parent_id;
            $this->subcategorys      = categories::whereParentId($this->selectcategory)->get();
        }else
        {
            $this->selectcategory    = $store->category_id;
        }
    }
    public function active($slugbranch)
    {
        $branchs = branchs::where('slug',$slugbranch)->first();

        if( $branchs->getAttributes()['active'] == 1) {
            $branchs->update(['active' => 0,]);
            $this->dispatchBrowserEvent('Toast',['ev' => 'success','msg' => 'branchs is avtive now']);
        }else {
            $branchs->update(['active' => 1,]);
            $this->dispatchBrowserEvent('Toast',['ev' => 'success','msg' => 'branchs is Desavtive now']);
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
    public function render()
    {
        $branchs = branchs::wherehas('stores' ,function($q){$q->whereSlug($this->slug);})->latest()->paginate(10);
        return view('livewire.dashborad.branch.viewbranch',['branchs' => $branchs])->layout('admin.layouts.masterdash');
    }
}

