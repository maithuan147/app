<?php

namespace App\Http\Controllers\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\EloquentsDbRepository\IPostDbRepository;


class IndexTrashController extends Controller
{
    protected $postRepository;

    public function __construct(IPostDbRepository $postRepository){
        $this->postRepository = $postRepository;
    }
    public function __invoke(){
        $trashs = $this->postRepository->onlyTrashed();
        $dataView = compact('trashs');
        return view('posts.backend.listTrash',$dataView);
    }
}
