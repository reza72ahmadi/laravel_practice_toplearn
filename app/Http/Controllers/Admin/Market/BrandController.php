<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        return view('admin.market.brand.index');
    }

    public function create()  {
        return view('admin.market.brand.create');
    }
}
