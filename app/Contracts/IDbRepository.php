<?php

namespace App\Contracts;


interface IDbRepository{
    public function getAll();
    public function find(int $id);
    public function create(array $data);
    public function update(int $id,array $data);
    public function restore(int $id);
    public function delete(int $id);
    public function bulkDelete(array $id);
    public function bulkTrash(array $id);
    public function bulkRestore(array $id);
    public function clone(int $id);
    public function forceDelete(int $id);
    public function onlyTrashed();
}