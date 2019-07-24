<?php

namespace App\Http\Controllers\Post\FontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\EloquentsDbRepository\IPostDbRepository;


class ShowController extends Controller
{
    protected $postRepository;

    public function __construct(IPostDbRepository $postRepository){
        $this->postRepository = $postRepository;
    }

    public function __invoke(){
        $postFeatured = $this->postRepository->orderBy('view','desc');
        $posts = $this->postRepository->paginate(6);
        $dataView = compact('posts','postFeatured');
        return view('posts.fontend.list',$dataView);
    }
}
