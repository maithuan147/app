<?php

namespace App\Repositories\EloquentsRepository;

use App\User;
use App\Repositories\EloquentRepository;
use App\Contracts\EloquentsDbRepository\IAdminDbRepository;

class AdminEloquentRepository extends EloquentRepository implements IAdminDbRepository
{
    public function __construct()
    {
        $this->setModel();
    }
    public function getModel()
    {
        return User::class;
    }
}