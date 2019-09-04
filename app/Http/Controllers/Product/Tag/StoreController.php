<?php

namespace App\Http\Controllers\Product\Tag;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\Tag\InsertProductTagRequest;
use App\Contracts\EloquentsDbRepository\ITagProductDbRepository;

class StoreController extends Controller
{
    protected $tagProductReponsitory;

    public function __construct(ITagProductDbRepository $tagProductReponsitory){
        $this->tagProductReponsitory = $tagProductReponsitory;
    }

    public function __invoke(InsertProductTagRequest $request){
        $dataRequest = $request->validated();
        $this->tagProductReponsitory->create($dataRequest);
        return redirect()->route('dashboard.product-tag.index');
    }
}
