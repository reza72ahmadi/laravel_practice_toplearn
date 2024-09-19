<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;

class CategoryController extends Controller
{

    public function index()
    {
        return view('admin.market.category.index');
    }
}
