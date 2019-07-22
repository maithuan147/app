<?php

namespace App\Http\Controllers\Post;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\EloquentsDbRepository\ITagDbRepository;
use App\Contracts\EloquentsDbRepository\ICategoryDbRepository;
use App\Contracts\EloquentsDbRepository\IRestritedDbRepository;


class CreateController extends Controller
{
    protected $tagRepository;
    protected $categoryReponsitory;
    protected $restritedReponsitory;

    public function __construct(ITagDbRepository $tagRepository, ICategoryDbRepository $categoryReponsitory,IRestritedDbRepository $restritedReponsitory){
        $this->tagRepository = $tagRepository;
        $this->categoryReponsitory = $categoryReponsitory;
        $this->restritedReponsitory = $restritedReponsitory;
    }

    public function __invoke(){
        // $this->authorize('create',Post::class);
        // từ cấm
        $restrictes = $this->restritedReponsitory->getAll();
        $restrictedWords = $restrictes->pluck('words')->toArray();
        //tags
        $tags = $this->tagRepository->getAll();
        $tagsArray = $tags->pluck('name')->toArray();
        // categories
        $categories = $this->categoryReponsitory->getAll('Tree');

        $dataView = compact('categories','tagsArray','restrictedWords');
        return view('posts.backend.create', $dataView);
    }
}
