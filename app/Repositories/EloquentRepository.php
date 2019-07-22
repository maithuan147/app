<?php

namespace App\Repositories;

use App\Contracts\IDbRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

abstract class EloquentRepository implements IDbRepository{
    protected $model;

    abstract public function getModel();

    public function setModel(){
        $this->model = app()->make($this->getModel());
    }
    public function getAll(string $action = 'array'){
        if ($action == 'Tree') {
            return $this->model->get()->toFlatTree();
        }
        return $this->model->all();
    }


    public function find(int $id){
        return $this->model->find($id);
    }

    public function whereId(int $id){
        return $this->model->onlyTrashed()->find($id);
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
    public function bulkTrash(array $id){
        $this->model->whereIn('id', $id)->delete();
    }

    public function restore(int $id){
        return $this->model->where('id', $id)->restore();
    }
    public function bulkRestore(array $id){
        return $this->model->whereIn('id', $id)->restore();
    }

    public function clone(int $id){
        $post = $this->model->find($id);
        $newPost = $post->replicate();
        $newPost->save();
        return $newPost->id;
    }
    public function bulkClone(array $ids){
        foreach ($ids as $id) {
            $this->clone($id);
        }
    }

    public function forceDelete(int $id){
        return $this->model->where('id', $id)->forceDelete();
    }
    public function bulkDelete(array $id){
        $this->model->whereIn('id', $id)->forceDelete();
    }

    public function onlyTrashed(int $limit = 5){
        return $this->model->onlyTrashed()->paginate($limit);
    }
    
    public function bulk(string $action,array $id){
        return $this->$action($id);
    }

    public function paginate(int $limit = 5,array $creatials=[],string $orderSort='',string $orderBy='asc'){
        if(!empty($orderSort)){
            return $this->model->where($creatials)->orderBy($orderSort,$orderBy)->paginate($limit);
        }
        return $this->model->where($creatials)->paginate($limit);
    }
}