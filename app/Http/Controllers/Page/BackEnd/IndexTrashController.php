<?php

namespace App\Http\Controllers\Page\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\EloquentsDbRepository\IPageDbRepository;


class IndexTrashController extends Controller
{
    protected $pageRepository;

    public function __construct(IPageDbRepository $pageRepository){
        $this->pageRepository = $pageRepository;
    }

    public function __invoke(){
        $trashs = $this->pageRepository->onlyTrashed();
        $dataView = compact('trashs');
        return view('pages.backend.listTrash',$dataView);
    }
}
