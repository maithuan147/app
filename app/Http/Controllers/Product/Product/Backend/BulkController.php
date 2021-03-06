<?php

namespace App\Http\Controllers\Product\Product\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\EloquentsDbRepository\IProductDbRepository;

class BulkController extends Controller
{
    protected $productRepository;

    public function __construct(IProductDbRepository $productRepository){
        $this->productRepository = $productRepository;
    }
     
    public function __invoke(Request $request){
        //  =[];
        if ($request->bulk_option == 1) {
            return redirect()->back()->with('errorOption', 'vui lòng chọn hành động cần gửi');
        }
        if ($request->bulk_id == []) {
            return redirect()->back()->with('errorOption', 'vui lòng chọn mục tiêu cần xử lý');
        }
        $this->productRepository->bulk($request->bulk_option,$request->bulk_id);
        return redirect()->back()->with([$request->bulk_option=>$request->bulk_option.' Successfully','Alert'=>$request->bulk_option]);
    }
}
