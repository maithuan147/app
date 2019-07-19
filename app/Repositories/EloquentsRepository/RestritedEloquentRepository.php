<?php

namespace App\Repositories\EloquentsRepository;

use App\Restricted;
use App\Repositories\EloquentRepository;
use App\Contracts\EloquentsDbRepository\IRestritedDbRepository;



class RestritedEloquentRepository extends EloquentRepository implements IRestritedDbRepository{

    public function __construct(){
        $this->setModel();
    }

    public function getModel(){
        return Restricted::class;
    }

    public function findRestrites(string $value){
        return $this->model->where('words',$value)->first();
    }
    
    public function create(array $data){
        return  $this->model->create($data);
    }
}