<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class comment extends JsonResource
{

    public function toArray($request)
    {
        // ini_set('precision', 17);

        return [
            'comment' => $this->comment??'',
            'user_id' => $this->user_id,
            'user_name' => $this->user->name,
            'rating' =>  number_format((float)$this->rating, 2), //round($this->rating, 2) //
            'precision' => ini_get('precision')
        ];
    }
}
