<?php

namespace App\Listeners;

use App\Events\PostCloneCategory;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Contracts\EloquentsDbRepository\IPostDbRepository;


class PostCloneCategoryListeners
{
    protected $postRepository;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(IPostDbRepository $postRepository){
        $this->postRepository = $postRepository;
    }

    /**
     * Handle the event.
     *
     * @param  PostCloneCategory  $event
     * @return void
     */
    public function handle(PostCloneCategory $event)
    {
        $this->postRepository->cloneCategory($event->postId,$event->id);
    }
}
