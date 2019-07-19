<?php

namespace App\Http\Controllers\Category;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\InsertCategoryRequest;
use App\Contracts\EloquentsDbRepository\ICategoryDbRepository;

class StoreController extends Controller
{
    protected $categoryRepository;

    public function __construct(ICategoryDbRepository $categoryRepository){
        $this->categoryRepository = $categoryRepository;
    }
    public function __invoke(InsertCategoryRequest $request){
        if(empty($request->slug)){
            $request->slug = $request->name;
        }
        $dataRequest = $request->validated();
        $dataRequest['slug'] = Str::slug($request->slug, '-'); 
        $dataRequest['parent_id'] = $request->input('parent_id');
        $this->categoryRepository->create($dataRequest);
        return redirect()->route('dashboard.category.index');
    }
}
