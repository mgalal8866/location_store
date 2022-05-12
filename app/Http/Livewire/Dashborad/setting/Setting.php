<?php

namespace App\Http\Livewire\Dashborad\setting;

use Livewire\Component;

class Setting extends Component
{
    public function render()
    {
        return view('admin.livewire.dashborad.setting.setting')->layout('admin.layouts.masterdash');
    }
}
