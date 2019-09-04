<?php

namespace App\Http\Controllers\Product\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\EloquentsDbRepository\ICategoryProductDbRepository;

class IndexController extends Controller
{
    protected $categoryProductRepository;

    public function __construct(ICategoryProductDbRepository $categoryProductRepository){
        $this->categoryProductRepository = $categoryProductRepository;
    }
    public function __invoke(Request $request){
        $query = $request->query('content');
        $connectQuery = isset($query) ? '&content='.$query : '';

        $queryFitter = $request->query('fitter');
        $connectFitter = isset($queryFitter) ? '&fitter='.$queryFitter : '';
        $fitter = isset($queryFitter) ? $queryFitter : 'name';
        
        // sort
        $myOrder = [
            'name' => '?sort=name&by=desc'.$connectQuery.$connectFitter,
            'description'  => '?sort=description&by=desc'.$connectQuery.$connectFitter,
            'status'  => '?sort=status&by=desc'.$connectQuery.$connectFitter,
            'parent_id'  => '?sort=parent_id&by=desc'.$connectQuery.$connectFitter
        ];
        $mySortIcon = [
            'iconName' => 'fa fa-sort-amount-asc',
            'iconDescription' => 'fa fa-sort-amount-asc',
            'iconStatus' => 'fa fa-sort-amount-asc',
            'iconParentId' => 'fa fa-sort-amount-asc',
        ];
        $sortQuery = $request->query('sort');
        $sort = $sortQuery ?? 'name';

        $byQuery = $request->query('by');
        $by = $byQuery ?? 'asc';
        if($by == 'desc'){
            switch ($sort) {
                case 'name':
                $myOrder['name'] = '?sort=name&by=asc'.$connectQuery.$connectFitter;
                $mySortIcon['iconName'] = 'fa fa-sort-amount-desc';
                    break;
                case 'description':
                $myOrder['description'] = '?sort=description&by=asc'.$connectQuery.$connectFitter;
                $mySortIcon['iconDescription'] = 'fa fa-sort-amount-desc';
                    break;
                case 'status':
                $myOrder['status'] = '?sort=status&by=asc'.$connectQuery.$connectFitter;
                $mySortIcon['iconStatus'] = 'fa fa-sort-amount-desc';
                    break;
                case 'parent_id':
                $myOrder['parent_id'] = '?sort=parent_id&by=asc'.$connectQuery.$connectFitter;
                $mySortIcon['iconParentId'] = 'fa fa-sort-amount-desc';
                    break;
            }
        }
        //phân trang giữ câu lệnh query
        $orderBy = ['content'=>$query,'fitter'=>$queryFitter,'sort'=>$sortQuery,'by'=>$byQuery];    
        if (!empty($query) || !empty($fitter)) {
            $creatials = [[$fitter,'like','%'.$query.'%']];
            $categories = $this->categoryProductRepository->paginate(5,$creatials,$sort,$by);
            $dataView = compact('categories','query','queryFitter','orderBy','myOrder','mySortIcon');
            return view('products.categories.backend.list',$dataView);
        }
        return redirect()->back();
    }
}
