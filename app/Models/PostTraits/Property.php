<?php

namespace App\Models\PostTraits;

use Illuminate\Support\Str;

trait Property{
    public function getId(){
        return $this->id;
    }
    public function getTitle(){
        return $this->title;
    }
    public function getDescription(){
        return $this->description;
    }
    public function getContent(){
        return $this->content;
    }
    public function getSlug(){
        return $this->slug;
    }
    public function getStatus(){
        return $this->status;
    }
    public function getIdCategories(){
        return $this->categories->pluck('id')->toArray();
    }
    public function getIdTags(){
        return $this->tags->pluck('id')->toArray();
    }
}