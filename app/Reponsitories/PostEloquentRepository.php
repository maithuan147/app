<?php

namespace App\Reponsitories;

use App\Reponsitories\EloquentRepository;
use App\Contracts\IPostDbRepository;
use App\Post;


class PostEloquentRepository extends EloquentRepository implements IPostDbRepository{

    public function __construct(){
        $this->setModel();
    }
    public function getModel(){
        return Post::class;
    }

    public function Categories(array $categoryIds, int $postId){
        $post = $this->model->find($postId);
        $post->categories()->sync($categoryIds);
    }

    public function Tags(array $tagIds, int $postId){
        $post = $this->model->find($postId);
        $post->tags()->sync($tagIds);
    }
}