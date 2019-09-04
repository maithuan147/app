<?php

namespace App\Http\Controllers\Product\Tag;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\EloquentsDbRepository\ITagProductDbRepository;

class IndexController extends Controller
{
    protected $tagProductReponsitory;

    public function __construct(ITagProductDbRepository $tagProductReponsitory){
        $this->tagProductReponsitory = $tagProductReponsitory;
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
            'slug'  => '?sort=slug&by=desc'.$connectQuery.$connectFitter,
        ];
        $mySortIcon = [
            'iconName' => 'fa fa-sort-amount-asc',
            'iconSlug' => 'fa fa-sort-amount-asc',
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
                case 'slug':
                $myOrder['slug'] = '?sort=slug&by=asc'.$connectQuery.$connectFitter;
                $mySortIcon['iconSlug'] = 'fa fa-sort-amount-desc';
                    break;
            }
        }
        //phân trang giữ câu lệnh query
        $orderBy = ['content'=>$query,'fitter'=>$queryFitter,'sort'=>$sortQuery,'by'=>$byQuery];    
        if (!empty($query) || !empty($fitter)) {
            $creatials = [[$fitter,'like','%'.$query.'%']];
            $tags = $this->tagProductReponsitory->paginate(5,$creatials,$sort,$by);
            $dataView = compact('tags','query','queryFitter','orderBy','myOrder','mySortIcon');
            return view('products.tags.backend.list',$dataView);
        }
        return redirect()->back();
    }
}
