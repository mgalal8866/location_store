<?php


namespace App\Http\Livewire\Dashborad\category;

use Livewire\Component;

use App\Models\categories;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Http\Controllers\Api\Traits\GeneralTrait;

class Category extends Component
{
    public $name,$parent,$slug,$image;
    use WithPagination;
    use WithFileUploads;
    use GeneralTrait;
    protected $paginationTheme = 'bootstrap';


    public function view($slug,$name1)
    {
        $this->slug = $slug;
        $this->name = $name1;
    }

    public function delete()
    {
        $category = categories::whereSlug($this->slug)->first();
        $category->delete();
        $this->dispatchBrowserEvent('closeModal');
        // $this->dispatchBrowserEvent('Toast',['ev' => 'success','msg' => 'Delete Done']);
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
                'image' => $this->image??null
            ]);
        $this->dispatchBrowserEvent('closeModal');
        // $this->dispatchBrowserEvent('Toast',['ev' => 'success','msg' => 'Created '.$this->name.' Done']);
        $this->reset();
    }
    public function edit($slug,$parent)
    {
        $this->slug = $slug;
        $category = categories::whereSlug($slug )->first();
        if($parent){
             $parent = categories::whereSlug($parent)->first();
              $this->parent = $parent->slug;
        }else{
            $this->parent='';
        }
        $this->slug = $slug;
        $this->name = $category->name;
    }
    public function update()
    {
        $category = categories::whereSlug($this->slug)->first();
        $parent = categories::wherelug($this->parent)->first();
        $category->update([
            'name' => $this->name,
            'parent_id' =>   ($parent->id)??null
        ]);
        $this->reset();
        $this->dispatchBrowserEvent('closeModal');
        $this->dispatchBrowserEvent('Toast',['ev' => 'success','msg' => 'update '.$this->name.' Done']);
    }
    public function render()
    {
        $category = categories::latest()->paginate(10);
        return view('admin.livewire.dashborad.category.viewcategory',['category' =>$category])->layout('admin.layouts.masterdash');
    }
}
