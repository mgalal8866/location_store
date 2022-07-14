<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class citywithregion extends JsonResource
{
    public function toArray($request)
    {
        return [
                'name'    =>  ($this->main == 1)?  ($this->city->name  . ' , ' . $this->name) : $this->name  ,
                'city_id' => $this->city_id,
                'region'  => $this->id
        ];
    }
}
