<?php

namespace App\Http\Livewire\Dashborad\Category;

use Livewire\Component;
use App\Models\categories;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Http\Controllers\Api\Traits\GeneralTrait;

class Maincategory extends Component
{
    use WithPagination;
    use WithFileUploads;
    use GeneralTrait;

    protected $paginationTheme = 'bootstrap';
    public $photo, $name, $slug,$image,$iteration;
    public function view($slug,$name1)
    {
        $this->slug = $slug;
        $this->name = $name1;
    }
    public function update()
    {
        if ($this->image != null){
           $this->image = $this->uploadimages('category',$this->image);
        }
        $category = categories::where('slug',$this->slug)->first();


        $category->update([
            'name' => $this->name,
            'slug' => Str::slug($this->name),
            'parent_id' => null,
            'image' => $this->image??$category->getAttributes()['image']
        ]);
        $this->reset();
        $this->image = null;
        $this->dispatchBrowserEvent('closeModal');
        $this->dispatchBrowserEvent('Toast',['ev' => 'success','msg' => 'update '.$this->name.' Done']);

    }
    public function edit($slug,$parent='')
    {

        $category = categories::where('slug',$slug)->first();


        $this->photo = $category->image;
        $this->slug = $slug;
        $this->name = $category->name;

        return;
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
                'parent_id'=> null,
                'image' => $this->image??null,
                'active' => 0
            ]);
        $this->reset();
        $this->iteration++;
        $this->dispatchBrowserEvent('closeModal');
        $this->dispatchBrowserEvent('Toast',['ev' => 'success','msg' => 'Created '.$this->name.' Done']);

    }

    public function render()
    {
        $categorys = categories::whereParentId(null)->latest()->paginate(10);
        return view('livewire.dashborad.category.maincategory',['categorys' => $categorys])->layout('admin.layouts.masterdash');
    }
}
