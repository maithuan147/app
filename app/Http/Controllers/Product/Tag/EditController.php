<?php

namespace App\Http\Controllers\Product\Tag;

use App\Http\Controllers\Controller;
use App\Contracts\EloquentsDbRepository\ITagProductDbRepository;


class EditController extends Controller
{
    protected $tagProductReponsitory;

    public function __construct(ITagProductDbRepository $tagProductReponsitory){
        $this->tagProductReponsitory = $tagProductReponsitory;
    }

    public function __invoke(int $id){
        $tag = $this->tagProductReponsitory->find($id);
        $dataView = compact('tag');
        return view('Products.tags.backend.edit',$dataView);
    }
}
