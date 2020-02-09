<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'title_en' => $this->translate('en')->title,
            'title_ru' => $this->translate('ru')->title,
            'description_en' => $this->translate('en')->description,
            'description_ru' => $this->translate('ru')->description,
            'user' => $this->user->name,
            'user_id' => $this->user->id,
            'category_en' => $this->category ? $this->category->translate('en')->type : null,
            'category_ru' => $this->category ? $this->category->translate('ru')->type : null,
        ];
    }
}
