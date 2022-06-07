<?php

namespace App\Http\Resources;

use App\Models\comments;
use Illuminate\Http\Resources\Json\JsonResource;

class branch extends JsonResource
{
    // protected $casts = [
    //     'rating' => 'decimal:2'
    // ];
    public function toArray($request)
    {


        return [
            'id' => $this->id,
            'star' => $this->top,
            'name' => $this->stores->name,
            'image' => $this->image,
            'rating' =>$this->rating
        ];
    }
}
