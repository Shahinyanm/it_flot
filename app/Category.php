<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = ['type','slug'];

    /**
     * One to Many Relationship for Post model
     *
     * @return HasMany
     */
    public function post(){
        return $this->hasMany(Post::class);
    }

    /**
     * Get the value of the model's route key.
     *
     * @return mixed
     */
    public function getRouteKey()
    {
        return 'slug';
    }
}
