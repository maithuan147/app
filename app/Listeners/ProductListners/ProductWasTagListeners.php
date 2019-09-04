<?php

namespace App\Listeners\ProductListners;

use App\TagProduct;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\ProductEvents\ProductWasTag;
use App\Contracts\EloquentsDbRepository\ITagProductDbRepository;
use App\Contracts\EloquentsDbRepository\IProductDbRepository;

class ProductWasTagListeners
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    protected $request;
    protected $tagRepository;
    protected $productRepository;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(IProductDbRepository $productRepository,Request $request,ITagProductDbRepository $tagRepository){
        $this->request = $request;
        $this->tagRepository = $tagRepository;
        $this->productRepository = $productRepository;
    }

    /**
     * Handle the event.
     *
     * @param  ProductWasTag  $event
     * @return void
     */
    public function handle(ProductWasTag $event)
    {
        $tagModel = new TagProduct;
        $dataArrayTag = explode(',', $this->request->name);
        $product = $this->productRepository->find($event->productId);
        foreach ($dataArrayTag as $key => $value) {
            $tags = $this->tagRepository->getAll();
            $tagsArray =$tags->pluck('name','id')->toArray();
            $dataRequestTag['name'] = $value;
            $dataRequestTag['slug'] = Str::slug($value, '-');
            if(in_array($value,$tagsArray)){
                $findTag = $tagModel->where('name',$value)->first();
                $idTag = $findTag->id;
            }else{
                $idTag = $this->tagRepository->create($dataRequestTag);
            }
            $idTagArray[$key] = $idTag; 
        }
        $this->productRepository->saveTags($idTagArray, $event->productId);
    }
}
