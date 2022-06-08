<?php

namespace App\Http\Livewire\Dashborad\Branch;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\products as ModelsProducts;

class Products extends Component
{
    public $index;
    public $products = [];
    use WithFileUploads;
    public function mount($branch)
    {
        foreach($branch->product as $product )
        {
            $this->products [] =
                ['product'     => $product,
                 'id'          => $product->id,
                 'branch_id'   => $product->branch_id,
                 'name'        => $product->name,
                 'price'       => $product->price  ,
                 'description' => $product->description,
                 'active'      => $product->active,
                 'activebadge' => $product->activebadge,
                 'start_date'  => $product->start_date,
                 'expiry_date' => $product->expiry_date,
                 'create'      => $product->created_at->diffForHumans(),
                 'image'       => [
                                    'img1' => $product->product_images->where('is_default','1')->first()->img ?? asset('assets/images/noimage.jpg'),
                                    'img2' => $product->product_images->first()->img ?? asset('assets/images/noimage.jpg'),
                                    'img3' => $product->product_images->first()->img ?? asset('assets/images/noimage.jpg')
                                  ],
                 ] ;
        }
    }

    public function edit($index)
    {
        $this->index = $index;
    }

    public function update($index)
    {
        $productupdate =  ModelsProducts::find($this->products[$index]['id']);
        $productupdate->update ([
            'name'        => $this->products[$index]['name'],
            'price'       => $this->products[$index]['price'],
            'description' => $this->products[$index]['description'],
            'active'      => $this->products[$index]['active'],
            'start_date'  => $this->products[$index]['start_date']?'':null,
            'expiry_date' => $this->products[$index]['expiry_date']?'':null,
            ]);
    }

    // public function updatedProducts($value, $nested)
    // {
    //     $nestedData = explode(".", $nested);
    //     if($nestedData[1] == 'active' )
    //     {
    //     }
    // }


    public function render()
    {
        return view('livewire.dashborad.branch.products');
    }
}
