<?php

namespace App\Http\Controllers\Product\Category;

use App\Http\Controllers\Controller;
use App\Contracts\EloquentsDbRepository\ICategoryProductDbRepository;


class EditController extends Controller
{
    protected $categoryProductRepository;

    public function __construct(ICategoryProductDbRepository $categoryProductRepository){
        $this->categoryProductRepository = $categoryProductRepository;
    }

    public function __invoke(int $id){
        // $this->authorize('update',Post::class);
        $categoriesAll = $this->categoryProductRepository->getAll('Tree');
        $categories = $categoriesAll->pluck('name','id')->prepend('select parent', '')->toArray();
        $category = $this->categoryProductRepository->find($id);
        $dataView = compact('category','categories');
        return view('products.categories.backend.edit',$dataView);
    }
}
