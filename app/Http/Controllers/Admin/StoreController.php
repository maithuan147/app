<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Webpatser\Uuid\Uuid;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use App\Http\Requests\Admin\InsertAdminRequest;
use App\Contracts\EloquentsDbRepository\IRoleDbRepository;
use App\Contracts\EloquentsDbRepository\IAdminDbRepository;

class StoreController extends Controller
{
    protected $adminRepository;
    protected $roleRepository;

    public function __construct(IAdminDbRepository $adminRepository,IRoleDbRepository $roleRepository){
        $this->adminRepository = $adminRepository;
        $this->roleRepository = $roleRepository;
    }
    
    public function __invoke(InsertAdminRequest $request){
        $dataRequest = $request->validated();
        $role = $this->roleRepository->find($request->role_id);
        $dataRequest['permissions'] = $role->permissions; 
        $this->adminRepository->create($dataRequest);
        return redirect()->route('dashboard.admin.index');
    }
}
