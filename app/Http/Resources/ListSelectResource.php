<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class ListSelectResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'value' => $this->id,
            'text' => $this->name ? $this->name : $this->title
        ];
    }
}
