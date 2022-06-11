<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class product_image extends JsonResource
{
    public function toArray($request)
    {
        return [
            'image' => $this->img
        ];
    }
}
