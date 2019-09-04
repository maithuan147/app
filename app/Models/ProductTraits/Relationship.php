<?php

namespace App\Models\ProductTraits;

use App\User;
use App\TagProduct;
use App\CategoryProduct;

trait Relationship{
    public function tags()
    {
        return $this->belongsToMany(TagProduct::class,'product_tag_products','product_id','tag_product_id');
    }

    public function categories()
    {
        // '
        return $this->belongsToMany(CategoryProduct::class,'category_product_products','product_id','category_product_id');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}