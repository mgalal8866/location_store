<?php

namespace App\Http\Livewire\Dashborad\Category;

use App\Models\categories;
use Livewire\Component;

class Subcategory extends Component
{
    public $categorys,$slug ;
    public function mount($slug = null)
    {
        $this->slug = $slug ;
    }
    public function render()
    {
        $this->categorys = categories::get();
        return view('livewire.dashborad.category.subcategory')->layout('admin.layouts.masterdash');
    }
}
