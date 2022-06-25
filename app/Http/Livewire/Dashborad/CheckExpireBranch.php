<?php

namespace App\Http\Livewire\Dashborad;

use App\Models\branchs;
use Livewire\Component;
use Livewire\WithPagination;

class CheckExpireBranch extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';



    public function render()
    {
        $branchexpire = branchs::whereActive(0)->WhereNotNull('expiry_date')->paginate(5);

        return view('livewire.dashborad.check-expire-branch',['branchexpire' => $branchexpire]);
    }
}
