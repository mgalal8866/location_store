<?php

namespace App\Http\Resources;

use App\Models\comments;
use Illuminate\Http\Resources\Json\JsonResource;

use App\Models\categories;
class branchbyuser extends JsonResource
{
    protected $casts = [
        'rating' => 'decimal:2'
    ];
    public function toArray($request)
    {
         $parenthas = $this->stores->category->parent_id??'';
        if($parenthas != null)
        {
            $PP = categories::whereId($parenthas)->first()->name;
        }
        return [
            'id'                => $this->id,
            'star'              => $this->top,
            'name'              => $this->stores->name,
            'category_main_id'  => $this->stores->category->parent_id??'',
            'category_main_name'=> $PP??'' ,
            'category_id'       => $this->stores->category_id,
            'category_name'     => $this->stores->category->name,
            'image'             => $this->image,
            'address'           => $this->address??'',
            'phone'             => $this->phone,
            'phone2'            => $this->phone2,
            'description'       => $this->description??'',
            'city'              => $this->city->name,
            'city_id'           => $this->city_id,
            'region'            => $this->region->name,
            'region_id'         => $this->region_id,
            'opentime'          => $this->opentime??'',
            'closetime'         => $this->closetime??'',
            'rating'            => number_format($this->rating,2),
            'start_date'        => $this->start_date ??'',
            'expiry_date'       => $this->expiry_date ??'',
            'lat'               => $this->lat??'',
            'lng'               => $this->lng??'',
            'visetor'           => $this->view,
            'branch_num'        => $this->stores->branch_num . ' / '  . $this->stores->branch->count(),
            'product_num'       => $this->product_num . ' / ' . $this->product->count(),
            'accept'            => $this->acceptapi,
            'active'            => $this->activeapi,
        ];
    }
}
