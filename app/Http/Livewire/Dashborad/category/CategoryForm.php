<?php

namespace App\Http\Livewire\Dashborad\Category;

use Livewire\Component;
use App\Models\categories;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Http\Controllers\Api\Traits\GeneralTrait;

class CategoryForm extends Component
{  use WithPagination;
    use WithFileUploads;
    use GeneralTrait;
    public $name,$parent,$image,$photo,$modelid;

    protected $paginationTheme = 'bootstrap';

    protected $listeners=
    [
        'getmodelid'
    ];

    public function getmodelid($modelid)
    {
        $this->modelid = $modelid;
        $category = categories::whereSlug($this->modelid)->first();
        $this->name = $category->name;
        $this->parent = $category->parent_id;
        $this->photo = $category->image;
    }
    public function save()
    {

        $data =[
            'name' => $this->name,
            'slug' => Str::slug($this->name),
            'parent_id'=>  ($this->parent)??null,
            ];
        if ($this->image != null)
        {
            $this->image = $this->uploadimages('category',$this->image);
            $data = array_merge($data, ['image' => $this->image]);
        }

        if ($this->modelid)
        {
            $category = categories::whereSlug($this->modelid)->update($data);
            // $categorysId = $this->modelid;
            $this->dispatchBrowserEvent('Toast',['ev' => 'success','msg' => 'Updated '.$category->name.' Done']);
        }else{

            $data = array_merge($data, ['active' => 0]);
            $category =  categories::create($data);
            // $categoryID = $category->id;
            $this->dispatchBrowserEvent('Toast',['ev' => 'success','msg' => 'Created '.$category->name.' Done']);
        }

        // $this->reset();
        // $this->resetErrorBag();
        // $this->resetValidation();
        $this->dispatchBrowserEvent('closeModal');
        $this->emit('refreshcategory');
    }
    public function render()
    {
        $categorys = categories::latest()->get();

        return view('livewire.dashborad.category.category-form',['categorys' =>$categorys]);
    }
}
