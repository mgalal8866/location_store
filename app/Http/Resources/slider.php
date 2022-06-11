<?php

namespace App\Http\Resources;

use App\Models\branchs;
use App\Models\products;
use Illuminate\Http\Resources\Json\JsonResource;

class slider extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
          $branch =  boolval($this->branchstate) ? branchs::find($this->branch_id) :'';
          $product =  boolval($this->productstate) ? products::find($this->product_id):'';


        return
            [
                'id'          => $this->id,
                'image'       => $this->image,
                'urlstate'    => boolval($this->urlstate),
                'url'         => $this->url??'',

                'branchstate'  =>  boolval($this->branchstate),
                'branch_id'   => $this->branch_id??'',

                'productstate'=>  boolval($this->productstate),
                'product_id'     => $this->product_id??'',

                'name' =>  $branch->stores->name ?? $product->branch->stores->name ?? '',
                'lat' =>   $branch->lat ?? $product->branch->lat ?? '' ,
                'lng' =>  $branch->lng?? $product->branch->lng ?? '' ,
                'phone' =>  $branch->phone?? $product->branch->phone ?? '' ,

            ];
    }
}
