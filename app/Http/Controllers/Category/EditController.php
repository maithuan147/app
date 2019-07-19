<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Contracts\EloquentsDbRepository\ICategoryDbRepository;


class EditController extends Controller
{
    protected $categoryRepository;


    public function __construct(ICategoryDbRepository $categoryRepository){
        $this->categoryRepository = $categoryRepository;
    }

    public function __invoke(int $id){
        // $this->authorize('update',Post::class);
        $categoriesAll = $this->categoryRepository->getAll('Tree');
        $categories = $categoriesAll->pluck('name','id')->prepend('select parent', '')->toArray();
        $category = $this->categoryRepository->find($id);
        $dataView = compact('category','categories');
        return view('categories.edit',$dataView);
    }
}
