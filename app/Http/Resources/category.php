<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class category extends JsonResource
{
    public function toArray($request)
    {
        $data             = parent::toArray([$request]);
        $data["children"] = $this->childrens->count() ? true : false;
        $data["active"]   = $this->getAttributes()['active'];
        return $data;
    }
}
