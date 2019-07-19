<?php

namespace App\Http\Controllers\Setting\Restricted;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\EloquentsDbRepository\IRestritedDbRepository;


class RestrictedController extends Controller
{
    protected $restritedRepository;

    public function __construct(IRestritedDbRepository $restritedRepository){
        $this->restritedRepository = $restritedRepository;
    }

    public function __invoke(Request $request){
        $dataRequest = $request->input('words'); 
        $dataArrayRestrites = explode(',', $dataRequest);
        $restrites = $this->restritedRepository->getAll();
        $restritesArray =$restrites->pluck('words','id')->toArray();

        // Nếu chưa có thì Create nếu có rồi thì update
        foreach ($dataArrayRestrites as $value) {
            $dataRequestRestrites['words'] = $value;
            if(!in_array($value,$restritesArray)){
                $this->restritedRepository->create($dataRequestRestrites);
            }
        }

        // Xóa
        foreach ($restritesArray as $key=>$restrited) {
            if (!in_array($restrited,$dataArrayRestrites)) {
                $this->restritedRepository->delete($key);
            }
        }
        return redirect()->back()->with(['Restrited'=>'Restrited Successfully','Alert'=>'Restrited']);
    }
}
