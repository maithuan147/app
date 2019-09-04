<?php

namespace App\Models\UserTraits;

use App\Role;
use App\Post;
use App\Page;
use App\Product;

trait Relationship{
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function pages()
    {
        return $this->hasMany(Page::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

}