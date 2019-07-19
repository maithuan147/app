<?php

namespace App\Http\Controllers\Post;

use App\Post;
use Illuminate\Http\Request;
use App\Exports\PostsExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class ExportController extends Controller
{
    public function __invoke() 
    {
        return Excel::download(new PostsExport, 'posts.xlsx');
    }
}
