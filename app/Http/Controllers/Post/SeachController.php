<?php

namespace App\Http\Controllers\Post;

use App\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\EloquentsDbRepository\IPostDbRepository;
use App\Contracts\EloquentsDbRepository\ICategoryDbRepository;

class SeachController extends Controller
{
    protected $postRepository;
    protected $categoryRepository;

    public function __construct(IPostDbRepository $postRepository,IcategoryDbRepository $categoryRepository){
        $this->postRepository = $postRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function __invoke(Request $request){
        $postModel = new Post;
        $query = $request->query('content');
        $queryFitter = $request->query('fitter');
        $fitter = isset($queryFitter) ? $queryFitter : 'title';
        $myOrder = [
            'title' => '?sort=title&by=desc',
            'slug'  => '?sort=slug&by=desc',
            'status'  => '?sort=status&by=desc',
        ];
        $mySortIcon = [
            'iconTitle' => 'fa fa-sort-amount-asc',
            'iconSlug' => 'fa fa-sort-amount-asc',
            'iconStatus' => 'fa fa-sort-amount-asc',
        ];
        $sort = $request->query('sort') ?? 'title';
        $by = $request->query('by') ?? 'asc';
        if($by == 'desc'){
            switch ($sort) {
                case 'title':
                $myOrder['title'] = '?sort=title&by=asc';
                $mySortIcon['iconTitle'] = 'fa fa-sort-amount-desc';
                    break;
                case 'slug':
                $myOrder['slug'] = '?sort=slug&by=asc';
                $mySortIcon['iconSlug'] = 'fa fa-sort-amount-desc';
                    break;
                case 'status':
                $myOrder['status'] = '?sort=status&by=asc';
                $mySortIcon['iconStatus'] = 'fa fa-sort-amount-desc';
                    break;
            }

        }    
        $orderBy = ['content'=>$query,'fitter'=>$fitter,'sort'=>$sort,'by'=>$by];    
        if (!empty($query) || !empty($fitter)) {
            $creatials = [[$fitter,'like','%'.$query.'%']];
            if ($fitter == 'name') {
                $posts = $this->postRepository->joinCategory(5,$creatials,$orderBy);
        
            }else{
                $posts = $this->postRepository->paginate(5,$creatials);
            }
            
            $dataView = compact('posts','query','fitter','orderBy','postModel','myOrder','mySortIcon');
            return view('posts.backend.list',$dataView);
        }
        return redirect()->back();
    }
}
