<?php

namespace App\Http\Controllers\Product\Product\Backend;

use Auth;
use Webpatser\Uuid\Uuid;
use Illuminate\Support\Str;
use App\Contracts\IMediaRepository;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use App\Events\ProductEvents\ProductWasTag;
use App\Events\ProductEvents\ProductWasCategory;
use App\Contracts\EloquentsDbRepository\IMediaDbRepository;
use App\Http\Requests\Product\Product\InsertProductRequest;
use App\Contracts\EloquentsDbRepository\ITagProductDbRepository;
use App\Contracts\EloquentsDbRepository\IProductDbRepository;




class StoreController extends Controller
{
    protected $tagRepository;
    protected $productRepository;
    protected $mediaRepository;
    protected $mediaFixRepository;
    protected $fillDataRequest = ['name_product','image','price_main','price_sale','description','content','slug','user_id','view','status','id_product','quantity','date_input','unit_weight','weight','unit_size','size'];

    public function __construct(IProductDbRepository $productRepository,ITagProductDbRepository $tagRepository,IMediaDbRepository $mediaRepository,IMediaRepository $mediaFixRepository){
        $this->tagRepository = $tagRepository;
        $this->productRepository = $productRepository;
        $this->mediaRepository = $mediaRepository;
        $this->mediaFixRepository = $mediaFixRepository;
    }
    
    public function __invoke(InsertProductRequest $request){
        $dataRequest = $request->only($this->fillDataRequest);
        $dataRequest['user_id'] = Auth::user()->id;
        // custom image
        $file = $request['image'];
        if (!empty($file)) {
            $filename =  Str::uuid().$file->getClientOriginalName();
            $dataRequest['image'] = $file->storeAs('img', $filename, 'public');
            // fix img
            $media = $this->mediaRepository->getAll()->pluck('height', 'width')->toArray();
            $this->mediaFixRepository->fix($media, $filename);
        }
        // create product
        $idProduct = $this->productRepository->create($dataRequest);
        // sync Category & Tag
        event(new ProductWasCategory($idProduct));
        event(new ProductWasTag($idProduct));
        return redirect()->route('dashboard.product.index')->with(['Create'=>'Create Successfully','Alert'=>'Create']);
    }
}
