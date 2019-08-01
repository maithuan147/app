<?php

namespace App\Http\Controllers\Page\BackEnd;

use Auth;
use Webpatser\Uuid\Uuid;
use Illuminate\Support\Str;
use App\Contracts\IMediaRepository;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Page\EditPageRequest;
use App\Contracts\EloquentsDbRepository\IPageDbRepository;
use App\Contracts\EloquentsDbRepository\IMediaDbRepository;


class UpdateController extends Controller
{
    protected $pageRepository;
    protected $mediaRepository;
    protected $mediaFixRepository;
    protected $fillData = ['title','image','description','content','slug','status','parent_id'];

    public function __construct(IPageDbRepository $pageRepository,IMediaDbRepository $mediaRepository,IMediaRepository $mediaFixRepository){
        $this->pageRepository = $pageRepository;
        $this->mediaRepository = $mediaRepository;
        $this->mediaFixRepository = $mediaFixRepository;
    }

    public function __invoke($id, EditPageRequest $request){
        $page = $this->pageRepository->find($id);
        $dataRequest = $request->only($this->fillData);
        $dataRequest['user_id'] = Auth::user()->id;
        $media = $this->mediaRepository->getAll()->pluck('height','width')->toArray();
        $file = $request['image'];
        if(!empty($file) ){
            $filename =  Str::uuid().$file->getClientOriginalName();
            $dataRequest['image'] = $file->storeAs('img', $filename, 'public');
            // fix image
            $this->mediaFixRepository->fix($media, $filename);
            // delete image Old
            $pageOldImg = public_path('storage/'.$page->image);
            if(file_exists($pageOldImg)){
                unlink($pageOldImg);
            }
            $this->mediaFixRepository->deleteFileOld($media,$page->image);
        }
        $this->pageRepository->update($id, $dataRequest);
        return redirect()->route('dashboard.page.index')->with(['Update'=>'Update Successfully','Alert'=>'Update']);
    }
}
