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
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Post\EditPostRequest;
use App\Contracts\EloquentsDbRepository\IPostDbRepository;
use App\Contracts\EloquentsDbRepository\IMediaDbRepository;


class UpdateController extends Controller
{
    protected $postRepository;
    protected $mediaRepository;
    protected $mediaFixRepository;
    protected $fillData = ['title','thumbnail','description','content','slug','status'];

    public function __construct(IPostDbRepository $postRepository,IMediaDbRepository $mediaRepository,IMediaRepository $mediaFixRepository){
        $this->postRepository = $postRepository;
        $this->mediaRepository = $mediaRepository;
        $this->mediaFixRepository = $mediaFixRepository;
    }

    public function __invoke($id, EditPostRequest $request){
        $post = $this->postRepository->find($id);
        $dataRequest = $request->only($this->fillData);
        $dataRequest['user_id'] = Auth::user()->id;
        $media = $this->mediaRepository->getAll()->pluck('height','width')->toArray();
        $file = $request['thumbnail'];
        if(!empty($file) ){
            $filename =  Str::uuid().$file->getClientOriginalName();
            $dataRequest['thumbnail'] = $file->storeAs('img', $filename, 'public');
            // fix image
            $this->mediaFixRepository->fix($media, $filename);
            // delete Thumbnail Old
            $postOldImg = public_path('storage/'.$post->thumbnail);
            if(file_exists($postOldImg)){
                unlink($postOldImg);
            }
            $this->mediaFixRepository->deleteFileOld($media,$post->thumbnail);
        }
        
        $this->postRepository->update($id, $dataRequest);
        
        event(new PostWasCategory($id));
        event(new PostWasTag($id));  
        return redirect()->route('dashboard.post.index')->with(['Update'=>'Update Successfully','Alert'=>'Update']);
    }
}
