<?php

namespace App\Http\Resources;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PostsResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $this->collection->transform(function (Post $post) {
            return (new PostResource($post));
        });

        return parent::toArray($request);

    }
}
