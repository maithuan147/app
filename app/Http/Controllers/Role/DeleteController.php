<?php

namespace App\Http\Controllers\Role;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\EloquentsDbRepository\IRoleDbRepository;

class DeleteController extends Controller
{
    protected $roleRepository;

    public function __construct(IRoleDbRepository $roleRepository){
        $this->roleRepository = $roleRepository;
    }

    public function __invoke(int $id){
        $this->roleRepository->forceDelete($id);
        return redirect()->back()->with(['Delete'=>'Delete Successfully','Alert'=>'Delete']);
    }
}
