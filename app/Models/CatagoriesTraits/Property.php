<?php

namespace App\Models\CatagoriesTraits;

trait Property{
    public function getId(){
        return $this->id;
    }
    public function getName(){
        return $this->name;
    }
    public function getDescription(){
        return $this->description;
    }
    public function getSlug(){
        return $this->slug;
    }
    public function getStatus(){
        return $this->status ? 'On' : 'Off';
    }
}