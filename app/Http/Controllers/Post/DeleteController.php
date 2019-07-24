<?php

namespace App\Http\Controllers\Post;

use Illuminate\Http\Request;
use App\Contracts\IMediaRepository;
use App\Http\Controllers\Controller;
use App\Contracts\EloquentsDbRepository\IPostDbRepository;
use App\Contracts\EloquentsDbRepository\IMediaDbRepository;

class DeleteController extends Controller
{
    protected $postRepository;
    protected $mediaRepository;
    protected $mediaFixRepository;

    public function __construct(IPostDbRepository $postRepository,IMediaDbRepository $mediaRepository,IMediaRepository $mediaFixRepository){
        $this->mediaRepository = $mediaRepository;
        $this->postRepository = $postRepository;
        $this->mediaFixRepository = $mediaFixRepository;
    }

    public function __invoke(int $id){
        $post = $this->postRepository->whereId($id);
        $postOldImg = public_path('storage/'.$post->thumbnail);
        $media = $this->mediaRepository->getAll()->pluck('height','width')->toArray();
        if(file_exists($postOldImg)){
            unlink($postOldImg);
        }
        $this->mediaFixRepository->deleteFileOld($media,$post->thumbnail);
        $this->postRepository->forceDelete($id);
        return redirect()->back()->with(['Delete'=>'Delete Successfully','Alert'=>'Delete']);
    }
}
