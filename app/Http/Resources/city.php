<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class city extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id'=> $this->id,
            'city_name' => $this->city_name_ar,
        ];
    }
}
