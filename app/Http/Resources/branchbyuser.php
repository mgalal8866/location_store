<?php

namespace App\Http\Resources;

use App\Models\comments;
use Illuminate\Http\Resources\Json\JsonResource;

class branchbyuser extends JsonResource
{
    protected $casts = [
        'rating' => 'decimal:2'
    ];
    public function toArray($request)
    {


        return [
            'id' => $this->id,
            'star' => $this->top,
            'name' => $this->stores->name,
            'image' => $this->image,
            'rating' => round($this->rating, 2),
            'start_date' =>$this->start_date??'',
            'expiry_date' =>$this->expiry_date??'',
            'branch_num'=>$this->stores->branch_num . ' / '  . $this->count(),
            'product_num'=> $this->product_num . ' / ' . $this->product->count(),
            'accept'=>$this->acceptapi,
            'active'=>$this->activeapi,
        ];
    }
}
