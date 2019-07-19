<?php

namespace App\Listeners;

use Illuminate\Http\Request;
use App\Events\PostWasCategory;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Contracts\EloquentsDbRepository\IPostDbRepository;


class PostWasCategoryListeners
{
    protected $postRepository;
    protected $request;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(IPostDbRepository $postRepository,Request $request){
        $this->postRepository = $postRepository;
        $this->request = $request;
    }

    /**
     * Handle the event.
     *
     * @param  PostWasUpdate  $event
     * @return void
     */
    public function handle(PostWasCategory $event)
    {
        $categoryIds = $this->request->input('category_ids');
        $this->postRepository->saveCategories($categoryIds, $event->postId);
    }
}
