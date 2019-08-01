<?php

namespace App\Repositories\EloquentsRepository;

use App\Page;
use App\Repositories\EloquentRepository;
use App\Contracts\EloquentsDbRepository\IPageDbRepository;

class PageEloquentRepository extends EloquentRepository implements IPageDbRepository{
    public function __construct(){
        $this->setModel();
    }
    public function getModel(){
        return Page::class;
    }

}