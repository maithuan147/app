<?php

namespace App\Repositories\EloquentsRepository;

use App\Repositories\EloquentRepository;
use App\Contracts\EloquentsDbRepository\ICategoryDbRepository;
use App\Category;


class CategoryEloquentRepository extends EloquentRepository implements ICategoryDbRepository
{
    public function __construct()
    {
        $this->setModel();
    }
    public function getModel()
    {
        return Category::class;
    }
}