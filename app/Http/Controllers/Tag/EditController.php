<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Contracts\EloquentsDbRepository\ITagDbRepository;


class EditController extends Controller
{
    protected $tagReponsitory;


    public function __construct(ITagDbRepository $tagReponsitory){
        $this->tagReponsitory = $tagReponsitory;
    }

    public function __invoke(int $id){
        $tag = $this->tagReponsitory->find($id);
        $dataView = compact('tag');
        return view('tags.edit',$dataView);
    }
}
