<?php

namespace App\Reponsitories;

use App\Reponsitories\EloquentRepository;
use App\Contracts\ICatagoriesDbRepository;
use App\Categories;


class CatagoriesEloquentRepository extends EloquentRepository implements ICatagoriesDbRepository
{
    public function __construct()
    {
        $this->setModel();
    }
    public function getModel()
    {
        return Categories::class;
    }
}