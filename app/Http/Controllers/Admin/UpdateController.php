<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Webpatser\Uuid\Uuid;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\EditAdminRequest;
use App\Contracts\EloquentsDbRepository\IAdminDbRepository;

class UpdateController extends Controller
{
    protected $adminRepository;

    public function __construct(IAdminDbRepository $adminRepository){
        $this->adminRepository = $adminRepository;
    }

    public function __invoke($id, EditAdminRequest $request){
        $admin = $this->adminRepository->find($id);
        $dataRequest = $request->validated();
        $file = $request->avatar;
        if(!empty($file) ){
            $filename =  Str::uuid().$file->getClientOriginalName();
            $dataRequest['avatar'] = $file->storeAs('img', $filename, 'public');
            // delete Thumbnail Old
            $adminOldImg = public_path('storage/'.$admin->avatar);
            if(file_exists($adminOldImg) && $admin->avatar != 'img/user.jpg'){
                unlink($adminOldImg);
            }
        }
        $this->adminRepository->update($id,$dataRequest);
        return redirect()->route('dashboard.admin.index');
    }
}
