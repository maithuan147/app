<?php

namespace App\Http\Controllers\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\EloquentsDbRepository\IPostDbRepository;

class CloneController extends Controller
{
    protected $postRepository;

    public function __construct(IPostDbRepository $postRepository){
        $this->postRepository = $postRepository;
    }

    public function __invoke(int $id){
        $this->postRepository->clone($id);
        return redirect()->route('dashboard.post.index')->with(['Clone'=>'Clone Successfully','Alert'=>'Clone']);
    }
}
