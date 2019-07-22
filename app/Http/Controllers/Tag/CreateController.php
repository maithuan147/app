<?php

namespace App\Http\Controllers\Tag;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\EloquentsDbRepository\ICategoryDbRepository;

class CreateController extends Controller
{
    protected $tagReponsitory;

    public function __construct(ICategoryDbRepository $tagReponsitory){
        $this->tagReponsitory = $tagReponsitory;
    }

    public function __invoke(){
        return view('tags.create');
    }
}
