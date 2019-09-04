<?php

namespace App\Http\Controllers\Product\Tag;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\EloquentsDbRepository\ITagProductDbRepository;

class DeleteController extends Controller
{
    protected $tagProductReponsitory;

    public function __construct(ITagProductDbRepository $tagProductReponsitory){
        $this->tagProductReponsitory = $tagProductReponsitory;
    }

    public function __invoke(int $id){
        $this->tagProductReponsitory->forceDelete($id);
        return redirect()->back()->with(['Delete'=>'Delete Successfully','Alert'=>'Delete']);
    }
}
