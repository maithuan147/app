<?php

namespace App\Models\UserTraits;

use App\Role;
use App\Post;

trait Relationship{
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

}