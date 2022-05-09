<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class citywithregion extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
                'name' =>  $this->city->name  . ' - ' . $this->name ,
                'city_id' => $this->city_id,
                'region' => $this->id
        ];
    }
}
