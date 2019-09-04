<?php

namespace App\Repositories\EloquentsRepository;

use App\Repositories\EloquentRepository;
use App\Contracts\EloquentsDbRepository\ITagProductDbRepository;
use App\TagProduct;


class TagProductEloquentRepository extends EloquentRepository implements ITagProductDbRepository{

    public function __construct(){
        $this->setModel();
    }
    public function getModel(){
        return TagProduct::class;
    }
    public function create(array $data){
        $data =$this->model->create($data);
        return $data->id;
    }
}