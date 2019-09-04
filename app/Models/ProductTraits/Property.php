<?php

namespace App\Models\ProductTraits;

use Illuminate\Support\Str;

trait Property{
    public function getId(){
        return $this->id;
    }
    public function getImage(){
        return $this->image;
    }
    public function getDescription(){
        return $this->description;
    }
    public function getContent(){
        return $this->content;
    }
    public function getName(){
        if (strlen($this->name_product) > 50 ) {
            return substr($this->name_product,0,50).'...';
        }
        return $this->name_product;
    }
    public function getEditName(){
        return $this->name_product;
    }
    public function getPriceMain(){
        return $this->price_main;
    }
    public function getPriceSale(){
        return $this->price_sale;
    }
    public function getSlug(){
        return $this->slug;
    }
    public function getMaProduct(){
        return $this->id_product;
    }
    public function getQuantity(){
        return $this->quantity;
    }
    public function getDateInput(){
        return $this->date_input;
    }
    public function getUnitWeight(){
        return $this->unit_weight;
    }
    public function getWeight(){
        return $this->weight;
    }
    public function getUnitSize(){
        return $this->unit_size;
    }
    public function getSize(){
        return $this->size;
    }
    public function getCreatedBy(){
        return $this->user->name;
    }
    public function getCreatedAt(){
        return $this->created_at->format('m-d-Y');
    }
    public function getStatus(){
        return $this->status ? 'Published' : 'Draft';
    }
    public function getBgStatus(){
        return $this->status ? 'bg-36c6d3' : 'bg-DC3545';
    }
    public function getIdCategories(){
        return $this->categories->pluck('id')->toArray();
    }
    public function getIdTags(){
        return $this->tags->pluck('id')->toArray();
    }
    public function getCategoriesName(){
        return $this->categories->pluck('name')->toArray();
    }
    public function getTagsName(){
        $tag = $this->tags->pluck('name')->toArray();
        return implode(',',$tag);
    }
}