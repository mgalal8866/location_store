<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class region extends JsonResource
{
    public function toArray($request)
    {   $region_name = 'region_name_'.config('err_message.config.lang_for_felid');
        return [
            'id'=> $this->id,
            'city_id' => $this->city_id,
            'region_name' => $this->$region_name
        ];
    }
}
