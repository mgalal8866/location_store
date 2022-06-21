<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class setting extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return
        [
            'splash'           => $this->where('key','splash_screen')->select('value AS splash')->first()->splash,
            'phone'            => $this->where('key','phone_number')->select('value')->first()->value,
            'maintenance_mode' => $this->where('key','maintenance_mode')->select('value')->first()->value??true,
        ];
    }
}
