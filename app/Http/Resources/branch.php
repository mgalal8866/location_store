<?php

namespace App\Http\Resources;

use App\Models\comments;
use Illuminate\Http\Resources\Json\JsonResource;

class branch extends JsonResource
{

    public function toArray($request)
    {
        $count = comments::getrating($this->id)->count();
        $sum = comments::getrating($this->id)->sum('review');
        return [
            'name' => $this->stores->name,
            'image' => $this->image,
            'id' => $this->id,
            'rating' => $sum/$count
        ];
    }
}
