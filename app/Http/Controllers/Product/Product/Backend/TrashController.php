<?php

namespace App\Http\Controllers\Product\Product\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\EloquentsDbRepository\IProductDbRepository;

class TrashController extends Controller
{
    protected $productRepository;

    public function __construct(IProductDbRepository $productRepository){
        $this->productRepository = $productRepository;
    }

    public function __invoke(int $id){
        $this->productRepository->delete($id);
        return redirect()->back()->with(['Trash'=>'Trash Successfully','Alert'=>'Trash']);
    }
}
