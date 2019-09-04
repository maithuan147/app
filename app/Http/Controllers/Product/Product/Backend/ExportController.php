<?php

namespace App\Http\Controllers\Product\Product\Backend;

use App\Product;
use Illuminate\Http\Request;
use App\Exports\ProductExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class ExportController extends Controller
{
    public function __invoke() 
    {
        return Excel::download(new ProductExport, 'product.xlsx');
    }
}
