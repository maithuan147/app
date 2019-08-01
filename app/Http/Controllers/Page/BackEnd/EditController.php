<?php

namespace App\Http\Controllers\Page\BackEnd;

use App\Post;
use App\Http\Controllers\Controller;
use App\Contracts\EloquentsDbRepository\IPageDbRepository;

class EditController extends Controller
{
    protected $pageRepository;

    public function __construct(IPageDbRepository $pageRepository){
        $this->pageRepository = $pageRepository;
    }

    public function __invoke(int $id){
        // $this->authorize('update',Post::class);
        $pages = $this->pageRepository->getAll('Tree')->pluck('title','id')->prepend('Select Parent', '')->toArray();
        $page = $this->pageRepository->find($id);
        $dataView = compact('pages','page');
        return view('pages.backend.edit',$dataView);
    }
}
