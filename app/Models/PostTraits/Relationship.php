<?php

namespace App\Models\PostTraits;

use App\Tag;
use App\Categories;

trait Relationship{
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    public function categories()
    {
        return $this->belongsToMany(Categories::class,'categories_post','post_id','categories_id');
    }
}