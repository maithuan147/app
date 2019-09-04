<?php

namespace App\Http\Controllers\Product\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\EloquentsDbRepository\ICategoryProductDbRepository;

class BulkController extends Controller
{
    protected $categoryProductRepository;

    public function __construct(ICategoryProductDbRepository $categoryProductRepository){
        $this->categoryProductRepository = $categoryProductRepository;
    }
     
    public function __invoke(Request $request){
        //  =[];
        if ($request->bulk_option == 1) {
            return redirect()->back()->with('errorOption', 'vui lòng chọn hành động cần gửi');
        }
        if ($request->bulk_id == []) {
            return redirect()->back()->with('errorOption', 'vui lòng chọn mục tiêu cần xử lý');
        }
        $this->categoryProductRepository->bulk($request->bulk_option,$request->bulk_id);
        return redirect()->back();
    }
}
