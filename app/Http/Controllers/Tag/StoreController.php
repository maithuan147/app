<?php

namespace App\Http\Controllers\Tag;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tag\InsertTagRequest;
use App\Contracts\EloquentsDbRepository\ITagDbRepository;

class StoreController extends Controller
{
    protected $tagReponsitory;

    public function __construct(ITagDbRepository $tagReponsitory){
        $this->tagReponsitory = $tagReponsitory;
    }
    public function __invoke(InsertTagRequest $request){
        $dataRequest = $request->validated();
        $this->tagReponsitory->create($dataRequest);
        return redirect()->route('dashboard.tag.index');
    }
}
