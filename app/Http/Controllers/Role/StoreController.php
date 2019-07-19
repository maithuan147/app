<?php

namespace App\Http\Controllers\Role;

use Auth;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\Role\InsertRoleRequest;
use App\Contracts\EloquentsDbRepository\IRoleDbRepository;

class StoreController extends Controller
{
    protected $roleRepository;

    public function __construct(IRoleDbRepository $roleRepository){
        $this->roleRepository = $roleRepository;
    }
    
    public function __invoke(InsertRoleRequest $request){
        $requestPermissions = implode(',',$request->permissions);
        $dataRequest = $request->validated();
        $dataRequest['permissions'] = $requestPermissions;
        $dataRequest['create_by'] = Auth::user()->name;
        $this->roleRepository->create($dataRequest);
        return redirect()->route('dashboard.role.index');
    }
}
