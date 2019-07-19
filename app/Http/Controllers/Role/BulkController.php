<?php

namespace App\Http\Controllers\Role;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\EloquentsDbRepository\IRoleDbRepository;

class BulkController extends Controller
{
    protected $roleRepository;

    public function __construct(IRoleDbRepository $roleRepository){
        $this->roleRepository = $roleRepository;
    }
     
    public function __invoke(Request $request){
        //  =[];
        if ($request->bulk_option == 1) {
            return redirect()->back()->with('errorOption', 'vui lòng chọn hành động cần gửi');
        }
        if ($request->bulk_id == []) {
            return redirect()->back()->with('errorOption', 'vui lòng chọn mục tiêu cần xử lý');
        }
        $this->roleRepository->bulk($request->bulk_option,$request->bulk_id);
        return redirect()->back();
    }
}
