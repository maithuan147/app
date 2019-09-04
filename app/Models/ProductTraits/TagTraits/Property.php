<?php

namespace App\Models\ProductTraits\TagTraits;

use Illuminate\Support\Str;

trait Property{
    public function getId(){
        return $this->id;
    }

    public function getName(){
        return $this->name;
    }

    public function getSlug(){
        return $this->slug;
    }
}