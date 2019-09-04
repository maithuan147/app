<?php

namespace App\Models\ProductTraits\TagTraits;

use App\Product;
trait Relationship{
    public function products()
    {
        return $this->belongsToMany(Product::class,'product_tag_products','product_id','tag_product_id');
    }
}