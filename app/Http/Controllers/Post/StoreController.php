<?php

namespace App\Http\Controllers\Post;

use Auth;
use Webpatser\Uuid\Uuid;
use App\Events\PostWasTag;
use Illuminate\Support\Str;
use App\Events\PostWasCategory;
use App\Contracts\IMediaRepository;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use App\Http\Requests\Post\InsertPostRequest;
use App\Contracts\EloquentsDbRepository\ITagDbRepository;
use App\Contracts\EloquentsDbRepository\IPostDbRepository;
use App\Contracts\EloquentsDbRepository\IMediaDbRepository;


class StoreController extends Controller
{
    protected $tagRepository;
    protected $postRepository;
    protected $mediaRepository;
    protected $mediaFixRepository;

    public function __construct(IPostDbRepository $postRepository,ITagDbRepository $tagRepository,IMediaDbRepository $mediaRepository,IMediaRepository $mediaFixRepository){
        $this->tagRepository = $tagRepository;
        $this->postRepository = $postRepository;
        $this->mediaRepository = $mediaRepository;
        $this->mediaFixRepository = $mediaFixRepository;
    }
    
    public function __invoke(InsertPostRequest $request){
        $dataRequest = $request->validated();
        $dataRequest['user_id'] = Auth::user()->id;
        // custom thumbnail
        $file = $request['thumbnail'];
        $filename =  Str::uuid().$file->getClientOriginalName();
        $dataRequest['thumbnail'] = $file->storeAs('img', $filename, 'public');
        // fix img
        $media = $this->mediaRepository->getAll()->pluck('height','width')->toArray();
        $this->mediaFixRepository->fix($media , $filename);
        // create post
        $idPost = $this->postRepository->create($dataRequest);
        // sync Category & Tag
        event(new PostWasCategory($idPost));
        event(new PostWasTag($idPost));
        return redirect()->route('dashboard.post.index')->with(['Create'=>'Create Successfully','Alert'=>'Create']);
    }
}
