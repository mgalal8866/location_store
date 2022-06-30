<?php

namespace App\Http\Livewire\Dashborad\Store;

use App\Models\branchs;
use App\Models\stores;
use Livewire\Component;
use Livewire\WithPagination;

class Store extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $pages, $status,$idstore;
	public $searchTerm = null;
    public $sortColumnName = 'created_at';
    public $sortDirection = 'desc';


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
        public function deleteId($id)
        {
            $this->idstore = $id;
        }
        public function delete($state)
        {
            $store = stores::find($this->idstore);
            if($state=='soft'){
                    foreach($store->branch as $branch){
                        if($branch->product->count() > 0 ){
                            foreach($branch->product as $product){
                                if($product->product_images->count() > 0 ){
                                    foreach($product->product_images as $product_image){
                                        deleteimage('product', $product_image->getAttributes()['img'] );
                                        $product_image->delete();
                                    }
                                }
                                $product->delete();
                            }
                        }
                        deleteimage('branch', $branch->getAttributes()['image']);
                        $branch->delete();
                    }
                    $store->delete();
            }elseif($state == 'hard'){
                foreach($store->branch as $branch){
                    if($branch->product->count() > 0 ){
                        foreach($branch->product as $product){
                            if($product->product_images->count() > 0 ){
                                foreach($product->product_images as $product_image){
                                    deleteimage('product', $product_image->getAttributes()['img'] );
                                    $product_image->forceDelete();
                                }
                            }
                            $product->forceDelete();
                        }
                    }
                    deleteimage('branch', $branch->getAttributes()['image']);
                    $branch->forceDelete();
                }
                $store->forceDelete();
            }
            $this->dispatchBrowserEvent('successmsg',['msg' => 'Deleted Success']);
            $this->dispatchBrowserEvent('closeModal');
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
