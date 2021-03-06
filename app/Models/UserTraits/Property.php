<?php

namespace App\Models\UserTraits;

trait Property{
    public function getId(){
        return $this->id;
    }
    public function getName(){
        return $this->name;
    }
    public function getAvatar(){
        return $this->avatar;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getPhone(){
        return $this->phone;
    }
    public function getAddress(){
        return $this->address;
    }
    public function getBirthday(){
        return $this->birthday;
    }
    public function getGender(){
        return $this->gender;
    }
    public function getFacebook(){
        return $this->facebook;
    }
    public function getSkype(){
        return $this->skype;
    }
    public function getStatus(){
        return $this->status ? 'Published' : 'Draft';
    }
    public function getBgStatus(){
        return $this->status ? 'bg-36c6d3' : 'bg-DC3545';
    }
    public function getCreatedAt(){
        return $this->created_at->format('d-m-Y');
    }
    public function getRole(){
        return $this->role->name;
    }
    public function getIdRole(){
        return $this->role->id;
    }
    public function getPost(){
        return $this->posts->count();
    }
}