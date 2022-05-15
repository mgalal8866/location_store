<?php

namespace App\Http\Resources;

use App\Models\comments;
use Illuminate\Http\Resources\Json\JsonResource;

class branch extends JsonResource
{

    public function toArray($request)
    {

        $count = comments::getrating($this->id)->count();
        $sum = comments::getrating($this->id)->sum('rating');
        return [
            'id' => $this->id,
            'star' => $this->top,
            'name' => $this->stores->name,
            'image' => $this->image,
            'rating' => number_format(($count != 0)?$sum/$count:0,2),
        ];
    }
}
