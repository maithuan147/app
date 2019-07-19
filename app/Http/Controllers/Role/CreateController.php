<?php

namespace App\Http\Controllers\Role;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\EloquentsDbRepository\ITagDbRepository;
use App\Contracts\EloquentsDbRepository\ICategoryDbRepository;

class CreateController extends Controller
{
    protected $tagRepository;
    protected $categoryReponsitory;

    public function __construct(ITagDbRepository $tagRepository, ICategoryDbRepository $categoryReponsitory){
        $this->tagRepository = $tagRepository;
        $this->categoryReponsitory = $categoryReponsitory;
    }

    public function __invoke(){
        // $this->authorize('create',Post::class);
        return view('roles.backend.create');
    }
}
