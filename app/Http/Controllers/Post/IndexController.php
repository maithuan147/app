<?php

namespace App\Http\Controllers\Post;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Contracts\EloquentsDbRepository\IPostDbRepository;

class IndexController extends Controller
{
    protected $postRepository;

    public function __construct(IPostDbRepository $postRepository){
        $this->postRepository = $postRepository;
    }
    public function __invoke(Request $request){
        // if (Gate::denies('list-post')) {
        //     \abort(404);
        // }
        $this->authorize('before',Post::class);

        $postModel = new Post;

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
            if($fitter == 'name'){
                $posts = $this->postRepository->joinCategory(5,$creatials,$sort,$by);
            }else{
                $posts = $this->postRepository->paginate(5,$creatials,$sort,$by);
            }
            $dataView = compact('posts','query','queryFitter','orderBy','postModel','myOrder','mySortIcon');
            return view('posts.backend.list',$dataView);
        }
        return redirect()->back();
    }
}
