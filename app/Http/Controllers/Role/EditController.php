<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use App\Contracts\EloquentsDbRepository\IRoleDbRepository;


class EditController extends Controller
{
    protected $roleRepository;


    public function __construct(IRoleDbRepository $roleRepository){
        $this->roleRepository = $roleRepository;
    }

    public function __invoke(int $id){
        // $this->authorize('update',Post::class);
        $role = $this->roleRepository->find($id);
        $dataView = compact('role');
        return view('roles.backend.edit',$dataView);
    }
}
