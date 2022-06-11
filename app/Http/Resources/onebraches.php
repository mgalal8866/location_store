<?php

namespace App\Http\Resources;

use App\Models\comments;
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


        $count = comments::getrating($this->id)->count();
         $sum = comments::getrating($this->id)->sum('rating');


        return [
            'id'          => $this->id,
            'name'        => $this->stores->name,
            'address'     => $this->address??'',
            'image'       => $this->image,
            'description' => $this->description??'',
            'phone'       => $this->phone,
            'phone2'      => $this->phone,
            'city'        => $this->city->name,
            'region'      => $this->region->name,
            'opentime'    => $this->opentime??'',
            'closetime'   => $this->closetime??'',
            'lat'         => $this->lat,
            'lng'         => $this->lng,
            'visetor'     => $this->view,
            'rating'      => number_format(($count != 0)?$sum/$count:0 , 2),
            'comments'    => comment::collection($this->comments),
            'product'     => product::collection($this->product)
        ];
    }
}
