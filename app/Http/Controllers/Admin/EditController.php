<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Contracts\EloquentsDbRepository\IRoleDbRepository;
use App\Contracts\EloquentsDbRepository\IAdminDbRepository;

class EditController extends Controller
{
    protected $roleRepository;
    protected $adminRepository;

    public function __construct(IAdminDbRepository $adminRepository,IRoleDbRepository $roleRepository){
        $this->roleRepository = $roleRepository;
        $this->adminRepository = $adminRepository;
    }

    public function __invoke(int $id){
        $admin = $this->adminRepository->find($id);
        $roles = $this->roleRepository->getAll()->pluck('name','id')->toArray();
        $dataView = compact('admin','roles');
        return view('admins.edit',$dataView);
    }
}
