<?php

namespace App\Http\Controllers\Product\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\EloquentsDbRepository\ICategoryProductDbRepository;

class DeleteController extends Controller
{
    protected $categoryProductRepository;

    public function __construct(ICategoryProductDbRepository $categoryProductRepository){
        $this->categoryProductRepository = $categoryProductRepository;
    }

    public function __invoke(int $id){
        $this->categoryProductRepository->forceDelete($id);
        return redirect()->back()->with(['Delete'=>'Delete Successfully','Alert'=>'Delete']);
    }
}
