<?php


namespace App\Http\Livewire\Dashborad\category;

use Livewire\Component;

use App\Models\categories;

class Category extends Component
{
    public function render()
    {
        $category = categories::latest()->paginate(10);
        return view('admin.livewire.dashborad.category.category',['category' =>$category])->layout('admin.layouts.masterdash');
    }
}
