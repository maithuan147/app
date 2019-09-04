<?php

namespace App\Listeners\ProductListners;

use App\Events\ProductEvents\ProductCloneTag;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Contracts\EloquentsDbRepository\IProductDbRepository;


class ProductCloneTagListeners
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
     * @param  ProductCloneTag  $event
     * @return void
     */
    public function handle(ProductCloneTag $event)
    {
        $this->productRepository->cloneTag($event->productId,$event->id);
    }
}
