<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class onebraches extends JsonResource
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
            // 'name' => $this->stores->name,
            'address' => $this->address,
            'image' => $this->image,
            'description' => $this->description,
            'city' => $this->city->name,
            'region' => $this->region->name,
            'opentime' => $this->opentime,
            'closetime' => $this->closetime,
            'lat' => $this->lat,
            'lng' => $this->lng,
            'phone' => $this->phone,
            'visetor' => $this->view,
            'id' => $this->id,
            'comments' =>[
                // 'user_name' =>  $this->comments,
                'user_id' => $this->comments,
                // 'comment' => $this->comments->comment,
                'rating'  => 's'
            ]
        ];
    }
}
