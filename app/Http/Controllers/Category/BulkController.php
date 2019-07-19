<?php

namespace App\Http\Controllers\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\EloquentsDbRepository\ICategoryDbRepository;

class BulkController extends Controller
{
    protected $categoryReponsitory;

    public function __construct(ICategoryDbRepository $categoryReponsitory){
        $this->categoryReponsitory = $categoryReponsitory;
    }
     
    public function __invoke(Request $request){
        //  =[];
        if ($request->bulk_option == 1) {
            return redirect()->back()->with('errorOption', 'vui lòng chọn hành động cần gửi');
        }
        if ($request->bulk_id == []) {
            return redirect()->back()->with('errorOption', 'vui lòng chọn mục tiêu cần xử lý');
        }
        $this->categoryReponsitory->bulk($request->bulk_option,$request->bulk_id);
        return redirect()->back();
    }
}
