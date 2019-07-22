<?php

namespace App\Http\Controllers\Setting\Media;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\EloquentsDbRepository\IMediaDbRepository;


class IndexController extends Controller
{
    protected $mediaRepository;

    public function __construct(IMediaDbRepository $mediaRepository){
        $this->mediaRepository = $mediaRepository;
    }
    public function __invoke()
    {
        $medias = $this->mediaRepository->getAll();
        $dataView = compact('medias');
        return view('setting.backend.media.index',$dataView);
    }

}
