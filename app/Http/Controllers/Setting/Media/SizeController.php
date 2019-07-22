<?php

namespace App\Http\Controllers\Setting\Media;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\EloquentsDbRepository\IMediaDbRepository;


class SizeController extends Controller
{
    protected $mediaRepository;

    public function __construct(IMediaDbRepository $mediaRepository){
        $this->mediaRepository = $mediaRepository;
    }
    public function __invoke(Request $request)
    {
        $dataRequest = $request->image_sizes;
        foreach ($dataRequest as $id => $value) {
            $this->mediaRepository->update($id,$value);
        }
        return redirect()->back()->with(['Update'=>'Update Successfully','Alert'=>'Update']);
    }

}
