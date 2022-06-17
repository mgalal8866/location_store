<?php

namespace App\Http\Resources;

use App\Models\stores;
use App\Models\branchs;
use App\Models\products;
use Illuminate\Http\Resources\Json\JsonResource;

class slider extends JsonResource
{
    public function toArray($request)
    {
          $branch =  ($this->type=='store') ? branchs::find($this->event) :'';
          $product =  ($this->type=='product') ? products::find($this->event):'';

        //   $branch_num =  boolval($this->branchstate) ? ($branch->stores->branch_num  . ' / '  . $branch->stores->branch->count()) ?? '' : '';
        //   $product_num =  boolval($this->productstate) ? ($product->branch->product_num  . ' / '  . $product->branch->product->count()) ?? '' : '';
        //
        return
            [
                'id'          => $this->id,
                'image'       => $this->image,
                // 'urlstate'    => boolval($this->urlstate),
                // 'url'         => $this->url??'',
                // 'branchstate' => boolval($this->branchstate),
                // 'branch_id'   => $this->branch_id??'',
                // 'productstate'=> boolval($this->productstate),
                // 'product_id'  => $this->product_id??'',

                'urlstate'    => ($this->type=='url')?true:false,
                'url'         => ($this->type=='url')?$this->event:'',
                'branchstate' => ($this->type=='store')?true:false,
                'branch_id'   => ($this->type=='store')?$this->event:'',
                'productstate'=> ($this->type=='product')?true:false,
                'product_id'  => ($this->type=='product')?$this->event:'',
                'name'        => $branch->stores->name ?? $product->branch->stores->name ?? '',
                'lat'         => $branch->lat ?? $product->branch->lat ?? '' ,
                'lng'         => $branch->lng?? $product->branch->lng ?? '' ,
                'phone'       => $branch->phone?? $product->branch->phone ?? '' ,
                'region_id'   => $this->region_id,



            ];
    }
}
