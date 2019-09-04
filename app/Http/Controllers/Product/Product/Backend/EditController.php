<?php

namespace App\Http\Controllers\Product\Product\Backend;

use App\Product;
use App\Http\Controllers\Controller;
use App\Contracts\EloquentsDbRepository\ITagProductDbRepository;
use App\Contracts\EloquentsDbRepository\IProductDbRepository;
use App\Contracts\EloquentsDbRepository\ICategoryProductDbRepository;
use App\Contracts\EloquentsDbRepository\IRestritedDbRepository;

class EditController extends Controller
{
    protected $tagRepository;
    protected $productRepository;
    protected $categoryReponsitory;
    protected $restritedReponsitory;

    public function __construct(IProductDbRepository $productRepository,ITagProductDbRepository $tagRepository,ICategoryProductDbRepository $categoryReponsitory,IRestritedDbRepository $restritedReponsitory){
        $this->tagRepository = $tagRepository;
        $this->productRepository = $productRepository;
        $this->categoryReponsitory = $categoryReponsitory;
        $this->restritedReponsitory = $restritedReponsitory;
    }

    public function __invoke(int $id){
        // $this->authorize('update',Product::class);
        $product = $this->productRepository->find($id);

        $restrictes = $this->restritedReponsitory->getAll();
        $restrictedWords = $restrictes->pluck('words')->toArray();

        $tags = $this->tagRepository->getAll();
        $tagsArray = $tags->pluck('name')->toArray();

        $categories = $this->categoryReponsitory->getAll('Tree');


        $dataView = compact('product','categories','tagsArray','restrictedWords');
        return view('products.products.backend.edit',$dataView);
    }
}
