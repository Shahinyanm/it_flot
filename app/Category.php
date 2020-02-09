<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

/**
 * Class Category
 *
 * @package App
 */
class Category extends Model implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = ['type'];

    protected $fillable = ['slug'];

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
