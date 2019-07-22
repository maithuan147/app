<?php

namespace App\Http\Controllers\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\EloquentsDbRepository\ICategoryDbRepository;

class DeleteController extends Controller
{
    protected $categoryReponsitory;

    public function __construct(ICategoryDbRepository $categoryReponsitory){
        $this->categoryReponsitory = $categoryReponsitory;
    }

    public function __invoke(int $id){
        $this->categoryReponsitory->forceDelete($id);
        return redirect()->back()->with(['Delete'=>'Delete Successfully','Alert'=>'Delete']);
    }
}
