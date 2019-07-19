<?php

namespace App\Listeners;

use App\Tag;
use App\Events\PostWasTag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Contracts\EloquentsDbRepository\ITagDbRepository;
use App\Contracts\EloquentsDbRepository\IPostDbRepository;

class PostWasTagListeners
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    protected $request;
    protected $tagRepository;
    protected $postRepository;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(IPostDbRepository $postRepository,Request $request,ITagDbRepository $tagRepository){
        $this->request = $request;
        $this->tagRepository = $tagRepository;
        $this->postRepository = $postRepository;
    }

    /**
     * Handle the event.
     *
     * @param  PostWasTag  $event
     * @return void
     */
    public function handle(PostWasTag $event)
    {
        $tagModel = new Tag;
        $dataArrayTag = explode(',', $this->request->name);
        // dd($dataArrayTag);
        $post = $this->postRepository->find($event->postId);
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
        $this->postRepository->saveTags($idTagArray, $event->postId);
    }
}
