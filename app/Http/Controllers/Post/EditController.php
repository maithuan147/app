<?php

namespace App\Http\Controllers\Post;

use App\Post;
use App\Http\Controllers\Controller;
use App\Contracts\EloquentsDbRepository\ITagDbRepository;
use App\Contracts\EloquentsDbRepository\IPostDbRepository;
use App\Contracts\EloquentsDbRepository\ICategoryDbRepository;
use App\Contracts\EloquentsDbRepository\IRestritedDbRepository;

class EditController extends Controller
{
    protected $postRepository;
    protected $tagRepository;
    protected $categoryReponsitory;
    protected $restritedReponsitory;

    public function __construct(IPostDbRepository $postRepository,ITagDbRepository $tagRepository,ICategoryDbRepository $categoryReponsitory,IRestritedDbRepository $restritedReponsitory){
        $this->postRepository = $postRepository;
        $this->tagRepository = $tagRepository;
        $this->categoryReponsitory = $categoryReponsitory;
        $this->restritedReponsitory = $restritedReponsitory;
    }

    public function __invoke(int $id){
        // $this->authorize('update',Post::class);
        $restrictes = $this->restritedReponsitory->getAll();
        $restrictedWords = $restrictes->pluck('words')->toArray();

        $tags = $this->tagRepository->getAll();
        $tagsArray = $tags->pluck('name')->toArray();

        $categories = $this->categoryReponsitory->getAll('Tree');

        $post = $this->postRepository->find($id);
        $tag = $post->tags->pluck('name')->toArray();
        $tagName = implode(',',$tag);

        $dataView = compact('post','tagName','categories','tagsArray');
        return view('posts.backend.edit',$dataView);
    }
}
