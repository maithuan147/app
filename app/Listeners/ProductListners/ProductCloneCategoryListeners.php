<?php

namespace App\Listeners\ProductListners;

use App\Events\ProductEvents\ProductCloneCategory;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Contracts\EloquentsDbRepository\IProductDbRepository;


class ProductCloneCategoryListeners
{
    protected $productRepository;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(IProductDbRepository $productRepository){
        $this->productRepository = $productRepository;
    }

    /**
     * Handle the event.
     *
     * @param  ProductCloneCategory  $event
     * @return void
     */
    public function handle(ProductCloneCategory $event)
    {
        $this->productRepository->cloneCategory($event->productId,$event->id);
    }
}
