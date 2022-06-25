<?php

namespace App\Http\Livewire\Dashborad;

use App\Models\branchs;
use Livewire\Component;
use Livewire\WithPagination;

class CheckExpireBranch extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $startdate  , $enddate;
    public function mount(){
        $this->startdate = now()->toFormattedDate();
        $this->enddate = now()->addDays(7)->toFormattedDate();
    }
    public function updatedStartdate()
    {
    //   dd( $this->startdate , $this->enddate);
    }
    public function updatedEnddate()
    {
    //   dd( $this->enddate);
    }
    public function render()
    {
        $branchexpire = branchs::whereBetween('expiry_date', [$this->startdate, $this->enddate ])->whereActive(0)->WhereNotNull('expiry_date')->paginate(5);

        return view('livewire.dashborad.check-expire-branch',['branchexpire' => $branchexpire]);
    }
}
