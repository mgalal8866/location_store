<?php

namespace App\Http\Resources;

use App\Models\comments;
use Illuminate\Http\Resources\Json\JsonResource;

class branch extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'     => $this->id,
            'star'   => $this->top,
            'name'   => $this->stores->name,
            'image'  => $this->image,
            'rating' => number_format($this->rating,2),
            'lat'    => $this->lat,
            'lng'    => $this->lng
        ];
    }
}
