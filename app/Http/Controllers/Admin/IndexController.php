<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\EloquentsDbRepository\IAdminDbRepository;

class IndexController extends Controller
{
    protected $adminRepository;

    public function __construct(IAdminDbRepository $adminRepository){
        $this->adminRepository = $adminRepository;
    }
    public function __invoke(Request $request){
        // $this->authorize('before',Post::class);

        $query = $request->query('content');
        $connectQuery = isset($query) ? '&content='.$query : '';

        $queryFitter = $request->query('fitter');
        $connectFitter = isset($queryFitter) ? '&fitter='.$queryFitter : '';
        $fitter = isset($queryFitter) ? $queryFitter : 'name';
        

        $myOrder = [
            'name' => '?sort=name&by=desc'.$connectQuery.$connectFitter,
            'email'  => '?sort=email&by=desc'.$connectQuery.$connectFitter,
            'status'  => '?sort=status&by=desc'.$connectQuery.$connectFitter,
        ];
        $mySortIcon = [
            'iconName' => 'fa fa-sort-amount-asc',
            'iconEmail' => 'fa fa-sort-amount-asc',
            'iconStatus' => 'fa fa-sort-amount-asc',
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
                case 'email':
                $myOrder['email'] = '?sort=email&by=asc'.$connectQuery.$connectFitter;
                $mySortIcon['iconEmail'] = 'fa fa-sort-amount-desc';
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
            $admins = $this->adminRepository->paginate(5,$creatials,$sort,$by);
            $dataView = compact('admins','query','queryFitter','orderBy','myOrder','mySortIcon');
            return view('admins.list',$dataView);
        }
        return redirect()->back();
    }
}
