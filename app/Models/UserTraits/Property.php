<?php

namespace App\Models\UserTraits;

trait Property{
    public function getId(){
        return $this->id;
    }
    public function getName(){
        return $this->name;
    }
    // public function getPermissions(){
    //     return $this->permissions;
    // }
    // public function getDescription(){
    //     return $this->description;
    // }
    // public function getCreatedAt(){
    //     return $this->created_at->format('d-m-Y');
    // }
    // public function getCreatedBy(){
    //     return $this->create_by;
    // }
    // public function getDsPer(){
    //     $arrayper = explode(',',$this->permissions);
    //     return $arrayper;
    // }
}