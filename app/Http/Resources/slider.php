<?php

namespace App\Http\Resources;

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
        return
            [
                'id'          => $this->id,
                'image'       => $this->image,
                'urlstate'    => boolval($this->urlstate),
                'url'         => $this->url??'',
                'branchstate'  =>  boolval($this->branchstate),
                'branch_id'   => $this->branch_id??'',
                'productstate'=>  boolval($this->productstate),
                'branch_id'     => $this->branch_id??'',
            ];
    }
}
