<?php

namespace App\Http\Controllers\Product\Tag;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CreateController extends Controller
{

    public function __invoke(){
        return view('products.tags.backend.create');
    }
}
