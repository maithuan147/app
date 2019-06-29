<?php

namespace App\Reponsitories;

use App\Reponsitories\EloquentRepository;
use App\Contracts\IRoleDbRepository;
use App\Role;


class RoleEloquentRepository extends EloquentRepository implements IRoleDbRepository{

    public function __construct(){
        $this->setModel();
    }
    public function getModel(){
        return Role::class;
    }
}