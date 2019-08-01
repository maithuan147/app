<?php

namespace App\Models\PageTraits;

use Illuminate\Support\Str;

trait Property{
    public function getId(){
        return $this->id;
    }
    public function getDescription(){
        return $this->description;
    }
    public function getTitle(){
        if (strlen($this->title) > 70 ) {
            return substr($this->title,0,70).'...';
        }
        return $this->title;
    }
    public function getImage(){
        return $this->image;
    }
    public function getTemplate(){
        return $this->tembplate;
    }
    public function getContent(){
        return $this->content;
    }
    public function getSlug(){
        return $this->slug;
    }
    public function getCreatedBy(){
        return $this->user->name;
    }
    public function getStatus(){
        return $this->status ? 'Published' : 'Draft';
    }
    public function getBgStatus(){
        return $this->status ? 'bg-36c6d3' : 'bg-DC3545';
    }
}