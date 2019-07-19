<?php

namespace App\Http\Controllers\Tag;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\EloquentsDbRepository\ICategoryDbRepository;

class CreateController extends Controller
{
    protected $categoryReponsitory;

    public function __construct(ICategoryDbRepository $categoryReponsitory){
        $this->categoryReponsitory = $categoryReponsitory;
    }

    public function __invoke(){
        $categoryAll = $this->categoryReponsitory->getAll('Tree');
        $categories = $categoryAll->pluck('name','id')->prepend('select parent', '')->toArray();
        $dataView = compact('categories');
        return view('categories.create',$dataView);
    }
}
