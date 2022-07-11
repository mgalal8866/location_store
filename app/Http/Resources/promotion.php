<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class promotion extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $request->id,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $request->image,
        ];
    }
}
