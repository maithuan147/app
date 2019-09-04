<?php

namespace App\Http\Controllers\Product\Product\FontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\EloquentsDbRepository\IProductDbRepository;
use App\Contracts\EloquentsDbRepository\ICategoryProductDbRepository;


class ProductController extends Controller
{
    protected $productRepository;
    protected $categoryProductRepository;

    public function __construct(IProductDbRepository $productRepository,ICategoryProductDbRepository $categoryProductRepository){
        $this->productRepository = $productRepository;
        $this->categoryProductRepository = $categoryProductRepository;
    }
    public function __invoke(){
        $categories = $this->categoryProductRepository->getAll();
        $products = $this->productRepository->paginate(9);
        $dataView = compact('products','categories');
        return view('products.products.fontend.list',$dataView);
    }
}
