<?php

namespace App\Repositories\EloquentsRepository;

use App\Post;
use App\Events\PostCloneTag;
use App\Events\PostCloneCategory;
use Intervention\Image\Facades\Image;
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

    public function fix(array $fileimgfix,string $filename){
        foreach ($fileimgfix as $width=>$height) {
            $imgFix = Image::make('storage/img/'.$filename);
            $newPathFix = public_path('storage/img/fix-'.$width.'x'.$height.'-'.$filename);
            $imgFix->fit($width,$height);
            $imgFix->save($newPathFix);
        }
    }

    public function deleteFileOld(array $fileImgFix,$fileImg){
        foreach ($fileImgFix as $width=>$height) {
            $fileNameFix = str_replace('img/','fix-'.$width.'x'.$height.'-',$fileImg);
            $filePathOld = public_path('storage/img/'.$fileNameFix);
            if(file_exists($filePathOld)){
                unlink($filePathOld);
            }
        }
    }
}