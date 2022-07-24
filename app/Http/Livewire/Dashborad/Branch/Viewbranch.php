<?php




namespace App\Http\Livewire\Dashborad\Branch;

use App\Models\cities;
use App\Models\stores;
use App\Models\branchs;
use App\Models\regions;
use Livewire\Component;
use App\Models\categories;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Livewire\FileUploadConfiguration;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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
    public $branchlist=[] , $regions=[] , $citys=[];

    public function mount($slug)
    {
        $this->slug         = $slug;
        $this->categorys    = categories::all();
        $this->citys        = cities::all();
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

    public function render()
    {
        $branchs = branchs::wherehas('stores' ,function($q){
            $q->whereSlug($this->slug);})->paginate(10);
            $this->name =  $branchs->first()->stores->name;
            $this->activestore  = $branchs->first()->stores->getAttributes()['active'];
            $this->numberbranch = $branchs->first()->stores->branch_num;
            $parent             = categories::whereId($branchs->first()->stores->category_id)->first();
            if( $parent->parent_id != null){
                $this->selectsubcategory = $branchs->first()->stores->category_id;
                $this->selectcategory    = $parent->parent_id;
                $this->subcategorys      = categories::whereParentId($this->selectcategory)->get();
            }else
            {
                $this->selectcategory    = $branchs->first()->stores->category_id;
            }
        return view('livewire.dashborad.branch.viewbranch',['branchs' => $branchs])->layout('admin.layouts.masterdash');
    }
}

