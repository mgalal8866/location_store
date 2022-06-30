<?php

namespace App\Http\Livewire\Dashborad\Products;

use Livewire\Component;
use App\Models\products;
use Livewire\WithFileUploads;

class Product extends Component
{public $products,$i =0, $productlist;
    use WithFileUploads;
    public function mount($slug=null)
    {
             $this->slug = $slug;

            $this->products = products::get();
            foreach($this->products as $product)
                {
                    $this->productlist[ $this->i]['product_id']       = $product->id;
                    $this->productlist[ $this->i]['slug']             = $product->slug;
                    $this->productlist[ $this->i]['active']           = $product->active;
                    $this->productlist[ $this->i]['name']             = $product->name;
                    $this->productlist[ $this->i]['price']            = $product->price;
                    $this->productlist[ $this->i]['description']      = $product->description;
                    $this->i +=  1;
                }
    }
    public function render()
    {

        return view('livewire.dashborad.products.product')->layout('admin.layouts.masterdash');
    }
}
