<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class city extends JsonResource
{

    public function toArray($request)
    {
        $city_name = 'city_name_'.config('err_message.config.lang_for_felid');
        return [
            'id'=> $this->id,
            'city_name' => $this->$city_name,
        ];
    }
}
