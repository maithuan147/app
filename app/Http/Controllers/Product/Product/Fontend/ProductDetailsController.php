<?php

namespace App\Http\Controllers\Product\Product\FontEnd;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use App\Contracts\EloquentsDbRepository\IProductDbRepository;


class ProductDetailsController extends Controller
{
    protected $productRepository;

    public function __construct(IProductDbRepository $productRepository){
        $this->productRepository = $productRepository;
    }

    public function __invoke(string $slug){
        $product = $this->productRepository->getRouteKeyName($slug);
        $dataView = compact('product');
        return view('products.products.fontend.details',$dataView);
    }
}
