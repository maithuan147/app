<?php

namespace App\Http\Controllers\Page\BackEnd;

use App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Contracts\EloquentsDbRepository\IPageDbRepository;

class IndexController extends Controller
{
    protected $pageRepository;

    public function __construct(IPageDbRepository $pageRepository){
        $this->pageRepository = $pageRepository;
    }
    public function __invoke(Request $request){
        // $this->authorize('before',Post::class);
        $pageModel = new Page;

        $query = $request->query('content');
        $connectQuery = isset($query) ? '&content='.$query : '';

        $queryFitter = $request->query('fitter');
        $connectFitter = isset($queryFitter) ? '&fitter='.$queryFitter : '';
        $fitter = isset($queryFitter) ? $queryFitter : 'title'; 

        $myOrder = [
            'title' => '?sort=title&by=desc'.$connectQuery.$connectFitter,
            'slug'  => '?sort=slug&by=desc'.$connectQuery.$connectFitter,
            'status'  => '?sort=status&by=desc'.$connectQuery.$connectFitter,
        ];
        $mySortIcon = [
            'iconTitle' => 'fa fa-sort-amount-asc',
            'iconSlug' => 'fa fa-sort-amount-asc',
            'iconStatus' => 'fa fa-sort-amount-asc',
        ];
        $sortQuery = $request->query('sort');
        $sort = $sortQuery ?? 'title';

        $byQuery = $request->query('by');
        $by = $byQuery ?? 'asc';
        if($by == 'desc'){
            switch ($sort) {
                case 'title':
                $myOrder['title'] = '?sort=title&by=asc'.$connectQuery.$connectFitter;
                $mySortIcon['iconTitle'] = 'fa fa-sort-amount-desc';
                    break;
                case 'slug':
                $myOrder['slug'] = '?sort=slug&by=asc'.$connectQuery.$connectFitter;
                $mySortIcon['iconSlug'] = 'fa fa-sort-amount-desc';
                    break;
                case 'status':
                $myOrder['status'] = '?sort=status&by=asc'.$connectQuery.$connectFitter;
                $mySortIcon['iconStatus'] = 'fa fa-sort-amount-desc';
                    break;
            }
        }
        $orderBy = ['content'=>$query,'fitter'=>$queryFitter,'sort'=>$sortQuery,'by'=>$byQuery];    
        if (!empty($query) || !empty($fitter)) {
            $creatials = [[$fitter,'like','%'.$query.'%']];
            $pages = $this->pageRepository->paginate(5,$creatials,$sort,$by);
            $dataView = compact('pages','query','queryFitter','orderBy','pageModel','myOrder','mySortIcon');
            return view('pages.backend.list',$dataView);
        }
        return redirect()->back();
    }
}


