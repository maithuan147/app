<?php

namespace App\Http\Controllers\Role;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Contracts\EloquentsDbRepository\IRoleDbRepository;

class IndexController extends Controller
{
    protected $roleRepository;

    public function __construct(IRoleDbRepository $roleRepository){
        $this->roleRepository = $roleRepository;
    }
    public function __invoke(Request $request){
        //seach
        $query = $request->query('content');
        $connectQuery = isset($query) ? '&content='.$query : '';

        $queryFitter = $request->query('fitter');
        $connectFitter = isset($queryFitter) ? '&fitter='.$queryFitter : '';
        $fitter = isset($queryFitter) ? $queryFitter : 'name';
        
        // sort
        $myOrder = [
            'name' => '?sort=name&by=desc'.$connectQuery.$connectFitter,
            'description'  => '?sort=description&by=desc'.$connectQuery.$connectFitter,
            'create_by'  => '?sort=create_by&by=desc'.$connectQuery.$connectFitter,
            'created_at'  => '?sort=created_at&by=desc'.$connectQuery.$connectFitter
        ];
        $mySortIcon = [
            'iconName' => 'fa fa-sort-amount-asc',
            'iconDescription' => 'fa fa-sort-amount-asc',
            'iconCreateBy' => 'fa fa-sort-amount-asc',
            'iconCreatedAt' => 'fa fa-sort-amount-asc',
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
                case 'create_by':
                $myOrder['create_by'] = '?sort=create_by&by=asc'.$connectQuery.$connectFitter;
                $mySortIcon['iconCreateBy'] = 'fa fa-sort-amount-desc';
                    break;
                case 'created_at':
                $myOrder['created_at'] = '?sort=created_at&by=asc'.$connectQuery.$connectFitter;
                $mySortIcon['iconCreatedAt'] = 'fa fa-sort-amount-desc';
                    break;
            }
        }
        //phân trang giữ câu lệnh query
        $orderBy = ['content'=>$query,'fitter'=>$queryFitter,'sort'=>$sortQuery,'by'=>$byQuery];    
        if (!empty($query) || !empty($fitter)) {
            $creatials = [[$fitter,'like','%'.$query.'%']];
            $roles = $this->roleRepository->paginate(5,$creatials,$sort,$by);
            $dataView = compact('roles','query','queryFitter','orderBy','myOrder','mySortIcon');
            return view('roles.backend.list',$dataView);
        }
        return redirect()->back();
    }
}
