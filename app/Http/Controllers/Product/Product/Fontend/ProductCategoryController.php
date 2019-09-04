<?php

namespace App\Http\Controllers\Product\Product\FontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\EloquentsDbRepository\IProductDbRepository;
use App\Contracts\EloquentsDbRepository\ICategoryProductDbRepository;


class ProductCategoryController extends Controller
{
    protected $productRepository;
    protected $categoryProductRepository;

    public function __construct(IProductDbRepository $productRepository,ICategoryProductDbRepository $categoryProductRepository){
        $this->productRepository = $productRepository;
        $this->categoryProductRepository = $categoryProductRepository;
    }
    public function __invoke(Request $request,string $category){
        $categories = $this->categoryProductRepository->getAll();

        $products = $this->productRepository->CategoryProduct($category);
            
        $dataView = compact('products','categories');
        return view('products.products.fontend.list',$dataView);
    }
}
