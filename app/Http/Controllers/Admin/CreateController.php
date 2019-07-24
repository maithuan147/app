<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\EloquentsDbRepository\IRoleDbRepository;
use App\Contracts\EloquentsDbRepository\IAdminDbRepository;


class CreateController extends Controller
{
    protected $roleRepository;
    protected $adminRepository;

    public function __construct(IAdminDbRepository $adminRepository,IRoleDbRepository $roleRepository){
        $this->roleRepository = $roleRepository;
        $this->adminRepository = $adminRepository;
    }

    public function __invoke(){
        $roles = $this->roleRepository->getAll()->pluck('name','id')->toArray();
        $dataView = compact('roles');
        return view('admins.create', $dataView);
    }
}
