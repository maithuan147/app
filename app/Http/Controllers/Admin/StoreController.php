<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Webpatser\Uuid\Uuid;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use App\Http\Requests\Admin\InsertAdminRequest;
use App\Contracts\EloquentsDbRepository\IAdminDbRepository;

class StoreController extends Controller
{
    protected $adminRepository;

    public function __construct(IAdminDbRepository $adminRepository){
        $this->adminRepository = $adminRepository;
    }
    
    public function __invoke(InsertAdminRequest $request){
        $dataRequest = $request->validated();
        $this->adminRepository->create($dataRequest);
        return redirect()->route('dashboard.admin.index');
    }
}
