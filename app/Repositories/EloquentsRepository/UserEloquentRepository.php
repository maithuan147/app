<?php

namespace App\Repositories\EloquentsRepository;

use App\Repositories\EloquentRepository;
use App\Contracts\EloquentsDbRepository\IUserDbRepository;
use App\User;


class UserEloquentRepository extends EloquentRepository implements IUserDbRepository{

    public function __construct(){
        $this->setModel();
    }
    public function getModel(){
        return User::class;
    }
}