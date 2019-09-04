<?php

namespace App\Http\Controllers\Product\Product\Backend;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\EloquentsDbRepository\ITagProductDbRepository;
use App\Contracts\EloquentsDbRepository\ICategoryProductDbRepository;
use App\Contracts\EloquentsDbRepository\IRestritedDbRepository;


class CreateController extends Controller
{
    protected $tagRepository;
    protected $categoryReponsitory;
    protected $restritedReponsitory;

    public function __construct(ITagProductDbRepository $tagRepository, ICategoryProductDbRepository $categoryReponsitory,IRestritedDbRepository $restritedReponsitory){
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
        return view('products.products.backend.create', $dataView);
    }
}
