<?php

namespace App\Models\PostTraits;

use App\Tag;
use App\User;
use App\Category;

trait Relationship1{
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class,'categories_post','post_id','categories_id');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}