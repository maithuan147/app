<?php

namespace App\Http\Controllers\Product\Product\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\EloquentsDbRepository\IProductDbRepository;


class IndexTrashController extends Controller
{
    protected $productRepository;

    public function __construct(IProductDbRepository $productRepository){
        $this->productRepository = $productRepository;
    }
    public function __invoke(){
        $trashs = $this->productRepository->onlyTrashed();
        $dataView = compact('trashs');
        return view('products.products.backend.listTrash',$dataView);
    }
}
