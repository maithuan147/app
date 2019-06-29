<?php

namespace App\Reponsitories;

use App\Reponsitories\EloquentRepository;
use App\Contracts\ITagDbRepository;
use App\Tag;


class TagEloquentRepository extends EloquentRepository implements ITagDbRepository{

    public function __construct(){
        $this->setModel();
    }
    public function getModel(){
        return Tag::class;
    }
}