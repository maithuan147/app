<?php

namespace App\Http\Controllers\Role;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\EloquentsDbRepository\IRoleDbRepository;

class SeachController extends Controller
{
    protected $roleRepository;

    public function __construct(IRoleDbRepository $roleRepository){
        $this->roleRepository = $roleRepository;
    }

    public function __invoke(Request $request){
        $query = $request->query('content');
        $queryFitter = $request->query('fitter');
        $fitter = isset($queryFitter) ? $queryFitter : 'name';
        if (!empty($query) || !empty($fitter)) {
            $creatials = [[$fitter,'like','%'.$query.'%']];
            $orderBy = ['content'=>$query,'fitter'=>$fitter];
            $roles = $this->roleRepository->paginate(5,$creatials);
            $dataView = compact('roles','query','fitter','orderBy');
            return view('roles.backend.list',$dataView);
        }
        return redirect()->back();
    }
}
