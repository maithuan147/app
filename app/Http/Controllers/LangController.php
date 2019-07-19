<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LangController extends Controller
{
    private $langActive = [
        'vi',
        'en',
    ];
    public function __invoke(Request $request ,$language){
        if (in_array($language, $this->langActive)) {
            $request->session()->put(['lang' => $language]);
            return redirect()->back();
        }
    }
}
