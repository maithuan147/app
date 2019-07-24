<?php

namespace App\Http\Controllers\Setting\Information;

use App\Information;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Information\EditInformationRequest;

class UpdateController extends Controller
{
    public function __invoke($id, EditInformationRequest $request, Information $information)
    {
        $information = $information->find($id);
        $dataRequest = $request->validated();
        $file = $request->logo;
        if(!empty($file) ){
            $filename =  Str::uuid().$file->getClientOriginalName();
            $dataRequest['logo'] = $file->storeAs('img', $filename, 'public');
            // delete Thumbnail Old
            $oldImg = public_path('storage/'.$information->logo);
            if(file_exists($oldImg) && $information->logo != 'img/user.jpg'){
                unlink($oldImg);
            }
        }
        $information->where('id', $id)->update($dataRequest);
        return redirect()->back()->with(['Update'=>'Update Successfully','Alert'=>'Update']);
    }

}
