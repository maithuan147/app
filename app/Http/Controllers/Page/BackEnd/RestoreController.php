<?php

namespace App\Http\Controllers\Page\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\EloquentsDbRepository\IPageDbRepository;


class RestoreController extends Controller
{
    protected $pageRepository;

    public function __construct(IPageDbRepository $pageRepository){
        $this->pageRepository = $pageRepository;
    }

    public function __invoke(int $id){
        $this->pageRepository->restore($id);
        return redirect()->back()->with(['Restore'=>'Restore Successfully','Alert'=>'Restore']);
    }
}
