<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
            'en'=>['type' =>$this->translate('en')->type],
            'ru'=>['type' =>$this->translate('ru')->type],
            'slug' =>$this->slug
        ];
    }
}
