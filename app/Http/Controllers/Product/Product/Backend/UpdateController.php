<?php

namespace App\Http\Controllers\Product\Product\Backend;

use Auth;
use Webpatser\Uuid\Uuid;
use Illuminate\Support\Str;
use App\Contracts\IMediaRepository;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Events\ProductEvents\ProductWasTag;
use App\Events\ProductEvents\ProductWasCategory;
use App\Http\Requests\Product\Product\EditProductRequest;
use App\Contracts\EloquentsDbRepository\IProductDbRepository;
use App\Contracts\EloquentsDbRepository\IMediaDbRepository;


class UpdateController extends Controller
{
    protected $productRepository;
    protected $mediaRepository;
    protected $mediaFixRepository;
    protected $fillDataRequest = ['name_product','image','price_main','price_sale','description','content','slug','user_id','view','status','id_product','quantity','date_input','unit_weight','weight','unit_size','size'];

    public function __construct(IProductDbRepository $productRepository,IMediaDbRepository $mediaRepository,IMediaRepository $mediaFixRepository){
        $this->productRepository = $productRepository;
        $this->mediaRepository = $mediaRepository;
        $this->mediaFixRepository = $mediaFixRepository;
    }

    public function __invoke($id, EditProductRequest $request){
        $product = $this->productRepository->find($id);
        $dataRequest = $request->only($this->fillDataRequest);
        $dataRequest['user_id'] = Auth::user()->id;
        $media = $this->mediaRepository->getAll()->pluck('height','width')->toArray();
        $file = $request['image'];
        if(!empty($file) ){
            $filename =  Str::uuid().$file->getClientOriginalName();
            $dataRequest['image'] = $file->storeAs('img', $filename, 'public');
            // fix image
            $this->mediaFixRepository->fix($media, $filename);
            // delete Thumbnail Old
            $productOldImg = public_path('storage/'.$product->image);
            if(file_exists($productOldImg)){
                unlink($productOldImg);
            }
            $this->mediaFixRepository->deleteFileOld($media,$product->image);
        }
        
        $this->productRepository->update($id, $dataRequest);
        
        event(new ProductWasCategory($id));
        event(new ProductWasTag($id));  
        return redirect()->route('dashboard.product.index')->with(['Update'=>'Update Successfully','Alert'=>'Update']);
    }
}
