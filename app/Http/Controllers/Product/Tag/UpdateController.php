<?php

namespace App\Http\Controllers\Product\Tag;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\Tag\EditProductTagRequest;
use App\Contracts\EloquentsDbRepository\ITagProductDbRepository;

class UpdateController extends Controller
{
    protected $tagProductReponsitory;

    public function __construct(ITagProductDbRepository $tagProductReponsitory){
        $this->tagProductReponsitory = $tagProductReponsitory;
    }

    public function __invoke($id, EditProductTagRequest $request){
        $dataRequest = $request->validated();
        $this->tagProductReponsitory->update($id,$dataRequest);
        return redirect()->route('dashboard.product-tag.index')->with(['Edit'=>'Edit Successfully','Alert'=>'Edit']);
    }
}
