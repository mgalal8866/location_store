<?php

namespace App\Http\Livewire\Dashborad\Category;

use Livewire\Component;
use App\Models\categories;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Http\Controllers\Api\Traits\GeneralTrait;

class Category2 extends Component
{
    use WithPagination;
    use WithFileUploads;
    use GeneralTrait;
    public $itemid,$actionmodel;
    protected $paginationTheme = 'bootstrap';
    protected $listeners=['refreshcategory' => '$refresh'];


    public function selectmodel($itemid,$actionmodel)
    {
        $this->itemid = $itemid;
        $this->actionmodel = $actionmodel;

        if ($actionmodel == 'delete')
            {
                // This will show the modal on the frontend
                $this->dispatchBrowserEvent('openDeleteModal');
            } elseif ($actionmodel == 'showPhotos') {
                // Pass the currently selected item
                $this->emit('getPostId', $this->itemid);
                // Show the modal that shows the additional photos
                $this->dispatchBrowserEvent('openModalShowPhotos');
            }
        else {
            $this->emit('getmodelid', $this->itemid);
            $this->dispatchBrowserEvent('openModal');
        }

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
    {    $categorys = categories::latest()->paginate(5);

        return view('livewire.dashborad.category.category2',['categorys' =>$categorys])->layout('admin.layouts.masterdash');
    }
}
