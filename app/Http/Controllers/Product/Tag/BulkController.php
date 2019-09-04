<?php

namespace App\Http\Controllers\Product\Tag;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\EloquentsDbRepository\ITagProductDbRepository;

class BulkController extends Controller
{
    protected $tagProductReponsitory;

    public function __construct(ITagProductDbRepository $tagProductReponsitory){
        $this->tagProductReponsitory = $tagProductReponsitory;
    }
     
    public function __invoke(Request $request){
        //  =[];
        if ($request->bulk_option == 1) {
            return redirect()->back()->with('errorOption', 'vui lòng chọn hành động cần gửi');
        }
        if ($request->bulk_id == []) {
            return redirect()->back()->with('errorOption', 'vui lòng chọn mục tiêu cần xử lý');
        }
        $this->tagProductReponsitory->bulk($request->bulk_option,$request->bulk_id);
        return redirect()->back();
    }
}
