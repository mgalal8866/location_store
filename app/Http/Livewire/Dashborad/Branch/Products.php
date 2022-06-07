<?php

namespace App\Http\Livewire\Dashborad\Branch;

use Livewire\Component;

class Products extends Component
{
    public $index;
public $products = [];
    public function mount($branch)
    {

        // unset($this->products[0]);

        foreach($branch->product as $product )
        {
            $this->products [] =
                ['product' => $product,
                'id' => $product->id,
                 'branch_id' => $product->branch_id,
                 'name' =>$product->name,
                 'price' =>$product->price  ,
                 'description' => $product->description,
                 'active' => $product->active,
                 'activebadge' => $product->activebadge,
                 'start_date'=> $product->start_date,
                 'expiry_date'=> $product->expiry_date,
                 'create'=> $product->created_at->diffForHumans(),
                 'image'=> ['img' => $product->product_images->first()->img ?? asset('assets/images/noimage.jpg')],
                 ] ;
        }
        //  dd($this->products);
    }
    public function edit($index){
            $this->index = $index;
    }


    public function updatedProducts($value, $nested)
    {
        $nestedData = explode(".", $nested);
        if($nestedData[1] == 'active' )
        {

        }
    }


    public function render()
    {
        return view('livewire.dashborad.branch.products');
    }
}
