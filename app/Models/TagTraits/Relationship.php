<?php

namespace App\Models\TagTraits;

trait Relationship{
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}