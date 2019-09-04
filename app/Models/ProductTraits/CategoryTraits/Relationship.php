<?php

namespace App\Models\ProductTraits\CategoryTraits;

use App\Product;
trait Relationship{
    public function products()
    {
        // 'categories_post','post_id','categories_id
        return $this->belongsToMany(Product::class,'category_product_products','product_id','category_product_id');
    }
}