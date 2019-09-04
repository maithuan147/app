<?php

namespace App\Http\Controllers\Product\Product\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\EloquentsDbRepository\IProductDbRepository;

class CloneController extends Controller
{
    protected $productRepository;

    public function __construct(IProductDbRepository $productRepository){
        $this->productRepository = $productRepository;
    }

    public function __invoke(int $id){
        $this->productRepository->clone($id);
        return redirect()->back()->with(['Clone'=>'Clone Successfully','Alert'=>'Clone']);
    }
}
