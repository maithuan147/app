<?php

namespace App\Http\Controllers\Product\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\EloquentsDbRepository\ICategoryProductDbRepository;

class CreateController extends Controller
{
    protected $categoryProductRepository;

    public function __construct(ICategoryProductDbRepository $categoryProductRepository){
        $this->categoryProductRepository = $categoryProductRepository;
    }

    public function __invoke(){
        $categoryAll = $this->categoryProductRepository->getAll('Tree');
        $categories = $categoryAll->pluck('name','id')->prepend('select parent', '')->toArray();
        $dataView = compact('categories');
        return view('products.categories.backend.create',$dataView);
    }
}
