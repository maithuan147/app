<?php

namespace App\Http\Controllers\Post\FontEnd;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\EloquentsDbRepository\IPostDbRepository;

class PostShowController extends Controller
{
    protected $postRepository;

    public function __construct(IPostDbRepository $postRepository){
        $this->postRepository = $postRepository;
    }
    public function __invoke(string $slug,Post $post){
        $postFeatured = $this->postRepository->orderBy('view','desc');
        $post= $post->where('slug',$slug)->first();
        $dataView = compact('post','postFeatured');
        return view('posts.fontend.show',$dataView);
    }
}
