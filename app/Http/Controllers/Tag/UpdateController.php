<?php

namespace App\Http\Controllers\Tag;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tag\EditTagRequest;
use App\Contracts\EloquentsDbRepository\ITagDbRepository;

class UpdateController extends Controller
{
    protected $tagReponsitory;

    public function __construct(ITagDbRepository $tagReponsitory){
        $this->tagReponsitory = $tagReponsitory;
    }
    public function __invoke($id, EditTagRequest $request){
        $dataRequest = $request->validated();
        $this->tagReponsitory->update($id,$dataRequest);
        return redirect()->route('dashboard.tag.index')->with(['Edit'=>'Edit Successfully','Alert'=>'Edit']);
    }
}
