<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class category extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $data = parent::toArray([$request]);
        $data["children"] =  $this->childrens->count() ? true : false;
        $data["active"] =  $this->getAttributes()['active'];
        return $data;

    }
}
