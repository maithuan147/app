<?php

namespace App\Http\Controllers\Page\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\EloquentsDbRepository\IPageDbRepository;

class TrashController extends Controller
{
    protected $pageRepository;

    public function __construct(IPageDbRepository $pageRepository){
        $this->pageRepository = $pageRepository;
    }

    public function __invoke(int $id){
        $this->pageRepository->delete($id);
        return redirect()->back()->with(['Trash'=>'Trash Successfully','Alert'=>'Trash']);
    }
}
