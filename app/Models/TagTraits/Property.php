<?php

namespace App\Models\TagTraits;

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