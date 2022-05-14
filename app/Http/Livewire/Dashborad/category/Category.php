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

    public function render()
    {
        $category = categories::latest()->paginate(10);
        return view('admin.livewire.dashborad.category.category',['category' =>$category])->layout('admin.layouts.masterdash');
    }
}
