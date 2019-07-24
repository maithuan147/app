<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\EloquentsDbRepository\IAdminDbRepository;

class BulkController extends Controller
{
    protected $adminRepository;

    public function __construct(IAdminDbRepository $adminRepository){
        $this->adminRepository = $adminRepository;
    }
     
    public function __invoke(Request $request){
        //  =[];
        if ($request->bulk_option == 1) {
            return redirect()->back()->with('errorOption', 'vui lòng chọn hành động cần gửi');
        }
        if ($request->bulk_id == []) {
            return redirect()->back()->with('errorOption', 'vui lòng chọn mục tiêu cần xử lý');
        }
        $this->postRepository->bulk($request->bulk_option,$request->bulk_id);
        return redirect()->back()->with([$request->bulk_option=>$request->bulk_option.' Successfully','Alert'=>$request->bulk_option]);
    }
}
