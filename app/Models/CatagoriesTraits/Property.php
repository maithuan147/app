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

    public function getKeyStatus(){
        return $this->status;
    }

    public function getStatus(){
        return $this->status ? 'On' : 'Off';
    }
    
    public function getBgStatus(){
        return $this->status ? 'bg-36c6d3' : 'bg-DC3545';
    }

    public function getKeyParent(){
        return $this->parent_id;
    }

    public function getParent(){
        $parent = $this->ancestors()->pluck('name')->toArray();
        $parents = implode('/',$parent);
        return $parents;
    }
}