<?php

namespace App\Http\Controllers\Tag;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\EditCategoryRequest;
use App\Contracts\EloquentsDbRepository\ICategoryDbRepository;

class UpdateController extends Controller
{
    protected $categoryRepository;

    public function __construct(ICategoryDbRepository $categoryRepository){
        $this->categoryRepository = $categoryRepository;
    }

    public function __invoke($id, EditCategoryRequest $request){
        if(empty($request->slug)){
            $request->slug = $request->name;
        }
        $dataRequest = $request->validated();
        $dataRequest['slug'] = Str::slug($request->slug, '-'); 
        $dataRequest['parent_id'] = $request->input('parent_id');
        $this->categoryRepository->update($id,$dataRequest);
        return redirect()->route('dashboard.category.index');
    }
}
