<?php

namespace App\Repositories\EloquentsRepository;

use App\Repositories\EloquentRepository;
use App\Contracts\EloquentsDbRepository\ITagDbRepository;
use App\Tag;


class TagEloquentRepository extends EloquentRepository implements ITagDbRepository{

    public function __construct(){
        $this->setModel();
    }
    public function getModel(){
        return Tag::class;
    }
    public function create(array $data){
        $data =$this->model->create($data);
        return $data->id;
    }
}