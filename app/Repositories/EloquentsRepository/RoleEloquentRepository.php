<?php

namespace App\Repositories\EloquentsRepository;

use App\Repositories\EloquentRepository;
use App\Contracts\EloquentsDbRepository\IRoleDbRepository;
use App\Role;


class RoleEloquentRepository extends EloquentRepository implements IRoleDbRepository{

    public function __construct(){
        $this->setModel();
    }
    public function getModel(){
        return Role::class;
    }
}