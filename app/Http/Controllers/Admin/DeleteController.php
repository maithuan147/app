<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\EloquentsDbRepository\IAdminDbRepository;

class DeleteController extends Controller
{
    protected $adminRepository;

    public function __construct(IAdminDbRepository $adminRepository){
        $this->adminRepository = $adminRepository;
    }

    public function __invoke(int $id){
        $admin = $this->adminRepository->find($id);
        $adminOldImg = public_path('storage/'.$admin->avatar);
        if(file_exists($adminOldImg) && $admin->avatar != 'img/user.jpg'){
            unlink($adminOldImg);
        }
        $this->adminRepository->delete($id);
        return redirect()->back()->with(['Delete'=>'Delete Successfully','Alert'=>'Delete']);
    }
}
