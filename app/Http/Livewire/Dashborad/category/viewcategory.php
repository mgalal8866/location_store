<?php
namespace App\Http\Livewire\Dashborad\category;

use Livewire\Component;
use App\Models\categories;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Http\Controllers\Api\Traits\GeneralTrait;

class viewcategory extends Component
{

    use WithPagination;
    use WithFileUploads;
    use GeneralTrait;
    protected $paginationTheme = 'bootstrap';
    public $name,$parent,$slug,$image,$iteration,$img;
    public function updated($propertyImage,$propertyIteration)
    {
        // if($this->image != null){
        //     $this->img = $this->image;
        // }else{
        //     $this->img = "";
        // }
    }

    public function view($slug,$name1)
    {
        $this->slug = $slug;
        $this->name = $name1;
    }

    public function delete()
    {
        $category = categories::where('slug',$this->slug)->first();
        $category->delete();
        $this->reset();
        $this->dispatchBrowserEvent('closeModal');
        $this->dispatchBrowserEvent('Toast',['ev' => 'success','msg' => 'Delete Done']);
    }

    public function create()
    {

        if ($this->image != null){
           $this->image = $this->uploadimages('category',$this->image);
        }
            categories::create([
                'name' => $this->name,
                'slug' => Str::slug($this->name),
                'parent_id'=>  ($this->parent)??null,
                'image' => $this->image??null,
                'active' => 0
            ]);
        $this->reset();
        $this->iteration++;
        $this->dispatchBrowserEvent('closeModal');
        $this->dispatchBrowserEvent('Toast',['ev' => 'success','msg' => 'Created '.$this->name.' Done']);

    }

    public function edit($slug,$parent='')
    {
        $this->iteration++;
        $this->slug = $slug;
        $category = categories::where('slug',$slug)->first();
        if($parent){
             $parent = categories::where('slug',$parent)->first();
              $this->parent = $parent->slug;
        }else{
            $this->parent='';
        }
        $this->slug = $slug;
        $this->name = $category->name;
    }

    public function update()
    {
        if ($this->image != null){
           $this->image = $this->uploadimages('category',$this->image);
        }
        $category = categories::where('slug',$this->slug)->first();
        $parent = categories::where('slug',$this->parent)->first();

        $category->update([
            'name' => $this->name,
            'slug' => Str::slug($this->name),
            'parent_id' => ($parent->id)??null,
            'image' => $this->image??$category->getAttributes()['image']
        ]);
        $this->reset();
        $this->image = null;
        $this->dispatchBrowserEvent('closeModal');
        $this->dispatchBrowserEvent('Toast',['ev' => 'success','msg' => 'update '.$this->name.' Done']);

   }

    public function active($slug)
    {

            $category = categories::where('slug',$slug)->first();

            if( $category->getAttributes()['active'] == 1) {
                $category->update(['active' => 0,]);
                $this->dispatchBrowserEvent('Toast',['ev' => 'success','msg' => 'Category is avtive now']);
            }else {
                $category->update(['active' => 1,]);
                $this->dispatchBrowserEvent('Toast',['ev' => 'success','msg' => 'Category is Desavtive now']);
            }
    }

    public function render()
    {
        $categorys = categories::latest()->paginate(10);
        return view('livewire.category.viewcategory',['categorys' =>$categorys])->layout('admin.layouts.masterdash');
    }
}
