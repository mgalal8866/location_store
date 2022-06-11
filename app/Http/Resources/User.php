<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $city_name = 'city_name_'.config('err_message.config.lang_for_felid');
        $region_name = 'region_name_'.config('err_message.config.lang_for_felid');
        $mm = [
            'name'     => $this->name,
            'mobile'   => $this->mobile,
            'gender'   => $this->gender,
            'city'     => $this->city_id?$this->city->$city_name:'',
            'region'   => $this->region_id?$this->region->$region_name:'',
            'city_id'  => $this->city_id??'',
            'region_id'=> $this->region_id??'',
            'image'    => $this->image
                ];
        return ($mm);
    }
}
