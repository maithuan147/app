<?php

namespace App\Repositories\EloquentsRepository;

use App\Post;
use App\Events\PostCloneTag;
use App\Events\PostCloneCategory;
use App\Repositories\EloquentRepository;
use App\Contracts\EloquentsDbRepository\IPostDbRepository;

class PostEloquentRepository extends EloquentRepository implements IPostDbRepository{
    public function __construct(){
        $this->setModel();
    }
    public function getModel(){
        return Post::class;
    }

    public function saveCategories(array $categoryIds, int $postId){
        $post = $this->model->find($postId);
        $post->categories()->sync($categoryIds);
    }

    public function saveTags(array $tagIds, int $postId){
        $post = $this->model->find($postId);
        $post->tags()->sync($tagIds);
    }

    public function cloneTag(int $postId,int $id){
        $tagIds = $this->model->find($id)->tags->pluck('id')->toArray();
        $this->model->find($postId)->tags()->sync($tagIds);
    }

    public function cloneCategory(int $postId,int $id){
        $categoryIds = $this->model->find($id)->categories->pluck('id')->toArray();
        $this->model->find($postId)->categories()->sync($categoryIds);
    }
    
    public function clone(int $id){
        // dd($id);
        $postId = parent::clone($id);
        event(new PostCloneTag($postId,$id));
        event(new PostCloneCategory($postId,$id));
    }

    public function joinCategory(int $limit = 5,array $creatials=[],string $orderSort='',string $orderBy='asc'){
        return $this->model->distinct()
                    ->join('categories_post', 'posts.id', '=', 'categories_post.post_id')
                    ->join('categories', 'categories_post.categories_id', '=', 'categories.id')
                    ->where($creatials)
                    ->orderBy($orderSort,$orderBy)
                    ->select('posts.*', 'categories.name')
                    ->paginate($limit);
    }

    public function orderBy(string $orderSort='',string $orderBy='asc'){
        $post = $this->model->orderBy($orderSort,$orderBy)->get();
        $postFeatured  = $post->filter(function ($value, $key) {
            return $key < 3;
        });
        return $postFeatured->all();
    }

}