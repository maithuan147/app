<?php

namespace App\Listeners;

use App\Events\PostCloneTag;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Contracts\EloquentsDbRepository\IPostDbRepository;


class PostCloneTagListeners
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
     * @param  PostCloneTag  $event
     * @return void
     */
    public function handle(PostCloneTag $event)
    {
        $this->postRepository->cloneTag($event->postId,$event->id);
    }
}
