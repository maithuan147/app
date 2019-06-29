<?php

namespace App\Models\CatagoriesTraits;

use App\Post;
trait Relationship{
    public function posts()
    {
        return $this->belongsToMany(Post::class,'categories_post','post_id','categories_id');
    }
}