<?php

namespace App\Repositories\EloquentsRepository;

use App\CategoryProduct;
use App\Repositories\EloquentRepository;
use App\Contracts\EloquentsDbRepository\ICategoryProductDbRepository;

class CategoryProductEloquentRepository extends EloquentRepository implements ICategoryProductDbRepository
{
    public function __construct()
    {
        $this->setModel();
    }
    public function getModel()
    {
        return CategoryProduct::class;
    }
}