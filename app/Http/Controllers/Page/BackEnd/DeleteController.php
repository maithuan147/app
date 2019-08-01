<?php

namespace App\Http\Controllers\Page\BackEnd;

use Illuminate\Http\Request;
use App\Contracts\IMediaRepository;
use App\Http\Controllers\Controller;
use App\Contracts\EloquentsDbRepository\IPageDbRepository;
use App\Contracts\EloquentsDbRepository\IMediaDbRepository;

class DeleteController extends Controller
{
    protected $pageRepository;
    protected $mediaRepository;
    protected $mediaFixRepository;

    public function __construct(IPageDbRepository $pageRepository,IMediaDbRepository $mediaRepository,IMediaRepository $mediaFixRepository){
        $this->mediaRepository = $mediaRepository;
        $this->pageRepository = $pageRepository;
        $this->mediaFixRepository = $mediaFixRepository;
    }

    public function __invoke(int $id){
        $page = $this->pageRepository->whereId($id);
        $pageOldImg = public_path('storage/'.$page->image);
        $media = $this->mediaRepository->getAll()->pluck('height','width')->toArray();
        if(file_exists($pageOldImg)){
            unlink($pageOldImg);
        }
        $this->mediaFixRepository->deleteFileOld($media,$page->image);
        $this->pageRepository->forceDelete($id);
        return redirect()->back()->with(['Delete'=>'Delete Successfully','Alert'=>'Delete']);
    }
}
