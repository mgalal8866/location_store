<?php

namespace App\Http\Livewire\Dashborad\Category;

use Livewire\Component;
use App\Models\categories;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Subcategory extends Component
{
    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $maincat,$categorys,$slug ,$parent,$mainslug, $name,$cat=[],$image,$photo;

    public function mount($mainslug)
    {
        $this->mainslug = $mainslug ;
        $this->categorys = categories::get();
        $this->cat = categories::where('slug', $this->mainslug)->first()->toarray();
    }
    public function view($slug,$name1)
    {
        $this->slug = $slug;
        $this->name = $name1;
    }
    public function create()
    {

        if ($this->image != null){
           $this->image = uploadimages('category',$this->image);
        }
            categories::create([
                'name' => $this->name,
                'slug' => Str::slug($this->name),
                'parent_id'=>  $this->cat['id']??null,
                'image' => $this->image??null,
                'active' => 0
            ]);

        // $this->iteration++;
        $this->resetExcept('cat');
        $this->dispatchBrowserEvent('closeModal');
        $this->dispatchBrowserEvent('Toast',['ev' => 'success','msg' => 'Created '.$this->name.' Done']);

    }
    public function update()
    {

        dd($this->name,$this->cat['id']);
        if ($this->image != null){
           $this->image = uploadimages('category',$this->image);
        }
        $category = categories::where('slug',$this->slug)->first();


        $category->update([
            'name' => $this->name,
            'slug' => Str::slug($this->name),
            'parent_id' => $this->cat['id'] ,
            'image' => $this->image??$category->getAttributes()['image']
        ]);
        // $this->resetExcept('cat');
        // $this->image = null;
        $this->dispatchBrowserEvent('closeModal');
        $this->dispatchBrowserEvent('Toast',['ev' => 'success','msg' => 'update '.$this->name.' Done']);

    }
    public function edit($slug,$parent='')
    {

        $category = categories::where('slug',$slug)->first();
        if($parent){
            $parent = categories::where('slug',$parent)->first();
             $this->parent = $parent->slug;
       }else{
           $this->parent='';
       }
        $this->photo = $category->image;
        $this->slug = $slug;
        $this->name = $category->name;


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
        $this->resetExcept('cat');
        $this->dispatchBrowserEvent('closeModal');
        $this->dispatchBrowserEvent('Toast',['ev' => 'success','msg' => 'Delete Done']);
    }
    public function render()
    {
        $mcategorys = categories::where('parent_id', $this->cat['id'])->latest()->paginate(10);
        return view('livewire.dashborad.category.subcategory',['mcategorys' => $mcategorys])->layout('admin.layouts.masterdash');
    }
}
