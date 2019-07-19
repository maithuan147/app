<?php

namespace App\Http\Controllers\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\EloquentsDbRepository\IPostDbRepository;

class DeleteController extends Controller
{
    protected $postRepository;

    public function __construct(IPostDbRepository $postRepository){
        $this->postRepository = $postRepository;
    }

    public function __invoke(int $id){
        $this->postRepository->forceDelete($id);
        return redirect()->back()->with(['Delete'=>'Delete Successfully','Alert'=>'Delete']);
    }
}
