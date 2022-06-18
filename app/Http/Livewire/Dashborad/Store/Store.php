<?php

namespace App\Http\Livewire\Dashborad\Store;

use App\Models\stores;
use Livewire\Component;
use Livewire\WithPagination;

class Store extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public    $pages, $status;
	public $searchTerm = null;
    public $sortColumnName = 'created_at';

    public $sortDirection = 'desc';

//  public $postId;

//     public function getPostProperty()
//     {
//         return Post::find($this->postId);
//     }

//     public function deletePost()
//     {
//         $this->post->delete();
//     }
        public function sortBy($columnName)
        {
            if ($this->sortColumnName === $columnName) {
                $this->sortDirection = $this->swapSortDirection();
            } else {
                $this->sortDirection = 'asc';
            }

            $this->sortColumnName = $columnName;
        }

        public function swapSortDirection()
        {
            return $this->sortDirection === 'asc' ? 'desc' : 'asc';
        }
        public function filterStoreByStatus($status = null)
        {
            $this->resetPage();
            $this->status = $status;
        }


    public function render()
    {


        $storeall       =  stores::count();
        $storeactive    =  stores::whereActive(0)->count();
        $storedisactive =  stores::whereActive(1)->count();

             $stores = stores::with('branch')->
            when($this->status, function ($query, $status) {
                return $query->where('active', $status);})->
            whereHas('user' , function ($query) {
                return $query->where('mobile', 'like', '%'.$this->searchTerm.'%');})->
            orderBy($this->sortColumnName, $this->sortDirection)->
            latest()->paginate($this->pages);

        return view('livewire.dashborad.store.viewstore',
            [
                'stores'        => $stores,
                'storeactive'   => $storeactive,
                'storedisactive'=> $storedisactive,
                'storeall'      => $storeall
            ])->layout('admin.layouts.masterdash');
    }
}
