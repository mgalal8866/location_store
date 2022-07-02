<?php

namespace App\Http\Livewire\Dashborad\Products;

use Livewire\Component;
use App\Models\products;
use Livewire\WithFileUploads;

class Product extends Component
{public $idproduct, $products,$i =0, $productlist;
    use WithFileUploads;
    public function mount($slug=null)
    {
            $this->slug = $slug;
            $this->products = products::where('branch_id',$this->slug)->get();
            foreach($this->products as $product)
            {
                $this->productlist[$this->i]['product_id']       = $product->id;
                $this->productlist[$this->i]['slug']             = $product->slug;
                $this->productlist[$this->i]['active']           = $product->active;
                $this->productlist[$this->i]['name']             = $product->name;
                $this->productlist[$this->i]['price']            = $product->price;
                $this->productlist[$this->i]['description']      = $product->description;
                $this->productlist[$this->i]['start_date']       = $product->start_date;
                $this->productlist[$this->i]['expiry_date']      = $product->expiry_date;
                $this->productlist[$this->i]['photo1']           = $product->product_images->where('is_default','1')->first()->img ?? asset('assets/images/noimage.jpg');
                $this->productlist[$this->i]['photo2']           = $product->product_images->where('is_default','!=','1')->where('position',2)->first()->img ?? asset('assets/images/noimage.jpg');
                $this->productlist[$this->i]['photo3']           = $product->product_images->where('is_default','!=','1')->where('position',3)->first()->img ?? asset('assets/images/noimage.jpg');

                $this->i +=  1;
            }
            $this->i =0;

    }

    public function save($i)
    {

       $product =  products::find($this->productlist[$i]['product_id']);

       if(isset($this->productlist[$i]['image1'])){
            $previousPath   = $product->product_images()->where('position','1')->where('is_default',1)->first()??null;
            if($previousPath != null) {
                deleteimage('product',$previousPath->getAttributes()['img']);
                $previousPath->update([
                'img'        =>  uploadimages('product',$this->productlist[$i]['image1'])]);
            }else{
                $product->product_images()->create([
                    'img'        => uploadimages('product',$this->productlist[$i]['image1']),
                    'is_default' => 1,
                    'position'   => 1,
                ]);
            };
    }

        if(isset($this->productlist[$i]['image2'])){
            $previousPath   = $product->product_images->where('position','2')->where('is_default','!=',1)->first()??null;
            if($previousPath != null) {
                deleteimage('product',$previousPath->getAttributes()['img']);
                $previousPath->update([
                'img'  =>  uploadimages('product',$this->productlist[$i]['image2']) ]);
            }else{
                $product->product_images()->create([
                    'img'        => uploadimages('product',$this->productlist[$i]['image2']),
                    'is_default' => 0,
                    'position'   => 2,
                ]);
            };

        }
        if(isset($this->productlist[$i]['image3'])){
            $previousPath   = $product->product_images->where('position','3')->where('is_default','!=',1)->first()??null;
            if($previousPath != null) {
                deleteimage('product',$previousPath->getAttributes()['img']);
                $previousPath->update([
                'img'        =>  uploadimages('product',$this->productlist[$i]['image3']) ]);
            }else{
                $product->product_images()->create([
                    'img'        => uploadimages('product',$this->productlist[$i]['image3']),
                    'is_default' => 0,
                    'position'   => 3,
                ]);
            };
        }
       $product->update([
       'name'        => $this->productlist[$i]['name'],
       'price'       => $this->productlist[$i]['price'],
       'description' => $this->productlist[$i]['description'],
       'active'      => $this->productlist[$i]['active'],
       'start_date'  => ($this->productlist[$i]['start_date'] == '')? null : $this->productlist[$i]['start_date'],
       'expiry_date' => ($this->productlist[$i]['expiry_date'] == '') ? null :$this->productlist[$i]['expiry_date'],
       ]);
       $this->dispatchBrowserEvent('closeModal');
       $this->dispatchBrowserEvent('successmsg',['msg' => 'Changed Update ✔']);
    }
    public function deleteId($id)
    {
        $this->idproduct = $id;
    }
    public function delete($state)
    {
        $product =  products::find($this->productlist[$this->idproduct]['product_id']);
        if($state=='soft'){

                foreach($product->product_images as $product_image){
                    $product_image->delete();
                }
            $product->delete();
        }elseif($state == 'hard'){
            foreach($product->product_images as $product_image){
                deleteimage('product', $product_image->getAttributes()['img'] );
                $product_image->forceDelete();
            }
            $product->forceDelete();
        }
        $this->dispatchBrowserEvent('successmsg',['msg' => 'Deleted Success']);
        $this->dispatchBrowserEvent('closeModal');

    }

    public function render()
    {

        return view('livewire.dashborad.products.product')->layout('admin.layouts.masterdash');
    }
}
