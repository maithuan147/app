<?php

namespace App\Http\Controllers\Tag;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\EloquentsDbRepository\ITagDbRepository;

class DeleteController extends Controller
{
    protected $tagReponsitory;

    public function __construct(ITagDbRepository $tagReponsitory){
        $this->tagReponsitory = $tagReponsitory;
    }

    public function __invoke(int $id){
        $this->tagReponsitory->forceDelete($id);
        return redirect()->back()->with(['Delete'=>'Delete Successfully','Alert'=>'Delete']);
    }
}
