<?php

namespace App\Http\Controllers\Product\Product\Backend;

use Illuminate\Http\Request;
use App\Contracts\IMediaRepository;
use App\Http\Controllers\Controller;
use App\Contracts\EloquentsDbRepository\IProductDbRepository;
use App\Contracts\EloquentsDbRepository\IMediaDbRepository;

class DeleteController extends Controller
{
    protected $productRepository;
    protected $mediaRepository;
    protected $mediaFixRepository;

    public function __construct(IProductDbRepository $productRepository,IMediaDbRepository $mediaRepository,IMediaRepository $mediaFixRepository){
        $this->mediaRepository = $mediaRepository;
        $this->productRepository = $productRepository;
        $this->mediaFixRepository = $mediaFixRepository;
    }

    public function __invoke(int $id){
        $product = $this->productRepository->whereId($id);
        $productOldImg = public_path('storage/'.$product->image);
        $media = $this->mediaRepository->getAll()->pluck('height','width')->toArray();
        if(file_exists($productOldImg)){
            unlink($productOldImg);
        }
        $this->mediaFixRepository->deleteFileOld($media,$product->image);
        $this->productRepository->forceDelete($id);
        return redirect()->back()->with(['Delete'=>'Delete Successfully','Alert'=>'Delete']);
    }
}
