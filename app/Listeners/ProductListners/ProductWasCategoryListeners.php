<?php

namespace App\Listeners\ProductListners;

use Illuminate\Http\Request;
use App\Events\ProductEvents\ProductWasCategory;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Contracts\EloquentsDbRepository\IProductDbRepository;


class ProductWasCategoryListeners
{
    protected $productRepository;
    protected $request;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(IProductDbRepository $productRepository,Request $request){
        $this->productRepository = $productRepository;
        $this->request = $request;
    }

    /**
     * Handle the event.
     *
     * @param  PostWasUpdate  $event
     * @return void
     */
    public function handle(ProductWasCategory $event)
    {
        $categoryIds = $this->request->input('category_ids');
        $this->productRepository->saveCategories($categoryIds, $event->productId);
    }
}
