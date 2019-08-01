<?php

namespace App\Http\Controllers\Page\BackEnd;

use Auth;
use Webpatser\Uuid\Uuid;
use Illuminate\Support\Str;
use App\Contracts\IMediaRepository;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use App\Http\Requests\Page\InsertPageRequest;
use App\Contracts\EloquentsDbRepository\IPageDbRepository;
use App\Contracts\EloquentsDbRepository\IMediaDbRepository;


class StoreController extends Controller
{
    protected $pageRepository;
    protected $mediaRepository;
    protected $mediaFixRepository;

    public function __construct(IPageDbRepository $pageRepository,IMediaDbRepository $mediaRepository,IMediaRepository $mediaFixRepository){
        $this->pageRepository = $pageRepository;
        $this->mediaRepository = $mediaRepository;
        $this->mediaFixRepository = $mediaFixRepository;
    }
    
    public function __invoke(InsertPageRequest $request){
        $dataRequest = $request->validated();
        $dataRequest['user_id'] = Auth::user()->id;
        $dataRequest['parent_id'] = $request->parent_id;
        // custom image
        $file = $request['image'];
        $filename =  Str::uuid().$file->getClientOriginalName();
        $dataRequest['image'] = $file->storeAs('img', $filename, 'public');
        // fix img
        $media = $this->mediaRepository->getAll()->pluck('height','width')->toArray();
        $this->mediaFixRepository->fix($media , $filename);
        // create post
        $idPost = $this->pageRepository->create($dataRequest);
        // sync Category & Tag
        return redirect()->route('dashboard.page.index')->with(['Create'=>'Create Successfully','Alert'=>'Create']);
    }
}
