<?php

namespace App\Models\RoleTraits;

trait Property{
    public function getId(){
        return $this->id;
    }
    public function getName(){
        return $this->name;
    }
    public function getPermissions(){
        return $this->permissions;
    }
    public function getDsPer(){
        $arrayper = explode(',',$this->permissions);
        return $arrayper;
    }
}