<?php

namespace App\Http\Controllers\Page\BackEnd;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\EloquentsDbRepository\IPageDbRepository;


class CreateController extends Controller
{
    protected $pageRepository;

    public function __construct(IPageDbRepository $pageRepository){
        $this->pageRepository = $pageRepository;
    }

    public function __invoke(){
        // $this->authorize('create',Post::class);

        $pages = $this->pageRepository->getAll('Tree')->pluck('title','id')->prepend('Select Parent', '')->toArray();
        $dataView = compact('pages');
        return view('pages.backend.create', $dataView);
    }
}
