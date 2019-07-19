<?php

namespace App\Http\Controllers\Post;

use Auth;
use Webpatser\Uuid\Uuid;
use App\Events\PostWasTag;
use Illuminate\Support\Str;
use App\Events\PostWasCategory;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Post\EditPostRequest;
use App\Contracts\EloquentsDbRepository\IPostDbRepository;

class UpdateController extends Controller
{
    protected $postRepository;
    protected $fillData = ['title','thumbnail','description','content','slug','status'];

    public function __construct(IPostDbRepository $postRepository){
        $this->postRepository = $postRepository;
    }

    public function __invoke($id, EditPostRequest $request){
        $post = $this->postRepository->find($id);
        $dataRequest = $request->only($this->fillData);
        // Từ cấm
        str_ireplace(['từ cấm','hạn chế'],'',$request->content,$count);
        if ($count > 0) {
            return redirect()->back()->with('restricted','Nội dung bài viết có chứa từ cấm');
        }

        $dataRequest['user_id'] = Auth::user()->id;
        $file = $request['thumbnail'];
        if(!empty($file) ){
            $filename =  Str::uuid().$file->getClientOriginalName();
            $dataRequest['thumbnail'] = $file->storeAs('img', $filename, 'public');
            $img = Image::make('storage/img/'.$filename);
            $img->fit(200);
            $img->save();
            // delete Thumbnail Old
            $postOldImg = $post->thumbnail;
            Storage::delete('1cc918f7-0c82-4026-9232-0062d292a73fpost2');
        }
        
        $this->postRepository->update($id, $dataRequest);   
        event(new PostWasCategory($id));
        event(new PostWasTag($id));  
        return redirect()->route('dashboard.post.index')->with(['Update'=>'Update Successfully','Alert'=>'Update']);
    }
}
