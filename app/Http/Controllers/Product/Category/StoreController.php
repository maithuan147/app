<?php

namespace App\Http\Controllers\Product\Category;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\Category\InsertCategoryProductRequest;
use App\Contracts\EloquentsDbRepository\ICategoryProductDbRepository;

class StoreController extends Controller
{
    protected $categoryProductRepository;

    public function __construct(ICategoryProductDbRepository $categoryProductRepository){
        $this->categoryProductRepository = $categoryProductRepository;
    }
    public function __invoke(InsertCategoryProductRequest $request){
        if(empty($request->slug)){
            $request->slug = $request->name;
        }
        $dataRequest = $request->validated();
        $dataRequest['slug'] = Str::slug($request->slug, '-'); 
        $dataRequest['parent_id'] = $request->input('parent_id');
        $this->categoryProductRepository->create($dataRequest);
        return redirect()->route('dashboard.product-category.index');
    }
}
