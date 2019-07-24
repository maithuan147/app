<?php

namespace App\Http\Controllers\Setting\Information;

use App\Information;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{

    public function __invoke(Information $information)
    {
        $information = $information->first();
        $dataView = compact('information');
        return view('setting.backend.information.index',$dataView);
    }

}
