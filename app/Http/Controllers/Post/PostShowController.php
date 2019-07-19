<?php

namespace App\Http\Controllers\Post;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\EloquentsDbRepository\IPostDbRepository;

class PostShowController extends Controller
{

    public function __invoke(string $slug,Post $post){
        $postShow = $post->where('slug',$slug)->first();
        $dataView = compact('postShow');
        return view('posts.fontend.show',$dataView);
    }
}
