<?php

namespace App\Reponsitories;

use App\Reponsitories\EloquentRepository;
use App\Contracts\IUserDbRepository;
use App\User;


class UserEloquentRepository extends EloquentRepository implements IUserDbRepository{

    public function __construct(){
        $this->setModel();
    }
    public function getModel(){
        return User::class;
    }
}