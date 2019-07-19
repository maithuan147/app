<?php

namespace App\Http\Controllers\Post;

use Auth;
use Webpatser\Uuid\Uuid;
use App\Events\PostWasTag;
use Illuminate\Support\Str;
use App\Events\PostWasCategory;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use App\Http\Requests\Post\InsertPostRequest;
use App\Contracts\EloquentsDbRepository\ITagDbRepository;
use App\Contracts\EloquentsDbRepository\IPostDbRepository;

class StoreController extends Controller
{
    protected $postRepository;
    protected $tagRepository;

    public function __construct(IPostDbRepository $postRepository,ITagDbRepository $tagRepository){
        $this->postRepository = $postRepository;
        $this->tagRepository = $tagRepository;
    }
    
    public function __invoke(InsertPostRequest $request){
        $dataRequest = $request->validated();
        // Từ Cấm
        // str_ireplace(['từ cấm','hạn chế'],'...',$request->content,$count);

        $dataRequest['user_id'] = Auth::user()->id;
        // custom thumbnail
        $file = $request['thumbnail'];
        $filename =  Str::uuid().$file->getClientOriginalName();
        $dataRequest['thumbnail'] = $file->storeAs('img', $filename, 'public');
        $img = Image::make('storage/img/'.$filename);
        $img->fit(200);
        $img->save();
        // create post
        $idPost = $this->postRepository->create($dataRequest);
        // sync Category & Tag
        event(new PostWasCategory($idPost));
        event(new PostWasTag($idPost));
        return redirect()->route('dashboard.post.index')->with(['Create'=>'Create Successfully','Alert'=>'Create']);
    }
}
