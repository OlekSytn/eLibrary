<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class MemberResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'address' => $this->address,
            'phone_number' => $this->phone_number,
            'email' => $this->email,
            'status' => $this->status,
            'urlDetail' => $this->id,
            'urlEdit' => $this->id,
            'loans' => $this->loans
        ];
    }
}
