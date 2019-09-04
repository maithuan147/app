<?php

namespace App\Http\Controllers\Product\Product\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\EloquentsDbRepository\IProductDbRepository;


class RestoreController extends Controller
{
    protected $productRepository;

    public function __construct(IProductDbRepository $productRepository){
        $this->productRepository = $productRepository;
    }

    public function __invoke(int $id){
        $this->productRepository->restore($id);
        return redirect()->back()->with(['Restore'=>'Restore Successfully','Alert'=>'Restore']);
    }
}
