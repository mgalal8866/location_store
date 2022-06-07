<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class comment extends JsonResource
{

    public function toArray($request)
    {
        // ini_set('precision', 16);
        // ini_set('serialize_precision', 16);

        return [
            'comment' => $this->comment??'',
            'user_id' => $this->user_id,
            'user_name' => $this->user->name,
            'rating' =>  $this->rating //
            // 'precision' => ini_get('serialize_precision')
        ];
    }
}
