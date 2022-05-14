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
    public $name,$parent,$slug,$image;

    // public function view($slug,$name1)
    // {
    //     $this->slug = $slug;
    //     $this->name = $name1;
    // }

    // public function delete()
    // {
    //     $category = categories::where('slug',$this->slug)->first();
    //     $category->delete();
    //     $this->dispatchBrowserEvent('closeModal');
    //     // Toster::error('An error has occurred please try again later.');

    //     $this->dispatchBrowserEvent('Toast',['ev' => 'success','msg' => 'Delete Done']);
    // }

    // public function create()
    // {

    //     if ($this->image != null){
    //        $this->image = $this->uploadimages('category',$this->image);
    //     }
    //         categories::create([
    //             'name' => $this->name,
    //             'slug' => Str::slug($this->name),
    //             'parent_id'=>  ($this->parent)??null,
    //             'image' => $this->image??null,
    //             'active' => 0
    //         ]);
    //     $this->dispatchBrowserEvent('closeModal');
    //     $this->dispatchBrowserEvent('Toast',['ev' => 'success','msg' => 'Created '.$this->name.' Done']);
    //     $this->reset();
    // }
    // public function edit($slug,$parent='')
    // {

    //     $this->slug = $slug;
    //     $category = categories::where('slug',$slug)->first();
    //     if($parent){
    //          $parent = categories::where('slug',$parent)->first();
    //           $this->parent = $parent->slug;
    //     }else{
    //         $this->parent='';
    //     }
    //     // dd($slug . $this->parent);
    //     $this->slug = $slug;
    //     $this->name = $category->name;
    // }
    // public function update()
    // {
    //     if ($this->image != null){
    //        $this->image = $this->uploadimages('category',$this->image);
    //     }
    //     $category = categories::where('slug',$this->slug)->first();
    //     $parent = categories::where('slug',$this->parent)->first();

    //     $category->update([
    //         'name' => $this->name,
    //         'slug' => Str::slug($this->name),
    //         'parent_id' => ($parent->id)??null,
    //         'image' => $this->image??$category->getAttributes()['image']
    //     ]);
    //     // $this->reset();
    //     // $this->dispatchBrowserEvent('closeModal');
    //     // $this->dispatchBrowserEvent('Toast',['ev' => 'success','msg' => 'update '.$this->name.' Done']);
    // }

    // public function active($slug)
    // {

    //         $category = categories::where('slug',$slug)->first();

    //         if( $category->getAttributes()['active'] == 1) {
    //             $category->update(['active' => 0,]);
    //             $this->dispatchBrowserEvent('Toast',['ev' => 'success','msg' => 'Category is avtive now']);
    //         }else {
    //             $category->update(['active' => 1,]);
    //             $this->dispatchBrowserEvent('Toast',['ev' => 'success','msg' => 'Category is Desavtive now']);
    //         }
    // }
    public function render()
    {
        $category = categories::latest()->paginate(10);
        return view('admin.livewire.dashborad.category.viewcategory',['category' =>$category])->layout('admin.layouts.masterdash');
    }
}
