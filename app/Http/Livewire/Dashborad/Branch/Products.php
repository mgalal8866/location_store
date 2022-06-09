<?php

namespace App\Http\Livewire\Dashborad\Branch;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\products as ModelsProducts;
use Illuminate\Support\Facades\Storage;

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
                 'update'      => $product->updated_at->diffForHumans(),
                 'image'       => [
                                    'img1' => $product->product_images->where('is_default','1')->first()->img ?? asset('assets/images/noimage.jpg'),
                                    'img2' => $product->product_images->where('is_default','!=','1')->where('position',2)->first()->img ?? asset('assets/images/noimage.jpg'),
                                    'img3' => $product->product_images->where('is_default','!=','1')->where('position',3)->first()->img ?? asset('assets/images/noimage.jpg')
                                  ],
                 ] ;
        }
        // dd(  $th'is->products);
    }
    public function updatedProducts($value, $nested)
    {
        $nestedData = explode(".", $nested);

        if($nestedData[1] == 'image' )
        {
            $product = ModelsProducts::find($this->products[$nestedData[0]]['id']);
            if($nestedData[2] == 'img1')
            {
                $previousPath   = $product->product_images()->where('position','1')->where('is_default',1)->first()->getAttributes()['img']??null;
                $mmm          = $this->products[$nestedData[0]]['image']['img1']->store('/', 'product');
                $product->product_images()->where('position','1')->where('is_default',1)->first()->update([
                    'img'        =>  $mmm ,
                    'is_default' => 1,
                    'position'   => 1,
                ]);

                // $this->products[$nestedData[0]]['image']['img1'] = $product->product_images()->where('position','1')->where('is_default',1)->first()->getAttributes()['img'];;
            }
            if($nestedData[2] == 'img2')
            {
                $previousPath   = $product->product_images()->where('position','2')->where('is_default','!=',1)->first()->getAttributes()['img']??null;
                $mmm          = $this->products[$nestedData[0]]['image']['img2']->store('/', 'product');
                $product->product_images()->where('position','2')->where('is_default','!=',1)->first()->update([
                    'img'        =>  $mmm ,
                    'is_default' => 0,
                    'position'   => 2,
                ]);
                // $this->products[$nestedData[0]]['image']['img1'] = $product->product_images()->where('position','1')->where('is_default',1)->first()->getAttributes()['img'];;
            }
            if($nestedData[2] == 'img3')
            {
                $previousPath   = $product->product_images()->where('position','3')->where('is_default','!=',1)->first()->getAttributes()['img']??null;
                 $mmm          = $this->products[$nestedData[0]]['image']['img3']->store('/', 'product');
                $product->product_images()->where('position','3')->where('is_default','!=',1)->first()->update([
                    'img'        =>  $mmm ,
                    'is_default' => 0,
                    'position'   => 3,
                ]);
                // $this->products[$nestedData[0]]['image']['img1'] = $product->product_images()->where('position','1')->where('is_default',1)->first()->getAttributes()['img'];;
            }
            if($previousPath != null)Storage::disk('branch')->delete($previousPath);
            $this->dispatchBrowserEvent('closeModal');
            $this->dispatchBrowserEvent('successmsg',['msg' => 'Changed Image ✔']);
        }

    }

    public function edit($index)
    {
        $this->index = $index;
    }

    public function update($index)
    {
        // dd($this->products[$index]['expiry_date']);
        //"06/08/2022"
        $productupdate =  ModelsProducts::find($this->products[$index]['id']);
        $productupdate->update ([
            'name'        => $this->products[$index]['name'],
            'price'       => $this->products[$index]['price'],
            'description' => $this->products[$index]['description'],
            'active'      => $this->products[$index]['active'],
            'start_date'  => ($this->products[$index]['start_date'] == '')? null : $this->products[$index]['start_date'],
            'expiry_date' => ($this->products[$index]['expiry_date'] == '') ? null :$this->products[$index]['expiry_date'],
            ]);
    }

    public function render()
    {
        return view('livewire.dashborad.branch.products');
    }
}
