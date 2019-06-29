<?php

namespace App\Reponsitories;

use App\Contracts\IdbRepository;

abstract class EloquentRepository implements IDbRepository{
    protected $model;

    abstract public function getModel();

    public function setModel(){
        $this->model = app()->make($this->getModel());
    }
    public function getAll(){
        return $this->model->all();
    }
    public function find(int $id){
        return $this->model->find($id);
    }
    public function create(array $data){
        $this->model->fill($data);
        $this->model->save();
        return $this->model->id;
    }
    public function update(int $id,array $data){
        $this->model->where('id', $id)->update($data);
    }
    public function delete(int $id){
        $this->model->where('id', $id)->delete();
    }
}