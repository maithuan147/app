<?php

namespace App\Http\Controllers\Product\Product\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\EloquentsDbRepository\IProductDbRepository;

class IndexController extends Controller
{
    protected $productRepository;

    public function __construct(IProductDbRepository $productRepository){
        $this->productRepository = $productRepository;
    }
    public function __invoke(Request $request){
        // get query content 
        $query = $request->query('content');
        // nếu không có query content trả về &content='.$query để lọc khi sắp xêp nếu khôngs trả về rỗng
        $connectQuery = isset($query) ? '&content='.$query : '';
        // get query fitter
        $queryFitter = $request->query('fitter');
        // nếu không có queryFitter trả về &content='.$queryFitter để lọc khi sắp xếp nếu không trả về rỗng
        $connectFitter = isset($queryFitter) ? '&fitter='.$queryFitter : '';
        // nếu không có queryFitter trả về name_product nếu không trả về rỗng
        $fitter = isset($queryFitter) ? $queryFitter : 'name_product';
        
        //gán name_product sắp xếp theo name_product theo giảm dần lọc theo fitter với nội dụng content
        $myOrder = [
            'name_product' => '?sort=name_product&by=desc'.$connectQuery.$connectFitter,
            'price'  => '?sort=price&by=desc'.$connectQuery.$connectFitter,
            'status'  => '?sort=status&by=desc'.$connectQuery.$connectFitter,
        ];
        // gán icon giảm dần
        $mySortIcon = [
            'iconName' => 'fa fa-sort-amount-asc',
            'iconPrice' => 'fa fa-sort-amount-asc',
            'iconStatus' => 'fa fa-sort-amount-asc',
        ];
        // get query sort nếu có trả về chính nó không trả về name_product
        $sortQuery = $request->query('sort');
        $sort = $sortQuery ?? 'name_product';
         // get query by nếu có trả về chính nó không trả về ác 
        $byQuery = $request->query('by');
        $by = $byQuery ?? 'asc';

        if($by == 'desc'){
            switch ($sort) {
                // nếu nếu name_product đang desc thì đổi thành asc
                case 'name_product':
                $myOrder['name_product'] = '?sort=name_product&by=asc'.$connectQuery.$connectFitter;
                $mySortIcon['iconName'] = 'fa fa-sort-amount-desc';
                    break;
                case 'price':
                $myOrder['price'] = '?sort=price&by=asc'.$connectQuery.$connectFitter;
                $mySortIcon['iconPrice'] = 'fa fa-sort-amount-desc';
                    break;
                case 'status':
                $myOrder['status'] = '?sort=status&by=asc'.$connectQuery.$connectFitter;
                $mySortIcon['iconStatus'] = 'fa fa-sort-amount-desc';
                    break;
            }
        }
        // truyền về view các get query để giữ câu lệnh khi phân trang
        $orderBy = ['content'=>$query,'fitter'=>$queryFitter,'sort'=>$sortQuery,'by'=>$byQuery];  

        
        if (!empty($query) || !empty($fitter)) {
            $creatials = [[$fitter,'like','%'.$query.'%']];
            if($fitter == 'name'){
                $products = $this->productRepository->joinCategory(5,$creatials,$sort,$by);
            }else{
                $products = $this->productRepository->paginate(5,$creatials,$sort,$by);
                if ($products->total() == 0) {
                    $fitter = 'name';
                    $creatials = [[$fitter,'like','%'.$query.'%']];
                    $products = $this->productRepository->joinCategory(5,$creatials,$sort,$by);
                }
            }
            $dataView = compact('products','query','queryFitter','orderBy','myOrder','mySortIcon');
            return view('products.products.backend.list',$dataView);
        }
        return redirect()->back();
    }
}


