<?php

namespace App\Http\Controllers\Setting\Restricted;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\EloquentsDbRepository\IRestritedDbRepository;


class IndexController extends Controller
{
    protected $restritedRepository;

    public function __construct(IRestritedDbRepository $restritedRepository){
        $this->restritedRepository = $restritedRepository;
    }
    public function __invoke()
    {
        $restrites = $this->restritedRepository->getAll();
        $restritesArray = $restrites->pluck('words')->toArray();
        $dataView = compact('restritesArray');
        return view('setting.backend.restricted.index',$dataView);
    }

}
