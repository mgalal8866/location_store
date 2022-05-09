<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class product extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $img =   $this->product_images()->get();
        $product_image =   product_image::collection($img);
        if(empty($img->toArray())){
            $product_image = [json_decode(json_encode(['image' => asset('assets/images/noimage.jpg')]), true)] ;
        }
        return [
            'product_id' => $this->id,
            'branch_id' => $this->branch_id,
            'name' => $this->name,
            'price' => $this->price,
            'create' => $this->created_at->diffForHumans(),
            'images' => $product_image

        ];
    }
}
