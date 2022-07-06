<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class comment extends JsonResource
{
    public function toArray($request)
    {
        return [
            'comment'   => $this->comment??'',
            'user_id'   => $this->user_id??'',
            'user_name' => $this->user->name??'',
            'rating'    => $this->rating
        ];
    }
}
